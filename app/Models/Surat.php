<?php

namespace App\Models;

use App\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surat extends Model
{
    use LogsActivity;

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'jenis_surat_id',
        'klasifikasi_id',
        'nama_penduduk',
        'nik',
        'alamat',
        'keperluan',
        'tanggal_kirim',
        'tujuan',
        'created_by',
        'edited_by',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_kirim' => 'date',
    ];

    public function jenisSurat(): BelongsTo
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function klasifikasi(): BelongsTo
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}