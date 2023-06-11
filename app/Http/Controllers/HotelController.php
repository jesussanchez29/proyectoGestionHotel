<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactoRequest;
use App\Mail\ContactoMailable;
use App\Models\Habitacion;
use App\Models\Hotel;
use App\Models\Resena;
use App\Models\Servicio;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    // Funcion para enviar todos los datos a la pagina principal
    public function indexCliente()
    {
        $hotel = Hotel::first();
        $servicios = Servicio::all();
        $tipoHabitaciones = TipoHabitacion::all();
        $pisos =  Habitacion::select('pisos.id', 'pisos.numero')
            ->join('tipoHabitacion', 'habitaciones.tipoHabitacion_id', '=', 'tipoHabitacion.id')
            ->join('estadohabitacion', 'habitaciones.estadoHabitacion_id', '=', 'estadohabitacion.id')
            ->join('pisos', 'pisos.id', '=', 'habitaciones.piso_id')
            ->where('estadohabitacion.nombre', 'Disponible')
            ->groupBy('pisos.numero', 'pisos.id')
            ->get();
        $resenas = Resena::all();
        return view('Clientes.index', compact('hotel', 'servicios', 'tipoHabitaciones', 'pisos', 'resenas'));
    }

    // Funcion para enviar los datos a la vista hotel
    public function indexEmpleado()
    {
        if (!Auth::user() || Auth::user()->cliente) {
            return redirect()->route('indexCliente');
        } elseif (Auth::user()->empleado) {
            $hotel = Hotel::first();
            return view('Empleados.Hotel.index', compact('hotel'));
        }
    }

    // Funcion para crear o actualizar los datos del hotel
    public function updateOrCreate(Request $request)
    {
        $hotel = Hotel::first();

        // Si los datos del hotel existen
        if ($hotel) {
            // Validacion
            $request->validate([
                'imagen' => 'nullable|image',
                'logo' => 'nullable|image',
                'nombre' => 'required',
                'cadena' => 'required',
                'telefono' => 'required|regex:"[0-9]{9}"',
                'email' => 'required|regex:/^.+@.+$/i',
                'direccion' => 'required',
                'ciudad' => 'required',
            ]);

            // Guuardamo los datos
            if ($request->has('imagen')) {
                $file = $request->file('imagen')->store('public/hotel');
                $url = Storage::url($file);
                $hotel->imagen = substr($url, 1);
            }
            if ($request->has('logo')) {
                $file = $request->file('logo')->store('public/hotel');
                $url = Storage::url($file);
                $hotel->logo = substr($url, 1);
            }
            $hotel->nombre = $request->input('nombre');
            $hotel->cadena = $request->input('cadena');
            $hotel->telefono = $request->input('telefono');
            $hotel->email = $request->input('email');
            $hotel->direccion = $request->input('direccion');
            $hotel->ciudad = $request->input('ciudad');
            // Actualizamos los datos
            $hotel->save();
        } else {
            // Validacion
            $request->validate([
                'imagen' => 'required|image',
                'logo' => 'required|image',
                'nombre' => 'required',
                'cadena' => 'required',
                'telefono' => 'required|regex:"[0-9]{9}"',
                'email' => 'required|regex:/^.+@.+$/i',
                'direccion' => 'required',
                'ciudad' => 'required',
            ]);

            $hotel = new Hotel();
            // Guuardamo los datos
            $file = $request->file('imagen')->store('public/hotel');
            $url = Storage::url($file);
            $hotel->imagen = substr($url, 1);
            $file = $request->file('logo')->store('public/hotel');
            $url = Storage::url($file);
            $hotel->logo = substr($url, 1);
            $hotel->nombre = $request->input('nombre');
            $hotel->cadena = $request->input('cadena');
            $hotel->telefono = $request->input('telefono');
            $hotel->email = $request->input('email');
            $hotel->direccion = $request->input('direccion');
            $hotel->ciudad = $request->input('ciudad');
            // Creamos la informacion del hotel
            $hotel->save();
        }
        // Nos redirige a configuracion con un mensaje
        return redirect()->route('configuracion')->with('success', 'Cambios actualizado correctamente');
    }

    // Funcion para crear la vista contacto
    public function contacto()
    {
        return view('Clientes.contacto');
    }

    // Funcion para enviar mensaje de consulta al hotel
    public function enviarMensajeContacto(ContactoRequest $request)
    {
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $mensaje = $request->input('mensaje');

        // Envía el correo utilizando la plantilla de correo electrónico
        Mail::to('infoestelahorizonte@gmail.com')->send(new ContactoMailable($nombre, $email, $mensaje));

        // Nos redirige a configuracion con un mensaje
        return back()->with('success', '¡El formulario se ha enviado con éxito!');
    }
}