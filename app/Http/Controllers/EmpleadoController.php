<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Mail\RegistroEmpleado;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Rules\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{
    // Funcion para enviar los empleados a la vista empleados
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $empleados = Empleado::all();
            $departamentos = Departamento::all();
            return view('Empleados.Empleado.index', compact('empleados', 'departamentos'));        
        }
    }

    // Funcion para crear un usuario y empleado
    public function create(EmpleadoRequest $request)
    {
        DB::beginTransaction();

        try {
            $password = Str::random(12);

            // Guardamos los datos
            $usuario = new Usuario();
            $usuario->imagenPerfil = "images/perfilDefecto.png";
            $usuario->email = $request->email;
            $usuario->password = Hash::make($password);
            $usuario->estado = true;
            $usuario->primerInicioSesion = true;
            //Creamos al usuario
            $usuario->save();

            $empleado = new Empleado();
            // Guardamos los datos
            $empleado->nombre = $request->input('nombre');
            $empleado->apellidos = $request->input('apellidos');
            $empleado->fechaNacimiento = $request->input('fechaNacimiento');
            $empleado->dni = $request->input('dni');
            $empleado->telefono = $request->input('telefono');
            $empleado->direccion = $request->input('direccion');
            $empleado->departamento_id = $request->input('departamento');
            $empleado->usuario_id = $usuario->id;
            //Creamos al empleado
            $empleado->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        
        // Enviamos al empleado registrado un correo con sus credenciales
        Mail::to($request->email)->send(new RegistroEmpleado($request->email, $password));

        // Nos redirige a empleados con un mensaje
        return redirect()->route('empleados')->with('success', 'Empleado registrado correctamente');
    }

    // Funcion para modificar un empleado
    public function update(Request $request, $id)
    {
        // Obtiene el empleado a partir del id
        $empleado = Empleado::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'dni' => ['required', 'unique:empleados,dni,' . $empleado->id, new TipoIdentificacion('DNI')],
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ]);

        // Guardamos los datos
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->fechaNacimiento = $request->input('fechaNacimiento');
        $empleado->dni = $request->input('dni');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->departamento_id = $request->input('departamento');
        $empleado->save();
        // Nos redirige a empleados con un mensaje
        return redirect()->route('empleados')->with('success', 'Empleado modificado correctamente');
    }

    // Funcion para eliminar un empleado
    public function destroy($id)
    {
        // Obtiene el empleado a partir del id
        $empleado = Usuario::find($id);
        // Elimina al empleado
        $empleado->delete();
        // Nos redirige con un mensaje
        return redirect()->route('empleados')->with('success', 'Empleado eliminado correctamente');
    }

    // Funcion para enviar los empleados de un departamento concreto a la vista empleadosDepartamento
    public function viewEmpleadoDepartamento($id)
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $empleados = Empleado::where('departamento_id', $id)->get();
            $departamentos = Departamento::all();
            return view('Empleados.Empleado.empleadosDepartamento', compact('empleados', 'departamentos'));     
        }
    }
}
