@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 style="text-align: center">Vista Recepcion</h1>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="imagen" class="col-form-label">Selecionar Piso:</label>
                    <select class="form-control" id="cbopiso"></select>
                </div>
                <div class="col-md-2 ml">
                    <label for="fechaLlegada" class="col-form-label">Fecha Llegada:</label>
                    <input type="date" class="form-control" name="fechaLlegada">
                </div>
                <div class="col-md-2">
                    <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                    <input type="date" class="form-control" name="fechaSalida">
                </div>
            </div>

            <hr />

            @if (count($habitaciones) > 0)
                <div class="row">
                    @foreach ($habitaciones as $habitacion)
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-{{ $habitacion->estado->clase }} rounded-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Numero {{ $habitacion->numero }}
                                            </div>
                                            <div
                                                class="text-xs font-weight-bold text-{{ $habitacion->estado->clase }} text-uppercase mb-1 mt-1">
                                                Tipo: {{ $habitacion->tipoHabitacion->nombre }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-bed fa-2x text-{{ $habitacion->estado->clase }}"></i>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex bg-{{ $habitacion->estado->clase }} align-items-center justify-content-between rounded-0">
                                    <a class="small text-white stretched-link text-uppercase font-weight-bold select-habitacion"
                                        href="">
                                        {{ $habitacion->estado->nombre }}
                                    </a>
                                    <div class="small text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No hay habitaciones registradas</p>
            @endif
        </div>
    </div>
@endsection
