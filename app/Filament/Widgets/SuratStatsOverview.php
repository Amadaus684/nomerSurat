<?php

namespace App\Filament\Widgets;

use App\Models\JenisSurat;
use App\Models\Surat;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SuratStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = now();
        $month = now();

        return [
            Stat::make(
                'Total Surat',
                Surat::query()->count()
            )
                ->description('Semua surat')
                ->icon('heroicon-o-envelope'),

            Stat::make(
                'Surat Bulan Ini',
                Surat::query()
                    ->whereYear('tanggal_surat', $month->year)
                    ->whereMonth('tanggal_surat', $month->month)
                    ->count()
            )
                ->description($month->translatedFormat('F Y'))
                ->icon('heroicon-o-calendar-days'),

            Stat::make(
                'Surat Hari Ini',
                Surat::query()
                    ->whereDate('tanggal_surat', $today->toDateString())
                    ->count()
            )
                ->description($today->translatedFormat('d F Y'))
                ->icon('heroicon-o-calendar'),

            Stat::make(
                'Jenis Surat',
                JenisSurat::query()->count()
            )
                ->description('Jenis aktif')
                ->icon('heroicon-o-document-text'),
        ];
    }
}