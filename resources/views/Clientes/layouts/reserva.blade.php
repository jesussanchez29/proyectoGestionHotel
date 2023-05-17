<div class="uk-margin-medium-bottom uk-margin-medium-top">
    <div class="impx-hp-booking-form impx-margin-top-small">
        <h6 class="uk-heading-line uk-text-center uk-margin-small-bottom impx-text-white"><span>Formulario
                de Reserva</span></h6>
        <form
            class="uk-child-width-1-6@xl uk-child-width-1-6@l uk-child-width-1-6@m uk-child-width-1-3@s uk-grid-medium"
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
                    <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                    <input class="uk-input booking-arrival uk-border-rounded" type="text"
                        placeholder="m/dd/yyyy">
                </div>
            </div>
            <div class="uk-form-controls">
                <div class="uk-inline">
                    <label class="uk-form-label impx-text-white">Departure</label>
                    <span class="uk-form-icon" data-uk-icon="icon: calendar"></span>
                    <input class="uk-input booking-departure uk-border-rounded" type="text"
                        placeholder="m/dd/yyyy">
                </div>
            </div>
            <div class="uk-form-controls uk-position-relative">
                <label class="uk-form-label impx-text-white" for="form-guest-select">Guest</label>
                <span class="uk-form-icon select-icon" data-uk-icon="icon: users"></span>
                <select class="uk-select uk-border-rounded" id="form-guest-select">
                    <option value="">Please select...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="uk-form-controls uk-position-relative">
                <label class="uk-form-label impx-text-white" for="form-rooms-select">Rooms</label>
                <span class="uk-form-icon select-icon" data-uk-icon="icon: album"></span>
                <select class="uk-select uk-border-rounded" id="form-rooms-select">
                    <option value="">Please select...</option>
                    <option value="room_1">Single</option>
                    <option value="room_2">Double</option>
                    <option value="room_3">Primier</option>
                    <option value="room_4">Deluxe</option>
                </select>
            </div>
            <div>
                <label class="uk-form-label empty-label">&nbsp;</label>
                <button class="uk-button uk-width-1-1">Book Now!</button>
            </div>
        </form>
    </div>
</div>