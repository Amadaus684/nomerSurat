<?php

namespace App\Services;

use App\Models\Klasifikasi;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LetterNumberService
{
    public function preview(
        int $jenisSuratId,
        int $klasifikasiId,
        string $tanggalSurat,
    ): string {
        $date = Carbon::parse($tanggalSurat);

        $sequence = $this->getNextSequence(
            jenisSuratId: $jenisSuratId,
            klasifikasiId: $klasifikasiId,
            date: $date,
        );

        return $this->formatNumber(
            sequence: $sequence,
            klasifikasiId: $klasifikasiId,
            date: $date,
        );
    }

    public function generate(
        int $jenisSuratId,
        int $klasifikasiId,
        string $tanggalSurat,
    ): string {
        return DB::transaction(function () use (
            $jenisSuratId,
            $klasifikasiId,
            $tanggalSurat
        ) {
            $date = Carbon::parse($tanggalSurat);

            $sequence = $this->getNextSequence(
                jenisSuratId: $jenisSuratId,
                klasifikasiId: $klasifikasiId,
                date: $date,
                lock: true,
            );

            return $this->formatNumber(
                sequence: $sequence,
                klasifikasiId: $klasifikasiId,
                date: $date,
            );
        });
    }

    protected function getNextSequence(
        int $jenisSuratId,
        int $klasifikasiId,
        Carbon $date,
        bool $lock = false,
    ): int {
        $settings = app(SettingService::class);

        $resetPeriod = $settings->get(
            'letter_number.reset_period',
            'yearly'
        );

        $numberingScope = $settings->get(
            'letter_number.numbering_scope',
            'global'
        );

        $query = Surat::query()
            ->whereDate('tanggal_surat', '<=', $date);

        if ($resetPeriod === 'yearly') {
            $query->whereYear('tanggal_surat', $date->year);
        } elseif ($resetPeriod === 'monthly') {
            $query->whereYear('tanggal_surat', $date->year)
                ->whereMonth('tanggal_surat', $date->month);
        }

        if ($numberingScope === 'classification') {
            $query->where('klasifikasi_id', $klasifikasiId);
        } elseif ($numberingScope === 'letter_type') {
            $query->where('jenis_surat_id', $jenisSuratId);
        }

        if ($lock) {
            $query->lockForUpdate();
        }

        $lastSequence = $query
            ->get()
            ->map(function (Surat $surat) {
                preg_match('/^(\d+)/', $surat->nomor_surat, $matches);

                return isset($matches[1])
                    ? (int) $matches[1]
                    : 0;
            })
            ->max() ?? 0;

        return $lastSequence + 1;
    }

    protected function formatNumber(
        int $sequence,
        int $klasifikasiId,
        Carbon $date,
    ): string {
        $settings = app(SettingService::class);

        $padding = (int) $settings->get(
            'letter_number.number_padding',
            3
        );

        $components = $settings->get(
            'letter_number.format_components',
            []
        );

        $result = '';

        foreach ($components as $component) {
            $type = $component['type'] ?? null;
            $separator = $component['separator'] ?? '';

            $value = match ($type) {
                'number' => str_pad(
                    (string) $sequence,
                    $padding,
                    '0',
                    STR_PAD_LEFT
                ),

                'classification' => Klasifikasi::find($klasifikasiId)?->number ?? '',

                'village_code' => $settings->get(
                    'village.code',
                    ''
                ) ?? '',

                'month' => $date->format('m'),

                'month_roman' => $this->romanMonth($date->month),

                'year' => $date->format('Y'),

                'custom' => $component['custom_text'] ?? '',

                default => '',
            };

            $result .= $value . $separator;
        }

        return $result;
    }

    protected function romanMonth(int $month): string
    {
        return [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ][$month];
    }
}