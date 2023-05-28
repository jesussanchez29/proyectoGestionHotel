<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitacionRequest;
use App\Models\EstadoHabitacion;
use App\Models\Habitacion;
use App\Models\Piso;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
    // Funcion para enviar los tipos de habitaciones a la vista tipos de habitaciones
    public function indexEmpleado()
    {
        $habitaciones = Habitacion::all();
        $pisos = Piso::all();
        $estados = EstadoHabitacion::all();
        $tipoHabitaciones = TipoHabitacion::all();
        return view('Empleados.Habitacion.index', compact('habitaciones', 'pisos', 'estados', 'tipoHabitaciones'));
    }

    //Funcion para crear un tipo de habitacion
    public function create(HabitacionRequest $request)
    {
        $habitacion = new Habitacion();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $habitacion->numero = $request->input('numero');
        $habitacion->estadoHabitacion_id = $request->input('estadoHabitacion');
        $habitacion->piso_id = $request->input('piso');
        $habitacion->tipoHabitacion_id = $request->input('tipoHabitacion');
        $habitacion->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('habitaciones')->with('success', 'Habitacion registrado correctamente');
    }

    //Funcion para modificar un tipo de habitacion
    public function update(Request $request, $id)
    {
        //Obtiene el un tipo de habitacion a partir del id
        $habitacion = Habitacion::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'numero' => 'required', 'unique:pisos,numero,' . $habitacion->id,
            'estadoHabitacion' => 'required',
            'piso' => 'required',
            'tipoHabitacion' => 'required'
        ]);

        $habitacion->numero = $request->input('numero');
        $habitacion->estadoHabitacion_id = $request->input('estadoHabitacion');
        $habitacion->piso_id = $request->input('piso');
        $habitacion->tipoHabitacion_id = $request->input('tipoHabitacion');
        $habitacion->save();
        $habitacion->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('habitaciones')->with('success', 'Habitacion modificado correctamente');
    }

    //Funcion para eliminar un tipo de habitacion
    public function destroy($id)
    {
        //Obtiene el tipo de habitacion a partir del id
        $habitacion = Habitacion::find($id);
        //Elimina al tipo de habitacion
        $habitacion->delete();
        // Nos piso a tipoHabitaciones con un mensaje
        return redirect()->route('habitaciones')->with('success', 'Habitacion eliminado correctamente');
    }
}
