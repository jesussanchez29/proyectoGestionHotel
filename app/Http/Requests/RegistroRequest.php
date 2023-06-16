<?php

namespace App\Http\Requests;

use App\Rules\TipoIdentificacion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistroRequest extends FormRequest
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
            'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised(),],
            'repassword' => 'required|same:password',
            'telefono' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
            'direccion' => 'required'
        ];
    }
}
