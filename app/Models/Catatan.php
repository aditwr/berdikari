<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenisCatatan()
    {
        return $this->belongsTo(JenisCatatan::class);
    }
}
