<!-- Modal para Confirmar Borrado -->
<div class="modal fade" id="myModalDelete{{ $resena->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Estado haitacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('eliminarResena', $resena->id) }}">
                @csrf
                <div class="modal-body">
                   Vas a eliminar una reseña de un tipo de habitacion ¿Estás seguro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>