@extends('backend.teacher.layouts.master')
@section('title','Teacher list')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Teacher List
                            <span class="d-block text-muted pt-2 font-size-sm">All teacher here</span>
                        </h3>
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
                                <th>email</th>
                                <th>Group</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img style="width:70px ;" src="@if(!empty($row->image)){{asset($row->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->group->name }}</td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline"> Active</a>
                                    @elseif($row->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('teacher.teacher.show',$row->slug)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                    <a href="#" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-edit"></i></a>
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
@endsection
