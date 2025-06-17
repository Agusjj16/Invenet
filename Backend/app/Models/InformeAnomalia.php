<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeAnomalia extends Model
{
    use HasFactory;

    protected $table = 'informe_anomalia';
    
    protected $fillable = [
        'descripcion',
        'fecha_informe',
    ];
}
