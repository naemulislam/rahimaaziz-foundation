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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Attendance</h5>
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
                                <a href="{{route('teacher.attendance.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('teacher.attendance.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h3>{{$class->class_name}} Class</h3>
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
                                    <table class="table table-separate table-head-custom table-checkable" id="">
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
                                                <td>{{$row->class->class_name}}</td>
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
                                            <input type="hidden" value="{{$row->class_id}}" name="class_id">
                                           
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
    $(function() {
        $(document).on('change', '#adclass_id', function() {
            var class_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/teacher/dashboard/get/attendance/subject')}}/" + class_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Subject</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.sub_name + '</option>';
                    });
                    $('#adsubject_id').html(html);
                },

            });
        });
    });
</script>
<script>
    $(function() {
        $(document).on('change', '#adclass_id', function() {
            var class_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/teacher/dashboard/get/section')}}/" + class_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Section</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.name + '</option>';
                    });
                    $('#adsection_id').html(html);
                },

            });
        });
    });
</script>
<script>
    $(document).on('change', '#adclass_id', function() {
        var class_id = $(this).val();
        $.ajax({
            type: "get",
            url: "{{url('/teacher/dashboard/get/student')}}/" + class_id,
            dataType: 'html',
            success: function(res) {
                // console.log(res);
                // $.each(res, function(key, value) {
                //     res +=
                //         '<tr>' +
                //         '<input type="hidden" name="admi_id[]" value='+value.id +'>'+
                //         '<td>' + key + 1 + '</td>' +
                //         '<td>' + value.student.name + '</td>' +
                //         '<td>' + value.category.category_name + '</td>' +
                //         '<td>' + value.class.class_name + '</td>' +
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


@endsection
@endsection