<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'referencias' => fake()->address(),
            'historial_de_compras' => fake()->date(),
            'Nivel_de_satisfaccion' => fake()->lastName(),
            'Comentarios_observaciones' => fake()->date(),
        ];
    }
}
