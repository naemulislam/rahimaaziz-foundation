@extends('frontend.layout.master')
@section('title','Weekend')
@section('content')
     <!-- Start NIkha banner section -->
     <section class="weekend-maktab"></section>
    <!-- End NIkha banner section -->
    <!-- Start Nikah details -->
    <section class="daily-dtls">
        <div class="container">
            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-imgdtls mt-30">
                        <h2>Weekend Maktab</h2>


                        <p>Students unable to join the weekdays Maktab can join for 3 hours on Saturdays and Sundays.
                            The objective is similar to the weekdays Maktab, but the progress will be slower.</p>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-img">
                        <img src="{{ asset('frontend')}}/assets/images/others-pase/weekend-maktab-img2.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Nikah details -->
@endsection