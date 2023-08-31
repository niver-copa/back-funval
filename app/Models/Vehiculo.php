<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id',
        'combustible_id',
        'potencia',
        'torque_maximo',
        'ubicacion',
        'cilindros',
        'diametro_carrera',
        'cilindraje'=>'required',
        'compresion',
        'alimentacion',
        'caja_id',
        'velocidades',
        'traccion',
        'delantera_suspension_id',
        'trasera_suspension_id',
        'frenos_delanteros',
        'color',
        'anio',
        'sucursal_id'
    ];


}
