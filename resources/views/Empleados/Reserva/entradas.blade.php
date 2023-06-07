@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 style="text-align: center">Vista Entradas</h1>
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="imagen" class="col-form-label">Selecionar Piso:</label>
                    @if (count($pisos) > 0)
                        <select class="form-control" id="cbopiso">
                            <option value="Todos" selected>Todos</option>
                            @foreach ($pisos as $piso)
                                <option value="{{ $piso->id }}">Piso {{ $piso->numero }}</option>
                            @endforeach
                        </select>
                    @else
                        <p>No hay pisos Disponibles</p>
                    @endif
                </div>
            </div>
            <hr />
            @if (count($habitaciones) > 0)
                <div class="row">
                    @foreach ($habitaciones as $habitacion)
                        <div class="col-xl-3 col-md-6 mb-4 habitacion-card" data-piso-id="{{ $habitacion->piso_id }}"
                            data-habitacion-num="{{ $habitacion->numero }}">
                            <div class="card border-danger rounded-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                Numero {{ $habitacion->numero }}
                                            </div>
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1 mt-1">
                                                Tipo: {{ $habitacion->tipoHabitacion->nombre }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-bed fa-2x text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex bg-danger align-items-center justify-content-between rounded-0">
                                    <a class="small text-white stretched-link text-uppercase font-weight-bold select-habitacion"
                                        href="{{ route('verCrearReservaEmpleado', $habitacion->id) }}">
                                        Ocupada
                                    </a>
                                    <div class="small text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Ninguna entrada prevista</p>
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Funcion que al selecionar el piso muestra todos las habitaciones de ese piso
        $('#cbopiso').on('change', function() {
            var selectedPiso = $(this).val();
            // Ocultamos todas las habitaciones
            $('.habitacion-card').hide();

            // Si la selecion es igual a todos
            if (selectedPiso === 'Todos') {
                // Mostrar todas las habitaciones
                $('.habitacion-card').show();
            } else {
                // Mostrar solo las habitaciones del piso seleccionado
                $('.habitacion-card[data-piso-id="' + selectedPiso + '"]').show();
            }
        });
    </script>
@endsection
