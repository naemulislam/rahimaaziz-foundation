@extends('frontend.layout.master')
@section('title','Achivement')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / achivement</span>
                </div>
                  <div class="page-title">
                    <h2>Achivement</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
    <!--Start our achivement Section-->
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                @foreach ($achievements as $achievement)
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                        <div class="achivement-box common-shadow">
                            <a href="{{ route('achivement.details', $achievement->slug) }}">
                                <div class="achivement-img">
                                    <img src="{{ asset($achievement->document) }}" alt="">
                                </div>
                                <div class="achivement-detls">
                                    <h4>{{ $achievement->title }}</h4>
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ \Carbon\Carbon::parse($achievement->date)->format(' j F Y ') }}</span>
                                    @php
                                        $description = $achievement->description;
                                        $plainTextDescription = strip_tags($description);
                                    @endphp

                                    <p>{{ Str::limit($plainTextDescription, 150, '...') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end our achivement Section-->
    @endsection
