<!-- Services List -->
<div class="uk-width-expand impx-services-list uk-margin-bottom impx-margin-bottom-small">
    <h6 class="uk-heading-line uk-text-center uk-light uk-margin-bottom impx-text-white">
        <span>Nuestros Servicios</span>
    </h6>
    <div class="uk-child-width-1-4@xl uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-2@suk-grid-medium"
        data-uk-grid>
        @php
            $count = 0;
        @endphp
        @foreach ($servicios as $servicio)
            @php
                $count++;
            @endphp
            <div>
                <!-- Services Item #1 -->
                <div class="uk-card uk-card-default uk-box-shadow-hover-xlarge impx-service-card uk-padding-bottom">
                    <div class="uk-card-media-top">
                        <img src="{{ $servicio->imagen }}" alt="Servicio">
                    </div>
                    <div class="uk-card-body uk-card-small uk-text-center">
                        <div class="uk-card-badge uk-label uk-label-danger bg-color-aqua">{{ $servicio->nombre }}</div>
                        <p>{{ $servicio->descripcion }}
                        </p>
                        <a href="#"
                            class="uk-button uk-button-default uk-button-small impx-button gold impx-button-outline outline-gold button-wide impx-button-rounded small-border">Leer
                            Más &raquo;</a>
                    </div>
                </div>
            </div><!-- Services Item #1 End -->
            @if ($count >= 4)
            @break
        @endif
    @endforeach
    @if (count($servicios) > 4)
        <div style="margin:auto;margin-top:30px;">
            <a href="#" class="uk-button uk-button-default impx-button impx-button-outline">Ver todos los
                servicios<i class="uk-icon-arrow-circle-o-right"></i></a>
        </div>
    @endif
</div>
</div>
