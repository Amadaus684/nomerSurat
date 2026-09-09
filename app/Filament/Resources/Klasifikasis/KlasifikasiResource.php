<?php

namespace App\Filament\Resources\Klasifikasis;

use App\Filament\Resources\Klasifikasis\Pages\CreateKlasifikasi;
use App\Filament\Resources\Klasifikasis\Pages\EditKlasifikasi;
use App\Filament\Resources\Klasifikasis\Pages\ListKlasifikasis;
use App\Filament\Resources\Klasifikasis\Schemas\KlasifikasiForm;
use App\Filament\Resources\Klasifikasis\Tables\KlasifikasisTable;
use App\Models\Klasifikasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KlasifikasiResource extends Resource
{
    protected static ?string $model = Klasifikasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Klasifikasi Surat';

    protected static ?string $modelLabel = 'Klasifikasi Surat';

    protected static ?string $pluralModelLabel = 'Klasifikasi Surat';

    public static function form(Schema $schema): Schema
    {
        return KlasifikasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KlasifikasisTable::configure($table);
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
            'index' => ListKlasifikasis::route('/'),
            'create' => CreateKlasifikasi::route('/create'),
            'edit' => EditKlasifikasi::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('klasifikasi.view') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('klasifikasi.create') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('klasifikasi.update') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('klasifikasi.delete') ?? false;
    }
}
