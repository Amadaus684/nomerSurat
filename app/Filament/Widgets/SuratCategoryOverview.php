<?php

namespace App\Filament\Widgets;

use App\Models\SuratCategory;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuratCategoryOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 3;

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return SuratCategory::query()
            ->withCount('surats')
            ->get()
            ->map(function (SuratCategory $category) {

                 $color = match ($category->name) {
                    'Surat Masuk' => 'info',
                    'Surat Keluar' => 'success',
                    default => 'gray',
                };
                return Stat::make(
                    $category->name,
                    $category->surats_count
                )
                    ->description('Surat')
                    ->icon('heroicon-o-squares-2x2')
                    ->color($color);
            })
            ->all();
    }
}