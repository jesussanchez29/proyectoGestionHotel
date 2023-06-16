<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'horaInicio', 'horaFin', 'duracion', 'capacidad', 'precio'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Reserva.
    public function reserva()
    {
        return $this->belongsToMany(Reserva::class);
    }
}
