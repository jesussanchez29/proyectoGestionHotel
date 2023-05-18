<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Servicio;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    // Funcion para enviar los departamentos a la vista departamentos
    public function indexCliente()
    {
        $hotel = Hotel::first();
        $servicios = Servicio::all();
        return view('Clientes.index', compact('hotel', 'servicios'));
    }

    public function indexEmpleado()
    {
        $hotel = Hotel::first();
        return view('Empleados.Hotel.index', compact('hotel'));
    }

    public function updateOrCreate(Request $request)
    {
        $hotel = Hotel::first(); // obtiene el primer registro de la tabla Hotel

        // Verifica si el registro existe
        if ($hotel) {
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
            $hotel->save();
        } else {
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
            // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
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
            $hotel->save();
        }
        // Nos redirige a habitaciones con un mensaje
        return redirect()->route('configuracion')->with('success', 'Cambios actualizado correctamente');
    }
}
