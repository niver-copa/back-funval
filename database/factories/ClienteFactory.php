<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'persona_id' => Persona::all()->random(),
            'referencias' => fake()->address(),
            'historial_de_compras' => fake()->date(),
            'nivel_de_satisfaccion' => fake()->lastName(),
            'comentarios_observaciones' => fake()->date(),
        ];
    }
}
