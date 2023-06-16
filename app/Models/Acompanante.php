<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;
    // Nombre de la tabla en la base de datos
    protected $table = 'acompanantes';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey="id";
    // Atributos del modelo
    protected $fillable=['nombre', 'apellidos', 'fechaNacimiento', 'tipoIdentificacion', 'identificacion', 'telefono','reserva_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden=['id'];
    
    // Definición de la relación con el modelo Reserva.
    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
