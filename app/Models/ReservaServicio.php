<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaServicio extends Model
{
    use HasFactory;
    protected $table = 'reservaServicio';
    protected $fillable = ['reserva_id', 'servicio_id', 'fecha', 'hora'];

    // Relación con el modelo Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }
}
