<!--Modal para Crear Cliente-->
<div class="modal fade" id="myModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Caracteristica Habitacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('crearCaracteristicaHabitacion') }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion"
                                value="{{ old('descripcion') }}">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="tipoHabitacion" class="col-form-label">Tipo Habitacion:</label>
                            @if (count($tipoHabitaciones) > 0)
                                <select name="tipoHabitacion" class="form-control">
                                    @foreach ($tipoHabitaciones as $tipoHabitacion)
                                        <option value="{{ $tipoHabitacion->id }}">{{ $tipoHabitacion->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <p style="color: red">Sin Tipo de Habitacion disponible</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
