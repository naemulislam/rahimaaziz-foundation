@extends('backend.layouts.dashboard')
@section('title', 'Student Details')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Student</a>
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
                        <h3 class="card-label">Student Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.student.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <b class="col-sm-3">Student Name </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$student->name }}</dd>
                        <b class="col-sm-3">Student Email </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$student->email}}</dd>

                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$student->phone }}</dd>
                        <b class="col-sm-3">Date of birth</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->date_of_birth)
                            {{ @$studentinfo->date_of_birth }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Place of birth</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->place_of_birth)
                            {{ @$studentinfo->place_of_birth }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$student->gender == 1)
                            Mail
                            @elseif(@$student->gender == 2)
                            Femail
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Blood Group</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->blood)
                            {{ @$studentinfo->blood }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Home Address</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->address)
                            {{ @$studentinfo->address }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">City</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->city)
                            {{ @$studentinfo->city }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">State</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->state)
                            {{ @$studentinfo->state }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Zip Code</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$studentinfo->zip_code)
                            {{ @$studentinfo->zip_code }}
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Admission Status</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($get_admission)
                            Admitted
                            @else
                            Not Admitted.
                            @endif
                        </dd>
                        <b class="col-sm-3">Registration Status</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($student->status == 1)
                            Active
                            @else
                            Inactive
                            @endif
                        </dd>
                        <b class="col-sm-3">Student Photo</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            <img style="width:150px ;" src="@if(!empty($student->profile_photo_path)){{asset($student->profile_photo_path)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
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