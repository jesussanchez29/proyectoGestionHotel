<!--Modal para Editar Cliente-->
<div class="modal fade" id="myModalEdit{{ $habitacion->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar piso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('editarHabitacion', $habitacion->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Numero:</label>
                            <input type="number" class="form-control" name="numero" value="{{ $habitacion->numero }}">
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Estado:</label>
                            @if (count($estados) > 0)
                                <select name="estadoHabitacion" class="form-control">
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" {{ $habitacion->estadoHabitacion_id == $estado->id ? 'selected' : ''  }}>{{ $estado->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <p style="color: red">Sin Estado disponible</p>
                            @endif
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="piso" class="col-form-label">Piso:</label>
                            @if (count($pisos) > 0)
                                <select name="piso" class="form-control">
                                    @foreach ($pisos as $piso)
                                        <option value="{{ $piso->id }}" {{ $habitacion->piso_id == $piso->id ? 'selected' : ''  }}>{{ $piso->numero }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <p style="color: red">Sin Pisos disponible</p>
                            @endif
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="numero" class="col-form-label">Tipo Habitacion:</label>
                            @if (count($tipoHabitaciones) > 0)
                                <select name="tipoHabitacion" class="form-control">
                                    @foreach ($tipoHabitaciones as $tipoHabitacion)
                                        <option value="{{ $tipoHabitacion->id }}" {{ $habitacion->tipoHabitacion_id == $tipoHabitacion->id ? 'selected' : ''  }}>{{ $tipoHabitacion->nombre }}
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
