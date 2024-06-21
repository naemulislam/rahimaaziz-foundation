@extends('frontend.layout.master')
@section('title','Gallery')
@section('content')
<style>
.gallery-box {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    width: 100%;
    border: 3px solid #000338;
    position: relative;
    height: 200px;
    border-radius: 5px;
}
.gallery-box > a > img{ width: 100%; height: 100%;}
.sl-wrapper {
    z-index: 999999;
}
.sl-wrapper .sl-close {
    color: #fff;
}
.sl-wrapper .sl-counter {
    color: #fffcfc;
}
</style>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / galleries</span>
                </div>
                  <div class="page-title">
                    <h2>Galleries</h2>
                  </div>
            </div>
        </div>
    </div>
</section>
<section class="my-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="gallery">
                    <div class="row">
                        @foreach ($galleries as $gallery)
                        <div class="col-md-3 mb-3">
                            <div class="gallery-box">
                                <a href="{{asset($gallery->image)}}" class="big">
                                    <img src="{{asset($gallery->image)}}" alt="" title="Beautiful Image"/>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    (function() {
            var $gallery = new SimpleLightbox('.gallery a', {});
        })();
</script>
@endpush
