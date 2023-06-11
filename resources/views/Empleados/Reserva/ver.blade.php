@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
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
    <div class="card border-primary">
        <div class="card-body">
            <input type="hidden" value="{{ $reserva->id }}" id="txtidhabitacion" name="reserva" />
            <h5 class="card-title font-weight-bold text-primary">Detalles de la Habitación</h5>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Número:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label">{{ $reserva->habitacion->numero }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Caracteristicas:</label>
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
                            <label class="col-form-label">{{ $reserva->habitacion->tipoHabitacion->capacidad }}</label>
                            <input type="hidden" id="txtidcliente" value="0" />
                            <input type="hidden" id="txtcapacidad"
                                value="{{ $reserva->habitacion->tipoHabitacion->capacidad }}" />

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Categoria:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label">{{ $reserva->habitacion->tipoHabitacion->nombre }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Piso:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label">{{ $reserva->habitacion->piso->numero }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Precio:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label">{{ $reserva->habitacion->tipoHabitacion->precio }}
                                €/NOCHE</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2 border-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h5 class="card-title font-weight-bold text-primary">Detalle Reserva</h5>
                    <input type="hidden" id="txtidcliente" value="0" />
                    <div class="form-group mb-2">
                        <label for="exampleFormControlInput1">Cliente:</label>
                        <div class="input-group">
                            <input type="text" class="form-control"
                                value="{{ $reserva->usuario->cliente->tipoIdentificacion }} - {{ $reserva->usuario->cliente->identificacion }} | {{ $reserva->usuario->cliente->nombre }} {{ $reserva->usuario->cliente->apellidos }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="inputEmail4">Fecha Entrada:</label>
                            <input type="date" class="form-control" name="fechaLlegada" id="txtfechaentrada" readonly
                                value="{{ $reserva->fechaLLegada }}">
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="inputPassword4">Fecha Salida:</label>
                            <input type="date" class="form-control" name="fechaSalida" id="txtfechasalida"
                                value="{{ $reserva->fechaSalida }}">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div style="float: right; margin-bottom:5px">
                        <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#RegistrarAcompanante"><i class="fa fa-user" aria-hidden="true"></i>
                            Registrar</button>
                    </div>
                    <h5 class="card-title font-weight-bold text-primary">Detalle Acompañantes</h5>
                    <div class="form-group mb-2">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre Completo</th>
                                        <th>Identificacion</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Telefono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($acompanantes) > 0)
                                        @foreach ($acompanantes as $acompanante)
                                            <tr>
                                                <td>{{ $acompanante->nombre }} {{ $acompanante->apellidos }}</td>
                                                <td>{{ $acompanante->tipoIdentificacion }}-{{ $acompanante->identificacion }}
                                                </td>
                                                <td>{{ $acompanante->fechaNacimiento }}</td>
                                                <td>{{ $acompanante->telefono }}</td>
                                                <td>
                                                    <input type='image' data-toggle="modal"
                                                        src="{{ asset('images/editar.png') }}"
                                                        data-target="#myModalEdit{{ $acompanante->id }}"
                                                        style="width: 45%">
                                                    <input type='image' data-toggle="modal"
                                                        src="{{ asset('images/eliminar.png') }}"
                                                        data-target="#myModalDelete{{ $acompanante->id }}"
                                                        style="width: 45%">
                                                </td>
                                            </tr>

                                            @include('Empleados.Acompanante.modals.edit')
                                            @include('Empleados.Acompanante.modals.delete')
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">No hay acompañates registrados</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $totalServicios = 0;
    @endphp


    <div class="card border-primary" style="margin-top: 10px">
        <div class="card-body">
            <div style="float: right; margin-bottom:5px">
                <form action="{{ route('obtenerFactura', $reserva->id) }}" method="POST">
                    @csrf
                    <button id="btnNuevo" type="submit" class="btn btn-success"><i class="fa fa-download"
                            aria-hidden="true"></i> Obtener Factura</button>
                </form>
            </div>
            <h5 class="card-title font-weight-bold text-primary">Detalles Factura</h5>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1">Servicios obtenidos:</label>
                    <div class="form-group mb-2">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($servicios) > 0)
                                        @foreach ($servicios as $Reservaservicio)
                                            <tr>
                                                <td>{{ $Reservaservicio->servicio->nombre }}</td>
                                                <td>{{ $Reservaservicio->servicio->precio }}</td>
                                                <td>{{ $Reservaservicio->fecha }}</td>
                                                <td>{{ $Reservaservicio->hora }}</td>
                                            </tr>
                                            @php
                                                $totalServicios += $Reservaservicio->servicio->precio;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">Sin servicios obtenidos</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @php
                    $fechaInicio = new DateTime($reserva->fechaLLegada);
                    $fechaFin = new DateTime($reserva->fechaSalida);
                    $intervalo = $fechaInicio->diff($fechaFin);
                    $numeroDias = $intervalo->days;
                @endphp

                <div class="col-6">
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Total Reserva:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label">{{ $reserva->habitacion->tipoHabitacion->precio * $numeroDias }}
                                €</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Total Servcios:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label">{{ $totalServicios }} €</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Total A pagar:</label>
                        <div class="col-sm-8">
                            <label class="col-form-label"
                                id="totalPagar">{{ $reserva->habitacion->tipoHabitacion->precio * $numeroDias + $totalServicios }}
                                €</label>
                        </div>
                    </div>
                    <form action="{{ route('ReservaActualizarPagoReserva', $reserva->id) }}" method="POST">
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Pagado:</label>
                            <div class="col-sm-4">
                                <input type="number" step="0.1" class="form-control" name="abonado" id="abonado"
                                    value="{{ $reserva->abonado }}">
                            </div>
                        </div>
                        @csrf
                        <button style="margin-top: 5px" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('Empleados.Cliente.modals.create')
    @include('Empleados.Acompanante.modals.create')
    <script>
        // Obtener el valor de la capacidad máxima
        var capacidadMaxima = parseInt(document.getElementById('txtcapacidad').value);

        // Obtener el número actual de acompañantes
        var numeroAcompanantes = {{ count($acompanantes) }};

        numeroAcompanantes += 1;
        // Deshabilitar el botón de registrar si se alcanza la capacidad máxima
        if (numeroAcompanantes >= capacidadMaxima) {
            document.getElementById('btnNuevo').disabled = true;
        }
    </script>
    <script>
        // Obtener el elemento del campo de entrada
        const abonadoInput = document.getElementById('abonado');

        // Obtener el elemento del total a pagar
        const totalPagarLabel = document.getElementById('totalPagar');

        const simboloEuro = '€';
        // Obtener el valor original del total a pagar
        const totalPagar = parseFloat(totalPagarLabel.textContent);

        // Escuchar el evento 'input' en el campo de entrada
        abonadoInput.addEventListener('input', function() {
            // Obtener el valor del abono ingresado
            const abonado = parseFloat(abonadoInput.value);

            // Calcular el nuevo total a pagar restando el abono
            const nuevoTotal = totalPagar - abonado;

            // Actualizar el texto del total a pagar
            totalPagarLabel.textContent = nuevoTotal.toFixed(2) + " " + simboloEuro;
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#txtfechasalida').change(function() {
                var fechaSalida = $(this).val();

                $.ajax({
                    url: "{{ route('ReservactualizarFechaSalida', $reserva->id) }}",
                    method: 'GET',
                    data: {
                        fechaSalida: fechaSalida
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        // Manejo de errores en caso de fallo en la actualización
                    }
                });
            });
        });
    </script>
@endsection
