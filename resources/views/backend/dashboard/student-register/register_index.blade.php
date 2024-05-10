@extends('backend.layouts.master')
@section('title', 'Registration list')
@section('content')


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Student Registration List
                                <span class="d-block text-muted pt-2 font-size-sm">All student register here</span>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Admission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{$row->gender =='male'? 'Male':'Female'}}</td>
                                        <td>
                                            <a href="#"
                                                class="btn label label-lg label-light-success label-inline">Apply</a>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.register.destroy', $row->slug) }}"
                                                class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3"><i
                                                    class="fa fa-trash"></i></a>
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

    <!--end::Content-->


    <!-- Add Modal -->


@section('customjs')
    <script>
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    type: "Get",
                    url: "{{ url('/admin/dashboard/get/class') }}/" + category_id,
                    dataType: "json",
                    success: function(data) {
                        var html = '<option value="">Select Class</option>';
                        $.each(data, function(key, val) {
                            html += '<option value="' + val.id + '">' + val.class_name +
                                '</option>';
                        });
                        $('#class_id').html(html);
                    },

                });
            });
        });
    </script>
    <script>
        $(function() {
            $(document).on('change', '#adcategory_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    type: "Get",
                    url: "{{ url('/admin/dashboard/get/class') }}/" + category_id,
                    dataType: "json",
                    success: function(data) {
                        var html = '<option value="">Select Class</option>';
                        $.each(data, function(key, val) {
                            html += '<option value="' + val.id + '">' + val.class_name +
                                '</option>';
                        });
                        $('#adclass_id').html(html);
                    },

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
@endsection
