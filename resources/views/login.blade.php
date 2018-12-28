@extends('layout')

@section('title', 'Login')

@section('content')
	<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="title col-12 col-lg-8">
                	<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    	LOGIN FORM
                	</h2>
                	<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Doesn't have account ?<br>Register <a href="{{ url('register') }}">here</a></h3>
            	</div>
        	</div>
    	</div>
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="media-container-column col-lg-8">          
                    <form action="{{ route('logIn') }}" method="post">
                    {{ csrf_field() }}
                    @if(isset($errors))
                        <p class="message">{{ $errors->first() }}</p>
                    @endif
                        <div class="row row-sm-offset">
                            <div class="col-md-10 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-5">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="phone">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="password-form1-5">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Login</button></span>
                    </form>
            	</div>
        	</div>
    	</div>
	</section>
@endsection