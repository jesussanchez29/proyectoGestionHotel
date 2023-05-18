<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre', 'descripcion', 'imagen', 'horaInicio', 'horaFin', 'precio', 'disponiblidad'];
    protected $hidden=['id'];
}
