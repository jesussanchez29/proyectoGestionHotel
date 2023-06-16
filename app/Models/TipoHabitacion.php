<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;
    protected $table = 'tipoHabitacion';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['imagen', 'nombre', 'capacidad', 'descripcion', 'precio'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Reseña.
    public function resena()
    {
        return $this->hasMany(Resena::class, 'tipoHabitacion_id');
    }

    // Definición de la relación con el modelo Habitacion.
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'tipoHabitacion_id');
    }

    // Definición de la relación con el modelo Caracteristica.
    public function caracteristicas()
    {
        return $this->hasMany(CaracteristicaTipoHabitacion::class);
    }
}
