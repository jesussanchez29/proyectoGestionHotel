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
                    <input type="date" class="form-control" id="fechaLlegada" name="fechaLlegada"
                        min="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2">
                    <label for="fechaSalida" class="col-form-label">Fecha Salida:</label>
                    <input type="date" class="form-control" id="fechaSalida" name="fechaSalida"
                        min="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="button" class="btn btn-dark" id="limpiarBtn">Limpiar Campos</button>
                </div>
            </div>
            <hr />
            @if (count($habitaciones) > 0)
                <div class="row">
                    @foreach ($habitaciones as $habitacion)
                        <div class="col-xl-3 col-md-6 mb-4 habitacion-card" data-piso-id="{{ $habitacion->piso_id }}"
                            data-habitacion-num="{{ $habitacion->numero }}">
                            <div class="card border-{{ $habitacion->estado->clase }} rounded-0" id="border">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Numero {{ $habitacion->numero }}
                                            </div>
                                            <div class="text-xs font-weight-bold text-{{ $habitacion->estado->clase }} text-uppercase mb-1 mt-1 cambioEstado" id="texto">
                                                Tipo: {{ $habitacion->tipoHabitacion->nombre }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-bed fa-2x text-{{ $habitacion->estado->clase }}" id="fatexto"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex bg-{{ $habitacion->estado->clase }} align-items-center justify-content-between rounded-0" id="estado">
                                    <a class="small text-white stretched-link text-uppercase font-weight-bold select-habitacion"
                                        @if ($habitacion->estado->nombre == 'Ocupada') href="{{ route('verReserva', $habitacion->id) }}"
                                    @elseif($habitacion->estado->nombre == 'Disponible')
                                        href="{{ route('verCrearReservaEmpleado', $habitacion->id) }}" @endif>
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
        // Funcion para limpiar los campos
        document.getElementById('limpiarBtn').addEventListener('click', function() {
            // Limpiamos campos
            document.getElementById('fechaLlegada').value = '';
            document.getElementById('fechaSalida').value = '';
            document.getElementById('cbopiso').value = 'Todos';
            // Mostramos todas las habitaciones
            location.reload();

        });

        // Funcion que al selecionar el piso muestra todos las habitaciones de ese piso
        $('#cbopiso').on('change', function() {
            var selectedPiso = $(this).val();
            // Ocultamos todas las habitaciones
            $('.habitacion-card').hide();

            // Si la selecion es igual a todos
            if (selectedPiso === 'Todos') {
                // Mostrar todas las habitaciones
                $('.habitacion-card').show();
            } else {
                // Mostrar solo las habitaciones del piso seleccionado
                $('.habitacion-card[data-piso-id="' + selectedPiso + '"]').show();
            }
        });

        // Funcion para cuando se selecione unas fechas muestra las habitaciones disponibles de ese rango de fechas
        $(document).ready(function() {
            $('#fechaLlegada, #fechaSalida, #cbopiso').change(function() {
                // Llamar a la función que realiza la solicitud AJAX
                realizarSolicitudAjax();
            });
        });

        // Funcion que ahce todo el proceso d emostrar las habitaciones disponibles
        function realizarSolicitudAjax() {
            // Obtenemos valores
            var fechaLlegada = $('#fechaLlegada').val();
            var fechaSalida = $('#fechaSalida').val();
            var pisoSeleccionado = $('#cbopiso').val();

            // Realizar la solicitud AJAX utilizando jQuery
            $.ajax({
                url: "{{ route('obtenerHabitacionesDisponibles') }}",
                method: 'GET',
                data: {
                    fechaLlegada: fechaLlegada,
                    fechaSalida: fechaSalida,
                    piso: pisoSeleccionado
                },
                // Si todo hay ido correcto
                success: function(response) {
                    // Ocultamos todas las habitaciones
                    $('.habitacion-card').find('#estado');

                    // Iterar sobre los datos recibidos y mostrar solo las habitaciones disponibles
                    response.forEach(function(habitacion) {
                        var habitacionNumero = habitacion.numero;
                        $('.habitacion-card[data-habitacion-num="' + habitacionNumero + '"]').find(
                            '#estado').removeClass(function(index, className) {
                                return (className.match(/(^|\s)(bg-)\S+/g) || []).join(' ');
                        }).addClass('bg-success');
                        $('.habitacion-card[data-habitacion-num="' + habitacionNumero + '"]').find(
                            '#border').removeClass(function(index, className) {
                                return (className.match(/(^|\s)(border-)\S+/g) || []).join(' ');
                        }).addClass('border-success');
                        $('.habitacion-card[data-habitacion-num="' + habitacionNumero + '"]').find(
                            '#fatexto').removeClass(function(index, className) {
                                return (className.match(/(^|\s)(text-)\S+/g) || []).join(' ');
                        }).addClass('text-success');
                        $('.habitacion-card[data-habitacion-num="' + habitacionNumero + '"]').find(
                            '#texto').removeClass(function(index, className) {
                                return (className.match(/(^|\s)(text-)\S+/g) || []).join(' ');
                        }).addClass('text-success');
                    });
                },
                error: function(xhr, status, error) {}
            });
        }
    </script>
@endsection
