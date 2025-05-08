<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Primero sembrar departamentos
        $this->call([
            DepartamentoSeeder::class,
        ]);

        // 2. Luego sembrar ciudades que dependen de departamentos
        $this->call([
            CiudadSeeder::class,
        ]);

        // 3. Sembrar el resto
        $this->call([
            RepresentanteLegalSeeder::class,
        ]);

        // 4. Finalmente, el usuario de prueba
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
