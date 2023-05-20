@extends('Clientes.layouts.template')
@section('title', 'Tipo de Habitaciones')
@if (!empty($hotel->direccion))
    @section('direccion', $hotel->direccion)
@endif

@if (!empty($hotel->ciudad))
    @section('ciudad', $hotel->ciudad)
@endif

@if (!empty($hotel->telefono))
    @section('telefono', $hotel->telefono)
@endif

@if (!empty($hotel->email))
    @section('email', $hotel->email)
@endif

@section('logo')
    @if (!empty($hotel->logo))
        <img src="{{ $hotel->logo }}" alt="Logo">
    @endif
@endsection

@section('contacto')
    <!-- CONTACT SECTION -->
<div class="impx-contact">

    <div class="impx-overlay aqua-darkest  uk-padding uk-padding-remove-bottom uk-padding-remove-horizontal">
        <div class="uk-container">


            <div data-uk-grid class="uk-padding-remove-bottom">
                <!-- Address -->
                <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                    <h5 class="uk-heading-line uk-margin-remove-bottom impx-text-white"><span>Dirección</span></h5>
                    <p class="impx-text-large uk-margin-top impx-text-light">@yield('direccion'), @yield('ciudad')
                    </p>
                </div><!-- Address End-->
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s">
                    <!-- Phone -->
                    <h5 class="uk-heading-line uk-margin-bottom impx-text-white"><span>Telefono</span></h5>
                    <p class="impx-text-large uk-margin-remove impx-text-light">@yield('telefono')
                    </p>
                </div><!-- Phone End -->
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s">
                    <!-- Email -->
                    <h5 class="uk-heading-line uk-margin-bottom  impx-text-white"><span>Email</span></h5>
                    <a href="mailt:#" class="impx-text-large impx-text-light">@yield('email')</a><br />
                </div><!-- Email End -->
            </div>
            <br>
            <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s uk-margin-medium-bottom">
                <!-- Location -->
                <h4 class="impx-text-white">Our Location</h4>
                <div class="map-responsive">
                    <p class="impx-text-large impx-text-light">Oculorum, inquit Plato, est in nobis sensus acerrimus,
                        quibus sapientiam non cernimus non semper inquam At enim sequor utilitatem praetermissum in
                        Stoicis?</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1599.1169852364083!2d-4.4238616613130715!3d36.716941693067795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f79410366a37%3A0x3393c175dd9ad8e5!2sC%2F%20Trinidad%20Grund%2C%2017%2C%2029001%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1684577711326!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>    
                </div>
                <!-- Location End -->
            </div>
        </div>
    </div>
</div>
    <!-- CONTACT SECTION END -->

@endsection