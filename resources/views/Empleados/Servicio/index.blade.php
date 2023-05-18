@extends('Empleados.layouts.template')
@section('title', 'Departamentos')
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
                    data-target="#myModalCreate">Registrar Servicio</button>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">Listado de Servicios</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @if (count($servicios) > 0)
                    @foreach ($servicios as $servicio)
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $departamento->icono }}" alt="Imagen Departamento">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">{{ $departamento->nombre }}</h4>
                                    <p class="card-text">{{ $departamento->descripcion }}</p>
                                    <div style="text-align: center">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="">Ver Empleados</button>
                                        <br>
                                        <br>
                                        <button class="btn btn-warning" style="margin-right:20px" data-toggle="modal" data-target="#myModalEdit{{ $departamento->id }}">Editar</button>
                                        <button  class="btn btn-danger" data-toggle="modal"
                                            data-target="#myModalDelete{{ $departamento->id }}">Borrar</button>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <!-- Modal modificar departamento -->
                        @include('Empleados.Departamento.modals.edit')
                        <!-- Modal borrar departamento -->
                        @include('Empleados.Departamento.modals.delete')
                    @endforeach
                @else
                    <div class="col-md-12">
                        <div colspan="7" style="color: red"">No hay departamentos registrados</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('Empleados.Departamento.modals.create')
@endsection
