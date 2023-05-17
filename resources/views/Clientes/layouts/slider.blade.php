<div class="uk-container-expand">
    <div class="impx-slide-container style1">
        <div class="impx-slideshow-fw">

            <div
                data-uk-slideshow="autoplay: true; autoplay-interval: 6000; animation: fade; finite: false; min-height: 319; max-height: 980;">
                <div class="uk-position-relative uk-visible-toggle uk-light">

                    <ul class="uk-slideshow-items">
                       @yield('slider')
                    </ul>

                    <!-- Slideshow Nav -->
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                        data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                        data-uk-slidenav-next data-uk-slideshow-item="next"></a>
                    <!-- Slideshow Nav End -->
                </div>
            </div>

        </div>
    </div>
</div>
<!-- SLIDESHOW END -->
