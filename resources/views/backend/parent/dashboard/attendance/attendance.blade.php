@extends('backend.layouts.dashboard')
@section('title','All Attendance')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Attendance Report List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                   
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
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">{{$student->student->name}} Attendance List
                            <span class="d-block text-muted pt-2 font-size-sm"> daily attendance</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3>Class Count: {{@$class_count}}</h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Present: {{@$present}}</h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Absent: {{@$absent}}</h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Late: {{@$late}}</h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Sick: {{@$sick}}</h3>
                        </div>
                    </div>
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Present/Absent/Late/Sick</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($getAtten as $row)
                            
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->attendance_date}}</td>
                              
                                <td>
                                    @if($row->attendence_status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline">Present</a>
                                    @elseif($row->attendence_status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">Absent</a>
                                    @elseif($row->attendence_status == 2)
                                    <a href="#" class="btn label label-lg label-light-warning label-inline">Late</a>
                                    @elseif($row->attendence_status == 3)
                                    <a href="#" class="btn label label-lg label-light-warning label-inline">Sick</a>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
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