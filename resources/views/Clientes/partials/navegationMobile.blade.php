 <div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-default">
            <li class="uk-parent uk-active">
                <a href="{{ route('indexCliente') }}">Inicio</a>
            </li>
            <li class="uk-parent">
                <a href="{{ route('tipoHabitacionesClientes') }}" class="uk-navbar-nav-subtitle">Habitaciones</a>
            </li>
            <li><a href="contact.html">Servicios</a></li>
            <li><a href="contact.html">Reservar Habitación</a></li>
            <li><a href="contact.html">Contacto</a></li>
        </ul>
    </div>
</div>
<a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav"
data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i>Menu</a>