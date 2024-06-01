@extends('frontend.layout.master')
@section('title','Programs')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / program</span>
                </div>
                  <div class="page-title">
                    <h2>Programs</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
  <!--Start our program section-->
  <section class="my-4">
    <div class="container">
        <div class="row">
            @foreach ($programs as $program)
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="image-flip">
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p><img class=" img-fluid"
                                                    src="{{ asset($program->document) }}"
                                                    alt="card image"></p>
                                            <h4 class="card-title">{{ $program->title }}</h4>
                                            @php
                                            $description = $program->description;
                                            $plainTextDescription = strip_tags($description);
                                        @endphp
                                            <p>{{ Str::limit($plainTextDescription, 100, '...') }}</p>
                                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title">{{ $program->title }}</h4>
                                            <p>{{ Str::limit($plainTextDescription, 100, '...') }}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a class="btn btn-primary text-white"
                                                        href="{{ route('program.details',$program->slug) }}">
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
                @endforeach
        </div>
    </div>
</section>
<!--end our program section-->
@endsection
