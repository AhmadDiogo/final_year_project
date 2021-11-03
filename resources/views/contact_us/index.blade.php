@extends('layouts.app')
@section('content')
<div class="navigation-bar">
    <div class="container">
        <div class="row">
            <div class="col-xs-7">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
</div>

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
    
    <div class="container">
        <div class="contact g-padding">
            <div class="sm-6">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
           </div>

            <div class="row">
                <div class="col-xs-12">
                    <h1>let’s drink a coffee</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p></p>
                    <dl class="contact-info">
                        <dt><span class="icon-location"></span>Address:</dt>
                        <dd>Balwin Blvd, Corpus Christi</dd>
                        <dt><span class="icon-phone"></span>Phone:</dt>
                        <dd><a href="tel:400748978045">+40 0748 978 045</a></dd>
                        <dt><span class="icon-paperplane"></span>E-MAIL:</dt>
                        <dd><a href="mailto:&#111;&#102;&#102;&#105;&#099;&#101;&#064;&#103;&#097;&#108;&#108;&#105;&#097;&#115;&#111;&#102;&#116;&#046;&#099;&#111;&#109;">&#111;&#102;&#102;&#105;&#099;&#101;&#064;&#103;&#097;&#108;&#108;&#105;&#097;&#115;&#111;&#102;&#116;&#046;&#099;&#111;&#109;</a></dd>
                    </dl>
                </div>
               
                <div class="col-sm-6">
                    <form action="{{ route('contact_us.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="f-name">*Full Name</label>
                            <input id="f-name" name="name" value="{{ Auth::user()->first_name }}" type="text" class="form-control">
                            @error('name')
                                <span class="help text-danger" role="alert">
                                    {{$errors->first('name')}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">*Email</label>
                            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                            @error('email')
                                <span class="help text-danger" role="alert">
                                    {{$errors->first('email')}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">*Phone Number</label>
                            <input id="phone_number" type="text" name="phone_number" value="{{ Auth::user()->phone_number }}" class="form-control">
                            @error('phone_number')
                                <span class="help text-danger" role="alert">
                                    {{$errors->first('phone_number')}}
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Message</label>
                            <textarea id="comment" class="form-control" name="message" rows="8" cols="45"></textarea>

                            @error('message')
                                <span class="help text-danger" role="alert">
                                    {{$errors->first('message')}}
                                </span>
                            @enderror

                        </div>
                        <input class="btn btn-default" type="submit" value="Send Message">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection