<div
    class="uk-position-relative impx-section-rooms bg1 uk-position-relative uk-background-fixed uk-background-center-center uk-height-1-1">
    <div class="impx-overlay"></div>

    <div class="uk-container">
        <div class="uk-position-relative uk-visible-toggle">
            @if (count($tipoHabitaciones) > 0)
                <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid-collapse uk-box-shadow-large uk-grid-match impx-rooms-grid"
                    data-uk-grid>
                    @for ($i = 0; $i < count($tipoHabitaciones); $i++)
                        @if ($i < 4)
                            <li>
                                <!-- Room Item #1 -->
                                <div class="impx-room-item medium">
                                    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s"
                                        data-uk-grid>
                                        @if ($i < 2)
                                            <div class="uk-card-media-left uk-cover-container uk-position-relative">
                                                <canvas width="290" height="180"></canvas>
                                                <img src="{{ $tipoHabitaciones[$i]->imagen }}" alt=""
                                                    data-uk-cover>
                                                <div class="impx-overlay light overlay-squared padding-xwide"></div>
                                            </div>
                                            <div class="uk-card-body uk-position-relative impx-padding-medium">
                                                <div class="uk-card-header uk-padding-remove-horizontal">
                                                    <h4 class="uk-card-title uk-margin-remove-bottom">
                                                        {{ $tipoHabitaciones[$i]->nombre }}</h4>
                                                    <p class="uk-text-meta uk-margin-remove-top">
                                                        {{ $tipoHabitaciones[$i]->descripcion }}</p>
                                                </div>
                                                <span class="uk-card-badge uk-label bg-color-aqua">desde
                                                    {{ $tipoHabitaciones[$i]->precio }}€/noche</span>
                                                <ul class="uk-list room-fac">
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span>
                                                        Beatus in maximarum timore</li>
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span>
                                                        Oculis Compensabatur</li>
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span>
                                                        Dolorisnos veriusque nihil</li>
                                                </ul>
                                                <div
                                                    class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
                                                    <a href="{{ route('verTipoHabitacion', $tipoHabitaciones[$i]->id) }}"
                                                        class="uk-button uk-button-text impx-text-aqua">LEER MÁS
                                                        &raquo;</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="uk-card-body uk-position-relative impx-padding-medium">
                                                <div class="uk-card-header uk-padding-remove-horizontal">
                                                    <h4 class="uk-card-title uk-margin-remove-bottom">
                                                        {{ $tipoHabitaciones[$i]->nombre }}</h4>
                                                    <p class="uk-text-meta uk-margin-remove-top">
                                                        {{ $tipoHabitaciones[$i]->descripcion }}</p>
                                                </div>
                                                <span class="uk-card-badge uk-label bg-color-aqua">desde
                                                    {{ $tipoHabitaciones[$i]->precio }}€/noche</span>
                                                <ul class="uk-list room-fac">
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span> Beatus in
                                                        maximarum timore</li>
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span> Oculis
                                                        Compensabatur</li>
                                                    <li><span class="impx-text-aqua"
                                                            data-uk-icon="icon: check; ratio: 1;"></span> Dolorisnos
                                                        veriusque nihil</li>
                                                </ul>
                                                <div
                                                    class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
                                                    <a href="{{ route('verTipoHabitacion', $tipoHabitaciones[$i]->id) }}"
                                                        class="uk-button uk-button-text impx-text-aqua">LEER MÁS
                                                        &raquo;</a>
                                                </div>
                                            </div>
                                            <div class="uk-card-media-right uk-cover-container uk-position-relative">
                                                <canvas width="290" height="180"></canvas>
                                                <img src="{{ $tipoHabitaciones[$i]->imagen }}" alt=""
                                                    data-uk-cover>
                                                <div class="impx-overlay light overlay-squared padding-xwide"></div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endfor
                </ul>
            @endif
        </div>
    </div>
</div>
