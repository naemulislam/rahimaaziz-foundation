@extends('frontend.layout.master')
@section('title','Alim')
@section('content')
     <!-- Start NIkha banner section -->
     <section class="alim-program"></section>
    <!-- End NIkha banner section -->
    <!-- Start Nikah details -->
    <section class="daily-dtls">
        <div class="container">
            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-imgdtls mt-30">
                        <h2>Alim Program</h2>


                        <p>A seven year course designed to teach a comprehensive knowledge of Arabic literature,
                            grammar, Fiqh, tafseer and hadith. Upon completing the course a person is usually defined as
                            an Alim or Alimah and is ready to lead any Muslim Community in USA. The certificate given to
                            the graduates of this course is equivalent to a Masters Degree.</p>

                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="daily-jumuah-img">
                        <img src="{{ asset('frontend')}}/assets/images/others-pase/alim-program-img2.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Nikah details -->
@endsection