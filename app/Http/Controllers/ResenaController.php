<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResenaRequest;
use App\Models\Resena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{

    public function indexEmpleado()
    {
        $resenas = Resena::all();
        return view('Empleados.Resena.index', compact('resenas'));
    }

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

    public function cambiarEstado($id)
    {
        $resena = Resena::findOrFail($id);
        if ($resena->estado == 0) {
            $resena->estado = 1; // Actualizar el estado a 1
        } else {
            $resena->estado = 0; // Actualizar el estado a 0
        }
        $resena->save(); // Guardar los cambios en la base de datos
        return redirect()->route('resenas')->with('success', 'Estado Reseña modificado correctamente');

    }
    

    public function destroy($id)
    {
        //Obtiene el tipo de habitacion a partir del id
        $resena = Resena::find($id);
        //Elimina al tipo de habitacion
        $resena->delete();
        // Nos piso a tipoHabitaciones con un mensaje
        return redirect()->route('resenas')->with('success', 'Piso eliminado correctamente');
    }
}
