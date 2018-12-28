@extends('layout')

@section('title', 'My Profile')

@section('content')
<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="title col-12 col-lg-8">
        <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
          Followed Categories
        </h2>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <img class="rounded-circle" style="object-fit: contain; height: 260px; width: auto;" src="{{asset('assets/images/users/'.$user->profilePicture)}}"/>
    </div>
    <div>
      <div class="card-text text-center title" display="block" style="margin-bottom: 0 !important; margin-top: 20px;font-size: 30px;">{{ $user->name }}</div>
      <div class="card-text text-center">{{ $user->email }}</div>
    </div>
    <br>
    <div class="row">
      <div class="col text-center">
        <a class="btn btn-sm btn-primary display-7" href="{{ route('myProfile', ['id' => $user->userID]) }}">Profile</a>
      </div>
      <div class="col text-center">
        <a class="btn btn-sm btn-secondary display-7" href="">Categories</a>
      </div>
    </div>
    <div class="container">
      
  	</div>
</section>
@endsection