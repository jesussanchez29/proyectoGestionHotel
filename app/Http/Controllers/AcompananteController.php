<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcompananteRequest;
use App\Models\Acompanante;
use Illuminate\Support\Facades\DB;

class AcompananteController extends Controller
{
    // Funcion para crear un acompañante
    public function create(AcompananteRequest $request)
    {
        DB::beginTransaction();

        try {
            $acompanante = new Acompanante();
            // Guardamos los datos
            $acompanante->nombre = $request->input('nombre');
            $acompanante->apellidos = $request->input('apellidos');
            $acompanante->fechaNacimiento = $request->input('fechaNacimiento');
            $acompanante->tipoIdentificacion = $request->input('tipoIdentificacion');
            $acompanante->identificacion = $request->input('identificacion');
            $acompanante->telefono = $request->input('telefono');
            $acompanante->reserva_id = $request->input('reserva');
            // Creamos el acompañante
            $acompanante->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        // Nos redirige a clientes con un mensaje
        return back()->with('success', 'Acompañante registrado correctamente');
    }


    // Funcion para modificar un acompañnte
    public function update(AcompananteRequest $request, $id)
    {
        // Obtiene el acompañnte a partir del id
        $acompanante = Acompanante::findOrFail($id);

        // Guardamos los datos
        $acompanante->nombre = $request->input('nombre');
        $acompanante->apellidos = $request->input('apellidos');
        $acompanante->fechaNacimiento = $request->input('fechaNacimiento');
        $acompanante->tipoIdentificacion = $request->input('tipoIdentificacion');
        $acompanante->identificacion = $request->input('identificacion');
        $acompanante->telefono = $request->input('telefono');
        // Actualizamos al acompñante
        $acompanante->save();
        // Nos redirige a acompañntes con un mensaje
        return back()->with('success', 'Acompañante modificado correctamente');
    }

    //Funcion para eliminar un acompañante
    public function destroy($id)
    {
        //Obtiene el acompñante a partir del id
        $acompanante = Acompanante::find($id);
        //Elimina al acompñante
        $acompanante->delete();
        // Nos redirige a clientes con un mensaje
        return back()->with('success', 'Acompañante eliminado correctamente');
    }
}
