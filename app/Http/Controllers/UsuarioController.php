<?php

namespace App\Http\Controllers;

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

    public function update(Request $request)
    {
         // Obtiene el empleado a partir del id
         $usuario = Usuario::findOrFail(Auth::user()->id);
         $request->validate([
            'imagenPerfil' => 'nullable|image',
            'password' => ['nullable', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_\/!@#$%^&*()\-])[A-Za-z\d\-_\/!@#$%^&*()]+$/'],
            'repassword' => $request->filled('password') ? 'required|same:password' : '',
        ]);

        if($request->hasFile('imagenPerfil')) {
            $file = $request->file('imagenPerfil')->store('public/perfil/Empleado');
            $url = Storage::url($file);
            $usuario->imagenPerfil = substr($url, 1);
        }

        if($request->filled('password'))
            $usuario->password = Hash::make($request->input('password'));
        $usuario->save();

        $empleado = Empleado::findOrFail(Auth::user()->empleado->id);

         // Validacion para la actualizacion
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
