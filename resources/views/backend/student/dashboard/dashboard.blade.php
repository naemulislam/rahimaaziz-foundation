@extends('backend.student.layouts.master')
@section('title', 'Dashboard Panel')
@section('content')
    <style>
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
    </style>

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12 col-xxl-4">
                        <!--begin::Mixed Widget 1-->
                        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                            <!--begin::Header-->
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0 position-relative overflow-hidden">
                                <!--begin::Chart-->
                                <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom" style="height: 90px">
                                </div>
                                <!--end::Chart-->
                                <!--begin::Stats-->
                                @if (auth('student')->user()->admission->payment_status == 0)
                                    <div class="row m-0">
                                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                            <a href="#" class="text-warning font-weight-bold font-size-h6"
                                                data-toggle="modal" data-target="#paymentModal">Please pay your
                                                admission fee to access your portal</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="card-spacer mt-n25">
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href="#"
                                                    class="text-warning font-weight-bold font-size-h6">Subject</a>
                                            </div>
                                            <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7 mr-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                                height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3" height="11"
                                                                rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3" height="9"
                                                                rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3" height="7"
                                                                rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href=""
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">Notice</a>
                                            </div>
                                            <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href=""
                                                    class="text-warning font-weight-bold font-size-h6">Attendance In
                                                    Current Month</a>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7 mr-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href=""
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">Teacher</a>
                                            </div>
                                            <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7 mr-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href=""
                                                    class="text-warning font-weight-bold font-size-h6">Homework</a>
                                            </div>
                                            <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href=""
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">Behaviour
                                                    Point</a>
                                            </div>

                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row m-0">
                                            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href="" class="text-warning font-weight-bold font-size-h6">Class
                                                    Routine</a>
                                            </div>
                                            <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7 mr-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href=""
                                                    class="text-primary font-weight-bold font-size-h6 mt-2">Exam
                                                    Routine</a>
                                            </div>
                                            <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7">
                                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4"
                                                                width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3"
                                                                height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3"
                                                                height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3"
                                                                height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <a href="#"
                                                    class="text-warning font-weight-bold font-size-h6">Result</a>
                                            </div>

                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Stats-->
                                @endif
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 1-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->

                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Container-->
    </div>
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" data-backdrop="static"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <form action="{{ route('student.admission.fee.store', auth('student')->user()->id) }}" method="POST"
                    id="payment-form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div class="subs-step">
                                        <p class="mb-2">Enter your card number</p>
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
                        <button type="submit" class="btn btn-primary">Pay now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
@endpush
