<div class="uk-margin-medium-bottom uk-margin-medium-top">
    <div class="impx-hp-booking-form impx-margin-top-small">
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
        <h6 class="uk-heading-line uk-text-center uk-margin-small-bottom impx-text-white"><span>Formulario
                de Reserva</span></h6>
        <form method="POST" action="{{ route('crearReservaCliente') }}" aclass="uk-child-width-1-6@xl uk-child-width-1-6@l uk-child-width-1-6@m uk-child-width-1-3@s uk-grid-medium"
            data-uk-grid>
            @csrf
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label impx-text-white">Fecha Llegada</label>
                    <span class="uk-form-icon" data-uk-icon=""></span>
                    <input class="uk-input uk-border-rounded" type="date" placeholder="m/dd/yyyy" name="fechaLlegada">
                </div>
            </div>
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label impx-text-white">Fecha Salida</label>
                    <span class="uk-form-icon" data-uk-icon=""></span>
                    <input class="uk-input uk-border-rounded" type="date" placeholder="m/dd/yyyy" name="fechaSalida">
                </div>
            </div>
            <div class="uk-form-controls uk-position-relative">
                <label class="uk-form-label impx-text-white" for="form-rooms-select">Tipo Habitacion</label>
                <span class="uk-form-icon select-icon" data-uk-icon="icon: album"></span>
                @if (count($tipoHabitaciones) > 0)
                    <select class="uk-select uk-border-rounded" id="form-rooms-select" name="habitacion">
                        @foreach ($tipoHabitaciones as $tipoHabitacion)
                            <option value="{{ $tipoHabitacion->id }}" data-capacity="{{ $tipoHabitacion->capacidad }}">
                                {{ $tipoHabitacion->nombre }}</option>
                        @endforeach
                    </select>
                @else
                    <p class="vacio">Sin Habitaciones disponibles</p>
                @endif
            </div>
            <div class="uk-form-controls uk-position-relative">
                <label class="uk-form-label impx-text-white" for="form-guest-select">Acompañantes</label>
                <span class="uk-form-icon select-icon" data-uk-icon="icon: users"></span>
                    <select class="uk-select uk-border-rounded" id="form-guest-select" disabled>
                        <option value="">Selecciona habitación</option>
                    </select>
            </div>
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label  impx-text-white">Piso</label>
                    <span class="uk-form-icon" data-uk-icon="icon: home"></span>
                    <select class="uk-select uk-border-rounded" id="piso" name="piso_id" disabled>
                        <option value="">Selecciona habitación</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="uk-form-label empty-label">&nbsp;</label>
                <button class="uk-button uk-width-1-1">¡Reservar Ahora!</button>
            </div>
        </form>
    </div>
</div>
<script>
    var roomsSelect = document.getElementById('form-rooms-select');
    var guestSelect = document.getElementById('form-guest-select');

    roomsSelect.addEventListener('change', function() {
        var selectedCapacity = this.options[this.selectedIndex].getAttribute('data-capacity');
        generateGuestOptions(selectedCapacity);
    });

    function generateGuestOptions(capacity) {
        guestSelect.innerHTML = '';

        for (var i = 1; i < capacity; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.text = i;
            guestSelect.appendChild(option);
        }
        guestSelect.disabled = false; // Habilitar el elemento select
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                $('#piso').append('<option value="' + key + '">' + value + '</option>');
                            });
                        } else {
                            $('#piso').append('<option value="">No hay pisos disponibles</option>').prop('disabled', true);
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