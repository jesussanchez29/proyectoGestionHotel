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
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            return view('Empleados.perfil');
        }
    }

    public function indexCliente()
    {
        if (!Auth::user() || Auth::user()->empleado) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->cliente) {
            return view('Clientes.perfil');
        }
    }

    public function update(Request $request)
    {
        // Obtiene el empleado a partir del id
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $request->validate([
            'imagenPerfil' => 'nullable|image',
            'password' => ['nullable', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_\/!@#$%^&*()\-])[A-Za-z\d\-_\/!@#$%^&*()]+$/'],
            'repassword' => $request->filled('password') ? 'required|same:password' : '',
        ]);

        if ($request->hasFile('imagenPerfil')) {
            $file = $request->file('imagenPerfil')->store('public/perfil');
            $url = Storage::url($file);
            $usuario->imagenPerfil = substr($url, 1);
        }

        if ($request->filled('password'))
            $usuario->password = Hash::make($request->input('password'));
        $usuario->save();

        if (Auth::user()->cliente) {
            $cliente = Cliente::findOrFail(Auth::user()->cliente->id);

            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'fechaNacimiento' => 'required',
                'telefono' => 'required|regex:"[0-9]{9}"',
                'direccion' => 'required'
            ]);

            // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
            $cliente->nombre = $request->input('nombre');
            $cliente->apellidos = $request->input('apellidos');
            $cliente->fechaNacimiento = $request->input('fechaNacimiento');
            $cliente->telefono = $request->input('telefono');
            $cliente->direccion = $request->input('direccion');
            $cliente->save();
            // Nos redirige a empleados con un mensaje
            return redirect()->route('perfilCliente')->with('success', 'Perfil modificado correctamente');

        } else {
            $empleado = Empleado::findOrFail(Auth::user()->empleado->id);

            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'fechaNacimiento' => 'required',
                'dni' => ['required', 'unique:empleados,dni,' . $empleado->id, new TipoIdentificacion('DNI')],
                'telefono' => 'required|regex:"[0-9]{9}"',
                'direccion' => 'required'
            ]);

            // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
            $empleado->nombre = $request->input('nombre');
            $empleado->apellidos = $request->input('apellidos');
            $empleado->fechaNacimiento = $request->input('fechaNacimiento');
            $empleado->dni = $request->input('dni');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            $empleado->save();
            // Nos redirige a empleados con un mensaje
            return redirect()->route('perfilEmpleado')->with('success', 'Perfil modificado correctamente');
        }
    }
}
