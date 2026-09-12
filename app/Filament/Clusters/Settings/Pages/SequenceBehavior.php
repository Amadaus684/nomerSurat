<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Services\SettingService;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SequenceBehavior extends Page
{
    protected string $view = 'filament.clusters.settings.pages.sequence-behavior';

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?int $navigationSort = 60;

    protected static ?string $title = 'Sequence Behavior';

    protected static ?string $navigationLabel = 'Sequence Behavior';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->can('settings.view') ?? false;
    }

    protected static string|\BackedEnum|null $navigationIcon =
        \Filament\Support\Icons\Heroicon::OutlinedAdjustmentsHorizontal;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = app(SettingService::class);

        $this->form->fill([
            'reset_period' => $settings->get(
                'letter_number.reset_period',
                ''
            ),

            'numbering_scope' => $settings->get(
                'letter_number.numbering_scope',
                ''
            ),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Reset Period')
                    ->description('Configure when the letter number sequence is reset.')
                    ->schema([
                        Select::make('reset_period')
                            ->label('Reset Period')
                            ->options([
                                'yearly' => 'Yearly',
                                'monthly' => 'Monthly',
                                'never' => 'Never',
                            ])
                            ->default('yearly')
                            ->required()
                            ->native(false)
                            ->helperText('Determine when the number sequence starts again from 001.'),
                    ]),

                Section::make('Numbering Scope')
                    ->description('Configure how the number sequence is separated.')
                    ->schema([
                        Select::make('numbering_scope')
                            ->label('Numbering Scope')
                            ->options([
                                'global' => 'Whole Period',
                                'classification' => 'Per Classification',
                                'letter_type' => 'Per Letter Type',
                            ])
                            ->default('global')
                            ->required()
                            ->native(false)
                            ->helperText('Determine which letters share the same number sequence.'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = app(SettingService::class);

        $settings->set(
            'letter_number.reset_period',
            $data['reset_period'],
            'string',
            'general'
        );

        $settings->set(
            'letter_number.numbering_scope',
            $data['numbering_scope'],
            'string',
            'general'
        );

        Notification::make()
            ->title('Sequence behavior saved')
            ->success()
            ->send();
    }
}