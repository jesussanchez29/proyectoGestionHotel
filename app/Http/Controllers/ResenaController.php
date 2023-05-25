<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResenaRequest;
use App\Models\Resena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{
    // Funcion para crear un departamento
    public function create(ResenaRequest $request, $tipoHabitacion)
    {
        $resena = new Resena();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $resena->puntuacion = $request->input('puntuacion'); ;
        $resena->comentario = $request->input('comentario');
        $resena->estado = false;
        $resena->usuario_id = Auth::id();
        $resena->tipoHabitacion_id = $tipoHabitacion; 
        $resena->save();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('verTipoHabitacion', $tipoHabitacion.'#resena')->with('success', 'Reseña registrada corectamente, espera a que el administrador lo valide');
    }
}
