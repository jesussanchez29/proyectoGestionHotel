<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['nombre', 'apellidos', 'fechaNacimiento', 'tipoIdentificacion', 'identificacion', 'telefono', 'direccion', 'usuario_id'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];

    // Definición de la relación con el modelo Usuario.
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
