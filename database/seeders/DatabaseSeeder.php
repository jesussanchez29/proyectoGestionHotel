<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClienteSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(TipoHabitacionSeeder::class);
        $this->call(CaracteristicaTipoHabitacionSeeder::class);
        $this->call(EstadoHabitacionSeeder::class);
        $this->call(PisoSeeder::class);
    }
}
