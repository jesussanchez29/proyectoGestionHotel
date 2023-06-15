<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['imagenPerfil', 'email', 'password', 'primer_inicio_sesion', 'estado'];
    protected $hidden = ['id'];

    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function resena()
    {
        return $this->hasMany(Resena::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function tieneReservaActual()
    {
        $fechaActual = Carbon::now()->format('Y-m-d');

        return $this->reservas()
            ->whereDate('fechaLLegada', '<=', $fechaActual)
            ->whereDate('fechaSalida', '>=', $fechaActual)
            ->exists();

        return false;
    }

    public function reservaActual()
    {
        return $this->hasMany(Reserva::class)
            ->where('fechaLLegada', '<=', now()) // Fecha de inicio menor o igual a la fecha actual
            ->where('fechaSalida', '>=', now()) // Fecha de fin mayor o igual a la fecha actual
            ->first(); // Obtener solo la primera reserva actual
    }
}
