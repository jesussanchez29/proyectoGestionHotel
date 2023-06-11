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
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required|date',
            'tipoIdentificacion' => function ($attribute, $value, $fail) {
                $fechaNacimiento = $this->input('fechaNacimiento');
                if (!empty($fechaNacimiento)) {
                    $fechaActual = Carbon::now();
                    $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $fechaNacimiento);
                    $edad = $fechaNacimiento->diffInYears($fechaActual);
                    if ($edad >= 18 && empty($value)) {
                        $fail('El campo tipoIdentificacion es requerido para acompañantes mayores de 18 años.');
                    }
                }
            },
            'identificacion' => function ($attribute, $value, $fail) {
                $fechaNacimiento = $this->input('fechaNacimiento');
                if (!empty($fechaNacimiento)) {
                    $fechaActual = Carbon::now();
                    $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $fechaNacimiento);
                    $edad = $fechaNacimiento->diffInYears($fechaActual);
                    if ($edad >= 18 && empty($value)) {
                        $fail('El campo identificacion es requerido para acompañantes mayores de 18 años.');
                    }
                }
            },
            'telefono' => 'nullable|regex:/[0-9]{9}/',
        ];
    }
}
