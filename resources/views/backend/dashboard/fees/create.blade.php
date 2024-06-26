@extends('backend.layouts.master')
@section('title', 'Create Payment')
@section('content')
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
                                            <label for="">Group<span class="text-danger">*</span></label>
                                            <select name="group_id" class="form-control" id="groupId">
                                                <option selected disabled>--Select--</option>
                                                @foreach($groups as $row)
                                                <option value="{{$row->id}}">{{ $row->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                                <span class="text-danger">{{ $message}}</span>
                                            @enderror
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
                                <div class="row" id="monthly-fees-show">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div id="total">Total: $0</div>
                                    </div>
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

                                            <input type="text" name="fees_amount" class="form-control" id="fees_amount">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('fees_amount'))?($errors->first('fees_amount')):''}}</div>
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
                                                <option selected disabled>Select Type</option>
                                                <option value="credit card">Credit Card</option>
                                                <option value="debit card">Debit Card</option>
                                                <option value="zill payment">Zill Payment</option>
                                                <option value="Others">Others</option>
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
    @endsection
    @push('scripts')
<script>
    $(function() {
        $(document).on('change', '#groupId', function() {
            var group_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/admin/dashboard/get/studentlist')}}/" + group_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option selected disabled> Select Student </option>';
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
    $(document).on('change', '#groupId', function() {
         var group_id = $(this).val();
         $.ajax({
             type: "get",
             url: "{{ url('/admin/dashboard/get/group') }}/" + group_id,
             dataType: 'json',
             success: function(data) {
                var html = '';
                    html += '<div class="col-md-4 mb-2"><div class="announcement"><h4>Monthly Fee:' + data.monthly_fee + '</h4></div></div>';
                    $('#monthly-fees-show').html(html);
                    $('#fees_amount').val(data.monthly_fee);
             }
         });
     })
 </script>
 <script>
    //Calculate per month fees
    function calculateTotal() {
            // Get the select element
            var select = document.querySelector('.js-month-tokenizer');
            // Get the number of selected options
            var selectedCount = select.selectedOptions.length;
            console.log(selectedCount);
            // Define the amount per month
            var amountPerMonth = 300;
            // Calculate the total
            var total = selectedCount * amountPerMonth;
            console.log(total);
            // Display the total
            document.getElementById('total').innerText = 'Total: $' + total;
        }

            // Add event listener for changes in the select element
            document.querySelector('.js-month-tokenizer').addEventListener('change',function(){
                calculateTotal();
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
            var fees_amount = $('#fees_amount').val();
            var discount_type = $('#discount_type').val();
            var discount = $('#discount').val();

            if (discount_type == 1) {
                var discount_amount = fees_amount - discount;
            } else if (discount_type == 2) {
                var price_cal = ((fees_amount * discount) / 100);
                var discount_amount = fees_amount - price_cal;
            } else {
                var discount_amount = 0;
            }

            if (!isNaN(discount_amount)) {
                $('#discount_amount').val(discount_amount);
            }
        }

        $('#fees_amount, #discount_type, #discount, #discount_amount').on('keyup change', function() {
            offer();
        });

    </script>
@endpush
