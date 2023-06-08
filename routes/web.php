<?php

use App\Http\Controllers\AcompananteController;
use App\Http\Controllers\CambiarContrasenaController;
use App\Http\Controllers\CaracteristicaHabitacionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoHabitacionController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PisoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\UsuarioController;
use App\Models\Usuario;
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
    Route::post('/enviarMensajeContacto', 'enviarMensajeContacto')->name('enviarMensajeContacto');

});
// Route Controlador Empleado
Route::controller(ServicioController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('servicios', 'indexEmpleado')->name('servicios');
    Route::get('serviciosCliente', 'indexCliente')->name('serviciosCliente');
    // Route para crear un empleado
    Route::post('servicio/crear', 'create')->name('crearServicio');
    // Route para editar un departamento
    Route::post('servicio/editar/{id}', 'update')->name('editarServicio');
    // Route para eliminar un departamento
    Route::post('servicio/eliminar/{id}', 'destroy')->name('eliminarServicio');
    Route::post('/obtener-horas-disponibles', 'obtenerHorasDisponibles')->name('horas.disponibles');
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
    Route::post('/verificar-disponibilidad', 'ReservaController@verificarDisponibilidad')->name('verificarDisponibilidad');

});

// Route Controlador Empleado
Route::controller(ReservaController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('reservas', 'indexEmpleado')->name('reservas');
    Route::post('reserva/crear', 'createCliente')->name('crearReservaCliente');
    Route::post('reserva/crearEmpleado', 'createEmpleado')->name('crearReservaEmpleado');
    Route::get('reserva/VercrearEmpleado/{id}', 'viewCreateEmpleado')->name('verCrearReservaEmpleado');
    Route::post('reserva/crearEmpleado', 'createEmpleado')->name('crearReservaEmpleado');
    Route::get('reserva/ver/{id}', 'view')->name('verReserva');
    Route::get('reserva/obtenerClienteActualizados', 'obtenerClienteActualizados')->name('obtenerClienteActualizados');
    Route::get('obtenerFactura', 'obtenerFactura')->name('obtenerFactura');
    Route::get('reportes', 'reportes')->name('reportesReserva');
    Route::post('reportes/obtener', 'obtenerReporte')->name('obtenerReporte');
    Route::get('reserva/entradas', 'obtenerEntradasReserva')->name('obtenerEntradasReserva');
    Route::get('reserva/salidas', 'obtenerSalidasReserva')->name('obtenerSalidasReserva');
    Route::get('reserva/historial', 'historialReservas')->name('historialReservas');
    Route::get('reserva/calendario', 'calendarioReservas')->name('calendarioReservas');
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

// Route Controlador Login
Route::controller(ResenaController::class)->group(function () {
    // Route para ir a la ruta login
    Route::get('resenas', 'indexEmpleado')->name('resenas');
    Route::post('resena/crear/{tipoHabitacion}', 'create')->name('crearResena');
    Route::post('resena/cambiarEstado/{id}', 'cambiarEstado')->name('cambiarEstadoResena');
    Route::post('resena/eliminar/{id}', 'destroy')->name('eliminarResena');
    // Route para validar las credenciales
});

// Route Controlador Empleado
Route::controller(PisoController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('pisos', 'indexEmpleado')->name('pisos');
    Route::post('piso/crear', 'create')->name('crearPiso');
    Route::post('piso/editar/{id}', 'update')->name('editarPiso');
    Route::post('piso/eliminar/{id}', 'destroy')->name('eliminarPiso');
});

// Route Controlador Empleado
Route::controller(HabitacionController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('habitaciones', 'indexEmpleado')->name('habitaciones');
    Route::post('habitacion/crear', 'create')->name('crearHabitacion');
    Route::post('habitacion/editar/{id}', 'update')->name('editarHabitacion');
    Route::post('habitacion/eliminar/{id}', 'destroy')->name('eliminarHabitacion');
    Route::get('habitacion/obtenerDisponibles', 'obtenerHabitacionesDisponibles')->name('obtenerHabitacionesDisponibles');
});

// Route Controlador Empleado
Route::controller(EstadoHabitacionController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('estadoHabitaciones', 'indexEmpleado')->name('estadoHabitaciones');
    Route::post('estadoHabitacion/crear', 'create')->name('crearEstadoHabitacion');
    Route::post('estadoHabitacion/editar/{id}', 'update')->name('editarEstadoHabitacion');
    Route::post('estadoHabitacion/eliminar/{id}', 'destroy')->name('eliminarEstadoHabitacion');
});

// Route Controlador Empleado
Route::controller(CaracteristicaHabitacionController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('caracteristicasHabitacion', 'indexEmpleado')->name('caracteristicasHabitacion');
    Route::post('caracteristicaHabitacion/crear', 'create')->name('crearCaracteristicaHabitacion');
    Route::post('caracteristicaHabitacion/editar/{id}', 'update')->name('editarCaracteristicaHabitacion');
    Route::post('caracteristicaHabitacion/eliminar/{id}', 'destroy')->name('eliminarCaracteristicaHabitacion');
});

// Route Controlador Empleado
Route::controller(UsuarioController::class)->group(function () {
    // Route para mostrar todos los empleados
    Route::get('perfilEmpleado', 'indexEmpleado')->name('perfilEmpleado');
    Route::post('perfil/editar', 'update')->name('editarperfil');
    Route::get('perfilCliente', 'indexCliente')->name('perfilCliente');
});

// Route Controlador Empleado
Route::controller(AcompananteController::class)->group(function () {
    Route::post('acompanante/crear', 'create')->name('crearAcompanante');
    Route::post('acompanante/editar/{id}', 'update')->name('editarAcompanante');
});