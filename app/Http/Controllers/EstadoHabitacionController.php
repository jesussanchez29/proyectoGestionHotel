<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoHabitacionRequest;
use App\Models\EstadoHabitacion;
use Illuminate\Http\Request;

class EstadoHabitacionController extends Controller
{
    public function indexEmpleado()
    {
        $estados = EstadoHabitacion::all();
        return view('Empleados.Estadohabitacion.index', compact('estados'));
    }

        //Funcion para crear un tipo de habitacion
        public function create(EstadoHabitacionRequest $request)
        {
            $estado = new EstadoHabitacion();
            // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
            $estado->nombre = $request->input('nombre');
            $estado->save();
            // Nos redirige a tipoHabitaciones con un mensaje
            return redirect()->route('estadoHabitaciones')->with('success', 'Estado registrado correctamente');
        }
    
         //Funcion para modificar un tipo de habitacion
         public function update(Request $request, $id)
         {
             //Obtiene el un tipo de habitacion a partir del id
             $estado = EstadoHabitacion::findOrFail($id);
     
             // Validacion para la actualizacion
             $request->validate([
                'nombre' => 'required', 'unique:estadohabitacion,nombre,' . $estado->id,
             ]);
     
             $estado->nombre = $request->input('nombre');
             $estado->save();
             // Nos redirige a tipoHabitaciones con un mensaje
             return redirect()->route('estadoHabitaciones')->with('success', 'Estado modificado correctamente');
         }
     
         //Funcion para eliminar un tipo de habitacion
         public function destroy($id)
         {
             //Obtiene el tipo de habitacion a partir del id
             $estado = EstadoHabitacion::find($id);
             //Elimina al tipo de habitacion
             $estado->delete();
             // Nos piso a tipoHabitaciones con un mensaje
             return redirect()->route('estadoHabitaciones')->with('success', 'Estado eliminado correctamente');
         }
}
