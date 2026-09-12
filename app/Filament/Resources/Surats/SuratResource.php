<?php

namespace App\Filament\Resources\Surats;

use App\Filament\Resources\Surats\Pages\CreateSurat;
use App\Filament\Resources\Surats\Pages\EditSurat;
use App\Filament\Resources\Surats\Pages\ListSurats;
use App\Filament\Resources\Surats\Schemas\SuratForm;
use App\Filament\Resources\Surats\Tables\SuratsTable;
use App\Models\Surat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return SuratForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuratsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSurats::route('/'),
            'create' => CreateSurat::route('/create'),
            'edit' => EditSurat::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('surat.view') ?? false;
    }

    public static function canCreate(): bool
    {
        return app(SettingService::class)->isConfigured()
        && (auth()->user()?->can('surat.create') ?? false);
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('surat.update') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('surat.delete') ?? false;
    }
}
