@extends('backend.layouts.dashboard')
@section('title', 'Edit Activity')
@section('content')

<style>
    .rating-group {
        display: inline-flex;
    }

    /* make hover effect work properly in IE */
    .rating__icon {
        pointer-events: none;
    }

    /* hide radio inputs */
    .rating__input {
        position: absolute !important;
        left: -9999px !important;
    }

    /* hide 'none' input from screenreaders */
    .rating__input--none {
        display: none
    }

    /* set icon padding and size */
    .rating__label {
        cursor: pointer;
        padding: 0 0.1em;
        font-size: 2rem;
    }

    /* set default star color */
    .rating__icon--star {
        color: orange;
        font-size: 35px;
    }

    /* if any input is checked, make its following siblings grey */
    .rating__input:checked~.rating__label .rating__icon--star {
        color: #ddd;

    }

    /* make all stars orange on rating group hover */
    .rating-group:hover .rating__label .rating__icon--star {
        color: orange;

    }

    /* make hovered input's following siblings grey on hover */
    .rating__input:hover~.rating__label .rating__icon--star {
        color: #ddd;

    }

    /*this style for Service Ratine css */

    .service-rating-group {
        display: inline-flex;
    }

    /* make hover effect work properly in IE */
    .service-rating__icon {
        pointer-events: none;
    }

    /* hide radio inputs */
    .service-rating__input {
        position: absolute !important;
        left: -9999px !important;
    }

    /* hide 'none' input from screenreaders */
    .service-rating__input--none {
        display: none
    }

    /* set icon padding and size */
    .service-rating__label {
        cursor: pointer;
        padding: 0 0.1em;
        font-size: 2rem;
    }

    /* set default star color */
    .service-rating__icon--star {
        color: orange;
        font-size: 35px;
    }

    /* if any input is checked, make its following siblings grey */
    .service-rating__input:checked~.service-rating__label .service-rating__icon--star {
        color: #ddd;

    }

    /* make all stars orange on rating group hover */
    .service-rating-group:hover .service-rating__label .service-rating__icon--star {
        color: orange;

    }

    /* make hovered input's following siblings grey on hover */
    .service-rating__input:hover~.service-rating__label .service-rating__icon--star {
        color: #ddd;

    }

    .card-title {
        margin-bottom: 0rem;
    }

    .card-header {

        margin-bottom: 20px;

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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Student Activity</h5>
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
                            <h3 class="card-title">Edit Student Activity</h3>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <a href="{{route('teacher.activity_show',['class'=>$activity->class_id,'date'=>$activity->activity_date]) }}" class="btn btn-primary btn-sm font-weight-bolder">
                                    < Back</a>
                                        <!--end::Button-->
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="card-body">
                            <form action="{{ route('teacher.activity.update',$activity->id)}}" method="post">
                                @csrf
                                @method('PUT')



                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card-header flex-wrap py-5">
                                            <div class="card-title">
                                                <h3 class="card-label">Edit Education Review
                                                </h3>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <!-- Rating Stars Box -->
                                            <label>Select Your Rating</label>
                                            <div id="full-stars-example-two">
                                                <div class="rating-group">
                                                    <input disabled checked class="rating__input rating__input--none" name="edurating" id="rating3-none" value="0" type="radio">
                                                    <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->edurating ==1) checked @endif class="rating__input" name="edurating" id="rating3-1" value="1" type="radio">
                                                    <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->edurating ==2) checked @endif class="rating__input" name="edurating" id="rating3-2" value="2" type="radio">
                                                    <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->edurating ==3) checked @endif class="rating__input" name="edurating" id="rating3-3" value="3" type="radio">
                                                    <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->edurating ==4) checked @endif class="rating__input" name="edurating" id="rating3-4" value="4" type="radio">
                                                    <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->edurating ==5) checked @endif class="rating__input" name="edurating" id="rating3-5" value="5" type="radio">

                                                    <div style="color: red; padding:0 5px;">
                                                        {{ $errors->has('edurating') ? $errors->first('edurating'):''}}
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Education Comment<span class="text-danger">*</span></label>
                                            <textarea id="summernote" class="" name="educomment">
                                            {{ $activity->educomment}}

                                            </textarea>
                                            <div style="color: red; padding:0 5px;">{{$errors->has('educomment') ? $errors->first('educomment'): ''}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card-header flex-wrap py-5">
                                            <div class="card-title">
                                                <h3 class="card-label">Edit Bihavior Review
                                                </h3>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <!-- Rating Stars Box -->
                                            <label>Select Your Rating</label>
                                            <div id="full-stars-example-two">
                                                <div class="service-rating-group">
                                                    <input disabled checked class="service-rating__input service-rating__input--none" name="biharating" id="servicerating3-none" value="0" type="radio">
                                                    <label aria-label="1 star" class="service-rating__label" for="servicerating3-1"><i class="service-rating__icon service-rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->biharating ==1) checked @endif class="service-rating__input" name="biharating" id="servicerating3-1" value="1" type="radio">
                                                    <label aria-label="2 stars" class="service-rating__label" for="servicerating3-2"><i class="service-rating__icon service-rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->biharating ==2) checked @endif class="service-rating__input" name="biharating" id="servicerating3-2" value="2" type="radio">
                                                    <label aria-label="3 stars" class="service-rating__label" for="servicerating3-3"><i class="service-rating__icon service-rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->biharating ==3) checked @endif class="service-rating__input" name="biharating" id="servicerating3-3" value="3" type="radio">
                                                    <label aria-label="4 stars" class="service-rating__label" for="servicerating3-4"><i class="service-rating__icon service-rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->biharating ==4) checked @endif class="service-rating__input" name="biharating" id="servicerating3-4" value="4" type="radio">
                                                    <label aria-label="5 stars" class="service-rating__label" for="servicerating3-5"><i class="service-rating__icon service-rating__icon--star fa fa-star"></i></label>

                                                    <input @if($activity->biharating ==5) checked @endif class="service-rating__input" name="biharating" id="servicerating3-5" value="5" type="radio">

                                                    <div style="color: red; padding:0 5px;">
                                                        {{ $errors->has('biharating') ? $errors->first('biharating'):''}}
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Bihavior Comment<span class="text-danger">*</span></label>
                                            <textarea id="summernote2" class="" name="bihacomment">
                                                {{ $activity->bihacomment}}

                                            </textarea>
                                            <div style="color: red; padding:0 5px;">{{$errors->has('bihacomment') ? $errors->first('bihacomment'): ''}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="submit" value="Submit" class="btn btn-success">
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
</div>
<!--end::Content-->

@section('customjs')


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
<script>
    $(function() {
        $(document).on('change', '#adclass_id', function() {
            var class_id = $(this).val();
            $.ajax({
                type: "Get",
                url: "{{url('/teacher/dashboard/get/student')}}/" + class_id,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">Select Student</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val.student.name + '</option>';
                    });
                    $('#adstudent_id').html(html);
                },

            });
        });
    });
</script>
<!-- Add code -->


<script>
    $('#summernote').summernote({
        placeholder: 'Education Description',
        height: 100
    });
</script>
<script>
    $('#summernote2').summernote({
        placeholder: 'Bihavior Description',
        height: 100
    });
</script>

@endsection
@endsection