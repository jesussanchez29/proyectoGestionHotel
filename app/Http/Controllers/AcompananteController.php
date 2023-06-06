<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcompananteRequest;
use App\Models\Acompanante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcompananteController extends Controller
{
    // Funcion para crear un cliente
    public function create(AcompananteRequest $request)
    {
        DB::beginTransaction();

        try {
            $acompanante = new Acompanante();
            // Obtenemos los datos del formulario y lo igualamos a los campos de la base de datos
            $acompanante->nombre = $request->input('nombre');
            $acompanante->apellidos = $request->input('apellidos');
            $acompanante->fechaNacimiento = $request->input('fechaNacimiento');
            $acompanante->tipoIdentificacion = $request->input('tipoIdentificacion');
            $acompanante->identificacion = $request->input('identificacion');
            $acompanante->telefono = $request->input('telefono');
            $acompanante->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        // Nos redirige a clientes con un mensaje
        return back()->with('success', 'Acompañante registrado correctamente');
    }

}
