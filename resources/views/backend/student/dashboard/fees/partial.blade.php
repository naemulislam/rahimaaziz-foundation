@extends('backend.layouts.dashboard')
@section('title', 'Create Payment')
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
    /*---------------- */
    #debit-card{
        display: none;
    }
    #credit-card{
        display: none;
    }

</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Create Monthly Payment</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Create Payment</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('student.fees.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{route('student.fees.partial.update',$data->id)}}" method="post" id="payment-form">
                                @csrf
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="">Your Blance</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" class="form-control" value="{{$data->blance}}" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="">Dollar</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" name="fees_dollar" class="form-control" placeholder="Enter amount">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('fees_dollar'))?($errors->first('fees_dollar')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">

                                        <div class="form-group mb-3">
                                            <label for="">Payment method</label>
                                            <select name="pay_type" id="payment_type" class="form-control">
                                                <option>Select Type</option>
                                                <option value="1">Credit Card</option>
                                                <option value="2">Debit Card</option>
                                                <option value="3">Others</option>
                                            </select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('pay_type'))?($errors->first('pay_type')):''}}</div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="card mb-3" id="credit-card">
                                    <div class="card-header"><h2>Payment Details</h2></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
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
                                <div class="row" id="debit-card">
                                    <div class="col-md-12 col-md-offset-3">
                                        <div class="panel panel-default credit-card-box">
                                            <div class="panel-heading display-table">
                                                <h3 class="panel-title">Payment Details</h3>
                                            </div>
                                            <div class="panel-body">




                                                <div class='form-row row'>
                                                    <div class='col-sm-6 form-group required'>
                                                        <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-sm-6 form-group required'>
                                                        <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                        <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                                    </div>
                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Month</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                                    </div>
                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                                    </div>
                                                </div>


                                            </div>
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
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@section('customjs')
<script>
     $(document).on('change', '#payment_type', function() {
        var pay_type = $(this).val();
        if(pay_type == 1){
            document.getElementById("debit-card").style.display="none";
           document.getElementById("credit-card").style.display="block";
        }
        else if(pay_type == 2){
            document.getElementById("credit-card").style.display="none";
           document.getElementById("debit-card").style.display="block";
        }
    })
  
</script>

<!-- Below Debit Card  -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
<!-- Below Credit Cart -->
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
<script>
    $(".js-month-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
</script>

@endsection

@endsection