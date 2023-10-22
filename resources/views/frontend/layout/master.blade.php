<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontend')}}/assets/images/logo/favicon-32x32.png" type="image/x-icon">

    <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Owl-carosul css cdn link -->

    <link type="text/css" rel="stylesheet" href="{{ asset('frontend')}}/assets/css/jpreview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
    <link rel="stylesheet" href="{{ asset('defaults/toastr/toastr.min.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend')}}/assets/css/themify-icons.css">
    <!--Social icon css link-->
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/social.css">
    <!-- theme style css -->
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/custome.css">
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/responsive.css">
@yield('customcss')

</head>

<body>
    <!-- Start Top Header Section -->
    <section class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-info">

                        <li>
                            <i class="fa fa-phone"></i>
                            <span>Call us: {{$setting->phone ?? ''}}</span>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{$setting->email ?? ''}}">{{$setting->email ?? ''}}</a>
                        </li>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="social-icons">
                        <li><a target="_blank" href="{{$setting->facebook_link ?? ''}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="{{$setting->twitter_link?? ''}}"><i class="fa fa-twitter"></i></a></li>

                        <li><a target="_blank" href="{{$setting->youtube_link?? ''}}"><i class="fa fa-youtube"></i></a></li>
                        <li><a target="_blank" href="{{$setting->linkedin_link?? ''}}"><i class="fa fa-linkedin"></i></a></li>

                    </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- End Top Header Section -->

    <div class="logo-section">
        <div class="container2">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="logoheader">
                        <img src="{{asset($setting->white_logo ?? '')}}" alt="">
                    </div>
                </div>

                <!-- <div class="col-lg-6 col-md-6 ">
                    <div class="button-section">
                        <a href="#">Donate to Madrasha</a>
                        <a href="#">Donate to Masjid</a>
                    </div>
                </div> -->

            </div>
        </div>

    </div>

    <!-- Start Header & Navigation Section -->

    @include('frontend.layout.header')
    <!--end mobile menu-->
    <!-- End Header -->
    <!-- End Header & Navigation Section -->


    @yield('content')

<!-- Start Footer Section -->

        <section class="footer-section">
            <div class="container">
                <!--Mail Row-->
                <div class="row ft-bg-image">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="ft-para">
                            <div class="ft-logo">
                                <img style="width:126px;" src="{{asset($setting->black_logo ?? '')}}" alt="">
                            </div>
                            <h5>RA FOUNDATION New York For a peaceful and prosperous community, it is vital that we have a good relationship with people of all faiths and beliefs. We are heavily invested with keeping up with local interfaith movements as well as taking part in local interfaith programs.</h5>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="ft-para">
                            <div class="ft-title">
                                <h2>Information</h2>
                            </div>
                            <ul>
                                <li><a href="#">Online Couses</a></li>
                                <li><a href="#">Audio Listening</a></li>
                                <li><a href="#">Our Blog</a></li>
                                <li><a href="#">Our Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="ft-para">
                            <div class="ft-title">
                                <h2> Contact Info</h2>
                            </div>
                            <ul>
                                <li><span style="color: green; font-style: italic;">P:</span>{{$setting->phone ?? ''}}</li>

                                <li>Our Blog</li>
                                <li>Our Events</li>
                                <li>171 Knox Ave,, West Seneca, NY 14224</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="ft-para">
                            <div class="ft-title">
                                <h2> More Info</h2>
                            </div>
                            <!--Start Child row-->
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <!--Child-para one-->
                                    <div class="child-para">
                                        <ul>
                                            <li><a href="#">About Maktab</a></li>
                                            <li><a href="#">Urgent Donation</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            <li><a href="#">Our Sermons</a></li>
                                        </ul>


                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <!--Child-para Two-->
                                    <div class="child-para">
                                        <ul>
                                            <li><a href="#">Our Products</a></li>
                                            <li><a href="#">Our Scholars</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Maktab Gallery</a></li>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                            <!--End Child row-->

                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- End Footer Section -->

        <!-- Start  Copyright Section -->
        <section class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text text-center">
                            <p>Copyright © <?php echo date('Y');?> <a href="#">{{$setting->site_name ?? ''}}</a>- All Rights Reserved. Developed by <a href="#">Ek Technology group</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Copyright Section -->



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
        <script src="{{ asset('frontend')}}/assets/js/jquery.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('frontend')}}/assets/js/bootstrap-prettyfile.js"></script>
        <script src="{{ asset('frontend')}}/assets/js/jpreview.js"></script>

        <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>
        <!-- Owl-carosul js file cdn link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="{{ asset('frontend')}}/assets/js/owl-extra-code.js"></script>


    <!-- Toastr -->
<script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"

            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
            }
        @endif
    </script>
     @yield('customjs')

        <script>
            $(document).ready(function() {


                /*mobile menu*/
                $('.menu-icon').on('click', function() {
                    $('.mobile-menu').toggleClass('mobile-menu-active');
                });
                $('.mm-ci').on('click', function() {
                    $('.mobile-menu').toggleClass('mobile-menu-active');
                });


            });
        </script>


        <script>
            $(document).ready(function() {
                // Add minus icon for collapse element which is open by default
                $(".collapse.show").each(function() {
                    $(this).prev(".menu-link").find(".fa-minus").addClass("fa-minus").removeClass("fa-plus");
                });

                // Toggle plus minus icon on show hide of collapse element
                $(".collapse").on('show.bs.collapse', function() {
                    $(this).prev(".menu-link").find(".fa-plus").removeClass("fa-plus").addClass("fa-minus");
                }).on('hide.bs.collapse', function() {
                    $(this).prev(".menu-link").find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
                });
                /*mobile-menu-click*/
                $('.mmenu-btn').click(function() {
                    $(this).toggleClass("menu-link-active");

                });
            });
        </script>

</body>

</html>
