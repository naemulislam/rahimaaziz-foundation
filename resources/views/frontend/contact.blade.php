@extends('frontend.layout.master')
@section('title','Contact')
@section('content')
<style type="text/css">

    </style>
<style>
 .contact-heading{
    text-align: center;
    margin-top: 100px;

}
.contact-heading a {
    text-decoration: none;
    color: #fff;
}
.contact-heading .fa {
    margin-left: 5px;
    font-size: 16px;
}
.contact-heading span {
    color: #fff;
}
.contact-heading h2 {
    color: #fff;
    font-size: 50px;
}
/*Start contact-section*/
.container-conact{
    max-width:930px;
    margin: 0 auto;
}
.contact-section{
    background: #F4F6FF;
    padding: 100px 0;
}
.form-section{
    background: #fff;
    padding: 60px 40px;
}
.address h4,.email h4,.phone h4 {
    font-size: 16px;
    font-weight: bold;
}
.address p {
    margin-bottom: 0px;
    color: gray;
}
.email{}

.email a,.phone a{
    color: #05d1d2;
    text-decoration: none;
}
/*map Section*/
#map {
            width: 100%;
            height: 400px;
        }

</style>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / Contact</span>
                </div>
                  <div class="page-title">
                    <h2>Contact Us</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
    <!--Start Contact Section-->
    <section class="contact-section">
        <div class="container-conact">
            <div class="form-section">
                <div class="row">
                    <div class="col">
                        <h2>Let's get in touch</h2>
                        <p>We're open for any suggestion or just to have a chat</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="address">
                            <h4>ADDRESS:</h4>
                            <p>{!! $setting->address !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="email">
                            <h4>Email:</h4>
                            <a target="_blank" href="mailto:{{$setting->email ?? ''}}">
                                <span>{{$setting->email ?? ''}}</span>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="phone">
                            <h4>Phone:</h4>
                            <a href="tel://{{$setting->phone ?? ''}}">
                                <span>{{$setting->phone ?? ''}}</span>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="form">
                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                <div style="color: red; padding:0 5px;">
                                {{($errors->has('name'))? ($errors->first('name')):''}}
                            </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                <div style="color: red; padding:0 5px;">
                                {{($errors->has('email'))? ($errors->first('email')):''}}
                            </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                                <div style="color: red; padding:0 5px;">
                                {{($errors->has('subject'))? ($errors->first('subject')):''}}
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="message" class="form-control"  placeholder="Write your message here.." style="height: 200px;"></textarea>
                                <div style="color: red; padding:0 5px;">
                                {{($errors->has('message'))? ($errors->first('message')):''}}
                            </div>

                            </div>

                        </div>
                        <button class="btn btn-success mt-4" type="submit">Send Message</button>
                    </form>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <a href="{{$setting->facebook_link ?? ''}}" target="_blank" class="mb-3">
                            <div class="button">
                                <div class="icon">
                                    <i class="fa fa-facebook-f"></i>
                                </div>
                                <span>Facebook</span>
                            </div>
                            </a>
                            <a href="{{$setting->twitter_link ?? ''}}" target="_blank" class="mb-3">
                            <div class="button">
                                <div class="icon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <span>Twitter</span>
                            </div>
                            </a>
                            <a href="{{$setting->instagram_link ?? ''}}" target="_blank" class="mb-3">
                            <div class="button">
                                <div class="icon">
                                    <i class="fa fa-instagram"></i>
                                </div>
                                <span>Instagram</span>
                            </div>
                            </a>
                            <a href="{{$setting->linkedin_link ?? ''}}" target="_blank" class="mb-3">
                            <div class="button">
                                <div class="icon">
                                    <i class="fa fa-linkedin"></i>
                                </div>
                                <span>Linkedin</span>
                            </div>
                            </a>
                            <a href="{{$setting->youtube_link ?? ''}}" target="_blank" class="mb-3">
                            <div class="button">
                                <div class="icon">
                                    <i class="fa fa-youtube"></i>
                                </div>
                                <span>YouTube</span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="map-section">
                <div id="map"></div>
            </div> --}}
        </div>
    </section>
    <!--end Contact Section-->

    @section('customjs')
  <script>
function initMap() {
    // var myLatLng = {lat: 22.3038945, lng: 70.80215989999999};
    var myLatLng = {lat: 23.7805733, lng: 90.279192};

    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 13
    });

    var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!',
          draggable: true
        });

     google.maps.event.addListener(marker, 'dragend', function(marker) {
        var latLng = marker.latLng;
        document.getElementById('lat-span').innerHTML = latLng.lat();
        document.getElementById('lon-span').innerHTML = latLng.lng();
     });
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
@endsection
@endsection
