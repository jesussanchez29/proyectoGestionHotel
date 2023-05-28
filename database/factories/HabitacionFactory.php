<?php

namespace Database\Factories;

use App\Models\EstadoHabitacion;
use App\Models\Piso;
use App\Models\TipoHabitacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitacion>
 */
class HabitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estado = EstadoHabitacion::inRandomOrder()->first();
        $piso = Piso::inRandomOrder()->first();
        $tipoHabitacion = TipoHabitacion::inRandomOrder()->first();

            return [
                'numero' => $this->faker->unique()->randomNumber(3),
                'estadoHabitacion_id' => $estado,
                'piso_id' => $piso,
                'tipoHabitacion_id' => $tipoHabitacion,
            ];
    }
}
