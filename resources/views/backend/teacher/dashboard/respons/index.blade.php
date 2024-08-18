@extends('backend.teacher.layouts.master')
@section('title', 'Responsibility list')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">My Responsibility List</h3>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Responsibility</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($respons as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->teacher->name }}</td>
                                    <td>{!! $row->responsibility !!}</td>
                                    <td>
                                        @if ($row->status == 'pending')
                                        <a href="#" class="btn label label-lg label-light-danger label-inline " data-toggle="modal" data-target="#row_status_{{$row->id}}">Pending</a>
                                        @elseif ($row->status == 'progress')
                                        <a href="#" class="btn label label-lg label-light-info label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}">In Progress</a>
                                        @elseif ($row->status == 'complete')
                                        <a href="#" class="btn label label-lg label-light-success label-inline" data-toggle="modal" data-target="#row_status_{{$row->id}}">Complete</a>
                                        @endif
                                    </td>
                                    <td>{{ $row->respons_date}}</td>
                                </tr>
                                 <!--Row Status -->
                            <div class="modal fade" id="row_status_{{$row->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('teacher.respons.status',$row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option selected disabled>select</option>
                                                        <option value="pending" {{ $row->status == 'pending'? 'selected':''}}>Pending</option>
                                                        <option value="progress" {{ $row->status == 'progress'? 'selected':''}}>In Progress</option>
                                                        <option value="complete" {{ $row->status == 'complete'? 'selected':''}}>Complete</option>
                                                    </select>
                                                    @error('status')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
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
@push('scripts')
    {{-- <div class="fb-comments" data-href="http://127.0.0.1:8000/teacher/dashboard/teacher/responsibility/index" data-width=""
        data-numposts="5"></div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0"
        nonce="mxrzXITg"></script> --}}
@endpush
