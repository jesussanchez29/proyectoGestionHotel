<div
    class="uk-padding uk-padding-remove-horizontal uk-position-relative impx-section-testimonial uk-background-fixed uk-background-center-center uk-height-1-1">
    <div class="impx-overlay"></div>
    <div class="uk-container">

        <div class="uk-flex uk-flex-right uk-margin-bottom">

            <div class="uk-width-3-5@xl uk-width-3-5@l uk-width-4-5@m">

                <div class="impx-intro uk-text-right uk-light uk-position-relative">
                    <h2 class="uk-margin-small-bottom">Opiniones Clientes</h2>
                    <p class="impx-text-large uk-margin-remove-top uk-margin-medium-bottom">Descubre las opiniones de nuestros clientes y conoce su experiencia en nuestro hotel. Sus testimonios reflejan la calidad de nuestro servicio y la satisfacción que brindamos. ¡No te pierdas la oportunidad de leer las impresiones de quienes nos han visitado!</p>
                </div>

                <!-- Testimonials List -->
                <div class="impx-testimonial-list">
                    <div data-uk-slider="{autoplay: true, finite: true}">
                        <div class="uk-position-relative uk-visible-toggle uk-light">
                            @if (count($resenas) > 0)
                                <ul class="uk-slider-items uk-child-width-1-1" data-uk-grid>
                                    @foreach ($resenas as $resena)
                                        <li class="uk-padding uk-padding-remove-vertical">
                                            <!-- Testimonial List Item 1 -->
                                            <div class="impx-testimonial-item impx-contrast">
                                                <div class="impx-testi-container">
                                                    <div class="impx-testi-text">
                                                        <blockquote>
                                                            <p>{{ $resena->comentario }}</p>
                                                        </blockquote>
                                                    </div>
                                                    <div class="uk-text-center">

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $resena->puntuacion)
                                                                <img style="margin-right:2px"
                                                                    src="{{ asset('images/estrella.png') }}"
                                                                    alt="">
                                                            @else
                                                                <img style="margin-right:2px"
                                                                    src="{{ asset('images/estrellaBlanca.png') }}"
                                                                    alt="">
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="uk-text-center">
                                                        <div class="impx-testi-name">
                                                            <p>{{ $resena->usuario->cliente->nombre }}
                                                                {{ $resena->usuario->cliente->apellidos }}</p>
                                                        </div>
                                                        <div class="impx-company-name">
                                                            <p class="bg-color-gold">Cliente</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="impx-testi-image"><img
                                                        src="{{ $resena->usuario->imagenPerfil }}" alt="People 1" /></div>
                                            </div>
                                        </li><!-- Testimonial List Item 1 End -->
                                    @endforeach

                                </ul>
                            @endif
                            <!-- Testimonial Nav -->
                            <a class="uk-position-center-left  uk-hidden-hover" href="#" data-uk-slidenav-previous
                                data-uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-hidden-hover" href="#" data-uk-slidenav-next
                                data-uk-slider-item="next"></a>
                            <!-- Testimonial Nav End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
