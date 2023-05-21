<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['fechaLlegada', 'fechaSalida', 'abonado', 'estadoReserva_id', 'cliente_id', 'habitacion_id', 'empleado_id'];
    protected $hidden=['id'];
}
