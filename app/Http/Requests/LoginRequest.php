<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required'
        ];
    }

    // Metodo para obtener el email y contraseña del formulario
    public function obtenerCrendeciales()
    {
        return [
            'email' => $this->get('email'),
            'password' => $this->get('password')
        ];
    }
}
