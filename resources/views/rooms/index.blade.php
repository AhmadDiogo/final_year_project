@extends('layouts.app')
@section('content')

<div class="banner"><img src="images/banner1.jpg" alt="banner"></div>
<!-- Navigation -->
<div class="navigation-bar">
    <div class="container">
        <div class="row">
            <div class="col-xs-7">
                <ol class="breadcrumb">
                    <li><a href="{{ route('rooms.index') }}">Home</a></li>
                    <li class="active">Rooms</li>
                </ol>
            </div>
            <div class="col-xs-5">
                <a href="{{ 'rooms.index' }}" class="link">book a room</a>
            </div>
        </div>
    </div>
</div>
<main id="main">
    <div class="container gen-padding">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <!-- side bar -->
            
            <!-- content -->
            <div class="col-md-12 col-sm-12 content">
                <div class="row rooms list-view">
                    @if (count($rooms)>0)
                        @foreach ($rooms as $room)
                            <article class="article">
                                <div class="col-md-8 col-sm-12 col">
                                    <div class="image-frame"><img style="" src="{{ Voyager::image( $room->room_image_1 ) }}" alt="image description"></div>
                                </div>	
                                <div class="col-md-4 col-sm-12 col">
                                    <div class="info-block">
                                        <div class="info-frame">
                                            <p>{{ $room->room_name }}</p>
                                            <p>{!! $room->room_description !!}</p>
                                            <dl class="detail-list">
                                                <dt>Bed:</dt>
                                                <dd>{{ $room->room_beds }}</dd>
                                                <dt>Max:</dt>
                                                <dd>{{ $room->room_max_people }}</dd>
                                                <dt>Room size:</dt>
                                                <dd>{{ $room->room_size }}mp</dd>
                                            </dl>
                                            <div class="btn-holder">
                                                <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-default">More Details...</a>
                                                <strong class="rent-price">R {{ $room->room_original_price }} <span>per night</span></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        {{ $rooms->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
        
    <script>
        $(document).ready(function(){
            $('#formSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/reservations') }}",
                    method: 'post',
                    data: {
                        name: $('#cvv').val(),
                    },
                    success: function(result){
                        if(result.errors)
                        {
                            $('.alert-danger').html('');
                            $.each(result.errors, function(key, value){
                                $('.alert-danger').show();
                                $('.alert-danger').append('<li>'+value+'</li>');
                            });
                        }
                        else
                        {
                            $('.alert-danger').hide();
                            $('#exampleModal').modal('hide');
                        }
                    }
                });
            });
        });
    </script>
</main>


@endsection