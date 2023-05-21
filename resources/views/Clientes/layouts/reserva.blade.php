<div class="uk-margin-medium-bottom uk-margin-medium-top">
    <div class="impx-hp-booking-form impx-margin-top-small">
        <h6 class="uk-heading-line uk-text-center uk-margin-small-bottom impx-text-white"><span>Formulario
                de Reserva</span></h6>
        <form class="uk-child-width-1-6@xl uk-child-width-1-6@l uk-child-width-1-6@m uk-child-width-1-3@s uk-grid-medium"
            data-uk-grid>
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label  impx-text-white">Email</label>
                    <span class="uk-form-icon" data-uk-icon="icon: mail"></span>
                    <input class="uk-input booking-email uk-border-rounded uk-width-1-1" type="text"
                        placeholder="your e-mail">
                </div>
            </div>
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label impx-text-white">Arrival</label>
                    <span class="uk-form-icon" data-uk-icon=""></span>
                    <input class="uk-input uk-border-rounded" type="date" placeholder="m/dd/yyyy">
                </div>
            </div>
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label impx-text-white">Departure</label>
                    <span class="uk-form-icon" data-uk-icon=""></span>
                    <input class="uk-input uk-border-rounded" type="date" placeholder="m/dd/yyyy">
                </div>
            </div>
            <div class="uk-form-controls uk-position-relative">
                <label class="uk-form-label impx-text-white" for="form-rooms-select">Rooms</label>
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
                <label class="uk-form-label impx-text-white" for="form-guest-select">Guest</label>
                <span class="uk-form-icon select-icon" data-uk-icon="icon: users"></span>
                @if (count($tipoHabitaciones) > 0)
                    <select class="uk-select uk-border-rounded" id="form-guest-select">
                    </select>
                @endif
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
    }
</script>
