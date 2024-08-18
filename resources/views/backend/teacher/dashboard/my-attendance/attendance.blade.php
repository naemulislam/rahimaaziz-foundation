@extends('backend.teacher.layouts.master')
@section('title','All Attendance')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">My Attendance List</h3>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
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
                        <!--end::Dropdown-->
                    </div>
                </div>
                <div class="card-body" id="cardbody">
                    <div class="row m-0">
                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <a href="#" class="text-warning font-weight-bold font-size-h6">Attendance Count: {{$class_count ?? 0}}</a>
                        </div>
                        <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7 mr-7">
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Present: {{$present ?? 0}}</a>
                        </div>
                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <a href="#" class="text-warning font-weight-bold font-size-h6">Absent: {{$absent ?? 0}}</a>
                        </div>
                        <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7 mr-7">
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Late: {{$late ?? 0}}</a>
                        </div>
                        <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <a href="#" class="text-warning font-weight-bold font-size-h6">Sick: {{$sick ?? 0}}</a>
                        </div>

                    </div>
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>Present/Absent/Late/Sick</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getAtten as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->attendance_date}}</td>
                                <td>
                                    @if($row->attendence_status == 1)
                                    <a href="#" class="btn label label-lg label-light-success label-inline">Present</a>
                                    @elseif($row->attendence_status == 0)
                                    <a href="#" class="btn label label-lg label-light-danger label-inline">Absent</a>
                                    @elseif($row->attendence_status == 2)
                                    <a href="#" class="btn label label-lg label-light-warning label-inline">Late</a>
                                    @elseif($row->attendence_status == 3)
                                    <a href="#" class="btn label label-lg label-light-warning label-inline">Sick</a>
                                    @endif
                                </td>
                                <td>
                                    {{ date('h:i a', strtotime($row->attendance_time))}}
                                </td>
                            </tr>
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
