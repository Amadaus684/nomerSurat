<?php

namespace App\Models;

use App\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use LogsActivity;

    protected $fillable = [
        'klasifikasi_id',
        'name',
        'description',
    ];

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }
}
