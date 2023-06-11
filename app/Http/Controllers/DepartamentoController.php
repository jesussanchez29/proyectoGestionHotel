<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentoRequest;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepartamentoController extends Controller
{
    // Funcion para enviar los departamentos a la vista departamentos
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $departamentos = Departamento::all();
            return view('Empleados.Departamento.index', compact('departamentos'));        
        }
    }

    // Funcion para crear un departamento
    public function create(DepartamentoRequest $request)
    {
        $departamento = new Departamento();
        // Guardamos los datos
        $file = $request->file('icono')->store('public/departamentos');
        $url = Storage::url($file);
        $departamento->icono = substr($url, 1);
        $departamento->nombre = $request->input('nombre');
        $departamento->descripcion = $request->input('descripcion');
        // Creamos el departamento
        $departamento->save();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('departamentos')->with('success', 'Departamento registrado correctamente');
    }

    // Funcion para modificar un departamento
    public function update(Request $request, $id)
    {
        // Obtiene el departamento a partir del id
        $departamento = Departamento::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'icono' => 'nullable|image|max:2048',
            'nombre' => 'required|unique:departamentos,nombre,'.$departamento->id,
            'descripcion' => 'required',
        ]);

        // Guardamos los datos
        if ($request->has('icono')) {
            $file = $request->file('icono')->store('public/departamentos');
            $url = Storage::url($file);
            $departamento->icono = substr($url, 1);
        }
        $departamento->nombre = $request->input('nombre');
        $departamento->descripcion = $request->input('descripcion');
        // Actualizamos el departamento
        $departamento->save();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('departamentos')->with('success', 'Departamento registrado correctamente');
    }

    // Funcion para eliminar un departamento
    public function destroy($id)
    {
        // Obtiene el departamento a partir del id
        $departamento = Departamento::find($id);
        // Elimina al departamento
        $departamento->delete();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('departamentos')->with('success', 'Departamento eliminado correctamente');
    }
}
