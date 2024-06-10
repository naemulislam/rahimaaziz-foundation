@extends('masjid/frontend.layout.master')
@section('title', 'Home')
@section('content')
<!-----start Salah Calender------>
<section class="salah-section">
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center text-white d-flex justify-content-between">
                <h5>Salah Calender</h5>
                <h5>{{now();}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Dawn Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>FAJR</h2>
                    </div>
                    <div class="salah-time">
                        <h4>5:00 AM</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Noon Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>DHUHR</h2>
                    </div>
                    <div class="salah-time">
                        <h4>5:00 AM</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Afternoon</h3>
                    </div>
                    <div class="salah-name">
                        <h2>ASR</h2>
                    </div>
                    <div class="salah-time">
                        <h4>5:00 AM</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Sunset Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>MAGHRIB</h2>
                    </div>
                    <div class="salah-time">
                        <h4>5:00 AM</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Evening Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>ISHA</h2>
                    </div>
                    <div class="salah-time">
                        <h4>5:00 AM</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Jummah</h3>
                    </div>
                    <div class="salah-name">
                        <h2>PRAYER</h2>
                    </div>
                    <div class="salah-time">
                        <h4>5:00 AM</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----- end Salah Calender------>
    <!-- Start main slider section-->
    <section class="mb-4">
        <div class="slider-box">
            <div class="mail-slider owl-carousel owl-theme">
                <div class="item">
                    <div class="slider-img">
                        <img src="{{ asset('frontend/assets/images/slideshow/img1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-img">
                        <img src="{{ asset('frontend/assets/images/slideshow/img2.jpg') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-img">
                        <img src="{{ asset('frontend/assets/images/slideshow/img3.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End main slider section-->

    <!-- Start Text & image Section -->
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="common-shadow p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-img">
                                    <img src="{{ asset('frontend') }}/assets/images/about/about2.png" alt=""
                                        class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-section mt-3">
                                    <h3 class="welcome-text">Welcome to Masjib Ar Rahman</h3>

                                    <p class="mb-3"> Masjid ar Rahman serves as the central hub for the Muslims in the area. We have a thriving and ever-growing community surrounding the Masjid that participates daily in the Masjid activities. Whether you are a new Muslim, a non-Muslim or have always been a Muslim, we invite you to come to the Masjid to participate in the Masjid activities and learn more about Islam.</p>
                                    <div class="row mt-4">
                                        <div class="col-md-6"><a href="{{ route('masjid.index')}}" class="btn-about mr-2">About MAS JID</a></div>
                                        <div class="col-md-6"> <a href="{{ route('home')}}" class="btn-about">About RA Foundation</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Text & image Section -->
    <!--Start our program section-->
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>OUR SERVICES</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="program-box common-shadow">
                        <h2>WEEKLY BAYAAN (LECTURE)</h2>
                        <p>A 15 to 20 mins. lecture every Saturday in which the rulings of Shariah pertaining to different aspects of everyday life including dealings, social life and Islamic ethics are discussed.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="program-box common-shadow">
                        <h2>MONTHLY YOUTH PROGRAM</h2>
                        <p>A program conducted every 1st Saturday of the month. The purpose is to educate our youth about our rich Islamic history, heritage & values. Virtues of the current Islamic month and relevant historical events are also discussed.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="program-box common-shadow">
                        <h2>FIQH CLASS FOR YOUTH</h2>
                        <p>A curriculum based Fiqh class for high-school and college students where extensive religious Masa’il are discussed together with the relevant evidences from the Quran and Hadith (Prophetic Traditions).</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end our program section-->
@endsection
