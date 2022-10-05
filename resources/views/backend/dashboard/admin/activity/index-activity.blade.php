@extends('backend.layouts.dashboard')
@section('title', 'Student Activity')
@section('content')

<style>
    .fa-star {
        color: #FFA500;
    }
    .none{
        color: #bfbebe;
    }
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Create Student Activity</h5>
                    <!--end::Page Title-->
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
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">All Student Here</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{ route('admin.activity.index')}}" class="btn btn-primary btn-sm font-weight-bolder">
                                     See All Activity</a>
                                
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('admin.find.activity')}}" method="POST">
                                @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Category<span class="text-danger">*</span></label>
                                        <select name="category_id" class="form-control" id="adcategory_id">
                                            <option>Select Category</option>
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{ $category->category_name}}</option>
                                            @endforeach
                                        </select>

                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('category_id'))?($errors->first('category_id')):''}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Class<span class="text-danger">*</span></label>
                                        <select name="class_id" class="form-control" id="adclass_id">

                                        </select>

                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('class_id'))?($errors->first('class_id')):''}}</div>
                                    </div>

                                    
                                </div>
                                <div class="col-sm-4">
                                <div class="form-group d-flex">
                                <label for=""></label>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>


                            </div>
                            </form>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Roll</th>
                                            <th>Edu rating</th>
                                            <th>Biha rating</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                        @foreach($students as $row)

                                        @php
                                        $data = \App\Models\Activity::where('admission_id',$row->id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->student->name}}</td>
                                            <td>{{$row->class->class_name}}</td>
                                            <td>{{$row->roll}}</td>
                                            <td>
                                            @if (@$data->edurating == 1)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @elseif(@$data->edurating == 2)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                        
                                                @elseif(@$data->edurating == 3)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                               
                                                @elseif(@$data->edurating == 4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                
                                                @elseif(@$data->edurating == 5)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>

                                                @else
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @endif

                                                
                                            </td>
                                            <td>

                                            @if (@$data->biharating == 1)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @elseif(@$data->biharating == 2)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                        
                                                @elseif(@$data->biharating == 3)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                               
                                                @elseif(@$data->biharating == 4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                
                                                @elseif(@$data->biharating == 5)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>

                                                @else
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if(@$data->educomment)
                                                {{$data->educomment}}
                                                @else
                                                Not added yet
                                                @endif
                                            </td>
                                            <td class="d-flex">
                                    <a href="{{ route('admin.activity.show',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                    @if($data)
                                    <a href="{{ route('admin.activity.edit',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-edit"></i></a>
                                    @else
                                    <a href="{{route('admin.activity.activityCreate',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-edit"></i></a>
                                    @endif


                                    @php
                                    $check1 = 0;

                                    $check2 = 0;
                                    @endphp

                                    @if( $check1 > 0 || $check2 > 0)
                                    <button type="button" class="btn btn-icon btn-warning btn-hover-primary btn-xs mx-3 delcheck"><i class="fa fa-trash"></i></button>
                                    @else

                                    <a id="delete" href="{{route('admin.activity.delete',$row->id)}}" class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    @endif
                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end: Datatable-->
                            </div>

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
</div>
<!--end::Content-->

@section('customjs')


<!-- Add code -->
<script>
    $(function() {
        $(document).on('change', '#adcategory_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/class')}}/" + category_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.class_name + '</option>';
                    });
                    $('#adclass_id').html(html);
                },

            });
        });
    });
</script>
<!-- Add code -->
@endsection
@endsection