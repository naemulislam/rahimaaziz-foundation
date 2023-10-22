@extends('frontend.layout.master')
@section('title','Ramadan')
@section('content')
    <!-- Start NIkha banner section -->
    <section class="ramadan-bg"></section>
    <!-- End NIkha banner section -->


    <!-- Start Nikah details -->
    <section class="daily-dtls">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-img">
                        <img src="{{ asset('frontend')}}/assets/images/others-pase/ramdan-img2.jpeg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-imgdtls mt-30">
                        <h2>RAMADAN</h2>
                        <p>We established our center in 1954, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.</p>
                        <p>Visit our premises sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="daily-dtls">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-imgdtls mt-30">
                        <h2>RAMADAN</h2>
                        <p>We established our center in 1954, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris .Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua.</p>
                        <p>Visit our premises sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-img">
                        <img src="{{ asset('frontend')}}/assets/images/others-pase/ramdan-img3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Nikah details -->
@endsection