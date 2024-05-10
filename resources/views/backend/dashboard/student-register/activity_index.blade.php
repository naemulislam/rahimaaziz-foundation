@extends('backend.layouts.master')
@section('title', 'Activity List')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Student Daily Activity List
                            <span class="d-block text-muted pt-2 font-size-sm">All activity here</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="" data-toggle="modal" data-target="#addmodal"
                            class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path
                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Activity</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->order }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            <a href="#" class="btn label label-lg label-light-success label-inline"
                                                data-toggle="modal" data-target="#row_status_{{ $row->id }}">
                                                Active</a>
                                        @elseif($row->status == 0)
                                            <a href="#" class="btn label label-lg label-light-danger label-inline"
                                                data-toggle="modal" data-target="#row_status_{{ $row->id }}">
                                                Inactive</a>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="#" data-toggle="modal" data-target="#editmodal_{{ $row->id }}"
                                            class="btn btn-icon btn-info btn-hover-primary btn-xs mx-3"><i
                                                class="fa fa-edit"></i></a>
                                        <a id="delete" href="{{route('admin.daily_activity.destroy',$row->id)}}" class="btn btn-icon btn-danger btn-hover-primary btn-xs mx-3"><i
                                                class="fa fa-trash"></i></a>

                                    </td>
                                </tr>

                                <!--Row Status -->
                                <div class="modal fade" id="row_status_{{ $row->id }}" data-backdrop="static"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.daily_activity.status', $row->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" class="form-control">
                                                            <option value="1"
                                                                @if ($row->status == 1) selected @endif>Active
                                                            </option>
                                                            <option value="2"
                                                                @if ($row->status == 0) selected @endif>Inactive
                                                            </option>
                                                        </select>

                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editmodal_{{ $row->id }}" data-backdrop="static"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Daily Activity</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.daily_activity.update', $row->id) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Activity Name</label>
                                                        <input type="text" name="name" value="{{ $row->name }}"
                                                            placeholder="Enter Class name" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Order Sequence</label>
                                                        <input type="number" name="order" placeholder="1,2,3,4,5"
                                                            class="form-control" value="{{ $row->order }}">
                                                        @error('order')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
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


    <!-- Add Modal -->
    <div class="modal fade" id="addmodal" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Daily Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                      </button>
                </div>
                <form action="{{ route('admin.daily_activity.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Activity Name</label>
                            <input type="text" name="name" placeholder="Activity name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">Order Sequence</label>
                            <input type="number" name="order" placeholder="1,2,3,4,5" class="form-control">
                            @error('order')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
