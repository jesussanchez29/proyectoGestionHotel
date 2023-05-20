<!--Modal para Editar Cliente-->
<div class="modal fade" id="myModalEdit{{ $tipoHabitacion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('editarTipoHabitacion', $tipoHabitacion->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="imagen" class="col-form-label">Imagen(Opcional):</label>
                            <input type="file" class="form-control-file" name="imagen" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ $tipoHabitacion->nombre }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-form-label">Descripcion:</label>
                            <textarea class="form-control" name="descripcion">{{ $tipoHabitacion->descripcion }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="capacidad" class="col-form-label">Capacidad:</label>
                            <input type="number" class="form-control" name="capacidad" value="{{ $tipoHabitacion->capacidad }}">
                        </div>
                        <div class="form-group">
                            <label for="precio" class="col-form-label">Precio:</label>
                            <input type="number" step="any" class="form-control" name="precio" value="{{ $tipoHabitacion->precio }}">
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