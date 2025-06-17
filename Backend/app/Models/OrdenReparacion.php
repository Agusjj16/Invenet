<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenReparacion extends Model
{
    use HasFactory;

    protected $table = 'orden_reparacion';
    protected $fillable = [
        'fecha_orden',
        'fecha_reparacion',
        'descripcion',
    ];
}
