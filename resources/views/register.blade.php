@extends('layout')

@section('title', 'Register')

@section('content')
	<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="title col-12 col-lg-8">
                	<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    	REGISTER FORM
                	</h2>
                	<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Become our member for free<br>Get more access and feature</h3>
            	</div>
        	</div>
    	</div>
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="media-container-column col-lg-8">          
                    <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($errors))
                        <p class="message">{{ $errors->first() }}</p>
                    @endif
                        <div class="row row-sm-offset">
                            <div class="col-md-10 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-5">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"required>
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-5">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"required>
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="password">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="password-form1-5">Password</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
                                </div>
                            </div>
                            <div class="col-md-10 multi-horizontal" data-for="confpass">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="confirmPassword-form1-5">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPassword" value="{{ old('confirmPassword') }}"required>
                                </div>
                            </div>
                            <div class="col-md-3 multi-horizontal" data-for="gender">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="gender-form1-5">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 multi-horizontal" data-for="photo">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="profilePicture-form1-5">Photo</label>
                                    <input type="file" class="form-control" name="profilePicture">
                                </div>
                            </div>
                        </div>
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Register</button></span>
                    </form>
            	</div>
        	</div>
    	</div>
	</section>
@endsection