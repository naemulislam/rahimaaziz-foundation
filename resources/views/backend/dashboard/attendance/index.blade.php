@extends('backend.layouts.master')
@section('title', 'Attendance List')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Student Attendance List</h3>

                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Class</th>
                                        <th>Attendance Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getAttendances as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->group->name}}</td>
                                        <td>{{ $row->attendance_date}}</td>
                                        <td>
                                            <a href="{{ route('admin.student.atten.show',['group'=>$row->group_id, 'date'=>$row->attendance_date])}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                            <a id="delete" href="{{ route('admin.student.atten.destroy',['group'=>$row->group_id, 'date'=>$row->attendance_date])}}" class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
