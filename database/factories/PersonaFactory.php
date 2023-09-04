<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::all()->random(),
            'apellidos' => fake()->lastName(),
            'telefono' => fake()->phoneNumber(),
            'sexo' => fake()->word(),
            'fecha_nacimiento' => fake()->date(),
            'documento_identificacion' => fake()->creditCardNumber(),
            'direccion' => fake()->streetAddress(),
            'codigo_postal' => fake()->creditCardNumber(),
            'pais' => fake()->country(),
            'state' => fake()->boolean(),
        ];
    }
}
