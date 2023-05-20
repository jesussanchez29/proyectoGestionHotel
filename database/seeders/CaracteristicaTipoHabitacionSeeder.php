<?php

namespace Database\Seeders;

use App\Models\CaracteristicaTipoHabitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaracteristicaTipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaracteristicaTipoHabitacion::factory()->count(8)->create();
    }
}
