@extends('backend.layouts.dashboard')
@section('title', 'Payment Details')
@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student payment details</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">Student</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
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
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Student Payment Details
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
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->student->student->name}}</dd>
                        <b class="col-sm-3">Class Name </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->class->class_name}}</dd>
                        <b class="col-sm-3">Due Date</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->due_date}}</dd>
                        <b class="col-sm-3">Status </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($data->status == 1)
                            <a href="#" class="btn label label-lg label-light-success label-inline"> Paid</a>
                            @elseif($data->status == 0)
                            <a href="#" class="btn label label-lg label-light-danger label-inline"> Unpaid</a>
                            @elseif($data->status == 2)
                            <a href="#" class="btn label label-lg label-light-danger label-inline"> Partial</a>
                            @endif
                        </dd>
                        <b class="col-sm-3">Paymetn Mode </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{!! $data->payment_type !!}</dd>

                        <b class="col-sm-3">Amount</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->amount }}</dd>
                        <b class="col-sm-3">Current Pay</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$data->pay}}</dd>
                        <b class="col-sm-3">Blance</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$data->blance}}</dd>
                        <b class="col-sm-3">Discount</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{$data->discount}}</dd>
                        <b class="col-sm-3">Payment Type</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($data->pay_type == 1)
                            Credit Card
                            @elseif($data->pay_type == 2)
                            Debit Card
                            @endif
                        </dd>
                        <b class="col-sm-3">Month</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                           <ul>
                            @foreach($month as $row)
                            <li>{{$row->month}}</li>
                            @endforeach
                           </ul>
                        </dd>
                       
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
@endsection