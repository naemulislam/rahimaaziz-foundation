@extends('backend.teacher.layouts.master')
@section('title', 'Daily Report Details')
@section('content')
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
                            $get_stu = \App\Models\Studentadmission::where('id', $report->admission_id)->first();
                        @endphp


                        <b class="col-sm-3">Student Name </b>
                        <b class="col-sm-8">{{ $get_stu->student->name }}</b>
                        <b class="col-sm-3">Roll </b>
                        <b class="col-sm-8">{{ $get_stu->roll }}</b>
                        <b class="col-sm-3">Report Name </b>
                        <b class="col-sm-8">{{ $report->report_name }}</b>
                        <b class="col-sm-3">Page Number </b>
                        <b class="col-sm-8">{{ $report->page }}</b>
                        <b class="col-sm-3">juz Number </b>
                        <b class="col-sm-8">{{ $report->juz_number }}</b>
                        <b class="col-sm-3">Line Number </b>
                        <b class="col-sm-8">{{ $report->line_number }}</b>
                        <b class="col-sm-3">Description </b>
                        <b class="col-sm-8">{!! $report->description !!}</b>

                        <b class="col-sm-3">Report Date</b>
                        <b class="col-sm-8">{{ $report->report_date }}</b>
                        <b class="col-sm-3">Report Type</b>
                        <b class="col-sm-8">
                            @if ($report->report_type == 1)
                                Running Tilawat.
                            @elseif($report->report_type == 2)
                                Daor Review.
                            @elseif($report->report_type == 3)
                                Daor Amokta.
                            @else
                                Null.
                            @endif

                        </b>
                        <b class="col-sm-3">Status</b>
                        <b class="col-sm-8">
                            @if ($report->teacher_review == 0)
                                <a href="#" class="btn label label-lg label-light-danger label-inline">pending</a>
                            @elseif($report->teacher_review == 1)
                                <a href="#" class="btn label label-lg label-light-success label-inline">Completed</a>
                            @elseif($report->teacher_review == 2)
                                <a href="#" class="btn label label-lg label-light-info label-inline">Incomplete</a>
                            @elseif($report->teacher_review == 3)
                                <a href="#" class="btn label label-lg label-light-warning label-inline">Rejected</a>
                            @endif

                        </b>
                        <b class="col-sm-3">report Photo</b>
                        <b class="col-sm-8">
                            <img style="width:200px ;"
                                src="@if (!empty($report->image)) {{ asset($report->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                alt="">
                        </b>
                        <b class="col-sm-3">Action</b>
                        <b class="col-sm-8">
                            <a href="" class="btn btn-success mr-2">Review</a>

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
