<!-- Menu -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Linea divisoria -->
    <hr class="sidebar-divider my-0">

    <!-- Menu Item-->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('departamentos') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Departamentos</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('servicios') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Servicios</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('configuracion') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Configuracion Hotel</span></a>
    </li>

    <!-- Menu Item -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión Usuarios:</h6>
                <a class="collapse-item" href="{{ route('clientes') }}">Clientes</a>
                <a class="collapse-item" href="{{ route('empleados') }}">Empleados</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Habitaciones</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión Habitaciones:</h6>
                <a class="collapse-item" href="{{ route('habitaciones') }}">Habitaciones</a>
                <a class="collapse-item" href="{{ route('tipoHabitaciones') }}">Tipo de Habitaciones</a>
                <a class="collapse-item" href="{{ route('pisos') }}">Pisos</a>
                <a class="collapse-item" href="{{ route('estadoHabitaciones') }}">Estado</a>
                <a class="collapse-item" href="{{ route('caracteristicasHabitacion') }}">Caracteristicas</a>
            </div>
        </div>
    </li>

    <!-- Linea divisora -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Boton minimizar menu -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- FIn Menu -->