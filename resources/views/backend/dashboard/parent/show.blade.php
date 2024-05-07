@extends('backend.layouts.dashboard')
@section('title', 'Parent Details')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Parent details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">parent</a>
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
                        <h3 class="card-label">Parent Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.parent.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <b class="col-sm-3">Parent Name</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$data->name }}</dd>
                        <b class="col-sm-3">Parent Email </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$data->email}}</dd>

                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$data->phone }}</dd>


                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$data->gender == 1)
                            Mail
                            @elseif(@$data->gender == 2)
                            Femail
                            @else
                            Not added yet.
                            @endif
                        </dd>
                        <b class="col-sm-3">Address</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            {{@$data->address}}
                        </dd>
                        <b class="col-sm-3">Registration Status</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($data->status == 1)
                            Active
                            @else
                            Inactive
                            @endif
                        </dd>
                        <b class="col-sm-3">Childrens</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @php
                            $children = \App\Models\Children::where('parent_id',$data->id)->get();
                            @endphp

                            
                            @foreach($children as $row)
                            <li>{{$row->student->student->name}} ({{$row->student->class->class_name}})</li>
                            @endforeach
                            
                        </dd>
                        <b class="col-sm-3">Parent Photo</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            <img style="width:150px ;" src="@if(!empty($data->profile_photo_path)){{asset($data->profile_photo_path)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
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