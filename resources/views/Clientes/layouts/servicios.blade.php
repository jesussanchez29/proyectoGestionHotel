<!-- Services List -->
<div class="uk-width-expand impx-services-list uk-margin-bottom impx-margin-bottom-small">
    <h6 class="uk-heading-line uk-text-center uk-light uk-margin-bottom impx-text-white">
        <span>Nuestros Servicios</span>
    </h6>
    <div class="uk-child-width-1-4@xl uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@suk-grid-medium"
        data-uk-grid>
        @if (count($servicios) > 0)
            @for ($i = 0; $i < count($servicios); $i++)
                @if ($i < 4)
                    <div>
                        <!-- Services Item #1 -->
                        <div
                            class="uk-card uk-card-default uk-box-shadow-hover-xlarge impx-service-card uk-padding-bottom">
                            <div class="uk-card-media-top">
                                <img src="{{ $servicios[$i]->imagen }}" alt="Servicio">
                            </div>
                            <div class="uk-card-body uk-card-small uk-text-center">
                                <div class="uk-card-badge uk-label uk-label-danger bg-color-aqua">
                                    {{ $servicios[$i]->nombre }}
                                </div>
                                <p>{{ $servicios[$i]->descripcion }}</p>
                                <a href="{{ route('serviciosCliente') }}"
                                    class="uk-button uk-button-default uk-button-small impx-button gold impx-button-outline outline-gold button-wide impx-button-rounded small-border">Leer
                                    Más &raquo;</a>
                            </div>
                        </div>
                    </div><!-- Services Item #1 End -->
                @endif
            @endfor
            @if (count($servicios) > 4)
                <div style="margin:auto;margin-top:30px;">
                    <a href="{{ route('serviciosCliente') }}"
                        class="uk-button uk-button-default impx-button impx-button-outline">Ver todos los
                        servicios<i class="uk-icon-arrow-circle-o-right"></i>
                    </a>
                </div>
            @endif
        @endif
    </div>
</div>
