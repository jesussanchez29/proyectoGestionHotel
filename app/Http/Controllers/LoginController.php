<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Funcion para ir a la vista login en caso de que el usuario este logeado se dirige al index
    public function index()
    {
        return view('Clientes.login');
    }

    //Funcion para que una vez logeado nos rediriga al index
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

        if($validacion->cliente)
        {
            return redirect()->route('indexCliente');
        } elseif($validacion->empleado) {
            return redirect()->route('clientes');
        }
       
    }

    // Funcion para validar si los datos de inicio de sesion son correctos
    public function validarCredenciales($credenciales)
    {
        $usuario = Usuario::where('email', $credenciales['email'])->first();
        if ($usuario && Hash::check($credenciales['password'], $usuario->password)) {
            return $usuario;
        }
        return false;
    }

    public function logout()
    {
        // Cierra la sesion
        Auth::logout();
        // Nos dirige a la vista index
        return redirect()->route('indexCliente');
    }
}
