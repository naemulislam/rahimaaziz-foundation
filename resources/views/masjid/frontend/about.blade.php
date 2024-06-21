@extends('masjid.frontend.layout.master')
@section('title','About Us')
@section('masjidContent')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('masjid.index')}}">Home</a> / About</span>
                </div>
                  <div class="page-title">
                    <h2>About Us</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="my-4">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="page-heading">
                    <h3>About Our Story</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto mb-3">
                <div class="image-box common-shadow">
                    <img src="{{ asset($about->image)}}" class="image-fluid" alt="">
                </div>
            </div>
            <div class="col-md-12">
                <p class="about-text">{{ strip_tags($about->description)}}</p>
            </div>
        </div>
    </div>
</section>
@endsection
