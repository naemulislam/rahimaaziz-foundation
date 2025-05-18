@extends('backend.teacher.layouts.master')
@section('title', 'Incomplete Reports')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Incomplete report List
                            <span class="d-block text-muted pt-2 font-size-sm">daily report</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Report</th>
                                <th>Date</th>
                                <th>Page</th>
                                <th>Jug</th>
                                <th>Line</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($reports as $row)
                                @php
                                    $get_stu = \App\Models\Studentadmission::where('id', $row->admission_id)->first();
                                @endphp

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $get_stu->student->name }}</td>
                                    <td>{{ $get_stu->roll }}</td>
                                    <td>{{ $row->report_name }}</td>
                                    <td>{{ $row->report_date }}</td>
                                    <td>{{ $row->page }}</td>
                                    <td>{{ $row->juz_number }}</td>
                                    <td>{{ $row->line_number }}</td>
                                    <td>
                                        @if ($row->teacher_review == 0)
                                            <a href="#" class="btn label label-lg label-light-danger label-inline"
                                                data-toggle="modal"
                                                data-target="#row_status_{{ $row->id }}">pending</a>
                                        @elseif($row->teacher_review == 1)
                                            <a href="#" class="btn label label-lg label-light-success label-inline"
                                                data-toggle="modal"
                                                data-target="#row_status_{{ $row->id }}">Completed</a>
                                        @elseif($row->teacher_review == 2)
                                            <a href="#" class="btn label label-lg label-light-info label-inline"
                                                data-toggle="modal"
                                                data-target="#row_status_{{ $row->id }}">InComplete</a>
                                        @elseif($row->teacher_review == 3)
                                            <a href="#" class="btn label label-lg label-light-warning label-inline"
                                                data-toggle="modal"
                                                data-target="#row_status_{{ $row->id }}">Rejected</a>
                                        @endif

                                    </td>

                                    <td class="d-flex">
                                        <a href="{{ route('teacher.student_report.show', $row->id) }}"
                                            class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i
                                                class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <!--Row Status -->
                                <div class="modal fade" id="row_status_{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('teacher.student_report.status', $row->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Report Status</label>
                                                        <select name="teacher_review" class="form-control">
                                                            <option value="0"
                                                                @if ($row->teacher_review == 0) selected @endif>Pending
                                                            </option>
                                                            <option value="1"
                                                                @if ($row->teacher_review == 1) selected @endif>Complete
                                                            </option>
                                                            <option value="2"
                                                                @if ($row->teacher_review == 2) selected @endif>Incomplete
                                                            </option>
                                                            <option value="3"
                                                                @if ($row->teacher_review == 3) selected @endif>Reject
                                                            </option>

                                                        </select>

                                                        <div style='color:red; padding: 0 5px;'>
                                                            {{ $errors->has('teacher_review') ? $errors->first('teacher_review') : '' }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
