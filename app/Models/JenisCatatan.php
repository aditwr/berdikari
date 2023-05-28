<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCatatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function catatan()
    {
        return $this->hasMany(Catatan::class);
    }
}
