<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo    
    protected $fillable = ['nombre', 'apellidos', 'fechaNacimiento', 'dni', 'telefono', 'direccion', 'departamento_id', 'usuario_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Departamento.
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    // Definición de la relación con el modelo Usuario.
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
