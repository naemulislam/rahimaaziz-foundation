@extends('frontend.layout.master')
@section('title','About Us')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / About</span>
                </div>
                  <div class="page-title">
                    <h2>About Us</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section my-3">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="welcome-box">
                    <h1>Welcome to Rahima Aziz Foundation</h1>
                    <div class="heading-border"></div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-12">
                <div class="about-box common-shadow">
                    <div class="about-content p-3">
                        <p> {{ strip_tags($about?->description)}}</p>
                    </div>
                    <div class="about-image">
                        <img src="{{asset($about?->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
