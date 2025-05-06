<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    public function run()
    {
        Ciudad::insert([
            ['nombre' => 'Pasto'],
            ['nombre' => 'Ipiales'],
            ['nombre' => 'Tumaco'],
            ['nombre' => 'Tuquerres'],
            ['nombre' => 'Pupiales'],
            ['nombre' => 'Taminango'],
            ['nombre' => 'Colón'],
            ['nombre' => 'Sandona'],
            ['nombre' => 'Olaya Herrera'],
            ['nombre' => 'Guaitarilla'],
        ]);
    }
}
