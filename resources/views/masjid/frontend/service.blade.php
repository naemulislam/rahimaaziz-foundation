@extends('masjid.frontend.layout.master')
@section('title', 'Service')
@section('masjidContent')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                    <div class="page-breadcrumb">
                        <span><a href="{{ route('masjid.index') }}">Home</a> / Services</span>
                    </div>
                    <div class="page-title">
                        <h2>Services</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="page-heading">
                        <h3>Our Special Services</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4 mb-3">
                        <div class="service-box common-shadow">
                            <img src="{{ asset($service->icon) }}" alt="">
                            <h2>{{ $service->title }}</h2>
                            @php
                                $description = $service->description;
                                $plainText = strip_tags($description);
                            @endphp
                            <p> {{ Str::limit($plainText, 100, '....') }}</p>
                            <a href="{{ route('masjid.service.details', $service->slug) }}" class="btn btn-primary">Learn
                                more..</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
