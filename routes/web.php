<?php

use App\Http\Controllers\CambiarContrasenaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoHabitacionController;
use Illuminate\Support\Facades\Route;

// Route Controlador Cliente
Route::controller(ClienteController::class)->group(function () {
    // Route para mostrar todos los clientes
    Route::get('clientes', 'indexEmpleado')->name('clientes');
    // Route para crear un cliente
    Route::post('cliente/crear', 'create')->name('crearCliente');
    // Route para editar un cliente
    Route::post('cliente/editar/{id}', 'update')->name('editarCliente');
    // Route para eliminar un cliente
    Route::post('cliente/eliminar/{id}', 'destroy')->name('eliminarCliente');
});

// Route Controlador Departamento
Route::controller(DepartamentoController::class)->group(function () {
    // Route para mostrar todos los departamentos
    Route::get('departamentos', 'indexEmpleado')->name('departamentos');
    // Route para crear un departamento
    Route::post('departamento/crear', 'create')->name('crearDepartamento');
    // Route para editar un departamento
    Route::post('departamento/editar/{id}', 'update')->name('editarDepartamento');
    // Route para eliminar un departamento
    Route::post('departamento/eliminar/{id}', 'destroy')->name('eliminarDepartamento');
});

// Route Controlador Empleado
Route::controller(EmpleadoController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('empleados', 'indexEmpleado')->name('empleados');
    // Route para crear un empleado
    Route::post('empleado/crear', 'create')->name('crearEmpleado');
    // Route para editar un departamento
    Route::post('empleado/editar/{id}', 'update')->name('editarEmpleado');
    // Route para eliminar un departamento
    Route::post('empleado/eliminar/{id}', 'destroy')->name('eliminarEmpleado');
});

// Route Controlador Empleado
Route::controller(HotelController::class)->group(function () {
    Route::get('/', 'indexCliente')->name('indexCliente');
    // Route para mostrar todos los empleados
    Route::get('configuracion', 'indexEmpleado')->name('configuracion');
    // Route para crear un empleado
    Route::post('configuracion/Createupdate/', 'updateOrCreate')->name('updateOrCreaterConfiguracion');
    Route::get('/contacto', 'contacto')->name('contacto');

});

// Route Controlador Empleado
Route::controller(ServicioController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('servicios', 'indexEmpleado')->name('servicios');
    Route::get('servicios', 'indexCliente')->name('serviciosCliente');
    // Route para crear un empleado
    Route::post('servicio/crear', 'create')->name('crearServicio');
    // Route para editar un departamento
    Route::post('servicio/editar/{id}', 'update')->name('editarServicio');
    // Route para eliminar un departamento
    Route::post('servicio/eliminar/{id}', 'destroy')->name('eliminarServicio');
});

// Route Controlador Empleado
Route::controller(TipoHabitacionController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('tipoHabitaciones', 'indexEmpleado')->name('tipoHabitaciones');
    Route::get('tipoHabitacionesCliente', 'indexCliente')->name('tipoHabitacionesClientes');
    Route::post('tipoHabitacion/crear', 'create')->name('crearTipoHabitacion');
    Route::post('tipoHabitacion/editar/{id}', 'update')->name('editarTipoHabitacion');
    Route::post('tipoHabitacion/eliminar/{id}', 'destroy')->name('eliminarTipoHabitacion');
    Route::get('tipoHabitacion/ver/{id}', 'view')->name('verTipoHabitacion');
    Route::get('/get-pisos-disponibles', 'getPisosDisponibles')->name('getPisosDisponibles');

});

// Route Controlador Empleado
Route::controller(ReservaController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::post('reserva/crear', 'createCliente')->name('crearReservaCliente');
});

// Route Controlador Registro
Route::controller(RegistroController::class)->group(function () {
    // Route para ir a la ruta registro
    Route::get('registro', 'index')->name('registro');
    // Route para crear registro base de datos
    Route::post('registro', 'createCliente');
});

// Route Controlador Login
Route::controller(LoginController::class)->group(function () {
    // Route para ir a la ruta login
    Route::get('login', 'index')->name('login');
    // Route para validar las credenciales
    Route::post('login', 'login');
    Route::get('logout', 'logout')->name('logout');
});

// Route Controlador Login
Route::controller(CambiarContrasenaController::class)->group(function () {
    // Route para ir a la ruta login
    Route::get('cambiarContrasena', 'index')->name('cambiarContrasena');
    // Route para validar las credenciales
    Route::post('cambiarContrasena/{id}', 'cambiarContrasena');
});
