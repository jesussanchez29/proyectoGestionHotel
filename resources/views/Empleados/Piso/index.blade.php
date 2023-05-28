@extends('Empleados.layouts.template')
@section('title', 'Pisos')
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
                    data-target="#myModalCreate">Registrar Piso</button>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Listado de Pisos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Numero Piso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pisos) > 0)
                            @foreach ($pisos as $piso)
                                <tr>
                                    <td>{{ $piso->numero }}</td>
                                    <td>
                                        <input type='image' data-toggle="modal" src="{{ asset('images/editar.png') }}"
                                            data-target="#myModalEdit{{ $piso->id }}">
                                        <input type='image' data-toggle="modal" src="{{ asset('images/eliminar.png') }}"
                                            data-target="#myModalDelete{{ $piso->id }}">
                                    </td>
                                </tr>
                                <!-- Modal modificar empleado -->
                                @include('Empleados.Piso.modals.edit')
                                <!-- Modal borrar empleado -->
                                @include('Empleados.Piso.modals.delete')
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="vacio">No hay pisos registrados</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal crear cliente -->
    @include('Empleados.Piso.modals.create')
@endsection
