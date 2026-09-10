<?php

namespace App\Filament\Resources\Surats\Pages;

use App\Filament\Resources\Surats\SuratResource;
use Filament\Resources\Pages\CreateRecord;
use App\Services\LetterNumberService;

class CreateSurat extends CreateRecord
{
    protected static string $resource = SuratResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['keperluan'] = ucwords(strtolower($data['keperluan'] ?? ''));

        $data['tujuan'] = ucwords(strtolower($data['tujuan'] ?? ''));

        $data['alamat'] = ucwords(strtolower($data['alamat'] ?? ''));

        $data['nama_penduduk'] = strtoupper($data['nama_penduduk'] ?? '');

        $data['created_by'] = auth()->id();

        $data['edited_by'] = auth()->id();

        $data['nomor_surat'] = app(LetterNumberService::class)->generate(
            jenisSuratId: (int) $data['jenis_surat_id'],
            klasifikasiId: (int) $data['klasifikasi_id'],
            tanggalSurat: $data['tanggal_surat'],
        );

        return $data;
    }
}