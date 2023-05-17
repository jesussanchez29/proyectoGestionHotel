<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipoIdentificacion = $this->faker->randomElement(['DNI', 'Pasaporte', 'Carnet Conducir']);

        $identificacion = '';
        if ($tipoIdentificacion === 'DNI') {
            $identificacion = $this->faker->unique()->numerify('########');
        } elseif ($tipoIdentificacion === 'Pasaporte') {
            $identificacion = $this->faker->unique()->regexify('[A-Z]{2}[0-9]{7}');
        } elseif ($tipoIdentificacion === 'Carnet Conducir') {
            $identificacion = $this->faker->unique()->numerify('########');
        }

        return [
            'nombre' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'fechaNacimiento' => $this->faker->date,
            'tipoIdentificacion' => $tipoIdentificacion,
            'identificacion' => $identificacion,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make($this->faker->password), // Puedes ajustar la contraseña aquí o generarla aleatoriamente
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
        ];
    }
}
