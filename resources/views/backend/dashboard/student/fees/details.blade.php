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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Payment Invoice</h5>
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
                        <a href="{{ url(URL::previous()) }}" class="btn btn-primary btn-sm font-weight-bolder mr-2">
                            < Back</a>
                                <!--end::Button-->
                                <div class="dropdown dropdown-inline mr-2">
                                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>Export</button>
                                    <!--begin::Dropdown Menu-->
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi flex-column navi-hover py-2">
                                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                                            <li class="navi-item">
                                                <a href="#" onclick="printwindow()" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="la la-print"></i>
                                                    </span>
                                                    <span class="navi-text">Print</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="" onclick="printwindow()" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-pdf-o"></i>
                                                    </span>
                                                    <span class="navi-text">PDF</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                    <!--end::Dropdown Menu-->
                                </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">




                        <b class="col-sm-3">Name</b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->student->student->name}}</dd>
                        <b class="col-sm-3">Roll </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{{ $data->student->roll}}</dd>
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
                        <b class="col-sm-3">Paymetn Type </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">{!! $data->payment_type !!}</dd>
                        <b class="col-sm-3">Paymetn Mode </b>
                        <b class="col-sm-1"> : </b>
                        <dd class="col-sm-8">
                            @if($data->pay_type == 1)
                            Credit Card
                            @elseif($data->pay_type==2)
                            Debit Card
                            @endif
                        </dd>

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
@section('customjs')
<script>
    function printwindow(){
        window.print();
    }
    
</script>
@endsection
@endsection