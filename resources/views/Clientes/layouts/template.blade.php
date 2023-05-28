<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Properties -->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon.png') }}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href={{ asset('css/personalizado.css') }}>
    <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tiny-date-picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media-query.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/icons/material-design-icons/mdi.min.css') }}" />

</head>

<body class="impx-body" id="top">
    <!-- HEADER -->
    <header id="impx-header">
        <div>
            @yield('header')
        </div>
    </header>
    <!-- HEADER END -->

    @yield('slider')

    @yield('content')

    @yield('contacto')

    @include('Clientes.layouts.footer')

    <!-- Javascript -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBGb3xrNtz335X4G2KfoOXb-XuIyHAzlVo">
    </script>
    <script src="{{ asset('js/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.parallax.min.js') }}"></script>
    <script src="{{ asset('js/tiny-date-picker.min.js') }}"></script>
    <script src="{{ asset('js/date-config.js') }}"></script>
    <script src="{{ asset('js/rating-config.js') }}"></script>
    <script src="{{ asset('js/template-config.js') }}"></script>
    <script src="{{ asset('js/jquery.barrating.js') }}"></script>

</body>
</html>