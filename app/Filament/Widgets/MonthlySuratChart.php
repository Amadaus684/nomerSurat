<?php

namespace App\Filament\Widgets;

use App\Models\Surat;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class MonthlySuratChart extends ChartWidget
{
    protected static ?int $sort = 5;

    protected ?string $heading = 'Statistik Jumlah Surat per Bulan';

    protected function getData(): array
    {
        $year = now()->year;

        $counts = Surat::query()
            ->selectRaw('MONTH(tanggal_surat) as month, COUNT(*) as total')
            ->whereYear('tanggal_surat', $year)
            ->groupByRaw('MONTH(tanggal_surat)')
            ->pluck('total', 'month');

        $labels = [];
        $data = [];

        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create($year, $month, 1);

            $labels[] = $date->translatedFormat('M');
            $data[] = (int) ($counts[$month] ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Surat',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}