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
                <form action="" method="post">
                {{ csrf_field() }}
                @if(isset($errors))
                    <p style="font-weight: bold; color: red">{{ $errors->first() }}</p>
                @endif
                    <div>
                        <img style="object-fit: contain; height: 300px; width: 280px" src="{{asset('assets/images/users/'.$user->profilePicture)}}"/>
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
                        <!-- masih belom dpt data dari pilihan gender sebelumny -->
                        <div class="col-md-3 multi-horizontal" data-for="gender">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="gender-form1-5">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>
@endsection