@extends('auth.layout.master')
@section('title','Teacher Login')
@section('content')
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
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to signin</h3>
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
                <label for="">Phone<span class="text-danger">*</span></label>
                <select name="gender" class="form-control" id="">
                  <option>Select a gender</option>
                  <option value="1">Mail</option>
                  <option value="2">Femail</option>
                </select>
                <div style="color:red;padding:0 5px;">{{($errors->has('gender'))?($errors->first('gender')):''}}</div>
              </div>
              <div class="form-group">
                <label for="">Group<span class="text-danger">*</span></label>
                <select name="class_id" class="form-control" id="adcategory_id">
                  <option>Select class group</option>
                  @foreach($class_groups as $class)
                  <option value="{{$class->id}}">{{ $class->class_name}}</option>
                  @endforeach
                </select>
                <div style='color:red; padding: 0 5px;'>{{($errors->has('class_id'))?($errors->first('class_id')):''}}</div>
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
							<span class="mr-1"><?php echo date("Y"); ?>©</span>
							<a href="{{route('home')}}" target="_blank" class="text-dark-75 text-hover-primary">Rahima aziz foundatioan</a>
						</div>
          <a href="{{ route('admin.login')}}" class="text-primary ml-5 font-weight-bolder font-size-lg">Admin Login</a>
          <a href="{{ route('accountant.login')}}" class="text-primary ml-5 font-weight-bolder font-size-lg">Accountant Login</a>

        </div>
        <!--end::Content footer-->
      </div>
      <!--end::Content-->
@endsection