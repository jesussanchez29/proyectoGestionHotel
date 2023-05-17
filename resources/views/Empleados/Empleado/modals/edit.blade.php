<!--Modal para Editar Cliente-->
<div class="modal fade" id="myModalEdit{{ $empleado->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('editarEmpleado', $empleado->id) }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre"
                                    value="{{ $empleado->nombre }}">
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" name="apellidos"
                                    value="{{ $empleado->apellidos }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" name="fechaNacimiento"
                                    value="{{ $empleado->fechaNacimiento }}"
                                    min="{{ date('Y-m-d', strtotime('-120 years')) }}"
                                    max="{{ date('Y-m-d', strtotime('-18 years')) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" name="email"
                                    value="{{ $empleado->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">DNI:</label>
                                <input type="text" class="form-control" name="dni" value="{{ $empleado->dni }}">
                            </div>
                            <div class="col-md-6">
                                <label for="nombre" class="col-form-label">Telefono:</label>
                                <input type="text" class="form-control" name="telefono"
                                    value="{{ $empleado->telefono }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" name="direccion"
                                    value="{{ $empleado->direccion }}">
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="nombre" class="col-form-label">Departamento:</label>
                                @if (count($departamentos) > 0)
                                    <select name="departamento" id="" class="form-control">
                                        @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}"
                                                {{ $departamento->id == $empleado->departamento_id ? 'selected' : '' }}>
                                                {{ $departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <p style="color: red">Sin departamento</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="estado" class="col-form-label">Estado:</label>
                                <select name="estado" id="" class="form-control">
                                    <option value="0" {{ $departamento->estado == 0 ? 'selected' : ''  }}>Inactivo</option>
                                    <option value="1" {{ $departamento->estado == 1 ? 'selected' : ''  }}>Activo</option>
                                </select>
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
