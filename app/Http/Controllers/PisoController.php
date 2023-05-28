<?php

namespace App\Http\Controllers;

use App\Http\Requests\PisoRequest;
use App\Models\Piso;
use Illuminate\Http\Request;

class PisoController extends Controller
{
    // Funcion para enviar los tipos de habitaciones a la vista tipos de habitaciones
    public function indexEmpleado()
    {
        $pisos = Piso::all();
        return view('Empleados.Piso.index', compact('pisos'));
    }

    //Funcion para crear un tipo de habitacion
    public function create(PisoRequest $request)
    {
        $piso = new Piso();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $piso->numero = $request->input('numero');
        $piso->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('pisos')->with('success', 'Piso registrado correctamente');
    }

     //Funcion para modificar un tipo de habitacion
     public function update(Request $request, $id)
     {
         //Obtiene el un tipo de habitacion a partir del id
         $piso = Piso::findOrFail($id);
 
         // Validacion para la actualizacion
         $request->validate([
            'numero' => 'required', 'unique:pisos,numero,' . $piso->id,
         ]);
 
         $piso->numero = $request->input('numero');
         $piso->save();
         // Nos redirige a tipoHabitaciones con un mensaje
         return redirect()->route('pisos')->with('success', 'Piso modificado correctamente');
     }
 
     //Funcion para eliminar un tipo de habitacion
     public function destroy($id)
     {
         //Obtiene el tipo de habitacion a partir del id
         $piso = Piso::find($id);
         //Elimina al tipo de habitacion
         $piso->delete();
         // Nos piso a tipoHabitaciones con un mensaje
         return redirect()->route('pisos')->with('success', 'Piso eliminado correctamente');
     }

}
