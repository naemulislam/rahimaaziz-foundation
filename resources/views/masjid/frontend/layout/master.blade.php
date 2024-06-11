<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('masjid') }}/assets/images/logo/favicon-32x32.png" type="image/x-icon">

    <!-- Font Awesome cdn link -->
    <link rel="stylesheet" href="{{ asset('masjid/assets/css/font-awesome.min.css') }}" />
    <!-- Owl-carosul css cdn link -->
    <link rel="stylesheet" href="{{ asset('masjid/assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('masjid/assets/css/owl.theme.default.css') }}" />
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('masjid/assets/css/bootstrap_v4.min.css') }}">
    <!--Social icon css link-->
    <!-- theme style css -->
    <link rel="stylesheet" href="{{ asset('masjid') }}/assets/css/custome.css">
    <link rel="stylesheet" href="{{ asset('masjid') }}/assets/css/responsive.css">
    @yield('customcss')
</head>

<body>
    <!-- Start Header & Navigation Section -->
    @include('masjid/frontend.layout.header')
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
    <script src="{{ asset('masjid') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('masjid/assets/js/bootstrap_v4.min.js') }}"></script>
    <!-- Owl-carosul js file cdn link -->
    <script src="{{ asset('masjid/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('masjid') }}/assets/js/owl-extra-code.js"></script>
    <script src="{{asset('masjid/assets/js/jquery.hijri.date.js')}}"></script>
    <script>
        $('.hijriDate').hijriDate();
    </script>


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
