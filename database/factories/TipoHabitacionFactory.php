<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoHabitacion>
 */
class TipoHabitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imagen' => $this->faker->imageUrl(),
            'nombre' => $this->faker->unique()->word,
            'descripcion' => $this->faker->sentence,
            'capacidad' => $this->faker->numberBetween(1, 10),
            'precio' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
