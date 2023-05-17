@extends('Empleados.layouts.template')
@section('title', 'Empleados')
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
                    data-target="#myModalCreate">Registrar Empleado</button>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Listado de Empleados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Departamento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($empleados) > 0)
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->nombre . ' ' . $empleado->apellidos }}</td>
                                    <td>{{ $empleado->dni }}</td>
                                    <td>{{ $empleado->email }}</td>
                                    <td>{{ $empleado->telefono }}</td>
                                    <td>{{ $empleado->direccion }}</td>
                                    @if ($empleado->estado == 0)
                                        <td style="color: red">Inactivo</td>
                                    @else
                                        <td style="color: #00FF00">Activo</td>
                                    @endif
                                    @if (isset($empleado->nombreDepartamento))
                                        <td>{{ $empleado->nombreDepartamento }}</td>
                                    @else
                                        <td style="color: red">Sin asignar</td>
                                    @endif
                                    <td>
                                        <input type='image' data-toggle="modal" src="{{ asset('images/editar.png') }}"
                                            data-target="#myModalEdit{{ $empleado->id }}">
                                        <input type='image' data-toggle="modal" src="{{ asset('images/eliminar.png') }}"
                                            data-target="#myModalDelete{{ $empleado->id }}">
                                    </td>
                                </tr>
                                <!-- Modal modificar empleado -->
                                @include('Empleados.Empleado.modals.edit')
                                <!-- Modal borrar empleado -->
                                @include('Empleados.Empleado.modals.delete')
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="vacio">No hay empleados registrados</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal crear cliente -->
    @include('Empleados.Empleado.modals.create')
@endsection
