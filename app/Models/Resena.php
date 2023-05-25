<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['puntuacion', 'comentario', 'estado', 'usuario_id', 'tipoHabitacion_id'];
    protected $hidden = ['id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class);
    }
}
