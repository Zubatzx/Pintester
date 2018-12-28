@extends('layout')

@section('title', 'My Profile')

@section('content')
<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="title col-12 col-lg-8">
        <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
          My Profile
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
        <a class="btn btn-sm btn-secondary display-7" href="">Profile</a>
      </div>
      <div class="col text-center">
        <a class="btn btn-sm btn-primary display-7" href="{{ route('myCategory', ['id' => $user->userID])}}">Categories</a>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="media-container-column col-lg-8">          
          <form action="{{ route('saveEditedProfile', ['id' => $user->userID ]) }}" method="post">
            {{ csrf_field() }}
            @if(isset($errors))
              <p class="message">{{ $errors->first() }}</p>
            @endif
            <div class="col-md-10 multi-horizontal">
              <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7">User ID</label>
                <input type="text" class="form-control" name="userID" value="{{ $user->userID }}" disabled>
              </div>
            </div>
            <div class="col-md-10 multi-horizontal" data-for="name">
              <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-5">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}"required>
              </div>
            </div>
            <div class="col-md-10 multi-horizontal" data-for="email">
              <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7" for="email-form1-5">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}"required>
              </div>
            </div>
            <div class="col-md-10 multi-horizontal" data-for="password">
              <div class="form-group">
                <label class="form-control-label mbr-fonts-style display-7" for="password-form1-5">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') ? old('password') : $user->password }}" required>
              </div>
            </div>
            <div class="col-md-10 multi-horizontal" data-for="gender">
            <div class="form-group">
              <label class="form-control-label mbr-fonts-style display-7" for="gender-form1-5">Gender</label>
              <select class="form-control" name="gender">
                <option value="Male" @if($user->gender == 'Male') selected="selected" @endif>Male</option>
                <option value="Female" @if($user->gender == 'Female') selected="selected" @endif>Female</option>
              </select>
            </div>
          </div>
          </div>
          <table style="width: 100%">
            <tr>
              <td>
                <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Save Changes</button></span>
              </td>
              <td>
                <span class="input-group-btn"><a class="btn btn-primary btn-form display-4" href="{{ route('home') }}">Discard Changes</a></span>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection