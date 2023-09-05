<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    use HasFactory;
    public function cliente():HasOne
    {
        return $this->hasOne(Cliente::class);
    }
    public function proveedor():HasOne
    {
        return $this->hasOne(Proveedor::class);
    }
    public function vendedor():HasOne
    {
        return $this->hasOne(Vendedor::class);
    }
}
