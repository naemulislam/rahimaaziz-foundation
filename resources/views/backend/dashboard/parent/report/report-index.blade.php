@extends('backend.layouts.dashboard')
@section('title','All Reports')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Daily Report List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">report List</a>
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
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">{{$student->student->name}} Report List
                            <span class="d-block text-muted pt-2 font-size-sm">my daily report</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('report.index')}}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Back</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Subject Name</th>
                                <th>Date</th>
                                <th>Page</th>
                                <th>Jug</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($getReport as $row)
                            
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->subject_name}}</td>
                                <td>{{$row->report_date}}</td>
                                <td>{{$row->page}}</td>
                                <td>{{$row->para}}</td>
                                <td>
                                    @if($row->report_type == 1)
                                    Running Tilawat.
                                    @elseif($row->report_type == 2)
                                    Daor Review.
                                    @elseif($row->report_type == 3)
                                    Daor Amokta.
                                    @else
                                    Null.
                                    @endif

                                </td>
                                <td>
                                    @if($row->teacher_review == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">pending</a>
                                    @elseif($row->teacher_review == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline">Completed</a>
                                    @elseif($row->teacher_review == 2)
                                    <a href="#" class="btn label label-lg label-light-info label-inline">Incomplete</a>
                                    @elseif($row->teacher_review == 3)
                                    <a href="#" class="btn label label-lg label-light-warning label-inline">Rejected</a>
                                    @endif

                                </td>

                                <td class="d-flex">
                                    <a href="{{ route('report.dtls.show',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>

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