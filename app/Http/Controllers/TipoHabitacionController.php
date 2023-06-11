<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoHabitacionRequest;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\Hotel;
use App\Models\Piso;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TipoHabitacionController extends Controller
{
    // Funcion para enviar los tipos de habitaciones a la vista tipos de habitaciones
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $tipoHabitaciones = TipoHabitacion::all();
            return view('Empleados.TipoHabitacion.index', compact('tipoHabitaciones'));
        }
    }

    // Funcion para enviar los tipos de habitaciones a la vista tipos de habitaciones
    public function indexCliente()
    {
        $tipoHabitacionesPaginadas = TipoHabitacion::paginate(4);
        $tipoHabitaciones = TipoHabitacion::all();
        $hotel = Hotel::first();
        return view('Clientes.TipoHabitacion.index', compact('tipoHabitaciones', 'hotel', 'tipoHabitacionesPaginadas'));
    }


    //Funcion para crear un tipo de habitacion
    public function create(TipoHabitacionRequest $request)
    {
        $tipoHabitacion = new TipoHabitacion();
        // Asignamos los datos
        $file = $request->file('imagen')->store('public/tipoHabitaciones');
        $url = Storage::url($file);
        $tipoHabitacion->imagen = substr($url, 1);
        $tipoHabitacion->nombre = $request->input('nombre');
        $tipoHabitacion->descripcion = $request->input('descripcion');
        $tipoHabitacion->capacidad = $request->input('capacidad');
        $tipoHabitacion->precio = $request->input('precio');
        // Creamos el tipo de habitacion
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

        // Asignamos los datos
        if ($request->has('imagen')) {
            $file = $request->file('imagen')->store('public/tipoHabitaciones');
            $url = Storage::url($file);
            $tipoHabitacion->imagen = substr($url, 1);
        }
        $tipoHabitacion->nombre = $request->input('nombre');
        $tipoHabitacion->descripcion = $request->input('descripcion');
        $tipoHabitacion->capacidad = $request->input('capacidad');
        $tipoHabitacion->precio = $request->input('precio');
        // Actualizamos el tipo de habitacion
        $tipoHabitacion->save();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('tipoHabitaciones')->with('success', 'Tipo de Habitacion modificado correctamente');
    }

    //Funcion para eliminar un tipo de habitacion
    public function destroy($id)
    {
        // Obtiene el tipo de habitacion a partir del id
        $tipoHabitacion = TipoHabitacion::find($id);
        // Elimina al tipo de habitacion
        $tipoHabitacion->delete();
        // Nos redirige a tipoHabitaciones con un mensaje
        return redirect()->route('tipoHabitaciones')->with('success', 'Tipo de Habitacion eliminado correctamente');
    }

    // Funcion para ver un tipo de habitacion concreto
    public function view($id)
    {
        $tipoHabitaciones = TipoHabitacion::all();
        $tipoHabitacionesOtras = TipoHabitacion::whereNotIn('id', [$id])->take(3)->get();
        $tipoHabitacionEncontrada = TipoHabitacion::findOrFail($id);
        $caracteristicas = CaracteristicaTipoHabitacion::where('tipoHabitacion_id', $id)->get();
        $resenas = $tipoHabitacionEncontrada->resena;
        return view('Clientes.TipoHabitacion.ver', compact('tipoHabitacionEncontrada', 'tipoHabitaciones', 'caracteristicas', 'resenas', 'tipoHabitacionesOtras'));
    }

    // Funcion para obtener los pisos en los que hay habitaciones disponibles dentro del rango de fehca sy el tipo de habitacion
    public function getPisosDisponibles(Request $request)
    {
        $tipoHabitacionId = $request->input('habitacion');
        $fechaEntrada = $request->input('fechaEntrada');
        $fechaSalida = $request->input('fechaSalida');

        // Obtenemos los pisos en las que hay habitaciones segun el rando de fechas y el tipo de habitacion
        $pisosDisponibles = Piso::select('pisos.id as pisoId', 'pisos.numero')
            ->join('habitaciones', 'pisos.id', '=', 'habitaciones.piso_id')
            ->join('tipoHabitacion', 'habitaciones.tipoHabitacion_id', '=', 'tipoHabitacion.id')
            ->leftJoin('reservas', function ($join) use ($fechaEntrada, $fechaSalida) {
                $join->on('habitaciones.id', '=', 'reservas.habitacion_id')
                    ->where('reservas.fechaLLegada', '<=', $fechaSalida)
                    ->where('reservas.fechaSalida', '>=', $fechaEntrada);
            })
            ->where('tipoHabitacion.id', $tipoHabitacionId)
            ->whereNull('reservas.habitacion_id')
            ->distinct()
            ->get();

        // Devolvemos los pisos
        return response()->json($pisosDisponibles);
    }
}