@extends('masjid/frontend.layout.master')
@section('title', 'Masjid Home')
@section('masjidContent')
<!-----start Salah Calender------>
<section class="salah-section">
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center text-white d-flex justify-content-between calendar-heading">
                <h5>Salah Calender</h5>
                <h5><span class="hijriDate"></span>/ {{date('d-m-Y');}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Dawn Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>FAJR</h2>
                    </div>
                    <div class="salah-time">
                        <h4>{{ $prayer->fajar ?? ''}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Noon Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>DHUHR</h2>
                    </div>
                    <div class="salah-time">
                        <h4>{{ $prayer->dhuhr ?? ''}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Afternoon</h3>
                    </div>
                    <div class="salah-name">
                        <h2>ASR</h2>
                    </div>
                    <div class="salah-time">
                        <h4>{{ $prayer->asr ?? ''}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Sunset Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>MAGHRIB</h2>
                    </div>
                    <div class="salah-time">
                        <h4>{{ $prayer->maghrib ?? ''}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Evening Prayer</h3>
                    </div>
                    <div class="salah-name">
                        <h2>ISHA</h2>
                    </div>
                    <div class="salah-time">
                        <h4>{{ $prayer->isha ?? ''}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="salah-box common-shadow">
                    <div class="title">
                        <h3>Jummah</h3>
                    </div>
                    <div class="salah-name">
                        <h2>PRAYER</h2>
                    </div>
                    <div class="salah-time">
                        <h4>{{ $prayer->jummah ?? ''}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----- end Salah Calender------>
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
                    <div class="common-shadow p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-img">
                                    <img src="{{ asset($about->image) }}" alt=""
                                        class="img-responsive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-section mt-3">
                                    <h3 class="welcome-text">Welcome to Masjib Ar Rahman</h3>

                                    <p class="mb-3"> {{Str::limit(strip_tags($about->description), 300, '...')}}</p>
                                    <div class="row mt-4">
                                        <div class="col-md-6"><a href="{{ route('masjid.index')}}" class="btn-about mr-2">About MAS JID</a></div>
                                        <div class="col-md-6"> <a href="{{ route('home')}}" class="btn-about">About RA Foundation</a></div>
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
    <!--Start our program section-->
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>OUR SERVICES</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                <div class="col-md-4 mb-3">
                    <div class="service-box common-shadow">
                        <img src="{{ asset($service->icon)}}" alt="">
                        <h2>{{ $service->title}}</h2>
                        @php
                            $description = $service->description;
                            $plainText = strip_tags($description);
                        @endphp
                        <p> {{ Str::limit($plainText, 100, '....')}}</p>
                        <a href="{{ route('masjid.service.details', $service->slug)}}" class="btn btn-primary">Learn more..</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--end our program section-->
@endsection
