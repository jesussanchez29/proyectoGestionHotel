<?php

namespace App\Http\Requests;

use App\Rules\TipoIdentificacion;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    // Metodo que autoriza a validar el cliente
    public function authorize(): bool
    {
        return true;
    }

    // Metodo que valida los campos del cliente
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'tipoIdentificacion' => 'required',
            'identificacion' => ['required', new TipoIdentificacion($this->input('tipoIdentificacion')), 'unique:clientes,identificacion'],
            'email' => 'required|unique:clientes,email|regex:/^.+@.+$/i',
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ];
    }
}

