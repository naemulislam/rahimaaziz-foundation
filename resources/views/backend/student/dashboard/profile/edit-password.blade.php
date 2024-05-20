@extends('backend.student.layouts.master')
@section('title', 'student Edit Password')
@section('content')

    @php
        $prefix = Request::route()->getPrefix();
        $route = Route::current()->getName();
        $url = url()->current();
    @endphp

        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Profile Personal Information-->
                    <div class="d-flex flex-row">
                        <!--begin::Aside-->
                        <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                            <!--begin::Profile Card-->
                            <div class="card card-custom card-stretch">
                                <!--begin::Body-->
                                <div class="card-body pt-4">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                            <div class="symbol-label"
                                                style="background-image:url(@if (!empty(Auth('student')->user()->profile_photo_path)) {{ asset(Auth('student')->user()->profile_photo_path) }} @else {{ asset('defaults/avatar/avatar.png') }} @endif)">
                                            </div>
                                            <i class="symbol-badge bg-success"></i>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ Auth('student')->user()->name }}</a>
                                            <div class="text-muted">Student</div>
                                        </div>
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Contact-->
                                    <div class="py-9">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="font-weight-bold mr-2">Email:</span>
                                            <a href="#"
                                                class="text-muted text-hover-primary">{{ Auth('student')->user()->email }}</a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="font-weight-bold mr-2">Phone:</span>
                                            <span class="text-muted">{{ Auth('student')->user()->phone }}</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-weight-bold mr-2">Location:</span>
                                            <span class="text-muted">{{ Auth('student')->user()->H_address }}</span>
                                        </div>
                                    </div>
                                    <!--end::Contact-->
                                    <!--begin::Nav-->
                                    <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                        <div class="navi-item mb-2">
                                            <a href="#" class="navi-link py-4 active">
                                                <span class="navi-icon mr-2">
                                                    <span class="svg-icon">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                                <path
                                                                    d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                                <path
                                                                    d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="navi-text font-size-lg">Change Password</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Nav-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Profile Card-->
                        </div>
                        <!--end::Aside-->
                        <!--begin::Content-->
                        <div class="flex-row-fluid ml-lg-8">
                            <!--begin::Card-->
                            <form class="form" action="{{ route('student.upassword') }}" method="post">
                                @csrf
                                <div class="card card-custom card-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header py-3">
                                        <div class="card-title align-items-start flex-column">
                                            <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                                            <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account
                                                password</span>
                                        </div>
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Form-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Alert-->
                                        <div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
                                            <div class="alert-icon">
                                                <span class="svg-icon svg-icon-3x svg-icon-danger">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" opacity="0.3" cx="12"
                                                                cy="12" r="10"></circle>
                                                            <rect fill="#000000" x="11" y="10" width="2"
                                                                height="7" rx="1"></rect>
                                                            <rect fill="#000000" x="11" y="7" width="2"
                                                                height="2" rx="1"></rect>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <div class="alert-text font-weight-bold">Configure user passwords to expire
                                                periodically. Users will need warning that their passwords are going to
                                                expire,
                                                <br>or they might inadvertently get locked out of the system!
                                            </div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">
                                                        <i class="ki ki-close"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <!--end::Alert-->
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current
                                                Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="password"
                                                    class="form-control form-control-lg form-control-solid mb-2"
                                                    name="current_password" placeholder="Current password">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('current_password') ? $errors->first('current_password') : '' }}
                                                </div>
                                                <a href="#" class="text-sm font-weight-bold">Forgot password ?</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input name="new_password" type="password"
                                                    class="form-control form-control-lg form-control-solid" value=""
                                                    placeholder="New password">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('new_password') ? $errors->first('new_password') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify
                                                Password</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input name="password_confirmation" type="password"
                                                    class="form-control form-control-lg form-control-solid" value=""
                                                    placeholder="Verify password">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Body-->

                                    <!--end::Form-->
                                </div>
                            </form>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Profile Personal Information-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
@endsection
