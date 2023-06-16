<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaracteristicaHabitacionRequest extends FormRequest
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
            'descripcion' => 'required',
            'tipoHabitacion' => 'required'
        ];
    }
}
