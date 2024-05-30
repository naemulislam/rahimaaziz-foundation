@extends('frontend.layout.master')
@section('title','Program Details')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / program</span>
                </div>
                  <div class="page-title">
                    <h2>Program Details</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4" style="
background: #383737;
">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="details-box">
                    <div class="details-img">
                        <img src="{{ asset($program->document)}}" alt="">
                    </div>
                    <div class="details-content">
                        <h2>{{$program->title}}</h2>
                        <p>{!! $program->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
