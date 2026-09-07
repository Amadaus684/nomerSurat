<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Services\SettingService;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Localization extends Page
{
    protected string $view = 'filament.clusters.settings.pages.localization';

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $title = 'Localization';

    protected static ?string $navigationLabel = 'Localization';

    protected static string|\BackedEnum|null $navigationIcon =
        \Filament\Support\Icons\Heroicon::OutlinedLanguage;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = app(SettingService::class);

        $this->form->fill([
            'locale' => $settings->get('localization.locale', 'id'),
            'timezone' => $settings->get('localization.timezone', 'Asia/Jakarta'),
            'date_format' => $settings->get('localization.date_format', 'd/m/Y'),
            'time_format' => $settings->get('localization.time_format', 'H:i'),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Localization')
                    ->description('Configure language, timezone, date and time display formats.')
                    ->schema([
                        Select::make('locale')
                            ->label('Language')
                            ->options([
                                'id' => 'Indonesian',
                            ])
                            ->default('id')
                            ->required()
                            ->native(false)
                            ->helperText('Language used by the application.'),

                        Select::make('timezone')
                            ->label('Timezone')
                            ->options([
                                'Asia/Jakarta' => 'Asia/Jakarta (WIB)',
                                'Asia/Makassar' => 'Asia/Makassar (WITA)',
                                'Asia/Jayapura' => 'Asia/Jayapura (WIT)',
                            ])
                            ->default('Asia/Jakarta')
                            ->required()
                            ->native(false)
                            ->searchable()
                            ->helperText('Timezone used when displaying dates and times.'),

                        Select::make('date_format')
                            ->label('Date Format')
                            ->options([
                                'd-m-Y' => '31-12-2026',
                                'd/m/Y' => '31/12/2026',
                                'Y-m-d' => '2026-12-31',
                            ])
                            ->default('d-m-Y')
                            ->required()
                            ->native(false)
                            ->helperText('Format used when displaying dates.'),

                        Select::make('time_format')
                            ->label('Time Format')
                            ->options([
                                'H:i' => '14:30',
                                'H:i:s' => '14:30:45',
                                'h:i A' => '02:30 PM',
                            ])
                            ->default('H:i')
                            ->required()
                            ->native(false)
                            ->helperText('Format used when displaying times.'),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = app(SettingService::class);

        $settings->set(
            'localization.locale',
            $data['locale'],
            'string',
            'general'
        );

        $settings->set(
            'localization.timezone',
            $data['timezone'],
            'string',
            'general'
        );

        $settings->set(
            'localization.date_format',
            $data['date_format'],
            'string',
            'general'
        );

        $settings->set(
            'localization.time_format',
            $data['time_format'],
            'string',
            'general'
        );

        Notification::make()
            ->title('Localization settings saved')
            ->success()
            ->send();
    }
}