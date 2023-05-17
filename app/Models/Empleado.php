<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empleado extends Authenticatable
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre', 'apellidos', 'fechaNacimiento', 'dni', 'email', 'password', 'telefono', 'direccion', 'estado', 'departamento_id'];
    protected $hidden=['id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
