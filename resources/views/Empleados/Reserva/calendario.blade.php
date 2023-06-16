@extends('Empleados.layouts.template')
@section('title', 'Perfil')
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
    <div style="margin-bottom: 30px">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModalCreate" type="button">Registar
            Cliente</button>
    </div>
    <div id="calendar"></div>
    @include('Empleados.Cliente.modals.create')

    @include('Empleados.Reserva.modals.create', [
        'fechaLlegadaId' => 'fechaLlegada',
        'fechaSalidaId' => 'fechaSalida',
        'tipoHabitacionId' => 'tipoHabitacion',
    ])
    @include('Empleados.Reserva.modals.create')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var createModal = new bootstrap.Modal(document.getElementById('ReservaCreate'));
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'local',
                locale: 'es',
                initialView: 'dayGridMonth',
                events: @json($reservas),
                headerToolbar: {
                    left: 'prev next today',
                    center: 'title',
                    right: 'dayGridMonth timeGridWeek listWeek'
                },
                dateClick: function(info) {
                    var today = new Date();
                    today.setDate(today.getDate() - 1);
                    var clickedDate = info.date;
                    if (clickedDate >= today) {
                        clickedDate.setDate(clickedDate.getDate() + 1); // Sumar un día adicional
                        $('#fechaLlegada').val(clickedDate.toISOString().slice(0, 10)).prop(
                            'disabled', true);
                        $('#fechaLlegadaOculta').val(clickedDate.toISOString().slice(0, 10));
                        var fechaMinimaSalida = new Date(clickedDate);
                        fechaMinimaSalida.setDate(fechaMinimaSalida.getDate() + 1);

                        $('#fechaSalida').attr('min', fechaMinimaSalida.toISOString().slice(0, 10));
                        $('#fechaSalida').val('');
                        createModal.show();
                    }
                },
                eventClick: function(info) {
                    var reservaId = info.event.id;
                    var url = "{{ route('verReserva', ':id') }}";
                    url = url.replace(':id', reservaId);
                    window.location.href = url;
                }
            });
            calendar.render();
        });
    </script>
@endsection
