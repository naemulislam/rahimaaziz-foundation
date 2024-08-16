@extends('backend.teacher.layouts.master')
@section('title', 'Create Attendance')
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
                            <h3 class="card-title">Crate a Attendance</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('teacher.student.atten.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('teacher.student.atten.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>{{Auth('teacher')->user()->group->name}} Class</h3>
                                    </div>
                                    <div class="col-sm-4">
                                        <h3>Teacher Name: <span>{{Auth('teacher')->user()->name}}</span></h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="attendance_date" value="<?php echo date('Y-m-d'); ?>">

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('attendance_date'))?($errors->first('attendance_date')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Time<span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" name="attendance_time">

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('attendance_time')) ?($errors->first('attendance_time')):''}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table table-separate table-head-custom table-checkable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Roll</th>
                                                <th>Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table">
                                            @foreach($students as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->student->name}}</td>
                                                <td>{{$row->group->name}}</td>
                                                <td>{{$row->roll}}</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio1" value="1">
                                                        <label class="form-check-label" for="inlineRadio1">Present</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio2" value="0">
                                                        <label class="form-check-label" for="inlineRadio2">Absent</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio2" value="2">
                                                        <label class="form-check-label" for="inlineRadio3">Late</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="attendance[{{$row->id}}]" id="inlineRadio2" value="3">
                                                        <label class="form-check-label" for="inlineRadio3">Sick</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <input type="hidden" value="{{$row->group_id}}" name="group_id">
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" value="Submit" class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const checkboxes = document.querySelectorAll('.attendance-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', (event) => {
                const currentCheckbox = event.target;
                const rowId = currentCheckbox.getAttribute('data-row-id');

                checkboxes.forEach(cb => {
                    if (cb.getAttribute('data-row-id') === rowId && cb !==
                        currentCheckbox) {
                        cb.checked = false;
                    }
                });
            });
        });
    });
</script>
@endpush

