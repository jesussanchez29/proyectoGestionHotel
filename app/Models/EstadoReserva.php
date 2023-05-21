<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoReserva extends Model
{
    use HasFactory;
    protected $table = 'estadoReserva';
    protected $primaryKey="id";
    protected $fillable=['nombre'];
    protected $hidden=['id'];
}
