@extends('backend.layouts.master')
@section('title', 'Edit Teacher')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Teacher Information Edit</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.teacher.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.teacher.update',$teacher->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter teacher name"
                                                name="name" value="{{ $teacher->name }}">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter unique email" value="{{ $teacher->email }}">
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Phone<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone"
                                                value="{{ $teacher->phone }}" placeholder="Enter phone number">
                                                @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Class Group<span class="text-danger">*</span></label>
                                            <select name="group_id" class="form-control js-select-result" id=""
                                                required>
                                                <option selected disabled>Select a group</option>
                                                @foreach ($groups as $group)
                                                    <option {{ $teacher->group_id == $group->id ? 'selected':''}} value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('group_id')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender<span class="text-danger">*</span></label>
                                            <select name="gender" class="form-control" id="">
                                                <option selected disabled>select a gender</option>
                                                <option {{$teacher->gender == 'male'? 'selected':''}} value="male">Male</option>
                                                <option {{$teacher->gender == 'female'? 'selected':''}}  value="female">Female</option>
                                            </select>

                                            @error('gender')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control" value="{{ $teacher->date_of_birth }}">
                                            @error('date_of_birth')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Marital Status</label>
                                            <select name="marital_status" class="form-control">
                                                <option selected disabled>select this one</option>
                                                <option {{$teacher->marital_status == 'married'? 'selected':''}} value="married">Married</option>
                                                <option {{$teacher->marital_status == 'unmarried'? 'selected':''}} value="unmarried">Unmarried</option>
                                            </select>
                                            @error('marital_status')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Qualifications</label>
                                            <input type="text" name="qualification" class="form-control" value="{{ $teacher->qualification }}">
                                            @error('qualification')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Designation</label>
                                            <input type="text" name="designation" class="form-control" value="{{ $teacher->designation}}">
                                            @error('designation')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Joining Date</label>
                                            <input type="date" name="data_of_joining" class="form-control" value="{{ $teacher->data_of_joining}}">
                                            @error('data_of_joining')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" value="{{ $teacher->father_name}}">
                                            @error('father_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Mother Name</label>
                                            <input type="text" name="mother_name" class="form-control" value="{{ $teacher->mother_name}}">
                                            @error('mother_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Current Address</label>
                                            <textarea name="c_address" class="form-control" cols="30" rows="5">{{$teacher->c_address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3"><span class="text-info">(If you want to change the password, enter this password in the input box below.)</span></div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Password<span class="text-danger">*</span></label>
                                            <input type="password" name="password" placeholder="Enter password"
                                                class="form-control">
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Confirm Password<span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Enter confirm password" class="form-control">
                                                @error('password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="">Teacher Image</label>
                                            <input type="file" name="teacher_image" onchange="loadFile(event)" accept=".jpg,.jpeg,.png">
                                            @error('teacher_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="imageBox">
                                            <img src="@if($teacher->image){{asset($teacher->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="" id="output">
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
@endsection
