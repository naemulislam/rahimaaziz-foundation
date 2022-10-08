@extends('backend.layouts.dashboard')
@section('title','Profile')
@section('content')


<style>
    .left-sec {
        background: #fff;
        padding: 10px 15px;
        border: 1px solid #3699ff;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .p-dashboard-tab {
        background: #fff;
        padding: 10px 15px;
        border: 1px solid #3699ff;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .dtls-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #ddd;
    }

    .dtls-box>p {
        color: #000;
        margin: 2px;
        padding: 3px 0px;
        font-size: 15px;
        font-weight: 600;
    }

    .dtls-box p:last-child {
        color: #3699ff;
        font-weight: normal;
    }

    .card {
        margin-top: 20px;
    }

    .card-header {
        padding: 7px 20px;
        margin-bottom: 0;
        background-color: #c9f7f5;
        border-bottom: 1px solid #3699ff;
    }
</style>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="left-sec">
                    <div class="profile-pic text-center">
                        <img width="100px" class="mb-4" src="@if(!empty(Auth('student')->user()->profile_photo_path)) {{ asset(Auth('student')->user()->profile_photo_path)}}
                         @else{{ asset('defaults')}}/avatar/avatar.png @endif" alt="">
                        <h4>student</h4>
                    </div>
                    <?php
                    $stuinfo_data = \App\Models\StudentInfo::where('student_id', Auth('student')->user()->id)->first();
                    $admission_data = \App\Models\StudentInfo::where('student_id', Auth('student')->user()->id)->first();
                    ?>

                    <div class="profile-dtls">
                        <div class="dtls-box">
                            <p>Role</p>
                            <p>student</p>
                        </div>
                        <div class="dtls-box">
                            <p>Admission Date</p>
                            <p>{{@$admission_data->admission_date}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <section id="tabs" class="p-dashboard-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                                        <a class="nav-item nav-link" id="nav-attendance-tab" data-toggle="tab" href="#nav-attendance" role="tab" aria-controls="nav-attendance" aria-selected="false">Attendance</a>
                                        <a class="nav-item nav-link" id="nav-documents-tab" data-toggle="tab" href="#nav-documents" role="tab" aria-controls="nav-documents" aria-selected="false">Documents</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Profile Details</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <b class="col-sm-3">Full Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{auth('student')->user()->name}}</dd>
                                                    <b class="col-sm-3">Phone</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{auth('student')->user()->phone}}</dd>

                                                    <b class="col-sm-3">Email</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{auth('student')->user()->email}}</dd>
                                                    <b class="col-sm-3">Gender</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">
                                                        @if(@$stuinfo_data->gender == 1)
                                                        Mail
                                                        @elseif(@$stuinfo_data->gender == 2)
                                                        else
                                                        Not added yet.
                                                        @endif
                                                    </dd>
                                                    <b class="col-sm-3">Date of Birth</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{@$stuinfo_data->date_of_birth}}</dd>

                                                    <b class="col-sm-3">Father Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{@$stuinfo_data->father_name}}</dd>
                                                    <b class="col-sm-3">Mother Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{@$stuinfo_data->mother_name}}</dd>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Address Detail</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <b class="col-sm-3">Current Address</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{@$stuinfo_data->date_of_birth}}</dd>
                                                    <b class="col-sm-3">Permanent Address</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{@$stuinfo_data->date_of_birth}}</dd>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="btn-edit float-right mt-3">
                                            <a href="{{ route('student.edit',auth('student')->user()->id) }}" class="btn btn-primary">Edit Profile</a>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Attendance</h3>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-documents" role="tabpanel" aria-labelledby="nav-documents-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Documents</h3>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection