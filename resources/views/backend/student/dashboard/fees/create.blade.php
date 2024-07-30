@extends('backend.student.layouts.master')
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
    .amount-show-box {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            padding: 38px 26px;
            text-align: left;
            border-radius: 10px;
            margin-bottom: 25px;
            border: 1px solid #04ff00;
        }
    #debit-card{
        display: none;
    }
    #credit-card{
        display: none;
    }
</style>
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
                            <form action="{{route('student.fees.store')}}" method="post" class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="">Select Months <span class="text-danger">*</span></label>
                                                    <select class="form-control js-month-tokenizer" multiple="multiple" name="month[]" w="100" id="monthSelect">

                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>

                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>
                                                        {{ $errors->has('month') ? $errors->first('month') : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Pay Date <span class="text-danger">*</span></label>
                                                    <input type="date" name="pay_date" value="{{date('Y-m-d')}}" class="form-control">
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('pay_date'))?($errors->first('pay_date')):''}}</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="">Amount <span class="text-danger">*</span></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" name="fees_amount" id="fees_amount" class="form-control" value="{{auth('student')->user()->admission->group->monthly_fee}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('fees_amount'))?($errors->first('fees_amount')):''}}</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-3">
                                                    <label for="">Payment method <span class="text-danger">*</span></label>
                                                    <select name="pay_type" id="payment_type" class="form-control">
                                                        <option selected disabled>Select Type</option>
                                                        <option value="1">Credit Card</option>
                                                        <option value="2">Debit Card</option>
                                                        <option value="3">Others</option>
                                                    </select>
                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('pay_type'))?($errors->first('pay_type')):''}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="amount-show-box">
                                            <div id="monthly-fees-show">
                                                <h4>Monthly Fees: $<span id="monthly_fees">{{auth('student')->user()->admission->group->monthly_fee}}</span></h4>
                                            </div>
                                            <div>
                                                <h4 id="subtotal">Subtotal: ${{auth('student')->user()->admission->group->monthly_fee}} * <span id="sublength"></span></h4>
                                                <h4 id="total">Total: $0</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3" id="credit-card">
                                    <div class="card-header py-2"><h2>Payment Details</h2></div>
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
    @endsection
@push('scripts')
<script>
    // Calculate the per month fees and total month
    $("#monthSelect").on('change', function() {
        var month = $(".js-month-tokenizer").select2('data');
        var monthly_fees = $('#monthly_fees').text();

        var selectedCount = month.length;
        var amountPerMonth = monthly_fees;
        var total = amountPerMonth * selectedCount;
        $('#fees_amount').val(total);

        document.getElementById('sublength').innerText = selectedCount;
        document.getElementById('total').innerText = 'Total: $' + total;
    });
</script>
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
<!-- Below Creadit Card  -->
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
@endpush
