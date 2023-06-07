@extends('Clientes.layouts.template')

@section('header')
    @include('Clientes.layouts.header')
@endsection
@section('slider')
    <div class="impx-page-heading uk-position-relative about">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Perfil</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">Modifica tu perfil</p><!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <table>
        @foreach ($reservas as $reserva)
            {{ $reserva->id }}
        @endforeach
    </table>

@endsection