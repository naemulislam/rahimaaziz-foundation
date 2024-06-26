<?php
$routeName = request()->route()->getName();
?>
<header class="header-sec">
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home')}}"><img class="header-logo" src="{{ asset($setting?->white_logo) }}" alt=""></a>
            <div class="menu-area ml-auto">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ $routeName == 'home'? 'menu-active':''}}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="dd-btn1"><a href="#!" class="{{ $routeName == 'about' || $routeName == 'team_member' ?  'menu-active':''}}"> About <i class="fa fa-angle-down"></i></a>

                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href="{{ route('about') }}" class="{{ $routeName == 'about'? 'menu-active':''}}"><i class="fa fa-long-arrow-right"></i> About Us</a>
                                </li>
                                <li><a href="{{ route('team_member')}}" class="{{ $routeName == 'team_member'? 'menu-active':''}}"><i class="fa fa-long-arrow-right"></i>Our Team</a></li>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>FAQ</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dd-btn1"><a href="#!" class="{{ $routeName == 'gallery'? 'menu-active':''}}"> Media <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href="{{ route('gallery')}}" class="{{ $routeName == 'gallery'? 'menu-active':''}}"><i class="fa fa-long-arrow-right"></i>Gallery</a></li>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i> Video</a></li>
                            </ul>
                        </div>

                    </li>
                    <li class="dd-btn1"><a href="{{ route('contact') }}" class="{{ $routeName == 'contact'? 'menu-active':''}}">Contact Us</a></li>
                    <li class="dd-btn1"><a href="{{ route('programs') }}" class="{{ $routeName == 'programs'? 'menu-active':''}}">Programs</a></li>

                    <li class="dd-btn1"><a href="{{ route('admission') }}" class="{{ $routeName == 'admission'? 'menu-active':''}}"> Online Admission</a></li>
                    @if (auth('admin')->user())
                        <li><a href="{{ route('admin.dashboard') }}"> Dashboard</a></li>
                    @elseif(auth('teacher')->user())
                        <li><a href="{{ route('teacher.dashboard') }}"> Dashboard</a></li>
                    @elseif(auth('student')->user())
                        <li><a href="{{ route('student.dashboard') }}"> Dashboard</a></li>
                    @elseif(auth()->user())
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('signin.portal') }}">Signin</a></li>
                    @endif
                </ul>
            </div>
            <i class="fa fa-bars menu-icon"></i>
        </div>
    </nav>
</header>
<!--end header-->
<!--start mobile menu-->
<div class="mobile-menu">
    <div class="mm-logo" style="background: #fff; padding: 11px 18px;">
        <a href="{{ route('home') }}">
            <img style="width: 55px;" src="{{ asset($setting?->white_logo) }}" alt="logo">
        </a>
        <div class="mm-cross-icon">
            <i class="fa fa-times mm-ci"></i>
        </div>
    </div>
    <div class="mm-menu">
        <div class="accordion" id="accordionExample">
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('home') }}"><i class="fa fa-home mr-2"></i>Home</a>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link" id="headingTwo">
                    <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseOne"> About<i
                            class="fa fa-plus"></i></a>
                </div>
                <div id="collapseOne" class="collapse menu-body" aria-labelledby="headingTwo"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('about')}}"><i class="fa fa-long-arrow-right"></i>About Us</a></li>
                            <li><a href="{{ route('team_member')}}"><i class="fa fa-long-arrow-right"></i>Our Team</a></li>
                            <li><a href=""><i class="fa fa-long-arrow-right"></i>FAZ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link" id="headingTwo">
                    <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseTwo"> Media<i
                            class="fa fa-plus"></i></a>
                </div>
                <div id="collapseTwo" class="collapse menu-body" aria-labelledby="headingTwo"
                    data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('gallery')}}"><i class="fa fa-long-arrow-right"></i>Gallery</a></li>
                            <li><a href=""><i class="fa fa-long-arrow-right"></i>Video</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('contact') }}">Contact Us</a>
                </div>

            </div>
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('programs') }}">Programs</a>
                </div>

            </div>
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('admission') }}"> Admission</a>
                </div>
            </div>
            @if (auth('admin')->user())
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('admin.dashboard') }}"> Dashboard</a>
                    </div>
                </div>
            @elseif(auth('teacher')->user())
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('teacher.dashboard') }}">Dashboard</a>
                    </div>
                </div>
            @elseif(auth('student')->user())
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('student.dashboard') }}"> Dashboard</a>
                    </div>
                </div>
            @elseif(auth()->user())
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('dashboard') }}"> Dashboard</a>
                    </div>
                </div>
            @else
                <div class="menu-box">
                    <div class="menu-link">
                        <a href="{{ route('signin.portal') }}"> School Portal</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
