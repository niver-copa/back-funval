<?php

namespace Database\Seeders;

use App\Models\Combustible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Combustible::create(['nombre' => 'Gasolina']);
        Combustible::create(['nombre' => 'Diesel']);
        Combustible::create(['nombre' => 'GLP']);
        Combustible::create(['nombre' => 'Electricidad']);

    }
}
