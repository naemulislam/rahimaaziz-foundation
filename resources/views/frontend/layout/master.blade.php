<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/logo/favicon-32x32.png" type="image/x-icon">

    <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" />
    <!-- Owl-carosul css cdn link -->

    <link type="text/css" rel="stylesheet" href="{{ asset('frontend') }}/assets/css/jpreview.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('defaults/toastr/toastr.min.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/simple-lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/dataTable.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap_v4.min.css') }}">

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/themify-icons.css"> --}}
    <!--Social icon css link-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/social.css">
    <!-- theme style css -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/custome.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
    @yield('customcss')
</head>
<body>
    <!-- Start Top Header Section -->
    <section class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">

                        <li>
                            <i class="fa fa-phone"></i>
                            <span>Call us: {{ $setting->phone ?? '' }}</span>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{ $setting->email ?? '' }}">{{ $setting->email ?? '' }}</a>
                        </li>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="social-icons">
                        <li><a target="_blank" href="{{ $setting->facebook_link ?? '' }}"><i
                                    class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="{{ $setting->twitter_link ?? '' }}"><i
                                    class="fa fa-twitter"></i></a></li>

                        <li><a target="_blank" href="{{ $setting->youtube_link ?? '' }}"><i
                                    class="fa fa-youtube"></i></a></li>
                        <li><a target="_blank" href="{{ $setting->linkedin_link ?? '' }}"><i
                                    class="fa fa-linkedin"></i></a></li>
                        <li><a target="_blank" href="#" class="text-decoration-none"> Go to maszid ar rahman</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Header Section -->
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
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="ft-para">
                        <div class="ft-logo">
                            <img style="width:126px;" src="{{ asset($setting->black_logo ?? '') }}" alt="">
                        </div>
                        <h5>RA FOUNDATION New York For a peaceful and prosperous community, it is vital that we have a
                            good relationship with people of all faiths and beliefs. We are heavily invested with
                            keeping up with local interfaith movements as well as taking part in local interfaith
                            programs.</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="ft-para">
                        <div class="ft-title">
                            <h2> Contact Info</h2>
                        </div>
                        <ul>
                            <li>Email:info@rahimaazizfoundation.com</li>
                            <li>Phone:+65745877444 </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="ft-para">
                        <div class="ft-title">
                            <h2> More Info</h2>
                        </div>
                        <ul>
                            <li><a href="#">About Rahima Aziz Foundation</a></li>
                            <li><a href="#">About Maszid ar Rahman</a></li>
                            <li><a href="#">Our Programs</a></li>
                        </ul>
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
                        <p>Copyright © <?php echo date('Y'); ?> <a href="#">{{ $setting->site_name ?? '' }}</a>- All
                            Rights Reserved. Developed by <a href="#">Engr.Naemul Islam</a></p>
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
    <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

    <script src="{{ asset('frontend/assets/js/bootstrap_v4.min.js') }}"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap-prettyfile.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jpreview.js"></script>

    <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>
    <!-- Owl-carosul js file cdn link -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl-extra-code.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/simple-lightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/dataTables.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/dataTables.bootstrap4.js"></script>


    <!-- Toastr -->
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            toastr.info("{{ Session::get('info') }}");
        </script>
    @endif
    @stack('scripts')

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
