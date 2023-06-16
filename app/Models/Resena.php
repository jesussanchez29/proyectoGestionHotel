<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;
    protected $table = 'acompanantes';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['puntuacion', 'comentario', 'estado', 'usuario_id', 'tipoHabitacion_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Usuario.
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Definición de la relación con el modelo Tipo habitacion.
    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipoHabitacion_id');
    }
}
