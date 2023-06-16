<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitacionRequest extends FormRequest
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
            'numero' => 'required|unique:habitaciones,numero',
            'estadoHabitacion' => 'required',
            'piso' => 'required',
            'tipoHabitacion' => 'required',
        ];
    }
}
