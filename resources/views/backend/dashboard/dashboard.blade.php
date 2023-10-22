@extends('backend.layouts.dashboard')
@section('title','Dashboard Panel')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
				<!--end::Page Title-->
				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
				<span class="text-muted font-weight-bold mr-4">#XRS-45670</span>
				<a target="_balnk" href="{{route('home')}}" class="btn btn-light-warning font-weight-bolder btn-sm">Website</a>
				<!--end::Actions-->
			</div>
			<!--end::Info-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Actions-->
				<a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Today</a>
				<a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Month</a>
				<a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Year</a>
				<!--end::Actions-->
				<!--begin::Daterange-->
				<a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="Select dashboard daterange" data-placement="left">
					<span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today</span>
					<span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Aug 16</span>
				</a>
				<!--end::Daterange-->
				<!--begin::Dropdowns-->
				<div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
					<a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="svg-icon svg-icon-success svg-icon-lg">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</a>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
						<!--begin::Navigation-->
						<ul class="navi navi-hover py-5">
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-drop"></i>
									</span>
									<span class="navi-text">New Group</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-list-3"></i>
									</span>
									<span class="navi-text">Contacts</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-rocket-1"></i>
									</span>
									<span class="navi-text">Groups</span>
									<span class="navi-link-badge">
										<span class="label label-light-primary label-inline font-weight-bold">new</span>
									</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-bell-2"></i>
									</span>
									<span class="navi-text">Calls</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-gear"></i>
									</span>
									<span class="navi-text">Settings</span>
								</a>
							</li>
							<li class="navi-separator my-3"></li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-magnifier-tool"></i>
									</span>
									<span class="navi-text">Help</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-bell-2"></i>
									</span>
									<span class="navi-text">Privacy</span>
									<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
									</span>
								</a>
							</li>
						</ul>
						<!--end::Navigation-->
					</div>
				</div>
				<!--end::Dropdowns-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
	<!--end::Subheader-->
	@php
	$countadmin = \App\Models\Admin::count();
	$counthr = \App\Models\Hr::count();
	$countclass = \App\Models\Educlass::count();
	$countaccountant = \App\Models\Accountant::count();
	$countteacher = \App\Models\Teacher::where('status',1)->count();
	$countstudent = \App\Models\Studentadmission::where('status',1)->count();
	$countuser = \App\Models\User::count();
	@endphp

	@if(Auth('student')->user())

	<?php
	$stuinfo_data = \App\Models\StudentInfo::where('student_id', Auth('student')->user()->id)->first();
	$admission_data = \App\Models\Studentadmission::where('student_id', Auth('student')->user()->id)->first();

	if($admission_data){
		$countData = \App\Models\StudentActivity::where('admission_id', $admission_data->id)->count();
	$edusumData = \App\Models\StudentActivity::where('admission_id', $admission_data->id)->sum('edurating');
	$bihasumData = \App\Models\StudentActivity::where('admission_id', $admission_data->id)->sum('biharating');
	if ($countData != 0) {
		$ratingAvg = ($edusumData / $countData);
	} else {
		$ratingAvg = 0;
	}
	if ($countData != 0) {
		$bihaviAvg = ($bihasumData / $countData);
	} else {
		$bihaviAvg = 0;
	}
	}

	?>
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
								<!--begin::Toolbar-->
								<div class="d-flex justify-content-end">
									<div class="dropdown dropdown-inline">
										<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="ki ki-bold-more-hor"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover py-5">
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-drop"></i>
														</span>
														<span class="navi-text">New Group</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-list-3"></i>
														</span>
														<span class="navi-text">Contacts</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-rocket-1"></i>
														</span>
														<span class="navi-text">Groups</span>
														<span class="navi-link-badge">
															<span class="label label-light-primary label-inline font-weight-bold">new</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Calls</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-gear"></i>
														</span>
														<span class="navi-text">Settings</span>
													</a>
												</li>
												<li class="navi-separator my-3"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-magnifier-tool"></i>
														</span>
														<span class="navi-text">Help</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Privacy</span>
														<span class="navi-link-badge">
															<span class="label label-light-danger label-rounded font-weight-bold">5</span>
														</span>
													</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
								</div>
								<!--end::Toolbar-->
								<!--begin::User-->
								<div class="d-flex align-items-center">
									<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
										<div class="symbol-label" style="background-image:url(@if(!empty(Auth('student')->user()->profile_photo_path)) {{ asset(Auth('student')->user()->profile_photo_path)}} @else {{ asset('defaults/avatar/avatar.png') }} 
										@endif )"></div>
										<i class="symbol-badge bg-success"></i>
									</div>
									<div>
										<a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{auth('student')->user()->name}}</a>
										<div class="text-muted">Student</div>

									</div>
								</div>
								<!--end::User-->
								<!--begin::Contact-->
								<div class="py-9">
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Email:</span>
										<a href="#" class="text-muted text-hover-primary">{{auth('student')->user()->email}}</a>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Phone:</span>
										<span class="text-muted">{{auth('student')->user()->phone}}</span>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<span class="font-weight-bold mr-2">Location:</span>
										<span class="text-muted">{{ @$stuinfo_data->address}}</span>
									</div>
								</div>
								<!--end::Contact-->
								<!--begin::Nav-->
								<div class="navi navi-bold navi-hover navi-active navi-link-rounded">

									<div class="navi-item mb-2">
										<a href="{{ route('student.dashboard')}}" class="navi-link py-4 active">
											<span class="navi-icon mr-2">
												<span class="svg-icon">
													<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24" />
															<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
											<span class="navi-text font-size-lg">Personal Information</span>
										</a>
									</div>
									<div class="navi-item mb-2">
										<a href="{{route('student.account.info')}}" class="navi-link py-4">
											<span class="navi-icon mr-2">
												<span class="svg-icon">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
															<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
											<span class="navi-text font-size-lg">Admission Information</span>
										</a>
									</div>
									<div class="navi-item mb-2">
										<a href="{{ route('student.epassword')}}" class="navi-link py-4">
											<span class="navi-icon mr-2">
												<span class="svg-icon">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
															<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
															<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
											<span class="navi-text font-size-lg">Change Password</span>
											<span class="navi-label">
												<span class="label label-light-danger label-rounded font-weight-bold">5</span>
											</span>
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
						<form class="form" action="{{ route('student.personal.update',auth('student')->user()->id)}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="card card-custom card-stretch">
								<!--begin::Header-->
								<div class="card-header py-3">
									<div class="card-title align-items-start flex-column">
										<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
										<span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
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
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mb-6">Student Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
										<div class="col-lg-9 col-xl-6">
											<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
												<div class="image-input-wrapper" style="background-image: url(@if(!empty(Auth('student')->user()->profile_photo_path)) {{ asset(Auth('student')->user()->profile_photo_path)}} @else {{ asset('defaults/avatar/avatar.png') }} 
										@endif )"></div>
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
													<i class="fa fa-pen icon-sm text-muted"></i>
													<input type="file" name="image" accept=".png, .jpg, .jpeg" />
													<input type="hidden" name="profile_avatar_remove" />
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
											</div>
											<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label"> Full Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{auth('student')->user()->name}}" />
										</div>
									</div>


									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-phone"></i>
													</span>
												</div>
												<input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{auth('student')->user()->phone}}" placeholder="Phone" />
											</div>
											<span class="form-text text-muted">We'll never share your email with anyone else.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{auth('student')->user()->email}}" placeholder="Email" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<style>
											.fa-star {
												color: #FFA500;
											}

											.fa-star-half {
												color: #FFA500;
											}

											.none {
												color: #bfbebe;
											}
										</style>
										<label class="col-xl-3 col-lg-3 col-form-label">Edication Rating</label>
										<div class="col-lg-9 col-xl-6">
											@if (@$ratingAvg >= 1 && @$ratingAvg <= 1.4) <i class="fa fa-star"></i>
												<i class="fa fa-star none"></i>
												<i class="fa fa-star none"></i>
												<i class="fa fa-star none"></i>
												<i class="fa fa-star none"></i>
												@elseif(@$ratingAvg >= 1.5 && @$ratingAvg <= 1.9) <i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
													<i class="fa fa-star none"></i>
													<i class="fa fa-star none"></i>
													<i class="fa fa-star none"></i>
													@elseif(@$ratingAvg >= 2 && @$ratingAvg <= 2.4) <i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star none"></i>
														<i class="fa fa-star none"></i>
														<i class="fa fa-star none"></i>
														@elseif(@$ratingAvg >= 2.5 && @$ratingAvg <= 2.9) <i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half"></i>
															<i class="fa fa-star none"></i>
															<i class="fa fa-star none"></i>
															@elseif(@$ratingAvg >= 3 && @$ratingAvg <= 3.4) <i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star none"></i>
																<i class="fa fa-star none"></i>
																@elseif(@$ratingAvg >= 3.5 && @$ratingAvg <= 3.9) <i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half"></i>
																	<i class="fa fa-star none"></i>
																	@elseif(@$ratingAvg >= 4 && @$ratingAvg <= 4.4) <i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star none"></i>
																		@elseif(@$ratingAvg >= 4.5 && @$ratingAvg <= 4.9) <i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star-half"></i>
																			@elseif(@$ratingAvg >= 5)
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			@else
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			@endif

										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Bihavior Rating</label>
										<div class="col-lg-9 col-xl-6">
											@if (@$bihaviAvg >= 1 && @$bihaviAvg <= 1.4) <i class="fa fa-star"></i>
												<i class="fa fa-star none"></i>
												<i class="fa fa-star none"></i>
												<i class="fa fa-star none"></i>
												<i class="fa fa-star none"></i>
												@elseif(@$bihaviAvg >= 1.5 && @$bihaviAvg <= 1.9) <i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
													<i class="fa fa-star none"></i>
													<i class="fa fa-star none"></i>
													<i class="fa fa-star none"></i>
													@elseif(@$bihaviAvg >= 2 && @$bihaviAvg <= 2.4) <i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star none"></i>
														<i class="fa fa-star none"></i>
														<i class="fa fa-star none"></i>
														@elseif(@$bihaviAvg >= 2.5 && @$bihaviAvg <= 2.9) <i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half"></i>
															<i class="fa fa-star none"></i>
															<i class="fa fa-star none"></i>
															@elseif(@$bihaviAvg >= 3 && @$bihaviAvg <= 3.4) <i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star none"></i>
																<i class="fa fa-star none"></i>
																@elseif(@$bihaviAvg >= 3.5 && @$bihaviAvg <= 3.9) <i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-half"></i>
																	<i class="fa fa-star none"></i>
																	@elseif(@$bihaviAvg >= 4 && @$bihaviAvg <= 4.4) <i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star none"></i>
																		@elseif(@$bihaviAvg >= 4.5 && @$bihaviAvg <= 4.9) <i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star-half"></i>
																			@elseif(@$bihaviAvg >= 5)
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			<i class="fa fa-star"></i>
																			@else
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			<i class="fa fa-star none"></i>
																			@endif
										</div>
									</div>
								</div>
								<!--end::Body-->
						</form>
						<!--end::Form-->
					</div>
				</div>
				<!--end::Content-->
			</div>
			<!--end::Profile Personal Information-->
		</div>
		<!--end::Container-->
	</div>

	<!--end::Entry-->
	@elseif(Auth::user())
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
								<!--begin::Toolbar-->
								<div class="d-flex justify-content-end">
									<div class="dropdown dropdown-inline">
										<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="ki ki-bold-more-hor"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
											<!--begin::Navigation-->
											<ul class="navi navi-hover py-5">
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-drop"></i>
														</span>
														<span class="navi-text">New Group</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-list-3"></i>
														</span>
														<span class="navi-text">Contacts</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-rocket-1"></i>
														</span>
														<span class="navi-text">Groups</span>
														<span class="navi-link-badge">
															<span class="label label-light-primary label-inline font-weight-bold">new</span>
														</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Calls</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-gear"></i>
														</span>
														<span class="navi-text">Settings</span>
													</a>
												</li>
												<li class="navi-separator my-3"></li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-magnifier-tool"></i>
														</span>
														<span class="navi-text">Help</span>
													</a>
												</li>
												<li class="navi-item">
													<a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-bell-2"></i>
														</span>
														<span class="navi-text">Privacy</span>
														<span class="navi-link-badge">
															<span class="label label-light-danger label-rounded font-weight-bold">5</span>
														</span>
													</a>
												</li>
											</ul>
											<!--end::Navigation-->
										</div>
									</div>
								</div>
								<!--end::Toolbar-->
								<!--begin::User-->
								<div class="d-flex align-items-center">
									<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
										<div class="symbol-label" style="background-image:url(@if(!empty(Auth::user()->profile_photo_path)) {{ asset(Auth::user()->profile_photo_path)}} @else {{ asset('defaults/avatar/avatar.png') }} 
										@endif )"></div>
										<i class="symbol-badge bg-success"></i>
									</div>
									<div>
										<a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->name}}</a>
										<div class="text-muted">Parent</div>

									</div>
								</div>
								<!--end::User-->
								<!--begin::Contact-->
								<div class="py-9">
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Email:</span>
										<a href="#" class="text-muted text-hover-primary">{{Auth::user()->email}}</a>
									</div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="font-weight-bold mr-2">Phone:</span>
										<span class="text-muted">{{Auth::user()->phone}}</span>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<span class="font-weight-bold mr-2">Location:</span>
										<span class="text-muted">{{ Auth::user()->address}}</span>
									</div>
								</div>
								<!--end::Contact-->
								<!--begin::Nav-->
								<div class="navi navi-bold navi-hover navi-active navi-link-rounded">

									<div class="navi-item mb-2">
										<a href="{{ route('dashboard')}}" class="navi-link py-4 active">
											<span class="navi-icon mr-2">
												<span class="svg-icon">
													<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24" />
															<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
															<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
											<span class="navi-text font-size-lg">Personal Information</span>
										</a>
									</div>

									<div class="navi-item mb-2">
										<a href="{{ route('user.epassword')}}" class="navi-link py-4">
											<span class="navi-icon mr-2">
												<span class="svg-icon">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24" />
															<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
															<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
															<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
											</span>
											<span class="navi-text font-size-lg">Change Password</span>
											<span class="navi-label">
												<span class="label label-light-danger label-rounded font-weight-bold">5</span>
											</span>
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
						<form class="form" action="{{ route('personal.update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="card card-custom card-stretch">
								<!--begin::Header-->
								<div class="card-header py-3">
									<div class="card-title align-items-start flex-column">
										<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
										<span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
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
									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mb-6">Parent Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
										<div class="col-lg-9 col-xl-6">
											<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
												<div class="image-input-wrapper" style="background-image: url(@if(!empty(Auth::user()->profile_photo_path)) {{ asset(Auth::user()->profile_photo_path)}} @else {{ asset('defaults/avatar/avatar.png') }} 
										@endif )"></div>
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
													<i class="fa fa-pen icon-sm text-muted"></i>
													<input type="file" name="image" accept=".png, .jpg, .jpeg" />
													<input type="hidden" name="profile_avatar_remove" />
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
											</div>
											<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label"> Full Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{Auth::user()->name}}" />
										</div>
									</div>


									<div class="row">
										<label class="col-xl-3"></label>
										<div class="col-lg-9 col-xl-6">
											<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-phone"></i>
													</span>
												</div>
												<input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{Auth::user()->phone}}" placeholder="Phone" />
											</div>
											<span class="form-text text-muted">We'll never share your email with anyone else.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{Auth::user()->email}}" placeholder="Email" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Address</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" name="address" class="form-control form-control-lg form-control-solid" value="{{Auth::user()->address}}" placeholder="Address" />
											</div>
										</div>
									</div>
								</div>
								<!--end::Body-->
						</form>
						<!--end::Form-->
					</div>
				</div>
				<!--end::Content-->
			</div>
			<!--end::Profile Personal Information-->
		</div>
		<!--end::Container-->
	</div>
	@else



	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-12 col-xxl-4">
					<!--begin::Mixed Widget 1-->
					<div class="card card-custom bg-gray-100 card-stretch gutter-b">
						<!--begin::Header-->

						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body p-0 position-relative overflow-hidden">
							<!--begin::Chart-->
							<div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
							<!--end::Chart-->
							<!--begin::Stats-->
							<div class="card-spacer mt-n25">
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
										<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<a href="@if(auth('admin')->user()){{ route('admin.index')}}@endif" class="text-warning font-weight-bold font-size-h6">Admin ( {{$countadmin}} )</a>
									</div>
									<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
										<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<a href="@if(auth('admin')->user())
										{{route('admin.teacher.index')}} @endif" class="text-primary font-weight-bold font-size-h6 mt-2">Teacher ( {{$countteacher}} )</a>
									</div>

								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
										<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<a href="@if(auth('admin')->user()){{route('admin.admission.index')}} @endif" class="text-warning font-weight-bold font-size-h6">Students ( {{$countstudent}} )</a>
									</div>
									<div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
										<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Accounts ( {{$countaccountant}} )</a>
									</div>

								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row m-0">
									<div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
										<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<a href="@if(auth('admin')->user()){{ route('admin.hr.index')}} @endif" class="text-danger font-weight-bold font-size-h6 mt-2">Class ( {{$countclass}} )</a>
									</div>
									<div class="col bg-light-success px-6 py-8 rounded-xl">
										<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
													<path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
										<a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Parants ( {{$countuser}} )</a>
									</div>
								</div>
								<!--end::Row-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 1-->
				</div>
			</div>
			<!--end::Row-->
			<!--begin::Row-->

			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	@endif
	<!--end::Entry-->
</div>
@endsection