<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoHabitacionRequest;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\Habitacion;
use App\Models\Hotel;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TipoHabitacionController extends Controller
{
    // Funcion para enviar los tipos de habitaciones a la vista tipos de habitaciones
    public function indexEmpleado()
    {
        $tipoHabitaciones = TipoHabitacion::all();
        return view('Empleados.TipoHabitacion.index', compact('tipoHabitaciones'));
    }

       // Funcion para enviar los tipos de habitaciones a la vista tipos de habitaciones
       public function indexCliente()
       {
           $tipoHabitaciones = TipoHabitacion::paginate(4);
           $hotel = Hotel::first();
           return view('Clientes.TipoHabitacion.index', compact('tipoHabitaciones', 'hotel'));
       }
   

    //Funcion para crear un tipo de habitacion
    public function create(TipoHabitacionRequest $request)
    {
        $tipoHabitacion = new TipoHabitacion();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $file = $request->file('imagen')->store('public/tipoHabitaciones');
        $url = Storage::url($file);
        $tipoHabitacion->imagen = substr($url, 1);
        $tipoHabitacion->nombre = $request->input('nombre');
        $tipoHabitacion->descripcion = $request->input('descripcion');
        $tipoHabitacion->capacidad = $request->input('capacidad');
        $tipoHabitacion->precio = $request->input('precio');
        $tipoHabitacion->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('tipoHabitaciones')->with('success', 'Tipo de Habitacion registrado correctamente');
    }

    //Funcion para modificar un tipo de habitacion
    public function update(Request $request, $id)
    {
        //Obtiene el un tipo de habitacion a partir del id
        $tipoHabitacion = TipoHabitacion::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'imagen' => 'nullable|image|max:2048',
            'nombre' => 'required|unique:tipoHabitacion,nombre,' . $tipoHabitacion->id,
            'descripcion' => 'required',
            'capacidad' => 'required',
            'precio' => 'required',
        ]);

        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        if ($request->has('imagen')) {
            $file = $request->file('imagen')->store('public/tipoHabitaciones');
            $url = Storage::url($file);
            $tipoHabitacion->imagen = substr($url, 1);
        }
        $tipoHabitacion->nombre = $request->input('nombre');     
        $tipoHabitacion->descripcion = $request->input('descripcion');   
        $tipoHabitacion->capacidad = $request->input('capacidad');
        $tipoHabitacion->precio = $request->input('precio');
        $tipoHabitacion->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('tipoHabitaciones')->with('success', 'Tipo de Habitacion modificado correctamente');
    }

    //Funcion para eliminar un tipo de habitacion
    public function destroy($id)
    {
        //Obtiene el tipo de habitacion a partir del id
        $tipoHabitacion = TipoHabitacion::find($id);
        //Elimina al tipo de habitacion
        $tipoHabitacion->delete();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('tipoHabitaciones')->with('success', 'Tipo de Habitacion eliminado correctamente');
    }

    public function view($id)
    {
        $tipoHabitaciones = TipoHabitacion::whereNotIn('id', [$id])->take(3)->get();
        $tipoHabitacionEncontrada = TipoHabitacion::findOrFail($id);
        $caracteristicas = CaracteristicaTipoHabitacion::where('tipoHabitacion_id', $id)->get();
        $resenas = $tipoHabitacionEncontrada->resena;
        $hotel = Hotel::first();
        return view('Clientes.TipoHabitacion.ver', compact('tipoHabitacionEncontrada', 'hotel', 'tipoHabitaciones', 'caracteristicas', 'resenas'));
    }

    public function getPisosDisponibles(Request $request)
{
    $tipoHabitacionId = $request->input('habitacion');

    $pisosDisponibles = Habitacion::select('pisos.id', 'pisos.numero')
        ->join('tipoHabitacion', 'habitaciones.tipoHabitacion_id', '=', 'tipoHabitacion.id')
        ->join('estadohabitacion', 'habitaciones.estadoHabitacion_id', '=', 'estadohabitacion.id')
        ->join('pisos', 'pisos.id', '=', 'habitaciones.piso_id')
        ->where('tipoHabitacion.id', $tipoHabitacionId)
        ->where('estadohabitacion.nombre', 'Disponible')
        ->pluck('pisos.numero')
        ->unique();

    return response()->json($pisosDisponibles);
}
}
