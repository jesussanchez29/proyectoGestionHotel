<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['fechaLlegada', 'fechaSalida', 'abonado', 'estadoReserva_id', 'usuario_id', 'habitacion_id', 'empleado_id'];
    protected $hidden = ['id'];

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'reservaServicio', 'reserva_id', 'servicio_id');
    }

    public function acompanantes()
    {
        return $this->hasMany(Acompanante::class, 'reserva_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
