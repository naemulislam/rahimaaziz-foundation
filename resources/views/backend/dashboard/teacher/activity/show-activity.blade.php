@extends('backend.layouts.dashboard')
@section('title', 'Activity Details')
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
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Activity details</h5>
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
                        <h3 class="card-label">Student Activity Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('teacher.activity_show',['class'=>$activity->class_id,'date'=>$activity->activity_date]) }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <b class="col-sm-3">Date </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $activity->activity_date}}</dd>
                        <b class="col-sm-3">Name </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $activity->student->student->name}}</dd>

                        <b class="col-sm-3">Class</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $activity->class->class_name }}</dd>

                        <b class="col-sm-3">Roll</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$activity->student->roll}}</dd>
                        <b class="col-sm-3">Education Rating</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if (@$activity->edurating == 1)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            @elseif(@$activity->edurating == 2)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>

                            @elseif(@$activity->edurating == 3)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>

                            @elseif(@$activity->edurating == 4)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>

                            @elseif(@$activity->edurating == 5)
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
                        </dd>
                        <b class="col-sm-3">Bihavior Rating</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if (@$activity->biharating == 1)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            @elseif(@$activity->biharating == 2)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>

                            @elseif(@$activity->biharating == 3)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>
                            <i class="fa fa-star none"></i>

                            @elseif(@$activity->biharating == 4)
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star none"></i>

                            @elseif(@$activity->biharating == 5)
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
                        </dd>
                        <b class="col-sm-3">Education Comment</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$activity->educomment)
                            {{$activity->educomment}}
                            @else
                            Not added yet
                            @endif
                        </dd>
                        <b class="col-sm-3">Bihavior Comment</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if(@$activity->bihacomment)
                            {{$activity->bihacomment}}
                            @else
                            Not added yet
                            @endif
                        </dd>
                        
                        <b class="col-sm-3">Activity List</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                           <ul class="m-0 p-0">
                            @foreach($activitylist as $list)
                            <li>{{$list->activityList->name}}</li>
                            @endforeach
                           </ul>
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