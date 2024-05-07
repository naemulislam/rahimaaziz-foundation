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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Teacher List</h5>
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
                    <h3 class="card-title">Techer Responsibility List</h3>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('admin.respons.create') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            Create</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Responsibility</th>
                                <th>Status</th>
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
                                <td>{{$row->teacher->class->class_name}}</td>
                                <td>{!! $row->responsibility !!}</td>

                                <td class="d-flex">
                                    <a href="{{route('admin.respons.edit',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-edit"></i></a>

                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)
                                    <button type="button" class="btn btn-icon btn-warning btn-hover-primary btn-xs mx-3 delcheck"><i class="fa fa-trash"></i></button>
                                    @else
                                    
                                    <a id="delete" href="{{route('admin.respons.delete',$row->id)}}" class="btn btn-icon btn-danger btn-hover-danger btn-xs mx-3"><i class="fa fa-trash"></i></a>
                                   
                                    @endif

                                </td>
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
<script>
    $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>
@endsection
@endsection