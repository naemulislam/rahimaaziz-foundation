@extends('backend.teacher.layouts.master')
@section('title', 'Teacher Details')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Ttudent Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('teacher.teacher.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <b class="col-sm-3">Teacher Name </b>
                        <b class="col-sm-9">{{ $teacher->name ?? '' }}</b>
                        <b class="col-sm-3">Teacher Email </b>
                        <b class="col-sm-9">{{ $teacher->email ?? '' }}</b>
                        <b class="col-sm-3">Class Group </b>
                        <b class="col-sm-9">{{ $teacher->group->name ?? '' }}</b>
                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-9">{{ $teacher->phone ?? ''}}</b>
                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-9">
                            @if ($teacher->gender == 'male')
                                Male
                            @elseif($teacher->gender == 'Female')
                                Female
                            @else
                                Not abed yet.
                            @endif
                        </b>
                        <b class="col-sm-3">Date of Birth</b>
                        <b class="col-sm-9">{{ $teacher->date_of_birth ?? '' }}</b>
                        <b class="col-sm-3">Marital Status </b>
                        <b class="col-sm-9">{{ $teacher->marital_status ?? '' }}</b>


                        <b class="col-sm-3">Father Name</b>
                        <b class="col-sm-9">{{ $teacher->father_name ?? '' }}</b>
                        <b class="col-sm-3">Mother Name</b>
                        <b class="col-sm-9">{{ $teacher->mother_name ?? ''}}</b>
                        <b class="col-sm-3">Qualification</b>
                        <b class="col-sm-9">
                            {{ $teacher->qualification ?? '' }}</b>
                        <b class="col-sm-3">Designation</b>
                        <b class="col-sm-9">{{ $teacher->designation ?? '' }}</b>
                        <b class="col-sm-3">Current Abress</b>
                        <b class="col-sm-9">{{ $teacher->c_abress ?? '' }}</b>
                        <b class="col-sm-3">Date of Joining</b>
                        <b class="col-sm-9">{{ $teacher->date_of_joining ?? ''}}</b>
                        <b class="col-sm-3">Status</b>
                        <b class="col-sm-9">
                            @if ($teacher->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </b>
                        <b class="col-sm-3">Teacher Photo</b>
                        <b class="col-sm-9">
                            <img style="width:150px ;"
                                src="@if (!empty($teacher->image)) {{ asset($teacher->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                alt="">
                        </b>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
