<?php

use App\Http\Controllers\AcompananteController;
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
use Illuminate\Support\Facades\Route;

// Route Controlador Cliente
Route::controller(ClienteController::class)->group(function () {
    // Route para mostrar la vista clientes
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
    // Route para mostrar la vista departamento
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
    // Route para ver lso empleados de un departamento
    Route::get('empleados/departamento/{id}', 'viewEmpleadoDepartamento')->name('verEmpleadoDepartamento');
});

// Route Controlador Hotel
Route::controller(HotelController::class)->group(function () {
    // Route para mostrar la vista index
    Route::get('/', 'indexCliente')->name('indexCliente');
    // Route para configurar mostrar la configuracion del hotel
    Route::get('configuracion', 'indexEmpleado')->name('configuracion');
    // Route para crear o actualizar la configuracion
    Route::post('configuracion/Createupdate/', 'updateOrCreate')->name('updateOrCreaterConfiguracion');
    // Route para mostrar la vista contacto
    Route::get('/contacto', 'contacto')->name('contacto');
    // Route para enviar un mensaje de cintacti
    Route::post('/enviarMensajeContacto', 'enviarMensajeContacto')->name('enviarMensajeContacto');
});

// Route Controlador Servicio
Route::controller(ServicioController::class)->group(function () {
    // Route para mostrar la vista servicios
    Route::get('servicios', 'indexEmpleado')->name('servicios');
    // Route para mostarr la vista servicios a los clientes
    Route::get('serviciosCliente', 'indexCliente')->name('serviciosCliente');
    // Route para crear un servicio
    Route::post('servicio/crear', 'create')->name('crearServicio');
    // Route para editar un servicio
    Route::post('servicio/editar/{id}', 'update')->name('editarServicio');
    // Route para eliminar un servicio
    Route::post('servicio/eliminar/{id}', 'destroy')->name('eliminarServicio');
    // Route para obtener horas disponibles de un servicio
    Route::get('servicio/obtenerHorasDisponibles', 'obtenerHorasDisponibles')->name('obtenerHorasDisponibles');
    // Route para registrar la reserva de un servicio
    Route::post('servicio/registrarReservaServicio', 'registrarReservaServicio')->name('registrarReservaServicio');
});

// Route Controlador Tipo habitacion
Route::controller(TipoHabitacionController::class)->group(function () {
    // Route para mostrar la vista tipo de habitaciones
    Route::get('tipoHabitaciones', 'indexEmpleado')->name('tipoHabitaciones');
    // Route para mostrar la vista tipo de habitaciones a los clientes
    Route::get('tipoHabitacionesCliente', 'indexCliente')->name('tipoHabitacionesClientes');
    // Route para crear un tipo de habitacion
    Route::post('tipoHabitacion/crear', 'create')->name('crearTipoHabitacion');
    // Route para editar un tipo de habitacion
    Route::post('tipoHabitacion/editar/{id}', 'update')->name('editarTipoHabitacion');
    // Route para eliminar un tipo de habitacion
    Route::post('tipoHabitacion/eliminar/{id}', 'destroy')->name('eliminarTipoHabitacion');
    // Route para ver un tipo de habitacion
    Route::get('tipoHabitacion/ver/{id}', 'view')->name('verTipoHabitacion');
    // Route para obtener los pisos disponibles de un tipo de habitacion
    Route::get('/get-pisos-disponibles', 'getPisosDisponibles')->name('getPisosDisponibles');
});

// Route Controlador Reserva
Route::controller(ReservaController::class)->group(function () {
    // Route para mostrar la vista reservas
    Route::get('reservas', 'indexEmpleado')->name('reservas');
    // Route para crear una reserva
    Route::post('reserva/crear', 'createCliente')->name('crearReservaCliente');
    // Route para crear una reserva el empleado
    Route::post('reserva/crearEmpleado', 'createEmpleado')->name('crearReservaEmpleado');
    // Route para ver una reserva
    Route::get('reserva/ver/{id}', 'viewReserva')->name('verReserva');
    // Route para obtner factura de la reserva
    Route::post('obtenerFactura/{id}', 'obtenerFactura')->name('obtenerFactura');
    // Route para crear vista reportes
    Route::get('reportes', 'reportes')->name('reportesReserva');
    // Route para obtener los reportes de reserva
    Route::post('reportes/obtener', 'obtenerReporte')->name('obtenerReporte');
    // Route para mostrar el calendario de reservas
    Route::get('reserva/calendario', 'calendarioReservas')->name('calendarioReservas');
    // Route para actualziar la fecha de salida
    Route::get('reserva/actualizarFechaSalida/{id}', 'actualizarFechaSalida')->name('ReservactualizarFechaSalida');
    // Route para actualziar el pago del cliente
    Route::post('reserva/actualizarPago/{id}', 'actualizarPagoReserva')->name('ReservaActualizarPagoReserva');
    // Route para mostar la reservas a los clientes
    Route::get('reserva/reservaCliente', 'reservaCliente')->name('reservasCliente');
});

// Route Controlador Registro
Route::controller(RegistroController::class)->group(function () {
    // Route para mostrar la vista registro
    Route::get('registro', 'index')->name('registro');
    // Route para registar un usuario
    Route::post('registro', 'createCliente');
});

// Route Controlador Login
Route::controller(LoginController::class)->group(function () {
    // Route para mostrar la vista login
    Route::get('login', 'index')->name('login');
    // Route para validar las credenciales
    Route::post('login', 'login');
});

// Route Controlador Rsena
Route::controller(ResenaController::class)->group(function () {
    // Route para mostrar la vista reseñas
    Route::get('resenas', 'indexEmpleado')->name('resenas');
    // Route para crear una reseña
    Route::post('resena/crear/{tipoHabitacion}', 'create')->name('crearResena');
    // Route para cambiar el estado de una reseña
    Route::post('resena/cambiarEstado/{id}', 'cambiarEstado')->name('cambiarEstadoResena');
    // Route para eliminar una reseña
    Route::post('resena/eliminar/{id}', 'destroy')->name('eliminarResena');
});

// Route Controlador Piso
Route::controller(PisoController::class)->group(function () {
    // Route para mostrar la vista de pisos
    Route::get('pisos', 'indexEmpleado')->name('pisos');
    // Route para crear un piso
    Route::post('piso/crear', 'create')->name('crearPiso');
    // Route para editar un piso
    Route::post('piso/editar/{id}', 'update')->name('editarPiso');
    // Route para eliminar un piso
    Route::post('piso/eliminar/{id}', 'destroy')->name('eliminarPiso');
});

// Route Controlador Habitacion
Route::controller(HabitacionController::class)->group(function () {
    // Route para mostrar la vista de habitaciones
    Route::get('habitaciones', 'indexEmpleado')->name('habitaciones');
    // Route para crear un habitacion
    Route::post('habitacion/crear', 'create')->name('crearHabitacion');
    // Route para editar un habitacion
    Route::post('habitacion/editar/{id}', 'update')->name('editarHabitacion');
    // Route para eliminar un habitacion
    Route::post('habitacion/eliminar/{id}', 'destroy')->name('eliminarHabitacion');
    // Route para obtener las habitaciones disponibles
    Route::get('habitacion/obtenerDisponibles', 'obtenerHabitacionesDisponibles')->name('obtenerHabitacionesDisponibles');
});

// Route Controlador Estado Habitacion
Route::controller(EstadoHabitacionController::class)->group(function () {
    // Route para mostrar la vista de estado
    Route::get('estadoHabitaciones', 'indexEmpleado')->name('estadoHabitaciones');
    // Route para crear un estado
    Route::post('estadoHabitacion/crear', 'create')->name('crearEstadoHabitacion');
    // Route para modficar un estado
    Route::post('estadoHabitacion/editar/{id}', 'update')->name('editarEstadoHabitacion');
    // Route para eliminar un estado
    Route::post('estadoHabitacion/eliminar/{id}', 'destroy')->name('eliminarEstadoHabitacion');
});

// Route Controlador Caracteristica Habitacion
Route::controller(CaracteristicaHabitacionController::class)->group(function () {
    // Route para mostrar la vista de caracteristicas
    Route::get('caracteristicasHabitacion', 'indexEmpleado')->name('caracteristicasHabitacion');
    // Route para crear una caracteristica
    Route::post('caracteristicaHabitacion/crear', 'create')->name('crearCaracteristicaHabitacion');
    // Route para modficar una caracteristica
    Route::post('caracteristicaHabitacion/editar/{id}', 'update')->name('editarCaracteristicaHabitacion');
    // Route para eliminar una caracteristica
    Route::post('caracteristicaHabitacion/eliminar/{id}', 'destroy')->name('eliminarCaracteristicaHabitacion');
});

// Route Controlador Usuario
Route::controller(UsuarioController::class)->group(function () {
    // Route para mostrar la vista de perfil Empleado
    Route::get('perfilEmpleado', 'indexEmpleado')->name('perfilEmpleado');
    // Route para mostrar la vista de perfil Cliente
    Route::get('perfilCliente', 'indexCliente')->name('perfilCliente');
    // Route para actualizar un usuario
    Route::post('perfil/editar', 'update')->name('editarperfil');
    // Route para cambiar el estado un usuario
    Route::post('cambiarEstado/{id}', 'cambiarEstado')->name('cambiarEstadoUsuario');
    // Route para cerrar la seion
    Route::get('logout', 'logout')->name('logout');
    // Route para mostrar la vista de olvidar contraseña
    Route::get('olvidarContrasena', 'olvidarContrasena')->name('olvidarContrasena');
    // Route para mostrar la vista de olvidar contraseña
    Route::post('correoOlvidarContrasena', 'correoOlvidarContrasena')->name('correoOlvidarContrasena');
    // Route para mostrar la vista de cambio contraseña
    Route::get('cambioContrasena/{id}', 'cambioContrasena')->name('cambioContrasena');
    // Route para cambiar la contraseña de un usuario
    Route::post('cambiarContrasena', 'cambiarContrasena')->name('cambiarContrasena');
});

// Route Controlador Acompanante
Route::controller(AcompananteController::class)->group(function () {
    // Route para crear un acompañante
    Route::post('acompanante/crear', 'create')->name('crearAcompanante');
    // Route para editar un acompañante
    Route::post('acompanante/editar/{id}', 'update')->name('editarAcompanante');
    // Route para eliminar un acompañante
    Route::post('acompanante/eliminar/{id}', 'destroy')->name('eliminarAcompanante');
});