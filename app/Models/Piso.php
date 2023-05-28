<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['numero'];
    protected $hidden=['id'];

    public function habitaciones()
    {
        return $this->hasMany(Habitacion::class, 'piso_id');
    }
}
