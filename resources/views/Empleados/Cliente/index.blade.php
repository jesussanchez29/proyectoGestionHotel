@extends('Empleados.layouts.template')
@section('title', 'Clientes')
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
                    data-target="#myModalCreate">Registrar Cliente</button>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Listado de Clientes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Identificacion</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($clientes) > 0)
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nombre . ' ' . $cliente->apellidos }}</td>
                                    <td>{{ $cliente->tipoIdentificacion }} - {{ $cliente->identificacion }}</td>
                                    <td>{{ $cliente->usuario->email }}</td>
                                    <td>{{ $cliente->telefono }}</td>
                                    <td>{{ $cliente->direccion }}</td>
                                    @if ($cliente->usuario->estado == 0)
                                        <td style="color: red">Inactivo</td>
                                    @else
                                        <td style="color: #00FF00">Activo</td>
                                    @endif
                                    <td>
                                        <div style="display: flex; align-items: center; justify-content: center;">

                                            @if ($cliente->usuario->estado == 0)
                                                <form action="{{ route('cambiarEstadoUsuario', $cliente->usuario->id) }}" method="POST"
                                                    style="margin-top:5px; margin-right: 2px;">
                                                    @csrf
                                                    <input type="image" src="{{ asset('images/desbloquear.png') }}"
                                                        alt="Desbloquear">
                                                </form>
                                            @else
                                            <form action="{{ route('cambiarEstadoUsuario', $cliente->usuario->id) }}" method="POST"
                                                style="margin-top:5px; margin-right: 2px;">
                                                    @csrf
                                                    <input type="image" src="{{ asset('images/bloquear.png') }}"
                                                        alt="Bloquear">
                                                </form>
                                            @endif
                                            <input type='image' data-toggle="modal"
                                                src="{{ asset('images/editar.png') }}"
                                                data-target="#myModalEdit{{ $cliente->id }}">
                                            <input type='image' data-toggle="modal"
                                                src="{{ asset('images/eliminar.png') }}"
                                                data-target="#myModalDelete{{ $cliente->usuario->id }}">
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal modificar cliente -->
                                @include('Empleados.Cliente.modals.edit')
                                <!-- Modal borrar cliente -->
                                @include('Empleados.Cliente.modals.delete')
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="vacio">No hay clientes registrados</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal crear cliente -->
    @include('Empleados.Cliente.modals.create')
@endsection
