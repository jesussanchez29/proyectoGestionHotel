<!-- FOOTER -->
<footer id="impx-footer" class="uk-padding uk-padding-remove-bottom uk-padding-remove-horizontal">
    <div class="uk-container">
        <div class="uk-flex uk-flex-center data-uk-grid">
            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-2-3@m">
                <div class="impx-footer-logo uk-align-center uk-text-center">
                    <!-- Footer Logo -->
                    @if (!empty($hotel->logo))
                        <img src="{{ asset($hotel->logo) }}" alt="" class="">
                    @endif
                    <!-- Footer Note -->
                    <p class="uk-margin-bottom">PROYECTO FINAL GRADO - IES PLAYAMAR | Jesús Sánchez Torres</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top -->
    <a href="#top" class="to-top fa fa-long-arrow-up" data-uk-scroll></a>
    <!-- Scroll to Top End -->
</footer>
<!-- FOOTER END -->