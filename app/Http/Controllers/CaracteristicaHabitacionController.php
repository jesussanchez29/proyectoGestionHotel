<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaracteristicaHabitacionRequest;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaracteristicaHabitacionController extends Controller
{
    // Funcion para enviar los caracteristicas a la vista caracteristicas
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $caracteristicas = CaracteristicaTipoHabitacion::all();
            $tipoHabitaciones = TipoHabitacion::all();
            return view('Empleados.CaracteristicaHabitacion.index', compact('caracteristicas', 'tipoHabitaciones'));
        }
    }

    // Funcion para crear una carateristica
    public function create(CaracteristicaHabitacionRequest $request)
    {
        $caracteristica = new CaracteristicaTipoHabitacion();
        // Guardamos los datos
        $caracteristica->nombre = $request->input('nombre');
        $caracteristica->descripcion = $request->input('descripcion');
        $caracteristica->tipoHabitacion_id = $request->input('tipoHabitacion');
        //Creamos la caracteristica
        $caracteristica->save();
        // Nos redirige a caracteristica con un mensaje
        return redirect()->route('caracteristicasHabitacion')->with('success', 'Caracteristica Habitacion  registrado correctamente');
    }

    //Funcion para modificar una caracteristica
    public function update(Request $request, $id)
    {
        //Obtiene la caracteristica a partir del id
        $caracteristica = CaracteristicaTipoHabitacion::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'nombre' => 'required', 'unique:estadohabitacion,nombre,' . $caracteristica->id,
        ]);

        // Guardamos los datos
        $caracteristica->nombre = $request->input('nombre');
        $caracteristica->descripcion = $request->input('descripcion');
        $caracteristica->tipoHabitacion_id = $request->input('tipoHabitacion');
        //Creamos la caracteristica
        $caracteristica->save();
        // Nos redirige a caracteristicas con un mensaje
        return redirect()->route('caracteristicasHabitacion')->with('success', 'Caracteristica Habitacion  modificado correctamente');
    }


    //Funcion para eliminar un caracteristica de habitacion
    public function destroy($id)
    {
        //Obtiene la caracteristicas de habitacion a partir del id
        $caracteristica = CaracteristicaTipoHabitacion::find($id);
        //Elimina la caracteristica de habitacion
        $caracteristica->delete();
        // Nos redirige a caracteristicas con un mensaje
        return redirect()->route('caracteristicasHabitacion')->with('success', 'Caracteristica Habitacion eliminado correctamente');
    }
}
