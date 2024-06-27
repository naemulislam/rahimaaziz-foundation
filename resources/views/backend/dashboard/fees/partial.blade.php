@extends('backend.layouts.master')
@section('title', 'Partial Fees')
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
                            <h3 class="card-title">Partials Fees Payment</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('admin.fees.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{route('admin.fees.partial.update',$fees->id)}}" method="post" id="payment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">Partial Balance</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" class="form-control" value="{{$fees->blance}}" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Amount</label>
                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>

                                            <input type="text" name="fees_amount" class="form-control" placeholder="Enter amount">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('fees_amount'))?($errors->first('fees_amount')):''}}</div>
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
