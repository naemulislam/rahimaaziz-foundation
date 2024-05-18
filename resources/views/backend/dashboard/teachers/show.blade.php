@extends('backend.layouts.master')
@section('title', 'Teacher Details')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Teacher Profile Information <span class="d-block text-muted pt-2 font-size-sm">All details
                                here</span>
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
                    <div class="row mb-3">
                        <div class="col-sm-3 mx-auto">
                            <div class="imageBox">
                                <img
                                src="@if (!empty($teacher->image)) {{ asset($teacher->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <b class="col-sm-3">Teacher BarCode</b>
                        <b class="col-sm-8">
                            @php

                                $id_number = $teacher->id_number;

                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                            @endphp

                            {!! $generator->getBarcode('Teacher Id: ' . $id_number, $generator::TYPE_CODE_128) !!}

                        </b>
                        <b class="col-sm-3">Teacher id number </b>
                        <b class="col-sm-8">#{{ $teacher->id_number }}</b>
                        <b class="col-sm-3">Teacher Name </b>
                        <b class="col-sm-8">{{ $teacher->name }}</b>
                        <b class="col-sm-3">Teacher Email </b>
                        <b class="col-sm-8">{{ $teacher->email }}</b>
                        <b class="col-sm-3">Group</b>
                        <b class="col-sm-8">{{ $teacher->group->name ?? 'N/A' }}</b>
                        <b class="col-sm-3">Phone</b>
                        <b class="col-sm-8">{{ $teacher->phone }}</b>
                        <b class="col-sm-3">Gender</b>
                        <b class="col-sm-8">
                            @if ($teacher->gender == 'male')
                                Male
                            @elseif($teacher->gender == 'female')
                                Female
                            @else
                                Gender not abed yet
                            @endif
                        </b>
                        <b class="col-sm-3">Date of Birth</b>
                        <b class="col-sm-8">{{ $teacher->date_of_birth ?? 'N/A' }}</b>
                        <b class="col-sm-3">Marital Status </b>
                        <b class="col-sm-8">{{ $teacher->marital_status ?? 'N/A' }}</b>


                        <b class="col-sm-3">Father Name</b>
                        <b class="col-sm-8">{{ $teacher->father_name ?? 'N/A' }}</b>
                        <b class="col-sm-3">Mother Name</b>
                        <b class="col-sm-8">{{ $teacher->mother_name ?? 'N/A' }}</b>
                        <b class="col-sm-3">Qualification</b>
                        <b class="col-sm-8">

                            {{ $teacher->qualification ?? 'N/A' }}
                        </b>


                        <b class="col-sm-3">Designation</b>
                        <b class="col-sm-8">{{ $teacher->designation ?? 'N/A' }}</b>
                        <b class="col-sm-3">Current Address</b>
                        <b class="col-sm-8">{{ $teacher->c_abress ?? 'N/A'}}</b>
                        <b class="col-sm-3">Date of Joining</b>
                        <b class="col-sm-8">{{ $teacher->date_of_joining ?? 'N/A' }}</b>
                        <b class="col-sm-3">Status</b>
                        <b class="col-sm-8">
                            @if ($teacher->status == 1)
                                Active
                            @else
                                Inactive
                            @endif
                        </b>

                        <b class="col-sm-3">Teacher QrCode<i class="fa fa-qrcode ml-3" aria-hiben="true"></i></b>
                        <b class="col-sm-8">
                            @php

                                $name = $teacher->name;
                                $email = $teacher->email;
                                $id_number = $teacher->id_number;
                                $class = $teacher->group->name ?? 'N/A';
                                $varri = QrCode::size(100)->generate(
                                    'Teacher Id: ' .
                                        $id_number .
                                        ', Teacher Name: ' .
                                        $name .
                                        ', Email: ' .
                                        $email .
                                        ', Class: ' .
                                        $class,
                                );
                            @endphp

                            {{ $varri }}

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
