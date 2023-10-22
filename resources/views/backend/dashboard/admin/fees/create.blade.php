@extends('backend.layouts.dashboard')
@section('title', 'Create Payment')
@section('content')
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
                                <a href="{{route('admin.fees.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{route('admin.fees.store')}}" method="post" id="payment-form">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Class<span class="text-danger">*</span></label>
                                            <select name="class_id" class="form-control js-select-result" id="adclass_id" required>
                                                <option value="--Select--">--Select--</option>
                                                @foreach($class as $row)
                                                <option value="{{$row->id}}">{{ $row->class_name}}</option>
                                                @endforeach

                                            </select>

                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('class_id'))?($errors->first('class_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Student<span class="text-danger">*</span></label>
                                            <select name="student_id" class="form-control js-select-result" id="adstudent_id" required></select>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('student_id'))?($errors->first('student_id')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Select Months<span class="text-danger">*</span></label>
                                            <select class="form-control js-month-tokenizer" multiple="multiple" name="month[]" w="100" required>

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
                                <div class="row">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Due Date</label>
                                            <input type="date" name="due_date" value="{{date('Y-m-d')}}" class="form-control">
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('due_date'))?($errors->first('due_date')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Amount</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" name="fees_dollar" class="form-control" id="fees_dollar">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('fees_dollar'))?($errors->first('fees_dollar')):''}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Discount Type</label>
                                        <select name=" discount_type" id="discount_type" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="1">U.S Dollar($)</option>
                                            <option value="2">Percentage (%)</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-4">
                                        <label for="">Discount</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" name="discount" class="form-control" id="discount">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Discount Amount</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" name="discount_amount" class="form-control" id="discount_amount" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
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
    $(function() {
        $(document).on('change', '#adclass_id', function() {
            var class_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/studentlist')}}/" + class_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Student</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.student.name + '</option>';
                    });
                    $('#adstudent_id').html(html);
                    
                },

            });
        });
    });
</script>
<script>
    $(".js-month-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
</script>
<script>
    var $disabledResults = $(".js-select-result");
    $disabledResults.select2();
</script>

<script>
        function offer() {
            var fees_dollar = $('#fees_dollar').val();
            var discount_type = $('#discount_type').val();
            var discount = $('#discount').val();

            if (discount_type == 1) {
                var discount_amount = fees_dollar - discount;
            } else if (discount_type == 2) {
                var price_cal = ((fees_dollar * discount) / 100);
                var discount_amount = fees_dollar - price_cal;
            } else {
                var discount_amount = 0;
            }

            if (!isNaN(discount_amount)) {
                $('#discount_amount').val(discount_amount);
            }
        }

        $('#fees_dollar, #discount_type, #discount, #discount_amount').on('keyup change', function() {
            offer();
        });
    </script>
@endsection

@endsection