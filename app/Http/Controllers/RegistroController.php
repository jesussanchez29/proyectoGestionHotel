<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Mail\BienvenidoCliente;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistroController extends Controller
{

    public function index()
    {
        return view('Clientes.registro');
    }

    public function createCliente(RegistroRequest $request)
    {
        //Creamos al usuario
        $usuario = new Usuario();
        $usuario->imagenPerfil = "images/perfilDefecto.png";
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->estado = true;
        $usuario->primerInicioSesion = false;
        $usuario->save();

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->fechaNacimiento = $request->fechaNacimiento;
        $cliente->tipoIdentificacion = $request->tipoIdentificacion;
        $cliente->identificacion = $request->identificacion;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->usuario_id = $usuario->id;
        $cliente->save();

        Mail::to($request->email)->send(new BienvenidoCliente($request->nombre));

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente !Ya puedes inicar sesión¡');
    }

}
