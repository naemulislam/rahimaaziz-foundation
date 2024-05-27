@extends('frontend.layout.master')
@section('title','Notice')
@section('content')
<style>
    table > thead > tr> th{text-align: center;}
</style>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto text-center">
                <div class="page-breadcrumb">
                    <span><a href="{{route('home')}}">Home</a> / notice</span>
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
                                    <th width="30%">Title</th>
                                    <th width="40%">Description</th>
                                    <th width="15%">Date</th>
                                    <th width="15%">Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>1/1/2024</td>
                                    <td>61</td>
                                </tr>
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
    new DataTable('#example', {
});
</script>
@endpush
