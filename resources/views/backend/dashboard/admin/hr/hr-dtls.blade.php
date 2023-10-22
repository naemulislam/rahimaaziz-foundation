@extends('backend.layouts.dashboard')
@section('title', 'Hr Details')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Human Resource details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">hr</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
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
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Human Resource Details
                                <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('admin.hr.index') }}"
                                class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                         

                            <b class="col-sm-3">Hr Name </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->name }}</dd>
                            <b class="col-sm-3">Hr Email </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{$hr->email}}</dd>
                           
                           
                            <b class="col-sm-3">Phone</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->phone }}</dd>
                            <b class="col-sm-3">Emergency Number</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->ec_number }}</dd>
                            <b class="col-sm-3">Gender</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if($hr->gender == 1)
                                Mail
                                @elseif($hr->gender == 2)
                                Femail
                                @else
                                Gender not added yet
                                @endif
                            </dd>
                            <b class="col-sm-3">Date of Birth</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->date_of_birth }}</dd>
                            <b class="col-sm-3">Marital Status </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{@$hr->marital_status}}</dd>
                            

                            <b class="col-sm-3">Father Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->father_name }}</dd>
                            <b class="col-sm-3">Mother Name</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->mother_name }}</dd>
                            <b class="col-sm-3">Qualification</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                             
                                {{ @$hr->qualification }}</dd>
                            
                            
                            <b class="col-sm-3">Designation</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->designation }}</dd>
                            <b class="col-sm-3">Current Address</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->c_address }}</dd>
                            <b class="col-sm-3">Parment Addrsss</b>
                            <dd class="col-sm-8">{{ @$hr->p_address }}</dd>
                            <b class="col-sm-3">Department</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->department }}</dd>
                            <b class="col-sm-3">Basic 🇸🇯 </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->basic_salary }}</dd>
                            <b class="col-sm-3">Work Shift</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->work_shift }}</dd>
                            <b class="col-sm-3">work Exprience</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->work_prince }}</dd>
                            <b class="col-sm-3">Date of Joining</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$hr->date_of_joining }}</dd>
                            <b class="col-sm-3">Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if($hr->status == 1)
                                Active
                                @else
                                Inactive
                                @endif
                            </dd>
                            
                            
                            <b class="col-sm-3">Hr Photo</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                            <img style="width:150px ;" src="@if(!empty($hr->profile_photo_path)){{asset($hr->profile_photo_path)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                            </dd>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
