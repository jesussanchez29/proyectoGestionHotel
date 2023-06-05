<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicio>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'imagen' => $this->faker->imageUrl(),
            'horaInicio' => $this->faker->time('H:i'),
            'duracion' => '20',
            'horaFin' => $this->faker->time('H:i'),
            'precio' => $this->faker->randomFloat(2, 10, 100),
            'disponibilidad' => $this->faker->boolean,
        ];
    }
}
