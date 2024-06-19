@extends('backend.layouts.master')
@section('title', 'Request list')
@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Online Admission Request List
                            <span class="d-block text-muted pt-2 font-size-sm">All student admission request here</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width:70px ;"
                                            src="@if (!empty($row->image)) {{ asset($row->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                            alt="">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{$row->admission->group->name ?? ''}}</td>

                                    <td>
                                        @if ($row->admission->payment_status == 0)
                                            <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#payment_status_{{$row->id}}">
                                                Unpaid</a>
                                        @elseif($row->admission->payment_status == 1)
                                            <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#payment_status_{{$row->id}}">Paid</a>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.admission.show',$row->slug)}}" class="btn btn-icon btn-success btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                        <a id="delete" href="{{route('admin.admission.destroy',$row->id)}}" class="btn btn-icon btn-danger btn-hover-danger btn-xs mx-3"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!--Payment Status -->
                            <div class="modal fade" id="payment_status_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Payment Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.admission.payment.status',$row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Select payment status</label>
                                                    <select name="payment_status" class="form-control">
                                                        <option value="1" @if( $row->admission->payment_status == 1 ) selected @endif >Paid</option>
                                                        <option value="2" @if( $row->admission->payment_status == 0 ) selected @endif >Unpaid</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('payment_status'))?($errors->first('payment_status')):''}}</div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
@endsection
