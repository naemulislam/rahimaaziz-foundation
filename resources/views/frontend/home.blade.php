@extends('frontend.layout.master')
@section('title', 'Home')
@section('content')
    <!-- Start main slider section-->
    <section class="mb-4">
        <div class="slider-box">
            <div class="mail-slider owl-carousel owl-theme">
                @foreach ($sliders as $slider)
                    <div class="item">
                        <div class="slider-img">
                            <img src="{{ asset($slider->image) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End main slider section-->
    <!-- Start Text & image Section -->
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                               <div class="common-shadow p-3 wow animate__animated animate__backInLeft">
                                <div class="template-image">
                                    <img src="{{ asset($about->image) }}" alt=""
                                        class="img-responsive">
                                </div>
                                <div class="text-section mt-3">
                                    <h3 class="underline"><span style="color:#ffa229;">Welcome to </span>Rahima Aziz
                                        Foundation</h3>

                                    <p class="mb-3">{{Str::limit(strip_tags($about->description), 200, '...')}}</p>

                                    <div class="row my-4">
                                        <div class="col-md-6"><a href="{{ route('about') }}" class="btn-about">About RA
                                                Foundation</a></div>
                                        <div class="col-md-6"><a href="{{ route('masjid.index') }}" class="btn-about">About
                                                MAS JID</a></div>
                                    </div>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="common-shadow pb-3 mb-3 wow animate__animated animate__backInRight">
                                    <div class="row">
                                        <div class="col">
                                            <div class="notice-title">
                                                <h3>Notice Board</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="notice-board py-3">
                                                @foreach ($notices as $notice)
                                                <div class="notice">
                                                    <h3>{{$notice->title}}</h3>
                                                    <p class="simple-text">{!! Str::limit($notice->description, 100, '...') !!}</p>
                                                    <a href="{{ route('notice') }}" class="btn-notice">Read more..</a>
                                                </div>
                                                @endforeach
                                                <div class="">
                                                    <a href="{{ route('notice') }}" class="btn-notice float-right">All notices <i
                                                            class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Text & image Section -->
    <!--Start Exprience Section-->
    <section class="exprience-seciton py-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content wow animate__animated animate__backInUp">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h3>Education</h3>
                        <p>RAF is based on providing our students with a well-rounded comprehensive edication that will
                            enable them to be productive and beneficial members of society. Our goal is to be a place in
                            which people of all ages can seek knowledge. We believe education is the foundation of success.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content wow animate__animated animate__backInUp">
                        <i class="fa fa-superpowers" aria-hidden="true"></i>
                        <h3>Spirituality</h3>
                        <p>As Muslims, there is no greater duty upon us then to know Allah SWT and worship Him. Our
                            spirituality and our awareness of All SWT are what guide us to be our best selves. At RAF, we
                            strive to cultivate this awareness in our students live.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content wow animate__animated animate__backInUp">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h3>Unity</h3>
                        <p>Our objective is to develop, support, and promote an Islamic way of life by ensuring a thriving
                            and vibrant community free of ethnic, racial, cultural or national division It important to live
                            in unity among the greater community.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content wow animate__animated animate__backInUp">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                        <h3>Prosperity</h3>
                        <p>Prosperity both here and in the here hereafter can be achieved by successfully implementing these
                            three values in ones life: education, spirituality, and unity.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Start Exprience Section-->
    <!--Start our program section-->
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>Our Program</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                @foreach ($programs as $program)
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="image-flip  wow animate__animated animate__backInUp">
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid" src="{{ asset($program->document) }}"
                                                    alt="card image"></p>
                                            <h4 class="card-title">{{ $program->title }}</h4>
                                            @php
                                                $description = $program->description;
                                                $plainTextDescription = strip_tags($description);
                                            @endphp

                                            <p>{{ Str::limit($plainTextDescription, 100, '...') }}</p>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title">{{ $program->title }}</h4>
                                            <p class="card-text">{{ Str::limit($plainTextDescription, 100, '...') }}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a class="btn btn-primary text-white"
                                                        href="{{ route('program.details', $program->slug) }}">
                                                        Read more
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <a href="{{ route('programs') }}" class="btn btn-primary">View all programs</a>
                </div>
            </div>
        </div>
    </section>
    <!--end our program section-->


    <!--Start Testimonial Section-->
    <section class="campus-section py-5">
        <div class="container">
            <!--Frist row for pricing-->
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>Our Institute</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <!--Second row for Slider-->
            <div class="row">
                <div class="campus-owl owl-carousel owl-theme  wow animate__animated animate__backInUp">
                    @foreach ($campuses as $campus)
                        <div class="item">
                            <div class="campus-box">
                                <img src="{{ asset($campus->image) }}" alt="">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial Section-->
    <!--Start our achivement Section-->
    <section class="audiolaibary-section">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>Our Achievement</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            @php
                use Carbon\Carbon;
            @endphp
            <div class="row mb-3">
                @foreach ($achievements as $achievement)
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                        <div class="achivement-box common-shadow  wow animate__animated animate__backInUp">
                            <a href="{{ route('achivement.details', $achievement->slug) }}">
                                <div class="achivement-img">
                                    <img src="{{ asset($achievement->document) }}" alt="">
                                </div>
                                <div class="achivement-detls">
                                    <h4>{{ $achievement->title }}</h4>
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ Carbon::parse($achievement->date)->format(' j F Y ') }}</span>
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
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <a href="{{ route('achivements') }}" class="btn btn-primary">View all achivements</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end our achivement Section-->
    <!--Start Audio Library Section-->
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>Our Latest News</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                @foreach ($newses as $news)
                    <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                        <div class="achivement-box common-shadow  wow animate__animated animate__backInUp">
                            <a href="{{ route('news.details', $news->slug) }}">
                                <div class="achivement-img">
                                    <img src="{{ asset($news->document) }}" alt="">
                                </div>
                                <div class="achivement-detls">
                                    <h4>{{ $news->title }}</h4>
                                    <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ Carbon::parse($news->date)->format(' j F Y ') }}</span>
                                    @php
                                        $description = $news->description;
                                        $plainTextDescription = strip_tags($description);
                                    @endphp

                                    <p>{{ Str::limit($plainTextDescription, 150, '...') }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <a href="{{ route('news') }}" class="btn btn-primary">View all news</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Latest News Section-->
@endsection
