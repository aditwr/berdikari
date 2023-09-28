<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    // define table
    protected $table = 'artikels';
    protected $guarded = [];
}
