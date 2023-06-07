@extends('Clientes.layouts.template')

@section('header')
    @include('Clientes.layouts.header')
@endsection
@section('slider')
    <div class="impx-page-heading uk-position-relative about">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Perfil</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Modifica tu perfil</p><!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form id="miFormulario" method="POST" action="{{ route('editarperfil') }}" enctype="multipart/form-data">
        <div class="container">
            <br>
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
            @csrf
            <div class="modal-body">
                <div class="container-fluid">
                    <h1 style="text-align: center">Editar Perfil</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre"
                                value="{{ Auth::user()->cliente->nombre }}">
                        </div>
                        <div class="col-md-4 ">
                            <label for="apellidos" class="col-form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos"
                                value="{{ Auth::user()->cliente->apellidos }}">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="imagenPerfil" class="col-form-label">Imagen Perfil:</label>
                            <input type="file" class="form-control-file" name="imagenPerfil" accept="image/*">
                        </div>
                        <div class="col-md-4">
                            <label for="fechaNacimiento" class="col-form-label">Fecha Nacimiento:</label>
                            <input type="date" class="form-control" name="fechaNacimiento"
                                value="{{ Auth::user()->cliente->fechaNacimiento }}">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="identificacion" class="col-form-label">Identificación:</label>
                            <input type="text" class="form-control" name="identificacion"
                                value="{{ Auth::user()->cliente->identificacion }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="direccion" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" name="direccion" value="{{ Auth::user()->email }}"
                                readonly>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="password" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="col-md-4">
                            <label for="repassword" class="col-form-label">Repetir Contraseña:</label>
                            <input type="password" class="form-control" name="repassword" value="">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccion"
                                value="{{ Auth::user()->cliente->direccion }}">
                        </div>
                        <div class="col-md-2">
                            <label for="telefono" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" name="telefono"
                                value="{{ Auth::user()->cliente->telefono }}">
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
