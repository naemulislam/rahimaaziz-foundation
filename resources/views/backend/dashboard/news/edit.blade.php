@extends('backend.layouts.master')
@section('title', 'News')
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
                                <h3 class="card-title">Edit News</h3>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <a href="{{ route('admin.news.index') }}"
                                        class="btn btn-primary btn-sm font-weight-bolder">
                                        < Back</a>
                                            <!--end::Button-->
                                </div>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <form action="{{ route('admin.news.update',$news->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter news title"
                                                    name="title" value="{{ $news->title }}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="">Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date"
                                                    value="{{ $news->date }}">
                                                @error('date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="summernote" name="description" class="form-control">{!! $news->description !!}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="document" class="form-control"
                                                    onchange="loadFile(event)">
                                                    @error('document')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <label>current Image</label>
                                            <img class="previewImage" src="{{ $news->document}}" />
                                        </div>
                                        <div class="col-md-6">
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
            placeholder: 'Type some description about news..',
            height: 120,
        });
    </script>
@endpush
