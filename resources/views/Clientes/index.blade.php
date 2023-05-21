@extends('Clientes.layouts.template')
@section('title', 'Tipo de Habitaciones')

@section('header')
    <div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">
@endsection

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

    @section('contacto')
        <!-- CONTACT SECTION -->
        <div class="impx-contact">

            <div class="impx-overlay aqua-darkest  uk-padding uk-padding-remove-bottom uk-padding-remove-horizontal">
                <div class="uk-container">


                    <div data-uk-grid class="uk-padding-remove-bottom">
                        <!-- Address -->
                        <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                            <h5 class="uk-heading-line uk-margin-remove-bottom impx-text-white"><span>Dirección</span></h5>
                            <p class="impx-text-large uk-margin-top impx-text-light">{{ $hotel->direccion }},
                                {{ $hotel->ciudad }}
                            </p>
                        </div><!-- Address End-->
                        <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s">
                            <!-- Phone -->
                            <h5 class="uk-heading-line uk-margin-bottom impx-text-white"><span>Telefono</span></h5>
                            <p class="impx-text-large uk-margin-remove impx-text-light">+34 {{ $hotel->telefono }}
                            </p>
                        </div><!-- Phone End -->
                        <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s">
                            <!-- Email -->
                            <h5 class="uk-heading-line uk-margin-bottom  impx-text-white"><span>Email</span></h5>
                            <a href="mailt:#" class="impx-text-large impx-text-light">{{ $hotel->email }}</a><br />
                        </div><!-- Email End -->
                    </div>
                    <br>
                    <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s
uk-margin-medium-bottom">
                        <!-- Location -->
                        <h4 class="impx-text-white">Our Location</h4>
                        <div class="map-responsive">
                            <p class="impx-text-large impx-text-light">Oculorum, inquit Plato, est in nobis sensus
                                acerrimus,
                                quibus sapientiam non cernimus non semper inquam At enim sequor utilitatem praetermissum in
                                Stoicis?</p>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1599.1169852364083!2d-4.4238616613130715!3d36.716941693067795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f79410366a37%3A0x3393c175dd9ad8e5!2sC%2F%20Trinidad%20Grund%2C%2017%2C%2029001%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1684577711326!5m2!1ses!2ses"
                                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <!-- Location End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT SECTION END -->
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

        <!-- PRICING PLANS -->
        <!-- PRICING PLANS END -->

        <!-- TESTIMONIALS CAROUSEL -->
        @include('Clientes.layouts.opiniones')
        <!-- TESTIMONIALS CAROUSEL END -->
    @endsection
