@extends('backend.student.layouts.master')
@section('title', 'student Edit Password')
@section('content')
<style>
    .show-password-btn {
    cursor: pointer;
    text-align: right !important;
    font-weight: 700;
    margin-top: 10px;
    margin-left: 8px;
}
</style>

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
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-8">
                        <!--begin::Card-->
                        <form class="form" action="{{ route('student.password.update',auth('student')->user()->id) }}" method="post">
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
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                            r="10"></circle>
                                                        <rect fill="#000000" x="11" y="10" width="2" height="7"
                                                            rx="1"></rect>
                                                        <rect fill="#000000" x="11" y="7" width="2" height="2"
                                                            rx="1"></rect>
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
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                                            <div class="d-flex">
                                                <input type="password"
                                                class="form-control form-control-lg form-control-solid mb-2"
                                                name="current_password" placeholder="Current password" id="current-password">
                                            <span class="toggleCurrent-btn show-password-btn"
                                                onclick="togglePasswordVisibility()">Show</span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('current_password') ? $errors->first('current_password') : '' }}
                                            </div>
                                            <a href="#" class="text-sm font-weight-bold">Forgot password ?</a>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="d-flex">
                                                <input name="new_password" type="password"
                                                class="form-control form-control-lg form-control-solid" value=""
                                                placeholder="New password" id="new-password">
                                                <span class="toggleNew-btn show-password-btn"
                                                onclick="toggleNewPassword()">Show</span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('new_password') ? $errors->first('new_password') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify
                                            Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="d-flex">
                                                <input name="password_confirmation" type="password"
                                                class="form-control form-control-lg form-control-solid" value=""
                                                placeholder="Verify password" id="verify-password">
                                                <span class="toggleVerify-btn show-password-btn"
                                                onclick="toggleVerifyPassword()">Show</span>
                                            </div>
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
@push('scripts')
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("current-password");
        var toggleButton = document.querySelector(".toggleCurrent-btn");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>
<script>
    function toggleNewPassword() {
        var passwordField = document.getElementById("new-password");
        var toggleButton = document.querySelector(".toggleNew-btn");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>
<script>
    function toggleVerifyPassword() {
        var passwordField = document.getElementById("verify-password");
        var toggleButton = document.querySelector(".toggleVerify-btn");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.textContent = "Hide";
        } else {
            passwordField.type = "password";
            toggleButton.textContent = "Show";
        }
    }
</script>
@endpush
