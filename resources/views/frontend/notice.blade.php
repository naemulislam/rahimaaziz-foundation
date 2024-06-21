@extends('frontend.layout.master')
@section('title', 'Notice')
@section('content')
    <style>
        .card-header {
            background: #000338;
            padding: 2px 0px;
            color: #fff;
        }

        .card-header>h3 {
            font-size: 20px;
            font-family: 'Philosopher', sans-serif;
        }

        table>thead>tr>th {
            text-align: center;
        }
    </style>
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                    <div class="page-breadcrumb">
                        <span><a href="{{ route('home') }}">Home</a> / notice</span>
                    </div>
                    <div class="page-title">
                        <h2>Notice Board</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">All Notice</h3>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr">
                                        <th width="5%">SL</th>
                                        <th width="40%">Title</th>
                                        <th width="20%">Description</th>
                                        <th width="25%">Date</th>
                                        <th width="10%">Document</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notices as $notice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $notice->title }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal"
                                                    class="btn label label-lg label-light-success label-inline"
                                                    data-target="#descriptionShow">See Description</a>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($notice->date)->format('j F Y ') }}</td>
                                            <td>
                                                @if ($notice->document)
                                                    <a href="{{ $notice->document }}" download><i class="fa fa-download"
                                                            aria-hidden="true"></i></a>
                                                @else
                                                    <span class="text-danger">Empty</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Add Modal -->
                                        <div class="modal fade" id="descriptionShow" tabindex="-1" role="dialog"
                                            data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Description Show</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>{{ $notice->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        new DataTable('#example', {});
    </script>
@endpush
