<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assets/images/peats-96x96.png" type="image/x-icon">
        <title>Pintester - @yield('title')</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/web/assets/mobirise-icons/mobirise-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/tether/tether.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap-reboot.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/socicon/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dropdown/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/mobirise/css/mbr-additional.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/comment/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/global/global.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/axure/styles.css') }}">
        <style>

        </style>
    </head>
    <body onload="startTime()">
        <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">
        @if(session()->get('userID') == "")
            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/peats-96x96.png') }}" alt="Pintester" style="height: 3.8rem;">
                            </a>
                        </span>
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="{{ route('home') }}">Pintester</a>
                        </span>
                     </div>
                </div>
                <form action="{{ url('search') }}" method="post" id="search">
                {{ csrf_field() }}
                    <input type="text onEnter" placeholder="Search" name="key" style="width: 500px">
                    <a onclick="document.getElementById('search').submit()"><span class="mbri-search btn-search"></span></a>
                </form>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ url('register') }}"><span class="mbri-website-theme mbr-iconfont mbr-iconfont-btn"></span>
                        Register&nbsp;</a>
                        </li>
                    </ul>
                    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="{{ route('indexLogin') }}"><span class="mbri-users mbr-iconfont mbr-iconfont-btn"></span>Login</a>
                    </div>
                </div>
            </nav>
        @else
            <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
                <div class="menu-logo">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/peats-96x96.png') }}" alt="Pintester" style="height: 3.8rem;">
                            </a>
                        </span>
                        <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="{{ route('home') }}">Pintester</a>
                        </span>
                     </div>
                </div>
                <form action="{{ url('search') }}" method="post" id="search">
                {{ csrf_field() }}
                    <input type="text onEnter" placeholder="Search" name="key" style="width: 500px">
                    <a onclick="document.getElementById('search').submit()"><span class="mbri-search btn-search"></span></a>
                </form>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    @if(session()->get('isAdmin') == 1)
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4 dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mbri-change-style mbr-iconfont mbr-iconfont-btn"></span>
                        Edit&nbsp;</a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="left: 1050px; width: 40px">
                                <a class="dropdown-item" href="{{ route('indexUser') }}">Edit User</a>
                                <a class="dropdown-item" href="{{ route('indexCategory') }}">Edit Category</a>
                              </div>
                        </li>
                    @endif
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('indexView', ['id' => session()->get('userID')]) }}"><span class="mbri-photos mbr-iconfont mbr-iconfont-btn"></span>
                        View&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('myCart', ['id' => session()->get('userID')]) }}"><span class="mbri-shopping-cart mbr-iconfont mbr-iconfont-btn"></span>
                        Cart&nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('myPost', ['id' => session()->get('userID')]) }}"><span class="mbri-website-theme mbr-iconfont mbr-iconfont-btn"></span>
                        My Post&nbsp;</a>
                        </li>
                    </ul>
                    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="{{ route('profile', ['id' => session()->get('userID')]) }}"><span class="mbr-iconfont mbr-iconfont-btn"><img class="rounded-circle profilePicture" src="{{asset('assets/images/users/'.session()->get('profilePicture'))}}" alt="{{ session()->get('name') }}" /></span>{{ session()->get('name') }}</a>
                    <a class="btn btn-md btn-secondary display-4" href="{{ route('logOut') }}"><span class="mbri-paper-plane mbr-iconfont mbr-iconfont-btn"></span>Logout</a>
                    
                </div>
            </nav>
        @endif
        </section>
        <div class="row" style="transform: translateY(200%); z-index: 1000; background-color: #333333; color: white; font-size: 25px; position: fixed; width: 101%">
            <div class="col-md-6 mbr-fonts-style" align="left" style="width: 100%;">
            @if(session()->get('name') != "")
                Welcome, {{ session()->get('name') }}
            @endif
            </div>
            <div class="col-md-6 mbr-fonts-style" align="right" style="width: 100%">
                {{ date('d-M-Y') }}, <span id="jam"></span>
            </div>
        </div>
        <div>
        	@yield('content')
        </div>
        <section class="cid-qTkAaeaxX5" id="footer1-2">
            <div class="container">
                <div class="media-container-row content text-white">
                    <div class="col-12 col-md-3">
                        <div class="media-wrap">
                            <img src="{{ asset('assets/images/peats-192x192.png') }}" alt="Pintester">
                        </div>
                    </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">Address</h5>
                    <p class="mbr-text">Gedung Mangga Dua<br>Block A5 No. 3<br>Jakarta Utara</p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">Contacts</h5>
                    <p class="mbr-text">Email: &nbsp;admin.pin@pintester.com<br>Phone: &nbsp;+62-5638210<br>Fax: +62 (1) 623 23412 332</p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <h5 class="pb-3">Contributor</h5>
                    <p class="mbr-text">Aditya Putra Budiman<br>Christian Bartolomeus<br>Kevin Setiadi Gunawan</p>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">© Copyright 2018 Pintester - All Rights Reserved</p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-list align-right">
                            <div class="soc-item">
                                <a href="https://www.facebook.com/adit.pointb" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://twitter.com/" target="_blank">
                                    <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://instagram.com/" target="_blank">
                                    <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://plus.google.com/" target="_blank">
                                    <span class="mbr-iconfont mbr-iconfont-social socicon-googleplus socicon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Scripts -->
        <script src="{{ asset('assets/web/assets/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/popper/popper.min.js') }}"></script>
        <script src="{{ asset('assets/tether/tether.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/smoothscroll/smooth-scroll.js') }}"></script>
        <script src="{{ asset('assets/dropdown/js/script.min.js') }}"></script>
        <script src="{{ asset('assets/touchswipe/jquery.touch-swipe.min.js') }}"></script>
        <script src="{{ asset('assets/parallax/jarallax.min.js') }}"></script>
        <script src="{{ asset('assets/theme/js/script.js') }}"></script>
        <script>
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }

            $('.onEnter').keydown(function(e){
                if(e.KeyCode == 13){
                    this.form.submit();
                }
            });
        </script>
    </body>
</html>
