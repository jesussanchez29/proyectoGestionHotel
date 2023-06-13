<!--Modal para Editar Cliente-->
<div class="modal fade" id="myModalEdit{{ $reserva->idAcom }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Acompañante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('editarAcompanante', $reserva->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre"
                                    value="{{ $reserva->nombre }}">
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" name="apellidos"
                                    value="{{ $reserva->apellidos }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" name="fechaNacimiento"
                                    value="{{ $reserva->fechaNacimiento }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">Telefono:</label>
                                <input type="text" class="form-control" name="telefono"
                                    value="{{ $reserva->telefono }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">Tipo Identificacion:</label>
                                <select class="form-control" name="tipoIdentificacion">
                                    <option value="DNI"
                                        {{ $reserva->tipoIdentificacion == 'DNI' ? 'selected' : '' }}>DNI</option>
                                    <option value="Pasaporte"
                                        {{ $reserva->tipoIdentificacion == 'Pasaporte' ? 'selected' : '' }}>Pasaporte
                                    </option>
                                    <option value="Carnet conducir"
                                        {{ $reserva->tipoIdentificacion == 'Carnet conducir' ? 'selected' : '' }}>
                                        Carnet conducir</option>
                                </select>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Identificacion:</label>
                                <input type="text" class="form-control" name="identificacion"
                                    value="{{ $reserva->identificacion }}">
                            </div>
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