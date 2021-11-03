@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
@if (Session::has('message'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('message') }}</p>
        </div>
@endif
<section class="services-block">
    <div class="image-frame" style="background-image: url(images/image-05.jpg);"></div>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-6 col-sm-12 pull-right">
                <div class="row">
                    <div class="col-sm-6 col-md-12 col-lg-6 block downtown">
                        <h2>near downtown</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="col-sm-6 col-md-12 col-lg-6 block sea">
                        <h2>close to the sea</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
 <div class="container-fluid">
        <form role="form" method="POST" action="{{ route('swimming_pool.store') }}" class="contact-form require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
            @csrf
            <hr>
            <h2>Book The Swimming Pool</h2>
            <div class="form-group">
                <div class="input-append date" data-date="" data-date-format="dd-mm-yyyy">
                    <input class="form-control" name="date" size="16" type="date" value="{{ old('date') }}">
                    @error('date')
                        <span class="help text-danger" role="alert">
                            {{$errors->first('date')}}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="" data-date="" data-date-format="">
                    <input class="form-control" name="time" type="time" value="{{ old('time') }}" placeholder="time">
                    @error('time')
                        <span class="help text-danger" role="alert">
                            {{$errors->first('time')}}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-append" data-date="" data-date-format="">
                    <input class="form-control" name="guests_number" type="number" value="{{ old('guests_number') }}" placeholder="number of guests">
                    @error('guests_number')
                        <span class="help text-danger" role="alert">
                            {{$errors->first('guests_number')}}
                        </span>
                    @enderror
                </div>
            </div>
            
           <hr>
            <input class="btn btn-danger" id="formSubmit" type="submit" value="Confirm Booking">
            <br>
        </form>
    </div>
<br>
<br>
<br>
<br>
@endsection