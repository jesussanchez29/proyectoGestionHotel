@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 style="text-align: center">Reportes Habitaciones</h1>
            <form action="{{ route('obtenerReporte') }}" method="POST">
                <div class="form-group row">
                    <div class="col-md-3">
                        @csrf
                        <label for="imagen" class="col-form-label">Selecionar Habitacion:</label>
                        @if (count($habitaciones) > 0)
                            <select class="form-control" id="cbopiso" name="habitacion">
                                <option value="Todos" selected>Todas</option>
                                @foreach ($habitaciones as $habitacion)
                                    <option value="{{ $habitacion->id }}">Habitacion {{ $habitacion->numero }}</option>
                                @endforeach
                            </select>
                        @else
                            <p>No hay Habitaciones Disponibles</p>
                        @endif
                    </div>
                    <div class="col-md-2 ml">
                        <label for="fechaLlegada" class="col-form-label">Fecha Llegada:</label>
                        <input type="date" class="form-control datepicker" id="fechaLlegada" required name="fechaLlegada">
                    </div>
                    <div class="col-md-2">
                        <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                        <input type="date" class="form-control datepicker" id="fechaSalida" required name="fechaSalida">
                    </div>
                    <div class="col-md-5 align-self-end">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">
                                <i class='fas fa-download'></i>
                                Descargar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
