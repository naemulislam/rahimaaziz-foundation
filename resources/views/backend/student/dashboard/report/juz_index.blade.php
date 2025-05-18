@extends('backend.student.layouts.master')
@section('title', 'All Jug')
@section('content')
    <style>
        .card-header {
            padding: 6px 20px;
            margin-bottom: 0;
            background-color: #5c5c5c;
            border-bottom: 1px solid #EBEDF3;
            color: #fff;
        }

        .card-body {
            padding: 14px 7px;
        }

        a {
            font-size: 17px !important;
            font-weight: 600 !important;
        }
    </style>

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">All jug List
                            <span class="d-block text-muted pt-2 font-size-sm">my jug report</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="" class="btn btn-primary font-weight-bolder">
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
                            </span>See list</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <ul class="nav nav-tabs" id="reportTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="chobok-tab" data-toggle="tab" href="#chobok" role="tab" aria-controls="chobok" aria-selected="true">Chobok</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="amukhta-tab" data-toggle="tab" href="#amukhta" role="tab" aria-controls="amukhta" aria-selected="false">Amukhta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tilawat-tab" data-toggle="tab" href="#tilawat" role="tab" aria-controls="tilawat" aria-selected="false">Tilawat</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="reportTabsContent">
                        {{-- Chobok Tab --}}
                        <div class="tab-pane fade show active" id="chobok" role="tabpanel" aria-labelledby="chobok-tab">
                            <div class="row">
                                @if (count($juz) > 0)
                                    @foreach ($juz as $key => $items)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Juz Number {{ $key }}</h4>
                                                </div>
                                                <div class="card-body">
                                                    {{-- Completed Progress --}}
                                                    <label>Completed</label>
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: {{ $items['completed'] }}%" aria-valuenow="{{ $items['completed'] }}"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{ $items['completed'] }}%
                                                        </div>
                                                    </div>

                                                    {{-- Remaining Progress --}}
                                                    <label>Remaining</label>
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: {{ $items['remaining'] }}%" aria-valuenow="{{ $items['remaining'] }}"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                            {{ $items['remaining'] }}%
                                                        </div>
                                                    </div>

                                                    <hr>

                                                    {{-- Info --}}
                                                    <p><strong>Total Lines:</strong> {{ $items['total_lines'] }}</p>
                                                    <p><strong>Completed Lines:</strong> {{ $items['completed_lines'] }}</p>
                                                    <p><strong>Incomplete Lines:</strong> {{ $items['incomplete_lines'] }}</p>
                                                    <p><strong>Total Pages:</strong> {{ $items['total_pages'] }}</p>
                                                    <p><strong>Completed Pages:</strong> {{ $items['completed_pages'] }}</p>
                                                    <p><strong>Incomplete Pages:</strong> {{ $items['incomplete_pages'] }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">No Chobok data found.</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Amukhta Tab --}}
                        <div class="tab-pane fade" id="amukhta" role="tabpanel" aria-labelledby="amukhta-tab">
                        </div>

                        {{-- Tilawat Tab --}}
                        <div class="tab-pane fade" id="tilawat" role="tabpanel" aria-labelledby="tilawat-tab">
                        </div>
                    </div>

                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

@endsection
