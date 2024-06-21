<section class="footer-section">
    <div class="container">
        <!--Mail Row-->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="ft-para">
                    <div class="ft-logo">
                        <img style="width:126px;" src="{{ asset($setting->white_logo ?? '') }}" alt="">
                    </div>
                    <h5>{!! $setting->address !!}</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="ft-para">
                    <div class="ft-title">
                        <h2> Contact Info</h2>
                    </div>
                    <ul>
                        <li>Email: {{ $setting->email}}</li>
                        <li>Phone: {{ $setting->phone}} </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="ft-para">
                    <div class="ft-title">
                        <h2> More Info</h2>
                    </div>
                    <ul>
                        <li><a href="{{ route('about')}}">About Rahima Aziz Foundation</a></li>
                        <li><a href="{{ route('masjid.index')}}">About Masjid ar Rahman</a></li>
                        <li><a href="{{ route('programs')}}">Our Programs</a></li>
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
