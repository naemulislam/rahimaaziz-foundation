@extends('backend.layouts.master')
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
                                <h3 class="card-title">Teacher Attendance Create</h3>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <a href="{{ route('admin.teacher.atten.index') }}"
                                        class="btn btn-primary btn-sm font-weight-bolder">
                                        < Back</a>
                                            <!--end::Button-->
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <form action="{{ route('admin.teacher.atten.store') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="">Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="attendance_date"
                                                    value="<?php echo date('Y-m-d'); ?>">

                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('attendance_date') ? $errors->first('attendance_date') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="">Time<span class="text-danger">*</span></label>
                                                <input type="time" class="form-control" name="attendance_time">

                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('attendance_time') ? $errors->first('attendance_time') : '' }}
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <!--begin: Datatable-->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Class</th>
                                                    <th>Present</th>
                                                    <th>Absent</th>
                                                    <th>Late</th>
                                                    <th>Sick</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($teachers as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->group->name }}</td>
                                                        <td>
                                                            <span class="switch">
                                                                <label>
                                                                    <input type="checkbox"
                                                                        name="attendance[{{ $row->id }}]"
                                                                        value="1" class="attendance-checkbox"
                                                                        data-row-id="{{ $row->id }}" />
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="switch">
                                                                <label>
                                                                    <input type="checkbox"
                                                                        name="attendance[{{ $row->id }}]"
                                                                        value="0" class="attendance-checkbox"
                                                                        data-row-id="{{ $row->id }}" />
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="switch">
                                                                <label>
                                                                    <input type="checkbox"
                                                                        name="attendance[{{ $row->id }}]"
                                                                        value="2" class="attendance-checkbox"
                                                                        data-row-id="{{ $row->id }}" />
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="switch">
                                                                <label>
                                                                    <input type="checkbox"
                                                                        name="attendance[{{ $row->id }}]"
                                                                        value="3" class="attendance-checkbox"
                                                                        data-row-id="{{ $row->id }}" />
                                                                    <span></span>
                                                                </label>
                                                            </span>
                                                        </td>
                                                    </tr>
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

                    // Uncheck all other checkboxes in the same row
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
