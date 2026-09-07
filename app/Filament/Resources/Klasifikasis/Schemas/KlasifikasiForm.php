<?php

namespace App\Filament\Resources\Klasifikasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KlasifikasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->unique()
                    ->maxLength(5)
                    ->unique(ignoreRecord: true)
                    ->placeholder('900')
                    ->required(),
                    
                TextInput::make('description')
                    ->placeholder('Usaha dan Ekonomi')
                    ->maxLength(200)
                    ->required(),
            ]);
    }
}
