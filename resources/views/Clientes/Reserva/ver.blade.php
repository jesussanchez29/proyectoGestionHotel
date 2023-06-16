@extends('Clientes.layouts.template')
@section('title', 'Perfil')

@section('header')
    @include('Clientes.layouts.header')
@endsection

@section('slider')
    <!-- PAGE HEADING -->
    <div class="impx-page-heading uk-position-relative rooms">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Historial reservas</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Obsera todas tus reservas</p>
                        <!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE HEADING END -->
@endsection

@section('content')
@php
use Carbon\Carbon;
@endphp
    <div class="container" style="margin-top: 50px;margin-bottom:50px;">
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
                <h5 class="card-title font-weight-bold text-primary">Detalles de la Reserva</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <input type="hidden" value="{{ $reserva->id }}" id="txtidhabitacion" name="reserva" />
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Número
                                Habitación:</label>
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
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Fecha LLegada:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ date('d-m-Y', strtotime($reserva->fechaLLegada)) }}
                                </label>
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
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Fecha Salida:</label>
                            <div class="col-sm-8">
                                <label class="col-form-label">{{ date('d-m-Y', strtotime($reserva->fechaSalida)) }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-2 border-primary">
            <div class="card-body">
                <div class="row align-items-center justify-content-center">
                    <div class="col-6">
                        @if ($reserva->habitacion->tipoHabitacion->capacidad > (count($reserva->acompanante) + 1) && $reserva->estado == 1 && Carbon::parse($reserva->fechaLLegada)->format('Y-m-d') <= now()->format('Y-m-d'))
                            <div style="float: right; margin-bottom:5px">
                                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#RegistrarAcompanante"><i class="fa fa-user" aria-hidden="true"></i>
                                    Registrar</button>
                                </div>
                                @endif
                        <h5 class="card-title font-weight-bold text-primary">Detalle Acompañantes</h5>
                        <div class="form-group mb-2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre Completo</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Identificacion</th>
                                            <th>Telefono</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($reserva->acompanante) > 0)
                                        @foreach ($reserva->acompanante as $acompanante)
                                            <tr>
                                                <td>{{ $acompanante->nombre }} {{ $acompanante->apellidos }}</td>
                                                <td>{{ $acompanante->fechaNacimiento }}</td>
                                                <td>{{ $acompanante->tipoIdentificacion ?? '' }}
                                                    {{ $acompanante->identificacion ?? '' }}</td>
                                                <td>{{ $acompanante->telefono }}</td>
                                                @if (Carbon::parse($reserva->fechaLLegada)->format('Y-m-d') <= now()->format('Y-m-d'))
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
                                                @endif
                                            </tr>
                                            @include('Clientes.Acompanante.modals.edit', [
                                                'acompanante' => $acompanante,
                                            ])
                                            @include('Clientes.Acompanante.modals.delete', [
                                                'acompanante' => $acompanante,
                                            ])
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="4">Sin acompañantes registrados</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @php
                        $totalServicios = 0;
                    @endphp
                    <div class="col-6">
                        <h5 class="card-title font-weight-bold text-primary">Detalle Servicios</h5>
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

                    <div class="col-6" style="margin:auto">
                        
                        <h5 class="card-title font-weight-bold text-primary">Detalle Factura</h5>
                        <div style="float: right; margin-bottom:5px">
                            <form action="{{ route('obtenerFactura', $reserva->id) }}" method="POST">
                                @csrf
                                <button id="btnNuevo" type="submit" class="btn btn-success"><i class="fa fa-download"
                                        aria-hidden="true"></i> Obtener Factura</button>
                            </form>
                        </div>
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Total Reserva:</label>
                            <div class="col-sm-8">
                                <label
                                    class="col-form-label">{{ $reserva->habitacion->tipoHabitacion->precio * $numeroDias }}
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
                        <div class="row">
                            <label for="staticEmail" class="col-4 col-form-label font-weight-bold">Pagado:</label>
                            <div class="col-sm-4">
                                <label class="col-form-label">{{ $reserva->abonado }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px">
            <form action="{{ route('cambiarEstadoReserva', $reserva->id) }}" method="POST">
                @csrf
                @if ($reserva->estado == 1 && $puedeCancelar)
                <button type="submit" class="btn btn-danger">Cancelar Reserva</button>
                @endif
            </form>
        </div>
    </div>

    @include('Clientes.Acompanante.modals.create')
@endsection
