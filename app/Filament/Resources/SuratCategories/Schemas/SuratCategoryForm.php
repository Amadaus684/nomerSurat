<?php

namespace App\Filament\Resources\SuratCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SuratCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Kategori Surat')
                    ->placeholder('Surat Keluar')
                    ->maxLength(100)
                    ->unique(ignoreRecord: true)
                    // ->afterStateUpdated(function ($state, callable $set) {
                    //     $set('name', ucwords(strtolower($state)));
                    // })
                    ->required(),
            ]);
    }
}
