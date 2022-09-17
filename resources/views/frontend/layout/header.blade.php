<header class="header-sec" data-wow-duration="1s">
    <nav class="navbar">
        <div class="container">
           

            <div class="menu-area ml-auto">
                <ul>
                    <li><a href="{{ route('home')}}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="dd-btn1"><a href="#!"> Masjid <i class="fa fa-angle-down"></i></a>

                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href="{{ route('nikah')}}"><i class="fa fa-long-arrow-right"></i> Nikah/Marriage Services</a></li>
                                <li><a href="{{ route('daily')}}"><i class="fa fa-long-arrow-right"></i> Friday Prayers</a></li>
                                <li><a href="{{ route('quran')}}"><i class="fa fa-long-arrow-right"></i> Qur’an Tafsir</a></li>
                                <li><a href="{{ route('ramadan')}}"><i class="fa fa-long-arrow-right"></i> Ramadan</a></li>
                                </ul>
                        </div>

                    </li>
                        <li class="dd-btn1"><a href="#!"> RA Foundation Program <i class="fa fa-angle-down"></i></a>

                        <div class="dropdown-menu1">
                            <ul>
                                <li><a href="{{ route('aims')}}"><i class="fa fa-long-arrow-right"></i> Aims and objectives</a></li>
                                <li><a href="{{ route('nazirah')}}"><i class="fa fa-long-arrow-right"></i> Nazirah Program</a></li>
                                <li><a href="{{ route('alim')}}"><i class="fa fa-long-arrow-right"></i>Alim Program</a></li>
                                <li><a href="{{ route('afterschool')}}"><i class="fa fa-long-arrow-right"></i> After School Maktab</a></li><li><a href="{{ route('weekendmaktab')}}"><i class="fa fa-long-arrow-right"></i> Weekend Maktab</a></li>
                                </ul>
                        </div>

                    </li>

                    

                    <li class="dd-btn1"><a href="events.html">RA Foundation Events </a></li>

                    <li class="dd-btn1"><a href="generous_donation.html"> Generous Donation</a></li>

                    <li class="dd-btn1"><a target="_blank" href="{{ route('admission')}}"> Online Admission</a></li>
                    @if(auth('admin')->user())
                    <li><a href="{{ route('admin.dashboard')}}"> Dashboard</a></li>
                    @elseif(auth('principle')->user())
                    <li><a href="{{ route('principle.dashboard')}}"> Dashboard</a></li>
                    @elseif(auth('accountant')->user())
                    <li><a href="{{ route('accountant.dashboard')}}"> Dashboard</a></li>
                    @elseif(auth('hr')->user())
                    <li><a href="{{ route('hr.dashboard')}}"> Dashboard</a></li>
                    @elseif(auth('teacher')->user())
                    <li><a href="{{ route('teacher.dashboard')}}"> Dashboard</a></li>
                    @elseif(auth('student')->user())
                    <li><a href="{{ route('student.dashboard')}}"> Dashboard</a></li>
                    @elseif(auth()->user())
                    <li><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    @else

                    <li><a href="{{ route('schoolportal')}}"> School Portal</a></li>
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
        <a href="{{ route('home')}}">
            <img style="width: 55px;" src="{{ asset('frontend')}}/assets/images/logo/logo.png" alt="logo">
        </a>
        <div class="mm-cross-icon">
            <i class="fa fa-times mm-ci"></i>
        </div>
    </div>
    <div class="mm-menu">
        <div class="accordion" id="accordionExample">
            <div class="menu-box">
                <div class="menu-link">
                    <a href="{{ route('home')}}"><i class="fa fa-home mr-2"></i>Home</a>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link" id="headingTwo">
                    <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseTwo"> Masjid<i class="fa fa-plus"></i></a>
                </div>
                <div id="collapseTwo" class="collapse menu-body" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('nikah')}}"><i class="fa fa-long-arrow-right"></i>Nikah/Marriage Services</a></li>
                            <li><a href="{{ route('daily')}}"><i class="fa fa-long-arrow-right"></i> Friday Prayers</a></li>
                            <li><a href="{{ route('quran')}}"><i class="fa fa-long-arrow-right"></i> Qur’an Tafsir</a>
                        </li><li><a href="{{ route('ramadan')}}"><i class="fa fa-long-arrow-right"></i> Ramadan</a></li>

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
                <div class="menu-link" id="headingThree">
                    <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseThree"> RA Foundation Program <i class="fa fa-plus"></i></a>
                </div>
                <div id="collapseThree" class="collapse menu-body" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <ul>
                            <li>
                            <a href="{{ route('aims')}}"><i class="fa fa-long-arrow-right"></i> Aims and objectives</a>
                            </li>
                            <li>
                            <a href="{{ route('nazirah')}}"><i class="fa fa-long-arrow-right"></i> Nazirah Program</a>
                            </li>
                            <li>
                            <a href="{{ route('alim')}}l"><i class="fa fa-long-arrow-right"></i>Alim Program</a>
                            </li>
                            <li>
                            <a href="{{ route('afterschool')}}"><i class="fa fa-long-arrow-right"></i> After School Matab</a>
                            
                            </li>
                            <li>
                            <a href="{{ route('weekendmaktab')}}"><i class="fa fa-long-arrow-right"></i> Weekend Maktab</a>
                            
                            </li>
                           

                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu-box">
                <div class="menu-link" id="headingFour">
                    <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseFour"> RA Foundation Events</a>
                </div>
               
            </div>
            <div class="menu-box">
                <div class="menu-link" id="headingFive">
                    <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseFive"> Generous Donation</a>
                </div>
               
            </div>
            <div class="menu-box">
                <div class="menu-link" id="headingSix">
                    <a href="{{ route('admission')}}" class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseSix"> Admission</a>
                </div>
               
            </div>
            <div class="menu-box">
                <div class="menu-link">
                    
                    <a href="{{ route('schoolportal')}}"> School Portal</a>
                </div>
            </div>
        </div>
    </div>
</div>