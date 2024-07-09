@extends('backend.layouts.master')
@section('title', 'Parent Registration')
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
                            <h3 class="card-title">Parent Registration</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('admin.parent.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.parent.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter student name"
                                                name="name" value="{{ old('name')}}">
                                            @error('name')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Enter email">
                                                @error('email')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Phone<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" value="{{ old('phone')}}"
                                                placeholder="Enter phone">
                                                @error('phone')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Address<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="address" value="{{ old('address')}}"
                                                placeholder="Enter address.."></textarea>
                                                @error('address')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender<span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender">
                                                <option>Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="femail">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password"
                                                value="{{ old('password') }}" placeholder="Enter Password">
                                                @error('password')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Confirm Password<span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}"
                                                placeholder="Enter confirm password">
                                                @error('password_confirmation')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select Students<span class="text-danger">*</span></label>
                                            <select class="form-control js-example-tokenizer" multiple="multiple"
                                                name="student_id[]">
                                                @foreach ($students as $student)
                                                    <option value="{{ $student->id }}">{{ $student->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('student_id')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Parent image</label>
                                           <input type="file" name="image" class="form-control" accept=".jpg,.png.jpeg">
                                            @error('image')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
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
@push('scripts')
    <script>
        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
@endpush
