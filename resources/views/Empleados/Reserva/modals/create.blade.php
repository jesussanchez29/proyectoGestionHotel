    <!--Modal para Crear Cliente-->
    <div class="modal fade" id="ReservaCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Reserva</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="miFormulario" method="POST" action="{{ route('crearReservaEmpleado') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="txtidcliente" value="0" />
                                    <label for="exampleFormControlInput1">Cliente:</label>
                                    <div class="input-group">
                                        @if (count($clientes) > 0)
                                            <select class="form-control" name="cliente">
                                                @foreach ($clientes as $cliente)
                                                    <option value="{{ $cliente->id }}">
                                                        {{ $cliente->tipoIdentificacion }} -
                                                        {{ $cliente->identificacion }} | {{ $cliente->nombre }}
                                                        {{ $cliente->apellidos }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <p>No hay clientes registrados</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="inputEmail4">Fecha Entrada:</label>
                                    <input type="date" class="form-control" name="fechaLlegada" id="fechaLlegada">
                                    <input type="hidden" name="fechaLlegadaOculta" id="fechaLlegadaOculta">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="inputPassword4">Fecha Salida:</label>
                                    <input type="date" class="form-control" name="fechaSalida" id="fechaSalida">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="inputEmail4">Tipo Habitacion:</label>
                                    @if (count($tipoHabitaciones))
                                        <select name="tipoHabitacion" id="tipoHabitacion" class="form-control">
                                            @foreach ($tipoHabitaciones as $tipoHabitacion)
                                                <option value="{{ $tipoHabitacion->id }}"
                                                    data-precio="{{ $tipoHabitacion->precio }}"
                                                    data-capacidad="{{ $tipoHabitacion->capacidad }}">
                                                    {{ $tipoHabitacion->nombre }}
                                                </option>
                                            @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="inputPassword4">Habitaciones:</label>
                                    <select name="habitacion" id="habitacion" class="form-control" disabled>
                                        <option value="">Selecionte tipo y fechas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="inputEmail4">Precio:</label>
                                    <input type="text" class="form-control" id="precio" disabled>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="inputPassword4">Capacidad:</label>
                                    <input type="number" class="form-control" name="capacidad" id="capacidad" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnGuardar" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
            // Asignar eventos de cambio a los campos relevantes
            $('#fechaLlegada, #fechaSalida, #tipoHabitacion').change(function() {
                // Obtener valores
                var fechaLlegada = $('#fechaLlegada').val();
                var fechaSalida = $('#fechaSalida').val();
                var tipoSeleccionado = $('#tipoHabitacion').val();

                // Verificar si ambos campos están seleccionados
                if (fechaLlegada && fechaSalida && tipoSeleccionado) {
                    realizarSolicitudAjax();
                }
            });

            // Función para realizar la solicitud AJAX y obtener habitaciones disponibles
            function realizarSolicitudAjax() {
                // Obtener valores
                var fechaLlegada = $('#fechaLlegada').val();
                var fechaSalida = $('#fechaSalida').val();
                var tipoSeleccionado = $('#tipoHabitacion').val();

                // Realizar la solicitud AJAX utilizando jQuery
                $.ajax({
                    url: "{{ route('obtenerHabitacionesDisponibles') }}",
                    method: 'GET',
                    data: {
                        fechaLlegada: fechaLlegada,
                        fechaSalida: fechaSalida,
                        tipoHabitacion: tipoSeleccionado
                    },
                    success: function(response) {
                        // Limpiar el select de habitaciones
                        $('#habitacion').empty();

                        var precio = $('#tipoHabitacion option:selected').data('precio');
                        $('#precio').val(precio);

                        var capacidad = $('#tipoHabitacion option:selected').data('capacidad');
                        $('#capacidad').val(capacidad);
                        // Agregar opciones al select de habitaciones
                        response.forEach(function(habitacion) {
                            var option = $('<option>').val(habitacion.habId).text(habitacion
                                .numero);
                            $('#habitacion').append(option);
                        });
                        $('#habitacion').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            }
        });
    </script>
