@extends('backend.student.layouts.master')
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
                        <img width="100px" class="mb-4" src="@if(!empty(Auth('student')->user()->image)) {{ asset(Auth('student')->user()->image)}}
                         @else{{ asset('defaults')}}/avatar/avatar.png @endif" alt="">
                        <h4>{{auth('student')->user()->name}}</h4>
                    </div>
                    <?php
                    $stuinfo_data = \App\Models\StudentInfo::where('student_id', Auth('student')->user()->id)->first();
                    $admission_data = \App\Models\Studentadmission::where('student_id', Auth('student')->user()->id)->first();
                    if($admission_data){
		$countData = \App\Models\StudentActivity::where('admission_id', $admission_data->id)->count();
	$edusumData = \App\Models\StudentActivity::where('admission_id', $admission_data->id)->sum('edurating');
	$bihasumData = \App\Models\StudentActivity::where('admission_id', $admission_data->id)->sum('biharating');
	if ($countData != 0) {
		$ratingAvg = ($edusumData / $countData);
	} else {
		$ratingAvg = 0;
	}
	if ($countData != 0) {
		$bihaviAvg = ($bihasumData / $countData);
	} else {
		$bihaviAvg = 0;
	}
	}
                    ?>

                    <div class="profile-dtls">
                        <div class="dtls-box">
                            <p>Class</p>
                            <p>Nizira</p>
                        </div>
                        <div class="dtls-box">
                            <p>Admission Date</p>
                            <p>{{$admission_data->admission_date?? 'N/A'}}</p>
                        </div>
                        <div class="row">
                            <style>
                                .fa-star {
                                    color: #FFA500;
                                }

                                .fa-star-half {
                                    color: #FFA500;
                                }

                                .none {
                                    color: #bfbebe;
                                }
                            </style>
                            <label class="">Edication Rating</label>
                            <div class="col-lg-12">
                                @if (@$ratingAvg >= 1 && @$ratingAvg <= 1.4) <i class="fa fa-star"></i>
                                    <i class="fa fa-star none"></i>
                                    <i class="fa fa-star none"></i>
                                    <i class="fa fa-star none"></i>
                                    <i class="fa fa-star none"></i>
                                    @elseif(@$ratingAvg >= 1.5 && @$ratingAvg <= 1.9) <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                        <i class="fa fa-star none"></i>
                                        <i class="fa fa-star none"></i>
                                        <i class="fa fa-star none"></i>
                                        @elseif(@$ratingAvg >= 2 && @$ratingAvg <= 2.4) <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            @elseif(@$ratingAvg >= 2.5 && @$ratingAvg <= 2.9) <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @elseif(@$ratingAvg >= 3 && @$ratingAvg <= 3.4) <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star none"></i>
                                                    <i class="fa fa-star none"></i>
                                                    @elseif(@$ratingAvg >= 3.5 && @$ratingAvg <= 3.9) <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                        <i class="fa fa-star none"></i>
                                                        @elseif(@$ratingAvg >= 4 && @$ratingAvg <= 4.4) <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star none"></i>
                                                            @elseif(@$ratingAvg >= 4.5 && @$ratingAvg <= 4.9) <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half"></i>
                                                                @elseif(@$ratingAvg >= 5)
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

                            </div>
                        </div>
                        <div class="row text-center">
                            <label class="">Bihavior Rating</label>
                            <div class="col-lg-12">
                                @if (@$bihaviAvg >= 1 && @$bihaviAvg <= 1.4) <i class="fa fa-star"></i>
                                    <i class="fa fa-star none"></i>
                                    <i class="fa fa-star none"></i>
                                    <i class="fa fa-star none"></i>
                                    <i class="fa fa-star none"></i>
                                    @elseif(@$bihaviAvg >= 1.5 && @$bihaviAvg <= 1.9) <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                        <i class="fa fa-star none"></i>
                                        <i class="fa fa-star none"></i>
                                        <i class="fa fa-star none"></i>
                                        @elseif(@$bihaviAvg >= 2 && @$bihaviAvg <= 2.4) <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            @elseif(@$bihaviAvg >= 2.5 && @$bihaviAvg <= 2.9) <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                                <i class="fa fa-star none"></i>
                                                <i class="fa fa-star none"></i>
                                                @elseif(@$bihaviAvg >= 3 && @$bihaviAvg <= 3.4) <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star none"></i>
                                                    <i class="fa fa-star none"></i>
                                                    @elseif(@$bihaviAvg >= 3.5 && @$bihaviAvg <= 3.9) <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half"></i>
                                                        <i class="fa fa-star none"></i>
                                                        @elseif(@$bihaviAvg >= 4 && @$bihaviAvg <= 4.4) <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star none"></i>
                                                            @elseif(@$bihaviAvg >= 4.5 && @$bihaviAvg <= 4.9) <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half"></i>
                                                                @elseif(@$bihaviAvg >= 5)
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
                            </div>
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
                                            <a href="" class="btn btn-primary">Edit Profile</a>
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
