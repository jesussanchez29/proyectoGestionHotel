@extends('Clientes.layouts.template')
@section('content')

@section('header')
    @include('Clientes.layouts.header')
@endsection
@section('slider')

    <div class="impx-page-heading uk-position-relative about">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Contacto</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Contacta con nosotros</p><!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="uk-padding uk-padding-remove-horizontal">
        <div class="uk-container">
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
                <div class="row">
                    <div class="col-md-5 mr-auto">
                        <h2>Informacion Contacto</h2>
                        <p class="mb-5"> Estamos encantados de poder ayudarte en cualquier consulta, reserva o solicitud
                            que tengas. Nuestro equipo de atención al cliente está disponible para brindarte asistencia
                            rápida y amigable. Puedes comunicarte con nosotros a través de teléfono, correo electrónico o
                            completando nuestro formulario de contacto en línea. ¡Esperamos poder atenderte y asegurarnos de
                            que disfrutes al máximo tu estancia en nuestro hotel!</p>

                        <ul class="list-unstyled pl-md-5 mb-5">
                            <li class="d-flex text-black mb-2">
                                <span class="mr-3"><span class="mdi mdi-phone"></span>
                                </span></span>Telefono: {{ $hotel->telefono }}
                            </li>
                            <li class="d-flex text-black mb-2"><span class="mr-3"><span class="icon-phone"></span></span>
                                Email: {{ $hotel->email }}</li>
                            <li class="d-flex text-black"><span class="mr-3"><span class="icon-envelope-o"></span></span>
                                Direccion: {{ $hotel->direccion }}, {{ $hotel->ciudad }} </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <form class="mb-5" method="post" id="contactForm" name="contactForm"
                            action="{{ route('enviarMensajeContacto') }}">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 form-group">
                                    <label for="name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="message" class="col-form-label">Mensaje</label>
                                    <textarea class="form-control" name="mensaje" id="message" cols="30" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Enviar Mensaje"
                                        class="btn btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="map-responsive">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d399.7792464173302!2d-4.422896068858674!3d36.71694167227089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f79410366a37%3A0x3393c175dd9ad8e5!2sC%2F%20Trinidad%20Grund%2C%2017%2C%2029001%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1685183523114!5m2!1ses!2ses"
                        width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('contacto')
@section('contacto')
    <div class="pre-footer-contact uk-padding bg-img2 uk-position-relative">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">

            <div data-uk-grid class="uk-padding-remove-bottom uk-position-relative">
                <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-3@s">
                    <!-- address -->
                    <h5 class="uk-heading-line uk-margin-remove-bottom"><span>Dirección</span></h5>
                    <p class="impx-text-large uk-margin-top">{{ $hotel->direccion }}, {{ $hotel->ciudad }}</p>
                </div>
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s">
                    <!-- phone -->
                    <h5 class="uk-heading-line uk-margin-bottom"><span>Telefono</span></h5>
                    <p class="impx-text-large uk-margin-remove">+34 {{ $hotel->telefono }}</p>
                </div>
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s">
                    <!-- email -->
                    <h5 class="uk-heading-line uk-margin-bottom"><span>Email</span></h5>
                    <a href="mailt:#" class="impx-text-large">{{ $hotel->email }}</a>
                </div>
            </div>

        </div>
    </div>
@endsection
