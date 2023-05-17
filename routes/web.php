<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
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