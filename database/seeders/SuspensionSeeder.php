<?php

namespace Database\Seeders;

use App\Models\Suspension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuspensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Suspension::factory(10)->create();

    }
}
