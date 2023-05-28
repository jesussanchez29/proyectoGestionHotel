<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form-rooms-select').on('change', function() {
            var capacity = $(this).find('option:selected').data('capacity');
            generateGuestOptions(capacity);
        });

        function generateGuestOptions(capacity) {
            var guestSelect = $('#form-guest-select');
            guestSelect.empty();

            if (capacity === 1) {
                guestSelect.append('<option value="0" selected>Sin acompañante</option>');
                guestSelect.prop('disabled', true);
            } else {
                guestSelect.append('<option value="" selected>Selecciona acompañante</option>');
                for (var i = 1; i <= capacity; i++) {
                    guestSelect.append('<option value="' + i + '">' + i + '</option>');
                }
                guestSelect.prop('disabled', false);
            }
        }
    });
</script>
<script>
    //Muestras pisos disponibles para el tipo de habitacion selecionado
    $(document).ready(function() {
        $('#form-rooms-select').on('change', function() {
            var tipoHabitacionId = $(this).val();
            if (tipoHabitacionId) {
                $.ajax({
                    url: "{{ route('getPisosDisponibles') }}",
                    type: "GET",
                    data: {
                        habitacion: tipoHabitacionId
                    },
                    success: function(response) {
                        $('#piso').empty().prop('disabled', false);
                        if (response.length > 0) {
                            $.each(response, function(key, value) {
                                $('#piso').append('<option value="' + value.pisoId + '">' +
                                    value.numero + '</option>');
                            });
                        } else {
                            $('#piso').append(
                                    '<option value="">No hay pisos disponibles</option>')
                                .prop('disabled', true);
                        }
                    },
                    error: function() {
                        console.log('Error al obtener los pisos disponibles.');
                    }
                });
            } else {
                $('#piso').empty().prop('disabled', true);
            }
        });
    });
</script>
