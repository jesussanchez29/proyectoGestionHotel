<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Crea el usuario
    $usuarioData = [
        'imagenPerfil' => 'images/perfilDefecto.png',
        'email' => 'jesus@gmail.com',
        'password' => Hash::make('usuario1'), // Puedes ajustar la contraseña aquí o generarla aleatoriamente
        'primerInicioSesion' => false,
        'estado' => true
    ];
    $usuario = Usuario::create($usuarioData);

    // Crea el empleado y asigna el usuario
    $empleadoData = [
        'nombre' => 'Nombre del empleado',
        'apellidos' => 'Apellidos del empleado',
        'fechaNacimiento' => '1990-01-01',
        'dni' => '12345678A',
        'telefono' => '123456789',
        'direccion' => 'Calle Principal 123',
        'departamento_id' => 1,
        'usuario_id' => $usuario->id,
    ];
    Empleado::create($empleadoData);    
    }
}
