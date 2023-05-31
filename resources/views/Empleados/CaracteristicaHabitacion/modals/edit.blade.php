<!--Modal para Editar Cliente-->
<div class="modal fade" id="myModalEdit{{ $caracteristica->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Caracteristica Habitacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('editarCaracteristicaHabitacion', $caracteristica->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $caracteristica->nombre }}">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" name="descripcion"
                                value="{{ $caracteristica->descripcion }}">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="tipoHabitacion" class="col-form-label">Tipo Habitacion:</label>
                            @if (count($tipoHabitaciones) > 0)
                                <select name="tipoHabitacion" class="form-control">
                                    @foreach ($tipoHabitaciones as $tipoHabitacion)
                                        <option value="{{ $tipoHabitacion->id }}" {{ $caracteristica->tipoHabitacion_id == $tipoHabitacion->id ? 'selected' : ''  }}>{{ $tipoHabitacion->nombre }}
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
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>