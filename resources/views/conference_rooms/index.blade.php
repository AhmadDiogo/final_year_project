@extends('layouts.app')
@section('content')
<main id="main">
    <div class="container gen-padding">
        <div class="row">
            <!-- side bar -->
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
        
            <!-- content -->
            @foreach ($rooms as $room)
            <div class="col-md-12 col-sm-12 content">
                <div class="row blog-posts">
                    <article class="article">
                        <div class="col-md-8 col-sm-12 col">
                            <div class="image-frame">
                                <div class="icon">
                                    <span class="icon-image"></span>
                                </div>
                                <img src="{{ Voyager::image( $room->room_image_1 ) }}" alt="image description">
                            </div>
                        </div>	
                            <div class="col-md-4 col-sm-12 col">
                                <div class="info-block">
                                    <div class="info-frame">
                                        <h1>{{ $room->room_title }}</h1>
                                        @if ($room->room_availability == 1)
                                            <ul class="list-inline metas">
                                                <li><a href="#"><span class="icon-folder-open"></span>Venue</a></li>
                                                <li>Room is available</li>
                                            </ul>
                                        @else
                                            
                                        <ul class="list-inline metas">
                                            <li><a href="#"><span class="icon-folder-open"></span>Venue</a></li>
                                            <li><span class="icon-calendar">Booked From:</span>{{ $room->booked_from }} to {{ $room->booked_to }}</li>
                                        </ul>
                                        
                                        @endif
                                        <p>{!! Str::limit($room->room_body, 500) !!}</p>
                                        <div class="btn-holder">
                                            <a href="{{ route('conference_rooms.show', $room->id) }}" class="btn btn-default">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</main> 
@endsection