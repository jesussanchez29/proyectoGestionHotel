@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
<div class="card shadow-sm">
    <div class="card-body p-3">
        <h6 class="card-title font-weight-bold text-primary">Resumen de la Habitación</h6>
        <hr class="mt-1 mb-1" />
        <div class="form-row">
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Número:</label>
                <label class="form-text">{{ $reservaHabitacion->numero }}</label>
            </div>
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Detalles:</label>
                <label class="form-text"></label>
            </div>
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Tipo:</label>
                <label class="form-text">{{ $reservaHabitacion->tipoHabitacion->nombre }}</label>
            </div>
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Piso:</label>
                <label class="form-text">{{ $reservaHabitacion->piso->numero }}</label>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Cliente:</label>
                <label class="form-text mb-0">{{ $reservaHabitacion->piso->numero }}</label>
            </div>
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Nro. Documento:</label>
                <label class="form-text mb-0"></label>
            </div>
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Correo:</label>
                <label class="form-text mb-0"></label>
            </div>
            <div class="col-md-3">
                <label class="form-text font-weight-bold mb-0">Fecha Entrada:</label>
                <label class="form-text mb-0"></label>
            </div>
        </div>
    </div>
</div>
@endsection