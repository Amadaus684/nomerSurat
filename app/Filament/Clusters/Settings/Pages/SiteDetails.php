<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Services\SettingService;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Schema;

class SiteDetails extends Page
{
    protected string $view = 'filament.clusters.settings.pages.site-details';

    protected static ?string $cluster = SettingsCluster::class;

    public ?array $data = [];

    protected static ?int $navigationSort = 30;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->can('settings.view') ?? false;
    }

    protected static string|\BackedEnum|null $navigationIcon =
        \Filament\Support\Icons\Heroicon::OutlinedComputerDesktop;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->label('Site Name')
                    ->required()
                    ->maxLength(255),

                Textarea::make('site_description')
                    ->label('Site Description')
                    ->rows(4)
                    ->maxLength(1000),
            ])
            ->statePath('data');
    }

    public function mount(): void
    {
        $settings = app(SettingService::class);

        $this->form->fill([
            'site_name' => $settings->get('site.name', ''),
            'site_description' => $settings->get('site.description', ''),
        ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = app(SettingService::class);

        $settings->set(
            'site.name',
            $data['site_name'],
            'string',
            'site'
        );

        $settings->set(
            'site.description',
            $data['site_description'] ?? '',
            'string',
            'site'
        );

        $this->form->fill($data);

        \Filament\Notifications\Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }
}