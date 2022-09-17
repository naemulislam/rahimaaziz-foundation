@extends('frontend.layout.master')
@section('title','Admission form')
@section('content')
<style>

.cart-collapse {
        text-decoration: none !important;
        color: #000;
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
</style>

<div class="container register-form">
    <div class="form">
        <div class="note">
            <h3>Applying for the admission.</h3>
        </div>

        <form action="{{route('payment.store')}}" method="POST" id="payment-form" enctype="multipart/form-data">
            @csrf
            <div class="form-content">
                <div class="card mb-3">
                    <div class="card-header">Basic Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Category<span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control" id="adcategory_id">
                                        <option>Select Category</option>
                                        @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{ $category->category_name}}</option>
                                        @endforeach
                                    </select>

                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('category_id'))?($errors->first('category_id')):''}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">Class<span class="text-danger">*</span></label>
                                    <select name="class_id" class="form-control" id="adclass_id">

                                    </select>

                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('class_id'))?($errors->first('class_id')):''}}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Admission Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter admission date" name="admission_date" value="{{old('admission_date')}}"/>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('admission_date'))?($errors->first('admission_date')):''}}</div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter your date of birth" name="date_of_birth" value="{{old('date_of_birth')}}"/>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('date_of_birth'))?($errors->first('date_of_birth')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">place of Birth<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter your place of birth" name="place_of_birth" value="{{old('place_of_birth')}}"/>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('place_of_birth'))?($errors->first('place_of_birth')):''}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="number" class="form-control" placeholder="Enter phone number" name="admi_phone" value="{{old('admi_phone')}}"/>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('admi_phone'))?($errors->first('admi_phone')):''}}</div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Gender<span class="text-danger">*</span></label>
                                    <select name="gender" class="form-control">
                                        <option>Select gender</option>
                                        <option value="1">Mail</option>
                                        <option value="2">Femail</option>

                                    </select>

                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('gender'))?($errors->first('gender')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Photo<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" placeholder="Enter your picture" name="admi_photo" value="{{old('admi_photo')}}"/>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('admi_photo'))?($errors->first('admi_photo')):''}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Home Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter home address" name="h_address" value="{{old('h_address')}}"/>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('h_address'))?($errors->first('h_address')):''}}</div>
                                </div>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter your city" value="{{old('city')}}">

                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('city'))?($errors->first('city')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">State<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="state" placeholder="Enter your state" value="{{old('state')}}">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('state'))?($errors->first('state')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Zip Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="zip_code" placeholder="Enter your zip code" value="{{old('zip_code')}}">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('zip_code'))?($errors->first('zip_code')):''}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">Guardian Details</div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Father Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_name" placeholder="Enter your father name" value="{{old('father_name')}}">

                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('father_name'))?($errors->first('father_name')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Father Call<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="father_call" placeholder="Enter your father call" value="{{old('father_call')}}">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('father_call'))?($errors->first('father_call')):''}}</div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mother Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_name" placeholder="Enter your mother name" value="{{old('mother_name')}}">

                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('mother_name'))?($errors->first('mother_name')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mother Call<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="mother_call" placeholder="Enter your mother call" value="{{old('mother_call')}}">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('mother_call'))?($errors->first('mother_call')):''}}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">Payment Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                            <div class="subs-body mt-3">
                            <div class="subs-payment">
                                <div class="subs-step">
                                    <p class="mb-2">Enter your cart number</p>

                                </div>

                                <div class="subs-payment-form">
                                    <div class="form-row">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>

                                </div>

                            </div>
                            <hr>

                        </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btnSubmit">Submit</button>
            </div>
        </form>
    </div>
</div>
@section('customjs')

<!-- Add code -->
<script>
    $(function() {
        $(document).on('change', '#adcategory_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admission/get/class')}}/" + category_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.class_name + '</option>';
                    });
                    $('#adclass_id').html(html);
                },

            });
        });
    });
</script>

<script src="https://js.stripe.com/v3/"></script>
<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51KUbT6LEylh30WQ8D6GJ38yeCiUAxpzuTnsVVQHYKTlGLgkwnKUZQ6r1JDnghViWhuKosRw86JQyblDxD5t9OHYL00HXjfO0Ci');
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

@endsection
@endsection