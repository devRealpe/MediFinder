<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamada a los seeders de datos maestros
        $this->call([
            CiudadSeeder::class,
            DepartamentoSeeder::class,
            RepresentanteLegalSeeder::class,
        ]);

        // Usuario de prueba
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
