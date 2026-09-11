<?php

namespace App\Filament\Resources\Surats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Services\SettingService;

class SuratsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->heading('Daftar Surat')
            ->description('Klik nomor surat untuk menyalin nomor surat.')
            ->columns([
                TextColumn::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->tooltip('Click to copy letter number')
                    ->copyable()
                    ->copyMessage('Nomor surat berhasil disalin')
                    ->copyMessageDuration(1500)
                    ->searchable()
                    ->sortable()
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
                    ->color('warning')
                    ->searchable(),
                TextColumn::make('klasifikasi.description')
                    ->label('Klasifikasi')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                TextColumn::make('nama_penduduk')
                    ->label('Nama Penduduk')
                    ->searchable()
                    ->color('danger'),
                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),
                TextColumn::make('tanggal_kirim')
                    ->label('Tanggal Kirim')
                    ->date()
                    ->sortable(),
                TextColumn::make('tujuan')
                    ->label('Tujuan')
                    ->searchable(),
                TextColumn::make('pembuat.full_name')
                    ->label('Pembuat')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('warning'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordUrl(null)
            ->recordActions([
                EditAction::make()
                    ->visible(fn ($record): bool =>
                        auth()->user()?->can('surat.update') ?? false
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
