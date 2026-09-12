<?php

namespace App\Filament\Resources\Surats\Schemas;

use App\Models\JenisSurat;
use App\Models\Klasifikasi;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Services\LetterNumberService;

class SuratForm
{
    protected static function updateNumberPreview(
        callable $get,
        callable $set,
    ): void {
        $jenisSuratId = $get('jenis_surat_id');
        $klasifikasiId = $get('klasifikasi_id');
        $tanggalSurat = $get('tanggal_surat');

        if (!$jenisSuratId || !$klasifikasiId || !$tanggalSurat) {
            $set('nomor_surat', null);

            return;
        }

        $preview = app(LetterNumberService::class)->preview(
            jenisSuratId: (int) $jenisSuratId,
            klasifikasiId: (int) $klasifikasiId,
            tanggalSurat: $tanggalSurat,
        );

        $set('nomor_surat', $preview);
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Surat')
                    ->schema([
                        TextInput::make('nomor_surat')
                            ->label('Nomor Surat')
                            ->disabled()
                            ->live()
                            ->dehydrated(false)
                            ->placeholder('Otomatis')
                            ->helperText('Nomor surat akan dibuat otomatis saat surat disimpan.'),

                        DatePicker::make('tanggal_surat')
                            ->label('Tanggal Surat')
                            ->live()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                self::updateNumberPreview($get, $set);
                            })
                            ->required(),

                        Select::make('jenis_surat_id')
                            ->label('Jenis Surat')
                            ->options(
                                JenisSurat::query()
                                    ->with(['category', 'klasifikasi'])
                                    ->orderBy('name')
                                    ->get()
                                    ->mapWithKeys(fn (JenisSurat $jenisSurat) => [
                                        $jenisSurat->id =>
                                            "{$jenisSurat->name} - {$jenisSurat->category->name}",
                                    ])
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $jenisSurat = JenisSurat::with('klasifikasi')->find($state);

                                $set('klasifikasi_id', $jenisSurat?->klasifikasi_id);

                                self::updateNumberPreview($get, $set);
                            })
                            ->required(),

                        Select::make('klasifikasi_id')
                            ->label('Klasifikasi Surat')
                            ->options(
                                Klasifikasi::query()
                                    ->orderBy('number')
                                    ->get()
                                    ->mapWithKeys(fn (Klasifikasi $klasifikasi) => [
                                        $klasifikasi->id =>
                                            "{$klasifikasi->number} - {$klasifikasi->description}",
                                    ])
                                    ->toArray()
                            )
                            ->disabled()
                            ->dehydrated()
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Data Penduduk')
                    ->schema([
                        TextInput::make('nama_penduduk')
                            ->label('Nama Penduduk')
                            ->required(),

                        TextInput::make('nik')
                            ->label('NIK')
                            ->required()
                            ->maxLength(16),

                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->visible(function ($get): bool {
                        $jenisSuratId = $get('jenis_surat_id');

                        if (!$jenisSuratId) {
                            return false;
                        }

                        return JenisSurat::with('category')
                            ->find($jenisSuratId)
                            ?->category?->name === 'Surat Keterangan';
                    }),

                Section::make('Detail Surat')
                    ->schema([
                        Textarea::make('keperluan')
                            ->label('Keperluan')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Pengiriman Surat')
                    ->schema([
                        DatePicker::make('tanggal_kirim')
                            ->label('Tanggal Kirim')
                            ->required(),

                        TextInput::make('tujuan')
                            ->label('Tujuan')
                            ->required(),
                    ])
                    ->columns(2)
                    ->visible(function ($get): bool {
                        $jenisSuratId = $get('jenis_surat_id');

                        if (!$jenisSuratId) {
                            return false;
                        }

                        return JenisSurat::with('category')
                            ->find($jenisSuratId)
                            ?->category?->name === 'Surat Keluar';
                    }),

                Hidden::make('created_by')
                    ->default(fn () => auth()->id()),
            ]);
    }
}