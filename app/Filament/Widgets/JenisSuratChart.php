<?php

namespace App\Filament\Widgets;

use App\Models\JenisSurat;
use App\Models\Surat;
use Filament\Widgets\ChartWidget;

class JenisSuratChart extends ChartWidget
{
    protected static ?int $sort = 4;

    protected ?string $heading = 'Jumlah Surat Berdasarkan Jenis Surat';

    protected function getData(): array
    {
        $jenisSurats = JenisSurat::query()
            ->withCount('surats')
            ->orderByDesc('surats_count')
            ->get();

        $colors = [
            '#3B82F6',
            '#22C55E',
            '#F59E0B',
            '#EF4444',
            '#8B5CF6',
            '#06B6D4',
            '#EC4899',
            '#84CC16',
            '#F97316',
            '#6366F1',
            '#14B8A6',
            '#A855F7',
        ];

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Surat',
                    'data' => $jenisSurats
                        ->pluck('surats_count')
                        ->toArray(),

                    'backgroundColor' => $jenisSurats
                        ->keys()
                        ->map(fn ($index) => $colors[$index % count($colors)])
                        ->toArray(),

                    'borderColor' => $jenisSurats
                        ->keys()
                        ->map(fn ($index) => $colors[$index % count($colors)])
                        ->toArray(),

                    'borderWidth' => 1,
                ],
            ],

            'labels' => $jenisSurats
                ->pluck('name')
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
}