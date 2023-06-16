<!--Modal para Crear Cliente-->
<div class="modal fade" id="myModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('crearServicio') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="imagen" class="col-form-label">Imagen:</label>
                            <input type="file" class="form-control-file" name="imagen" value="{{ old('imagen') }}" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-form-label">Descripcion:</label>
                            <textarea class="form-control" name="descripcion">{{ old('descripcion') }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4 ml-auto">
                                <label for="horaApertura" class="col-form-label">Hora Apertura:</label>
                                <input type="time" class="form-control" name="horaInicio" value="{{ old('horaApertura') }}">
                            </div>
                            <div class="col-md-4 ml-auto">
                                <label for="horaCierre" class="col-form-label">Hora Cierre:</label>
                                <input type="time" class="form-control" name="horaFin"value="{{ old('horaCierre') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="precio" class="col-form-label">Precio:</label>
                                <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" step="any">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mx-auto">
                                <label for="duracion" class="col-form-label">Duracion:</label>
                                <input type="number" class="form-control" name="duracion" value="{{ old('duracion') }}">
                            </div>
                            <div class="col-md-4 mx-auto">
                                <label for="capacidad" class="col-form-label">Capacidad:</label>
                                <input type="number" class="form-control" name="capacidad" value="{{ old('capacidad') }}">
                            </div>
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