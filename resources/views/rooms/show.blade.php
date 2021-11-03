@extends('layouts.app')
@section('content')

    <div class="banner"><img src="{{ asset('images/banner1.jpg') }}" alt="banner"></div>
    <!-- Navigation -->
    <div class="navigation-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-7">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('welcome_index') }}">Home</a></li>
                        <li class="active">Room Detail</li>
                    </ol>
                </div>
                <div class="col-xs-5">
                    <a href="{{ 'rooms.index' }}" class="link">book a room</a>
                </div>
            </div>
        </div>
    </div>

    <main id="main">
        <!-- Room details -->
        <section class="room-details container gen-padding">
           
            <div class="row">
                
                <div class="col-sm-6">
                    <img style="width:100%; height:100%" src="{{ Voyager::image( $room->room_image_1 ) }}" alt="">
                </div>	
                <div class="col-sm-6 info-frame">
                    <h1>{{ $room->room_name }}</h1>
                    <p>{!! $room->room_description !!}</p>
                    <ul class="detail-list list-unstyled">
                        <li><strong>Bed:</strong> {{ $room->room_beds }}</li>
                        <li><strong>Max:</strong> {{ $room->room_max_people }}</li>
                        <li><strong>Availability:</strong> {{ $room->room_availability }}</li>
                        <li><strong>Room size:</strong> {{ $room->room_size }}mp</li>
                    </ul>
                    <div class="btn-holder">
                        <strong class="rent-price">R {{ $room->room_original_price }} <span>per night</span></strong>
                    </div>
                </div>
                
                <p>
                    <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      BOOK NOW...
                    </button>
                </p>

                <div class="col-sm-6 info-frame @if(!$errors->any()) collapse @endif" id="collapseExample">

                    <form role="form" method="POST" action="{{ route('reservations.store') }}" class="contact-form require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <h2>Personal Information</h2>
                        <div class="form-group">
                            <label for="f-name">First Name</label>
                            <input id="f-name" type="text" class="form-control" value=" {{ Auth::user()->first_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Last Name</label>
                            <input id="email" type="text" class="form-control" value=" {{ Auth::user()->last_name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" value=" {{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Phone Number</label>
                            <input id="email" type="email" class="form-control" value=" {{ Auth::user()->phone_number }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Country</label>
                            <input id="email" type="email" class="form-control" value=" {{ Auth::user()->country }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">City</label>
                            <input id="email" type="email" class="form-control" value=" {{ Auth::user()->city }}" disabled>
                        </div>
                        <hr>
                        <h2>Stay Details</h2>
                        <div class="form-group">
                            <label for="dpd1">Check In Date</label>
                            <div class="input-append date" data-date="Check In" data-date-format="dd-mm-yyyy">
                                <input class="form-control" name="check_in" size="16" type="date" value="{{ old('check_in') }}">
                                @error('check_in')
                                    <span class="help text-danger" role="alert">
                                        {{$errors->first('check_in')}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dpd1">Check Out Date</label>
                            <div class="input-append date" data-date="Check In" data-date-format="dd-mm-yyyy">
                                <input class="form-control" name="check_out" size="16" type="date" value="{{ old('check_out') }}">
                                @error('check_out')
                                    <span class="help text-danger" role="alert">
                                        {{$errors->first('check_out')}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <hr>
                       <h2>Payment Details</h2>
                       <div class="">
                                          
                            <input type="hidden" name="amount" value="{{ $room->room_original_price }}">
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input
                                        class='form-control' size='4' type='text' name="name_on_card" value="{{ old('name_on_card') }}">
                                        @error('name_on_card')
                                            <span class="help text-danger" role="alert">
                                                {{$errors->first('name_on_card')}}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input
                                        autocomplete='off' class='form-control card-number' size='20'
                                        type='text' name="card_number" value="{{ old('card_number') }}">
                                        @error('card_number')
                                            <span class="help text-danger" role="alert">
                                                {{$errors->first('card_number')}}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off' name="cvc"
                                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                                        type='text' value="{{ old('cvc') }}">

                                        @error('cvc')
                                            <span class="help text-danger" role="alert">
                                                {{$errors->first('cvc')}}
                                            </span>
                                        @enderror
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text' name="expiration_month" value="{{ old('expiration_month') }}">

                                        @error('expiration_month')
                                            <span class="help text-danger" role="alert">
                                                {{$errors->first('expiration_month')}}
                                            </span>
                                        @enderror
                                </div>
    
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text' name="expiration_year" value="{{ old('expiration_year') }}">

                                        @error('expiration_year')
                                            <span class="help text-danger" role="alert">
                                                {{$errors->first('expiration_year')}}
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>
                        
                    </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input class="btn btn-default" id="formSubmit" type="submit" value="Confirm Booking">
                        <br>
                    </form>
                </div>
            </div>
        </section>
        
        <!-- gallery-block -->
        <section class="gallery-block container b-padding">
            <div class="row">
                <header class="col-xs-12">
                    <h1>Your room gallery pictures</h1>
                </header>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- carousel -->
                    <div id="carousel-example-generic" class="carousel image-gallery slide" data-ride="carousel"> 
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <a href="images/img13.jpg" class="fancybox" ><img src="{{ asset('images/img-10.jpg') }}" alt="image description"></a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="images/img13.jpg" class="fancybox" ><img src="{{ asset('images/img-11.jpg') }}" alt="image description"></a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="images/img13.jpg" class="fancybox" ><img src="{{ asset('images/img-12.jpg') }}" alt="image description"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <a href="images/img13.jpg" class="fancybox" ><img src="{{ asset('images/img-10.jpg') }}" alt="image description"></a>
                                    </div>
                                    <div class="col-xs-4">
                                      <a href="images/img13.jpg" class="fancybox"><img src="{{ asset('images/img-11.jpg') }}" alt="image description"></a>
                                    </div>
                                    <div class="col-xs-4">
                                      <a href="images/img13.jpg" class="fancybox" ><img src="{{ asset('images/img-12.jpg') }}" alt="image description"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"></a>
                    </div>
                </div>
            </div>
        </section>
    </main>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);

          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  });

  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endsection