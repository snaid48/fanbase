@extends('front_end.layouts.master') 
@section('title')
<title>Timnas | News</title>
@endsection
 
@section('content')

<!-- Subhead
================================================== -->
<section id="subintro">
    {{--
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>ee</h3>
                        <p>
                            rr
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
{{--
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="span12">
                <ul class="breadcrumb notop">
                    <li><a href="#">Home</a><span class="divider">/</span></li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}
<section id="maincontent">
    <div class="container" style="margin: auto;
    width: 50%;
    padding: 10px;">
        <div class="row" style="margin-bottom: 113px">

            <div class="span6" style="text-align: center">

                <form action="{{ route('login') }}" method="POST" role="form" class="contactForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="row">
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
</section>
@endsection