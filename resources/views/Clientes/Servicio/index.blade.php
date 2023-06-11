@extends('Clientes.layouts.template')

@section('header')
    @include('Clientes.layouts.header')
@endsection

@section('slider')
    <!-- PAGE HEADING -->
    <div class="impx-page-heading uk-position-relative act">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Servicios</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Disfruta nuestros servcios</p><!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE HEADING END -->
@endsection

@section('content')
    <div class="uk-padding uk-padding-remove-horizontal">
        <div class="uk-container">
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
            <div data-uk-grid>
                <!-- main content -->
                <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s uk-margin-small-top">
                    <div class="uk-position-relative uk-visible-toggle">
                        <!-- Rooms List -->
                        @if (count($serviciosPaginados) > 0)
                            <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-2@s data-uk-grid uk-grid-match uk-margin-large-bottom"
                                data-uk-grid>
                                @foreach ($serviciosPaginados as $servicio)
                                    <li>
                                        <!-- room item #1 -->
                                        <div class="uk-card uk-card-default uk-card-medium">
                                            <div class="uk-card-media-top uk-position-relative">
                                                <img src="{{ $servicio->imagen }}" alt="">
                                                <div class="impx-overlay light overlay-squared padding-xwide"></div>
                                            </div>
                                            <div class="uk-card-body impx-padding-medium">
                                                <h4 class="uk-card-title uk-margin-remove-bottom">
                                                    {{ $servicio->nombre }}</h4>
                                                <span class="uk-label bg-color-aqua">POR
                                                    {{ $servicio->precio }}€</span>
                                                <ul class="uk-list room-fac">
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span> Puntualidad ante
                                                        todo</li>
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span> Servicio de
                                                        calidad</li>
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span> Quedarás
                                                        totalmente sastifecho</li>
                                                </ul>

                                                <div
                                                    class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
                                                    @auth
                                                        <a class="uk-button uk-button-text impx-text-aqua">Ver
                                                            disponibilidad&raquo;</a>

                                                    @endauth
                                                    @guest
                                                        <p>Horario: {{ $servicio->horaInicio }} - {{ $servicio->horaFin }}</p>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </li><!-- room item #1 end -->
                                @endforeach
                            </ul>
                            {!! $serviciosPaginados->links('vendor.pagination.bootstrap-5') !!}
                        @endif
                        <!-- rooms list end -->
                    </div>

                </div>
                <!-- main content end -->

                <!-- sidebar -->
                <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s uk-margin-small-top">

                    <!-- booking form -->
                    <div class="bg-color-aqua uk-padding impx-padding-medium">
                        <div class="impx-hp-booking-form side-form uk-margin-bottom uk-margin-remove-top">
                            <h6 class="uk-heading-line uk-text-center impx-text-white uk-text-uppercase"><span>OBTENER
                                    SERVICIO</span></h6>
                            @auth
                                @if (Auth::user()->tieneReservaActual())
                                    <form class="hora-disponible-form" method="POST"
                                        action="{{ route('registrarReservaServicio') }}">
                                        @csrf
                                        <div class="uk-margin">
                                            <div class="uk-form-controls">
                                                <div class="uk-inline">
                                                    <label class="uk-form-label impx-text-white">Fecha</label>
                                                    <span class="uk-form-icon" data-uk-icon=""></span>
                                                    <input type="hidden" name="reserva"
                                                        value="{{ Auth::user()->reservaActual()->id }}">
                                                    <input class="uk-input uk-border-rounded" type="date"
                                                        placeholder="m/dd/yyyy" name="fecha" id="fecha"  min="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <div class="uk-form-controls uk-position-relative">
                                                <label class="uk-form-label impx-text-white" for="form-servicios-select">Tipo
                                                    Servicio</label>
                                                <span class="uk-form-icon select-icon" data-uk-icon="icon: album"></span>
                                                @if (count($servicios) > 0)
                                                    <select class="uk-select uk-border-rounded" id="form-servicios-select"
                                                        name="servicio">
                                                        @foreach ($servicios as $servicio)
                                                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="vacio">Sin Servicios disponibles</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <label class="uk-form-label impx-text-white" for="form-servicios-select">Selecciona
                                                una hora</label>
                                            <div id="noDisponibilidad"></div>
                                            <div class="hours-grid" id="horas-disponibles-container">
                                            </div>
                                            <input type="hidden" name="hora" value="">
                                        </div>
                                        <div>
                                            <label class="uk-form-label empty-label">&nbsp;</label>
                                            <button type="submit" class="uk-button uk-width-1-1" id="reservaServicio">¡Reservar!</button>
                                        </div>
                                    </form>
                                @else
                                    <p>Obten una reserva para poder obtener un servicio</p>
                                @endif
                            @endauth
                            @guest
                                <p>Obten una reserva para poder obtener un servicio</p>
                            @endguest
                        </div>
                    </div>
                    <!-- booking form -->
                    <!-- features -->
                    <div class="bg-color-white uk-padding  impx-padding-medium uk-box-shadow-small">
                        <h4 class="uk-heading-line uk-margin-medium-bottom"><span>Nuestras características clave</span>
                        </h4>
                        <ul class="uk-list uk-list-divider uk-list-large">
                            <li>
                                <div data-uk-grid class="uk-grid-medium">
                                    <div class="uk-width-auto">
                                        <i class="fa fa-group fa-2x impx-text-aqua"></i>
                                    </div>
                                    <div class="uk-width-expand">
                                        <h6 class="uk-margin-remove">Ambiente familiar</h6>
                                        <p class="uk-margin-remove-bottom uk-margin-small-top">Valoramos y apreciamos
                                            el tiempo en familia, ofreciendo un ambiente cálido y servicios para
                                            disfrutar juntos</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div data-uk-grid class="uk-grid-medium">
                                    <div class="uk-width-auto">
                                        <i class="fa fa-image fa-2x impx-text-aqua"></i>
                                    </div>
                                    <div class="uk-width-expand">
                                        <h6 class="uk-margin-remove">Hermoso Panorama</h6>
                                        <p class="uk-margin-remove-bottom uk-margin-small-top">Podrás disfrutar de la
                                            belleza natural o de los impresionantes paisajes mientras te relajas y te
                                            desconectas de la rutina diaria</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div data-uk-grid class="uk-grid-medium">
                                    <div class="uk-width-auto">
                                        <i class="fa fa-star-o fa-2x impx-text-aqua"></i>
                                    </div>
                                    <div class="uk-width-expand">
                                        <h6 class="uk-margin-remove">Mejores Instalaciones</h6>
                                        <p class="uk-margin-remove-bottom uk-margin-small-top">Nuestro hotel cuenta con
                                            las mejores instalaciones para garantizar que tu estancia sea lo más
                                            placentera posible</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div data-uk-grid class="uk-grid-medium">
                                    <div class="uk-width-auto">
                                        <i class="fa fa-smile-o fa-2x impx-text-aqua"></i>
                                    </div>
                                    <div class="uk-width-expand">
                                        <h6 class="uk-margin-remove">Actividades para todos</h6>
                                        <p class="uk-margin-remove-bottom uk-margin-small-top">Ofrecemos una amplia
                                            variedad de actividades para todos los gustos, asegurando emoción para
                                            disfrutar</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- features end -->

                </div>
                <!-- sidebar end -->

            </div>
        </div>
    </div>
@endsection


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
    @auth
        @if (Auth::user()->tieneReservaActual())
            @include('Clientes.scripts.servicio')
        @endif
    @endauth

    <style>
        .hours-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .hour-card {
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            transition: background-color 0.3s;

        }

        .hour-card:hover {
            background-color: #c8eaf7;
        }
        .hour-card.selected {
    background-color: #AED6F1; /* Cambia el color de fondo a azul claro */
    /* Otros estilos adicionales si los necesitas */
}



    </style>

    
@endsection
