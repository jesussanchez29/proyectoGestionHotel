<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre', 'descripcion', 'imagen', 'horaInicio', 'horaFin', 'duracion', 'capacidad', 'precio'];
    protected $hidden=['id'];

    public function reserva()
    {
        return $this->belongsToMany(Reserva::class);
    }
}
