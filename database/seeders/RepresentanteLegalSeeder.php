<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RepresentanteLegal;

class RepresentanteLegalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        RepresentanteLegal::insert([
            ['nombre' => 'María Casanova'],
            ['nombre' => 'Karoll Delgado'],
            ['nombre' => 'Johan Ordoñez'],
            ['nombre' => 'Giovanny Hernandez'],
            // agrega más según necesites
        ]);
    }
}
