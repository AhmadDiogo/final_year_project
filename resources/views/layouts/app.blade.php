<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from galliasoft.com/rangerelaxe-html-demo/hotel-one/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Aug 2021 10:55:20 GMT -->
<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lake Breeze Hotel</title>
	<!-- include the site stylesheets -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('css/colors.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('css/jquery.countdown.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('css/animations.min.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('css/datepicker.css') }}" type="text/css" media="all">
	<!-- Bootstrap Dropdown Hover CSS -->
	<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-dropdownhover.min.css') }}" type="text/css" media="all">
	<!-- Fonts CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400italic,700" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Range slider CSS -->
	<link rel="stylesheet prefetch" href="{{ asset('css/jquery-ui.css') }}" type="text/css">
	<!-- flex slider CSS -->
	<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css">
</head>
<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- header -->
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<strong class="logo"><a href="{{ route('welcome_index') }}"><img src="{{ asset('images/logo.png') }}" alt="Hotel"></a></strong>
						<!-- main navigation -->
						<nav class="navbar navbar-default"> 
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span></span></button>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-left">
									<li class="{{ Route::currentRouteNamed('welcome_index') ? 'active' : '' }}"><a href="{{ route('welcome_index') }}">HOME</a></li>
									<li class="{{ Route::currentRouteNamed('about') ? 'active' : '' }}" ><a href="{{ route('about') }}">ABOUT US</a></li>
									<li class="{{ Route::currentRouteNamed('rooms') ? 'active' : '' }}" ><a href="{{ route('rooms.index') }}">ROOMS</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle disable" data-hover="dropdown">Other Services</a>
										<ul class="dropdown-menu">
                                            <li><a href="{{ route('conference_rooms.index') }}">conference room</a></li>
											<li><a href="{{ route('restaurant.index') }}">Restaurant</a></li>
											<li><a href="{{ route('swimming_pool.index') }}">Swimming Pool</a></li>

										</ul>
									</li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									@guest
										<li><a href="{{ route('login') }}">SIGN IN</a></li>
										<li><a href="{{ route('register') }}">SIGN UP</a></li>
									@endguest
									<li>
                                        <a href="{{ route('contact_us.index') }}">Contact Us</a>
                                    </li>
									@auth
									<li class="">
										<a href="#" class="dropdown-toggle disable" data-hover="dropdown">Welcome {{ Auth::user()->first_name }}</a>
									</li>
									<li>
										<form action="{{ route('logout') }}" method="POST">
											@csrf
											<button class="btn btn-xs btn-danger" type="submit">Sign Out</button>
										</form>
									</li>
									@endauth
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!-- carousel -->
		
        @yield('content')

		<!-- reservation-bar -->
		
		<!-- contain main informative part of the site -->
		
		<!-- footer of the page -->
		<div class="b-container">
			
			<div class="footer-nav">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<a href="#wrapper" class="go-top">
								<span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
							</a>
							<strong class="logo"><a href="index.html"><img src="{{ asset('images/f-logo.png') }}" alt="Hotel"></a></strong>
							<!-- footer navigation -->
							<nav class="f-nav"> 
								<ul class="nav navbar-nav navbar-left">
									<li><a href="{{ route('welcome_index') }}">HOME</a></li>
									<li><a href="{{ route('about') }}">ABOUT US</a></li>
									<li><a href="{{ route('rooms.index') }}">rooms</a></li>
									<li><a href="#">conference room</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li><a href="/admin" target="_blank">admin pannel</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<p>&copy; <a href="#" class="link">Lake Breeze Hotel</a>All rights reserved</p>
						</div>
						<div class="col-sm-6">
							<ul class="list-inline social-networks">
								<li><a href="#"><span class="icon-facebook"></span></a></li>
								<li><a href="#"><span class="icon-twitter"></span></a></li>
							</ul>
							<ul><li><a href=""></a></li></ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<!-- include jQuery library -->
	<script type="text/javascript" src="{{ asset('../../../ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') }}"></script>
	<script type="text/javascript">window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.2.min.js') }}"><\/script>')</script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- Range Slider JavaScript -->
	<script type="text/javascript" src='{{ asset('js/jquery-ui.min.js') }}'></script>
	<script type="text/javascript" src='{{ asset('js/range-slider.js') }}'></script>
	<!-- Same Height JavaScript -->
	<script type="text/javascript" src='{{ asset('js/same-height.js') }}'></script>
	<!-- include custom JavaScript -->
	<script type="text/javascript" src="{{ asset('js/jquery.main.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/animations.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.plugin.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.countdown.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/timber.master.min.js') }}"></script>
	<!-- Bootstrap Dropdown Hover JS -->
	<script type="text/javascript" src="{{ asset('js/bootstrap-dropdownhover.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" defer src="{{ asset('js/jquery.flexslider.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('js/myscript.js') }}"></script>
</body>

</html>