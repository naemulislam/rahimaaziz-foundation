@extends('backend.layouts.dashboard')
@section('title', 'Attendance List')
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
            <!-- </div>01711242707 -->
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
                            <h3 class="card-title">Teacher Daily Attendance List</h3>

                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Attendance Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($get_dates as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $row->attendance_date}}</td>
                                        <td>
                                            <a href="{{ route('admin.teacher.atten.show',$row->attendance_date)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                            <a id="delete" href="{{ route('admin.teacher.atten.delete',$row->attendance_date)}}" class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3"><i class="fa fa-trash"></i></a>

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
</div>
<!--end::Content-->

@section('customjs')

<script>
    $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>

@endsection
@endsection