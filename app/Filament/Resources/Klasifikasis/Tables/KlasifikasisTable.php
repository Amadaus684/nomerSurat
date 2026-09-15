<?php

namespace App\Filament\Resources\Klasifikasis\Tables;

use Filament\Actions\BulkActionGroup;
use Illuminate\Support\HtmlString;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KlasifikasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->recordUrl(null)
            ->description(new HtmlString('
                Referensi:
                <a
                    href="https://jdih.jombangkab.go.id/dokumen/detail/peraturan-bupati-jombang-nomor-19-tahun-2024-tentang-kode-klasifikasi-arsip-472"
                    target="_blank"
                    class="text-primary-600 hover:underline"
                >
                    Peraturan Bupati Jombang Nomor 19 Tahun 2024
                </a>
                Tentang Kode Klasifikasi Arsip
            '))
            ->columns([
                TextColumn::make('number')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable()
                    ->badge()
                    ->color('warning'),
                TextColumn::make('jenis_surats_count')
                    ->label('Jumlah Jenis Surat')
                    ->counts('jenisSurats')
                    ->color('danger')
                    ->sortable(),
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
            ->defaultSort('number', 'asc')
            ->recordActions([
                EditAction::make()
                    ->visible(fn ($record): bool =>
                        auth()->user()?->can('klasifikasi.update') ?? false
                    ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
