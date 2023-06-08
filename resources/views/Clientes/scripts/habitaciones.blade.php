<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fechaLlegada').on('change', function() {
            var fechaLlegada = $(this).val();
            var fechaSalidaInput = $('#fechaSalida');
            var minFechaSalida = new Date(fechaLlegada);
            minFechaSalida.setDate(minFechaSalida.getDate() + 1);
            var minFechaSalidaString = minFechaSalida.toISOString().split('T')[0];
            fechaSalidaInput.attr('min', minFechaSalidaString);
            fechaSalidaInput.val('');
        });
    });

    $(document).ready(function() {
        $('#form-rooms-select, #fechaLlegada, #fechaSalida').on('change', function() {
            var tipoHabitacionId = $('#form-rooms-select').val();
            var fechaLlegada = $('#fechaLlegada').val();
            var fechaSalida = $('#fechaSalida').val();

            if (tipoHabitacionId && fechaLlegada && fechaSalida) {
                $.ajax({
                    url: "{{ route('getPisosDisponibles') }}",
                    type: "GET",
                    data: {
                        habitacion: tipoHabitacionId,
                        fechaEntrada: fechaLlegada,
                        fechaSalida: fechaSalida
                    },
                    success: function(response) {
                        $('#piso').empty().prop('disabled', false);
                        if (response.length > 0) {
                            $.each(response, function(key, value) {
                                $('#piso').append('<option value="' + value.pisoId +
                                    '">' +
                                    value.numero + '</option>');
                            });
                        } else {
                            $('#piso').append(
                                    '<option value="">No hay pisos disponibles</option>')
                                .prop('disabled', true);
                            $('#form-guest-select').append(
                                '<option value="0" selected>0</option>').prop(
                                'disabled', true);
                        }
                    },
                    error: function() {
                        console.log('Error al obtener los pisos disponibles.');
                    }
                });
                var capacity = $('#form-rooms-select option:selected').data('capacity');
                generateGuestOptions(capacity);
            }
        });

        function generateGuestOptions(capacity) {
            var guestSelect = $('#form-guest-select');
            guestSelect.empty();

            if (capacity === 1) {
                guestSelect.append('<option value="0" selected>0</option>');
            } else {
                for (var i = 0; i < capacity; i++) {
                    guestSelect.append('<option value="' + i + '">' + i + '</option>');
                }
                guestSelect.prop('disabled', false);
            }
        }
    });
</script>
