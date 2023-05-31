<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaracteristicaHabitacionRequest;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class CaracteristicaHabitacionController extends Controller
{
    public function indexEmpleado()
    {
        $caracteristicas = CaracteristicaTipoHabitacion::all();
        $tipoHabitaciones = TipoHabitacion::all();
        return view('Empleados.CaracteristicaHabitacion.index', compact('caracteristicas', 'tipoHabitaciones'));
    }

    //Funcion para crear un tipo de habitacion
    public function create(CaracteristicaHabitacionRequest $request)
    {
        $caracteristica = new CaracteristicaTipoHabitacion();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $caracteristica->nombre = $request->input('nombre');
        $caracteristica->descripcion = $request->input('descripcion');
        $caracteristica->tipoHabitacion_id = $request->input('tipoHabitacion');
        $caracteristica->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('caracteristicasHabitacion')->with('success', 'Caracteristica Habitacion  registrado correctamente');
    }

    //Funcion para modificar un tipo de habitacion
    public function update(CaracteristicaHabitacionRequest $request, $id)
    {
        //Obtiene el un tipo de habitacion a partir del id
        $caracteristica = CaracteristicaTipoHabitacion::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'nombre' => 'required', 'unique:estadohabitacion,nombre,' . $caracteristica->id,
        ]);

        $caracteristica->nombre = $request->input('nombre');
        $caracteristica->descripcion = $request->input('descripcion');
        $caracteristica->tipoHabitacion_id = $request->input('tipoHabitacion');
        $caracteristica->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('caracteristicasHabitacion')->with('success', 'Caracteristica Habitacion  modificado correctamente');
    }


    //Funcion para eliminar un tipo de habitacion
    public function destroy($id)
    {
        //Obtiene el tipo de habitacion a partir del id
        $caracteristica = CaracteristicaTipoHabitacion::find($id);
        //Elimina al tipo de habitacion
        $caracteristica->delete();
        // Nos piso a tipoHabitaciones con un mensaje
        return redirect()->route('caracteristicasHabitacion')->with('success', 'Caracteristica Habitacion eliminado correctamente');
    }
}
