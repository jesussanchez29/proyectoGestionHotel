<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;
    protected $table = 'tipoHabitacion';
    protected $primaryKey = "id";
    protected $fillable = ['imagen', 'nombre', 'capacidad', 'descripcion', 'precio'];
    protected $hidden = ['id'];

    public function resena()
    {
        return $this->hasMany(Resena::class, 'tipoHabitacion_id');
    }

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'tipoHabitacion_id');
    }

    public function caracteristicas()
    {
        return $this->hasMany(CaracteristicaTipoHabitacion::class);
    }
}
