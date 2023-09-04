<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Suspension;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(VendedorSeeder::class);
        
        \App\Models\Sucursal::factory(10)->create();
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(SuspensionSeeder::class);
        $this->call(CombustibleSeeder::class);
        $this->call(CajaSeeder::class);
        $this->call(VehiculoSeeder::class);
    }
}
