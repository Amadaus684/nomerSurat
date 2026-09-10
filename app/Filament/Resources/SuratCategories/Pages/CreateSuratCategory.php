<?php

namespace App\Filament\Resources\SuratCategories\Pages;

use App\Filament\Resources\SuratCategories\SuratCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSuratCategory extends CreateRecord
{
    protected static string $resource = SuratCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['name'] = ucwords(strtolower($data['name']));

        return $data;
    }
}
