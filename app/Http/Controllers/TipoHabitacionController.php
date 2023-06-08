<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoHabitacionRequest;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\Habitacion;
use App\Models\Hotel;
use App\Models\Piso;
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
        $tipoHabitaciones = TipoHabitacion::all();
        $tipoHabitacionesOtras = TipoHabitacion::whereNotIn('id', [$id])->take(3)->get();
        $tipoHabitacionEncontrada = TipoHabitacion::findOrFail($id);
        $caracteristicas = CaracteristicaTipoHabitacion::where('tipoHabitacion_id', $id)->get();
        $resenas = $tipoHabitacionEncontrada->resena;
        $hotel = Hotel::first();
        return view('Clientes.TipoHabitacion.ver', compact('tipoHabitacionEncontrada', 'hotel', 'tipoHabitaciones', 'caracteristicas', 'resenas', 'tipoHabitacionesOtras'));
    }

    public function getPisosDisponibles(Request $request)
    { 
        $tipoHabitacionId = $request->input('habitacion');
        $fechaEntrada = $request->input('fechaEntrada');
        $fechaSalida = $request->input('fechaSalida');

        $pisosDisponibles = Piso::select('pisos.id as pisoId' , 'pisos.numero')
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

        return response()->json($pisosDisponibles);
    }
    
    public function verificarDisponibilidad(Request $request)
    {
        // Obtener los datos enviados por la petición AJAX
        $fechaLlegada = $request->input('fechaLlegada');
        $fechaSalida = $request->input('fechaSalida');
        $tipoHabitacion = $request->input('tipoHabitacion');

        // Realizar la lógica para verificar la disponibilidad de pisos en función de los datos recibidos

        // Obtener los pisos disponibles
        $pisosDisponibles = Piso::where('tipo_habitacion_id', $tipoHabitacion)
            ->whereDoesntHave('reservas', function ($query) use ($fechaLlegada, $fechaSalida) {
                $query->where(function ($subQuery) use ($fechaLlegada, $fechaSalida) {
                    $subQuery->whereBetween('fecha_llegada', [$fechaLlegada, $fechaSalida])
                        ->orWhereBetween('fecha_salida', [$fechaLlegada, $fechaSalida])
                        ->orWhere(function ($innerSubQuery) use ($fechaLlegada, $fechaSalida) {
                            $innerSubQuery->where('fecha_llegada', '<', $fechaLlegada)
                                ->where('fecha_salida', '>', $fechaSalida);
                        });
                });
            })
            ->get();

        // Devolver la respuesta en formato JSON
        return response()->json([
            'pisosDisponibles' => $pisosDisponibles
        ]);
    }
}
