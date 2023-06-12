<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Mail\RegistroCliente;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistroController extends Controller
{
    // Funcion para mostrar la vista d eregistro
    public function index()
    {
        return view('registro');
    }

    // FUncion para registrar un ciente
    public function createCliente(RegistroRequest $request)
    {
        // Guardamos los datos
        $usuario = new Usuario();
        $usuario->imagenPerfil = "images/perfilDefecto.png";
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->estado = true;
        $usuario->primerInicioSesion = false;
        //Creamos al usuario
        $usuario->save();

        // Guardamos los datos
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->fechaNacimiento = $request->fechaNacimiento;
        $cliente->tipoIdentificacion = $request->tipoIdentificacion;
        $cliente->identificacion = $request->identificacion;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->usuario_id = $usuario->id;
        //Creamos al cliente
        $cliente->save();

        // Enviamos al cliente registrado un correo de bienvenida
        Mail::to($request->email)->send(new RegistroCliente($request->nombre));

        // Nos redirige a login con un mensaje
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente !Ya puedes inicar sesión¡');
    }

}
