<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoRequest extends FormRequest
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
            'email' => 'required|regex:/^.+@.+$/i',
            'mensaje' => 'required',
        ];
    }
}
