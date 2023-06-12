<?php

namespace App\Http\Controllers;

use App\Mail\OlvidarContrasena;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Rules\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
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

    //Funcion para cambiar el estado de un usuario
    public function cambiarEstado($id) {
        // Obtiene el usuario a partir del id
        $usuario = Usuario::findOrFail($id);
        // Si su estado es desactivo
        if($usuario->estado == 0) {
            $usuario->estado = 1;
        // Si su estado es activo
        } else {
            $usuario->estado = 0;
        }
        //Actualizamos el usuario
        $usuario->save();
        // Nos dirige a la vista anterior
        return back()->with('success', 'Estado actualizado correctamente');
    }

    // Funcion para cerrar la sesion de un usuario
    public function logout()
    {
        // Cierra la sesion
        Auth::logout();
        // Nos dirige a la vista index
        return redirect()->route('indexCliente');
    }

    public function olvidarContrasena()
    {
        return view('olvidarContrasena');
    }

    public function correoOlvidarContrasena(Request $request)
    {
        $email = $request->email;
        $usuario = Usuario::where('email', $email)->first();

        if(!$usuario) {
            return back()->withErrors(['invalid_email' => 'El email no esta registrado'])->withInput();
        } else {
            $enlance = route('cambioContrasena', ['id' => $usuario->id]);
            Mail::to($request->email)->send(new OlvidarContrasena($enlance));
            return redirect()->route('login')->with('success', 'Revisa tu correo para el cambio de contraseña');
        }
    }

    public function cambioContrasena($id)
    {
        return view('cambiarContrasena', ['id' => $id]);
    }

    public function cambiarContrasena(Request $request) {
        $id = $request->usuarioId;
        // Validacion
        $request->validate([
            'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_\/!@#$%^&*()\-])[A-Za-z\d\-_\/!@#$%^&*()]+$/'],
            'repassword' => 'required|same:password',        
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->password = Hash::make($request->input('password'));
        $usuario->primerInicioSesion = false;
        //Actualizamos el usuario
        $usuario->save();
        // Nos redirige a perfilCliente con un mensaje
        return redirect()->route('login')->with('success', 'Contraseña actualizada, ¡Inicia sesion!');
    }
}
