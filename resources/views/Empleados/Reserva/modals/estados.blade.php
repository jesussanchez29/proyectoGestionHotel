<!--Modal para Crear Cliente-->
<div class="modal fade" id="habitacionEstado{{$habitacion->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CambiarEstado</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('cambiarEstadoHabitacion', $habitacion->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div style="display: inline">
                            <button class="estado-btn bg-success" type="submit" name="estado"
                                value="disponible">Disponible</button>
                            <button class="estado-btn bg-danger" type="submit" name="estado"
                                value="ocupada">Ocupada</button>
                            <button class="estado-btn bg-info" type="submit" name="estado"
                                value="limpieza">Limpieza</button>
                            <button class="estado-btn bg-warning" type="submit" name="estado"
                                value="mantenimiento">Mantenimiento</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
    </div>
</div>
