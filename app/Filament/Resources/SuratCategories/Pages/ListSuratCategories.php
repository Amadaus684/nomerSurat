<?php

namespace App\Filament\Resources\SuratCategories\Pages;

use App\Filament\Resources\SuratCategories\SuratCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuratCategories extends ListRecords
{
    protected static string $resource = SuratCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                    ->visible(fn ($record): bool =>
                        auth()->user()?->can('kategori.create') ?? false
                    ),
        ];
    }
}
