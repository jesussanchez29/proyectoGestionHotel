<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoHabitacion extends Model
{
    use HasFactory;
    protected $table = 'estadoHabitacion';
    protected $primaryKey="id";
    protected $fillable=['nombre'];
    protected $hidden=['id'];
    
    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'estadoHabitacion_id');
    }
}
