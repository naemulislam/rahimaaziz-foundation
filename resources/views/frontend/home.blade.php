@extends('frontend.layout.master')
@section('title','Home')
@section('content')
<!-- Start main slider section-->
<section class="showcase">
    <div id="myslider" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-slide-to="0" data-target="#myslider" class="active"></li>
            <li data-slide-to="1" data-target="#myslider"></li>
            <li data-slide-to="2" data-target="#myslider"></li>
            <li data-slide-to="3" data-target="#myslider"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item carousel-img-1 active p-bg"></div>
            <div class="carousel-item carousel-img-2 p-bg"></div>
            <div class="carousel-item carousel-img-3 p-bg"></div>
        </div>
        <a href="#myslider" class="carousel-control-prev" role="button" data-slide="prev">
            <i class="fa fa-angle-left slider-control"></i>
        </a>
        <a href="#myslider" class="carousel-control-next" data-slide="next">
            <i class="fa fa-angle-right slider-control"></i>
        </a>
    </div>
</section>
<!-- End main slider section-->

<!-- Start Text & image Section -->
<section class="rahmania-aziz-seciton">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="template-image">
                    <img src="{{ asset('frontend')}}/assets/images/about/about2.png" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-section">
                    <h3 class="underline">Rahima Aziz Foundation<span style="color:#fe4157;"> New York</span></h3>

                    <p class="mb-3">Rahima Aziz Foundation was established in 2021 as a place of prayer, education, and community. The foundation offers a safe space to pray, gain religious education as well as general education, function as a community center, and many more. One of the main objectives is to create a bridge between different cultures and religions as well as give a place to cater to the basic needs of the growing Muslim community.</p>
                    <div>
                        <a href="#" class="btn-about">About RA Foundation</a>
                        <a href="#" class="btn-about">About MAS JID</a>
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
                    <p>RAF is based on providing our students with a well-rounded comprehensive edication that will enable them to be productive and beneficial members of society. Our goal is to be a place in which people of all ages can seek knowledge. We believe education is the foundation of success.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="exprience-content">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h3>Spirituality</h3>
                    <p>As Muslims, there is no greater duty upon us then to know Allah SWT and worship Him. Our spirituality and our awareness of All SWT are what guide us to be our best selves. At RAF, we strive to cultivate this awareness in our students live.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="exprience-content">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h3>Unity</h3>
                    <p>Our objective is to develop, support, and promote an Islamic way of life by ensuring a thriving and vibrant community free of ethnic, racial, cultural or national division It important to live in unity among the greater community.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="exprience-content">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <h3>Prosperity</h3>
                    <p>Prosperity both here and in the here hereafter can be achieved by successfully implementing these three values in ones life: education, spirituality, and unity.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Start Exprience Section-->


<!-- Start of features section
    ============================================= -->
<!-- <section id="features" class="features-section">
        <div class="container">
            <div class="row section-content">
                <div class="features-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="features-text-icon text-center">
                                <div class="features-icon">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                </div>
                                <div class="features-text mt25">
                                    <div class="features-text-title pb10">
                                        <h3 class="deep-black"><a href="#">Madrasa Scholarship</a></h3>
                                    </div>
                                    <div class="features-text-dec">
                                        <span>Dorem Ipsum has been the industry's standard dummy text ever since the en an unknown printer galley dear.</span>
                                    </div>
                                </div>

                                <div class="feature-btn-section">
                                    <a href="#">Learn More</a>
                                </div>

                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="features-text-icon text-center">
                                <div class="features-icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="features-text mt25">
                                    <div class="features-text-title pb10">
                                        <h3 class="deep-black"><a href="#">Madrasa Skilled Lecturers</a></h3>
                                    </div>
                                    <div class="features-text-dec">
                                        <span>Dorem Ipsum has been the industry's standard dummy text ever since the en an unknown printer galley dear.</span>
                                    </div>
                                </div>
                                <div class="feature-btn-section">
                                    <a href="#">Learn More</a>
                                </div>
                        </div>


                        <div class="col-md-4">
                            <div class="features-text-icon text-center">
                                <div class="features-icon">
                                    <i class="fa fa-book" aria-hidden="true"></i>
                                </div>
                                <div class="features-text mt25">
                                    <div class="features-text-title pb10">
                                        <h3 class="deep-black"><a href="#">Madrasa Book Library & Store</a></h3>
                                    </div>
                                    <div class="features-text-dec">
                                        <span>Dorem Ipsum has been the industry's standard dummy text ever since the en an unknown printer galley dear.</span>
                                    </div>
                                </div>
                                <div class="feature-btn-section">
                                    <a href="#">Learn More</a>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- End of features section--->

<!-- Start Our Publications
    ============================================= -->
<!-- <div class="publication-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-4">
                        <h2>Our Publications</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="publication-owl owl-carousel owl-theme">
                    <div class="item">
                        <div class="publication-box">
                            <div class="publi-img-box">
                                <img src="{{ asset('frontend')}}/assets/images/showcase/bookimg2.jpg" alt="">

                                <div class="pbuli-shop">
                                    <a href="#">Shop</a>
                                </div>
                            </div>
                            <div class="publication-btmcontent">
                                <a href="#">Service Marketing</a>
                                <h4>$250</h4>
                            </div>

                        </div>
                    </div>
                    <div class="item">
                        <div class="publication-box">
                            <div class="publi-img-box">
                                <img src="{{ asset('frontend')}}/assets/images/showcase/bookimg2.jpg" alt="">
                                <div class="pbuli-shop">
                                    <a href="#">Shop</a>
                                </div>
                            </div>
                            <div class="publication-btmcontent">
                                <a href="#">Service Marketing</a>
                                <h4>$250</h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="publication-box">
                            <div class="publi-img-box">
                                <img src="{{ asset('frontend')}}/assets/images/showcase/bookimg2.jpg" alt="">
                                <div class="pbuli-shop">
                                    <a href="#">Shop</a>
                                </div>
                            </div>
                            <div class="publication-btmcontent">
                                <a href="#">Service Marketing</a>
                                <h4>$250</h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="publication-box">
                            <div class="publi-img-box">
                                <img src="{{ asset('frontend')}}/assets/images/showcase/bookimg2.jpg" alt="">
                                <div class="pbuli-shop">
                                    <a href="#">Shop</a>
                                </div>
                            </div>
                            <div class="publication-btmcontent">
                                <a href="#">Service Marketing</a>
                                <h4>$250</h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="publication-box">
                            <div class="publi-img-box">
                                <img src="{{ asset('frontend')}}/assets/images/showcase/bookimg2.jpg" alt="">
                                <div class="pbuli-shop">
                                    <a href="#">Shop</a>
                                </div>
                            </div>
                            <div class="publication-btmcontent">
                                <a href="#">Service Marketing</a>
                                <h4>$250</h4>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="publication-box">
                            <div class="publi-img-box">
                                <img src="{{ asset('frontend')}}/assets/images/showcase/bookimg2.jpg" alt="">
                                <div class="pbuli-shop">
                                    <a href="#">Shop</a>
                                </div>
                            </div>
                            <div class="publication-btmcontent">
                                <a href="#">Service Marketing</a>
                                <h4>$250</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->



<!--Start Testimonial Section-->
<section class="campus-section py-5">
    <div class="container">
        <!--Frist row for pricing-->
        <div class="row">
            <div class="col">
                <div class="text-section text-center">
                    <h3 class="underline">Beautiful RAHIMA AZIZ FOUNDATION BUFFALO<span> Campus</span></h3>
                </div>
            </div>
        </div>
        <!--Second row for Slider-->
        <div class="row">
            <div class="campus-owl owl-carousel owl-theme">
                <div class="item">
                    <img src="{{ asset('frontend')}}/assets/images/campas/campus-1.jpg" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('frontend')}}/assets/images/campas/campus-2.jpg" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('frontend')}}/assets/images/campas/campus-3.jpg" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('frontend')}}/assets/images/campas/campus-4.jpg" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('frontend')}}/assets/images/campas/campus-5.jpg" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('frontend')}}/assets/images/campas/campus-6.jpg" alt="">
                </div>

            </div>
        </div>

    </div>
</section>
<!--End Testimonial Section-->

<!--Why to Choose-->
<!-- <section class="whychoose">
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="text-section text-center">
                            <h3 class="underline">Why To Choose<span> RAHIMA AZIZ FOUNDATION BUFFALO School</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="img-text-section text-center">
                            <img src="{{ asset('frontend')}}/assets/images/whychoose/chooseimg-1.png" alt="">
                            <div class="choose-text">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="img-text-section text-center">
                            <img src="{{ asset('frontend')}}/assets/images/whychoose/chooseimg-2.png" alt="">
                            <div class="choose-text">
                                <h3>Minimum tuition and admission fees</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="img-text-section text-center">
                            <img src="{{ asset('frontend')}}/assets/images/whychoose/chooseimg-3.png" alt="">
                            <div class="choose-text">
                                <h3>Minimum tuition and admission fees</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="img-text-section text-center">
                            <img src="{{ asset('frontend')}}/assets/images/whychoose/chooseimg-4.png" alt="">
                            <div class="choose-text">
                                <h3>Minimum tuition and admission fees</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="img-text-section text-center">
                            <img src="{{ asset('frontend')}}/assets/images/whychoose/chooseimg-5.png" alt="">
                            <div class="choose-text">
                                <h3>Minimum tuition and admission fees</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
<!--End Why to Choose-->
<!--The Pillars of Islam Section-->
<!-- <section class="pillars-islam">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="pillars-text-section text-center">
                            <h3 class="underline">The Pillars of Islam</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sec">
                        <div class="islamic-para">
                            <div class="roted-sec">

                            </div>
                            <div class="pillars-sec"></div>
                            <div class="pillars-dec text-center">
                                <h4>Shahadah</h4>
                                <span>Faith</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sec">
                        <div class="islamic-para">
                            <div class="roted-sec">

                            </div>
                            <div class="pillars-sec"></div>
                            <div class="pillars-dec text-center">
                                <h4>Shahadah</h4>
                                <span>Faith</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sec">
                        <div class="islamic-para">
                            <div class="roted-sec">

                            </div>
                            <div class="pillars-sec"></div>
                            <div class="pillars-dec text-center">
                                <h4>Shahadah</h4>
                                <span>Faith</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sec">
                        <div class="islamic-para">
                            <div class="roted-sec">

                            </div>
                            <div class="pillars-sec"></div>
                            <div class="pillars-dec text-center">
                                <h4>Shahadah</h4>
                                <span>Faith</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sec">
                        <div class="islamic-para">
                            <div class="roted-sec">

                            </div>
                            <div class="pillars-sec"></div>
                            <div class="pillars-dec text-center">
                                <h4>Shahadah</h4>
                                <span>Faith</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
<!--End The Pillars of Islam Section-->

<!--Start Audio Library Section-->
<!-- <section class="audiolaibary-section">
            <div class="container">
                <div class="row">
                    <div class="col text-center audio-text">
                        <h5>Islamic Teachings</h5>
                        <h2>Audio Library</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-detles">
                            <div class="cardimg-section">
                                <img src="{{ asset('frontend')}}/assets/images/audio-video/audio-bg.jpg" alt="">

                            </div>
                            <div class="play-icon">
                                <a href="#"><i class="fa fa-play-circle-o"></i></a>
                            </div>

                            <div class="card-body card-text">
                                <h3>Listen For Heart Cure</h3>
                                <div class="row news-icon">
                                    <div class="col-md-6 icon-left">
                                        <span><i class="fa fa-user-o mr-2"></i> Ehsaan Ali</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-right">
                                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                                            <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                            <a href="#"> <i class="fa fa-download"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-detles">
                            <div class="cardimg-section">
                                <img src="{{ asset('frontend')}}/assets/images/audio-video/audio-bg.jpg" alt="">

                            </div>
                            <div class="play-icon">
                                <a href="#"><i class="fa fa-play-circle-o"></i></a>
                            </div>
                            <div class="card-body card-text">
                                <h3>Listen For Heart Cure</h3>
                                <div class="row news-icon">
                                    <div class="col-md-6 icon-left">
                                        <span><i class="fa fa-user-o mr-2"></i> Ehsaan Ali</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-right">
                                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                                            <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                            <a href="#"> <i class="fa fa-download"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-detles">
                            <div class="cardimg-section">
                                <img src="{{ asset('frontend')}}/assets/images/audio-video/audio-bg.jpg" alt="">

                            </div>

                            <div class="play-icon">
                                <a href="#"><i class="fa fa-play-circle-o"></i></a>
                            </div>


                            <div class="card-body card-text">
                                <h3>Listen For Heart Cure</h3>
                                <div class="row news-icon">
                                    <div class="col-md-6 icon-left">
                                        <span><i class="fa fa-user-o mr-2"></i> Ehsaan Ali</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-right">
                                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                                            <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                            <a href="#"> <i class="fa fa-download"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="view-btn">
                    <a href="#">View More</a>
                </div>


            </div>
        </section> -->
<!--End Audio Library Section-->


<!--Start Video Library Section-->
<!-- <section class="audiolaibary-section">
            <div class="container">
                <div class="row">
                    <div class="col text-center audio-text">
                        <h5>Islamic Teachings</h5>
                        <h2>Video Library</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-detles">
                            <div class="cardimg-section">
                                <img src="{{ asset('frontend')}}/assets/images/audio-video/audio-bg.jpg" alt="">

                            </div>
                            <div class="play-icon">
                                <a href="#"><i class="fa fa-play-circle-o"></i></a>
                            </div>

                            <div class="card-body card-text">
                                <h3>Listen For Heart Cure</h3>
                                <div class="row news-icon">
                                    <div class="col-md-6 icon-left">
                                        <span><i class="fa fa-user-o mr-2"></i> Ehsaan Ali</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-right">
                                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                                            <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                            <a href="#"> <i class="fa fa-download"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-detles">
                            <div class="cardimg-section">
                                <img src="{{ asset('frontend')}}/assets/images/audio-video/audio-bg.jpg" alt="">

                            </div>
                            <div class="play-icon">
                                <a href="#"><i class="fa fa-play-circle-o"></i></a>
                            </div>
                            <div class="card-body card-text">
                                <h3>Listen For Heart Cure</h3>
                                <div class="row news-icon">
                                    <div class="col-md-6 icon-left">
                                        <span><i class="fa fa-user-o mr-2"></i> Ehsaan Ali</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-right">
                                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                                            <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                            <a href="#"> <i class="fa fa-download"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card card-detles">
                            <div class="cardimg-section">
                                <img src="{{ asset('frontend')}}/assets/images/audio-video/audio-bg.jpg" alt="">

                            </div>

                            <div class="play-icon">
                                <a href="#"><i class="fa fa-play-circle-o"></i></a>
                            </div>


                            <div class="card-body card-text">
                                <h3>Listen For Heart Cure</h3>
                                <div class="row news-icon">
                                    <div class="col-md-6 icon-left">
                                        <span><i class="fa fa-user-o mr-2"></i> Ehsaan Ali</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="icon-right">
                                            <a href="#"><i class="fa fa-whatsapp"></i></a>
                                            <a href="#"> <i class="fa fa-facebook-official"></i></a>
                                            <a href="#"> <i class="fa fa-download"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="view-btn">
                    <a href="#">View More</a>
                </div>

            </div>
        </section> -->


<!--End Video Library Section-->


<!--Start Latest News Section-->

<!--Start Audio Library Section-->
<section class="audiolaibary-section">
    <div class="container">
        <div class="row">
            <div class="col text-center audio-text">

                <h2>Latest Announcement</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-detles ">
                    <div class="cardnewsimg-section">
                        <img src="{{ asset('frontend')}}/assets/images/latest-news/newslater-img1.jpg" alt="">

                    </div>
                    <div class="card-body card-text">
                        <div class="latest-detls">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat esse,</h3>
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo culpa veritatis harum quos reprehenderit suscipit deleniti.</p>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-detles ">
                    <div class="cardnewsimg-section">
                        <img src="{{ asset('frontend')}}/assets/images/latest-news/newslater-img2.jpg" alt="">

                    </div>
                    <div class="card-body card-text">
                        <div class="latest-detls">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat esse,</h3>
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo culpa veritatis harum quos reprehenderit suscipit deleniti.</p>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card card-detles ">
                    <div class="cardnewsimg-section">
                        <img src="{{ asset('frontend')}}/assets/images/latest-news/newslater-img3.jpg" alt="">

                    </div>
                    <div class="card-body card-text">
                        <div class="latest-detls">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat esse,</h3>
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> MAR 2, 2021</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur rerum, quaerat esse, consequuntur inventore ipsa tempore nihil voluptatem unde deserunt iste, nemo culpa veritatis harum quos reprehenderit suscipit deleniti.</p>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<!--End Latest News Section-->
@endsection
