<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function modelo() :BelongsTo
    {
        return $this->belongsTo(modelo::class, 'modelo_id');
    }

    public function combustible() :BelongsTo
    {
        return $this->belongsTo(Combustible::class, 'combustible_id');
    }


    public function delantera_suspension() :BelongsTo
    {
        return $this->belongsTo(suspension::class, 'delantera_suspension_id');
    }


    public function trasera_suspension() :BelongsTo
    {
        return $this->belongsTo(suspension::class, 'trasera_suspension_id');
    }

    public function sucursal() :BelongsTo
    {
        return $this->belongsTo(sucursal::class, 'sucursal_id');
    }




    

}
