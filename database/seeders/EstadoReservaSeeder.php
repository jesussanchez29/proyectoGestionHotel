<?php

namespace Database\Seeders;

use App\Models\EstadoReserva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadoReserva::create(['nombre' => 'Confirmada']);
        EstadoReserva::create(['nombre' => 'Por confirmar']);
        EstadoReserva::create(['nombre' => 'Cancelada']);
    }
}
