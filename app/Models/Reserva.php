<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['fechaLlegada', 'fechaSalida', 'abonado', 'estado', 'usuario_id', 'habitacion_id', 'empleado_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Servicio.
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'reservaServicio', 'reserva_id', 'servicio_id');
    }

    // Definición de la relación con el modelo Acompañante.
    public function acompanante()
    {
        return $this->hasMany(Acompanante::class, 'reserva_id');
    }

    // Definición de la relación con el modelo Habitacion.
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }

    // Definición de la relación con el modelo Usuario.
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Definición de la relación con el modelo Empleado.
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
