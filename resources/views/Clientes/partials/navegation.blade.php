<div class="uk-container uk-container-expand">
    <div data-uk-grid>

        <!-- Logo -->
        <div class="uk-width-auto imagen">
            <div class="impx-logo">
                <a href="">
                    @yield('logo')
                </a>
            </div>
        </div>
        <!-- Logo fin -->

        <!-- Header Navigation -->
        <div class="uk-width-expand uk-position-relative">
            <nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m" data-uk-navbar>
                <div class="uk-navbar-right impx-navbar-right">
                    <ul class="uk-navbar-nav impx-nav style2">
                        <!-- Navigation Items -->
                        <li class="uk-parent uk-active">
                            <a href="{{ route('indexCliente') }}" class="uk-navbar-nav-subtitle">
                                <div>Inicio<div class="uk-navbar-subtitle">Bienvenido</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tipoHabitacionesClientes') }}" class="uk-navbar-nav-subtitle">
                                <div>Habitaciones<div class="uk-navbar-subtitle">Las mejores habitaciones</div>
                                </div>
                            </a>
                        </li>
                        <li><a href="restaurant.html">
                                <div>Servicios<div class="uk-navbar-subtitle">Disfruta de nuestros servicios
                                    </div>
                                </div>
                            </a></li>
                        <li><a href="spa.html">
                                <div>Reservar Habitación<div class="uk-navbar-subtitle">Reserva rápido y fácil</div>
                                </div>
                            </a></li>
                        <li><a href="activities.html" class="uk-navbar-nav-subtitle">
                                <div>Contacto<div class="uk-navbar-subtitle">Contacta con nosotros</div>
                                </div>
                            </a></li>
                    </ul>
                    <!-- Navigation Items End -->
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Header Navigation End -->
<style>
    .imagen {
        width: 130px;
        height: 60px;
    }
</style>
