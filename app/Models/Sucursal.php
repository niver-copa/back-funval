<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'calle',
        'localidad',
        'ciudad',
        'cod_postal',
        'referencia',
        'municipio',
        'pais',
        'num_exterior',
        'num_interior',
        'colonia',
        'estado',
    ];
}
