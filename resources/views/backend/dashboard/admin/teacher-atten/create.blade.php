@extends('backend.layouts.dashboard')
@section('title', 'Create Attendance')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Teachers Attendance</h5>
                    <!--end::Page Title-->
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Crate a Attendance</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.teacheratten.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.teacheratten.store')}}" method="post">
                                @csrf

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
                                    <table class="table table-separate table-head-custom table-checkable" id="">
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
                                            @foreach($teachers as $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->class->class_name}}</td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input type="checkbox" name="attendance[{{$row->id}}]" value="1"/>
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input type="checkbox" name="attendance[{{$row->id}}]" value="0" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input type="checkbox" name="attendance[{{$row->id}}]" value="2" />
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="switch">
                                                        <label>
                                                            <input type="checkbox" name="attendance[{{$row->id}}]" value="3"/>
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
</div>
<!--end::Content-->

@section('customjs')



<!-- Add code -->
<script>
    $(document).on('change', '#adclass_id', function() {
        var class_id = $(this).val();
        $.ajax({
            type: "get",
            url: "{{url('/admin/dashboard/get/student')}}/" + class_id,
            dataType: 'html',
            success: function(res) {
                // var data = '';
                // $.each(res, function(key, value) {
                //     data +=
                //         '<tr>' +
                //         '<input type="hidden" name="admi_id[]" value='+value.id +'>'+
                //         '<td>' + key + 1 + '</td>' +
                //         '<td>' + value.student + '</td>' +
                //         '<td>' + value.category + '</td>' +
                //         '<td>' + value.class + '</td>' +
                //         '<td>' + value.roll + '</td>' +
                //         '<td>' +'<select class="form-control" name="pa[]">'
                //         +'<option value="1">'+'Present'+'</option>'+
                //         '<option value="0">'+'Absent'+'</option>'+
                //         '</select>' + '</td>' +
                //         '</tr>';
                // });
                $('#table').html(res);
            }
        });
    })
</script>

<script>
    var $disabledResults = $(".js-select-result");
    $disabledResults.select2();
</script>
@endsection


@endsection