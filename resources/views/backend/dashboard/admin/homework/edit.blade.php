@extends('backend.layouts.dashboard')
@section('title', 'Edit Home Work')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Home Work</h5>
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
                            <h3 class="card-title">Edit Student Home Work</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.homework.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.homework.update',$homework->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Category<span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control" id="adcategory_id">
                                                <option>Select Category</option>
                                                @foreach($categorys as $category)
                                                <option value="{{$category->id}}">{{ $category->category_name}}</option>
                                                @endforeach
                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('category_id'))?($errors->first('category_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Class<span class="text-danger">*</span></label>
                                            <select name="class_id" class="form-control" id="adclass_id">

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('class_id'))?($errors->first('class_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Section(optional)</label>
                                            <select name="section_id" class="form-control" id="adsection_id">

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('section_id'))?($errors->first('section_id')):''}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Subject<span class="text-danger">*</span></label>
                                            <select name="subject_id" class="form-control" id="adsubject_id">

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('subject_id'))?($errors->first('subject_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Home work Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="homework_date" value="{{ $homework->homework_date}}" placeholder="Enter Homework Date">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('homework_date') ? $errors->first('homework_date') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                            <label for="">Submission Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="submission_date" value="{{ $homework->submission_date}}" placeholder="Enter Submission Date">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('submission_date') ? $errors->first('submission_date') : '' }}
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" value="{{ $homework->title}}">
                                            <div style="color: red; padding:0 5px;">{{$errors->has('title') ? $errors->first('title'): ''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Desciption<span class="text-danger">*</span></label>
                                            <textarea id="summernote" class="" name="description">
                                                {!! $homework->description !!}

                                            </textarea>
                                            <div style="color: red; padding:0 5px;">{{$errors->has('description') ? $errors->first('description'): ''}}</div>
                                        </div>
                                    </div>
                                </div>

                               
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Home Work Image</label>
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
                                    </div>
                                    <div class="col-sm-6">
                                        <img style="width: 100%;" src="@if(!empty($homework->image)) {{asset($homework->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
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
@endsection