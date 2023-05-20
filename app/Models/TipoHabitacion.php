<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    use HasFactory;
    protected $table = 'Tipohabitacion';
    protected $primaryKey="id";
    protected $fillable=['imagen', 'nombre', 'capacidad', 'descripcion', 'precio'];
    protected $hidden=['id'];
}
