<?php

namespace App\Models;

use App\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use LogsActivity;

    protected $fillable = [
        'number',
        'description',
    ];

    public function jenisSurats()
    {
        return $this->hasMany(JenisSurat::class);
    }
}