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
        .terms-title {
    font-size: 18px;
    text-transform: uppercase;
}
        .trems-box{
            height: 470px;
            overflow-y: scroll;
        }
    </style>

    <div class="container register-form">

        <div class="form">
            <div class="note">
                <h3 class="align-self-center">Applying for the admission.</h3>
            </div>
            <div class="row my-3" id="admission-announcement"></div>
            <form action="{{ route('online.admission.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-content">
                    <div class="card mb-3">
                        <div class="card-header">Basic Details</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Class Group<span class="text-danger">*</span></label>
                                        <select name="group_id" class="form-control" id="groupId">
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
                                        <select class="form-control" name="student_type" id="student_type">
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

                            <div class="previous-school">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Previous School Details</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Address<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter previous school address"
                                                name="prev_school_address" value="{{ old('prev_school_address') }}" />

                                            @error('prev_school_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">City<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="prev_school_city"
                                                placeholder="Enter previous school city" value="{{ old('prev_school_city') }}">

                                            @error('prev_school_city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">State<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="prev_school_state"
                                                placeholder="Enter previous school state" value="{{ old('prev_school_state') }}">

                                            @error('prev_school_state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Zip Code<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="prev_school_zip_code"
                                                placeholder="Enter previous school zip code" value="{{ old('prev_school_zip_code') }}">

                                            @error('prev_school_zip_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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
                            <div class="row mb-3">
                                <div class="col-md-12">
                                        <div class="trems-box">
                                            <div class="trems1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                    id="checkbox" name="checkboxes[]">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        <strong><h2 class="terms-title">TERMS AND CONDITIONS FOR REGISTRATION <span class="text-danger">*</span></h2></strong>
                                                    </label>
                                                    @error('terms_conditions')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <p>
                                                    1. Return the completed application with Admission fee of $300 for Hifz, $100 for weekend Maktab and after school program, $50 for summer program along with the following:<br>
                                                    a. Official identifications, i.e. birth certificate or passport<br>
                                                    b. Last report card and other relevant school records (for new students)<br>
                                                    c. Immunization records (for students under 18)<br>
                                                    d. Recent utility bill, i.e. Con Edison or gas bill (for students under 18)<br>
                                                    2. Class schedule: a. Hifz: Monday to Friday, 08:30 am to 05:00 pm, Saturday, 08:30am to 01:30pm<br>
                                                    b. Weekend Maktab: Saturday-Sunday 10:30 am to 01:30 pm<br>
                                                    c. After school program: Monday to Thursday 05:30 pm to 07:00 pm<br>
                                                    d. Summer program: Monday to Thursday 10:30 am to 01:30 pm<br>
                                                    3. Monthly tuition fee is $500 for residential and $300.00 for non-residential Hifz student, $100 for weekend Maktab and after school program, $100 for summer program. Tuition fee will be 25% less for additional student from the same family.<br>
                                                    4. All tuition fees due must be paid before attending class. (Admission fee plus first month's tuition)<br>
                                                    5. Student's receiving Scholarship/Discounts in any financial matters will be sponsored by RAHIMA AZIZ FOUNDATION from its Sponsor fund/Zakat fund.
                                                    This Application is merely a request for admission. It becomes binding upon the undersigned only when the Applicant has been tested and formally accepted, and all fees are paid.
                                                    RAHIMA AZIZ FOUNDATION Administration reserves the right to admit or reject the Applicant. The school also reserves the right to exclude any student permanently or temporarily at any time that the Administration deems appropriate, either in the interest of the student or for the good of the school.
                                                </p>
                                            </div>
                                            <div class="trems2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                    id="checkbox" name="checkboxes[]">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                       <strong><h2 class="terms-title"> RULES AND REGULATIONS OF RAHIMA AZIZ FOUNDATION <span class="text-danger">*</span></h2></strong>
                                                    </label>
                                                </div>
                                                <p>

                                                <strong>Class Schedule/Attendance</strong><br>
                                                Class timings are Monday to Friday, 8:30am-5:00pm, Saturday 8:30am-1:30pm
                                                <span class="text-info">*</span> Students must arrive at 8:15am every day, lateness is not acceptable<br>
                                                <span class="text-info">*</span> If a student is absent, he must bring a letter to the office explaining the reason for absence on the next day. Absence without a valid excuse will not be accepted.<br>
                                                <span class="text-info">*</span> Nonresidential students will not be dismissed earlier than 5:00pm without prior written notice and valid excuse submitted. Please arrange prompt pick-up for your children.<br>
                                                <span class="text-info">*</span> Residential student may go home Saturday after Zohor Salah and must return before 07:30 pm on Sunday.<br>
                                                <span class="text-info">*</span> Any student absent more than 10 school days without valid reason will not be allowed to take the Final Exam.<br>
                                                <strong> Appearance and Dress code</strong><br>
                                                <span class="text-info">*</span> All students must wear Silwar/Qamees or Thowb (Jubba) with a tope, preferably white, embroidery and any type of print will not be permitted.<br>

                                                <span class="text-info">*</span> Jeans, dress-pants, baggy pants, sleeping pajamas, sweatpants and shorts are NOT allowed.<br>
                                                <span class="text-info">*</span> Any student who reports to school without the appropriate dress will be sent home.<br>
                                                <span class="text-info">*</span> A haircut (which is even on all sides) is required every month. Nails are to be cut every week.<br>
                                                <span class="text-info">*</span> The beard must be grown to one-fist length. Any student who cuts/shaves it less than fist length will be reprimanded, as it is haram in Islam and absolutely unacceptable in madrasah.<br>
                                                <strong>Electronics</strong><br>

                                                <span class="text-info">*</span> Students are NOT allowed to bring any electronics devices to school.<br>
                                                Any electronics brought to school will be confiscated immediately.<br>
                                                <span class="text-info">*</span> Cell phones brought for emergency purposes must be given to the designated teacher.<br>
                                                <strong>Learning Material and Preparedness</strong><br>
                                                Students must bring to school all of the following everyday:<br>
                                                <span class="text-info">*</span>All books listed on the class schedule.<br> <span class="text-info">*</span> All required supplies (see Supplies List)<br> <span class="text-info">*</span> Quran/related books (for Hifz students)<br>
                                                <span class="text-info">*</span> Islamic studies period according to the class schedule (for Hifz students)<br> <span class="text-info">*</span> Appropriate books for Academic studies period according to the class schedule<br>

                                                <span class="text-info">*</span> Students who did not bring their learning material must contact parent or guardian to bring the missing items before sitting for class.<br>
                                                <span class="text-info">*</span> Parents are strongly requested to make sure every day that the correct learning material is with the student before they leave home.

                                                </p>
                                            </div>
                                            <div class="trems3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                    id="checkbox" name="checkboxes[]">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        <strong><h2 class="terms-title">Behavior and Conduct FOR REGISTRATION <span class="text-danger">*</span></h2></strong>
                                                    </label>
                                                </div>
                                                <p>
                                                    <span class="text-info">*</span>Misbehavior and expression of any ell attitude will be dealt with very seriously. On first offense, the student will receive a verbal warning. If it is repeated, he will receive a written warning to be signed by the parent. After the third time, he will be suspended. If repeated thereafter, management will discuss expulsion.<br>
                                                    <span class="text-info">*</span>The possession or use of any form of drugs, intoxicants, cigarettes, e-cigarettes, or other prohibited substances will not be tolerated. The Administration reserves the right to execute all disciplinary actions deemed necessary in case of any violation, including expulsion and the involvement of law enforcement authorities.<br>
                                                   <strong> Tuition & Fees</strong>
                                                    <span class="text-info">*</span> Tuition is due on the first school day of each month.<br>
                                                    <span class="text-info">*</span> Tuition is payable in cash, check, and credit card or online.<br>
                                                    <strong>Lunch/Snack</strong>
                                                    <span class="text-info">*</span> Students will have lunch/snack at their designated time and schedule.<br>
                                                    <span class="text-info">*</span> Lunch/snack must be brought from home. Please ensure the student has a nutritious meal, junk food should be avoided.<br>
                                                    <span class="text-info">*</span> Students will not be allowed to order online or go outside the Madrasah premises to buy food or any other item.<br>
                                                    <strong>Homework/Hifz Card</strong>
                                                    <span class="text-info">*</span> Homework must be completed every day.<br>
                                                    <span class="text-info">*</span> For Hifz Students only:<br>
                                                    <span class="text-info">*</span>  Parents must sign the Hifz Record card every day.<br>
                                                    <span class="text-info">*</span>  Sabaq and Manzil must be
                                                    completed before going to sleep every night.<br>
                                                    <span class="text-info">*</span>  Parents are strongly requested to check the student's Sabaq and Manzil every night to ensure adequate progress. Homework Submission and Detention Policy<br>
                                                    <span class="text-info">*</span>  For Alim Course Students only:<br>
                                                    <span class="text-info">*</span>  All homework is due at the beginning of each period according to the class schedule.<br>
                                                    <span class="text-info">*</span>  For Hifz Students only:<br>
                                                    <span class="text-info">*</span> Sabaq (new lesson) is due at 8:30 am each day.<br>
                                                    <span class="text-info">*</span>Sabqi (previous 10 lessons) is due at 10:00 am each day.<br>
                                                    <span class="text-info">*</span>Manzil (1 para/Juz revision) is due at 11:30 am each day.
                                                    <span class="text-info">*</span> All Quran work must be submitted by 02:40pm.<br>


                                                    <span class="text-info">*</span> Academic studies homework is due at 04:00 pm each day. <br>
                                                    <span class="text-info">*</span> Any student who fails to submit the homework at its appropriate time must remain for detention after school until the missing work is completed and any additional repercussion determined by the instructor is satisfactorily fulfilled.<br>
                                                    <span class="text-info">*</span> Parents will receive a call by 04:00 pm if the student must stay for detention and are expected to arrange pick up accordingly. I have read and promise to follow all school rules mentioned above or otherwise.<br>
                                                </p>
                                            </div>
                                                <div class="trems3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                        id="checkbox" name="checkboxes[]">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            <strong>I have read avobe the all Terms and Conditions</strong>
                                                        </label>
                                                    </div>
                                                </div>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- <button type="submit" class="btnSubmit">Submit</button> --}}
                    <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
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
    {{-- <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('activitis[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script> --}}
    <script>
       $(document).on('change', '#groupId', function() {
            var group_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ url('/get/group') }}/" + group_id,
                dataType: 'html',
                success: function(res) {
                    $('#admission-announcement').html(res);
                }
            });
        })
    </script>
    <script>
       $(document).ready(function() {
            $('#submitBtn').prop('disabled', true); // Initially disable the submit button

            $('input[type="checkbox"]').change(function() {
                 $checked = $('input[type="checkbox"]:checked').length;
                 $UnChecked = $('input[type="checkbox"]').length;

                if ($checked ===  $UnChecked) {
                    $('#submitBtn').prop('disabled', false); // Enable submit button
                } else {
                    $('#submitBtn').prop('disabled', true); // Disable submit button
                }
            });
        });
    </script>
    <script>
        $('#student_type').on('change', function(){
            var value = $(this).val();
            console.log(value);
            if(value == 1){
                $('.previous-school').hide();

            }else{
                $('.previous-school').show();
            }
        });
    </script>
@endpush
