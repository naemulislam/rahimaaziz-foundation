@extends('frontend.layout.master')
@section('title', 'Team')
@section('content')
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                    <div class="page-breadcrumb">
                        <span><a href="{{ route('home') }}">Home</a> / About</span>
                    </div>
                    <div class="page-title">
                        <h2>Our Team Members</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <div class="heading-title">
                        <h3>MEET OUR SCHOLARS</h3>
                        <div class="heading-border"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($ourTeams as $ourTeam)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="our-team common-shadow">
                        <div class="pic">
                            <img src="{{ $ourTeam->image ? asset($ourTeam->image): asset('defaults/avatar/avatar2.png') }}">
                        </div>
                        <div class="team-content">
                            <h3 class="title">{{ $ourTeam->name}}</h3>
                            <span class="post">{{ $ourTeam->designation}}</span>
                        </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fa fa-envelope"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
