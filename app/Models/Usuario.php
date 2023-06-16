<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['imagenPerfil', 'email', 'password', 'primer_inicio_sesion', 'estado'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Empleado.
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    // Definición de la relación con el modelo Cliente.
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    // Definición de la relación con el modelo Reseña.
    public function resena()
    {
        return $this->hasMany(Resena::class);
    }

    // Definición de la relación con el modelo Reserva.
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Definición para comprobar si tiene una reserva.
    public function tieneReservaActual()
    {
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $this->reservas()
            ->whereDate('fechaLLegada', '<=', $fechaActual)
            ->whereDate('fechaSalida', '>=', $fechaActual)
            ->exists();

        return false;
    }

    // Definición para obtener la reserva actual.
    public function reservaActual()
    {
        return $this->hasMany(Reserva::class)
            ->where('fechaLLegada', '<=', now()) // Fecha de inicio menor o igual a la fecha actual
            ->where('fechaSalida', '>=', now()) // Fecha de fin mayor o igual a la fecha actual
            ->first(); // Obtener solo la primera reserva actual
    }
}
