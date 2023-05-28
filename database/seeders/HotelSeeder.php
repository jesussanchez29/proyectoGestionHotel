<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{

    public function run(): void
    {
        $hotel = new Hotel();
        $hotel->imagen = 'images/slideshow/full-slide-1.jpg';
        $hotel->nombre = 'Estela Del Horizonte';
        $hotel->cadena = 'Cadena Serenia';
        $hotel->logo = 'images/logo.png';
        $hotel->direccion = 'Trinidad Grund, 17';
        $hotel->telefono = '612 345 678';
        $hotel->email = '';
        $hotel->ciudad = 'Malaga';
        $hotel->save();
    }
}