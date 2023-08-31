<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suspension extends Model
{
    use HasFactory;

    protected $table = 'suspensiones';

    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class);
    }
}
