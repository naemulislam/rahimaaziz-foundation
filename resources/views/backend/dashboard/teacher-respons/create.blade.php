@extends('backend.layouts.dashboard')
@section('title', 'Responsibility')
@section('content')

<style>
  
</style>
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Responsibility</h5>
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
                            <h3 class="card-title">Create Techer Responsibility</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.respons.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.respons.store')}}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Teacher<span class="text-danger">*</span></label>
                                            <select required name="teacher_id" class="form-control js-select-result" id="adclass_id">
                                                <option value="--Select--">--Select--</option>
                                                @foreach($teachers as $row)
                                                <option value="{{$row->id}}">{{ $row->name}}</option>
                                                @endforeach

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('teacher_id'))?($errors->first('teacher_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Date<span class="text-danger">*</span></label>
                                            <input type="date" name="respons_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('respons_date'))?($errors->first('respons_date')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Responsibility Box<span class="text-danger">*</span></label>
                                            <textarea id="summernote" class="" name="responsibility">

                                            </textarea>
                                            <div style="color: red; padding:0 5px;">{{$errors->has('responsibility') ? $errors->first('responsibility'): ''}}</div>
                                        </div>
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
        $(document).on('change', '#adclass_id', function() {
            var class_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/studentlist')}}/" + class_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Student</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.student.name + '</option>';
                    });
                    $('#adstudent_id').html(html);
                    
                },

            });
        });
    });
</script>
<!-- Add code -->


<script>
    $('#summernote').summernote({
        placeholder: 'Weite something comment...',
        height: 100
    });
</script>
<script>
    $('#summernote2').summernote({
        placeholder: 'Weite something comment...',
        height: 100
    });
</script>
<script>
    var $disabledResults = $(".js-select-result");
    $disabledResults.select2();
</script>
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('activitis[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>


@endsection
@endsection