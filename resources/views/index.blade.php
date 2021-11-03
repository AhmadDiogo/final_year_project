@extends('layouts.app')

@section('content')
<div id="carousel-example-generic1" class="carousel slide" data-ride="carousel"> 
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<div class="description">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1><em>book a room for</em><br class="hidden-xs"> <span>family vacation</span></h1>
						</div>
					</div>
				</div>
			</div>
			<img src="images/slide1.jpg" alt="image description">
		</div>
		<div class="item">
			<div class="description">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1><em>book a room for</em><br class="hidden-xs"> <span>relax yourself</span></h1>
						</div>
					</div>
				</div>
			</div>
			<img src="images/slide3.jpg" alt="image description">
		</div>
		<div class="item">
			<div class="description">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1><em>book a room for</em><br class="hidden-xs"> <span>relax yourself</span></h1>
						</div>
					</div>
				</div>
			</div>
			<img src="images/slide2.jpg" alt="image description">
		</div>
	</div>
	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev"></a>
	<a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next"></a>
</div>

<div class="reservation-bar">
	<div class="container">
		<div class="row">
			<form action="{{ route('available_rooms') }}" method="POST">
				@csrf
				<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-sm-6">
							<div class="input-append date" id="dpd1" data-date="" data-date-format="dd-mm-yyyy">
								<input class="form-control" size="16" name="check_in" type="text" value="Arrival date">
								<span class="icon-calendar"></span>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-append date" id="dpd2" data-date="" data-date-format="dd-mm-yyyy">
								<input class="form-control" size="16" name="check_out"	type="text" value="Departure date">
								<span class="icon-calendar"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<div class="fake-select">
									<select name="room_type">
										<option>Single Room</option>
										<option>Deluxe Room</option>
										<option>Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<input type="submit" class="btn btn-default" value="check availability">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<main id="main">
	<!-- about -->
	<section class="about container b-padding">
		<div class="row">
			<header class="header col-xs-12 g-padding">
				<h1>A few words</h1>
			</header>
		</div>
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
	<!-- Our room -->
	@foreach ($rooms as $room)
	<section class="our-room">
		<div class="image-frame" style="background-image: url(images/image-03.jpg);"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-block pull-right animate" data-anim-type="fadeInRight" data-anim-delay="300">
					<h1>{{ $room->room_name }}</h1>
					<p>{!! $room->room_description !!}</p>
					<div class="row">
						<ul class="list-unstyled list col-sm-6">
							<li>LCD TVs 28 ''</li>
							<li>national and international TV channels</li>
							<li>direct dial telephone, Internet access</li>
							<li>premium cosmetics</li>
						</ul>
						<ul class="list-unstyled list col-sm-6">
							<li>fluffy cotton bathrobes</li>
							<li>towels and cotton sheets</li>
							<li>comfortable slippers</li>
							<li>hairdryer</li>
						</ul>
					</div>
					<ul class="list-inline services-list">
						<li><span class="icon ico-downtown"></span>Near<br> downtown</li>
						<li><span class="icon ico-wifi"></span>free wifi</li>
						<li><span class="icon ico-parking"></span>free<br> parking</li>
						<li><span class="icon ico-breakfast"></span>Free<br> breackfast</li>
						<li><span class="icon ico-mp"></span>23mp</li>
					</ul>
					<a href="{{ route('rooms.show', $room->id) }}" class="btn btn-default">Book Now</a>
				</div>
			</div>
		</div>
	</section>
	@endforeach
	<!-- restaurant -->
	<section class="restaurant" style="background-image: url(images/pattern.jpg);">
		<div class="container add-padding">
			<div class="row">
				<div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="300">
					<div class="text-box">
						<h1>our restaurant</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						<a href="#" class="btn btn-default">Book Now</a>
					</div>
				</div>
				<div class="col-sm-6 animate" data-anim-type="fadeInUp" data-anim-delay="600">
					<div class="image-frame"><img src="images/image-02.jpg" alt="image description"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fun facts -->
	<section class="fun-facts">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="counter-list horizon" data-animate-in="scale:1.2;">
						<div class="grid-item">
							<div class="counter-wrapper">
								<strong class="number counter">
									<span id="s1" class="stats" data-count-from="100" data-count-to="7892" >7892</span>
								</strong>
								<span class="title">Customers</span>
							</div>
						</div>
						<div class="grid-item">
							<div class="counter-wrapper">
								<strong class="number counter">
									<span id="s2" class="stats" data-count-from="10" data-count-to="415" >415</span>
								</strong>
								<span class="title">Celebrities</span>
							</div>
						</div>
						<div class="grid-item">
							<div class="counter-wrapper">
								<strong class="number counter">
									<span id="s3" class="stats" data-count-from="100" data-count-to="6781" >6781</span>
								</strong>
								<span class="title">Returns</span>
							</div>
						</div>
						<div class="grid-item">
							<div class="counter-wrapper">
								<strong class="number counter">
									<span id="s4" class="stats" data-count-from="100" data-count-to="6123" >6123</span>
								</strong>
								<span class="title">Happy people</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- our news -->
	<section class="news container b-padding">
		<div class="row">
			<header class="header col-xs-12 g-padding">
				<h1>our news</h1>
			</header>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<!-- carousel -->
				<div id="carousel-example-generic2" class="carousel slide news" data-ride="carousel">	<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-8 col">
								<div class="image-holder">
								  <a href="images/img13.jpg" class="fancybox">
									<img src="images/image-01.jpg" alt="image description">
								  </a>
								</div>
							</div>
							<div class="col-sm-4 col">
								<div class="carousel-caption">
									<h2>Presidential suite</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<a href="#" class="btn btn-default">read more</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-sm-8 col">
								<div class="image-holder"><a href="images/img13.jpg" class="fancybox">
									<img src="images/image-01.jpg" alt="image description">
								  </a>
								</div>
							</div>
							<div class="col-sm-4 col">
								<div class="carousel-caption">
									<h2>Sit - Relax- Enjoy</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<a href="#" class="btn btn-default">read more</a>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="col-sm-8 col">
								<div class="image-holder">
								  <a href="images/img13.jpg" class="fancybox">
									<img src="images/image-01.jpg" alt="image description">
								  </a>
								</div>
							</div>
							<div class="col-sm-4 col">
								<div class="carousel-caption">
									<h2>Presidential suite</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<a href="#" class="btn btn-default">read more</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Indicators -->
					<div class="indicators col-sm-4">
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic2" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic2" data-slide-to="2"></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

@endsection