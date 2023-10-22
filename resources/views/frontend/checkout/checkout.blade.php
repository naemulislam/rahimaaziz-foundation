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
            <h3>Admission Fee</h3>
            
        </div>
        @dd($data["admission_date"])

        <div class="card">
            <div class="card-header">
                <h3>Review Information</h3>
            </div>
          
            
            <div class="card-body">
                <div class="row">
                <b class="col-sm-2">Name</b>
                    <b class="col-sm-1">:</b>
                    <dd class="col-sm-8"> <input type="text" value=""></dd>
                    <b class="col-sm-2">Admission</b>
                    <b class="col-sm-1">:</b>
                    <dd class="col-sm-8"> <input type="text" value="{{ $data['admission_date']}}"></dd>
                    <b class="col-sm-2">Date of birth</b>
                    <b class="col-sm-1">:</b>
                    <dd class="col-sm-8">
                        <input type="text" value="{{ $data['date_of_birth']}}">
                    </dd>
                    <b class="col-sm-2">Place of birth</b>
                    <b class="col-sm-1">:</b>
                    <dd class="col-sm-8">
                        <input type="text" value="{{ $data['place_of_birth']}}">
                    </dd>
                   
                    
                    
                </div>
            </div>
        </div>

       <div class="row">
        <div class="col-md-5">
        <form action="{{route('payment.store')}}" method="post" id="payment-form">
            @csrf

            <div class="form-content">
                <div class="card mb-3">
                    <div class="card-header">Payment</div>
                    <div class="card-body">
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

                <button type="submit" class="btnSubmit">Submit</button>
            </div>
        </form>
        </div>
       </div>
    </div>
</div>
@section('customjs')

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