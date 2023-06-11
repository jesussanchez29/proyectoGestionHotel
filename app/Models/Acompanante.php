<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;
    protected $table = 'acompanantes';
    protected $primaryKey="id";
    protected $fillable=['nombre', 'apellidos', 'fechaNacimiento', 'tipoIdentificacion', 'identificacion', 'telefono','reserva_id'];
    protected $hidden=['id'];
    
    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }
}
