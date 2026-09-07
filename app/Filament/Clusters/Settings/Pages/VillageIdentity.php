<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Services\SettingService;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Http;

class VillageIdentity extends Page
{
    protected string $view = 'filament.clusters.settings.pages.village-identity';

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $title = 'Village Identity';

    protected static ?string $navigationLabel = 'Village Identity';

    protected static string|\BackedEnum|null $navigationIcon = \Filament\Support\Icons\Heroicon::OutlinedBuildingOffice2;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = app(SettingService::class);

        $this->form->fill([
            'province_code' => $settings->get('village.province_code'),
            'regency_code' => $settings->get('village.regency_code'),
            'district_code' => $settings->get('village.district_code'),

            // This is ONLY the Select state.
            'village_selection' => $settings->get('village.api_code'),

            // This is the read-only external API code.
            'village_api_code' => $settings->get('village.api_code'),

            // Local code can be different from API code.
            'village_code' => $settings->get('village.code'),

            'village_name' => $settings->get('village.name'),
            'address' => $settings->get('village.address'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Lokasi Desa')
                    ->description('Select the village from the external regional administration API.')
                    ->schema([
                        Select::make('province_code')
                            ->label('Provinsi')
                            ->options(fn () => $this->getProvinces())
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->afterStateUpdated(function ($state, $set) {
                                $set('regency_code', null);
                                $set('district_code', null);
                                $set('village_selection', null);
                                $set('village_api_code', null);
                                $set('village_code', null);
                                $set('village_name', null);
                            }),

                        Select::make('regency_code')
                            ->label('Kabupaten / Kota')
                            ->options(fn ($get) => $this->getChildren($get('province_code')))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->disabled(fn ($get) => blank($get('province_code')))
                            ->afterStateUpdated(function ($state, $set) {
                                $set('district_code', null);
                                $set('village_selection', null);
                                $set('village_api_code', null);
                                $set('village_code', null);
                                $set('village_name', null);
                            }),

                        Select::make('district_code')
                            ->label('Kecamatan')
                            ->options(fn ($get) => $this->getChildren($get('regency_code')))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->disabled(fn ($get) => blank($get('regency_code')))
                            ->afterStateUpdated(function ($state, $set) {
                                $set('village_selection', null);
                                $set('village_api_code', null);
                                $set('village_code', null);
                                $set('village_name', null);
                            }),

                        Select::make('village_selection')
                            ->label('Desa')
                            ->options(fn ($get) => $this->getChildren($get('district_code')))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->disabled(fn ($get) => blank($get('district_code')))
                            ->afterStateUpdated(function ($state, $set) {
                                if (blank($state)) {
                                    $set('village_api_code', null);
                                    $set('village_code', null);
                                    $set('village_name', null);

                                    return;
                                }

                                $village = $this->findRegion($state);

                                if (!$village) {
                                    return;
                                }

                                $apiCode = $village['kode'] ?? null;
                                $name = $village['nama'] ?? null;

                                $set('village_api_code', $apiCode);
                                $set('village_name', $name);

                                /*
                                 * Automatically use the final segment of
                                 * the API code as the initial local code.
                                 *
                                 * Example:
                                 * 35.17.01.2001 -> 2001
                                 */
                                if ($apiCode) {
                                    $set(
                                        'village_code',
                                        last(explode('.', $apiCode))
                                    );
                                }
                            }),
                    ])
                    ->columns(2),

                Section::make('Identitas Desa')
                    ->description('The API code identifies the selected village. The local code is used by this application for letter numbering and can be customized.')
                    ->schema([
                        TextInput::make('village_api_code')
                            ->label('Kode Desa Wilayah')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Code obtained from the external regional administration API.'),

                        TextInput::make('village_code')
                            ->label('Kode Desa Lokal')
                            ->required()
                            ->maxLength(50)
                            ->helperText('This code is used by the letter numbering system and can be changed independently from the API code.'),

                        TextInput::make('village_name')
                            ->label('Nama Desa')
                            ->disabled()
                            ->dehydrated(),

                        TextInput::make('address')
                            ->label('Alamat')
                            ->placeholder('Jln. Brawijaya No. 65 Dsn. Wonokerto')
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

            ])
            ->statePath('data');
    }

    /**
     * Get provinces from the external API.
     */
    protected function getProvinces(): array
    {
        $response = $this->apiRequest('/provinsi');

        if (!$response) {
            return [];
        }

        return collect($response->json('data', []))
            ->mapWithKeys(function ($item) {
                return [
                    $item['kode'] => $item['nama'],
                ];
            })
            ->toArray();
    }

    /**
     * Get direct children of a region.
     *
     * Example:
     * 11 -> regencies
     * 11.01 -> districts
     * 11.01.01 -> villages
     */
    protected function getChildren(?string $parentCode): array
    {
        if (blank($parentCode)) {
            return [];
        }

        $response = $this->apiRequest(
            '/wilayah/' . urlencode($parentCode) . '/children'
        );

        if (!$response) {
            return [];
        }

        return collect($response->json('data', []))
            ->mapWithKeys(function ($item) {
                return [
                    $item['kode'] => $item['nama'],
                ];
            })
            ->toArray();
    }

    /**
     * Find one region by its code.
     *
     * Used when a village is selected so we can obtain
     * both its API code and name.
     */
    protected function findRegion(?string $code): ?array
    {
        if (blank($code)) {
            return null;
        }

        $response = $this->apiRequest(
            '/wilayah/' . urlencode($code)
        );

        if (!$response || !$response->successful()) {
            return null;
        }

        $data = $response->json('data');

        return is_array($data) ? $data : null;
    }

    /**
     * Make authenticated requests to the configured external API.
     */
    protected function apiRequest(string $endpoint)
    {
        $settings = app(SettingService::class);

        $enabled = $settings->get('api.enabled', false);
        $baseUrl = $settings->get('api.base_url');
        $token = $settings->get('api.token');
        $timeout = $settings->get('api.timeout', 10);

        if (!$enabled || blank($baseUrl) || blank($token)) {
            return null;
        }

        try {
            $response = Http::withToken($token)
                ->acceptJson()
                ->timeout((int) $timeout)
                ->get(
                    rtrim($baseUrl, '/') . '/' . ltrim($endpoint, '/')
                );

            if ($response->failed()) {
                Notification::make()
                    ->title('API request failed')
                    ->body(
                        'The regional data API returned HTTP ' .
                        $response->status() . '.'
                    )
                    ->danger()
                    ->send();

                return null;
            }

            return $response;
        } catch (\Throwable $e) {
            Notification::make()
                ->title('Unable to connect to API')
                ->body($e->getMessage())
                ->danger()
                ->send();

            return null;
        }
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = app(SettingService::class);

        $settings->set(
            'village.province_code',
            $data['province_code'] ?? null,
            'string',
            'village'
        );

        $settings->set(
            'village.regency_code',
            $data['regency_code'] ?? null,
            'string',
            'village'
        );

        $settings->set(
            'village.district_code',
            $data['district_code'] ?? null,
            'string',
            'village'
        );

        $settings->set(
            'village.api_code',
            $data['village_api_code'] ?? null,
            'string',
            'village'
        );

        $settings->set(
            'village.code',
            $data['village_code'] ?? null,
            'string',
            'village'
        );

        $settings->set(
            'village.name',
            $data['village_name'] ?? null,
            'string',
            'village'
        );

        $settings->set(
            'village.address',
            $data['address'] ?? null,
            'string',
            'village'
        );

        Notification::make()
            ->title('Village identity saved')
            ->success()
            ->send();
    }
}