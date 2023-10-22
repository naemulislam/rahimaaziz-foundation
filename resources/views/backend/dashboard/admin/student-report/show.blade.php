@extends('backend.layouts.dashboard')
@section('title', 'Daily Report Details')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student daily report details</h5>
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
                        <h3 class="card-label">Student Report Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ url(URL::previous()) }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        @php
                        $get_stu = \App\Models\Studentadmission::where('id',$data->admission_id)->first();
                        @endphp


                        <b class="col-sm-3">Student Name </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $get_stu->student->name}}</dd>
                        <b class="col-sm-3">Roll </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $get_stu->roll}}</dd>
                        <b class="col-sm-3">Subject Name </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->subject_name}}</dd>
                        <b class="col-sm-3">Page Number </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->page}}</dd>
                        <b class="col-sm-3">juj Number </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->para}}</dd>
                        <b class="col-sm-3">Description </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{!! $data->description !!}</dd>

                        <b class="col-sm-3">Report Date</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->report_date }}</dd>
                        <b class="col-sm-3">Report Type</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($data->report_type == 1)
                            Running Tilawat.
                            @elseif($data->report_type == 2)
                            Daor Review.
                            @elseif($data->report_type == 3)
                            Daor Amokta.
                            @else
                            Null.
                            @endif

                        </dd>
                        <b class="col-sm-3">Status</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($data->teacher_review== 0)
                            Pending
                            @elseif($data->teacher_review== 1)
                            Completed
                            @elseif($data->teacher_review== 2)
                            InComplete
                            @elseif($data->teacher_review== 3)
                            Rejected
                            @endif

                        </dd>
                        <b class="col-sm-3">report Photo</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            <img style="width:200px ;" src="@if(!empty($data->image)){{asset($data->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                        </dd>
                        <b class="col-sm-3">Action</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            <a href="" class="btn btn-success mr-2">Review</a>

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