<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
  <base href="../../../">
  <meta charset="utf-8" />
  <title>Teacher Login</title>
  <meta name="description" content="Login page example" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="{{ asset('frontend')}}/assets/images/logo/favicon-32x32.png" type="image/x-icon">
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Page Custom Styles(used by this page)-->
  <link href="{{asset('backend')}}/assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('defaults/toastr/toastr.min.css') }}">
  <!--end::Page Custom Styles-->
  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="{{asset('backend')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('backend')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles-->
 
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
      <!--begin::Aside-->
      <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
          <!--begin::Aside header-->
          <a href="#" class="text-center mb-10">
            <img src="{{asset('frontend')}}/assets/images/logo/logo-light.png" class="max-h-90px" alt="" />
          </a>
          <!--end::Aside header-->
          <!--begin::Aside title-->
          <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Rahima Aziz Foundation Group
          </h3>
          <!--end::Aside title-->
        </div>
        <!--end::Aside Top-->
        <!--begin::Aside Bottom-->
        <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{asset('backend')}}/assets/media/svg/illustrations/login-visual-1.svg)"></div>
        <!--end::Aside Bottom-->
      </div>
      <!--begin::Aside-->
      <!--begin::Content-->
      <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center">
          <!--begin::Signin-->
          <div class="login-form login-signin">
            <!--begin::Form-->
            <form class="form" action="{{route('teacher.login.store')}}" method="POST" novalidate="novalidate" id="kt_login_signin_form">
              @csrf
              <!--begin::Title-->
              <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to Rahima Aziz Foundation</h3>
                <span class="text-muted font-weight-bold font-size-h4">New Here?
                  <a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder">Create an Account</a></span>
              </div>
              <!--begin::Title-->
              <!--begin::Form group-->
              <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="email" name="email" placeholder="Enter your email" />
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                  <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                  <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>
                </div>
                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="password" placeholder="Enter your password" />
              </div>
              <!--end::Form group-->
              <!--begin::Action-->
              <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>

              </div>
              <!--end::Action-->
            </form>
            <!--end::Form-->
          </div>
          <!--end::Signin-->
          <!--begin::Signup-->
          <div class="login-form login-signup">
            <!--begin::Form-->
            <form class="form" action="{{route('teacher.register')}}" method="POST" novalidate="novalidate" id="kt_login_signup_form">
              @csrf
              <!--begin::Title-->
              <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up As Teacher</h3>
                <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
              </div>
              <!--end::Title-->
              <!--begin::Form group-->
              <div class="form-group">
                <label for="">Full Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" placeholder="Fullname" name="name" />
                <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="form-group">
                <label for="">Email<span class="text-danger">*</span></label>
                <input class="form-control" type="email" placeholder="Email" name="email" />
                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
              </div>
              <div class="form-group">
                <label for="">Phone<span class="text-danger">*</span></label>
                <input class="form-control" type="number" placeholder="Phone" name="phone" />
                <div style="color:red;padding:0 5px;">{{($errors->has('phone'))?($errors->first('phone')):''}}</div>
              </div>
              <div class="form-group">
                <label for="">Category<span class="text-danger">*</span></label>
                <select name="category_id" class="form-control" id="adcategory_id">
                  <option>Select Category</option>
                  @foreach($categorys as $category)
                  <option value="{{$category->id}}">{{ $category->category_name}}</option>
                  @endforeach
                </select>
                <div style='color:red; padding: 0 5px;'>{{($errors->has('category_id'))?($errors->first('category_id')):''}}</div>
              </div>
              <div class="form-group">
                <label for="">Subject<span class="text-danger">*</span></label>
                <select name="subject_id" class="form-control" id="adsubject_id">

                </select>

                <div style='color:red; padding: 0 5px;'>{{($errors->has('subject_id'))?($errors->first('subject_id')):''}}</div>
              </div>
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Password" name="password" />
                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirm password" name="password_confirmation" />
                <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="form-group">
                <label class="checkbox mb-0">
                  <input type="checkbox" name="agree" />
                  <span></span>
                  <div class="ml-2">I Agree the
                    <a href="#">terms and conditions</a>.
                  </div>
                </label>
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                <button type="submit" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
              </div>
              <!--end::Form group-->
            </form>
            <!--end::Form-->
          </div>
          <!--end::Signup-->
          <!--begin::Forgot-->
          <div class="login-form login-forgot">
            <!--begin::Form-->
            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
              <!--begin::Title-->
              <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
              </div>
              <!--end::Title-->
              <!--begin::Form group-->
              <div class="form-group">
                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" />
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="form-group d-flex flex-wrap pb-lg-0">
                <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
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
							<span class="mr-1"><?php echo date("Y"); ?>??</span>
							<a href="{{route('home')}}" target="_blank" class="text-dark-75 text-hover-primary">Rahima aziz foundatioan</a>
						</div>
          <a href="{{ route('admin.login')}}" class="text-primary ml-5 font-weight-bolder font-size-lg">Admin Login</a>
          <a href="{{ route('principle.login')}}" class="text-primary font-weight-bolder font-size-lg">Principle Login</a>

          <a href="{{ route('hr.login')}}" class="text-primary ml-5 font-weight-bolder font-size-lg">HR Login</a>
          <a href="{{ route('accountant.login')}}" class="text-primary ml-5 font-weight-bolder font-size-lg">Accountant Login</a>

        </div>
        <!--end::Content footer-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Login-->
  </div>
  <!--end::Main-->
  <!-- <script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
  </script> -->
  <!--begin::Global Config(global config for global JS scripts)-->

  <!--end::Global Config-->
  <!--begin::Global Theme Bundle(used by all pages)-->
  <script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
  <script src="{{asset('backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
  <script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
  <!--end::Global Theme Bundle-->
  <!--begin::Page Scripts(used by this page)-->
  <script src="{{asset('backend')}}/assets/js/pages/custom/login/login-general.js"></script>
  <!--end::Page Scripts-->
  <!-- Sweetalert -->
  <script src="{{ asset('defaults/sweetalert/sweetalert2@9.js') }}"></script>
  <script src="{{ asset('defaults/sweetalert/sweetalertjs.js') }}"></script>
  <!-- Toastr -->
  <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"

    switch (type) {
      case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
      case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
      case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
      case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif
  </script>

  <script>
    $(function() {
      $(document).on('change', '#adcategory_id', function() {
        var category_id = $(this).val();
        $.ajax({
          type: "Get",
          url: "{{url('/teacher/get/subject')}}/" + category_id,
          dataType: "json",
          success: function(data) {
            var html = '<option value="">Select Subject</option>';
            $.each(data, function(key, val) {
              html += '<option value="' + val.id + '">' + val.sub_name + '</option>';
            });
            $('#adsubject_id').html(html);
          },

        });
      });
    });
  </script>

</body>
<!--end::Body-->

</html>