<div class="uk-container uk-container-expand">
    <div data-uk-grid>

        <!-- Logo -->
        <div class="uk-width-auto imagen">
            <div class="impx-logo">
                @auth
                    @if (Auth::user()->empleado)
                        <a href="{{ route('clientes') }}"><img src="{{ $hotel->logo }}" class="" alt="Logo"></a>
                    @else
                        <a href="{{ route('indexCliente') }}"><img src="{{ $hotel->logo }}" class="" alt="Logo"></a>
                    @endif

                @endauth
                @guest
                    <a href="{{ route('indexCliente') }}"><img src="{{ $hotel->logo }}" class="" alt="Logo"></a>
                @endguest
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
                        <li><a href="{{ route('serviciosCliente') }}">
                                <div>Servicios<div class="uk-navbar-subtitle">Disfruta de nuestros servicios
                                    </div>
                                </div>
                            </a></li>
                        <li><a href="{{ route('contacto') }}" class="uk-navbar-nav-subtitle">
                                <div>Contacto<div class="uk-navbar-subtitle">Contacta con nosotros</div>
                                </div>
                            </a>
                        </li>
                        @auth
                            @if (Auth::user()->cliente)
                                <li><a href="{{ route('perfilCliente') }}" class="uk-navbar-nav-subtitle">
                                        <div>Perfil<div class="uk-navbar-subtitle">Modifica tu perfil</div>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="{{ route('historialReservas') }}" class="uk-navbar-nav-subtitle">
                                    <div>Historial Reservas<div class="uk-navbar-subtitle">Mira tus reservas</div>
                                    </div>
                                </a>
                            </li>
                            @endif
                        @endauth
                    </ul>
                    <!-- Navigation Items End -->
                </div>
            </nav>
        </div>
        <div class="uk-width-auto uk-position-relative">
            <br>
            <div>
                @auth
                    <a class="uk-button impx-button small red uk-margin-small-bottom" href="{{ route('logout') }}">Cerrar
                        Sesión</a>
                @endauth

                @guest
                    <a class="uk-button impx-button small blue-sky uk-margin-small-bottom"
                        href="{{ route('login') }}">Acceder</a>
                    <br>
                    <a class="uk-button impx-button small red uk-margin-small-bottom"
                        href="{{ route('registro') }}">Registrase</a>
                @endguest

            </div>
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
