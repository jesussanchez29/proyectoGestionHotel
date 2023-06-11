<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoHabitacionRequest;
use App\Models\EstadoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstadoHabitacionController extends Controller
{

    // Funcion para enviar los estado de habitaciones a la vista estados habitacion
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $estados = EstadoHabitacion::all();
            return view('Empleados.Estadohabitacion.index', compact('estados'));
        }
    }

    //Funcion para crear un estado de habitacion
    public function create(EstadoHabitacionRequest $request)
    {
        $estado = new EstadoHabitacion();
        // Guardamos los datos
        $estado->nombre = $request->input('nombre');
        $estado->clase = $request->input('clase');
        //Creamos al estado
        $estado->save();
        // Nos redirige al estado con un mensaje
        return redirect()->route('estadoHabitaciones')->with('success', 'Estado registrado correctamente');
    }

    //Funcion para modificar un estado de habitacion
    public function update(Request $request, $id)
    {
        //Obtiene el estado de habitacion a partir del id
        $estado = EstadoHabitacion::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'nombre' => 'required', 'unique:estadohabitacion,nombre,' . $estado->id,
            'clase' => 'required'
        ]);

        // Guardamos los datos
        $estado->nombre = $request->input('nombre');
        $estado->clase = $request->input('clase');
        // Actualizamos al estado
        $estado->save();
        // Nos redirige al estado con un mensaje
        return redirect()->route('estadoHabitaciones')->with('success', 'Estado modificado correctamente');
    }

    //Funcion para eliminar un estado de habitacion
    public function destroy($id)
    {
        //Obtiene el estado de habitacion a partir del id
        $estado = EstadoHabitacion::find($id);
        //Elimina al estado de habitacion
        $estado->delete();
        // Nos redirige al estado con un mensaje
        return redirect()->route('estadoHabitaciones')->with('success', 'Estado eliminado correctamente');
    }
}
