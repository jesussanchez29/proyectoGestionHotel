@extends('Clientes.layouts.template')
@section('header')
<div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-page-heading; animation: uk-animation-slide-top">
    @endsection
    <div class="impx-page-heading uk-position-relative room-detail">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Detalles Habitación</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Busca y reserva tu mejor elección</p>
                        <!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('content')
    <div class="uk-padding vert uk-padding-remove-horizontal">
        <div class="uk-container">
            <div data-uk-grid>

                <div class="uk-width-1-1 uk-margin-medium-top">
                    <!-- slider -->
                    <div class="impx-room-slider">
                        <div class="uk-position-relative" data-uk-slideshow="animation: fade">
                            <ul class="uk-slideshow-items">
                                <li>
                                    <img src="{{ $tipoHabitacionEncontrada->imagen }}" alt="" data-uk-cover>
                                    <div class="impx-overlay"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- slider end -->
                </div>

                <!-- MAIN CONTENT -->
                <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                    <!-- highlight -->
                    @if (count($caracteristicas) > 0)
                        <ul class="uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-2@m uk-child-width-1-2@s uk-grid-medium uk-grid-match"
                            data-uk-grid>
                            @foreach ($caracteristicas as $caracteristica)
                                <li class="uk-text-center">
                                    <div class="uk-card uk-card-default uk-card-body impx-padding-medium">
                                        <!-- highlight item #1 -->
                                        <img src="{{ 'images/about-img-2.jpg' }}" alt="">
                                        <h6 class="uk-margin-remove-bottom uk-margin-small-top">
                                            {{ $caracteristica->nombre }}</h6>
                                        <p class="uk-margin-remove-bottom uk-margin-small-top">
                                            {{ $caracteristica->descripcion }}</p>
                                    </div>
                                </li><!-- highlight item #1 end -->
                            @endforeach
                        </ul>
                    @endif

                    <!-- highlight end -->

                    <!-- room description -->
                    <h4>Descripción Habitación</h4>
                    <p class="impx-text-large">{{ $tipoHabitacionEncontrada->descripcion }}</p>

                    <hr class="uk-divider-icon">

                    <!-- Review -->
                    <div class="impx-reviews-section">

                        <div class="uk-card uk-card-default uk-margin-medium-bottom">
                            <!-- Review comment -->
                            <div class="uk-card-body impx-padding-medium">
                                <h4 class="uk-margin-medium-bottom uk-heading-bullet uk-heading-line"><span>Reseñas o
                                        Comentarios</span></h4>

                                <ul class="uk-comment-list">
                                    <li>
                                        <article class="uk-comment">
                                            <header class="uk-comment-header uk-position-relative">
                                                <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                                                    <div class="uk-width-auto">
                                                        <img class="uk-comment-avatar" src="images/perfilDefecto.png"
                                                            width="80" height="80" alt="">
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <h4 class="uk-comment-title uk-margin-remove"><a
                                                                class="uk-link-reset" href="#">Juan Gomez De arte</a>
                                                        </h4>
                                                        <ul
                                                            class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top uk-margin-small-bottom">
                                                            <li>
                                                                <select id="review-rating1">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="uk-comment-body">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                                                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                                                    amet.</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <article class="uk-comment">
                                            <header class="uk-comment-header uk-position-relative">
                                                <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                                                    <div class="uk-width-auto">
                                                        <img class="uk-comment-avatar"
                                                            src="images/peoples/testi-people2.jpg" width="80"
                                                            height="80" alt="">
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <h4 class="uk-comment-title uk-margin-remove"><a
                                                                class="uk-link-reset" href="#">Author</a></h4>
                                                        <ul
                                                            class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top uk-margin-small-bottom">
                                                            <li>
                                                                <select id="review-rating2">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="uk-comment-body">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                                                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                                                    amet.</p>
                                            </div>
                                        </article>
                                    </li>
                                    <li>
                                        <article class="uk-comment">
                                            <header class="uk-comment-header uk-position-relative">
                                                <div class="uk-grid-medium uk-flex-middle" data-uk-grid>
                                                    <div class="uk-width-auto">
                                                        <img class="uk-comment-avatar"
                                                            src="images/peoples/testi-people3.jpg" width="80"
                                                            height="80" alt="">
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <h4 class="uk-comment-title uk-margin-remove"><a
                                                                class="uk-link-reset" href="#">Author</a></h4>
                                                        <ul
                                                            class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top uk-margin-small-bottom">
                                                            <li>
                                                                <select id="review-rating3">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </header>
                                            <div class="uk-comment-body">
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                                    eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
                                                    clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit
                                                    amet.</p>
                                            </div>
                                        </article>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!-- review comment end -->
                    </div>

                    <!-- Review form -->
                    <div class="uk-card uk-card-default uk-margin-medium-bottom">
                        <div class="uk-card-body impx-padding-medium">
                            <h4 class="uk-margin-medium-bottom uk-heading-bullet uk-heading-line"><span>Add Your
                                    Review</span></h4>
                            <form>
                                <fieldset class="uk-fieldset">

                                    <div class="uk-margin">
                                        <input class="uk-input" type="text" placeholder="Name">
                                    </div>
                                    <div class="uk-margin">
                                        <input class="uk-input" type="text" placeholder="Email">
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="review-rating-opt">Rating</label>
                                        <select id="review-rating-opt">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <div class="uk-margin">
                                        <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button impx-button aqua">Submit</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- Review form end -->
                </div>
                <!-- MAIN CONTENT -->

                <!-- SIDEBAR -->
                <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                    <!-- booking form -->
                    <div class="bg-color-aqua uk-padding impx-padding-medium uk-margin-medium-bottom uk-box-shadow-medium">

                        <div class="impx-hp-booking-form side-form uk-margin-bottom uk-margin-remove-top ">
                            <h6 class="uk-heading-line uk-text-center uk-light uk-text-uppercase"><span>Booking Form</span>
                            </h6>
                            <form class="">
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-inline">
                                            <label class="uk-form-label">Email</label>
                                            <span class="uk-form-icon" data-uk-icon="icon: mail"></span>
                                            <input class="uk-input booking-email uk-border-rounded" type="text"
                                                placeholder="your e-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-inline">
                                            <label class="uk-form-label">Arrival</label>
                                            <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                                            <input class="uk-input booking-arrival uk-border-rounded" type="text"
                                                placeholder="m/dd/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <div class="uk-inline">
                                            <label class="uk-form-label">Departure</label>
                                            <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                                            <input class="uk-input booking-departure uk-border-rounded" type="text"
                                                placeholder="m/dd/yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls uk-position-relative">
                                        <label class="uk-form-label" for="form-guest-select">Guest</label>
                                        <span class="uk-form-icon select-icon" data-uk-icon="icon: users"></span>
                                        <select class="uk-select uk-border-rounded" id="form-guest-select">
                                            <option value="">Please select...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-form-controls uk-position-relative">
                                        <label class="uk-form-label" for="form-rooms-select">Rooms</label>
                                        <span class="uk-form-icon select-icon" data-uk-icon="icon: album"></span>
                                        <select class="uk-select uk-border-rounded" id="form-rooms-select">
                                            <option value="">Please select...</option>
                                            <option value="room_1">Single</option>
                                            <option value="room_2">Double</option>
                                            <option value="room_3">Primier</option>
                                            <option value="room_4">Deluxe</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="uk-form-label empty-label">&nbsp;</label>
                                    <button class="uk-button uk-width-1-1">Book Now!</button>
                                </div>
                            </form>
                        </div>
                        <!-- booking form -->
                    </div>
                    <!-- SIDEBAR END -->

                    <!-- related rooms -->
                    <div
                        class="uk-margin-large-bottom uk-padding impx-padding-medium bg-color-white uk-box-shadow-medium related-rooms">
                        <h4 class="uk-heading-line uk-text-center">Otras Habitaciones</h4><!-- title -->
                        <!-- room items -->
                        @if (count($tipoHabitaciones) > 0)
                            <ul class="uk-child-width-1-1@xl uk-child-width-1-1@l uk-child-width-1-1@m uk-child-width-1-3@simpx-rooms style3 uk-margin-small-top uk-margin-remove-bottom data-uk-grid"
                                data-uk-grid>
                                @foreach ($tipoHabitaciones as $tipoHabitacion)
                                    <li>
                                        <!-- room item #1 -->
                                        <a href="{{ route('verTipoHabitacion', $tipoHabitacion->id) }}"
                                            class="uk-inline-clip uk-transition-toggle">
                                            <div
                                                class="uk-card uk-card-default uk-box-shadow-large uk-box-shadow-hover-xlarge impx-service-card other-item bg-color-aqua">
                                                <div class="uk-card-media-top">
                                                    <div class="uk-position-relative">
                                                        <img src="{{ $tipoHabitacion->imagen }}" alt="">
                                                        <div class="impx-overlay light overlay-squared padding-xwide">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="uk-card-body impx-padding-small uk-position-relative uk-position-z-index">
                                                        <h4 class="uk-card-title uk-margin-remove-bottom impx-text-white">
                                                            {{ $tipoHabitacion->nombre }}</h4>
                                                        <div
                                                            class="uk-card-badge uk-label bg-color-gold impx-text-white small">
                                                            desde {{ $tipoHabitacion->precio }}€</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary impx-overlay aqua-darkest">
                                                    <p class="impx-text-white">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing
                                                        elit. Si verbum sequimur, primum longius verbum praepositum quam
                                                        bonum</p>
                                                    <ul class="uk-list room-fac impx-text-white">
                                                        <li><span class="impx-text-white"
                                                                data-uk-icon="icon: check; ratio: 1;"></span> Beatus in
                                                            maximarum
                                                            timore</li>
                                                        <li><span class="impx-text-white"
                                                                data-uk-icon="icon: check; ratio: 1;"></span> Oculis
                                                            Compensabatur
                                                        </li>
                                                        <li><span class="impx-text-white"
                                                                data-uk-icon="icon: check; ratio: 1;"></span> Dolorisnos
                                                            veriusque
                                                            nihil</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- room item #1 end -->
                                @endforeach
                            </ul>
                            <!-- related rooms end -->
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('contacto')
<div class="pre-footer-contact uk-padding bg-img2 uk-position-relative">
    <div class="impx-overlay dark"></div>
    <div class="uk-container">

        <div data-uk-grid class="uk-padding-remove-bottom uk-position-relative">				
            <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-3@s"><!-- address -->
                <h5 class="uk-heading-line uk-margin-remove-bottom"><span>Dirección</span></h5>
                <p class="impx-text-large uk-margin-top">{{ $hotel->direccion }}, {{ $hotel->ciudad }}</p>
            </div>
            <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s"><!-- phone -->
                <h5 class="uk-heading-line uk-margin-bottom"><span>Telefono</span></h5>
                <p class="impx-text-large uk-margin-remove">+34 {{ $hotel->telefono }}</p>
            </div>
            <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s"><!-- email -->
                <h5 class="uk-heading-line uk-margin-bottom"><span>Email</span></h5>
                <a href="mailt:#" class="impx-text-large">{{ $hotel->email }}</a>
            </div>
        </div>

    </div>
</div>
@endsection

