<?php

namespace Database\Factories;

use App\Models\TipoHabitacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CaracteristicaTipoHabitacion>
 */
class CaracteristicaTipoHabitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipoHabitacion = TipoHabitacion::inRandomOrder()->first();

        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'icono' => $this->faker->randomElement(['icono1.png', 'icono2.png', 'icono3.png']),
            'tipoHabitacion_id' => $tipoHabitacion
        ];
    }
}
