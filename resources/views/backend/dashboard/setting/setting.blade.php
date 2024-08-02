@extends('backend.layouts.master')
@section('title', 'Site Setting')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Website Setting Information</h3>

                        </div>
                        <!--begin::Form-->
                        <div class="card-body">

                            <form action=" {{ route('admin.setting.updateSettingData', $data?->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Site Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter site name"
                                                name="site_name" value="{{ $data?->site_name }}">
                                            @error('site_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Site Slogan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="site_slogan"
                                                placeholder="Roll site slogan" value="{{ $data?->site_slogan }}">
                                            @error('site_slogan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" placeholder="Enter site email"
                                                value="{{ $data?->email }}" class="form-control">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" placeholder="Enter phone number"
                                                value="{{ $data?->phone }}" class="form-control">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <textarea name="address" class="form-control" id="summernote">{!! $data?->address !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Facebook Link</label>
                                            <input type="text" name="facebook_link" placeholder="Facebook Link"
                                                value="{{ $data?->facebook_link }}" class="form-control">
                                            @error('facebook_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Twitter Link</label>
                                            <input type="text" name="twitter_link" placeholder="Twitter Link"
                                                value="{{ $data?->twitter_link }}" class="form-control">
                                            @error('twitter_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Instagram Link</label>
                                            <input type="text" name="instagram_link" placeholder="Instagram Link"
                                                value="{{ $data?->instagram_link }}" class="form-control">
                                            @error('instagram_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Linkeding Link</label>
                                            <input type="text" name="linkedin_link" placeholder="Linkeding Link"
                                                value="{{ $data?->linkedin_link }}" class="form-control">
                                            @error('linkedin_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Youtube Link</label>
                                            <input type="text" name="youtube_link" placeholder="Youtube Link"
                                                value="{{ $data?->youtube_link }}" class="form-control">
                                            @error('youtube_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Copyright Text <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="copyright" placeholder="Copyright text"
                                                value="{{ $data?->copyright }}" class="form-control">
                                            @error('copyright')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">White Logo <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="white_logo" class="form-control"
                                                onchange="loadFile(event)" accept=".png,.jpg,.jpeg">
                                            @error('white_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">Black <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="black_logo" class="form-control"
                                                onchange="loadFile2(event)" accept=".png,.jpg,.jpeg">
                                            @error('black_logo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>current Image</label>
                                        <img class="previewImage" src="{{ asset($data?->white_logo) }}" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Preview Image</label>
                                        <img class="previewImage" id="output" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>current Image</label>
                                        <img class="previewImage" src="{{ asset($data?->black_logo) }}" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Preview Image</label>
                                        <img class="previewImage" id="output2" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" value="Submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

@endsection
@push('scripts')
    <script>
        var loadFile2 = function(event) {
            var output2 = document.getElementById('output2');
            output2.src = URL.createObjectURL(event.target.files[0]);
            output2.onload = function() {
                URL.revokeObjectURL(output2.src) // free memory
            }
        };
    </script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Type address for website..',
            height: 120,
        });
    </script>
@endpush
