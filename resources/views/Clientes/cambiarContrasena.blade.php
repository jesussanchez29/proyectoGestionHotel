@extends('Clientes.layouts.loginRegistro')
@section('title', 'Cambiar Contraseña')

@section('content')
    <div class="my-5 text-center">
        <h3 class="font-weight-bold">Cambiar contraseña</h3>
        <p class="text-muted">Cambia tu contraseña para iniciar sesión</p>
    </div>
    <form method="POST" action="">
        @csrf
        <div class="form-group">
            <div class="form-icon-wrapper">
                <input type="password" class="form-control" placeholder="Nueva contraseña" autofocus required>
                <i class="form-icon-left mdi mdi-lock"></i>
                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                    <i class="mdi mdi-eye"></i>
                </a>
            </div>
        </div>
        <div class="form-group">
            <div class="form-icon-wrapper">
                <input type="repassword" class="form-control" placeholder="Repita contraseña" required>
                <i class="form-icon-left mdi mdi-lock"></i>
                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                    <i class="mdi mdi-eye"></i>
                </a>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block">Cambiar contraseña</button>
        </div>
        <p class="text-center">
            Puedes <a href="{{ route('login') }}">iniciar sesión</a> o <a href="{{ route('registro') }}">crear una cuenta</a>
        </p>
    </form>
@endsection
