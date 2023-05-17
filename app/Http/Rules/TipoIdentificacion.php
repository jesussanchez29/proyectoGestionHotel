<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class TipoIdentificacion implements Rule
{
    private $tipo;

    public function __construct($tipo)
    {
        $this->tipo = $tipo;
    }

    public function passes($attribute, $value)
    {
        switch ($this->tipo) {
            case 'Pasaporte':
                return preg_match('/^[A-Z]{2}\d{7}$/', $value);
            case 'Carnet conducir':
                return preg_match('/^\d{9}$/', $value);
            case 'DNI':
                return preg_match('/^\d{8}[A-Z]$/', $value);
        }
    }

    public function message()
    {
        return 'El campo :attribute no es válido para el tipo de identificación seleccionado.';
    }
}
