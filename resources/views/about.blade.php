@extends('layouts.app')
@section('content')
<div class="banner"><img src="images/banner1.jpg" alt="banner"></div>
<!-- Navigation -->
<div class="navigation-bar">
    <div class="container">
        <div class="row">
            <div class="col-xs-7">
                <ol class="breadcrumb">
                    <li><a href="{{ route('welcome_index') }}">Home</a></li>
                    <li class="active">About us</li>
                </ol>
            </div>
            <div class="col-xs-5">
                <a href="rooms.html" class="link">book a room</a>
            </div>
        </div>
    </div>
</div>
<main id="main">
    <!-- about us section -->
    <section class="about-us container add-padding">
        <div class="row">
            <div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="300">
                <div class="text-box">
                    <h1>About us</h1>
                    <p>{!! $about->about_body !!}</p>
                </div>
            </div>
            <div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="600">
                <div class="image-frame"><img src="{{ Voyager::image( $about->about_picture ) }}" alt="image description"></div>
            </div>
        </div>
    </section>
    <!-- about -->
    <section class="about container b-padding">
        <div class="row">
            <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="300">
                <div class="box">
                    <div class="icon ico-luxury"></div>
                    <h2>Luxury</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="600">
                <div class="box">
                    <div class="icon ico-services"></div>
                    <h2>Great services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-sm-4 animate" data-anim-type="fadeInUp" data-anim-delay="900">
                <div class="box">
                    <div class="icon ico-reservation"></div>
                    <h2>Online reservation</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Services block -->
    
    <!-- our team -->
    <section class="our-team" style="background-image: url(images/pattern.jpg);">
        <div class="container b-padding">
            <div class="row">
                <header class="header col-xs-12 g-padding">
                    <h1>our team</h1>
                </header>
            </div>
            <div class="row">
                <!-- carousel -->
                <div id="carousel-example-generic" class="carousel team-carousel slide" data-ride="carousel"> 
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-01.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-02.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-03.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-01.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-02.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-03.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-01.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-02.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="box">
                                        <div class="info-box">
                                            <div class="holder">
                                                <div class="frame">
                                                    <h2>Elissa Pompil</h2>
                                                    <span class="sub-heading">Maid</span>
                                                    <ul class="list-inline social-networks">
                                                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                        <li><a href="#"><span class="icon-youtube"></span></a></li>
                                                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                        <li><a href="#"><span class="icon-google"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image-frame">
                                            <img src="images/thumb-03.jpg" alt="image description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- carousel-indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection