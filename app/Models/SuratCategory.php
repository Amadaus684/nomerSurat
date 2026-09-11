<?php

namespace App\Models;

use App\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class SuratCategory extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
    ];

    public function jenisSurats()
    {
        return $this->hasMany(JenisSurat::class, 'category_id');
    }

    public function surats()
    {
        return $this->hasManyThrough(
            Surat::class,
            JenisSurat::class,
            'category_id',
            'jenis_surat_id',
            'id',
            'id'
        );
    }
}