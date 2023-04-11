<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    public function keuangan()
    {
        return $this->belongsTo(Keuangan::class);
    }
}
