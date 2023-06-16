<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['numero'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Habitacion.
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'piso_id');
    }
}
