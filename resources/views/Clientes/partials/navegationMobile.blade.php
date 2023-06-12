 <div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
     <div class="uk-offcanvas-bar">
         <ul class="uk-nav uk-nav-default">
             <li class="uk-parent uk-active">
                 <a href="{{ route('indexCliente') }}">Inicio</a>
             </li>
             <li class="uk-parent">
                 <a href="{{ route('tipoHabitacionesClientes') }}" class="uk-navbar-nav-subtitle">Habitaciones</a>
             </li>
             <li><a href="{{ route('serviciosCliente') }}">Servicios</a></li>
             <li><a href="{{ route('contacto') }}">Contacto</a></li>
             @auth
                 @if (Auth::user()->cliente)
                     <li><a href="{{ route('perfilCliente') }}">Perfil</a></li>
                     @if (Auth::user()->reservas->count() > 0)
                         <li><a href="{{ route('reservasCliente') }}">Historial Reservas</a></li>
                     @endif
                 @endif
             @endauth
         </ul>
     </div>
 </div>
 <a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav" data-uk-toggle="target: #mobile-nav"><i
         class="fa fa-bars"></i>Menu</a>
