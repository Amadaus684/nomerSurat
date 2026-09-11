<?php

namespace App\Filament\Widgets;

use App\Models\Surat;
use App\Services\SettingService;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentSurats extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Surat::query()
                    ->with([
                        'jenisSurat',
                        'klasifikasi',
                        'pembuat',
                    ])
                    ->latest('tanggal_surat')
            )
            ->columns([
                TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->copyable()
                    ->searchable()
                    ->color('info'),

                TextColumn::make('tanggal_surat')
                    ->label('Tanggal Surat')
                    ->date(
                        app(SettingService::class)
                            ->get('localization.date_format', 'd/m/Y')
                    )
                    ->sortable(),

                TextColumn::make('jenisSurat.name')
                    ->label('Jenis Surat')
                    ->color('warning'),

                TextColumn::make('klasifikasi.number')
                    ->label('Klasifikasi'),

                TextColumn::make('pembuat.name')
                    ->label('Pembuat')
                    ->badge(),
            ])
            ->defaultPaginationPageOption(5)
            ->paginated([5]);
    }
}