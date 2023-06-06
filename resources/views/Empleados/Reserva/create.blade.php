@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
    <div class="card border-primary">
        <div class="card-body">
            <form action="{{ route('crearReservaEmpleado') }}" method="post">
                <input type="hidden" value="{{ $reservaHabitacion->id }}" id="txtidhabitacion" name="habitacion" />
                <h5 class="card-title font-weight-bold text-primary">Detalles de la Habitación</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Número:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ $reservaHabitacion->numero }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Detalles:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">
                                    @foreach ($caracteristicasHabitacion as $caracteristicaHabitacion)
                                        {{ $caracteristicaHabitacion->nombre }}
                                        @if (!$loop->last)
                                            +
                                        @endif
                                    @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Capacidad:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ $reservaHabitacion->tipoHabitacion->capacidad }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Categoria:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ $reservaHabitacion->tipoHabitacion->nombre }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Piso:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ $reservaHabitacion->piso->numero }}</label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Precio:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ $reservaHabitacion->tipoHabitacion->precio }}€</label>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="card mt-2 border-primary">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>

                    {{ session('success') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title font-weight-bold text-primary">Detalle Reservación</h5>
                    <input type="hidden" id="txtidcliente" value="0" />
                    <div class="form-group mb-2">
                        <label for="exampleFormControlInput1">Cliente:</label>
                        <div class="input-group">
                            @if (count($clientes) > 0)
                                <select class="form-control" name="cliente" id="">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->tipoIdentificacion }} -
                                            {{ $cliente->identificacion }} | {{ $cliente->nombre }}
                                            {{ $cliente->apellidos }}</option>
                                    @endforeach
                                </select>
                            @else
                                <p>No hay clientes registrados</p>
                            @endif
                            <div class="input-group-append">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModalCreate">
                                    <i class='fas fa-user-plus'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="inputEmail4">Fecha Entrada:</label>
                            <input type="date" class="form-control" name="fechaLlegada" id="txtfechaentrada">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="inputPassword4">Fecha Salida:</label>
                            <input type="date" class="form-control" name="fechaSalida" id="txtfechasalida">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="inputEmail4">Precio:</label>
                            <input type="text" class="form-control" id="txtprecio" disabled="disabled"
                                value="{{ $reservaHabitacion->tipoHabitacion->precio }}€">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="inputPassword4">Adelanto:</label>
                            <input type="text" class="form-control" name="abonado" id="txtadelanto" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Observación:</label>
                        <textarea class="form-control" id="txtobservacion" rows="3"></textarea>
                    </div>
                    <div class="form-row justify-content-end">
                        @csrf
                        <button type="submit" class="btn btn-primary w-25" id="btnregistrar">Registrar</button>
                        </form>
                    </div>
                </div>
                @if($reservaHabitacion->reservas->id)
                <div class="col-6">
                    <h5 class="card-title font-weight-bold text-primary">Detalle Acompañantes</h5>
                    <div class="form-group mb-2">
                        <label for="exampleFormControlSelect1">Acompañantes:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1">Nº Adultos:</label>
                                <input type="number" class="form-control" id="numAdultos" min="0"
                                    value="0">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleFormControlSelect1">Nº niños(Menores de < 12 años):</label>
                                        <input type="number" class="form-control" id="numNinos" min="0"
                                            value="0">
                            </div>
                            <div class="col-md-4 align-self-end">
                                <button id="btnRegistrarAcompanantes" class="btn btn-success" style="display:none;"
                                    data-toggle="modal" data-target="#RegistrarAcompanante">Registrar
                                    Acompañantes</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleFormControlSelect1">Informacion Acompañantes:</label>
                        <table id="tablaAcompanantes" class="table">
                            <thead>
                                <tr>
                                    <th>Nombre Completo</th>
                                    <th>Identificacion</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                    <!-- Otros campos de la tabla -->
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
    @include('Empleados.Cliente.modals.create')
    @include('Empleados.Acompanante.modals.create')
    <script>
        var capacidadMaxima =
            {{ $reservaHabitacion->tipoHabitacion->capacidad }}; // Obtén la capacidad máxima de la variable PHP

        var numAdultos = document.getElementById('numAdultos');
        var numNinos = document.getElementById('numNinos');

        numAdultos.addEventListener('input', validarCapacidad);
        numNinos.addEventListener('input', validarCapacidad);

        function validarCapacidad() {
            var adultos = parseInt(numAdultos.value);
            var ninos = parseInt(numNinos.value);

            if (adultos + ninos > capacidadMaxima) {
                if (this.id === 'numAdultos') {
                    numAdultos.value = capacidadMaxima - ninos;
                } else {
                    numNinos.value = capacidadMaxima - adultos;
                }
            }
            var btnRegistrarAcompanantes = document.getElementById('btnRegistrarAcompanantes');
            if (adultos > 0 || ninos > 0) {
                btnRegistrarAcompanantes.style.display = 'block'; // Mostrar el botón
            } else {
                btnRegistrarAcompanantes.style.display = 'none'; // Ocultar el botón
            }
        }
    </script>
@endsection
