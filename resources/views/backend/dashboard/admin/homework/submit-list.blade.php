@extends('backend.layouts.dashboard')
@section('title','Submit list')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Home Work Submit List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Work List</a>
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
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Home Work List
                            <span class="d-block text-muted pt-2 font-size-sm">All student home work here</span>
                        </h3>
                    </div>
                    
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Submit Date</th>
                                <th>Action</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($homeworks as $row)
                            @php
                            $get_stu = \App\Models\Studentadmission::where('student_id',$row->student_id)->first();
                            @endphp
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->student->name}}</td>
                                <td>{{ $get_stu->roll}}</td>
                                <td>{{$row->class->class_name}}</td>
                                <td>{{ Str::limit($row->title,20)}}</td>
                                <td>{{$row->subject->sub_name}}</td>
                                <td>{{$row->homework_date}}</td>
                                

                                <td class="d-flex">
                                    <a href="{{ route('admin.hw.show.submit',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                </td>
                                <td>
                                    
                                <a href="#" data-toggle="modal" data-target="#editmodal_{{$row->id}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-commenting-o"></i></a>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editmodal_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">HW Comment</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.hw.comment.update',$row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Comment</label>
                                                    <input type="text" name="comment" placeholder="Enter your comment" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('comment'))?($errors->first('comment')):''}}</div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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


@endsection