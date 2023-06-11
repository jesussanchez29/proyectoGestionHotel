@extends('Empleados.layouts.template')
@section('title', 'Clientes')
@section('content')
    <div class="container">
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

        <form id="miFormulario" method="POST" action="{{ route('updateOrCreaterConfiguracion') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="container-fluid">
                    <h1 style="text-align: center">Configuración Hotel</h1>
                    <div class="row">
                        <div class="col-md-6 ml-auto">
                            <label for="imagen" class="col-form-label">Imagen Portada:</label>
                            <input type="file" class="form-control-file" name="imagen" accept="image/*">
                        </div>
                        <div class="col-md-6 ml-auto">
                            <label for="logo" class="col-form-label">Logo:</label>
                            <input type="file" class="form-control-file" name="logo" accept="image/*">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre"
                                value="{{ $hotel ? $hotel->nombre : '' }}">
                        </div>
                        <div class="col-md-4">
                            <label for="ciudad" class="col-form-label">Cadena:</label>
                            <input type="text" class="form-control" name="cadena"
                                value="{{ $hotel ? $hotel->cadena : '' }}">
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" name="email"
                                value="{{ $hotel ? $hotel->email : '' }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccion"
                                value="{{ $hotel ? $hotel->direccion : '' }}">
                        </div>
                        <div class="col-md-3">
                            <label for="ciudad" class="col-form-label">Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad"
                                value="{{ $hotel ? $hotel->ciudad : '' }}">
                        </div>
                        <div class="col-md-3 ml-auto">
                            <label for="telefono" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" name="telefono"
                                value="{{ $hotel ? $hotel->telefono : '' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
