<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaTipoHabitacion extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'caracteristicaTipoHabitacion';
    protected $primaryKey="id";
    protected $fillable=['nombre', 'descripcion', 'icono', 'tipo_habitacion_id'];
    protected $hidden=['id'];
}
