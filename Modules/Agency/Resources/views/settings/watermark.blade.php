@extends('layouts.master')
@section('css')
    <link href="{{ asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css">


    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title',trans('agency.watermark'))
@section('content')
    <div class="content p-3">
        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('agency.watermark')
            </h4>


        </div>
        <form action="{{ url('agency/watermark') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="agency_id" value="{{ $agency }}">
            <input type="hidden" name="watermark_id" value="{{ $watermark->id }}">
            <div class="row m-3">


                <div class="col-md-9">
                    <div>
                        <div class="checkbox checkbox-danger checkbox-circle ">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="active" class="custom-control-input"
                                   id="active"
                                   value="yes" {{$watermark->active == 'yes' ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="active">@lang('agency.active')</label>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-2">
                                @lang('agency.position') :
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="top-left"
                                                       value="top-left" {{$watermark->position == 'top-left' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="top-left">@lang('agency.top_left')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="top"
                                                       value="top" {{$watermark->position == 'top' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="top">@lang('agency.top_center')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="top-right"
                                                       value="top-right" {{$watermark->position == 'top-right' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="top-right">@lang('agency.top_right')</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="left"
                                                       value="left" {{$watermark->position == 'left' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="left">@lang('agency.left_center')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="center"
                                                       value="center" {{$watermark->position == 'center' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="center">@lang('agency.mid_center')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="right"
                                                       value="right" {{$watermark->position == 'right' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="right">@lang('agency.right_center')</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="bottom-left"
                                                       value="bottom-left" {{$watermark->position == 'bottom-left' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="bottom-left">@lang('agency.left_bottom')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="bottom"
                                                       value="bottom" {{$watermark->position == 'bottom' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="bottom">@lang('agency.mid_bottom')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                <input data-plugin="tippy" data-tippy-placement="top-start" type="radio"
                                                       name="position" class="custom-control-input"
                                                       id="bottom-right"
                                                       value="bottom-right" {{$watermark->position == 'bottom-right' ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="bottom-right">@lang('agency.right_bottom')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row  m-3">
                            <div class="col-md-2">
                                @lang('agency.transparency') :
                            </div>
                            <div class="col-sm-6">

                                <input type="text" id="range" class="range">
                                <input type="hidden" class="transparent" name="transparent">

                            </div>
                        </div>


                        <div class="row  m-3">
                            <div class="col-md-2">
                                @lang('agency.watermark_image') :
                            </div>
                            <div class="col-sm-6">


                                <input type="file" name="image" data-plugins="dropify" id="image"
                                       data-default-file="{{$watermark->image != null ? asset('upload/watermarks/'.$watermark->image) : ''}}"/>


                            </div>
                        </div>

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="update_listing" class="custom-control-input"
                                   id="update_listing"
                                   value="yes" {{$watermark->update_listing == 'yes' ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="update_listing">@lang('agency.update_all_listing')</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="test_image w-100 ">

                    </div>
                </div>

            </div>


            <div class="d-flex justify-content-between  mt-3 ">


                <div class="d-flex flex-row-reverse">

                    <div class="ml-3">

                        <button type="submit" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="fe-check"></i></span>@lang('agency.submit_save')
                        </button>
                    </div>


                </div>

            </div>

        </form>
    </div>


@endsection

@push('js')
    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>


    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>



    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

    <script>
        $("#range").ionRangeSlider({
            skin: "round",
            min: 10,
            max: 100,
            from: '{{ $watermark->transparent }}',
            onStart: function (data) {
                // fired then range slider is ready
                $('.transparent').val(data.from)

            },
            onChange: function (data) {
                // fired on every range slider update
            },
            onFinish: function (data) {
                // console.log(data.from)

                $('.transparent').val(data.from)
            },
            onUpdate: function (data) {
                // fired on changing slider with Update method
            }
        });


    </script>
@endpush