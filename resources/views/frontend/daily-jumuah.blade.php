@extends('frontend.layout.master')
@section('title','Daily Jumuah')
@section('content')
    <!-- Start NIkha banner section -->
    <section class="daily-jumuah"></section>
    <!-- End NIkha banner section -->
    <!-- Start Nikah details -->
    <section class="daily-dtls">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-img">
                        <img src="{{ asset('frontend')}}/assets/images/others-pase/daily-jumuah-prayar-img2.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-imgdtls">
                        <h2>Friday Prayer</h2>
                        <p>According to the history of Islam and the report from Abdullah bn 'Abbas narrated from the
                            Prophet saying that: the permission to perform the Friday prayer was given by Allah before
                            hijrah, but the people were unable to congregate and perform it. The Prophet wrote a note to
                            Mus'ab b. Umair, who represented the Prophet in Madinah to pray two raka'at in congregation
                            on Friday (that is, Jumu'ah). Then, after the migration of the Prophet to Medina, the
                            Jumu'ah was held by him.

                        </p>
                        <p> Visit our premises sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="listen-btn">
                        <a href="#" class="btn-btn-listen">LISTEN TO PAST KHUTBAHS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Nikah details -->
@endsection