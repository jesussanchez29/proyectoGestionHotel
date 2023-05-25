<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = ['email', 'password', 'primer_inicio_sesion', 'estado'];
    protected $hidden = ['id'];

    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function resena()
    {
        return $this->hasMany(Resena::class);
    }
}
