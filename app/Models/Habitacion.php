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
}
