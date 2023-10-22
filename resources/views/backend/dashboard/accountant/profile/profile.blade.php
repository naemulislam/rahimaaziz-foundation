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
                        <img width="100px" class="mb-4" src="@if(!empty(Auth('accountant')->user()->profile_photo_path)) {{ asset(Auth('accountant')->user()->profile_photo_path)}}
                         @else{{ asset('defaults')}}/avatar/avatar.png @endif" alt="">
                        <h4>Accountant</h4>
                    </div>
                    <div class="profile-dtls">
                        <div class="dtls-box">
                            <p>Role</p>
                            <p>Accountant</p>
                        </div>
                        <div class="dtls-box">
                            <p>Designation</p>
                            <p>{{ Auth('accountant')->user()->designation }}</p>
                        </div>
                        <div class="dtls-box">
                            <p>Department</p>
                            <p>{{ Auth('accountant')->user()->department }}</p>
                        </div>

                        <div class="dtls-box">
                            <p>Basic Salary</p>
                            <p>{{ Auth('accountant')->user()->basic_salary }}</p>
                        </div>
                        <div class="dtls-box">
                            <p>Contract Type</p>
                            <p>Permanent</p>
                        </div>
                        <div class="dtls-box">
                            <p>Work Shift</p>
                            <p>{{ Auth('accountant')->user()->work_shift }}</p>
                        </div>
                        
                        <div class="dtls-box">
                            <p>Data of Joining</p>
                            <p>{{ Auth('accountant')->user()->date_of_joining }}</p>
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
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->name }}</dd>
                                                    <b class="col-sm-3">Phone</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->phone }}</dd>
                                                    <b class="col-sm-3">Emergency Contact Number</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->ec_number }}</dd>
                                                    <b class="col-sm-3">Email</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->email }}</dd>
                                                    <b class="col-sm-3">Gender</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">
                                                        @if(Auth('accountant')->user()->gender == 1 )
                                                        Mail
                                                        @else
                                                        Femail
                                                        @endif
                                                    </dd>
                                                    <b class="col-sm-3">Date of Birth</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->date_of_birth }}</dd>
                                                    <b class="col-sm-3">Marital Status</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->marital_status }}</dd>
                                                    <b class="col-sm-3">Father Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->father_name }}</dd>
                                                    <b class="col-sm-3">Mother Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->mother_name }}</dd>
                                                    <b class="col-sm-3">Qualification</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->qualification }}</dd>
                                                    <b class="col-sm-3">Work Exprince</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->work_exprince }}</dd>

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
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->c_address }}</dd>
                                                    <b class="col-sm-3">Permanent Address</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">{{ Auth('accountant')->user()->p_address }}</dd>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="card">
                                            <div class="card-header">
                                                <h3>Bank Account Details</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <b class="col-sm-3">Account Title</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">01584752147</dd>
                                                    <b class="col-sm-3">Bank Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">01584752147</dd>
                                                    <b class="col-sm-3">Bank Branch Name</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">01584752147</dd>
                                                    <b class="col-sm-3">Bank Account Number</b>
                                                    <b class="col-sm-1">:</b>
                                                    <dd class="col-sm-8">01584752147</dd>


                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="btn-edit float-right mt-3">
                                            <a href="{{ route('accountant.edit',auth('accountant')->user()->id) }}" class="btn btn-primary">Edit Profile</a>
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