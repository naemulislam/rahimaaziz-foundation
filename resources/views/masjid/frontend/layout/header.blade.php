<header class="header-sec">
    <nav class="navbar">
        <div class="container">
            <img class="header-logo" src="{{ asset('frontend/assets/images/logo/main-logo.png') }}" alt="">
            <div class="menu-area ml-auto">
                <ul>
                    <li><a href="{{ route('masjid.index') }}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="dd-btn1"><a href="">About Us </a></li>

                    <li class="dd-btn1"><a href="#!"> Service <i class="fa fa-angle-down"></i></a>

                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>service1</a></li>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>service2</a></li>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>service3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dd-btn1"><a href="">Bayans</a></li>
                    <li class="dd-btn1"><a href="">Gallery</a></li>
                    <li class="dd-btn1"><a href="#!"> Salah Calender <i class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>January</a></li>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>February</a></li>
                                <li><a href=""><i class="fa fa-long-arrow-right"></i>March</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dd-btn1"><a href="">Contact Us</a></li>
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
                <div class="menu-link" id="headingFour">
                    <a href="" class="mmenu-btn" type="button" data-toggle="collapse"
                        data-target="#collapseFour">About Us</a>
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
                            <li><a href=""><i class="fa fa-long-arrow-right"></i>Video</a></li>
                            <li><a href=""><i class="fa fa-long-arrow-right"></i>Gallery</a></li>
                            <li><a href=""><i class="fa fa-long-arrow-right"></i>Audio</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <style>
                .scroll-div-dist {
                    background: #ececec !important;
                }
            </style>


            <div class="menu-box">
                <div class="menu-link" id="headingFive">
                    <a href="" class="mmenu-btn" type="button" data-toggle="collapse"
                        data-target="#collapseFive">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
