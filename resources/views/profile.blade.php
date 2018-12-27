@extends('layout')

@section('title', 'Profile')

@section('content')
  <section class="mbr-section form1 cid-raLSBQAxbV" id="form1-5">
      <div class="container">
          <div class="row justify-content-center">
              <div class="title col-12 col-lg-8">
                <table style="width: 45%">
                <tr>
                  <td rowspan="2">
                  <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    <img class="rounded-circle profilePicture" src="{{asset('assets/images/users/'.session()->get('profilePicture'))}}" style="height: 150px; width: 150px" />
                  </h2>
                </td>
                <td>
                  <div id="u415" class="ax_default heading_1">
                    <div id="u415_div" class=""></div>
                    <div id="u415_text" class="text ">
                      <p><span>{{ session()->get('name') }}</span></p>
                    </div>
                  </div>
                </td>
                </tr>
                <tr>
                  <td>
                  <div id="u415" class="ax_default heading_1">
                    <div id="u415_div" class=""></div>
                    <div id="u415_text" class="text ">
                      <p><span>{{ session()->get('email') }}</span></p>
                    </div>
                  </div>
                    </td>
                    </tr>  
              </table>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row justify-content-center">
              <div class="media-container-column col-lg-8">          
                    <form action="{{ url('profile') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if(isset($errors))
                        <p style="font-weight: bold; color: red">{{ $errors->first() }}</p>
                    @endif
                        <div class="row row-sm-offset">
                          <div class="col-md-3 multi-horizontal">
                                <div class="form-group">
                                  <div class="navbar-buttons mbr-section-btn">
                                    <a class="btn btn-sm btn-primary display-4" href="{{ route('profile', ['id' => session()->get('userID')]) }}">Profile</a>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-3 multi-horizontal">
                                <div class="form-group">
                                    <div class="navbar-buttons mbr-section-btn">
                                      <a class="btn btn-sm btn-primary display-4" href="">Categories</a>
                                  </div>
                                </div>
                            </div>

                            <div class="col-md-10 multi-horizontal">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">User ID</label>
                                     <input type="text" class="form-control" name="userID" value="{{session()->get('userID')}}"readonly>
                                </div>
                            </div>
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
                        </div>
                        <table style="width: 100%">
                          <tr>
                            <td>
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Save Changes</button></span>
                          </td>
                          <td>
                        <span class="input-group-btn"><button type="submit" class="btn btn-primary btn-form display-4">Discard Changes</button></span>
                      </td>
                    </tr>
                  </table>
                    </form>
              </div>
          </div>
      </div>
  </section>
@endsection