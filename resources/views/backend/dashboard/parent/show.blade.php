@extends('backend.layouts.master')
@section('title', 'Parent Details')
@section('content')
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
                        <b class="col-sm-9">{{ $user->name ?? ''}}</b>
                        <b class="col-sm-3">Parent Email </b>
                        <b class="col-sm-9">{{$user->email ?? ''}}</b>

                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-9">{{ $user->phone ?? ''}}</b>

                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-9">
                            @if(@$user->gender == 'male')
                            Male
                            @elseif(@$user->gender == 'female')
                            Female
                            @else
                            Not abed yet.
                            @endif
                        </b>
                        <b class="col-sm-3">Abress</b>
                        <b class="col-sm-9">
                            {{$user->address ?? ''}}
                        </b>
                        <b class="col-sm-3">Registration Status</b>
                        <b class="col-sm-9">
                            @if($user->status == 1)
                            Active
                            @else
                            Inactive
                            @endif
                        </b>
                        <b class="col-sm-3">Childrens</b>
                        <b class="col-sm-9">
                            @php
                            $children = \App\Models\Children::where('parent_id',$user->id)->get();
                            @endphp
                            @foreach($children as $row)
                            <li>{{$row->student->name}} <span>, ({{$row->student->admission->group->name}})</span></li>
                            @endforeach
                        </b>
                        <b class="col-sm-3">Parent Photo</b>
                        <b class="col-sm-9">
                            <img style="width:150px ;" src="@if(!empty($user->image)){{asset($user->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                        </b>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
