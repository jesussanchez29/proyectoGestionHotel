<!--Modal para Crear Cliente-->
<div class="modal fade" id="myModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('crearDepartamento') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="icono" class="col-form-label">Icono:</label>
                            <input type="file" class="form-control-file" name="icono" value="{{ old('icono') }}" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-form-label">Descripcion:</label>
                            <textarea class="form-control" name="descripcion">{{ old('descripcion') }}</textarea>
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