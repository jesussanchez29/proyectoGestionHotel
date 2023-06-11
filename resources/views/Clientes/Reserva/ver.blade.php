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
    <div class="container">
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


        @if (count($reservas) > 0)
            <div class="card mt-2 border-primary">
                @foreach ($reservas as $reserva)
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
                                        <input type="date" class="form-control" name="fechaLlegada" id="txtfechaentrada"
                                            readonly value="{{ $reserva->fechaLLegada }}">
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
                                                @if (count($reservas) > 0)
                                                    @foreach ($reservas as $reserva)
                                                        <tr>


                                                        </tr>
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
                @endforeach
            </div>
    </div>
    @endif
    </div>

@endsection

@section('contacto')
    <div class="pre-footer-contact uk-padding bg-img2 uk-position-relative">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">

            <div data-uk-grid class="uk-padding-remove-bottom uk-position-relative">
                <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-3@s">
                    <!-- address -->
                    <h5 class="uk-heading-line uk-margin-remove-bottom"><span>Dirección</span></h5>
                    <p class="impx-text-large uk-margin-top">{{ $hotel->direccion }}, {{ $hotel->ciudad }}</p>
                </div>
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s">
                    <!-- phone -->
                    <h5 class="uk-heading-line uk-margin-bottom"><span>Telefono</span></h5>
                    <p class="impx-text-large uk-margin-remove">+34 {{ $hotel->telefono }}</p>
                </div>
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s">
                    <!-- email -->
                    <h5 class="uk-heading-line uk-margin-bottom"><span>Email</span></h5>
                    <a href="mailt:#" class="impx-text-large">{{ $hotel->email }}</a>
                </div>
            </div>

        </div>
    </div>
@endsection
