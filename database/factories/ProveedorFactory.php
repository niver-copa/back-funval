<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'persona_id' => 1,
            'nombre_empresa' => fake()->company(),
            'telefono_empresa' => fake()->phoneNumber(),
            'email_empresa' => fake()->email(),
            'direccion_empresa' => fake()->address()              
        ];
    }
}
