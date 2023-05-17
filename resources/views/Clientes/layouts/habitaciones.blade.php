<div class="uk-position-relative impx-section-rooms bg1 uk-position-relative uk-background-fixed uk-background-center-center uk-height-1-1">
    <div class="impx-overlay"></div>

    <div class="uk-container">
        <div class="uk-position-relative uk-visible-toggle">
            <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-collapse uk-box-shadow-large uk-grid-match impx-rooms-grid"
            data-uk-grid>
            @if (count($tipoHabitaciones) > 0)
            @foreach ($tipoHabitaciones as $tipoHabitacion)
                
                <li>
                    <!-- Room Item #1 -->
                    <div class="impx-room-item medium">
                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s" data-uk-grid>
                            <div class="uk-card-media-left uk-cover-container uk-position-relative">
                                <canvas width="290" height="180"></canvas>
                                <img src="{{ $tipoHabitacion->imagen }}" alt="" data-uk-cover>
                                <div class="impx-overlay light overlay-squared padding-xwide"></div>
                            </div>
                            <div class="uk-card-body uk-position-relative impx-padding-medium">
                                <div class="uk-card-header uk-padding-remove-horizontal">
                                    <h4 class="uk-card-title uk-margin-remove-bottom">{{ $tipoHabitacion->nombre }}</h4>
                                    <p class="uk-text-meta uk-margin-remove-top">{{ $tipoHabitacion->descripcion }}</p>
                                </div>
                                <span class="uk-card-badge uk-label bg-color-aqua">{{ $tipoHabitacion->precio }}</span>
                                <ul class="uk-list room-fac">
                                    <li><span class="impx-text-aqua" data-uk-icon="icon: check; ratio: 1;"></span>
                                        Beatus in maximarum timore</li>
                                    <li><span class="impx-text-aqua" data-uk-icon="icon: check; ratio: 1;"></span>
                                        Oculis Compensabatur</li>
                                    <li><span class="impx-text-aqua" data-uk-icon="icon: check; ratio: 1;"></span>
                                        Dolorisnos veriusque nihil</li>
                                </ul>
                                <div class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
                                    <a href="room-detail.html"
                                        class="uk-button uk-button-text impx-text-aqua">Read more &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                @else
                    <p>No disponemos de habitaciones</p>
                <!-- Room Item #1 End -->
                @endif
            </ul>
        </div>
    </div>

</div>