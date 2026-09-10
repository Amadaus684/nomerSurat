<?php

namespace App\Filament\Resources\SuratCategories;

use App\Filament\Resources\SuratCategories\Pages\CreateSuratCategory;
use App\Filament\Resources\SuratCategories\Pages\EditSuratCategory;
use App\Filament\Resources\SuratCategories\Pages\ListSuratCategories;
use App\Filament\Resources\SuratCategories\Schemas\SuratCategoryForm;
use App\Filament\Resources\SuratCategories\Tables\SuratCategoriesTable;
use App\Models\SuratCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuratCategoryResource extends Resource
{
    protected static ?string $model = SuratCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Kategori Surat';

    protected static ?string $modelLabel = 'Kategori Surat';

    protected static ?string $pluralModelLabel = 'Kategori Surat';

    protected static ?int $navigationSort = 20;

    public static function form(Schema $schema): Schema
    {
        return SuratCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuratCategoriesTable::configure($table);
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
            'index' => ListSuratCategories::route('/'),
            'create' => CreateSuratCategory::route('/create'),
            'edit' => EditSuratCategory::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('kategori.view') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('kategori.create') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->can('kategori.update') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->can('kategori.delete') ?? false;
    }
}
