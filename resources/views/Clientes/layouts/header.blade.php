<!-- Barra de navegacion Mobil -->
@include('Clientes.partials.navegationMobile')
<a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav" data-uk-toggle="target: #mobile-nav"><i
        class="fa fa-bars"></i>Menu</a>

<!-- Header Arriba -->
<div class="impx-top-header style2">
    <div class="uk-container uk-container-expand">

        <div class="uk-grid">
            <!-- Telefono -->
            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                <div class="impx-top-phone">
                    <p><i class="fa fa-phone"></i> Telefono: +34 {{ $hotel->telefono }}</p>
                </div>
            </div>
            <!-- Telefono fin-->

            <!-- Redes sociales -->
            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                <div class="impx-top-social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-f"></i>Facebook</a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                    </ul>
                </div>
            </div>
            <!-- Redes sociales Fin -->
        </div>
    </div>
</div>
<!-- Header Arriba Fin-->

<!-- Barra de navegacion-->
@include('Clientes.partials.navegation')

<!-- Promo Ribbon -->
<div class="uk-width-auto uk-position-relative">

</div>
<!-- Promo Ribbon End -->
