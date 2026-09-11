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
                return Stat::make(
                    $category->name,
                    $category->surats_count
                )
                    ->description('Surat')
                    ->icon('heroicon-o-squares-2x2');
            })
            ->all();
    }
}