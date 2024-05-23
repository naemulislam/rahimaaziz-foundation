@extends('frontend.layout.master')
@section('title', 'Admission form')
@section('content')
    <style>
        .card-header {
            background: #000338;
            color: #fff;
        }

        .card {
            border: 2px solid #000338;
        }

        .announcement {
            border: 2px solid #000338;
            padding: 10px 0px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 10px;
        }

        .announcement>h4 {
            color: #000338;
            text-align: center;
            font-size: 20px;
        }

        .note {
            text-align: center;
            height: 80px;
            background: -webkit-linear-gradient(left, #04a549, #0a3a19);
            color: #fff;
            font-weight: bold;
            line-height: 80px;
            padding-top: 20px;
        }

        .form-content {
            padding: 5%;
            border: 1px solid #ced4da;
            margin-bottom: 2%;
        }

        .form-control {
            border-radius: 7px;
        }

        label {
            color: #000;
            font-weight: 500;
            font-size: 15px;
        }

        .btnSubmit {
            border: none;
            border-radius: 10px;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #000338;
            color: #fff;
            font-weight: 600;
        }
    </style>

    <div class="container register-form">

        <div class="form">
            <div class="note">
                <h3 class="align-self-center">Applying for the admission.</h3>
            </div>
            <div class="row my-3">
                <div class="col-md-4">
                    <div class="announcement">
                        <h4>Registration Fee: $100</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="announcement">
                        <h4>Monthly Fee: $200</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="announcement">
                        <h4>Seats are Available: 20</h4>
                    </div>
                </div>
            </div>
            <form action="{{ route('online.admission.store') }}" method="POST" id="payment-form"
                enctype="multipart/form-data">
                @csrf
                <div class="form-content">
                    <div class="card mb-3">
                        <div class="card-header">Basic Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Class Group<span class="text-danger">*</span></label>
                                        <select name="group_id" class="form-control">
                                            <option selected disabled>Select class group</option>
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('group_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="applicant_name"
                                            placeholder="Enter your admission Name" value="{{ old('applicant_name') }}">

                                        @error('applicant_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="number" class="form-control" placeholder="Enter phone number"
                                            name="phone" value="{{ old('phone') }}" />

                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Admission Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="Enter admission date"
                                            name="admission_date" value="{{ old('admission_date') }}" />

                                        @error('admission_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Date of Birth<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="Enter your date of birth"
                                            name="date_of_birth" value="{{ old('date_of_birth') }}" />

                                        @error('date_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">place of Birth<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter your place of birth"
                                            name="place_of_birth" value="{{ old('place_of_birth') }}" />

                                        @error('place_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">picture<span class="text-danger">*</span></label><br>
                                        <input type="file" name="student_image" class="demo1"
                                            data-jpreview-container="#demo-1-container">

                                        @error('student_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div id="demo-1-container" class="jpreview-container"></div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Student type<span class="text-danger">*</span></label>
                                        <select class="form-control" name="student_type">
                                            <option selected disabled>Select type</option>
                                            <option value="0">New Student</option>
                                            <option value="1">Return Student</option>
                                        </select>
                                        @error('student_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div id="demo-1-container" class="jpreview-container"></div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Blood Group</label>
                                        <input type="text" class="form-control" placeholder="Enter your bood group"
                                            name="blood" value="{{ old('blood') }}" />

                                        @error('blood')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable>Gender<span class="text-danger">*</span></lable>
                                        <select name="gender" class="form-control">
                                            <option selected disabled>Select a gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter your email"
                                            name="email" value="{{ old('email') }}" />

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Home Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter home address"
                                            name="address" value="{{ old('address') }}" />

                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">City<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city"
                                            placeholder="Enter your city" value="{{ old('city') }}">

                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">State<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="state"
                                            placeholder="Enter your state" value="{{ old('state') }}">

                                        @error('state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Zip Code<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="zip_code"
                                            placeholder="Enter your zip code" value="{{ old('zip_code') }}">

                                        @error('zip_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Documents Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Birth Certificate<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file" name="b_certificate"
                                            value="{{ old('b_certificate') }}">

                                        @error('b_certificate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Immunization record<span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control-file" name="immu_record"
                                            value="{{ old('immu_record') }}">

                                        @error('immu_record')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Proof of address<span
                                                class="text-danger">*</span></label><br>
                                        <small>proof of address (electricity bill or bank statement or any official
                                            letter with the address)</small>
                                        <input type="file" class="form-control-file" name="proof_address"
                                            value="{{ old('proof_address') }}">

                                        @error('proof_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">physical health report from the doctor</label>
                                        <input type="file" class="form-control-file" name="physical_health"
                                            value="{{ old('physical_health') }}">

                                        @error('physical_health')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">most recent report card from previous school</label>
                                        <input type="file" class="form-control-file" name="mrrcfps"
                                            value="{{ old('mrrcfps') }}">
                                        @error('mrrcfps')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Homeschooling registration acceptance letter</label>
                                        <input type="file" class="form-control-file" name="hsral"
                                            value="{{ old('hsral') }}">

                                        @error('hsral')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Guardian Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Father Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="father_name"
                                            placeholder="Enter your father name" value="{{ old('father_name') }}">

                                        @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Father Call<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="father_call"
                                            placeholder="Enter your father call" value="{{ old('father_call') }}">

                                        @error('father_call')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Father Email</label>
                                        <input type="text" class="form-control" name="father_email"
                                            placeholder="Enter your father email" value="{{ old('father_email') }}">

                                        @error('father_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mother Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mother_name"
                                            placeholder="Enter your mother name" value="{{ old('mother_name') }}">

                                        @error('mother_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mother Call<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mother_call"
                                            placeholder="Enter your mother call" value="{{ old('mother_call') }}">

                                        @error('mother_call')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Mother Email</label>
                                        <input type="text" class="form-control" name="mother_email"
                                            placeholder="Enter your mother email" value="{{ old('mother_email') }}">

                                        @error('mother_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Father Language Spoken<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="father_langu_spoken"
                                            placeholder="Enter your father language spoken"
                                            value="{{ old('father_langu_spoken') }}">
                                        @error('father_langu_spoken')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Mother Language Spoken<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mother_langu_spoken"
                                            placeholder="Enter your mother language spoken"
                                            value="{{ old('mother_langu_spoken') }}">
                                        @error('mother_langu_spoken')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Terms & Conditions</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" onClick="toggle(this)" /><span
                                            class="p-2">Select All</span><br />
                                    </div>
                                    @foreach ($activitys as $activity)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="defaultCheck1" name="activitis[]">
                                            <label class="form-check-label" for="defaultCheck1">
                                                {{ $activity->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <button type="submit" class="btnSubmit">Submit</button> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('input[type="file"]').prettyFile();
        $('.demo1').jPreview();
    </script>
    <script>
        $('.demo2').jPreview();
    </script>
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('activitis[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endpush
