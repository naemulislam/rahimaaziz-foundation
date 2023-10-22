@extends('backend.layouts.dashboard')
@section('title', 'Site Setting')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Site Setting</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Setting Information</h3>

                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            @php
                            $datacount = \App\Models\Setting::count();
                            @endphp
                            <form action="@if( $datacount == 0){{ route('admin.setting.store')}} @else {{ route('admin.setting.update.data',$data->id )}} @endif" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Site Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter site name" name="site_name" value="{{ $data->site_name}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('site_name') ? $errors->first('site_name') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Site Slogan<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="site_slogan" placeholder="Roll site slogan" value="{{ $data->site_slogan}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('site_slogan') ? $errors->first('site_slogan') : '' }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Admission Fee<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">USD</span>
                                            </div>
                                                <input type="text" name="admission_fee" placeholder="Enter admission fee" value="{{ $data->admission_fee}}" class="form-control">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admission_fee') ? $errors->first('admission_fee') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Student Monthly Fees</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">USD</span>
                                            </div>

                                            <input type="text" name="monthly_fees" class="form-control" value="{{$data->monthly_fees}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Student Admission Quota</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"></i>
                                                </span>
                                            </div>

                                            <input type="text" name="admission_quota" class="form-control" value="{{$data->admission_quota}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">people</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">White Logo</label>
                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                                <div class="image-input-wrapper" style="background-image: url({{asset($data->white_logo)}})"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="white_logo" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('white_logo'))?($errors->first('white_logo')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">Black Logo</label>
                                            <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                                <div class="image-input-wrapper" style="background-image: url({{asset($data->black_logo)}})"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="black_logo" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('black_logo'))?($errors->first('black_logo')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Facebook Link<span class="text-danger">*</span></label>
                                            <input type="text" name="facebook_link" placeholder="Facebook Link" value="{{ $data->facebook_link}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('facebook_link') ? $errors->first('facebook_link') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Twitter Link</label>
                                            <input type="text" name="twitter_link" placeholder="Twitter Link" value="{{ $data->twitter_link}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('twitter_link'))?($errors->first('twitter_link')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Instagram Link</label>
                                            <input type="text" name="instagram_link" placeholder="Instagram Link" value="{{ $data->instagram_link}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('instagram_link'))?($errors->first('instagram_link')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Linkeding Link<span class="text-danger">*</span></label>
                                            <input type="text" name="linkedin_link" placeholder="Linkeding Link" value="{{ $data->linkedin_link}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('linkedin_link') ? $errors->first('linkedin_link') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Youtube Link<span class="text-danger">*</span></label>
                                            <input type="text" name="youtube_link" placeholder="Youtube Link" value="{{ $data->youtube_link}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('youtube_link') ? $errors->first('youtube_link') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Copyright Text<span class="text-danger">*</span></label>
                                            <input type="text" name="copyright" placeholder="Copyright text" value="{{ $data->copyright}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('copyright') ? $errors->first('copyright') : '' }}
                                            </div>
                                        </div>
                                    </div>

                                </div>




                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" placeholder="Enter site email" value="{{ $data->email}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="phone" placeholder="Enter phone number" value="{{ $data->phone}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('phone'))?($errors->first('phone')):''}}</div>
                                        </div>
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
</div>
<!--end::Content-->

@endsection