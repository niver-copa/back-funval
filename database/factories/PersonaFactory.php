<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'telefono' => fake()->phoneNumber(),
            'sexo' => fake()->word(),
            'fecha_nacimiento' => fake()->date(),
            'documento_identificacion' => fake()->date(),
            'direccion' => fake()->streetAddress(),
            'codigo_postal' => fake()->creditCardNumber(),
            'pais' => fake()->country(),
        ];
    }
}
