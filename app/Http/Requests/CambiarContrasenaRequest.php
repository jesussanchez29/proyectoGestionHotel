<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambiarContrasenaRequest extends FormRequest
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
            'password' => 'required',
            'repassword' => 'required|same:password'
        ];
    }
}
