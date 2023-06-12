@extends('Clientes.layouts.loginRegistro')
@section('title', 'Restablecer contraseña')

@section('content')
    <div class="my-5 text-center">
        <h3 class="font-weight-bold">Restablecer contraseña</h3>
        <p class="text-muted">Escriba y envíe la dirección de correo electrónico para restablecer su contraseña</p>
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
    <form method="POST" action="{{ route('correoOlvidarContrasena') }}">
        @csrf
        <div class="form-group">
            <div class="form-icon-wrapper">
                <input type="email" class="form-control" placeholder="Email" autofocus required name="email">
                <i class="form-icon-left mdi mdi-email"></i>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Enviar</button>
        </div>
        <p class="text-center">
            Puedes <a href="{{ route('login') }}">iniciar sesión</a> o <a href="{{ route('registro') }}">crear una
                cuenta</a>
        </p>
    </form>
@endsection
