@extends('Clientes.layouts.template')
@section('title', 'Tipo de Habitaciones')

@section('header')
    @include('Clientes.layouts.headerIndex')
@endsection

@section('slider')
    <div class="uk-container-expand">
        <div class="impx-slide-container style1">
            <div class="impx-slideshow-fw">

                <div
                    data-uk-slideshow="autoplay: true; autoplay-interval: 6000; animation: fade; finite: false; min-height: 319; max-height: 980;">
                    <div class="uk-position-relative uk-visible-toggle uk-light">

                        <ul class="uk-slideshow-items">
                            <li>
                                <div
                                    class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-bottom-center">
                                    @if (!empty($hotel->imagen))
                                        <img src="{{ $hotel->imagen }}" alt="" data-uk-cover="height:319px">
                                    @endif
                                    <div class="uk-overlay-primary uk-position-cover impx-overlay dark"></div>
                                </div>
                                <div class="uk-container uk-position-relative uk-height-1-1">
                                    <div class="uk-position-left uk-flex uk-flex-middle">
                                        <div class="impx-slide-fw-caption">
                                            <div class="impx-slide-fw-caption-outline uk-transition-slide-left"></div>
                                            @if (!empty($hotel->nombre))
                                                <h1
                                                    class="uk-margin-remove impx-text-shadow uk-transition-slide-top uk-text-left">
                                                    {{ $hotel->nombre }}</h1>
                                            @endif
                                            @if (!empty($hotel->cadena))
                                                <p
                                                    class="impx-text-large impx-text-aqua uk-margin-remove impx-text-shadow uk-transition-slide-bottom uk-text-right uk-text-uppercase">
                                                    {{ $hotel->cadena }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('content')
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
                        <h2 class="uk-margin-remove-vertical uk-margin-remove-bottom">Elija las mejores habitaciones y
                            haga la reserva
                        </h2>
                        <p class="impx-text-large uk-margin-remove-bottom uk-margin-small-top">No se arrepentira, a qué
                            estas esperando para reservar con nosotros</p>
                    </div>
                </div>
            </div>
            <!-- Intro Text End -->
        </div>
    </div>
    <!-- SERVICES LIST & BOOKING FORM END -->

    <!-- ROOMS LIST -->
    @include('Clientes.layouts.habitaciones')
    <!-- ROOMS LIST END -->

    <!-- WHY CHOOSE US? -->
    @include('Clientes.layouts.nosotros')
    <!-- WHY CHOOSE US? END -->

    <!-- TESTIMONIALS CAROUSEL -->
    @include('Clientes.layouts.opiniones')
    <!-- TESTIMONIALS CAROUSEL END -->
@endsection

@section('contacto')
    <!-- CONTACT SECTION -->
    <div class="impx-contact">

        <div class="impx-overlay aqua-darkest  uk-padding uk-padding-remove-bottom uk-padding-remove-horizontal">
            <div class="uk-container">
                <div class="uk-grid" data-uk-grid-margin>

                    <div class="uk-light uk-width-2-3@xl uk-width-2-3@l uk-width-1-1@s">
                        <!-- Location -->
                        <h4 class="impx-text-white">Nuestra Ubicación</h4>
                        <p class="impx-text-large impx-text-light">Oculorum, inquit Plato, est in nobis sensus acerrimus,
                            quibus sapientiam non cernimus non semper inquam At enim sequor utilitatem praetermissum in
                            Stoicis?</p>
                        <!-- Location End -->
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d399.7792464173302!2d-4.422896068858674!3d36.71694167227089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f79410366a37%3A0x3393c175dd9ad8e5!2sC%2F%20Trinidad%20Grund%2C%2017%2C%2029001%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1685183523114!5m2!1ses!2ses"
                                width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="uk-light uk-width-1-3@xl uk-width-1-3@l uk-width-1-1@m uk-width-1-1@s">
                        <!-- Location -->
                        <h4 class="impx-text-white">Contacta con nosotros</h4>
                        <p class="impx-text-large impx-text-light">Telefono: {{ $hotel->telefono }}</p>
                        <p class="impx-text-large impx-text-light">Email: {{ $hotel->email }}</p>
                        <p class="impx-text-large impx-text-light">Direccion: {{ $hotel->direccion }}, {{ $hotel->ciudad }}
                        </p>
                        <!-- Location End -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT SECTION END -->
    <style>
       .map-responsive {
    position: relative;
    overflow: hidden;
    padding-bottom: 30%;
    /* Proporción de aspecto 16:9 (dividir altura entre ancho y multiplicar por 100) */
    height: 0;
}

.map-responsive iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.impx-contact {
    height: 450px;
    position: relative;
}
    </style>
@endsection
