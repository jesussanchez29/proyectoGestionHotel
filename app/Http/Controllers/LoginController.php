<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Funcion para ir a la vista login
    public function index()
    {
        return view('login');
    }

    // Funcion para que una vez logeado nos rediriga a la vista que corresponda
    public function login(LoginRequest $request)
    {
        // Obtenemos los datos del formulario
        $credenciales = $request->obtenerCrendeciales();
        // validamos las credenciales del formulario
        $validacion = $this->validarCredenciales($credenciales);
        // Si no es correcta
        if (!$validacion) {
            //Nos redirige atras con un mensaje de error
            return back()->withErrors(['invalid_credentials' => 'Usuario o contraseña no valido'])->withInput();
        }

        //Guardamos la sesion con las credenciales
        Auth::login($validacion);

        // Si la sesion es un cliente
        if ($validacion->estado == 0) {
            return back()->withErrors(['invalid_user' => 'El usuario esta desactivado, contacta con eladministrador'])->withInput();
        } else {
            if ($validacion->primerInicioSesion == 1) {
                return redirect()->route('cambioContrasena', $validacion->id);
            } else {
                if ($validacion->cliente) {
                    // Nos redirige al indexCliente
                    return redirect()->route('indexCliente');
                    // Si es empleado
                } elseif ($validacion->empleado) {
                    // Nos redirige al indexEmpleado
                    return redirect()->route('calendarioReservas');
                }
            }
        }
    }

    // Funcion para validar si los datos de inicio de sesion son correctos
    public function validarCredenciales($credenciales)
    {
        // Otenemos email del usuario
        $usuario = Usuario::where('email', $credenciales['email'])->first();
        //Si las contraseñas coinciden
        if ($usuario && Hash::check($credenciales['password'], $usuario->password)) {
            return $usuario;
        }
        // Si no coinciden
        return false;
    }
}
