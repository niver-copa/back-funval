<?php

namespace Database\Factories;

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
            'persona_id' => 1,
            'referencias' => fake()->address(),
            'historial_de_compras' => fake()->date(),
            'nivel_de_satisfaccion' => fake()->lastName(),
            'comentarios_observaciones' => fake()->date(),
        ];
    }
}
