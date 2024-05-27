@extends('frontend.layout.master')
@section('title', 'Home')
@section('content')
    <!-- Start main slider section-->
    <section class="mb-4">
        <div class="slider-box">
            <div class="mail-slider owl-carousel owl-theme">
                <div class="item">
                    <div class="slider-img">
                        <img src="{{ asset('frontend/assets/images/slideshow/img1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-img">
                        <img src="{{ asset('frontend/assets/images/slideshow/img2.jpg') }}" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="slider-img">
                        <img src="{{ asset('frontend/assets/images/slideshow/img3.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End main slider section-->

    <!-- Start Text & image Section -->
    <section class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="common-shadow p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="template-image">
                                    <img src="{{ asset('frontend') }}/assets/images/about/about2.png" alt=""
                                        class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-section mt-3">
                                    <h3 class="underline"><span style="color:#ffa229;">Welcome to </span>Rahima Aziz
                                        Foundation</h3>

                                    <p class="mb-3">Rahima Aziz Foundation was established in 2021 as a place of prayer,
                                        education, and community. The foundation offers a safe space to pray, gain religious
                                        education as well as general education, function as a community center, and many
                                        more. One of the main objectives is to create a bridge between different cultures
                                        and religions as well as give a place to cater to the basic needs of the growing
                                        Muslim community.</p>
                                    <div>
                                        <a href="#" class="btn-about">About RA Foundation</a>
                                        <a href="#" class="btn-about">About MAS JID</a>
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
                    <div class="exprience-content ">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h3>Education</h3>
                        <p>RAF is based on providing our students with a well-rounded comprehensive edication that will
                            enable them to be productive and beneficial members of society. Our goal is to be a place in
                            which people of all ages can seek knowledge. We believe education is the foundation of success.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content">
                        <i class="fa fa-superpowers" aria-hidden="true"></i>
                        <h3>Spirituality</h3>
                        <p>As Muslims, there is no greater duty upon us then to know Allah SWT and worship Him. Our
                            spirituality and our awareness of All SWT are what guide us to be our best selves. At RAF, we
                            strive to cultivate this awareness in our students live.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h3>Unity</h3>
                        <p>Our objective is to develop, support, and promote an Islamic way of life by ensuring a thriving
                            and vibrant community free of ethnic, racial, cultural or national division It important to live
                            in unity among the greater community.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="exprience-content">
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
    <!--Start Notice board Section-->
    <section class="notice-section">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3 class="text-white">Notice Board</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="notice-box">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="notice-para">
                                    <h3>Notice title</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum accusantium
                                        voluptates recusandae ipsam a vel tempora ex incidunt aliquid quas.</p>
                                    <a href="{{ route('notice') }}" class="btn btn-primary">Read more..</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="notice-para">
                                    <h3>Notice title</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum accusantium
                                        voluptates recusandae ipsam a vel tempora ex incidunt aliquid quas.</p>
                                    <a href="#" class="btn btn-primary">Read more..</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="notice-para">
                                    <h3>Notice title</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum accusantium
                                        voluptates recusandae ipsam a vel tempora ex incidunt aliquid quas.</p>
                                    <a href="#" class="btn btn-primary">Read more..</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="notice-para">
                                    <h3>Notice title</h3>
                                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum accusantium
                                        voluptates recusandae ipsam a vel tempora ex incidunt aliquid quas.</p>
                                    <a href="#" class="btn btn-primary">Read more..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end Notice board Section-->
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
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="image-flip">
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid"
                                                src="{{ asset('frontend/assets/images/others-page/ramdan-img2.jpeg') }}"
                                                alt="card image"></p>
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.</p>
                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.This is basic card with image on top, title, description and button.This
                                            is basic card with image on top, title, description and button.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="btn btn-primary text-white"
                                                    href="{{ route('program.details') }}">
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
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="image-flip">
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid"
                                                src="{{ asset('frontend/assets/images/others-page/ramdan-img2.jpeg') }}"
                                                alt="card image"></p>
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.</p>
                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.This is basic card with image on top, title, description and button.This
                                            is basic card with image on top, title, description and button.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="btn btn-primary text-white" href="#">
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
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="image-flip">
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid"
                                                src="{{ asset('frontend/assets/images/others-page/ramdan-img2.jpeg') }}"
                                                alt="card image"></p>
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.</p>
                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.This is basic card with image on top, title, description and button.This
                                            is basic card with image on top, title, description and button.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="btn btn-primary text-white" href="#">
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
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="image-flip">
                        <div class="mainflip flip-0">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid"
                                                src="{{ asset('frontend/assets/images/others-page/ramdan-img2.jpeg') }}"
                                                alt="card image"></p>
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.</p>
                                        <a href="https://www.fiverr.com/share/qb8D02" class="btn btn-primary btn-sm"><i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h4 class="card-title">Sunlimetech</h4>
                                        <p class="card-text">This is basic card with image on top, title, description and
                                            button.This is basic card with image on top, title, description and button.This
                                            is basic card with image on top, title, description and button.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="btn btn-primary text-white" href="#">
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
                <div class="campus-owl owl-carousel owl-theme">
                    <div class="item">
                        <div class="campus-box">
                            <img src="{{ asset('frontend') }}/assets/images/campas/campus-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="campus-box">
                            <img src="{{ asset('frontend') }}/assets/images/campas/campus-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="campus-box">
                            <img src="{{ asset('frontend') }}/assets/images/campas/campus-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="campus-box">
                            <img src="{{ asset('frontend') }}/assets/images/campas/campus-4.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="campus-box">
                            <img src="{{ asset('frontend') }}/assets/images/campas/campus-5.jpg" alt="">
                        </div>
                    </div>
                    <div class="item">
                        <div class="campus-box">
                            <img src="{{ asset('frontend') }}/assets/images/campas/campus-6.jpg" alt="">
                        </div>
                    </div>
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
                        <h3>Our Achivement</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                    <div class="achivement-box common-shadow">
                        <a href="{{ route('achivement.details') }}">
                            <div class="achivement-img">
                                <img src="{{ asset('frontend') }}/assets/images/latest-news/newslater-img1.jpg"
                                    alt="">
                            </div>
                            <div class="achivement-detls">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                                <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum,
                                    quaerat
                                    esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo
                                    culpa
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
                <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                    <div class="achivement-box common-shadow">
                        <a href="{{ route('news.details') }}">
                            <div class="achivement-img">
                                <img src="{{ asset('frontend') }}/assets/images/latest-news/newslater-img1.jpg"
                                    alt="">
                            </div>
                            <div class="achivement-detls">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h4>
                                <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum,
                                    quaerat
                                    esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo
                                    culpa
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
            <div class="row">
                <div class="col-md-2 mx-auto">
                    <a href="{{ route('news') }}" class="btn btn-primary">View all news</a>
                </div>
            </div>
        </div>
    </section>
    <!--End Latest News Section-->
@endsection
