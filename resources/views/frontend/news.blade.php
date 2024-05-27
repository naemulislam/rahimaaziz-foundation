@extends('frontend.layout.master')
@section('title','News')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / news</span>
                </div>
                  <div class="page-title">
                    <h2>News</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
    <!--Start our achivement Section-->
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                    <div class="achivement-box common-shadow">
                        <a href="{{ route('news.details')}}">
                            <div class="achivement-img">
                                <img src="{{ asset('frontend') }}/assets/images/latest-news/newslater-img1.jpg"
                                    alt="">
                            </div>
                            <div class="achivement-detls">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                                <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat
                                    esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo culpa
                                    veritatis harum quos reprehenderit suscipit deleniti.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                    <div class="achivement-box common-shadow">
                        <div class="achivement-img">
                            <img src="{{ asset('frontend') }}/assets/images/latest-news/newslater-img1.jpg"
                                alt="">
                        </div>
                        <div class="achivement-detls">
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat
                                esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo culpa
                                veritatis harum quos reprehenderit suscipit deleniti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                    <div class="achivement-box common-shadow">
                        <div class="achivement-img">
                            <img src="{{ asset('frontend') }}/assets/images/latest-news/newslater-img1.jpg"
                                alt="">
                        </div>
                        <div class="achivement-detls">
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat
                                esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo culpa
                                veritatis harum quos reprehenderit suscipit deleniti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end our achivement Section-->
    @endsection
