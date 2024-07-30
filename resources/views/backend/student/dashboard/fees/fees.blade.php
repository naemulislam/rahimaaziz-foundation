@extends('backend.student.layouts.master')
@section('title','Fees')
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
</style>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Monthly Fees List
                            <span class="d-block text-muted pt-2 font-size-sm">All fees here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{route('student.fees.create')}}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>Pay Now</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Mode</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fees as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->admission->student->name}}</td>
                                <td>{{$row->group->name}}</td>
                                <td>{{$row->pay_date}}</td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline"> Paid</a>
                                    @elseif($row->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"> Unpaid</a>
                                    @elseif($row->status == 2)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline"> Partial</a>
                                    @endif
                                </td>
                                <td>{{$row->payment_type}}</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->blance}}</td>
                                <td>{{$row->discount}}</td>
                                <td>
                                    @if($row->status == 2)
                                    <a href="{{route('student.fees.partial.edit',$row->id)}}" class="btn label label-lg label-light-success label-inline">Pay</a>
                                    <a href="{{route('student.fees.payment.invoice',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs"><i class="fas fa-file-invoice"></i></a>
                                    @else
                                    <a href="{{route('student.fees.show',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mr-2"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('student.fees.payment.invoice',$row->id)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs"><i class="fas fa-file-invoice"></i></a>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymet_method" value="1">
                            <label class="form-check-label" for="exampleRadios1">
                                Credit Card
                            </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymet_method" value="2">
                            <label class="form-check-label">
                               Debit Card
                            </label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymet_method" value="3">
                            <label class="form-check-label">
                                Others
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
@endpush
