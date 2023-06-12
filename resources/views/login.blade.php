@extends('Clientes.layouts.loginRegistro')
@section('title', 'Inicar Sesion')

@section('content')
    <div class="my-5 text-center">
        <h3 class="font-weight-bold mb-3">Inicio de sesión</h3>
        <p class="text-muted">Inicia sesón para continuar</p>
    </div>
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
    <form method="POST">
        @csrf

        <div class="form-group">
            <div class="form-icon-wrapper">
                <input type="email" class="form-control" placeholder="Email" name="email" autofocus>
                <i class="form-icon-left mdi mdi-email"></i>
            </div>
           
        </div>
        <div class="form-group">
            <div class="form-icon-wrapper">
                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                <i class="form-icon-left mdi mdi-lock"></i>
                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                    <i class="mdi mdi-eye"></i>
                </a>
            </div>
        </div>
        <div class="form-group">
            <div class="d-lg-flex d-md-block justify-content-between">
                <div class="custom-control custom-checkbox mb-3 mb-lg-0">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                    <label class="custom-control-label" for="customCheck1">Recuérdame</label>
                </div>
                <a href="{{ route('olvidarContrasena') }}">¡He olvidado mi contraseña!</a>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" value="Iniciar sesión">
        <p class="text-center">
            <br>
            ¿No tienes cuenta?
            <a href="{{ route('registro') }}">Crea una cuenta gratis</a>
        </p>
        <p class="text-center">
            ¿Deseas Volver?
            <a href="{{ route('indexCliente') }}">Volver a la pagina principal</a>
        </p>    
    </form>
@endsection