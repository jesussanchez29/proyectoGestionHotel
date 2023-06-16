<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaTipoHabitacion extends Model
{
    use HasFactory;
    // Nombre de la tabla en la base de datos
    protected $table = 'caracteristicaTipoHabitacion';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['nombre', 'descripcion', 'tipoHabitacion_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo TipoHabitacion.
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipoHabitacion_id');
    }
}
