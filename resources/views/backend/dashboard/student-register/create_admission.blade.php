@extends('backend.layouts.master')
@section('title', 'Student Admission')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Student Information</h3>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.register.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <!--begin::Form-->
                <div class="card-body">
                    <form action="{{ route('admin.registerAdmission.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Admission No<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter admission number"
                                        name="admission_no" value="{{ old('admission_no') }}">
                                    @error('admission_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Roll No<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="roll"
                                        placeholder="Enter roll number" value="{{ old('roll') }}">
                                    @error('roll')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Registration No<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="registration_no"
                                        placeholder="Enter registration number" value="{{ old('registration_no') }}">
                                    @error('registration_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Group<span class="text-danger">*</span></label>
                                    <select name="group_id" class="form-control js-select-result" id="">
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

                            {{-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Admission Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="applicant_name"
                                        placeholder="Enter admission name" value="{{ old('applicant_name') }}">
                                    @error('applicant_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Student Type<span class="text-danger">*</span></label>
                                    <select class="form-control" name="student_type">
                                        <option selected disabled>Select type</option>
                                        <option value="0">New Student</option>
                                        <option value="1">Return Student</option>
                                    </select>

                                    @error('student_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="date_of_birth"
                                        value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Admission Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="admission_date"
                                        value="{{ old('admission_date') }}" placeholder="Enter Admission Date">
                                    @error('admission_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Place of Birth<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="place_of_birth"
                                        placeholder="Place of Birth" value="{{ old('place_of_birth') }}">
                                    @error('place_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Bloog Group</label>
                                    <input type="text" class="form-control" name="blood"
                                        placeholder="Enter blood group" value="{{ old('blood') }}">
                                    @error('blood')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            {{-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Phone<span class="text-danger">*</span></label>

                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Enter phone number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}

                        </div>
                        <div class="row">
                            {{-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter student email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            {{-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender">
                                        <option selected disabled>Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Home Address<span class="text-danger">*</span></label>
                                    <input type="text" name="address" placeholder="Enter home addrss"
                                        value="{{ old('address') }}" class="form-control">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">City<span class="text-danger">*</span></label>
                                    <input type="text" name="city" placeholder="Enter Student city"
                                        value="{{ old('city') }}" class="form-control">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">State<span class="text-danger">*</span></label>
                                    <input type="text" name="state" placeholder="Enter Student State"
                                        value="{{ old('state') }}" class="form-control">
                                    @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Zip Code<span class="text-danger">*</span></label>
                                    <input type="text" name="zip_code" placeholder="Enter Student Zip code"
                                        value="{{ old('zip_code') }}" class="form-control">
                                    @error('zip_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h4 class="card-title">Guardian Information</h4>

                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Father Name<span class="text-danger">*</span></label>
                                    <input type="text" name="father_name" placeholder="Enter father name"
                                        value="{{ old('father_name') }}" class="form-control">
                                    @error('father_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Father Call<span class="text-danger">*</span></label>
                                    <input type="text" name="father_call" placeholder="Enter father call"
                                        value="{{ old('father_call') }}" class="form-control">
                                    @error('father_call')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Father Email</label>
                                    <input type="text" name="father_email" placeholder="Enter father email"
                                        value="{{ old('father_email') }}" class="form-control">
                                    @error('father_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Mother Name<span class="text-danger">*</span></label>
                                    <input type="text" name="mother_name" placeholder="Enter mother name"
                                        value="{{ old('mother_name') }}" class="form-control">
                                    @error('mother_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Mother Call<span class="text-danger">*</span></label>
                                    <input type="text" name="mother_call" placeholder="Enter mother call"
                                        value="{{ old('mother_call') }}" class="form-control">
                                    @error('mother_call')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <h4 class="card-title">Documents Details</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Birth Cirtificate<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" name="b_certificate"
                                        value="{{ old('b_certificate') }}" accept=".jpg,.jpeg,.pdf">

                                    @error('b_certificate')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Immunization record<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" name="immu_record"
                                        value="{{ old('immu_record') }}" accept=".jpg,.jpeg,.pdf">

                                    @error('immu_record')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Proof of address<span class="text-danger">*</span></label><br>
                                    <small>proof of address (electricity bill or bank statement or any official letter with
                                        the address)</small>
                                    <input type="file" class="form-control-file" name="proof_address"
                                        value="{{ old('proof_address') }}" accept=".jpg,.jpeg,.pdf">

                                    @error('proof_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">physical health report from the doctor</label>

                                    <input type="file" class="form-control-file" name="physical_health"
                                        value="{{ old('physical_health') }}">

                                    @error('physical_health')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">most recent report card from previous school</label>
                                    <input type="file" class="form-control-file" name="mrrcfps"
                                        value="{{ old('mrrcfps') }}">

                                    @error('mrrcfps')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                        <div class="row">
                            <h4 class="card-title">Emergency Contact(Optional)</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="e_name" placeholder="Emergency name"
                                        value="{{ old('e_name') }}" class="form-control">
                                    @error('e_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="number" name="e_call" placeholder="Phone"
                                        value="{{ old('e_call') }}" class="form-control">
                                    @error('e_call')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="">Student Image</label>
                                    <input type="file" name="student_image" onchange="loadFile(event)">
                                    @error('student_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="imageBox">
                                    <img src=" {{asset('defaults/noimage/no_img.jpg')}}" alt="" id="output">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@push('scripts')
    <script>
        var $disabledResults = $(".js-select-result");
        $disabledResults.select2();
    </script>
@endpush
