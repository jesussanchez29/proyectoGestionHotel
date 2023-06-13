<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitacionRequest;
use App\Models\EstadoHabitacion;
use App\Models\Habitacion;
use App\Models\Piso;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitacionController extends Controller
{
    // Funcion para enviar las habitaciones a la vista de habitaciones
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $estados = EstadoHabitacion::all();
            $habitaciones = Habitacion::all();
            $pisos = Piso::all();
            $estados = EstadoHabitacion::all();
            $tipoHabitaciones = TipoHabitacion::all();
            return view('Empleados.Habitacion.index', compact('habitaciones', 'pisos', 'estados', 'tipoHabitaciones'));
        }
    }

    //Funcion para crear una habitacion
    public function create(HabitacionRequest $request)
    {
        $habitacion = new Habitacion();
        // Guardamos los datos
        $habitacion->numero = $request->input('numero');
        $habitacion->estadoHabitacion_id = $request->input('estadoHabitacion');
        $habitacion->piso_id = $request->input('piso');
        $habitacion->tipoHabitacion_id = $request->input('tipoHabitacion');
        // Creamos a la habitacion
        $habitacion->save();
        // Nos redirige a habitaciones con un mensaje
        return redirect()->route('habitaciones')->with('success', 'Habitacion registrado correctamente');
    }

    // Funcion para modificar una habitacion
    public function update(Request $request, $id)
    {
        // Obtiene la habitacion a partir del id
        $habitacion = Habitacion::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'numero' => 'required', 'unique:pisos,numero,' . $habitacion->id,
            'estadoHabitacion' => 'required',
            'piso' => 'required',
            'tipoHabitacion' => 'required'
        ]);

        // Guardamos los datos
        $habitacion->numero = $request->input('numero');
        $habitacion->estadoHabitacion_id = $request->input('estadoHabitacion');
        $habitacion->piso_id = $request->input('piso');
        $habitacion->tipoHabitacion_id = $request->input('tipoHabitacion');
        // Actualizamos a la habitacion
        $habitacion->save();
        // Nos redirige a habitaciones con un mensaje
        return redirect()->route('habitaciones')->with('success', 'Habitacion modificado correctamente');
    }

    // Funcion para eliminar una habitacion
    public function destroy($id)
    {
        // Obtiene la habitacion a partir del id
        $habitacion = Habitacion::find($id);
        //Elimina la habitacion
        $habitacion->delete();
        // Nos redirige a habitaciones con un mensaje
        return redirect()->route('habitaciones')->with('success', 'Habitacion eliminado correctamente');
    }

    // Funcion para obtener las habitaciones disponibles comprobando las fechas
    public function obtenerHabitacionesDisponibles(Request $request)
    {
        $fechaInicio = $request->fechaLlegada;
        $fechaFin = $request->fechaSalida;
        $tipoHabitacion = $request->tipoHabitacion;

        $habitacionesDisponibles = Habitacion::select('id as habId', 'numero')->
        whereNotIn('id', function ($query) use ($fechaInicio, $fechaFin) {
            $query->select('habitacion_id')
                ->from('reservas')
                ->where(function ($query) use ($fechaInicio, $fechaFin) {
                    $query->where(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('fechaLlegada', '<=', $fechaFin)
                            ->where('fechaSalida', '>=', $fechaInicio);
                    })
                    ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('fechaLlegada', '>=', $fechaInicio)
                            ->where('fechaSalida', '<=', $fechaFin);
                    })
                    ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('fechaLlegada', '<=', $fechaInicio)
                            ->where('fechaSalida', '>=', $fechaInicio);
                    })
                    ->orWhere(function ($query) use ($fechaInicio, $fechaFin) {
                        $query->where('fechaLlegada', '<=', $fechaFin)
                            ->where('fechaSalida', '>=', $fechaFin);
                    });
                });
        })
        ->where('tipoHabitacion_id', $tipoHabitacion)
        ->get();
    

        //Devuelve las habitaciones
        return response()->json($habitacionesDisponibles);
    }

    public function cambiarEstadoHabitacion(Request $request, $id)
    {
        $habitacion = Habitacion::findOrFail($id);
        $estado = EstadoHabitacion::where('nombre', $request->estado )->first();
        $habitacion->estadoHabitacion_id = $estado->id;
        $habitacion->save();
        return back()->with('success', 'Estado cambiado correctamente');
    }
}
