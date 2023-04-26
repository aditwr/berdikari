<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKeuangan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }

    public function pemasukan()
    {
        return $this->hasOne(Pemasukan::class);
    }

    public function pengeluaran()
    {
        return $this->hasOne(Pengeluaran::class);
    }
}
