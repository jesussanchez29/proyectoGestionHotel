@extends('Empleados.layouts.template')
@section('title', 'Estado habitaciones')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="float: right">
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#myModalCreate">Registrar Estado habitacion</button>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Listado de Estados de Habitaciones</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($estados) > 0)
                            @foreach ($estados as $estado)
                                <tr>
                                    <td>{{ $estado->nombre }}</td>
                                    <td>
                                        <input type='image' data-toggle="modal" src="{{ asset('images/editar.png') }}"
                                            data-target="#myModalEdit{{ $estado->id }}">
                                        <input type='image' data-toggle="modal" src="{{ asset('images/eliminar.png') }}"
                                            data-target="#myModalDelete{{ $estado->id }}">
                                    </td>
                                </tr>
                                <!-- Modal modificar empleado -->
                                @include('Empleados.EstadoHabitacion.modals.edit')
                                <!-- Modal borrar empleado -->
                                @include('Empleados.EstadoHabitacion.modals.delete')
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="vacio">No hay estados de habitaciones registrados</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal crear cliente -->
    @include('Empleados.EstadoHabitacion.modals.create')
@endsection
