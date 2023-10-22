@extends('backend.layouts.dashboard')
@section('title', 'Homework Details')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Student home work details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">Student</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
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
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">Student Home Work Details
                                <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ url(URL::previous()) }}"
                                class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                       


                            <b class="col-sm-3">Title </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->title}}</dd>
                            <b class="col-sm-3">Description </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->description}}</dd>
        
                            <b class="col-sm-3">Category</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->category->category_name }}</dd>
                            <b class="col-sm-3">Class</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->class->class_name }}</dd>
                            
                            <b class="col-sm-3">Section</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                            @if($data->section_id)
                                    {{$data->section->name}}
                                    @else
                                    N/A
                                    @endif
                                
                            </dd>
                            <b class="col-sm-3">Subject</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->subject->sub_name }}</dd>
                            <b class="col-sm-3">Home Work Date</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->homework_date }}</dd>
                            <b class="col-sm-3">Submit Date</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ $data->submission_date }}</dd>
                            <b class="col-sm-3">Home Work Photo</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                            <img style="width:200px ;" src="@if(!empty($data->image)){{asset($data->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                            </dd>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
