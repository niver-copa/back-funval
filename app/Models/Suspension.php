<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suspension extends Model
{
    use HasFactory;

    protected $table = 'suspensiones';

    public function vehiculos_t(): HasMany
    {
        return $this->hasMany(Vehiculo::class,'trasera_suspension_id');
    }
    public function vehiculos_d(): HasMany
    {
        return $this->hasMany(Vehiculo::class,'delantera_suspension_id');
    }

}
