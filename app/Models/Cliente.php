<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre', 'apellidos', 'fechaNacimiento', 'tipoIdentificacion', 'identificacion', 'telefono', 'direccion', 'usuario_id'];
    protected $hidden=['id'];
    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
