@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 style="text-align: center">Vista Recepcion</h1>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="imagen" class="col-form-label">Selecionar Piso:</label>
                    @if (count($pisos) > 0)
                        <select class="form-control" id="cbopiso">
                            <option value="Todos" selected>Todos</option>
                            @foreach ($pisos as $piso)
                                <option value="{{ $piso->id }}">Piso {{ $piso->numero }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay pisos Disponibles</p>
                    @endif
                </div>
                <div class="col-md-2 ml">
                    <label for="fechaLlegada" class="col-form-label">Fecha Llegada:</label>
                    <input type="date" class="form-control datepicker" id="fechaLlegada" name="fechaLlegada" min="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2">
                    <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                    <input type="date" class="form-control datepicker" id="fechaSalida" name="fechaSalida" min="{{ date('Y-m-d') }}">
                </div>
            </div>

            <hr />

            @if (count($habitaciones) > 0)
                <div class="row">
                    @foreach ($habitaciones as $habitacion)
                        <div class="col-xl-3 col-md-6 mb-4 habitacion-card"  data-piso-id="{{ $habitacion->piso_id }}">
                            <div class="card border-{{ $habitacion->estado->clase }} rounded-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Numero {{ $habitacion->numero }}
                                            </div>
                                            <div
                                                class="text-xs font-weight-bold text-{{ $habitacion->estado->clase }} text-uppercase mb-1 mt-1">
                                                Tipo: {{ $habitacion->tipoHabitacion->nombre }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-bed fa-2x text-{{ $habitacion->estado->clase }}"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex bg-{{ $habitacion->estado->clase }} align-items-center justify-content-between rounded-0">
                                    <a class="small text-white stretched-link text-uppercase font-weight-bold select-habitacion"
                                    @if($habitacion->estado->nombre == "Ocupada")
                                        href="{{ route('verReserva', $habitacion->id) }}"
                                    @elseif($habitacion->estado->nombre == "Disponible")
                                        href="{{ route('verCrearReservaEmpleado', $habitacion->id) }}"
                                    @endif
                                    >
                                        {{ $habitacion->estado->nombre }}
                                    </a>
                                    <div class="small text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No hay habitaciones registradas</p>
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cbopiso').on('change', function() {
                var selectedPiso = $(this).val();
                $('.habitacion-card').hide(); // Ocultar todas las habitaciones

                if (selectedPiso === 'Todos') {
                    $('.habitacion-card').show(); // Mostrar todas las habitaciones si se selecciona "Todos"
                } else {
                    $('.habitacion-card[data-piso-id="' + selectedPiso + '"]').show(); // Mostrar solo las habitaciones del piso seleccionado
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.datepicker').on('change', function() {
                var fechaLlegada = $('#fechaLlegada').val();
                var fechaSalida = $('#fechaSalida').val();
    
                // Realizar la llamada AJAX a la función obtenerHabitacionesDisponibles
                $.ajax({
                    url: '{{ route("obtenerHabitacionesDisponibles") }}',
                    method: 'GET',
                    data: {
                        fechaLlegada: fechaLlegada,
                        fechaSalida: fechaSalida
                    },
                    success: function(response) {
                        // Actualizar el contenido de las habitaciones disponibles en la vista
                        $('.habitacion-card').hide(); // Ocultar todas las habitaciones
                        $.each(response, function(index, habitacion) {
                            $('.habitacion-card[data-piso-id="' + habitacion.piso_id + '"]').show(); // Mostrar solo las habitaciones disponibles
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
