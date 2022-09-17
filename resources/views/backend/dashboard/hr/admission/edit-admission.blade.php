@extends('backend.layouts.dashboard')
@section('title', 'Edit Admission')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Admission</h5>
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
                            <h3 class="card-title">Student Admission Edit</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.admission.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.admission.update',$admission->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="studentinfo_id" value="{{$studentinfo->id}}">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Admission No<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter subject name" name="admission_no" value="{{$admission->admission_no}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admission_no') ? $errors->first('admission_no') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Roll No<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="roll" placeholder="Roll number" value="{{$admission->roll}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('roll') ? $errors->first('roll') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Registration No<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="registration_no" placeholder="Registration number" value="{{$admission->registration_no}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('registration_no') ? $errors->first('registration_no') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Identity Number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="id_number" value="{{ $admission->id_number}}" placeholder="Enter student id number">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('id_number') ? $errors->first('id_number') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Admission Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="admission_date" value="{{ $admission->admission_date}}" placeholder="Enter Admission Date">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admission_date') ? $errors->first('admission_date') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Class type<span class="text-danger">*</span></label>
                                            <select class="form-control" name="class_type">

                                                <option value="1">Regular</option>
                                                <option value="0">Irregular</option>

                                            </select>
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('class_type') ? $errors->first('class_type') : '' }}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option>Select gender</option>
                                                @if($studentinfo->gender == 1)
                                                <option selected value="1">Mail</option>
                                                @else
                                                <option selected value="2">Femail</option>
                                                @endif
                                            </select>

                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Date of Birth<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date_of_birth" value="{{$studentinfo->date_of_birth}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Place of Birth</label>
                                            <input type="text" class="form-control" name="place_of_birth" placeholder="Place of Birth" value="{{$studentinfo->place_of_birth}}">
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
                                                @if($studentinfo->student_type == 0)
                                                <option selected value="0">New Student</option>
                                                @else

                                                <option value="1">Return Student</option>
                                                @endif

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('student_type') ? $errors->first('student_type') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Bloog Group</label>
                                            <input type="text" class="form-control" name="blood" placeholder="Blood group" value="{{$studentinfo->bloogd}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('blood') ? $errors->first('blood') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Admission Phone Number</label>

                                            <input type="number" class="form-control" name="admi_phone" placeholder="Enter phone" value="{{$admission->admi_phone}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('admi_phone') ? $errors->first('admi_phone') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Father Name</label>
                                            <input type="text" name="father_name" placeholder="Father name" class="form-control" value="{{$studentinfo->father_name}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('father_name') ? $errors->first('father_name') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Place of Birth</label>
                                            <input type="text" name="place_of_birth" placeholder="Place of birth" class="form-control" value="{{$studentinfo->place_of_birth}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('place_of_birth'))?($errors->first('place_of_birth')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="">Home Address</label>
                                            <input type="text" name="h_address" placeholder="Home addrss" class="form-control" value="{{$studentinfo->h_address}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('h_address') ? $errors->first('h_address') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Apartment</label>
                                            <input type="text" name="apartment" placeholder="Apartment" class="form-control" value="{{$studentinfo->apartment}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('apartment'))?($errors->first('apartment')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">City</label>
                                            <input type="text" name="city" class="form-control" value="{{$studentinfo->city}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('city') ? $errors->first('city') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">State</label>
                                            <input type="text" name="state" placeholder="State" class="form-control" value="{{$studentinfo->state}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('state'))?($errors->first('state')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Zip Code</label>
                                            <input type="text" name="zip_code" placeholder="Zip code" class="form-control" value="{{$studentinfo->zip_code}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('zip_code'))?($errors->first('zip_code')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Father Call</label>
                                            <input type="number" name="father_call" placeholder="Father call" class="form-control" value="{{$studentinfo->father_call}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('father_call') ? $errors->first('father_call') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Father Email</label>
                                            <input type="text" name="father_email" placeholder="Father email" class="form-control" value="{{$studentinfo->father_email}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('father_email'))?($errors->first('father_email')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mother Call</label>
                                            <input type="number" name="mother_call" placeholder="Mother call" class="form-control" value="{{$studentinfo->mother_call}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('mother_call') ? $errors->first('mother_call') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Mother Email</label>
                                            <input type="text" name="mother_email" placeholder="Mother email" class="form-control" value="{{$studentinfo->mother_email}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('mother_email'))?($errors->first('mother_email')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h4 class="card-title">Emergency Contact</h4>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="e_name" placeholder="Emergency name" class="form-control" value="{{$studentinfo->e_name}}">
                                            <div style='color:red; padding: 0 5px;'>
                                                {{ $errors->has('e_name') ? $errors->first('e_name') : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" name="e_call" placeholder="Phone" class="form-control" value="{{$studentinfo->e_call}}">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('e_call'))?($errors->first('e_call')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="d-block">Picture</label>
                                    <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('backend')}}/assets/media/users/blank.png)">
                                        <div class="image-input-wrapper" style="background-image: url({{asset($admission->admi_photo)}})"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="image" />
                                            <input type="hidden" name="profile_avatar_remove" />
                                        </label>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
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
<script>
    $(function() {
        $(document).on('change', '#class_id', function() {
            var class_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/section')}}/" + class_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.name + '</option>';
                    });
                    $('#section_id').html(html);
                },

            });
        });
    });
</script>


@endsection
@endsection