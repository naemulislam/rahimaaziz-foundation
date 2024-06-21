@extends('backend.layouts.master')
@section('title', 'Edit Admin')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                        id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Admin</h5>
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
                                <h3 class="card-title">Edit admin</h3>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm font-weight-bolder"> < Back</a>
                                    <!--end::Button-->
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <form action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter name" name="name"
                                                    value="{{ $admin->name }}">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('name') ? $errors->first('name') : '' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Role <span class="text-danger">*</span></label>
                                                <select name="role" class="form-control">
                                                    <option selected disabled>Select a role</option>
                                                    <option {{ $admin->role == 'admin'? 'selected':''}} value="admin">Admin</option>
                                                    <option {{ $admin->role == 'editor'? 'selected':''}} value="editor">Editor</option>
                                                    <option {{ $admin->role == 'manager'? 'selected':''}} value="manager">Manager</option>
                                                    <option {{ $admin->role == 'authoir'? 'selected':''}} value="authoir">Author</option>
                                                </select>
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('role') ? $errors->first('role') : '' }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter email address" name="email"
                                                    value="{{ $admin->email }}">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('email') ? $errors->first('email') : '' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter mobile number" name="mobile"
                                                    value="{{ $admin->phone }}">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" placeholder="Enter address">{{$admin->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="#">Password <span class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password" placeholder="Password"
                                                    value="{{ old('password') }}">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('password') ? $errors->first('password') : '' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="#">Confirm Password <span class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password_confirmation"
                                                    placeholder="Confirm password" value="{{ old('password_confirmation') }}">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="d-block">Picture</label>
                                                <input type="file" name="image" class="form-control"
                                                onchange="loadFile(event)" accept=".png,.jpg,.jpeg">
                                                <div style='color:red; padding: 0 5px;'>
                                                    {{ $errors->has('image') ? $errors->first('image') : '' }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Current Image</label>
                                            <img class="previewImage" src="{{$admin->image ? asset($admin->image): asset('defaults/noimage/no_img.jpg')}}" />
                                        </div>
                                        <div class="col-md-3">
                                            <label>Preview Image</label>
                                            <img class="previewImage" id="output" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="submit" value="Update" class="btn btn-success">
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
@endsection
