<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicio extends Model
{
    use HasFactory;
    // Nombre de la tabla en la base de datos
    protected $table = 'reservaServicio';
    // Atributos del modelo
    protected $fillable = ['reserva_id', 'servicio_id', 'fecha', 'hora'];

    // Relación con el modelo Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
