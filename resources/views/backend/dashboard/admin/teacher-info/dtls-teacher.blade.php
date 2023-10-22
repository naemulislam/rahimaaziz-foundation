@extends('backend.layouts.dashboard')
@section('title', 'Teacher Details')
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Teacher details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">teacher</a>
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
                        <h3 class="card-label">Ttudent Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.teacher.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">


                    <b class="col-sm-3">Teacher BarCode</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @php
                           
                            $id_number = $teacher->id_number;
                            
                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                            @endphp

                            {!! $generator->getBarcode('Teacher Id: '.$id_number, $generator::TYPE_CODE_128) !!}
                            
                        </dd>
                        <b class="col-sm-3">Teacher id number </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">#{{ $teacher->id_number }}</dd>
                        <b class="col-sm-3">Teacher Name </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->name }}</dd>
                        <b class="col-sm-3">Teacher Email </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$teacher->email}}</dd>
                        <b class="col-sm-3">Group</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->class->class_name }}</dd>
                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->phone }}</dd>
                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($teacher->gender == 1)
                            Mail
                            @elseif($teacher->gender == 2)
                            Femail
                            @else
                            Gender not added yet
                            @endif
                        </dd>
                        <b class="col-sm-3">Date of Birth</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->date_of_birth }}</dd>
                        <b class="col-sm-3">Marital Status </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{@$teacher->marital_status}}</dd>


                        <b class="col-sm-3">Father Name</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->father_name }}</dd>
                        <b class="col-sm-3">Mother Name</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->mother_name }}</dd>
                        <b class="col-sm-3">Qualification</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">

                            {{ @$teacher->qualification }}
                        </dd>


                        <b class="col-sm-3">Designation</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->designation }}</dd>
                        <b class="col-sm-3">Current Address</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->c_address }}</dd>
                        <b class="col-sm-3">Parment Addrsss</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->p_address }}</dd>
                        <b class="col-sm-3">Date of Joining</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ @$teacher->date_of_joining }}</dd>
                        <b class="col-sm-3">Status</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($teacher->status == 1)
                            Active
                            @else
                            Inactive
                            @endif
                        </dd>


                        <b class="col-sm-3">Teacher Photo</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            <img style="width:150px ;" src="@if(!empty($teacher->profile_photo_path)){{asset($teacher->profile_photo_path)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                        </dd>

                        <b class="col-sm-3">Teacher QrCode<i class="fa fa-qrcode ml-3" aria-hidden="true"></i></b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @php

                            $name = $teacher->name;
                            $email = $teacher->email;
                            $id_number = $teacher->id_number;
                            $class = $teacher->class->class_name;
                            $varri = QrCode::size(100)->generate('Teacher Id: '.$id_number.', Teacher Name: '.$name.', Email: '.$email.', Class: '.$class);
                            @endphp


                            {{$varri}}

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