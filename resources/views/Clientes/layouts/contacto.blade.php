  <!-- CONTACT SECTION -->
  <div class="impx-contact">
    <div id="impx-gmap"></div>

    <div class="impx-overlay aqua-darkest  uk-padding uk-padding-remove-bottom uk-padding-remove-horizontal">
        <div class="uk-container">

    

            <div data-uk-grid class="uk-padding-remove-bottom">
                <!-- Address -->
                <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                    <h5 class="uk-heading-line uk-margin-remove-bottom impx-text-white"><span>Dirección</span></h5>
                    <p class="impx-text-large uk-margin-top impx-text-light">@yield('direccion'), @yield('ciudad')
                    </p>
                </div><!-- Address End-->
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s">
                    <!-- Phone -->
                    <h5 class="uk-heading-line uk-margin-bottom impx-text-white"><span>Telefono</span></h5>
                    <p class="impx-text-large uk-margin-remove impx-text-light">@yield('telefono')
                    </p>
                </div><!-- Phone End -->
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-1@s">
                    <!-- Email -->
                    <h5 class="uk-heading-line uk-margin-bottom  impx-text-white"><span>Email</span></h5>
                    <a href="mailt:#" class="impx-text-large impx-text-light">@yield('email')</a><br />
                </div><!-- Email End -->
            </div>

        </div>
    </div>
</div>
<!-- CONTACT SECTION END -->