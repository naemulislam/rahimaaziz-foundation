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

        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
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
            border-radius: 1.5rem;
        }

        label {
            color: #000;
        }

        .btnSubmit {
            border: none;
            border-radius: 1.5rem;
            padding: 1%;
            width: 20%;
            cursor: pointer;
            background: #0062cc;
            color: #fff;
        }

        aks-file-upload {
            width: 310px;
            display: block;
            margin: 0 auto;
            margin-top: 4rem;
        }

        #uploadfile {
            width: 80%;
            margin: 0 auto;
            color: #002c7b;
            line-height: 1.5;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>

    <div class="container register-form">
        <form action="{{ route('payment.store') }}" method="POST" id="payment-form" enctype="multipart/form-data">
            @csrf
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
                                        <label for="">Father Email<span class="text-danger">*</span></label>
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
                                        <label for="">Mother Email<span class="text-danger">*</span></label>
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
                                        <label for="">Father Language Spoken<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="father_langu_spoken"
                                            placeholder="Enter your father language spoken" value="{{ old('father_langu_spoken') }}">
                                        @error('father_langu_spoken')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Mother Language Spoken<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="mother_langu_spoken"
                                            placeholder="Enter your mother language spoken" value="{{ old('mother_langu_spoken') }}">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btnSubmit">Submit</button>
                </div>
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div class="subs-step">
                                    <p class="mb-2">Enter your cart number</p>
                                </div>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe(
            'pk_test_51KUbT6LEylh30WQ8D6GJ38yeCiUAxpzuTnsVVQHYKTlGLgkwnKUZQ6r1JDnghViWhuKosRw86JQyblDxD5t9OHYL00HXjfO0Ci'
        );
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>

    <script>
        $('input[type="file"]').prettyFile();
        $('.demo1').jPreview();
    </script>
    <script>
        $('.demo2').jPreview();
    </script>
@endpush
