<?php

namespace App\Http\Controllers;

use App\Http\Requests\PisoRequest;
use App\Models\Piso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PisoController extends Controller
{
    // Funcion para enviar los pisos a la vista pisos
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $pisos = Piso::all();
            return view('Empleados.Piso.index', compact('pisos'));
        }
    }

    //Funcion para crear un piso
    public function create(PisoRequest $request)
    {
        $piso = new Piso();
        // Guardamos los datos
        $piso->numero = $request->input('numero');
        // Creamos el piso
        $piso->save();
        // Nos redirige a pisso con un mensaje
        return redirect()->route('pisos')->with('success', 'Piso registrado correctamente');
    }

    //Funcion para modificar un piso
    public function update(Request $request, $id)
    {
        //Obtiene el piso a partir del id
        $piso = Piso::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'numero' => 'required', 'unique:pisos,numero,' . $piso->id,
        ]);

        // Guardamos los datos
        $piso->numero = $request->input('numero');
        // Creamos el piso
        $piso->save();
        // Nos redirige a pisos con un mensaje
        return redirect()->route('pisos')->with('success', 'Piso modificado correctamente');
    }

    //Funcion para eliminar un piso
    public function destroy($id)
    {
        //Obtiene el piso a partir del id
        $piso = Piso::find($id);
        //Elimina al piso
        $piso->delete();
        // Nos piso a pisos con un mensaje
        return redirect()->route('pisos')->with('success', 'Piso eliminado correctamente');
    }
}
