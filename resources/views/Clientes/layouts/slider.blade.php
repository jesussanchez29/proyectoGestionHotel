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
<!-- SLIDESHOW END -->
