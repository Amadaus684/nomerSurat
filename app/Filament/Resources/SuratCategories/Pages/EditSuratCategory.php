<?php

namespace App\Filament\Resources\SuratCategories\Pages;

use App\Filament\Resources\SuratCategories\SuratCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSuratCategory extends EditRecord
{
    protected static string $resource = SuratCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['name'] = ucwords(strtolower($data['name']));

        return $data;
    }
}
