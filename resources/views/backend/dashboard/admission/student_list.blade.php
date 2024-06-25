@extends('backend.layouts.master')
@section('title','Student list')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Student Admission Active List
                            <span class="d-block text-muted pt-2 font-size-sm">All student admission active here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="dropdown mr-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @php
                                    $requestGroupName = \App\Models\Group::where('id', request()->group_id)->first();
                                @endphp
                                {{ $requestGroupName->name ?? 'Select Group' }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('admin.admission.index') }}">All Class</a>
                                @foreach ($groups as $group)
                                    <a class="dropdown-item"
                                        href="{{ route('admin.admission.index', ['group_id' => $group->id]) }}">{{ $group->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <!--begin::Button-->
                        <a href="{{ route('admin.admission.create')}}" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6"/>
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Admission</a>
                        <!--end::Button-->
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
                                <th>Roll</th>
                                <th>payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admissionStudent as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img style="width:70px ;" src="@if(!empty($row->image)){{asset($row->image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="">
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->admission->group->name}}</td>
                                <td>{{$row->admission->roll}}</td>

                                <td>
                                    @if ($row->admission->payment_status == 0)
                                        <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#payment_status_{{$row->id}}">
                                            Unpaid</a>
                                    @elseif($row->admission->payment_status == 1)
                                        <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#payment_status_{{$row->id}}">Paid</a>
                                    @endif
                                </td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}"> Active</a>
                                    @elseif($row->status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}"> Panding</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.admission.show',$row->slug)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('admin.admission.edit',$row->slug)}}" class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i class="fa fa-edit"></i></a>
                                    <a id="delete" href="{{route('admin.admission.destroy',$row->id)}}" class="btn btn-icon btn-info btn-hover-danger btn-xs mx-3"><i class="fa fa-trash"></i></a>
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
                                                        <option value="0" @if( $row->admission->payment_status == 0 ) selected @endif >Unpaid</option>
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

                            <!--Row Status -->
                            <div class="modal fade" id="row_status_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.admission.status',$row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" @if( $row->status == 1 ) selected @endif >Active</option>
                                                        <option value="2" @if( $row->status == 0 ) selected @endif >Inactive</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
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
