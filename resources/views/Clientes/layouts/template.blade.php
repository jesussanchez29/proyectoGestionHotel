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
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tiny-date-picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media-query.css') }}" />
</head>

<body class="impx-body" id="top">
    @include('Clientes.layouts.header')
    <!-- SLIDESHOW -->
    @include('Clientes.layouts.slider')

    <!-- SERVICES LIST & BOOKING FORM -->
    <div class="impx-content impx-services style2 bg-color-aqua pattern-1">
        <div class="uk-container">
            <div class="uk-margin-medium-bottom impx-margin-bottom-small" data-uk-grid>
                @include('Clientes.layouts.servicios')
            </div>

            <!-- Booking Form -->
            @include('Clientes.layouts.reserva')
            <!-- Booking Form End -->

            <!-- Intro Text -->
            <div class="uk-flex uk-flex-center uk-position-relative uk-position-z-index" data-uk-grid>
                <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-1-1@m uk-width-1-1@s">
                    <div class="impx-intro uk-text-center uk-light uk-margin-remove-bottom">
                        <h2 class="uk-margin-remove-vertical uk-margin-remove-bottom">Elija las mejores habitaciones y haga la reserva
                        </h2>
                        <p class="impx-text-large uk-margin-remove-bottom uk-margin-small-top">No se arrepentira, a qué estas esperando para reservar con nosotros</p>
                    </div>
                </div>
            </div>
            <!-- Intro Text End -->
        </div>
    </div>
    <!-- SERVICES LIST & BOOKING FORM END -->

    <!-- ROOMS LIST -->
    {{-- @include('Clientes.layouts.habitaciones') --}}
    <!-- ROOMS LIST END -->

    <!-- WHY CHOOSE US? -->
    @include('Clientes.layouts.nosotros')
    <!-- WHY CHOOSE US? END -->

    <!-- PRICING PLANS -->
    @include('Clientes.layouts.ofertas')
    <!-- PRICING PLANS END -->

    <!-- TESTIMONIALS CAROUSEL -->
    @include('Clientes.layouts.opiniones')
    <!-- TESTIMONIALS CAROUSEL END -->

    @include('Clientes.layouts.contacto')

    @include('Clientes.layouts.footer')

    <!-- Javascript -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBGb3xrNtz335X4G2KfoOXb-XuIyHAzlVo"></script>
    <script src="{{ asset('js/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.parallax.min.js') }}"></script>
    <script src="{{ asset('js/tiny-date-picker.min.js') }}"></script>
    <script src="{{ asset('js/date-config.js') }}"></script>
    <script src="{{ asset('js/template-config.js') }}"></script>

</body>
</html>
