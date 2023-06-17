<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imagen' => 'images/hotel.jpg',
            'nombre' => 'Estela Del Horizonte',
            'cadena' => 'Cadena Serenia',
            'logo' => 'images/logo.png',
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'email' => 'infoestelahorizonte@gmail.com',
            'ciudad' => $this->faker->city,
        ];
    }
}
