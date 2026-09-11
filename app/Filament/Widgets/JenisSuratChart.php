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

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Surat',
                    'data' => $jenisSurats
                        ->pluck('surats_count')
                        ->toArray(),
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