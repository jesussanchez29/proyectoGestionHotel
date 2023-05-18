<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotel';
    protected $primaryKey="id";
    protected $fillable=['imagen', 'nombre', 'cadena', 'logo', 'direccion', 'telefono', 'email', 'ciudad'];
    protected $hidden=['id'];
}
