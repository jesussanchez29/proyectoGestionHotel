<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    // Nombre de la tabla en la base de datos
    protected $table = 'hotel';
    // Nombre de la clave primaria en la tabla
    protected $primaryKey = "id";
    // Atributos del modelo
    protected $fillable = ['imagen', 'nombre', 'cadena', 'logo', 'direccion', 'telefono', 'email', 'ciudad'];
    // Atributos del modelo que no se mostrarán
    protected $hidden = ['id'];
}
