<?php

namespace App\Http\Requests;

use App\Rules\TipoIdentificacion;
use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    // Metodo que autoriza a validar el empleado
    public function authorize(): bool
    {
        return true;
    }

    // Metodo que valida los campos del empleado
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaNacimiento' => 'required',
            'dni' => ['required', new TipoIdentificacion('DNI'), 'unique:empleados,dni'],
            'email' => 'required|unique:usuarios,email|regex:/^.+@.+$/i',
            'telefono' => 'required|regex:"[0-9]{9}"',
            'direccion' => 'required'
        ];
    }
}
