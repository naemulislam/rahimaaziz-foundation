@extends('backend.student.layouts.master')
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
                        <b class="col-sm-3">Subject Name </b>
                        <b class="col-sm-8">{{ $dailyReport->report_name }}</b>
                        <b class="col-sm-3">Page Number </b>
                        <b class="col-sm-8">{{ $dailyReport->page }}</b>
                        <b class="col-sm-3">jug Number </b>
                        <b class="col-sm-8">{{ $dailyReport->juz_number }}</b>
                        <b class="col-sm-3">Line Number </b>
                        <b class="col-sm-8">{{ $dailyReport->line_number }}</b>
                        <b class="col-sm-3">Description </b>
                        <b class="col-sm-8">{!! $dailyReport->description !!}</b>

                        <b class="col-sm-3">Report Date</b>
                        <b class="col-sm-8">{{ $dailyReport->report_date }}</b>
                        <b class="col-sm-3">Report Type</b>
                        <b class="col-sm-8">
                            @if ($dailyReport->teacher_review == 0)
                                <a href="#" class="btn label label-lg label-light-danger label-inline">pending</a>
                            @elseif($dailyReport->teacher_review == 1)
                                <a href="#" class="btn label label-lg label-light-success label-inline">Completed</a>
                            @elseif($dailyReport->teacher_review == 2)
                                <a href="#" class="btn label label-lg label-light-info label-inline">Incomplete</a>
                            @elseif($dailyReport->teacher_review == 3)
                                <a href="#" class="btn label label-lg label-light-warning label-inline">Rejected</a>
                            @endif

                        </b>
                        <b class="col-sm-3">Report Status</b>
                        <b class="col-sm-8">
                            @if ($dailyReport->teacher_review == 0)
                                Pending
                            @elseif($dailyReport->teacher_review == 1)
                                Completed
                            @elseif($dailyReport->teacher_review == 2)
                                Incomplete
                            @elseif($dailyReport->teacher_review == 3)
                                Rejected
                            @endif

                        </b>
                        <b class="col-sm-3">Submitted To:</b>
                        <b class="col-sm-8">{{ $teacher->name }}</b>
                        <b class="col-sm-3">report Photo</b>
                        <b class="col-sm-8">
                            <img style="width:200px ;"
                                src="@if (!empty($dailyReport->image)) {{ asset($dailyReport->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
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
