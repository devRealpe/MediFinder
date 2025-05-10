<?php

namespace Database\Factories;

use App\Models\RepresentanteLegal;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepresentanteLegalFactory extends Factory
{
    /**
     * El modelo asociado a esta factory.
     *
     * @var string
     */
    protected $model = RepresentanteLegal::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
        ];
    }
}
