<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
        Departamento::insert([
            ['nombre' => 'Centro',         'ciudad_id' => 1],
            ['nombre' => 'Norte',          'ciudad_id' => 1],
            ['nombre' => 'Sur',            'ciudad_id' => 2],
            ['nombre' => 'Occidente',      'ciudad_id' => 2],
            ['nombre' => 'Oriente',        'ciudad_id' => 3],
            ['nombre' => 'Rural',          'ciudad_id' => 3],
            ['nombre' => 'Costanera',      'ciudad_id' => 4],
            ['nombre' => 'Urbano',         'ciudad_id' => 5],
            ['nombre' => 'Suburbano',      'ciudad_id' => 6],
            ['nombre' => 'Municipal',      'ciudad_id' => 7],
            ['nombre' => 'Veredal',        'ciudad_id' => 8],
            ['nombre' => 'Residencial',    'ciudad_id' => 9],
            ['nombre' => 'Industrial',     'ciudad_id' => 10],
        ]);
    }
}
