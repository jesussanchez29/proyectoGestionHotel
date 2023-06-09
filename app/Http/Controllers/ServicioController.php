<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicioRequest;
use App\Models\Hotel;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    // Funcion para enviar los departamentos a la vista departamentos
    public function indexEmpleado()
    {
        $servicios = Servicio::all();
        return view('Empleados.Servicio.index', compact('servicios'));
    }

    // Funcion para enviar los departamentos a la vista departamentos
    public function indexCliente()
    {
        $serviciosPaginados = Servicio::paginate(4);
        $servicios = Servicio::all();
        return view('Clientes.Servicio.index', compact('serviciosPaginados', 'servicios'));
    }

    // Funcion para crear un departamento
    public function create(ServicioRequest $request)
    {
        $servicio = new Servicio();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $file = $request->file('imagen')->store('public/servicios');
        $url = Storage::url($file);
        $servicio->imagen = substr($url, 1);
        $servicio->nombre = $request->input('nombre');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->horaInicio = $request->input('horaInicio');
        $servicio->horaFin = $request->input('horaFin');
        $servicio->precio = $request->input('precio');
        $servicio->disponibilidad = 1;
        $servicio->save();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('servicios')->with('success', 'Servicio registrado correctamente');
    }

    // Funcion para modificar un departamento
    public function update(Request $request, $id)
    {
        // Obtiene el departamento a partir del id
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

        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
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
        $servicio->save();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('servicios')->with('success', 'Servicio modificado correctamente');
    }

    //Funcion para eliminar un departamento
    public function destroy($id)
    {
        // Obtiene el departamento a partir del id
        $servicio = Servicio::find($id);
        // Elimina al departamento
        $servicio->delete();
        // Nos redirige a departamento con un mensaje
        return redirect()->route('servicios')->with('success', 'Servicio eliminado correctamente');
    }

    public function obtenerHorasDisponibles(Request $request)
    {
        $fecha = $request->input('fecha');
        $servicioId = $request->input('servicio');

        // Obtiene la hora de apertura y cierre del servicio
        $servicio = Servicio::find($servicioId);
        $horaApertura = Carbon::createFromFormat('H:i', $servicio->horaInicio);
        $horaCierre = Carbon::createFromFormat('H:i', $servicio->horaFin);

        // Obtiene la duración del servicio
        $duracion = $servicio->duracion;

        // Realiza la consulta para obtener las horas ocupadas

        $horasOcupadas = DB::table('reservaServicio')
            ->join('reservas', 'reservaServicio.reserva_id', '=', 'reservas.id')
            ->where('reservaServicio.fecha', $fecha)
            ->pluck('reservaservicio.hora')
            ->toArray();

        // Realiza la consulta para obtener las horas disponibles
        $horasDisponibles = [];

        // Itera desde la hora de apertura hasta la hora de cierre, agregando la duración
        $horaActual = $horaApertura->copy();
        while ($horaActual->addMinutes($duracion)->lte($horaCierre)) {
            $hora = $horaActual->format('H:i');

            // Verifica si la hora está ocupada, y si no lo está, la agrega a las horas disponibles
            if (!in_array($hora, $horasOcupadas)) {
                $horasDisponibles[] = $hora;
            }
        }

        // Devuelve las horas disponibles como respuesta JSON
        return response()->json($horasDisponibles);
    }
}
