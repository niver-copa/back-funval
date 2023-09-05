<?php

namespace Database\Factories;

use App\Models\Caja;
use App\Models\Combustible;
use App\Models\Modelo;
use App\Models\Sucursal;
use App\Models\Suspension;
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
            'matricula' => fake()->unique()->word(),
            'precio'=> fake()->numberBetween(20000, 80000),
            'combustible_id'=> Combustible::inRandomOrder()->first()->id,
            'potencia'=> fake()->numberBetween(109, 6000),
            'torque_maximo'=> fake()->numberBetween(141, 4200),
            'ubicacion'=> fake()->word(),
            'cilindros'=> fake()->word(),
            'diametro_carrera'=> fake()->word(),
            'cilindraje'=> fake()->word(),
            'compresion'=> fake()->randomNumber(),
            'alimentacion'=> fake()->word(),
            'caja_id'=> Caja::inRandomOrder()->first()->id,
            'velocidades'=> fake()->numberBetween(2, 10),
            'traccion'=> fake()->word(),
            'delantera_suspension_id'=> Suspension::inRandomOrder()->first()->id,
            'trasera_suspension_id'=> Suspension::inRandomOrder()->first()->id,
            'frenos_delanteros'=> fake()->word(),
            'color'=> fake()->colorName(),
            'anio'=> fake()->year(),
            'descripcion'=> fake()->word(),
            'sucursal_id'=> Sucursal::inRandomOrder()->first()->id
           
        ];
    }
}
