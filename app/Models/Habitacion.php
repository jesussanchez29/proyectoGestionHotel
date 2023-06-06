<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;
    protected $table = 'habitaciones';
    protected $primaryKey="id";
    protected $fillable=['numero', 'estadoHabitacion_id', 'piso_id', 'tipoHabitacion_id'];
    protected $hidden=['id'];

    public function estado()
    {
        return $this->belongsTo(EstadoHabitacion::class, 'estadoHabitacion_id');
    }

    public function piso()
    {
        return $this->belongsTo(Piso::class, 'piso_id');
    }

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipoHabitacion_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
