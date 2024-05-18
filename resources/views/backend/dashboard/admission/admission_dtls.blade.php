@extends('backend.layouts.master')
@section('title', 'Student Details')
@section('content')
<style>
    .fa-star {
        color: #FFA500;
    }

    .none {
        color: #bfbebe;
    }

    .card {
        margin: 7px 0px;
    }

    .btn-link {
        font-weight: 600;
        color: #000000;
        text-decoration: none;
        font-size: 16px;
    }
</style>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Student Admission Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.admission.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 mx-auto">
                            <div class="imageBox">
                                <img src="@if(!empty($student->image)){{asset($student->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <b class="col-sm-3">Student BarCode</b>
                        <b class="col-sm-9">
                            @php
                            $name = $student->name;
                            $email = $student->email;
                            $id_number = $student->admission->id_number;
                            $class = $student->admission->group->name;
                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                            @endphp

                            {!! $generator->getBarcode('Student Id: '.$id_number, $generator::TYPE_CODE_128) !!}

                        </b>

                        <b class="col-sm-3">Student id number </b>
                        <b class="col-sm-9">#{{ $student->admission->id_number }}</b>

                        <b class="col-sm-3">Student Name </b>
                        <b class="col-sm-9">{{ $student->name }}</b>
                        <b class="col-sm-3">Student Email </b>
                        <b class="col-sm-9">{{$student->email}}</b>

                        <b class="col-sm-3">Admission Date</b>
                        <b class="col-sm-9">{{ $student->admission->admission_date }}</b>
                        <b class="col-sm-3">Admission No</b>
                        <b class="col-sm-9">{{ $student->admission->admission_no }}</b>
                        <b class="col-sm-3">Roll No</b>
                        <b class="col-sm-9">{{ $student->admission->roll }}</b>
                        <b class="col-sm-3">Registration No</b>
                        <b class="col-sm-9">{{ $student->admission->registration_no }}</b>
                        <b class="col-sm-3">Class</b>
                        <b class="col-sm-9">{{ $student->admission->group->name }}</b>

                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-9">{{ @$student->phone }}</b>


                        <b class="col-sm-3">Date of birth</b>
                        <b class="col-sm-9">{{ $student->studentinfo->date_of_birth }}</b>
                        <b class="col-sm-3">Place of birth</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->place_of_birth }}
                        </b>
                        <b class="col-sm-3">Blood Group</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->blood }}
                        </b>
                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-9">
                            @if($student->gender == 'male')
                            Mail
                            @elseif($student->gender == 'female')
                            Femail
                            @else
                            Not abed yet.
                            @endif
                        </b>
                        <b class="col-sm-3">Student Type</b>
                        <b class="col-sm-9">
                            @if($student->studentinfo->student_type == 0)
                            New Student
                            @elseif($student->studentinfo->student_type == 1)
                            Return Student
                            @else
                            Not abed yet.
                            @endif
                        </b>
                        <b class="col-sm-3">Home Abress</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->address }}

                        </b>

                        <b class="col-sm-3">City</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->city }}

                        </b>
                        <b class="col-sm-3">State</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->state }}

                        </b>
                        <b class="col-sm-3">Zip Code</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->zip_code }}

                        </b>
                        <b class="col-sm-3">Father Name</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->father_name }}</b>
                        <b class="col-sm-3">Father Call</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->father_call }}</b>
                        <b class="col-sm-3">Father Email</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->father_email ?? 'N/A' }}</b>
                        <b class="col-sm-3">Mother Name</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->mother_name }}
                        </b>
                        <b class="col-sm-3">Mother Call</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->mother_call }}
                        </b>
                        <b class="col-sm-3">Emergency Persone Name</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->e_name ?? 'N/A' }}</b>
                        <b class="col-sm-3">Emergency Persone Call</b>
                        <b class="col-sm-9">
                            {{ $student->studentinfo->e_call ?? 'N/A' }}</b>
                        <b class="col-sm-3">Payment type</b>
                        <b class="col-sm-9">
                            {{ $student->admission->payment_type ?? 'N/A' }}

                        </b>
                        <b class="col-sm-3">Payment method</b>
                        <b class="col-sm-9">
                            {{ $student->admission->payment_method ?? 'N/A' }}

                        </b>
                        <b class="col-sm-3">Payment Status</b>
                        <b class="col-sm-9">
                            @if($student->admission->payment_status == 1)
                            Paid
                            @else
                            Unpaid
                            @endif
                        </b>

                        <b class="col-sm-3">Student Activity Bellow</b>
                        <b class="col-sm-9">

                        </b>
                        <b class="col-sm-3">Education Rating</b>
                        <b class="col-sm-9">
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
                        </b>
                        <b class="col-sm-3">Bihavior Rating</b>
                        <b class="col-sm-9">
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
                        </b>
                        <b class="col-sm-3">Education Comment</b>
                        <b class="col-sm-9">
                            @if(@$activity->educomment)
                            {{$activity->educomment}}
                            @else
                            Not added yet
                            @endif
                        </b>
                        <b class="col-sm-3">Bihavior Comment</b>
                        <b class="col-sm-9">
                            @if(@$activity->bihacomment)
                            {{$activity->bihacomment}}
                            @else
                            Not added yet
                            @endif
                        </b>

                        <b class="col-sm-3">Student Qr Code</b>
                        <b class="col-sm-9">
                            @php

                            $name = $student->name;
                            $email = $student->email;
                            $id_number = $student->admission->id_number;
                            $class = $student->admission->group->name;
                            $varri = QrCode::size(100)->generate('Student Id: '.$id_number.', Student Name: '.$name.', Email: '.$email.', Class: '.$class);
                            @endphp


                            {{$varri}}

                        </b>
                        <b class="col-sm-3">Account Status</b>
                        <b class="col-sm-9">
                            @if($student->status == 1)
                            Active
                            @else
                            Inactive
                            @endif
                        </b>
                        <b class="col-sm-3">Study Status</b>
                        <b class="col-sm-9">
                            @if($student->admission->study_status == 1)
                            Study Running
                            @else
                            Study Pending
                            @endif
                        </b>
                        <b class="col-sm-3">Course Status</b>
                        <b class="col-sm-9">
                            @if($student->admission->course_status == 0)
                            Pending
                            @else
                            Complete
                            @endif
                        </b>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Birth Cirtificate
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            @if($student->admission->b_certificate)
                                            <embed src="{{asset($student->admission->b_certificate)}}" width="100%" height="400px" />
                                            @else
                                            Not abed yet.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Immunization record
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            @if($student->admission->immu_record)
                                            <embed src="{{asset($student->admission->immu_record)}}" width="100%" height="400px" />
                                            @else
                                            Not abed yet.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Proof of abress
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            @if($student->admission->proof_abress)
                                            <embed src="{{asset($student->admission->proof_abress)}}" width="100%" height="400px" />
                                            @else
                                            Not abed yet.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Homeschooling registration acceptance letter
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            @if($student->admission->mrrcfps)
                                            <embed src="{{asset($student->admission->mrrcfps)}}" width="100%" height="400px" />
                                            @else
                                            Not abed yet.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                physical health report from the doctor
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                        <div class="card-body">
                                            @if($student->admission->physical_health)
                                            <embed src="{{asset($student->admission->physical_health)}}" width="100%" height="400px" />
                                            @else
                                            Not abed yet.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                Most recent report card from previous school
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                                        <div class="card-body">
                                            @if($student->admission->mrrcfps)
                                            <embed src="{{asset($student->admission->mrrcfps)}}" width="100%" height="400px" />
                                            @else
                                            Not abed yet.
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
