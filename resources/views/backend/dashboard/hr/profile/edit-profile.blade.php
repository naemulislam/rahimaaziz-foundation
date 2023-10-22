@extends('backend.layouts.dashboard')
@section('title','Edit Profile')
@section('content')
<section>
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Edit Profile</h3>
        </div>
        <!--begin::Form-->
        <form action="{{route('hr.update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group mb-8">

                </div>

                <div class="row">
                    <div class="col-sm-11">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Full Name
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ $data->name}}" />
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Email address
                                        <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter email" value="{{ $data->email}}" name="email" />
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Phone Number
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{ $data->phone}}" />
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('phone'))?($errors->first('phone')):''}}</div>

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Emergency Contact</label>

                                    <input type="text" class="form-control" placeholder="Enter emergency contact" value="{{ $data->ec_number}}" name="ec_number" />

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Marital Status</label>

                                    <input type="text" class="form-control" name="marital_status" placeholder="Enter marital status" value="{{ $data->marital_status}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Department</label>

                                    <input type="text" class="form-control" name="department" placeholder="Enter department" value="{{ $data->department}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Gender</label>

                                    <select class="form-control" name="gender" id="exampleSelect1">
                                        <option value="1" @if($data->gender == 1) selected @endif>Mail</option>
                                        <option value="2" @if($data->gender == 2) selected @endif>Femail</option>


                                    </select>

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Date of Birth</label>

                                    <input type="date" class="form-control" placeholder="Enter date of birth" name="date_of_birth" value="{{$data->date_of_birth}}" />

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Father Name</label>

                                    <input type="text" class="form-control" name="father_name" placeholder="Enter father name" value="{{$data->father_name}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Mother Name</label>

                                    <input type="text" class="form-control" name="mother_name" placeholder="Enter mother name" value="{{$data->mother_name}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Qualification</label>

                                    <input type="text" class="form-control" name="qualification" placeholder="Enter qualification" value="{{$data->qualification}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Work Exprience</label>

                                    <input type="text" class="form-control" placeholder="Enter work exprience" name="work_exprince" value="{{$data->work_exprince}}" />

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Basic Salary</label>
                                    <input type="text" class="form-control" name="basic_salary" placeholder="Enter basic salary" value="{{$data->basic_salary}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Work Shift</label>
                                    <input type="text" class="form-control" name="work_shift" placeholder="Enter work shift" value="{{$data->work_shift}}" />

                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Data of Joining</label>
                                    <input type="date" class="form-control" name="data_of_joining" placeholder="Enter data of joining" value="{{$data->data_of_joining}}" />
                                </div>

                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" class="form-control" name="designation" placeholder="Enter designation" value="{{$data->designation}}" />

                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Current Address</label>
                                    <input type="text" name="c_address" class="form-control" id="" placeholder="Enter your current address" value="{{$data->c_address}}">

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="">Permanent Address</label>
                                    <input type="text" name="p_address" class="form-control" id="" placeholder="Enter your Permanent address" value="{{$data->p_address}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url(assets/media/users/blank.png)">
                                            <div class="image-input-wrapper" style="background-image: url(@if(!empty(Auth('hr')->user()->profile_photo_path)) {{asset( Auth('hr')->user()->profile_photo_path ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif)"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">After image removal hidden input's value is set to "1"</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
</section>

@endsection