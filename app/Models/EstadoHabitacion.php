<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoHabitacion extends Model
{
    use HasFactory;
    // Nombre de la tabla en la base de datos
    protected $table = 'estadoHabitacion';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo    
    protected $fillable = ['nombre', 'clase'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Habitacion.
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'estadoHabitacion_id');
    }
}
