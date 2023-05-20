<!-- HEADER -->
<header id="impx-header">
    <div>
        <div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">

            <a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav"
                data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i>Menu</a>

            <!-- Barra de navegacion Mobil -->
            @include('Clientes.partials.navegationMobile')

            <!-- Header Arriba -->
            <div class="impx-top-header style2">
                <div class="uk-container uk-container-expand">

                    <div class="uk-grid">
                        <!-- Telefono -->
                        <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                            <div class="impx-top-phone">
                                <p><i class="fa fa-phone"></i>@yield('telefono')</p>
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

        </div>
    </div>
</header>
<!-- HEADER END -->
