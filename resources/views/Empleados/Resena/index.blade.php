@extends('Empleados.layouts.template')
@section('title', 'Estado habitaciones')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de Reseñas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Puntuacion</th>
                            <th>Comentario</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Tipo Habitacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($resenas) > 0)
                            @foreach ($resenas as $resena)
                                <tr>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $resena->puntuacion)
                                                <img style="margin-right:2px" src="{{ asset('images/estrella.png') }}"
                                                    alt="">
                                            @else
                                                <img style="margin-right:2px" src="{{ asset('images/estrellaBlanca.png') }}"
                                                    alt="">
                                            @endif
                                        @endfor
                                    </td>
                                    <td>{{ $resena->comentario }}</td>
                                    @if ($resena->estado == 0)
                                        <td>Inactivo</td>
                                    @else
                                        <td>Activo</td>
                                    @endif
                                    <td>{{ $resena->usuario->email }}</td>
                                    <td>{{ $resena->tipoHabitacion->nombre }}</td>
                                    <td>
                                        <div class="columna">

                                            <form action="{{ route('cambiarEstadoResena', $resena->id) }}" method="POST">
                                                @csrf
                                                @if ($resena->estado == 0)
                                                    <input type='image' src="{{ asset('images/mostrarComentario.png') }}">
                                                @else
                                                    <input type='image' src="{{ asset('images/ocultarComentario.png') }}">
                                                @endif
                                            </form>
                                            <input type='image' data-toggle="modal"
                                                src="{{ asset('images/eliminar.png') }}"
                                                data-target="#myModalDelete{{ $resena->id }}">
                                        </div>

                                    </td>
                                </tr>
                                <!-- Modal borrar empleado -->
                                @include('Empleados.Resena.modals.delete')
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="vacio">No hay estados de habitaciones registrados</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        .columna {
            display: flex
        }

        .columna input[type="image"] {
            height: 35px;
            margin-right: 5px
        }
    </style>
@endsection
