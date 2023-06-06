<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaRequest;
use App\Models\Acompanante;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\Cliente;
use App\Models\EstadoHabitacion;
use App\Models\EstadoReserva;
use App\Models\Habitacion;
use App\Models\Piso;
use App\Models\Reserva;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function indexEmpleado()
    {
        $habitaciones = Habitacion::all();
        $pisos = Piso::all();
        return view('Empleados.Reserva.index', compact('habitaciones', 'pisos'));
    }

    // Funcion para crear un cliente
    public function createCliente(ReservaRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión para realizar una reserva');
        }

        $reserva = new Reserva();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $reserva->fechaLLegada = $request->input('fechaLlegada');
        $reserva->fechaSalida = $request->input('fechaSalida');
        $reserva->abonado = 0;
        $reserva->usuario_id = Auth::user()->id;
        $habitacion = Habitacion::where('piso_id', $request->input('piso_id'))->where('tipoHabitacion_id', $request->input('habitacion'))->inRandomOrder()->first();
        $reserva->habitacion_id = $habitacion->id;
        $estadoPediente = EstadoReserva::where('nombre', 'Por confirmar')->first();
        $reserva->estadoReserva_id = $estadoPediente->id;
        $reserva->save();
        // Nos redirige a clientes con un mensaje
        return redirect()->route('indexCliente')->with('success', 'Reserva pediente por confirmar');
    }

    // Funcion para crear un cliente
    public function createEmpleado(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión para realizar una reserva');
        }

        $reserva = new Reserva();
        // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
        $reserva->fechaLLegada = $request->input('fechaLlegada');
        $reserva->fechaSalida = $request->input('fechaSalida');
        $reserva->abonado =  $request->input('abonado');;
        $reserva->usuario_id = 1;
        $reserva->habitacion_id = $request->habitacion;
        $reserva->empleado_id = Auth::user()->empleado->id;
        $estadoPediente = EstadoReserva::where('nombre', 'Confirmada')->first();
        $reserva->estadoReserva_id = $estadoPediente->id;
        $reserva->save();

        $fechaActual = date('Y-m-d');
        if ($fechaActual == $request->input('fechaLlegada')) {
            $habitacion = Habitacion::find($request->habitacion);
            $estadoOcupado = EstadoHabitacion::where('nombre', 'Ocupada')->first();
            $habitacion->estadoHabitacion_id = $estadoOcupado->id;
            $habitacion->save();
        }

        // Nos redirige a clientes con un mensaje
        return back()->with('success', 'Reserva confirmada');
    }

    public function viewCreateEmpleado($id)
    {
        $reservaHabitacion = Habitacion::findOrFail($id);
        $buscarTipo = $reservaHabitacion->tipoHabitacion_id;
        $caracteristicasHabitacion = CaracteristicaTipoHabitacion::where('tipoHabitacion_id', $buscarTipo)->get();
        $clientes = Cliente::all();
        $estadoOcupado = EstadoHabitacion::where('nombre', 'Ocupada')->first();
        $acompanantes = Acompanante::where('reserva_id',);
        return view('Empleados.Reserva.create', compact('reservaHabitacion', 'caracteristicasHabitacion', 'clientes', 'estadoOcupado', 'acompanantes'));
    }


    public function view($id)
    {
        $reservaHabitacion = Habitacion::findOrFail($id);
        return view('Empleados.Reserva.ver', compact('reservaHabitacion'));
    }

    public function reportes()
    {
        $habitaciones = Habitacion::all();
        return view('Empleados.reportes', compact('habitaciones'));
    }

    public function obtenerReporte(Request $request)
    {

        $fechaInicio = $request->input('fechaLlegada');
        $fechaFin = $request->input('fechaSalida');
        $habitacionId = $request->input('habitacion'); // Reemplaza 'habitacionId' con el nombre del campo que contiene el ID de la habitación en tu formulario

        $reportesReserva = Reserva::where(function ($query) use ($fechaInicio, $fechaFin, $habitacionId) {
            $query->where('fechaLlegada', '>=', $fechaInicio)
                ->where('fechaSalida', '<=', $fechaFin);

            if ($habitacionId !== 'Todos') {
                $query->where('habitacion_id', $habitacionId);
            }
        })->get();

        $pdf = new Dompdf();
        $html = view('Empleados.reporteHabitaciones', compact('reportesReserva'))->render();
        $pdf->loadHtml($html);


        $pdf->render();

        return $pdf->stream('reportesHabitaciones.pdf');

        return back();
    }

    public function obtenerFactura()
    {
        $fecha = '2023-06-05';
        $total = 100.00;

        $data = [
            'fecha' => $fecha,
            'total' => $total
        ];

        $pdf = new Dompdf();
        $html = view('factura', $data)->render();
        $pdf->loadHtml($html);


        $pdf->render();

        return $pdf->stream('factura.pdf');
    }
}
