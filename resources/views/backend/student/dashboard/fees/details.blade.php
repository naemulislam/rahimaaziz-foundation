@extends('backend.student.layouts.master')
@section('title', 'Payment Details')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Student Fees Payment Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ url(URL::previous()) }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <b class="col-sm-3">Student Name</b>
                        <b class="col-sm-9">{{ $fees->admission->student->name }}</b>
                        <b class="col-sm-3">Class Name </b>
                        <b class="col-sm-9">{{ $fees->group->name }}</b>
                        <b class="col-sm-3">Monthly Fees </b>
                        <b class="col-sm-9">{{ $fees->group->monthly_fee }}</b>
                        <b class="col-sm-3">Pay Date</b>
                        <b class="col-sm-9">{{ $fees->pay_date }}</b>
                        <b class="col-sm-3">Status </b>
                        <b class="col-sm-9">
                            @if ($fees->status == 1)
                                <a href="#" class="btn label label-lg label-light-success label-inline"> Paid</a>
                            @elseif($fees->status == 2)
                                <a href="#" class="btn label label-lg label-light-danger label-inline"> Partial</a>
                            @else
                                <a href="#" class="btn label label-lg label-light-danger label-inline"> Unpaid</a>
                            @endif
                        </b>
                        <b class="col-sm-3">Paymetn Mode </b>
                        <b class="col-sm-9">{!! $fees->payment_type !!}</b>
                        <b class="col-sm-3">Amount</b>
                        <b class="col-sm-9">{{ $fees->amount }}</b>
                        <b class="col-sm-3">Balance</b>
                        <b class="col-sm-9">{{ $fees->blance }}</b>
                        <b class="col-sm-3">Discount</b>
                        <b class="col-sm-9">{{ $fees->discount }}</b>
                        <b class="col-sm-3">Payment Type</b>
                        <b class="col-sm-9">{{$fees->pay_type}}</b>
                        <b class="col-sm-3">Month</b>
                        <b class="col-sm-9">
                            <ul>
                                @foreach ($month as $row)
                                    <li>{{ $row->month }}</li>
                                @endforeach
                            </ul>
                        </b>

                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
