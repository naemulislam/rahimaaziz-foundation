
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>@yield('title')</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('backend')}}/assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('backend')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('backend')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('defaults/toastr/toastr.min.css') }}">
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		
		<link rel="shortcut icon" href="{{ asset('frontend')}}/assets/images/logo/favicon-32x32.png" type="image/x-icon">
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
						<a href="{{route('home')}}" target="_balnk" class="text-center mb-10">
						<img src="{{asset('frontend')}}/assets/images/logo/logo-light.png" class="max-h-90px" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Rahima Aziz Foundation Group</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url({{ asset('backend')}}/assets/media/svg/illustrations/login-visual-1.svg)"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				@yield('content')
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		
		
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('backend')}}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{asset('backend')}}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{asset('backend')}}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('backend')}}/assets/js/pages/custom/login/login-general.js"></script>
        <script src="{{ asset('defaults/toastr/toastr.min.js') }}"></script>
		<!--end::Page Scripts-->
        <!-- Toastr -->
    
 
<script>
        @if (Session::has('message'))
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
	</body>
	<!--end::Body-->
</html>