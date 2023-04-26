<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }

    public function riwayatKeuangan()
    {
        return $this->belongsTo(RiwayatKeuangan::class);
    }
}
