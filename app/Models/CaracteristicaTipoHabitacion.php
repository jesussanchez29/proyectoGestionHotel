<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicaTipoHabitacion extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'caracteristicaTipoHabitacion';
    protected $primaryKey = "id";
    protected $fillable = ['nombre', 'descripcion', 'tipoHabitacion_id'];
    protected $hidden = ['id'];

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipoHabitacion_id');
    }
}
