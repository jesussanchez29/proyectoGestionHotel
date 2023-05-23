<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    # Metodo que autoriza a logearse
    public function authorize(): bool
    {
        return true;
    }

    # Metodo que valida los campos de nuestro login
    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    # Metodo para obtener el nick y contraseña del formulario
    public function obtenerCrendeciales()
    {
        return [
            'email' => $this->get('email'),
            'password' => $this->get('password')
        ];
    }
}
