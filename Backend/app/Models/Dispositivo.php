<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'estado',
        'marca',
        'fecha_ingreso',
        'componentes',
        'num_serie',
    ];

}
