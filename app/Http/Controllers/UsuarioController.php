<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Rules\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    // Funcion para enviar la plantilla perfil
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            return view('Empleados.perfil');
        }
    }

    // Funcion para enviar enviar la plantilla perfil 
    public function indexCliente()
    {
        if (!Auth::user() || Auth::user()->empleado) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->cliente) {
            return view('Clientes.perfil');
        }
    }

    // Funcion para actualizar un usuario
    public function update(Request $request)
    {
        // Obtiene el usuario a partir del id
        $usuario = Usuario::findOrFail(Auth::user()->id);
        // Validacion
        $request->validate([
            'imagenPerfil' => 'nullable|image',
            'password' => ['nullable', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_\/!@#$%^&*()\-])[A-Za-z\d\-_\/!@#$%^&*()]+$/'],
            'repassword' => $request->filled('password') ? 'required|same:password' : '',
        ]);

        // Obtenemos los datos
        if ($request->hasFile('imagenPerfil')) {
            $file = $request->file('imagenPerfil')->store('public/perfil');
            $url = Storage::url($file);
            $usuario->imagenPerfil = substr($url, 1);
        }

        if ($request->filled('password'))
            $usuario->password = Hash::make($request->input('password'));
        //Actualizamos el usuario
        $usuario->save();

        // Si el usuario es un cliente
        if (Auth::user()->cliente) {
            // Obtiene el cliente a partir del id
            $cliente = Cliente::findOrFail(Auth::user()->cliente->id);

            // Validacion
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'fechaNacimiento' => 'required',
                'telefono' => 'required|regex:"[0-9]{9}"',
                'direccion' => 'required'
            ]);

            // Asignamos los datos
            $cliente->nombre = $request->input('nombre');
            $cliente->apellidos = $request->input('apellidos');
            $cliente->fechaNacimiento = $request->input('fechaNacimiento');
            $cliente->telefono = $request->input('telefono');
            $cliente->direccion = $request->input('direccion');
            // Actualizamos el cliente
            $cliente->save();
            // Nos redirige a perfilCliente con un mensaje
            return redirect()->route('perfilCliente')->with('success', 'Perfil modificado correctamente');
        } else {
            // Obtiene al empleado a partir del id
            $empleado = Empleado::findOrFail(Auth::user()->empleado->id);

            // Validacion
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'fechaNacimiento' => 'required',
                'dni' => ['required', 'unique:empleados,dni,' . $empleado->id, new TipoIdentificacion('DNI')],
                'telefono' => 'required|regex:"[0-9]{9}"',
                'direccion' => 'required'
            ]);

            // Asignamos los datos
            $empleado->nombre = $request->input('nombre');
            $empleado->apellidos = $request->input('apellidos');
            $empleado->fechaNacimiento = $request->input('fechaNacimiento');
            $empleado->dni = $request->input('dni');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            // Actualizamos el empleado
            $empleado->save();
            // Nos redirige a perfilEmpleado con un mensaje
            return redirect()->route('perfilEmpleado')->with('success', 'Perfil modificado correctamente');
        }
    }

    // Funcion para cerrar la sesion de un usuario
    public function logout()
    {
        // Cierra la sesion
        Auth::logout();
        // Nos dirige a la vista index
        return redirect()->route('indexCliente');
    }
}
