<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaRequest;
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

    public function obtenerFactura(){
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
