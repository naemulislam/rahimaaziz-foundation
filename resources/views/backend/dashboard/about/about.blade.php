@extends('backend.layouts.master')
@section('title', 'About')
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
                            <h3 class="card-title">Rahima Aziz Foundation About</h3>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">

                            <form action=" {{ route('admin.about.updateData', $data?->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description <span class="text-danger">*</span></label>
                                            <textarea name="description" class="form-control" id="summernote">{!! $data?->description !!}</textarea>
                                            @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="" class="d-block">Image <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control"
                                                onchange="loadFile(event)" accept=".png,.jpg,.jpeg">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label>current Image</label>
                                        <img class="previewImage" src="{{ asset($data?->image) }}" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Preview Image</label>
                                        <img class="previewImage" id="output" />
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Type description for about us..',
            height: 120,
        });
    </script>
@endpush
