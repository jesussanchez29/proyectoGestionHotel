<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Obtener las fechas de inicio y fin de la reserva actual del usuario
    var fechaFin = "{{ Auth::user()->reservaActual()->fechaSalida }}";

    // Establecer los atributos min y max del campo de fecha utilizando jQuery
    $("#fecha").attr("max", fechaFin);

    $(document).ready(function() {
        // Evento para detectar cambios en la fecha o el tipo de servicio
        $('#fecha, #form-servicios-select').change(function() {
            // Obtener los valores seleccionados
            var fecha = $('#fecha').val();
            var servicioId = $('#form-servicios-select').val();

            // Realizar la petición AJAX para obtener las horas disponibles
            $.ajax({
                url: '{{ route('obtenerHorasDisponibles') }}',
                method: 'GET',
                data: {
                    fecha: fecha,
                    servicio: servicioId
                },
                success: function(response) {
                    if (response.length > 0) {
                        $('#horas-disponibles-container').empty();
                        response.forEach(function(hora) {
                            var cardHtml = "<div class='hour-card' name='hora' data-hora='" +
                                hora + "'>" + hora + "</div>";
                            $('#horas-disponibles-container').append(cardHtml);
                        });
                        $('#horas-disponibles-container').show();
                        $('#noDisponibilidad')
                            .hide(); // Mostrar el contenedor si hay disponibilidad
                    } else {
                        $('#horas-disponibles-container')
                            .hide(); // Ocultar el contenedor si no hay disponibilidad
                        $('#noDisponibilidad').html(
                            "<p>No hay disponibilidad en esta fecha y servicio.</<p>");
                        $('#noDisponibilidad')
                            .show(); // Mostrar el mensaje de no disponibilidad

                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
    // Evento para detectar clic en el botón de reserva
    $('#reservaServicio').click(function(e) {
        e.preventDefault();

        // Obtener la hora seleccionada
        var horaSeleccionada = $('#horas-disponibles-container .hour-card.selected').data('hora');

        // Asignar la hora al campo oculto del formulario
        $('input[name="hora"]').val(horaSeleccionada);

        // Enviar el formulario
        $('form.hora-disponible-form').submit();
    });

    // Evento para detectar clic en una hora disponible
    $(document).on('click', '#horas-disponibles-container .hour-card', function() {
        // Remover la clase 'selected' de todas las horas
        $('#horas-disponibles-container .hour-card').removeClass('selected');

        // Agregar la clase 'selected' a la hora seleccionada
        $(this).addClass('selected');
    });

    // Resto del código...
});
</script>