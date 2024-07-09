@extends('backend.layouts.master')
@section('title', 'Message Details')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Message Details
                            <span class="d-block text-muted pt-2 font-size-sm">All details here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="{{ route('admin.message.index') }}" class="btn btn-primary btn-sm font-weight-bolder">
                            < Back</a>
                                <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <b class="col-sm-3">Name </b>
                        <b class="col-sm-9">{{ $contact->name }}</b>
                        <b class="col-sm-3">Email </b>
                        <b class="col-sm-9">{{ $contact->email }}</b>
                        <b class="col-sm-3">Subject </b>
                        <b class="col-sm-9">{{ $contact->subject }}</b>
                        <b class="col-sm-3">Message</b>
                        <b class="col-sm-9">{!! $contact->message !!}</b>
                    </div>
                    <div class="row">
                        <a href="#" class="btn btn-info">Reply message</a>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
