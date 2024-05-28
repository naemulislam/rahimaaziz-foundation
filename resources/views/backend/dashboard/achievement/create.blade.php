@extends('backend.layouts.master')
@section('title', 'Achievement')
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
                            <h3 class="card-title">Create Achievement</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('admin.achievement.index') }}"
                                    class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.achievement.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-8 mb-3">
                                        <div class="form-group">
                                            <label for="">Achievement Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter achievement title"
                                                name="title" value="{{ old('title') }}">
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mb-3">
                                        <div class="form-group">
                                            <label for="">Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date"
                                                value="{{ date('Y-m-d') }}">
                                            @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label for="">Description <span class="text-danger">*</span></label>
                                            <textarea id="summernote" class="form-control" placeholder="Enter description about achievement.." name="description"
                                                value="{{ old('description') }}"></textarea>

                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Document <span class="text-danger">*</span></label>
                                            <input type="file" name="document" class="form-control"
                                                onchange="loadFile(event)" accept=".png,.jpg,.jpeg">
                                            @error('document')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label>Preview Image</label>
                                        <img class="previewImage" id="output" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#summernote').summernote({
            placeholder: 'Type some description about achievement..',
            height: 120,
        });
    </script>
@endpush
