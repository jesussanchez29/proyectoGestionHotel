<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Rules\TipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{
    // Funcion para enviar los empleados paginados a la vista empleados
    public function indexEmpleado()
    {
        $empleados = Empleado::leftJoin('departamentos', 'empleados.departamento_id', '=', 'departamentos.id')->select('empleados.*', 'departamentos.nombre as nombreDepartamento')->simplePaginate(10);
        $departamentos = Departamento::all();
        return view('Empleados.Empleado.index', compact('empleados', 'departamentos'));
    }

    // Funcion para crear un empleado
    public function create(EmpleadoRequest $request)
    {
        $empleado = new Empleado();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->fechaNacimiento = $request->input('fechaNacimiento');
        $empleado->dni = $request->input('dni');
        $empleado->email = $request->input('email');
        $empleado->password = Hash::make(Str::random(12));
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->estado = 0;
        $empleado->departamento_id = $request->input('departamento');
        $empleado->save();
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
            'email' => 'required|unique:empleados,email,' . $empleado->id . '|regex:/^.+@.+$/i',
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ]);

        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->fechaNacimiento = $request->input('fechaNacimiento');
        $empleado->dni = $request->input('dni');
        $empleado->email = $request->input('email');
        $empleado->telefono = $request->input('telefono');
        $empleado->direccion = $request->input('direccion');
        $empleado->estado = $request->input('estado');
        $empleado->departamento_id = $request->input('departamento');
        $empleado->save();
        // Nos redirige a empleados con un mensaje
        return redirect()->route('empleados')->with('success', 'Empleado modificado correctamente');
    }

    // Funcion para eliminar un empleado
    public function destroy($id)
    {
        // Obtiene el empleado a partir del id
        $empleado = Empleado::find($id);
        // Elimina al empleado
        $empleado->delete();
        // Nos redirige con un mensaje
        return redirect()->route('empleados')->with('success', 'Empleado eliminado correctamente');
    }
}
