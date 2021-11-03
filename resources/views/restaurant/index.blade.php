@extends('layouts.app')

@section('content')



<main id="main">

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

    <!-- restaurant -->
    <section class="restaurant" style="background-image: url(images/pattern.jpg);">
        <div class="container add-padding">
            
            <div class="row">
                <div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="300">
                    <div class="text-box">
                        <h1>our restaurant</h1>
                        <p>{!! $restaurant_info->body !!}</p>
                    </div>
                    
                </div>
                <div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="600">
                    <div class="image-frame"><img src="{{ Voyager::image( $restaurant_info->picture ) }}" alt="image description"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="col col-md-12 col-lg-6">
        <div class="col-sm-12">
            <form role="form" method="POST" action="{{ route('restaurant.store') }}" class="contact-form require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
                <hr>
                <h2>Book a Seat</h2>
                <div class="form-group">
                    <label for="date">Date</label>
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
    </section>
    <!-- gallery-section -->
    <section class="gallery-section">
        <div class="container-fluid">
            <div class="row">
                <article class="col-md-3 col-xs-6">
                    <div class="image-frame">
                        <div class="info-frame"> 
                            <a href="restaurant_info" class="fancybox magnify"></a>
                            <ul class="list-inline social-networks">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-youtube"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                        <img src="images/image-20.jpg" alt="image description">
                    </div>
                </article>
                <article class="col-md-3 col-xs-6">
                    <div class="image-frame">
                        <div class="info-frame">
                            <a href="images/img13.jpg" class="fancybox magnify"></a>
                            <ul class="list-inline social-networks">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-youtube"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                        <img src="images/image-21.jpg" alt="image description">
                    </div>
                </article>
                <article class="col-md-3 col-xs-6">
                    <div class="image-frame">
                        <div class="info-frame">
                            <a href="#" class="magnify"></a>
                            <ul class="list-inline social-networks">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-youtube"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                        <img src="images/image-22.jpg" alt="image description">
                    </div>
                </article>
                <article class="col-md-3 col-xs-6">
                    <div class="image-frame">
                        <div class="info-frame">
                            <a href="images/img13.jpg" class="fancybox magnify"></a>
                            <ul class="list-inline social-networks">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-youtube"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                        <img src="images/image-23.jpg" alt="image description">
                    </div>
                </article>
            </div>
            <div class="row">
                <article class="col-xs-6">
                    <div class="image-frame">
                        <div class="info-frame">
                            <a href="images/img13.jpg" class="fancybox magnify"></a>
                            <ul class="list-inline social-networks">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-youtube"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                        <img src="images/image-24.jpg" alt="image description">
                    </div>
                </article>
                <article class="col-xs-6">
                    <div class="image-frame">
                        <div class="info-frame">
                            <a href="images/img13.jpg" class="fancybox magnify" ></a>
                            <ul class="list-inline social-networks">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-youtube"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                        <img src="images/image-25.jpg" alt="image description">
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- menu section -->
    <section class="menu-section container add-padding">
        <div class="row">
            <header class="col-xs-12">
                <h1>Taste our delicious dishes</h1>
            </header>
        </div>
        <div class="row">
            <!-- carousel -->
            <div id="carousel-example-generic" class="carousel menu-carousel slide" data-ride="carousel"> 
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-12">
                            <ul class="list-unstyled menu-list">
                                
                                @foreach ($recipes as $recipe)
                                    <li>
                                        <a href="#">
                                            <div class="image-frame"><img src="{{ Voyager::image( $recipe->picture ) }}" alt="image description"></div>
                                            <div class="text">
                                                <h2>{{ $recipe->name }}</h2>
                                                <p>{!! $recipe->description !!}</p>
                                            </div>
                                            <div class="price">R {{ $recipe->price }}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection