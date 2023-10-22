@extends('backend.layouts.dashboard')
@section('title', 'Student Admission')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Admission</h5>
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
                            <h3 class="card-title">Student Information</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.admission.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.admission.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Admission No<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter subject name" name="admission_no" value="{{old('admission_no')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admission_no') ? $errors->first('admission_no') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Roll No<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="roll" placeholder="Roll number" value="{{old('roll')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('roll') ? $errors->first('roll') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Registration No<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="registration_no" placeholder="Registration number" value="{{old('registration_no')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('registration_no') ? $errors->first('registration_no') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                            <select name="section_id" class="form-control" id="adsection">

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('section_id'))?($errors->first('section_id')):''}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Student<span class="text-danger">*</span></label>
                                            <select name="student_id" class="form-control">
                                                <option>Select Student</option>
                                                @foreach($students as $student)
                                                <option value="{{$student->id}}">{{ $student->name}}</option>
                                                @endforeach
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('student_id') ? $errors->first('student_id') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Admission Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="admission_date" value="{{old('admission_date')}}" placeholder="Enter Admission Date">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admission_date') ? $errors->first('admission_date') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Phone<span class="text-danger">*</span></label>

                                            <input type="text" class="form-control" name="admi_phone" placeholder="Enter phone" value="{{old('admi_phone')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admi_phone') ? $errors->first('admi_phone') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender<span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender">
                                                <option>Select gender</option>
                                                <option value="1">Mail</option>
                                                <option value="2">Femail</option>
                                            </select>

                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('gender') ? $errors->first('gender') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Place of Birth<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="place_of_birth" placeholder="Place of Birth" value="{{old('place_of_birth')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('place_of_birth') ? $errors->first('place_of_birth') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Student Type<span class="text-danger">*</span></label>
                                            <select class="form-control" name="student_type">
                                                <option>Select type</option>
                                                <option value="0">New Student</option>
                                                <option value="1">Return Student</option>
                                            </select>

                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('student_type') ? $errors->first('student_type') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Bloog Group</label>
                                            <input type="text" class="form-control" name="blood" placeholder="Blood group" value="{{old('blood')}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('blood') ? $errors->first('blood') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="">Home Address<span class="text-danger">*</span></label>
                                            <input type="text" name="h_address" placeholder="Home addrss" value="{{old('h_address')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('h_address') ? $errors->first('h_address') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Apartment</label>
                                            <input type="text" name="apartment" placeholder="Apartment" value="{{old('apartment')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('apartment'))?($errors->first('apartment')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" placeholder="Enter Student city" value="{{old('city')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('city') ? $errors->first('city') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">State<span class="text-danger">*</span></label>
                                            <input type="text" name="state" placeholder="Enter Student State" value="{{old('state')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('state'))?($errors->first('state')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Zip Code<span class="text-danger">*</span></label>
                                            <input type="text" name="zip_code" placeholder="Enter Student Zip code" value="{{old('zip_code')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('zip_code'))?($errors->first('zip_code')):''}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <h4 class="card-title">Guardian Information</h4>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Father Name<span class="text-danger">*</span></label>
                                            <input type="text" name="father_name" placeholder="Father name" value="{{old('father_name')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('father_name') ? $errors->first('father_name') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Place of Birth</label>
                                            <input type="text" name="fbp" placeholder="Place of birth" value="{{old('fbp')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('fbp'))?($errors->first('fbp')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Father Call<span class="text-danger">*</span></label>
                                            <input type="text" name="father_call" placeholder="Father call" value="{{old('father_call')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('father_call') ? $errors->first('father_call') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Father Email</label>
                                            <input type="text" name="father_email" placeholder="Father email" value="{{old('father_email')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('father_email'))?($errors->first('father_email')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mother Name</label>
                                            <input type="text" name="mother_name" placeholder="Mother name" value="{{old('mother_name')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('mother_name'))?($errors->first('mother_name')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mother Call<span class="text-danger">*</span></label>
                                            <input type="text" name="mother_call" placeholder="Mother call" value="{{old('mother_call')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('mother_call') ? $errors->first('mother_call') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <h4 class="card-title">Emergency Contact(Optional)</h4>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="e_name" placeholder="Emergency name" value="{{old('e_name')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('e_name') ? $errors->first('e_name') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" name="e_call" placeholder="Phone" value="{{old('e_call')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('e_call'))?($errors->first('e_call')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Student Image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_image_1">
                                            <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_1.jpg)"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="admi_photo" accept=".png, .jpg, .jpeg" />
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


<!-- Edit code -->
<script>
    $(function() {
        $(document).on('change', '#category_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/class')}}/" + category_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.class_name + '</option>';
                    });
                    $('#class_id').html(html);
                },

            });
        });
    });
</script>

<!-- Add code -->
<script>
    $(function() {
        $(document).on('change', '#adcategory_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/class')}}/" + category_id,
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
<script>
    $(function() {
        $(document).on('change', '#adclass_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/section')}}/" + category_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.name + '</option>';
                    });
                    $('#adsection').html(html);
                },

            });
        });
    });
</script>


@endsection
@endsection