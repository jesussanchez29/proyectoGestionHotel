<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaRequest;
use App\Models\Acompanante;
use App\Models\CaracteristicaTipoHabitacion;
use App\Models\Cliente;
use App\Models\EstadoHabitacion;
use App\Models\Habitacion;
use App\Models\Piso;
use App\Models\Reserva;
use App\Models\ReservaServicio;
use App\Models\TipoHabitacion;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    // Funcion para enviar las reservas a la vista de habitareservasciones
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $habitaciones = Habitacion::all();
            $pisos = Piso::all();
            return view('Empleados.Reserva.index', compact('habitaciones', 'pisos'));
        }
    }

    // Funcion para crear una reserva un cliente
    public function createCliente(ReservaRequest $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión para realizar una reserva');
        }

        $reserva = new Reserva();
        // Asignamos los datos
        $reserva->fechaLLegada = $request->input('fechaLlegada');
        $reserva->fechaSalida = $request->input('fechaSalida');
        $reserva->abonado = 0;
        $reserva->estado = true;
        $reserva->usuario_id = Auth::user()->id;
        $habitacion = Habitacion::where('piso_id', $request->input('piso_id'))->where('tipoHabitacion_id', $request->input('habitacion'))->inRandomOrder()->first();
        $reserva->habitacion_id = $habitacion->id;
        // Creamos la reserva
        $reserva->save();
        // Nos redirige a indexCLientes con un mensaje
        return redirect()->route('verReservaCliente', $reserva->id)->with('success', 'Reserva confirmada');
    }

    // Funcion para crear una reserva un empleado
    public function createEmpleado(Request $request)
    {
        $request->validate([
            'fechaLlegadaOculta' => 'required',
            'fechaSalida' => 'required',
            'cliente' => 'required',
            'habitacion' => 'required',
        ]);

        $reserva = new Reserva();
        // Asignamos los datos
        $reserva->fechaLLegada = $request->input('fechaLlegadaOculta');
        $fechaSalida = Carbon::createFromFormat('Y-m-d', $request->input('fechaSalida'));
        $fechaSalida->addDay(); // Sumar un día a la fecha de salida
        $reserva->fechaSalida = $fechaSalida->format('Y-m-d');
        $reserva->fechaSalida = $request->input('fechaSalida');
        $reserva->abonado =  0;
        $reserva->estado = true;
        $reserva->usuario_id =  $request->input('cliente');
        $reserva->habitacion_id = $request->input('habitacion');
        $reserva->empleado_id = Auth::user()->empleado->id;
        // Creamos la reserva
        $reserva->save();

        $fechaActual = date('Y-m-d');
        // Si la fecha actual es igual a la fecha de llegada se actualzia ele stado de la habitacion a ocupada
        if ($fechaActual == $request->input('fechaLlegada')) {
            $habitacion = Habitacion::find($request->habitacion);
            $estadoOcupado = EstadoHabitacion::where('nombre', 'Ocupada')->first();
            $habitacion->estadoHabitacion_id = $estadoOcupado->id;
            // Creamos la reserva
            $habitacion->save();
        }

        // Nos redirige a la pagina anterior con un mensaje
        return back()->with('success', 'Reserva confirmada');
    }

    // Funcion para ver una reserva concreta
    public function viewReserva($id)
    {
        $reserva = Reserva::find($id);
        $reservaHabitacion = Habitacion::findOrFail($id);
        $buscarTipo = $reservaHabitacion->tipoHabitacion_id;
        $caracteristicasHabitacion = CaracteristicaTipoHabitacion::where('tipoHabitacion_id', $buscarTipo)->get();
        $clientes = Cliente::all();
        $estadoOcupado = EstadoHabitacion::where('nombre', 'Ocupada')->first();
        $acompanantes = Acompanante::where('reserva_id', $id)->get();
        $servicios = ReservaServicio::where('reserva_id', $id)->get();
        return view('Empleados.Reserva.ver', compact('reserva', 'reservaHabitacion', 'caracteristicasHabitacion', 'acompanantes', 'servicios'));
    }

    // Funcion para ver los reportes de habitaciones
    public function reportes()
    {
        $habitaciones = Habitacion::all();
        return view('Empleados.reportes', compact('habitaciones'));
    }

    // Funcion que obtiene los reportes de las reserva en una fecha concreta
    public function obtenerReporte(Request $request)
    {
        $fechaInicio = $request->input('fechaLlegada');
        $fechaFin = $request->input('fechaSalida');
        $habitacionId = $request->input('habitacion');

        // Obtiene la reserva entre el rango de fecha y el numero de habitacion
        $reportesReserva = Reserva::where(function ($query) use ($fechaInicio, $fechaFin, $habitacionId) {
            $query->where('fechaLlegada', '>=', $fechaInicio)
                ->where('fechaSalida', '<=', $fechaFin);

            if ($habitacionId !== 'Todos') {
                $query->where('habitacion_id', $habitacionId);
            }
        })->get();

        // Creamos un objeto para el pdf
        $pdf = new Dompdf();
        // Enviamos los reportes de la reserva a la plantilla
        $html = view('Empleados.reporteHabitaciones', compact('reportesReserva'))->render();
        $pdf->loadHtml($html);

        $pdf->render();
        // Descarga el pdf con los reportes
        return $pdf->stream('reportesHabitaciones.pdf');

        return back()->with('success', 'Reportes descargado correctamente');
    }

    // Funcion para obtner la factura de la reserva de un cliente
    public function obtenerFactura($id)
    {
        // Obtener los datos de los servicios y las reservas
        $servicios = ReservaServicio::where('reserva_id', $id)->get();
        $reservas = Reserva::where('id', $id)->get();

        $totalServicios = 0;
        foreach ($servicios as $reservaServicio) {
            $totalServicios += $reservaServicio->servicio->precio;
        }

        // Calcular el total de la reserva
        $totalReservas = 0;
        foreach ($reservas as $reserva) {
            $fechaEntrada = Carbon::parse($reserva->fechaLLegada);
            $fechaSalida = Carbon::parse($reserva->fechaSalida);
            $totalReservas += $fechaEntrada->diffInDays($fechaSalida) * $reserva->habitacion->tipoHabitacion->precio;
        }


        // Crear un array con los datos que se pasarán a la vista
        $data = [
            'servicios' => $servicios,
            'reservas' => $reservas,
            'totalServicios' => $totalServicios,
            'totalReservas' => $totalReservas,
        ];


        $pdf = new Dompdf();
        $html = view('factura', $data)->render();
        $pdf->loadHtml($html);


        $pdf->render();

        return $pdf->stream('factura.pdf');
    }

    // Funcion para enviar las reservas al clanedario de reservas
    public function calendarioReservas()
    {
        $reservasHabitaciones = Reserva::where('estado', 1)->get();
        $clientes = Cliente::all();
        $tipoHabitaciones = TipoHabitacion::all();

        $reservas = [];
        foreach ($reservasHabitaciones as $reserva) {
            $reservas[] = [
                'id' => $reserva->id,
                'title' => 'Habitacion ' . $reserva->habitacion->numero,
                'start' => $reserva->fechaLLegada,
                'end' => date('Y-m-d', strtotime($reserva->fechaSalida . ' +1 day')),
            ];
        }
        return view('Empleados.Reserva.calendario', compact('reservas', 'clientes', 'tipoHabitaciones'));
    }

    // Funcion para actualizar la fecha de salida
    public function actualizarFechaSalida(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->fechaSalida = $request->fechaSalida;
        $reserva->save();
    }

    // Funcion para actualizar el pago de la reserva de salida
    public function actualizarPagoReserva(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->abonado = $request->abonado;
        $reserva->save();
        return back()->with('success', 'Pago actualizado correctamente');
    }

    // Funcion para msotrar la vista de las reservas del cliente
    public function reservaCliente()
    {
        $reservas = Reserva::leftJoin('acompanantes', 'reservas.id', '=', 'acompanantes.reserva_id')
            ->select('reservas.*', 'reservas.id as reserId', 'acompanantes.*', 'acompanantes.id as idAcom')
            ->where('reservas.usuario_id', Auth::user()->id)
            ->get();
        return view('Clientes.Reserva.index', compact('reservas'));
    }

    // Funcion para finalizar o cancelar una reserva
    public function finalizarCancelarReserva($id)
    {
        $reserva = Reserva::find($id);
        $reserva->estado = false;
        $reserva->save();

        $habitacion = Habitacion::find($reserva->habitacion_id);
        $estadoHabitacion = EstadoHabitacion::where('nombre', 'Limpieza')->first();
        $habitacion->estadoHabitacion_id = $estadoHabitacion->id; 
        $habitacion->save();

        return back()->with('success', 'Reserva finalizada correctamente');
    }

     // Funcion para msotrar la vista de las reservas del cliente
     public function verReservaCliente($id)
     {
        $reserva = Reserva::find($id);
        $habitacion = Habitacion::find($reserva->habitacion_id);
        $caracteristicasHabitacion = CaracteristicaTipoHabitacion::where('tipoHabitacion_id', $habitacion->tipoHabitacion_id)->get();
        $servicios = ReservaServicio::where('reserva_id', $id)->get();

        $fechaLlegada = Carbon::parse($reserva->fechaLlegada);
        $puedeCancelar = false;
        if ($fechaLlegada) {
            $now = Carbon::now();
            $diferenciaHoras = $fechaLlegada->diffInHours($now);
    
            if ($diferenciaHoras > 24) {
                $puedeCancelar = true;
            }
        }

        return view('Clientes.Reserva.ver', compact('reserva', 'habitacion', 'caracteristicasHabitacion', 'servicios'), ['puedeCancelar' => $puedeCancelar]);
     }
}
