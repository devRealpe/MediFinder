<?php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
    /**
     * El modelo asociado a esta factory.
     *
     * @var string
     */
    protected $model = Ciudad::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'          => $this->faker->city(), // Nombre de ciudad realista
            'departamento_id' => \App\Models\Departamento::factory(), // Relación con departamento
            'created_at'      => now(),
            'updated_at'      => now(),
        ];
    }
}
