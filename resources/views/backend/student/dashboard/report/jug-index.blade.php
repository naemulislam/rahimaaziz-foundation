@extends('backend.layouts.dashboard')
@section('title','All Jug')
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
</style>

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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Jug List</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="javascript:;" class="text-muted">jug</a>
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
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>See list</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="row">
                    <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -1</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage1}}%" aria-valuenow="{{$percentage1}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum1 == 20)
                                            Complete
                                            @else
                                            {{$para1}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -2</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage2}}%" aria-valuenow="{{$percentage2}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum2 == 20)
                                            Complete
                                            @else
                                            {{$para2}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -3</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage3}}%" aria-valuenow="{{$percentage3}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum3 == 20)
                                            Complete
                                            @else
                                            {{$para3}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -4</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage4}}%" aria-valuenow="{{$percentage4}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum4 == 20)
                                            Complete
                                            @else
                                            {{$para4}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -5</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage5}}%" aria-valuenow="{{$percentage5}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum5 == 20)
                                            Complete
                                            @else
                                            {{$para5}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -6</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage6}}%" aria-valuenow="{{$percentage6}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum6 == 20)
                                            Complete
                                            @else
                                            {{$para6}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -7</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage7}}%" aria-valuenow="{{$percentage7}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum7 == 20)
                                            Complete
                                            @else
                                            {{$para7}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -8</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage8}}%" aria-valuenow="{{$percentage8}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum8 == 20)
                                            Complete
                                            @else
                                            {{$para8}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -9</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage9}}%" aria-valuenow="{{$percentage9}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum9 == 20)
                                            Complete
                                            @else
                                            {{$para9}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -10</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage10}}%" aria-valuenow="{{$percentage10}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum10 == 20)
                                            Complete
                                            @else
                                            {{$para10}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -11</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage11}}%" aria-valuenow="{{$percentage11}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum11 == 20)
                                            Complete
                                            @else
                                            {{$para11}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -12</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage12}}%" aria-valuenow="{{$percentage12}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum12 == 20)
                                            Complete
                                            @else
                                            {{$para12}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -13</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage13}}%" aria-valuenow="{{$percentage13}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum13 == 20)
                                            Complete
                                            @else
                                            {{$para13}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -14</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage14}}%" aria-valuenow="{{$percentage14}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum14 == 20)
                                            Complete
                                            @else
                                            {{$para14}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -15</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage15}}%" aria-valuenow="{{$percentage15}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum15 == 20)
                                            Complete
                                            @else
                                            {{$para15}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -16</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage16}}%" aria-valuenow="{{$percentage16}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum16 == 20)
                                            Complete
                                            @else
                                            {{$para16}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -17</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage17}}%" aria-valuenow="{{$percentage17}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum17 == 20)
                                            Complete
                                            @else
                                            {{$para17}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -18</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage18}}%" aria-valuenow="{{$percentage18}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum18 == 20)
                                            Complete
                                            @else
                                            {{$para18}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -19</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage19}}%" aria-valuenow="{{$percentage19}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum19 == 20)
                                            Complete
                                            @else
                                            {{$para19}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -20</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage20}}%" aria-valuenow="{{$percentage20}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum20 == 20)
                                            Complete
                                            @else
                                            {{$para20}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -21</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage21}}%" aria-valuenow="{{$percentage21}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum21 == 20)
                                            Complete
                                            @else
                                            {{$para21}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -22</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage22}}%" aria-valuenow="{{$percentage22}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum22 == 20)
                                            Complete
                                            @else
                                            {{$para22}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -23</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage23}}%" aria-valuenow="{{$percentage23}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum23 == 20)
                                            Complete
                                            @else
                                            {{$para23}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -24</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage24}}%" aria-valuenow="{{$percentage24}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum24 == 20)
                                            Complete
                                            @else
                                            {{$para24}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -25</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage25}}%" aria-valuenow="{{$percentage25}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum25 == 20)
                                            Complete
                                            @else
                                            {{$para25}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -26</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage26}}%" aria-valuenow="{{$percentage26}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum26 == 20)
                                            Complete
                                            @else
                                            {{$para26}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -27</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage27}}%" aria-valuenow="{{$percentage27}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum27 == 20)
                                            Complete
                                            @else
                                            {{$para27}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -28</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage28}}%" aria-valuenow="{{$percentage28}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum28 == 20)
                                            Complete
                                            @else
                                            {{$para28}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -29</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage29}}%" aria-valuenow="{{$percentage29}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum29 == 25)
                                            Complete
                                            @else
                                            {{$para29}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Jug Number -30</h4>
                                </div>
                                <div class="card-body">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{$percentage30}}%" aria-valuenow="{{$percentage30}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="body-txt mt-3">
                                        <p>
                                            @if($paraSum30 == 20)
                                            Complete
                                            @else
                                            {{$para30}} page left
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
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
</div>
<!--end::Content-->

@endsection