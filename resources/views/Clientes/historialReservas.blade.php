@extends('Clientes.layouts.template')

@section('header')
    @include('Clientes.layouts.header')
@endsection
@section('slider')
    <div class="impx-page-heading uk-position-relative blog">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">
            <div class="uk-width-1-1">
                <div class="uk-flex uk-flex-left">
                    <div class="uk-light uk-position-relative uk-text-left page-title">
                        <h1 class="uk-margin-remove">Historial Reservas</h1><!-- page title -->
                        <p class="impx-text-large uk-margin-remove">COnsulta tus reservas</p><!-- page subtitle -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="filter">
      <label for="month-select">Filtrar por mes:</label>
      <select id="month-select">
        <option value="0">Todos</option>
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        
        <!-- Otras opciones de meses... -->
      </select>
    </div>
    
    <div class="cards">
      <!-- Tarjetas de reserva -->
    </div>
  </div>
  <style>
    /* CSS */
.container {
  max-width: 800px;
  margin: 0 auto;
}

.filter {
  margin-bottom: 20px;
}

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

.card {
  border: 1px solid #ccc;
  padding: 10px;
}

  </style>
@endsection
