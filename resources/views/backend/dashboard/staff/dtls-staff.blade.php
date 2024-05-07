@extends('backend.layouts.dashboard')
@section('title', 'Staff Details')
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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Staff details</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">staff</a>
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
                            <h3 class="card-label">Staff Details
                                <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ route('admin.staff.index') }}"
                                class="btn btn-primary btn-sm font-weight-bolder">
                                < Back</a>
                                    <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <b class="col-sm-3">Staff Name </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->name }}</dd>
                            <b class="col-sm-3">Staff Email </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{$data->email}}</dd>
                            <b class="col-sm-3">Department </b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{{ @$data->department }}</dd>
                           
                            <b class="col-sm-3">Phone</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if($data->phone)
                                {{ $data->phone }}
                                @else
                                N/A
                                @endif

                            </dd>
                            
                            
                            
                            
                            
                            <b class="col-sm-3">Description</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">{!! @$data->description !!}</dd>
                           
                            <b class="col-sm-3">Status</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                                @if($data->status == 1)
                                Active
                                @else
                                Inactive
                                @endif
                            </dd>
                            
                            
                            <b class="col-sm-3">Staff Photo</b>
                            <b class="col-sm-1"> : </b>
                            <dd class="col-sm-8">
                            <img style="width:150px ;" src="@if(!empty($data->image)){{asset($data->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
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
