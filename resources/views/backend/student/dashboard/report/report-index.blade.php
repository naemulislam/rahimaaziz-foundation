@extends('backend.student.layouts.master')
@section('title', 'All Reports')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">All report List
                            <span class="d-block text-muted pt-2 font-size-sm">my daily report</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('student.report.create') }}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path
                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Create Report</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Report Name</th>
                                <th>Date</th>
                                <th>Juz</th>
                                <th>Page</th>
                                <th>Line</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($reports as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->report_name }}</td>
                                    <td>{{ $row->report_date }}</td>
                                    <td>{{ $row->juz_number }}</td>
                                    <td>{{ $row->page }}</td>
                                    <td>{{ $row->line_number }}</td>
                                    <td>
                                        @if ($row->report_type == 1)
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
                                        @if ($row->teacher_review == 0)
                                            <a href="#"
                                                class="btn label label-lg label-light-danger label-inline">pending</a>
                                        @elseif($row->teacher_review == 1)
                                            <a href="#"
                                                class="btn label label-lg label-light-success label-inline">Completed</a>
                                        @elseif($row->teacher_review == 2)
                                            <a href="#"
                                                class="btn label label-lg label-light-info label-inline">Incomplete</a>
                                        @elseif($row->teacher_review == 3)
                                            <a href="#"
                                                class="btn label label-lg label-light-warning label-inline">Rejected</a>
                                        @endif

                                    </td>

                                    <td>
                                        <a href="{{ route('student.report.show', $row->id) }}"
                                            class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i
                                                class="fa fa-eye"></i></a>
                                        <a href="{{ route('student.report.edit', $row->id) }}"
                                            class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i
                                                class="fa fa-edit"></i></a>
                                            <a id="delete" href="{{ route('student.report.destroy', $row->id) }}"
                                                class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3">
                                                <i class="fa fa-trash"></i>
                                            </a>

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

@endsection
