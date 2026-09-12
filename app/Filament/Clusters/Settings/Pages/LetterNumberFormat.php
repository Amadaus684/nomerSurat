<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Services\SettingService;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Placeholder;

class LetterNumberFormat extends Page
{
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->can('settings.view') ?? false;
    }

    protected static ?int $navigationSort = 50;
    
    protected string $view = 'filament.clusters.settings.pages.letter-number-format';

    protected static ?string $cluster = SettingsCluster::class;

    protected static ?string $title = 'Letter Number Format';

    protected static ?string $navigationLabel = 'Letter Number Format';

    protected static string|\BackedEnum|null $navigationIcon =
        Heroicon::OutlinedDocumentText;

    public ?array $data = [];

    // public function mount(): void
    // {
    //     $settings = app(SettingService::class);

    //     $this->form->fill([
    //         'number_padding' => $settings->get(
    //             'letter_number.number_padding',
    //             ''
    //         ),

    //         'format_components' => $settings->get(
    //             'letter_number.format_components',
    //             [
    //                 [
    //                     'type' => 'classification',
    //                     'separator' => '/',
    //                 ],
    //                 [
    //                     'type' => 'number',
    //                     'separator' => '/',
    //                 ],
    //                 [
    //                     'type' => 'village_code',
    //                     'separator' => '/',
    //                 ],
    //                 [
    //                     'type' => 'month_roman',
    //                     'separator' => '/',
    //                 ],
    //                 [
    //                     'type' => 'year',
    //                     'separator' => '',
    //                 ],
    //             ]
    //         ),
    //     ]);
    // }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Letter Number Format')
                    ->description(
                        'Configure the structure of the letter number.'
                    )
                    ->schema([
                        TextInput::make('number_padding')
                            ->label('Number Padding')
                            ->placeholder(3)
                            ->numeric()
                            ->integer()
                            ->minValue(1)
                            ->maxValue(10)
                            ->default(3)
                            ->required()
                            ->helperText(
                                'Number of digits used for the letter sequence. Example: 1 becomes 001 when set to 3.'
                            ),

                        Repeater::make('format_components')
                            ->label('Format Components')
                            ->schema([
                                Select::make('type')
                                    ->label('Component')
                                    ->options(function ($get): array {
                                        $allOptions = [
                                            'number' => 'Number',
                                            'classification' => 'Classification',
                                            'village_code' => 'Village Code',
                                            'month' => 'Month',
                                            'month_roman' => 'Roman Month',
                                            'year' => 'Year',
                                            'custom' => 'Custom Text',
                                        ];

                                        $selectedTypes = collect(
                                            $get('../../format_components') ?? []
                                        )
                                            ->pluck('type')
                                            ->filter()
                                            ->values()
                                            ->all();

                                        $currentType = $get('type');

                                        return collect($allOptions)
                                            ->filter(function ($label, $value) use (
                                                $selectedTypes,
                                                $currentType
                                            ) {
                                                // Custom Text can be used unlimited times.
                                                if ($value === 'custom') {
                                                    return true;
                                                }

                                                // Keep the current component visible in its own Select.
                                                if ($value === $currentType) {
                                                    return true;
                                                }

                                                // Other system components can only be used once.
                                                return !in_array($value, $selectedTypes, true);
                                            })
                                            ->toArray();
                                    })
                                    ->required()
                                    ->native(false)
                                    ->live(),

                                TextInput::make('custom_text')
                                    ->label('Custom Text')
                                    ->placeholder('e.g. DS')
                                    ->maxLength(50)
                                    ->visible(fn ($get): bool => $get('type') === 'custom')
                                    ->required(fn ($get): bool => $get('type') === 'custom'),

                                TextInput::make('separator')
                                    ->label('Separator')
                                    ->maxLength(10)
                                    ->default('/')
                                    ->placeholder('/'),
                            ])
                            ->columns(2)
                            ->default([
                                [
                                    'type' => 'classification',
                                    'separator' => '/',
                                ],
                                [
                                    'type' => 'number',
                                    'separator' => '/',
                                ],
                                [
                                    'type' => 'village_code',
                                    'separator' => '/',
                                ],
                                [
                                    'type' => 'month_roman',
                                    'separator' => '/',
                                ],
                                [
                                    'type' => 'year',
                                    'separator' => '',
                                ],
                            ])
                            ->reorderable()
                            ->collapsible()
                            ->live()
                            ->addActionLabel('Add Component')
                            ->itemLabel(
                                fn (array $state): ?string => match ($state['type'] ?? null) {
                                    'classification' => 'Classification',
                                    'number' => 'Number',
                                    'village_code' => 'Village Code',
                                    'month' => 'Month',
                                    'month_roman' => 'Roman Month',
                                    'year' => 'Year',
                                    default => 'Component',
                                }
                            )
                            ->required()
                            ->minItems(1),

                        Placeholder::make('format_preview')
                            ->label('Preview')
                            ->content(fn ($get): string => $this->generatePreview(
                                $get('format_components'),
                                $get('number_padding')
                            ))
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = app(SettingService::class);

        $settings->set(
            'letter_number.number_padding',
            (int) $data['number_padding'],
            'integer',
            'general'
        );

        $settings->set(
            'letter_number.format_components',
            $data['format_components'],
            'json',
            'general'
        );

        Notification::make()
            ->title('Letter number format saved')
            ->success()
            ->send();
    }

    protected function generatePreview(
        ?array $components,
        ?int $padding
        ): string 
    {
        if (empty($components)) {
            return 'No format configured';
        }

        $padding = max(1, (int) ($padding ?? 3));

        $values = [
            'number' => str_pad('1', $padding, '0', STR_PAD_LEFT),
            'classification' => 'SK',
            'village_code' => '2001.43.1',
            'month' => '09',
            'month_roman' => 'IX',
            'year' => '2026',
        ];

        return collect($components)
            ->filter(fn ($component) => filled($component['type'] ?? null))
            ->map(function ($component) use ($values) {
                $type = $component['type'];

                $value = $type === 'custom'
                    ? ($component['custom_text'] ?? '')
                    : ($values[$type] ?? '');

                return $value . ($component['separator'] ?? '');
            })
            ->implode('');
    }
}