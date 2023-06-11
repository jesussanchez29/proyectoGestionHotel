<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResenaRequest;
use App\Models\Resena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{
    // Funcion para enviar las reseñas a la vista de rsenas
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $resenas = Resena::all();
            return view('Empleados.Resena.index', compact('resenas'));
        }
    }

    // Funcion para crear una reseña
    public function create(ResenaRequest $request, $tipoHabitacion)
    {
        $resena = new Resena();
        // Guardamos los datos
        $resena->puntuacion = $request->input('puntuacion');;
        $resena->comentario = $request->input('comentario');
        $resena->estado = false;
        $resena->usuario_id = Auth::id();
        $resena->tipoHabitacion_id = $tipoHabitacion;
        // Creamos la reseña
        $resena->save();
        // Nos redirige a la secion reseña con un mensaje
        return redirect()->route('verTipoHabitacion', $tipoHabitacion . '#resena')->with('success', 'Reseña registrada corectamente, espera a que el administrador lo valide');
    }

    // FUncion para cambiar el estado de una reseña
    public function cambiarEstado($id)
    {
        // Obtiene la reseña a partir del id
        $resena = Resena::findOrFail($id);
        // Si su estado es igual a 0
        if ($resena->estado == 0) {
            // Actualizar el estado a 1
            $resena->estado = 1;
        } else {
             // Actualizar el estado a 0
            $resena->estado = 0;
        }
        // Actualizamos la reseña
        $resena->save();
        // Nos redirige a la resena reseña con un mensaje
        return redirect()->route('resenas')->with('success', 'Estado Reseña modificado correctamente');
    }

    // FUncion para eliminar una reseña
    public function destroy($id)
    {
        // Obtiene la reseña a partir del id
        $resena = Resena::find($id);
        //Elimina a la reseña
        $resena->delete();
        // Nos redirige a reseña con un mensaje
        return redirect()->route('resenas')->with('success', 'Piso eliminado correctamente');
    }
}
