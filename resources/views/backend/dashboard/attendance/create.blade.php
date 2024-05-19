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
                            <h3 class="card-title">Crate a Attendance</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('admin.student.atten.index') }}"
                                    class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.student.atten.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Class Group<span class="text-danger">*</span></label>
                                            <select name="group_id" class="form-control js-select-result" id="group_id">
                                                <option selected disabled> Select Class Group</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('group_id') ? $errors->first('group_id') : '' }}</div>
                                        </div>
                                    </div>
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

                                            @error('attendance_time')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!--begin: Datatable-->
                                    <table class="table" id="">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Roll</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                                <th>Late</th>
                                                <th>Sick</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table">
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
    <!-- Add code -->
    <script>
        $(document).on('change', '#group_id', function() {
            var group_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ url('/admin/dashboard/get/student') }}/" + group_id,
                dataType: 'html',
                success: function(res) {
                    $('#table').html(res);
                }
            });
        })
    </script>
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
