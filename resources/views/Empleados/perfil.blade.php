@extends('Empleados.layouts.template')
@section('title', 'Perfil')
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

        <form id="miFormulario" method="POST" action="{{ route('editarperfil') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="container-fluid">
                    <h1 style="text-align: center">Editar Perfil</h1>
                    <div class="row">
                        <div class="col-md-6 ml-auto">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ Auth::user()->empleado->nombre }}">
                        </div>
                        <div class="col-md-6 ml-auto">
                            <label for="apellidos" class="col-form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" value="{{ Auth::user()->empleado->apellidos }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="imagenPerfil" class="col-form-label">Imagen Perfil:</label>
                            <input type="file" class="form-control-file" name="imagenPerfil" accept="image/*">
                        </div>
                        <div class="col-md-4">
                            <label for="fechaNacimiento" class="col-form-label">Fecha Nacimiento:</label>
                            <input type="date" class="form-control" name="fechaNacimiento" value="{{ Auth::user()->empleado->fechaNacimiento }}">
                        </div>
                        <div class="col-md-4">
                            <label for="dni" class="col-form-label">DNI:</label>
                            <input type="text" class="form-control" name="dni" value="{{ Auth::user()->empleado->dni }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="direccion" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" name="direccion" value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="ciudad" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="col-md-4 ml-auto">
                            <label for="telefono" class="col-form-label">Repetir Contraseña:</label>
                            <input type="password" class="form-control" name="repassword" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccion" value="{{ Auth::user()->empleado->direccion }}">
                        </div>
                        <div class="col-md-3">
                            <label for="telefono" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" name="telefono" value="{{ Auth::user()->empleado->telefono }}">
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
