<!--Modal para Crear Cliente-->
<div class="modal fade" id="ReservaCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar Reserva</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="miFormulario" method="POST" action="{{ route('crearPiso') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="txtidcliente" value="0" />
                                <label for="exampleFormControlInput1">Cliente:</label>
                                <div class="input-group">
                                    @if (count($clientes) > 0)
                                        <select class="form-control" name="cliente">
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->tipoIdentificacion }} -
                                                    {{ $cliente->identificacion }} | {{ $cliente->nombre }}
                                                    {{ $cliente->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>No hay clientes registrados</p>
                                    @endif
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" id="registroCliente">
                                            <i class='fas fa-user-plus'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="inputEmail4">Fecha Entrada:</label>
                                <input type="date" class="form-control" name="fechaLlegada" id="txtfechaentrada">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="inputPassword4">Fecha Salida:</label>
                                <input type="date" class="form-control" name="fechaSalida" id="txtfechasalida">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-2">
                                <label for="inputEmail4">Precio:</label>
                                <input type="text" class="form-control" id="txtprecio" disabled="disabled">
                            </div>
                            <div class="form-group col-md-6 mb-2">
                                <label for="inputPassword4">Adelanto:</label>
                                <input type="text" class="form-control" name="abonado" id="txtadelanto" value="0">
                            </div>
                        </div>
                        <div style="display: none" id="formularioRegistro">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre"
                                        value="{{ old('nombre') }}">
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <label for="nombre" class="col-form-label">Apellidos:</label>
                                    <input type="text" class="form-control" name="apellidos"
                                        value="{{ old('apellidos') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ml-auto">
                                    <label for="nombre" class="col-form-label">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" name="fechaNacimiento"
                                        value="{{ old('fechaNacimiento') }}"
                                        min="{{ date('Y-m-d', strtotime('-120 years')) }}"
                                        max="{{ date('Y-m-d', strtotime('-18 years')) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-form-label">Tipo Identificacion:</label>
                                    <select class="form-control" name="tipoIdentificacion">
                                        <option value="DNI"
                                            {{ old('tipoIdentificacion') == 'DNI' ? 'selected' : '' }}>
                                            DNI</option>
                                        <option value="Pasaporte"
                                            {{ old('tipoIdentificacion') == 'Pasaporte' ? 'selected' : '' }}>Pasaporte
                                        </option>
                                        <option value="Carnet conducir"
                                            {{ old('tipoIdentificacion') == 'Carnet conducir' ? 'selected' : '' }}>
                                            Carnet
                                            conducir</option>
                                    </select>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <label for="nombre" class="col-form-label">Identificacion:</label>
                                    <input type="text" class="form-control" name="identificacion"
                                        value="{{ old('identificacion') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-form-label">Telefono:</label>
                                    <input type="text" class="form-control" name="telefono"
                                        value="{{ old('telefono') }}">
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <label for="nombre" class="col-form-label">Dirección:</label>
                                    <input type="text" class="form-control" name="direccion"
                                        value="{{ old('direccion') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnGuardar" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- JS de Bootstrap (requiere jQuery) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var iconoUsuario = document.getElementById('registroCliente');
        var formularioRegistro = document.getElementById('formularioRegistro');

        iconoUsuario.addEventListener('click', function() {
            formularioRegistro.style.display = 'block';
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
