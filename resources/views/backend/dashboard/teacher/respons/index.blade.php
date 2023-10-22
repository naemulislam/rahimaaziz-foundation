@extends('backend.layouts.dashboard')
@section('title','Responsibility list')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Teacher</a>
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
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">My Responsibility List</h3>
                    
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Responsibility</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($respons as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img style="width:70px ;" src="@if(!empty($row->teacher->profile_photo_path)){{asset($row->teacher->profile_photo_path)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                                </td>
                                <td>{{$row->teacher->name}}</td>
                                <td>{!! $row->responsibility !!}</td>

                                
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@section('customjs')

<!-- <div class="fb-comments" data-href="http://127.0.0.1:8000/teacher/dashboard/teacher/responsibility/index" data-width="" data-numposts="5"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0" nonce="mxrzXITg"></script> -->
@endsection
@endsection