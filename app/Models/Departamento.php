<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['icono', 'nombre', 'descripcion'];
    protected $hidden=['id'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
