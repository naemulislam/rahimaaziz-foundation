@extends('backend.layouts.master')
@section('title', 'Attendance Sheet')
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
                            <h3 class="card-title">Update Teacher Attendance</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('admin.teacher.atten.index') }}"
                                    class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form action="{{ route('admin.teacher.atten.update') }}" method="post">
                            @csrf

                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Late</th>
                                            <th>Sick</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get_teachers as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->teacher->name }}</td>
                                                <td>{{ $row->teacher->group->name }}</td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input @if ($row->attendence_status == 1) checked @endif
                                                                type="checkbox" name="attendance[{{ $row->id }}]"
                                                                value="1" class="attendance-checkbox"
                                                                data-row-id="{{ $row->id }}" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input @if ($row->attendence_status == 0) checked @endif
                                                                type="checkbox" name="attendance[{{ $row->id }}]"
                                                                value="0" class="attendance-checkbox"
                                                                data-row-id="{{ $row->id }}" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input @if ($row->attendence_status == 2) checked @endif
                                                                type="checkbox" name="attendance[{{ $row->id }}]"
                                                                value="2" class="attendance-checkbox"
                                                                data-row-id="{{ $row->id }}" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input @if ($row->attendence_status == 3) checked @endif
                                                                type="checkbox" name="attendance[{{ $row->id }}]"
                                                                value="3" class="attendance-checkbox"
                                                                data-row-id="{{ $row->id }}" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>{{ $row->attendance_date }}</td>

                                            </tr>
                                            <input type="hidden" name="atten_id" value="{{ $row->id }}">
                                        @endforeach


                                    </tbody>
                                </table>
                                <button class="btn btn-primary" type="submit">Update</button>
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
