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
                        <h1 class="uk-margin-remove">Historial de reservas</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Observa todas tus reservas</p>
                        <!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE HEADING END -->
@endsection

@section('content')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
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

        <div class="card-container">
            @foreach ($reservas as $reserva)
                <div class="reservation-card">
                    <div class="reservation-info">
                        <h3 class="reservation-title">Reserva Nº {{ $reserva->reserId }}</h3>
                        <p class="reservation-dates">Fecha de llegada: {{ $reserva->fechaLLegada }}</p>
                        <p class="reservation-dates">Fecha de salida: {{ $reserva->fechaSalida }}</p>
                        <p class="reservation-employee">Empleado encargado:
                            @if ($reserva->empleado)
                                {{ $reserva->empleado->nombre }} {{ $reserva->empleado->apellidos }}
                            @else
                                Sin asignar
                            @endif
                        </p>                        
                        <div class="reservation-state">
                            @if($reserva->estado == 0)
                            <span class="reservation-state-label-false">Finalizada</span>

                            @else
                            <span class="reservation-state-label-true">Activa</span>
                            @endif
                        </div>
                    </div>
                    <div class="reservation-actions">
                        <a href="{{ route('verReservaCliente', $reserva->reserId) }}" class="reservation-link">Ver detalles</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('Clientes.Acompanante.modals.create')

    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .reservation-card {
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .reservation-info {            
            padding: 20px 20px 0px 20px;
        }

        .reservation-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .reservation-dates,
        .reservation-employee {
            color: #888;
            margin: 0;
        }

        .reservation-state {
            padding: 15px;
            text-align: center;
        }

        .reservation-state-label-false {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: red;
        }

        .reservation-state-label-true {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background-color: #27ae60;
        }

        .reservation-actions {
            padding: 15px;
            text-align: center;
        }

        .reservation-link {
            text-decoration: none;
            color: #555;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }

        .reservation-link:hover {
            background-color: #ebebeb;
        }
    </style>
@endsection
