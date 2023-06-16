<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    // Nombre de la tabla en la base de datos
    protected $table = 'habitaciones';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo    
    protected $fillable = ['numero', 'estadoHabitacion_id', 'piso_id', 'tipoHabitacion_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Estado.
    public function estado()
    {
        return $this->belongsTo(EstadoHabitacion::class, 'estadoHabitacion_id');
    }

    // Definición de la relación con el modelo Piso.
    public function piso()
    {
        return $this->belongsTo(Piso::class, 'piso_id');
    }

    // Definición de la relación con el modelo Tipo habitacion.
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipoHabitacion_id');
    }

    // Definición de la relación con el modelo Reserva.
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
