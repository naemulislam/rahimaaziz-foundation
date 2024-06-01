@extends('frontend.layout.master')
@section('title','News Details')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / news</span>
                </div>
                  <div class="page-title">
                    <h2>News Details</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4" style="
background: #fff;
">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="details-box">
                    <div class="details-img">
                        <img src="{{ asset($news->document)}}" alt="">
                    </div>
                    <div class="details-content">
                        <h2>{{$news->title}}</h2>
                        <p class="descrition-text">{!! $news->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
