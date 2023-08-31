<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'modelo_id'=> Modelo::inRandomOrder()->first()->id,
            'combustible_id'=> Combustible::inRandomOrder()->first()->id,
            'potencia'=> fake()->numberBetween(109, 6000),
            'torque_maximo'=> fake()->numberBetween(141, 4200),
            'ubicacion'=> fake()->name(),
            'cilindros'=> fake()->name(),
            'diametro_carrera'=> fake()->name(),
            'cilindraje'=> fake()->name(),
            'compresion'=> fake()->randomNumber(),
            'alimentacion'=> fake()->name(),
            'caja_id'=> fake()->name(),
            'velocidades'=> fake()->name(),
            'traccion'=> fake()->name(),
            'delantera_suspension_id'=> Suspencion::inRandomOrder()->first()->id,
            'trasera_suspension_id'=> Suspencion::inRandomOrder()->first()->id,
            'frenos_delanteros'=> fake()->name(),
            'color'=> fake()->name(),
            'anio'=> fake()->name(),
            'sucursal_id'=> Sucursal::inRandomOrder()->first()->id
           
        ];
    }
}
