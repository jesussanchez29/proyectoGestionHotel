<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoHabitacionRequest extends FormRequest
{
    // Autoriza la validacion
    public function authorize(): bool
    {
        return true;
    }

    // Autoriza la validacion
    public function rules(): array
    {
        return [
            'imagen' => 'required|image|max:2048',
            'nombre' => 'required|unique:tipoHabitacion,nombre',
            'descripcion' => 'required',
            'capacidad' => 'required',
            'precio' => 'required'
        ];
    }
}
