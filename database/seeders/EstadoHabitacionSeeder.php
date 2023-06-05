<?php

namespace Database\Seeders;

use App\Models\EstadoHabitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoHabitacion::create(['nombre' => 'Disponible', 'clase' => 'success']);
        EstadoHabitacion::create(['nombre' => 'Ocupada', 'clase' => 'danger']);
        EstadoHabitacion::create(['nombre' => 'Limpieza','clase' => 'info']);
    }
}
