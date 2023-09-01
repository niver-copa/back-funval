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
<<<<<<< HEAD
        $this->call(ClienteSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(ProveedorSeeder::class);
        $this->call(VendedorSeeder::class);
=======


        \App\Models\Sucursal::factory(10)->create();
        $this->call(MarcaSeeder::class);
        $this->call(ModeloSeeder::class);
        $this->call(SuspensionSeeder::class);
        $this->call(CombustibleSeeder::class);
        $this->call(CajaSeeder::class);
        $this->call(VehiculoSeeder::class);

>>>>>>> 8354c49277423fce7e3f17e7f12c7edc2a165e3a
    }
}
