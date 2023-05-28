<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form-rooms-select').on('change', function() {
            var capacity = $(this).find('option:selected').data('capacity');
            generateGuestOptions(capacity);
        });

        function generateGuestOptions(capacity) {
            var guestSelect = $('#form-guest-select');
            var pisoSelect = $('#piso');
            guestSelect.empty();

            if (capacity === 1) {
                guestSelect.append('<option value="0" selected>0</option>');
                guestSelect.prop('disabled', true);
            } else {
                for (var i = 0; i < capacity; i++) {
                    guestSelect.append('<option value="' + i + '">' + i + '</option>');
                }
                guestSelect.prop('disabled', false);
            }
            if (pisoSelect.find('option').length === 0) {
                pisoSelect.append('<option value="">No hay pisos disponibles</option>').prop('disabled', true);
                guestSelect.empty().prop('disabled', true);
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
                        $('#form-guest-select').prop('disabled', false);
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
                                $('#form-guest-select').append('<option value="">0</option>')
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
