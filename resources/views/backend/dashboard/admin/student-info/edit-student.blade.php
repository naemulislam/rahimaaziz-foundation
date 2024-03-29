@extends('backend.layouts.dashboard')
@section('title', 'Edit Student')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Eidt</h5>
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
                            <h3 class="card-title">Student Information Edit</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.student.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.student.update',$student->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter student name" name="name" value="{{ $student->name}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('name') ? $errors->first('name') : '' }}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{ $student->email}}" placeholder="Enter Student email">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('email') ? $errors->first('email') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Phone<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" value="{{ $student->phone}}" placeholder="Enter Student phone">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('phone') ? $errors->first('phone') : '' }}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender<span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender">
                                                <option>Select gender</option>
                                                <option @if($student->gender == 1) selected @endif value="1">Mail</option>
                                                <option @if($student->gender == 2) selected @endif value="2">Femail</option>
                                            </select>

                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('gender') ? $errors->first('gender') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <h4 class="card-title">(If You Can Change This Password. So Enter Password)</h4>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password')}}" placeholder="Enter Password">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('password') ? $errors->first('password') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Confirm Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation')}}" placeholder="Enter confirm password">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="d-block">Picture</label>
                                    <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                        <div class="image-input-wrapper" style="background-image: url({{asset($student->profile_photo_path)}})"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="image" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
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