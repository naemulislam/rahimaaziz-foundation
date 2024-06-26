@extends('backend.layouts.master')
@section('title', 'Students Promotion')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Student Active List</h5>
                        <!--end::Page Title-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        @if ($errors->any())
        @foreach ($errors->all() as $error)
                <div class="aleart alert-danger text-center">{{ $error }}</div>
            @endforeach
        @endif
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Card-->
                <form method="POST" action="{{ route('admin.student.promotion.store') }}">
                    @csrf
                    <div class="card card-custom">
                        <div class="card-header flex-wrap py-5">
                            <div class="card-title">
                                <h3 class="card-label">Promote Students</h3>
                            </div>
                            <div class="card-toolbar">
                                <div class="dropdown mr-3">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @php
                                            $requestGroupName = \App\Models\Group::where(
                                                'id',
                                                request()->group_id,
                                            )->first();
                                        @endphp
                                        {{ $requestGroupName->name ?? 'Select Group' }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('admin.students.promotion') }}">All
                                            Class</a>
                                        @foreach ($groups as $group)
                                            <a class="dropdown-item"
                                                href="{{ route('admin.students.promotion', ['group_id' => $group->id]) }}">{{ $group->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Button-->
                                <button type="submit" id="" class="btn btn-primary">Promotion</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table" id="dataTableB4">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 40.3438px;"><input type="checkbox"
                                                id="checkedAll"><br>Select All</th>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th style="width: 90.781px;">Current roll</th>
                                        <th style="width: 90.781px;">New roll</th>
                                        <th>Select Class</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $row)
                                        <tr>
                                            <td><input type="checkbox" class="checkbox" value="{{ $row->id }}"
                                                    name="row_id[]"></td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img style="width:70px ;"
                                                    src="@if (!empty($row->image)) {{ asset($row->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->admission->group->name }}</td>
                                            <td><input type="number" name="c_roll[]" class="form-control"
                                                    value="{{ $row->admission->roll }}" readonly>
                                            </td>
                                            <td><input type="number" name="n_roll[]" class="form-control" id="rollCheck">
                                                @error('n_roll')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-control selectAll" name="group_id[]">
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}"
                                                            {{ $row->group_id == $group->id ? 'selected' : '' }}>
                                                            {{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                </form>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#promoteBtn").click(function() {
                // console.log("Hi");
                $("#promoteForm").submit();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Check/uncheck all checkboxes when "Select All" is clicked
            $("#checkedAll").click(function() {
                $(".checkbox").prop('checked', $(this).prop('checked'));
            });

            // Check "Select All" if all checkboxes are checked, uncheck otherwise
            $(".checkbox").click(function() {
                if ($(".checkbox:checked").length === $(".checkbox").length) {
                    $("#checkedAll").prop('checked', true);
                    $('#rollCheck').prop('required', true);
                } else {
                    $("#checkedAll").prop('checked', false);
                    $('#rollCheck').prop('required', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.selectAll').change(function() {
                var selectedValue = $(this).val();
                $('.selectAll').not(this).each(function() {
                    $(this).val(selectedValue);
                });
            });

        });
        // $(document).ready(function() {
        //     // Event handler for checkbox
        //     $('#selectAll').change(function() {
        //         var isChecked = $(this).prop('checked');
        //         $('.custom-select').not(this).each(function() {
        //             $(this).prop('selectedIndex', isChecked ? 0 : -1);
        //         });
        //     });
        // });
    </script>
@endpush
