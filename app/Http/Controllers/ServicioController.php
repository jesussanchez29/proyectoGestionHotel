<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Hotel;
use App\Models\ReservaServicio;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    // Funcion para enviar los servicios a la vista servicos
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $servicios = Servicio::all();
            return view('Empleados.Servicio.index', compact('servicios'));
        }
    }

    // Funcion para enviar los servicios a la vista servicos
    public function indexCliente()
    {
        $serviciosPaginados = Servicio::paginate(4);
        $servicios = Servicio::all();
        return view('Clientes.Servicio.index', compact('serviciosPaginados', 'servicios'));
    }

    // Funcion para crear un servicio
    public function create(ServicioRequest $request)
    {
        $servicio = new Servicio();
        // Guardamos los datos
        $file = $request->file('imagen')->store('public/servicios');
        $url = Storage::url($file);
        $servicio->imagen = substr($url, 1);
        $servicio->nombre = $request->input('nombre');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->horaInicio = $request->input('horaInicio');
        $servicio->horaFin = $request->input('horaFin');
        $servicio->precio = $request->input('precio');
        $servicio->disponibilidad = 1;
        //Creamos el servicio
        $servicio->save();
        // Nos redirige a servicios con un mensaje
        return redirect()->route('servicios')->with('success', 'Servicio registrado correctamente');
    }

    // Funcion para modificar un servicio
    public function update(Request $request, $id)
    {
        // Obtiene el servicio a partir del id
        $servicio = Servicio::findOrFail($id);

        // Validacion para la actualizacion
        $request->validate([
            'imagen' => 'nullable|image|max:2048',
            'nombre' => 'required|unique:servicios,nombre,' . $servicio->id,
            'descripcion' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'precio' => 'required',
        ]);

        // Guardamos los datos
        if ($request->has('imagen')) {
            $file = $request->file('icono')->store('public/servicios');
            $url = Storage::url($file);
            $servicio->imagen = substr($url, 1);
        }
        $servicio->nombre = $request->input('nombre');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->horaInicio = $request->input('horaInicio');
        $servicio->horaFin = $request->input('horaFin');
        $servicio->precio = $request->input('precio');
        // Actualizamos el servicio
        $servicio->save();
        // Nos redirige a servicios con un mensaje
        return redirect()->route('servicios')->with('success', 'Servicio modificado correctamente');
    }

    //Funcion para eliminar un servicio
    public function destroy($id)
    {
        // Obtiene el servicio a partir del id
        $servicio = Servicio::find($id);
        // Elimina al servicio
        $servicio->delete();
        // Nos redirige a servicio con un mensaje
        return redirect()->route('servicios')->with('success', 'Servicio eliminado correctamente');
    }

    // Funcion para obtener las horas disponibles de un servicio en una fecha
    public function obtenerHorasDisponibles(Request $request)
    {
        $fecha = $request->input('fecha');
        $servicioId = $request->input('servicio');

        // Obtiene la hora de apertura y cierre del servicio
        $servicio = Servicio::find($servicioId);
        $horaApertura = Carbon::createFromFormat('H:i', $servicio->horaInicio);
        $horaCierre = Carbon::createFromFormat('H:i', $servicio->horaFin);

        // Obtiene la duración y capacidad del servicio
        $duracion = $servicio->duracion;
        $capacidad = $servicio->capacidad;

        // Obtenemos las horas ocupadas de los servicios
        $horasOcupadas = DB::table('reservaServicio')
            ->join('reservas', 'reservaServicio.reserva_id', '=', 'reservas.id')
            ->where('reservaServicio.fecha', $fecha)
            ->where('reservaServicio.servicio_id', $servicioId)
            ->groupBy('reservaServicio.hora')
            ->select('reservaServicio.hora', DB::raw('count(*) as cantidad'))
            ->pluck('cantidad', 'reservaServicio.hora')
            ->toArray();

        $horasDisponibles = [];

        $horaActual = $horaApertura->copy();
        // Itera desde la hora de apertura hasta la hora de cierre, agregando la duración
        while ($horaActual->addMinutes($duracion)->lte($horaCierre)) {
            // guardamos la hora actual a fomrato fecha
            $hora = $horaActual->format('H:i');

            if (!isset($horasOcupadas[$hora]) || $capacidad <= $horasOcupadas[$hora]) {
                $horasDisponibles[] = $hora;
            }
        }

        // Devuelve las horas disponibles
        return response()->json($horasOcupadas);
    }

    // Funcion para registrar un servicio a una reserva concreta
    public function registrarReservaServicio(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'reserva' => 'required',
            'fecha' => 'required|date',
            'servicio' => 'required|exists:servicios,id',
            'hora' => 'required'
        ]);

        $reservaServicio = new ReservaServicio();
        // Asignamos los valores
        $reservaServicio->reserva_id = $request->input('reserva');
        $reservaServicio->servicio_id = $request->input('servicio');
        $reservaServicio->fecha = $request->input('fecha');
        $reservaServicio->hora = $request->input('hora');
        // Creamos la reserva
        $reservaServicio->save();

        // Nos redirige a la apgina anterior con un mensaje
        return back()->with('success', 'Reserva del servicio realizada exitosamente');
    }
}
