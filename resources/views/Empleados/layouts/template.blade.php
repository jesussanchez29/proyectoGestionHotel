<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Fuentes -->
    <link href="{{ asset('Empleados/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('Empleados/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Tablas de datos CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Empleados/vendor/datatables/datatables.min.css') }}" />
    <!-- Tablas estilo bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Empleados/vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href={{ asset('Empleados/css/cards.css') }}>
    <title>@yield('title')</title>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('Empleados.layouts.header')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('Empleados.partials.navegation')
                <!--INICIO del cont principal-->
                <div class="container-fluid">
                    @yield('content')                    
                </div>
            </div>
            @include('Empleados.layouts.footer')
        </div>
    </div>

    <!-- JavaScript básico Bootstrap-->
    <script src="{{ asset('Empleados/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('Empleados/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Complemento JavaScript-->
    <script src="{{ asset('Empleados/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Script para la paginas -->
    <script src="{{ asset('Empleados/js/sb-admin-2.min.js') }}"></script>
    <!-- Tablas JS -->
    <script type="text/javascript" src="{{ asset('Empleados/endor/datatables/datatables.min.js') }}"></script>
    <!-- código propio JS -->
    <script type="text/javascript" src="{{ asset('Empleados/main.js') }}"></script>
    
</body>
</html>