@extends('backend.layouts.dashboard')
@section('title', 'Student Activity')
@section('content')

<style>
    .fa-star {
        color: #FFA500;
    }

    .none {
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">All Student Activity</h5>
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                       <h4 class="text-center"> Date: {{$date->activity_date}}</h4>
                                    </div>
                                    <div class="col-sm-6">
                                    <h4> Class: {{$date->class->class_name}}</h4>
                                    </div>
                                </div>
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Roll</th>
                                            <th>Edu rating</th>
                                            <th>Biha rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                        
                                        @foreach($activitys as $row)

                                        @php
                                        $data = \App\Models\Studentadmission::where('id',$row->admission_id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->student->student->name}}</td>
                                            <td>{{$data->roll}}</td>
                                            <td>
                                                @if (@$row->edurating == 1)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @elseif(@$row->edurating == 2)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>

                                                @elseif(@$row->edurating == 3)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>

                                                @elseif(@$row->edurating == 4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>

                                                @elseif(@$row->edurating == 5)
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

                                                @if (@$row->biharating == 1)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @elseif(@$row->biharating == 2)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>

                                                @elseif(@$row->biharating == 3)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>

                                                @elseif(@$row->biharating == 4)
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star none"></i>

                                                @elseif(@$row->biharating == 5)
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
                                            <td class="d-flex">
                                                <a href="{{route('admin.activity.show',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                               
                                                
                                               
                                                <a href="{{route('admin.activity.edit',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-edit"></i></a>
                                               


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
                url: "{{url('/teacher/dashboard/get/class')}}/" + category_id,
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


<script>
    $(document).on('change', '#adclass_id', function() {
        var class_id = $(this).val();
        $.ajax({
            type: "get",
            url: "" + class_id,
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $.each(res, function(key, value) {
                 

                });
                $('#table').html(res);
            }
        });
    })
</script>


@endsection
@endsection