@extends('backend.student.layouts.master')
@section('title', 'Profile')
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
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 5px 15px;
            margin-bottom: 10px;
            border-radius: 7px;
        }

        .dtls-box>p {
            color: #000;
            margin: 2px;
            padding: 3px 0px;
            font-size: 14px;
            font-weight: 600;
        }

        .dtls-box:last-child {
            border-bottom: 0px solid #ddd;
        }

        .card {
            margin-bottom: 12px;
        }

        .card-header {
            padding: 7px 20px;
            background-color: #0F0F41;
            color: #fff;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            background-color: #0f0f41;
            border-color: 0px;
            color: #fff !important;
        }

        .btn-link {
            font-weight: 400;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="left-sec">
                        <div class="profile-pic text-center">
                            <img width="100px" class="mb-4"
                                src="@if (!empty(Auth('student')->user()->image)) {{ asset(Auth('student')->user()->image) }}
                         @else{{ asset('defaults') }}/avatar/avatar.png @endif"
                                alt="">
                            <h4>{{ auth('student')->user()->name }}</h4>
                        </div>

                        <div class="profile-dtls">
                            <div class="dtls-box">
                                <p>Class:</p>
                                <p>{{ auth('student')->user()->admission->group->name }}</p>
                            </div>
                            <div class="dtls-box">
                                <p>Roll:</p>
                                <p>{{ auth('student')->user()->admission->roll ?? 'N/A' }}</p>
                            </div>
                            <div class="dtls-box">
                                <p>Reg:</p>
                                <p>{{ auth('student')->user()->admission->registration_no ?? 'N/A' }}</p>
                            </div>
                            <div class="dtls-box">
                                <p>Filling No:</p>
                                <p>{{ auth('student')->user()->admission->admission_no ?? 'N/A' }}</p>
                            </div>
                            <div class="dtls-box">
                                <p>Id Number:</p>
                                <p>{{ auth('student')->user()->admission->id_number ?? 'N/A' }}</p>
                            </div>
                            <div class="dtls-box">
                                <p>Gender:</p>
                                <p>
                                    @if (auth('student')->user()->gender == 'male')
                                        Mail
                                    @elseif(auth('student')->user()->gender == 'female')
                                        Female
                                    @else
                                        Not added yet.
                                    @endif
                                </p>
                            </div>
                            <div class="dtls-box">
                                <p>Date of Birth:</p>
                                <p>{{ auth('student')->user()->studentinfo->date_of_birth ?? 'N/A' }}</p>
                            </div>
                            <div class="dtls-box">
                                <p>Filling Date:</p>
                                <p>{{ auth('student')->user()->admission->admission_date ?? 'N/A' }}</p>
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
                                            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="true">Profile</a>
                                            <a class="nav-item nav-link" id="nav-documents-tab" data-toggle="tab"
                                                href="#nav-documents" role="tab" aria-controls="nav-documents"
                                                aria-selected="false">Documents</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <form
                                                action="{{ route('student.profile.update', auth('student')->user()->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>Profile Information</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <b class="col-sm-3">Full Name</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="name"
                                                                    value="{{ auth('student')->user()->name }}"
                                                                    class="form-control">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Phone</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="phone"
                                                                    value="{{ auth('student')->user()->phone }}"
                                                                    class="form-control">
                                                                @error('phone')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>

                                                            <b class="col-sm-3">Email</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="email"
                                                                    value="{{ auth('student')->user()->email }}"
                                                                    class="form-control">
                                                                @error('email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Blood Group</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="blood"
                                                                    value="{{ auth('student')->user()->studentinfo->blood }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your blood group">
                                                                @error('blood')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Picture</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="file" name="image"
                                                                    class="form-control">
                                                                @error('image')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>Address Information</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <b class="col-sm-3">Home Address</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="address"
                                                                    value="{{ auth('student')->user()->studentinfo->address }}"
                                                                    class="form-control" placeholder="Enter your address">
                                                                @error('address')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">City</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="city"
                                                                    value="{{ auth('student')->user()->studentinfo->city }}"
                                                                    class="form-control" placeholder="Enter your city">
                                                                @error('city')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">State</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="state"
                                                                    value="{{ auth('student')->user()->studentinfo->state }}"
                                                                    class="form-control" placeholder="Enter your state">
                                                                @error('state')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Zip code</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="zip_code"
                                                                    value="{{ auth('student')->user()->studentinfo->zip_code }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your zip code">
                                                                @error('zip_code')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Place of Birth</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text"
                                                                    name="place_of_birth"
                                                                    value="{{ auth('student')->user()->studentinfo->place_of_birth }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your place of birth">
                                                                @error('place_of_birth')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>Guardian Information</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <b class="col-sm-3">Father Name</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="father_name"
                                                                    value="{{ auth('student')->user()->studentinfo->father_name }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your father name">
                                                                @error('father_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Father Call</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="number" name="father_call"
                                                                    value="{{ auth('student')->user()->studentinfo->father_call }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your father call">
                                                                @error('father_call')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Father Email</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text"
                                                                    name="father_email"
                                                                    value="{{ auth('student')->user()->studentinfo->father_email }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your father email">
                                                                @error('father_email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Father Language Spoken</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text"
                                                                    name="father_langu_spoken"
                                                                    value="{{ auth('student')->user()->studentinfo->father_langu_spoken }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your father language spoken">
                                                                @error('father_langu_spoken')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>

                                                            <b class="col-sm-3">Mother Name</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="mother_name"
                                                                    value="{{ auth('student')->user()->studentinfo->mother_name }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your mother name">
                                                                @error('mother_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Mother Call</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="number" name="mother_call"
                                                                    value="{{ auth('student')->user()->studentinfo->mother_call }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your mother call">
                                                                @error('mother_call')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Mother Email</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text"
                                                                    name="mother_email"
                                                                    value="{{ auth('student')->user()->studentinfo->mother_email }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your mother email">
                                                                @error('mother_email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Mother Language Spoken</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text"
                                                                    name="mother_langu_spoken"
                                                                    value="{{ auth('student')->user()->studentinfo->mother_langu_spoken }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your mother language spoken">
                                                                @error('mother_langu_spoken')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>

                                                            <b class="col-sm-3">Emergency Name</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="text" name="e_name"
                                                                    value="{{ auth('student')->user()->studentinfo->e_name }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your emergency guardian name">
                                                                @error('e_name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>
                                                            <b class="col-sm-3">Emergency Call</b>
                                                            <b class="col-sm-1">:</b>
                                                            <dd class="col-sm-8"><input type="number" name="e_call"
                                                                    value="{{ auth('student')->user()->studentinfo->e_call }}"
                                                                    class="form-control"
                                                                    placeholder="Enter your emergency guardian call">
                                                                @error('e_call')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </dd>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="btn-edit float-right mt-3">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-documents" role="tabpanel"
                                            aria-labelledby="nav-documents-tab">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Documents</h3>
                                                </div>
                                                @php
                                                    $student = auth('student')->user();
                                                @endphp
                                                <div class="card-body">
                                                    <form action="{{ route('student.document.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div id="accordion">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h5 class="mb-0">
                                                                            <a class="btn btn-link"
                                                                                data-toggle="collapse"
                                                                                data-target="#collapseOne"
                                                                                aria-expanded="true"
                                                                                aria-controls="collapseOne">
                                                                                Birth Cirtificate
                                                                            </a>
                                                                        </h5>
                                                                    </div>

                                                                    <div id="collapseOne" class="collapse"
                                                                        aria-labelledby="headingOne"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="form-group mb-3">
                                                                                <input type="file" name="b_certificate"
                                                                                    class="form-control">
                                                                                @error('b_certificate')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            @if ($student->admission->b_certificate)
                                                                                <embed
                                                                                    src="{{ asset($student->admission->b_certificate) }}"
                                                                                    width="100%" height="400px" />
                                                                            @else
                                                                                Not abed yet.
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingTwo">
                                                                        <h5 class="mb-0">
                                                                            <a class="btn btn-link collapsed"
                                                                                data-toggle="collapse"
                                                                                data-target="#collapseTwo"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseTwo">
                                                                                Immunization record
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseTwo" class="collapse"
                                                                        aria-labelledby="headingTwo"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="form-group mb-3">
                                                                                <input type="file" name="immu_record"
                                                                                    class="form-control">
                                                                                @error('immu_record')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            @if ($student->admission->immu_record)
                                                                                <embed
                                                                                    src="{{ asset($student->admission->immu_record) }}"
                                                                                    width="100%" height="400px" />
                                                                            @else
                                                                                Not abed yet.
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingThree">
                                                                        <h5 class="mb-0">
                                                                            <a class="btn btn-link collapsed"
                                                                                data-toggle="collapse"
                                                                                data-target="#collapseThree"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseThree">
                                                                                Proof of abress
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseThree" class="collapse"
                                                                        aria-labelledby="headingThree"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="form-group mb-3">
                                                                                <input type="file" name="proof_address"
                                                                                    class="form-control">
                                                                                @error('proof_address')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            @if ($student->admission->proof_address)
                                                                                <embed
                                                                                    src="{{ asset($student->admission->proof_address) }}"
                                                                                    width="100%" height="400px" />
                                                                            @else
                                                                                Not abed yet.
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFour">
                                                                        <h5 class="mb-0">
                                                                            <a class="btn btn-link collapsed"
                                                                                data-toggle="collapse"
                                                                                data-target="#collapseFour"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseFour">
                                                                                Homeschooling registration acceptance letter
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseFour" class="collapse"
                                                                        aria-labelledby="headingFour"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="form-group mb-3">
                                                                                <input type="file" name="hsral"
                                                                                    class="form-control">
                                                                                @error('hsral')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            @if ($student->admission->hsral)
                                                                                <embed
                                                                                    src="{{ asset($student->admission->hsral) }}"
                                                                                    width="100%" height="400px" />
                                                                            @else
                                                                                Not abed yet.
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingFive">
                                                                        <h5 class="mb-0">
                                                                            <a class="btn btn-link collapsed"
                                                                                data-toggle="collapse"
                                                                                data-target="#collapseFive"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseFive">
                                                                                physical health report from the doctor
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseFive" class="collapse"
                                                                        aria-labelledby="headingFive"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="form-group mb-3">
                                                                                <input type="file"
                                                                                    name="physical_health"
                                                                                    class="form-control">
                                                                                @error('physical_health')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            @if ($student->admission->physical_health)
                                                                                <embed
                                                                                    src="{{ asset($student->admission->physical_health) }}"
                                                                                    width="100%" height="400px" />
                                                                            @else
                                                                                Not abed yet.
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-header" id="headingSix">
                                                                        <h5 class="mb-0">
                                                                            <a class="btn btn-link collapsed"
                                                                                data-toggle="collapse"
                                                                                data-target="#collapseSix"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseSix">
                                                                                Most recent report card from previous school
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="collapseSix" class="collapse"
                                                                        aria-labelledby="headingSix"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <div class="form-group mb-3">
                                                                                <input type="file" name="mrrcfps"
                                                                                    class="form-control">
                                                                                @error('mrrcfps')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            @if ($student->admission->mrrcfps)
                                                                                <embed
                                                                                    src="{{ asset($student->admission->mrrcfps) }}"
                                                                                    width="100%" height="400px" />
                                                                            @else
                                                                                Not abed yet.
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="btn-edit float-right mt-3">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
