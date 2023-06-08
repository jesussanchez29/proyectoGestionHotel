@extends('Empleados.layouts.template')
@section('title', 'Perfil')
@section('content')
    <div id="calendar"></div>

    @include('Empleados.Reserva.modals.create')
    @include('Empleados.Cliente.modals.create')

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
                dateClick: function(info){
                    createModal.show();
                }
            });
            calendar.render();
        });
        </script>
@endsection
