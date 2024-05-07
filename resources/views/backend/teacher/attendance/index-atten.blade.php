@extends('backend.layouts.dashboard')
@section('title', 'Attendance Sheet')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Attendance</h5>
                    <!--end::Page Title-->
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
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Attendance Sheet</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('teacher.attendance.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>

                        </div>

                        <!--begin::Form-->
                        <form action="{{route('teacher.attenUpdate')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Roll</th>
                                            <th>class</th>
                                            <th>Attendance</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($get_students as $row)

                                        @php
                                        $get_admission = \App\Models\Studentadmission::where('id',$row->admission_id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$get_admission->student->name}}</td>
                                            <td>{{$get_admission->roll}}</td>
                                            <td>{{$row->class->class_name}}</td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input @if($row->attendence_status == 1) checked @endif class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Present</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input @if($row->attendence_status == 0) checked @endif class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio2" value="0">
                                                    <label class="form-check-label" for="inlineRadio2">Absent</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input @if($row->attendence_status == 2) checked @endif class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio2" value="2">
                                                    <label class="form-check-label" for="inlineRadio3">Late</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input @if($row->attendence_status == 3) checked @endif class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio2" value="3">
                                                    <label class="form-check-label" for="inlineRadio3">Sick</label>
                                                </div>
                                            </td>
                                            <td>{{$row->attendance_date}}</td>

                                        </tr>

                                        @endforeach


                                    </tbody>
                                </table>
                                <button class="btn btn-primary">Update</button>
                                <!--end: Datatable-->
                            </div>

                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@section('customjs')



@endsection
@endsection