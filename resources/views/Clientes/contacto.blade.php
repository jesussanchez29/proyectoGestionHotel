@extends('Clientes.layouts.template')
@section('content')

    @section('header')
    <div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-page-heading; animation: uk-animation-slide-top">
        @endsection

<div class="impx-page-heading uk-position-relative about">
    <div class="impx-overlay dark"></div>
    <div class="uk-container">
        <div class="uk-width-1-1">
            <div class="uk-flex uk-flex-left">
                <div class="uk-light uk-position-relative uk-text-left page-title">
                    <h1 class="uk-margin-remove">HTML</h1><!-- page title -->
                    <p class="impx-text-large uk-margin-remove">Elements</p><!-- page subtitle -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-md-5 mr-auto">
        <h2>Contact Us</h2>
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quaerat autem corrupti asperiores accusantium et fuga! Facere excepturi, quo eos, nobis doloremque dolor labore expedita illum iusto, aut repellat fuga!</p>

        <ul class="list-unstyled pl-md-5 mb-5">
          <li class="d-flex text-black mb-2">
            <span class="mr-3"><span class="icon-map"></span></span> 34 Street Name, City Name Here, <br> United States
          </li>
          <li class="d-flex text-black mb-2"><span class="mr-3"><span class="icon-phone"></span></span> +1 (222) 345 6789</li>
          <li class="d-flex text-black"><span class="mr-3"><span class="icon-envelope-o"></span></span> info@mywebsite.com </li>
        </ul>
      </div>

      <div class="col-md-6">
        <form class="mb-5" method="post" id="contactForm" name="contactForm">
          <div class="row">
            
            <div class="col-md-12 form-group">
              <label for="name" class="col-form-label">Name</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email" class="col-form-label">Email</label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 form-group">
              <label for="message" class="col-form-label">Message</label>
              <textarea class="form-control" name="message" id="message" cols="30" rows="7"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
              <span class="submitting"></span>
            </div>
          </div>
        </form>

        <div id="form-message-warning mt-4"></div> 
        <div id="form-message-success">
          Your message was sent, thank you!
        </div>
      </div>
    </div>
<div class="uk-padding">
    <div class="uk-container">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s uk-margin-medium-bottom">
                <h5>1/2</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pellentesque urna leo, vitae posuere dui accumsan in. Vestibulum vitae libero tristique, tincidunt justo sit amet, vestibulum erat. Duis volutpat suscipit vulputate. Maecenas eget iaculis tortor, eu varius lectus. Quisque eget turpis lectus</p>
            </div>
            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s uk-margin-medium-bottom">
                <h5>1/2</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pellentesque urna leo, vitae posuere dui accumsan in. Vestibulum vitae libero tristique, tincidunt justo sit amet, vestibulum erat. Duis volutpat suscipit vulputate. Maecenas eget iaculis tortor, eu varius lectus. Quisque eget turpis lectus</p>
            </div>
        </div>
    </div>
</div>

@endsection
