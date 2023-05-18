@extends('Clientes.layouts.template')
@section('title', 'Tipo de Habitaciones')
@if (!empty($hotel->direccion))
    @section('direccion', $hotel->direccion)
@endif

@if (!empty($hotel->ciudad))
    @section('ciudad', $hotel->ciudad)
@endif

@if (!empty($hotel->telefono))
    @section('telefono', $hotel->telefono)
@endif

@if (!empty($hotel->email))
    @section('email', $hotel->email)
@endif

@section('logo')
    @if (!empty($hotel->logo))
        <img src="{{ $hotel->logo }}" alt="Logo">
    @endif
@endsection