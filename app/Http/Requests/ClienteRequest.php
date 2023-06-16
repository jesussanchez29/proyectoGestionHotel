<?php

namespace App\Http\Requests;

use App\Rules\TipoIdentificacion;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    // Autoriza la validacion
    public function authorize(): bool
    {
        return true;
    }

    // Validacion
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'tipoIdentificacion' => 'required',
            'identificacion' => ['required', new TipoIdentificacion($this->input('tipoIdentificacion')), 'unique:clientes,identificacion'],
            'email' => 'required|unique:usuarios,email|regex:/^.+@.+$/i',
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ];
    }
}

