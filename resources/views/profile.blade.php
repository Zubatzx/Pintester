@extends('layout')

@section('title', 'Profile')

@section('content')
	<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="title col-12 col-lg-8">
                	<h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    	PROFILE
                	</h2>
            	</div>
        	</div>
    	</div>
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="media-container-column col-lg-8">          
                    <div class="row row-sm-offset">
                            <table style="width:75%">
                                <tr>
                                    <td rowspan="3"><img class="card-img-top" style="object-fit: contain; height: 300px; width: 280px" src="{{asset('assets/images/users/'.$user->profilePicture)}}"/></td>
                                    <td>Name   : {{ $user->name }}</td> 
                                </tr>
                                <tr>
                                    <td>Email  : {{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Gender : {{ $user->gender }}</td>
                                </tr>
                            </table>
                        </div>
                        <span class="input-group-btn"><a href="{{ url('update') }}"><button type="submit" class="btn btn-primary btn-form display-4">Edit Profile</button></a></span>
            	</div>
        	</div>
    	</div>
	</section>
@endsection
