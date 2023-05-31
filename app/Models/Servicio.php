<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre', 'descripcion', 'imagen', 'horaInicio', 'horaFin', 'duracion', 'precio', 'disponiblidad'];
    protected $hidden=['id'];

    public function obtenerHorasDisponibles($fecha)
    {
        
        $horasDisponibles = [];

        $inicio = Carbon::createFromFormat('Y-m-d H:i', $fecha . ' ' . $this->horaInicio);
        $fin = Carbon::createFromFormat('Y-m-d H:i', $fecha . ' ' . $this->horaFin);

        while ($inicio->addMinutes($this->duracion)->lte($fin)) {
            $horasDisponibles[] = $inicio->format('H:i');
        }

        return $horasDisponibles;
    }
}
