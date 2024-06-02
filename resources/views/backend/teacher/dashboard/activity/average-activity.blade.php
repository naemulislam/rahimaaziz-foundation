@extends('backend.layouts.dashboard')
@section('title', 'Average Activity')
@section('content')

<style>
    .fa-star {
        color: #FFA500;
    }
    .fa-star-half {
        color: #FFA500;
    }

    .none{
        color: #bfbebe;
    }
</style>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">All Student Average Activity</h5>
                    <!--end::Page Title-->
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">All Student Here</h3>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Roll</th>
                                            <th>Edu rating</th>
                                            <th>Biha rating</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table">
                                        
                                        @foreach($students as $row)

                                        <?php
                                        $countData = \App\Models\StudentActivity::where('admission_id',$row->id)->count();
                                        $edusumData = \App\Models\StudentActivity::where('admission_id',$row->id)->sum('edurating');
                                        $bihasumData = \App\Models\StudentActivity::where('admission_id',$row->id)->sum('biharating');
                                        if($countData !=0){
                                            $ratingAvg = ($edusumData / $countData);
                                        }else{
                                            $ratingAvg = 0;
                                        }
                                        if($countData !=0){
                                            $bihaviAvg = ($bihasumData / $countData);
                                        }else{
                                            $bihaviAvg = 0;
                                        }
                                        ?>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->student->name}}</td>
                                            <td>{{$row->class->class_name}}</td>
                                            <td>{{$row->roll}}</td>
                                            <td>
                                            @if ($ratingAvg >= 1 && $ratingAvg <= 1.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 1.5 && $ratingAvg <= 1.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 2 && $ratingAvg <= 2.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 2.5 && $ratingAvg <= 2.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 3 && $ratingAvg <= 3.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 3.5 && $ratingAvg <= 3.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 4 && $ratingAvg <= 4.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($ratingAvg >= 4.5 && $ratingAvg <= 4.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                        @elseif($ratingAvg >= 5)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @endif


                                            </td>
                                            <td>
                                            @if ($bihaviAvg >= 1 && $bihaviAvg <= 1.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 1.5 && $bihaviAvg <= 1.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 2 && $bihaviAvg <= 2.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 2.5 && $bihaviAvg <= 2.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 3 && $bihaviAvg <= 3.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 3.5 && $bihaviAvg <= 3.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 4 && $bihaviAvg <= 4.4)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star none"></i>
                                        @elseif($bihaviAvg >= 4.5 && $bihaviAvg <= 4.9)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                        @elseif($bihaviAvg >= 5)
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                            <i class="fa fa-star none"></i>
                                        @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                       
                                    </tbody>
                                </table>
                                <!--end: Datatable-->
                            </div>

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
</div>
<!--end::Content-->

@section('customjs')


<!-- Add code -->
<script>
    $(function() {
        $(document).on('change', '#adcategory_id', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/teacher/dashboard/get/class')}}/" + category_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Class</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.class_name + '</option>';
                    });
                    $('#adclass_id').html(html);
                },

            });
        });
    });
</script>
<!-- Add code -->


<script>
    $(document).on('change', '#adclass_id', function() {
        var class_id = $(this).val();
        $.ajax({
            type: "get",
            url: "" + class_id,
            dataType: 'json',
            success: function(res) {
                console.log(res);
                $.each(res, function(key, value) {
                 

                });
                $('#table').html(res);
            }
        });
    })
</script>


@endsection
@endsection