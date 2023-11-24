<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis()
    {
        return $this->belongsTo(JenisInventaris::class);
    }
}
