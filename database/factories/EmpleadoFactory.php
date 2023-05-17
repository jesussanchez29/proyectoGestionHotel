<?php

namespace Database\Factories;

use App\Models\Departamento;
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

        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'fechaNacimiento' => $this->faker->date,
            'dni' => $this->faker->unique()->numerify('########'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make($this->faker->password), // Puedes ajustar la contraseña aquí o generarla aleatoriamente
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'estado' => $this->faker->randomElement([true, false]),
            'departamento_id' => $departamento->id,
        ];
    }
}
