<?php

namespace Database\Factories;

use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departamento = Departamento::inRandomOrder()->first();
        $usuario = Usuario::factory()->create()->id;

        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'fechaNacimiento' => $this->faker->date,
            'dni' => $this->faker->unique()->numerify('########'),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'departamento_id' => $departamento->id,
            'usuario_id' => $usuario
        ];
    }
}
