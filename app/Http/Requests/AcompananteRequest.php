<?php

namespace App\Http\Requests;

use App\Rules\TipoIdentificacion;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AcompananteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::now();

        // Obtener la fecha de nacimiento del acompañante (asumiendo que tienes un campo "fechaNacimiento" en el formulario)
        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->input('fechaNacimiento'));

        // Calcular la edad del acompañante
        $edad = $fechaNacimiento->diffInYears($fechaActual);
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'tipoIdentificacion' => $edad >= 18 ? 'required' : '',
            'identificacion' => [
                $edad >= 18 ? 'required' : '',
            ],
            'telefono' => 'nullable|regex:"[0-9]{9}"',
        ];
    }
}
