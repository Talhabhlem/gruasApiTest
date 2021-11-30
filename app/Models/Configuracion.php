<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    protected $fillable = [
        'longitud_de_pluma',
        'radio',
        'peso',
        'grua',
        'configuracion'
    ];
}
