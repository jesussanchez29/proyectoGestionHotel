<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
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
            'fechaLlegada' => 'required|date',
            'fechaSalida' => 'required|date',
            'piso_id' => 'required',
            'habitacion' => 'required',
        ];
    }
}
