<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>Login Portal</title>
    <meta name="description" content="Rahima aziz foundation Login Portal" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <link rel="stylesheet" href="{{ asset('defaults/toastr/toastr.min.css') }}">
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('backend') }}/assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <style>
        .login-content {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .show-password-btn {
            cursor: pointer;
            text-align: right !important;
            font-weight: 700;
        }
    </style>

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="">
            <!--begin::Content-->
            <div
                class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <!--begin::Form-->
                        <form action="{{ route('portal.login.store') }}" method="POST" class="form"
                            novalidate="novalidate" id="kt_login_signin_form">
                            @csrf
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5 text-center">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to Signin
                                </h3>
                                <span class="text-muted font-weight-bold font-size-h4">New Here?
                                    <a href="{{ route('signup.portal') }}"
                                        class="text-primary font-weight-bolder">Create an
                                        Account</a> (only student)</span>
                            </div>
                            <!--begin::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">User Role</label>
                                <select class="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                                    name="user_role">
                                    <option selected disabled>Select a user role</option>
                                    <option value="student">Student</option>
                                    <option value="parent">Parent</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="admin">Admin</option>
                                    {{-- <option>Staff</option> --}}
                                </select>
                                @error('user_role')
                                    <span class="text-danger">Please select a user role</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                                    type="email" name="email" placeholder="Enter your email" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <div class="d-flex justify-content-between mt-n5">
                                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                    <a href="javascript:;"
                                        class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"
                                        id="kt_login_forgot">Forgot Password ?</a>
                                </div>
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg"
                                    type="password" name="password" id="password" placeholder="Enter your password" />

                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <span class="toggle-btn show-password-btn" onclick="togglePasswordVisibility()">Show</span>
                            <!--end::Form group-->
                            <!--begin::Action-->
                            <div class="pb-lg-0 pb-5">
                                <button type="submit" id="kt_login_signin_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign
                                    In</button>

                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                    <!--begin::Signup-->
                    <!--end::Signup-->
                    <!--begin::Forgot-->
                    <div class="login-form login-forgot">
                        <!--begin::Form-->
                        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten
                                    Password ?</h3>
                                <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your
                                    password</p>
                            </div>
                            <!--end::Title-->
                            <!--begin::Form group-->
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6"
                                    type="email" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <!--end::Form group-->
                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap pb-lg-0">
                                <button type="button" id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                <button type="button" id="kt_login_forgot_cancel"
                                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Forgot-->
                </div>
                <!--end::Content body-->
                <!--begin::Content footer-->
                <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                    <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                        <span class="mr-1"><?php echo date('Y'); ?>©</span>
                        <a href="{{ route('home') }}" target="_blank" class="text-dark-75 text-hover-primary">Rahima
                            aziz foundatioan</a>
                    </div>
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Back to home</a>
                </div>
                <!--end::Content footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('backend') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/js/scripts.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/custom/login/login-general.js"></script>
    <!--end::Page Scripts-->
    <!-- Toastr -->
    <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>

    <!-- Toastr -->
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
    @if (Session::has('info'))
        <script>
            toastr.info("{{ Session::get('info') }}");
        </script>
    @endif
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleButton = document.querySelector(".toggle-btn");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleButton.textContent = "Hide";
            } else {
                passwordField.type = "password";
                toggleButton.textContent = "Show";
            }
        }
    </script>
</body>
<!--end::Body-->

</html>
