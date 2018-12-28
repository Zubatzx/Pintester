@extends('layout')

@section('title', 'Manage - Edit User')

@section('content')
<section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    Edit User
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8">          
                <form action="{{route('saveEditedUser', ['id' => $user->userID])}}" method="post" id="editUser">
                {{ csrf_field() }}
                @if(isset($errors))
                    <p class="message">{{ $errors->first() }}</p>
                @endif
                    <div class="row justify-content-md-center">
                        <img class="rounded-circle" style="object-fit: contain; height: 320px; width: auto;" src="{{asset('assets/images/users/'.$user->profilePicture)}}"/>
                    </div>
                    <div class="row row-sm-offset">
                        <div class="col-md-10 multi-horizontal" data-for="id">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="id-form1-5">ID</label>
                                <input type="text" class="form-control" name="id" value="{{ $user->userID }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-10 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-5">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-10 multi-horizontal" data-for="email">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="email-form1-5">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}"required>
                            </div>
                        </div>
                        <div class="col-md-3 multi-horizontal" data-for="gender">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="gender-form1-5">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="Male" @if($user->gender == 'Male') selected="selected" @endif>Male</option>
                                    <option value="Female" @if($user->gender == 'Female') selected="selected" @endif>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- alasan gw taro diluar biar buttonny bisa lebih rapi -->
            <div class="row justify-content-md-center col-md-12">
                <a class="btn btn-primary col-md-3" href="{{route('indexUser')}}">Discard Changes</a>
                <a class="btn btn-primary col-md-3" onclick="document.getElementById('editUser').submit()">Save Changes</a>
                <a class="btn btn-secondary col-md-3" href="{{route('deleteUser', ['id' => $user->userID])}}">Delete User</a>
            </div>
        </div>
    </div>
</section>
@endsection