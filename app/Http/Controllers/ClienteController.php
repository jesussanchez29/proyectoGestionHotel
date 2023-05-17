<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Rules\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    // Funcion para enviar los clientes paginados a la vista clientes
    public function indexEmpleado()
    {
        $clientes = Cliente::all();
        return view('Empleados.Cliente.index', compact('clientes'));
    }

    // Funcion para crear un cliente
    public function create(ClienteRequest $request) 
    {
        $cliente = new Cliente();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->fechaNacimiento = $request->input('fechaNacimiento');
        $cliente->tipoIdentificacion = $request->input('tipoIdentificacion');
        $cliente->identificacion = $request->input('identificacion');
        $cliente->email = $request->input('email');
        $cliente->password = Hash::make(Str::random(12));
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->save();
        // Nos redirige a clientes con un mensaje
        return redirect()->route('clientes')->with('success', 'Cliente registrado correctamente');
    }

    // Funcion para modificar un cliente
    public function update(Request $request, $id)
    {
        // Obtiene el cliente a partir del id
        $cliente = Cliente::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'tipoIdentificacion' => 'required',
            'identificacion' => ['required' , 'unique:clientes,identificacion,'.$cliente->id, new TipoIdentificacion($request->input('tipoIdentificacion'))],
            'email' => 'required|unique:clientes,email,'.$cliente->id.'|regex:/^.+@.+$/i',
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ]);

        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->fechaNacimiento = $request->input('fechaNacimiento');
        $cliente->tipoIdentificacion = $request->input('tipoIdentificacion');
        $cliente->identificacion = $request->input('identificacion');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->save();
        // Nos redirige a clientes con un mensaje
        return redirect()->route('clientes')->with('success', 'Cliente modificado correctamente');
    }

    //Funcion para eliminar un cliente
    public function destroy($id)
    {
        //Obtiene el cliente a partir del id
        $cliente = Cliente::find($id);
        //Elimina al cliente
        $cliente->delete();
        // Nos redirige a clientes con un mensaje
        return redirect()->route('clientes')->with('success', 'Cliente eliminado correctamente');
    }
}
