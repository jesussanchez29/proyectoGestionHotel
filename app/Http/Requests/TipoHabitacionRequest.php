<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoHabitacionRequest extends FormRequest
{
    // Metodo que autoriza a validar el tipo de habitacion
    public function authorize(): bool
    {
        return true;
    }

    // Metodo que valida los campos del tipo de habitacion
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
