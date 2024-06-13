@extends('backend.layouts.master')
@section('title', 'Masjid Prayer')
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
                            <h3 class="card-title">Masjid Prayers Time</h3>

                        </div>
                        <!--begin::Form-->
                        <div class="card-body">

                            <form action=" {{ route('admin.prayer.updatePrayerData', $data?->id) }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">FAJR <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" placeholder="Enter site name"
                                                name="fajar" value="{{ $data?->fajar }}">
                                            @error('fajar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">DHUHR <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" placeholder="Enter site name"
                                                name="dhuhr" value="{{ $data?->dhuhr }}">
                                            @error('dhuhr')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">ASR <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" placeholder="Enter site name"
                                                name="asr" value="{{ $data?->asr }}">
                                            @error('asr')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">MAGHRIB <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" placeholder="Enter site name"
                                                name="maghrib" value="{{ $data?->maghrib }}">
                                            @error('maghrib')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">ISHA <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" placeholder="Enter site name"
                                                name="isha" value="{{ $data?->isha }}">
                                            @error('isha')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Jummah <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" placeholder="Enter site name"
                                                name="jummah" value="{{ $data?->jummah }}">
                                            @error('jummah')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" value="Update" class="btn btn-success">
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

