<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
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
            'icono' => 'required|image|max:2048',
            'nombre' => 'required|unique:departamentos,nombre',
            'descripcion' => 'required',
        ];
    }
}
