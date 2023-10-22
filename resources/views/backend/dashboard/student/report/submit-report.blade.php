@extends('backend.layouts.dashboard')
@section('title', 'Daily Report')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Daily Report</h5>
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
                            <h3 class="card-title">Create Daily Report</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('student.report.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('student.report.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="hw_id" value="{{Auth('student')->user()->id}}">




                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Subject Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="subject_name" placeholder="Enter subject name">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('subject_name'))?($errors->first('subject_name')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Report Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="report_date" value="{{ date('Y-m-d')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('report_date') ? $errors->first('report_date') : '' }}
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Jug Number<span class="text-danger">*</span></label>
                                            <input id="jug" type="text" class="form-control" name="para_number" value="{{old('para_number')}}">
                                            <div style="color: red; padding:0 5px;">{{$errors->has('para_number') ? $errors->first('para_number'): ''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Page Number<span class="text-danger">*</span></label>
                                            <input id="page" type="text" class="form-control bs-validate" name="page_number" value="{{old('page_number')}}" min="1" max="25" data-hint="Enter a number between 1 to 25 in steps of 1" step="1" required>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Report Type<span class="text-danger">*</span></label>
                                            <select name="report_type" class="form-control" required>
                                                <option>--Select--</option>
                                                <option value="1">Running Tilawat</option>
                                                <option value="2">Daor Review</option>
                                                <option value="3">Daor Amokta</option>
                                            </select>
                                            <div style="color: red; padding:0 5px;">{{$errors->has('report_type') ? $errors->first('report_type'): ''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Desciption</label>
                                            <textarea id="summernote" class="" name="description">

                                            </textarea>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">If you have image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_image_1">
                                            <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_1.jpg)"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                    </div>
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


<script>
    $(function() {
        $(document).on('change', '#adcategory_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/teacher/dashboard/get/class')}}/" + category_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.class_name + '</option>';
                    });
                    $('#adclass_id').html(html);
                },

            });
        });
    });
</script>
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
    $('#summernote').summernote({
        placeholder: 'Home Work Description',
        height: 100
    });
</script>

@endsection
<script>
    function report(){
        var page = $("#page").val();
        var jug = $("jug").val();

        if(jug == 1){
            var page = 20

        }

        $("#page").on('keyup change',function(){
            report();
        });
    }
</script>
@endsection