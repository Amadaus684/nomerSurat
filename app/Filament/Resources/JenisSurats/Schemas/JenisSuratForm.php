<?php

namespace App\Filament\Resources\JenisSurats\Schemas;

use App\Models\Klasifikasi;
use App\Models\SuratCategory;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class JenisSuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Kategori')
                    ->options(
                        SuratCategory::query()
                            ->orderBy('name')
                            ->get()
                            ->mapWithKeys(fn (SuratCategory $kategori) => [
                                $kategori->id =>
                                    "{$kategori->name}",
                            ])
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('klasifikasi_id')
                    ->label('Klasifikasi')
                    ->options(
                        Klasifikasi::query()
                            ->orderBy('number')
                            ->get()
                            ->mapWithKeys(fn (Klasifikasi $klasifikasi) => [
                                $klasifikasi->id =>
                                    "{$klasifikasi->number} - {$klasifikasi->description}",
                            ])
                            ->toArray()
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name')
                    ->label('Jenis Surat')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Surat Keterangan Usaha'),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3)
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ]);
    }
}
