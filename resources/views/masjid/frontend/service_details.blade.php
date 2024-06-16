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
                    <h2>Service Details</h2>
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
                    <h3>{{ $service->title}} Overview</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mb-3">
                <div class="service-details">
                    <p>{!! $service->description !!}</p>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
               <div class="service-details-img">
                <img src="{{ asset($service->image)}}" class="img-fluid" alt="">
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
