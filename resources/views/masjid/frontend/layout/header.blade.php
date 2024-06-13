<header class="header-sec">
    <nav class="navbar">
        <div class="container">
            <img class="header-logo" src="{{ asset('frontend/assets/images/logo/main-logo.png') }}" alt="">
            <div class="menu-area ml-auto">
                <ul>
                    <li><a href="{{ route('masjid.index') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="dd-btn1"><a href="{{ route('masjid.about')}}">About Us </a></li>

                    <li class="dd-btn1"><a href="{{ route('masjid.service')}}"> Service </a>
                    </li>
                    <li class="dd-btn1"><a href="#">Bayans</a></li>
                    <li class="dd-btn1"><a href="{{ route('masjid.gallery')}}">Gallery</a></li>
                    <li class="dd-btn1"><a href="#!"> Salah Calender <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>January</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>February</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i>March</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dd-btn1"><a href="{{ route('contact')}}">Contact Us</a></li>
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
        <a href="{{ route('masjid.index') }}">
            <img style="width: 55px;" src="{{ asset('frontend') }}/assets/images/logo/logo-light1.png" alt="logo">
        </a>
        <div class="mm-cross-icon">
            <i class="fa fa-times mm-ci"></i>
        </div>
    </div>
    <div class="mm-menu">
        <div class="accordion" id="accordionExample">
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('masjid.index') }}"><i class="fa fa-home mr-2"></i>Home</a>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('masjid.about')}}">About Us</a>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('masjid.service')}}">Service</a>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('masjid.gallery')}}">Gallery</a>
                </div>
            </div>

            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('contact')}}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
