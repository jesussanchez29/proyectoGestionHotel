<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'imagen' => 'required|image|max:2048',
            'nombre' => 'required|unique:servicios,nombre',
            'descripcion' => 'required',
            'horaInicio' => 'required',
            'horaFin' => 'required',
            'precio' => 'required',
        ];
    }
}
