<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $fillable = [
        'keuangan_id',
        'tipe',
        'judul',
        'nominal',
        'tanggal',
        'keterangan',
        'total_nominal',
    ];

    use HasFactory;

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }
}
