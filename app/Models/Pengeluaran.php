<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'keuangan_id',
    //     'tipe',
    //     'judul',
    //     'nominal',
    //     'tanggal',
    //     'keterangan',
    //     'total_nominal',
    // ];

    protected $guarded = [];

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }
}
