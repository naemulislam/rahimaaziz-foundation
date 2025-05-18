@extends('backend.student.layouts.master')
@section('title', 'Edit Daily Report')
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
                            <h3 class="card-title">Edit Daily Report</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('student.report.index') }}"
                                    class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('student.report.update', $dailyReport->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Report Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="report_name"
                                                placeholder="Enter report name" value="{{ $dailyReport->report_name }}">
                                                @error('report_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Report Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="report_date"
                                                value="{{ $dailyReport->report_date }}">
                                                @error('report_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Jug Number<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="juz_number"
                                                value="{{ $dailyReport->juz_number }}" placeholder="Enter Jug Number">
                                                @error('juz_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Line Number<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="line_number"
                                                value="{{$dailyReport->line_number}}" placeholder="Enter line Number">
                                            @error('line_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Page Number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="page_number"
                                                value="{{ $dailyReport->page }}" placeholder="Enter page number">
                                                @error('page_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Report Type<span class="text-danger">*</span></label>
                                            <select name="report_type" class="form-control" required>
                                                <option selected disabled>--Select--</option>
                                                <option {{$dailyReport->report_type == 1? 'selected':'' }} value="1">
                                                    Running Tilawat</option>
                                                <option {{$dailyReport->report_type == 2? 'selected':'' }} value="2">
                                                    Daor Review</option>
                                                <option {{$dailyReport->report_type == 3? 'selected':'' }} value="3">
                                                    Daor Amokta</option>
                                            </select>
                                            @error('report_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Desciption</label>
                                            <textarea id="summernote" class="" name="description">
                                                {!! $dailyReport->description !!}
                                            </textarea>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">If you have image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_image_1">
                                            <div class="image-input-wrapper"
                                                style="background-image: url({{ asset($dailyReport->image) }})"></div>
                                            <label
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="change" data-toggle="tooltip" title=""
                                                data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span
                                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
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
@endsection
@push('scripts')
    <script>
        $('#summernote').summernote({
            placeholder: 'Home Work Description',
            height: 100
        });
    </script>
@endpush
