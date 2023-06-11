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
                <form id="miFormulario" method="POST" action="">
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
                                                    <option value="{{ $cliente->id }}">{{ $cliente->tipoIdentificacion }} -
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
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="inputPassword4">Fecha Salida:</label>
                                    <input type="date" class="form-control" name="fechaSalida" id="fechaSalida">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="inputEmail4">Tipo Habitacion:</label>
                                    @if(count($tipoHabitaciones))
                                    <select name="tipoHabitacion" id="tipoHabitacion" class="form-control">
                                        @foreach ($tipoHabitaciones as $tipoHabitacion)
                                            <option value="{{ $tipoHabitacion->id }}">{{ $tipoHabitacion->nombre }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="inputPassword4">Habitaciones:</label>
                                    <select name="habitacion" id="habitacion" class="form-control" >
                                        <option value="">Selecionte tipo y fechas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="inputEmail4">Precio:</label>
                                    <input type="text" class="form-control" id="txtprecio" disabled>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="inputPassword4">Adelanto:</label>
                                    <input type="number" class="form-control" name="abonado" id="txtadelanto"
                                        value="0">
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



