<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sucursal>
 */
class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'codigo' => fake()->unique()->randomNumber(5),
            'calle' => fake()->address(),
            'num_exterior' => fake()->randomNumber(4),
            'num_interior' => fake()->randomNumber(4),
            'localidad' => fake()->name(),
            'colonia' => fake()->name(),
            'ciudad' => fake()->city(),
            'cod_postal' => fake()->countryCode(),
            'referencia' => fake()->sentence(4),
            'municipio' => fake()->city(),
            'pais' => fake()->country(),
            'estado' => true,
        ];
    }
}
