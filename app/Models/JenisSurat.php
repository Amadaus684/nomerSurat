<?php

namespace App\Models;

use App\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use LogsActivity;

    protected $fillable = [
        'category_id',
        'klasifikasi_id',
        'name',
        'description',
    ];

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }

    public function category()
    {
        return $this->belongsTo(SuratCategory::class, 'category_id');
    }

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
