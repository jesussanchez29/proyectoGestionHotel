<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Mail\Registro;
use App\Mail\RegistroEmpleadoCliente;
use App\Models\Cliente;
use App\Models\Usuario;
use App\Rules\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    // Funcion para enviar los clientes a la vista clientes
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $clientes = Cliente::all();
            return view('Empleados.Cliente.index', compact('clientes'));
        }
    }

    // Funcion para crear un usuario y un cliente
    public function create(ClienteRequest $request)
    {
        DB::beginTransaction();

        try {
            // Guardamos los datos
            $password = Str::random(12);
            $usuario = new Usuario();
            $usuario->imagenPerfil = "images/perfilDefecto.png";
            $usuario->email = $request->email;
            $usuario->password = Hash::make($password);
            $usuario->estado = true;
            $usuario->primerInicioSesion = true;
            //Creamos al usuario
            $usuario->save();

            $cliente = new Cliente();
            // Guardamos los datos
            $cliente->nombre = $request->input('nombre');
            $cliente->apellidos = $request->input('apellidos');
            $cliente->fechaNacimiento = $request->input('fechaNacimiento');
            $cliente->tipoIdentificacion = $request->input('tipoIdentificacion');
            $cliente->identificacion = $request->input('identificacion');
            $cliente->telefono = $request->input('telefono');
            $cliente->direccion = $request->input('direccion');
            $cliente->usuario_id = $usuario->id;
            //Creamos al cliente
            $cliente->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        // Enviamos al cliente registrado un correo con sus credenciales
        Mail::to($request->email)->send(new RegistroEmpleadoCliente($request->email, $password));

        // Nos redirige a clientes con un mensaje
        return back()->with('success', 'Cliente registrado correctamente');
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
            'identificacion' => ['required', 'unique:clientes,identificacion,' . $cliente->id, new TipoIdentificacion($request->input('tipoIdentificacion'))],
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ]);

        // Guardamos los datos
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->fechaNacimiento = $request->input('fechaNacimiento');
        $cliente->tipoIdentificacion = $request->input('tipoIdentificacion');
        $cliente->identificacion = $request->input('identificacion');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        // Actualizamos al cliente
        $cliente->save();
        // Nos redirige a clientes con un mensaje
        return redirect()->route('clientes')->with('success', 'Cliente modificado correctamente');
    }

    //Funcion para eliminar un cliente
    public function destroy($id)
    {
        //Obtiene el cliente a partir del id
        $usuario = Usuario::find($id);
        //Elimina al cliente
        $usuario->delete();
        // Nos redirige a clientes con un mensaje
        return redirect()->route('clientes')->with('success', 'Cliente eliminado correctamente');
    }
}
