<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotele extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_hotel',
        'cadenahotelera',
    ];
}
