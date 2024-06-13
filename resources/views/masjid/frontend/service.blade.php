@extends('masjid.frontend.layout.master')
@section('title','Service')
@section('masjidContent')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('masjid.index')}}">Home</a> / Services</span>
                </div>
                  <div class="page-title">
                    <h2>Services</h2>
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
                    <h3>Our Special Services</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="service-box common-shadow">
                    <img src="{{ asset('masjid/assets/images/service/love.png')}}" alt="">
                    <h2>Weekly Bayaan (Lecture)</h2>
                    <p>A 15 to 20 mins. lecture every Saturday in which the rulings of Shariah pertaining to different aspects of everyday life including dealings, social life and Islamic ethics are discussed.</p>
                    <a href="{{ route('masjid.service.details')}}" class="btn btn-primary">Learn more..</a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="service-box common-shadow">
                    <img src="{{ asset('masjid/assets/images/service/love.png')}}" alt="">
                    <h2>Monthly YOUTH Program</h2>
                    <p>A program conducted every 1st Saturday of the month. The purpose is to educate our youth about our rich Islamic history, heritage & values. Virtues of the current Islamic month and relevant historical events are also discussed.</p>
                     <a href="#" class="btn btn-primary">Learn more..</a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="service-box common-shadow">
                    <img src="{{ asset('masjid/assets/images/service/love.png')}}" alt="">
                    <h2>FIQH CLASS FOR YOUTH</h2>
                    <p>A curriculum based Fiqh class for high-school and college students where extensive religious Masa’il are discussed together with the relevant evidences from the Quran and Hadith (Prophetic Traditions).</p>
                     <a href="#" class="btn btn-primary">Learn more..</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
