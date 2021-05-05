@extends('layouts.master')
@section('title',trans('sales.smart_bulk_import'))
@section('css')


    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>



    <!-- icons -->
@endsection
@section('content')

    <div class="content p-3">
        <form action="{{route('smart_import_sheet')}}" data-parsley-validate="" method="post"
              enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="agency"
                   @if(owner())
                        value="{{ request('agency') }}"
                   @elseif(moderator())
                        value="{{ request('agency') }}"
                   @else
                        value="{{ auth()->user()->agency_id }}"
                   @endif>


            <div class="mb-2">
                <h3>@lang('sales.smart_bulk_import')</h3>
                <hr>
                <div class="row ml-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted"
                                   for="sheet">@lang('sales.sheet')</label>
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="file" name="file"
                                   data-plugins="dropify" id="sheet" required/>
                        </div>
                    </div>


                    <div class="col-md-12">


                        <div class="form-group ">


                            <label class="text-muted font-weight-medium" for="">@lang('sales.lead_sources')</label>

                            <div class="d-flex justify-content-between">


                                <div style="flex:4">
                                    <select style="" class="form-control select_souce_id select2" name="source_id"
                                            data-toggle="select2"
                                            data-placeholder="@lang('sales.lead_sources')" required>
                                        <option value="" class="font-weight-medium text-muted"></option>
                                        @forelse($agency->lead_sources as $source)
                                            <option @if(old('source_id') == $source->id) selected
                                                    @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
                                        @empty

                                        @endforelse

                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">

                        <div class="form-group ">


                            <label class="text-muted font-weight-medium" for="">@lang('sales.lead_types')</label>

                            <div class="d-flex justify-content-between">


                                <div style="flex:4">
                                    <select class="form-control select2 select_type_id" name="type_id"
                                            data-toggle="select2" data-placeholder="@lang('sales.lead_types')" required>
                                        <option value=""></option>

                                        @forelse($agency->lead_types as $type)
                                            <option @if(old('type_id') == $type->id) selected
                                                    @endif value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                        @empty

                                        @endforelse

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">

                        <div class="form-group ">


                            <label class="text-muted font-weight-medium"
                                   for="">@lang('sales.lead_qualifications')</label>

                            <div class="d-flex justify-content-between">


                                <div style="flex:4">
                                    <select class="form-control select2 select_qualification_id" name="qualification_id"
                                            data-toggle="select2" data-placeholder="@lang('sales.lead_qualifications')"
                                            required>

                                        <option value=""></option>
                                        @forelse($agency->lead_qualifications as $ql)
                                            <option @if(old('qualification_id') == $ql->id) selected
                                                    @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                                        @empty

                                        @endforelse

                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group ">


                            <label class="text-muted font-weight-medium"
                                   for="">@lang('sales.way_of_communications')</label>


                            <div class="d-flex justify-content-between">


                                <div style="flex:4">
                                    <select class="form-control  select_communication_id select2 "
                                            name="communication_id"
                                            data-toggle="select2"
                                            data-placeholder="@lang('sales.way_of_communications')" required>

                                        <option name=""></option>
                                        @forelse($agency->lead_communications as $communication)
                                            <option @if(old('communication_id') == $communication->id) selected
                                                    @endif value="{{ $communication->id}}">{{ $communication->{'name_'.app()->getLocale()} }}</option>
                                        @empty

                                        @endforelse

                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>


                    {{--<div class="col-md-12">--}}

                    {{--<div class="form-check">--}}
                    {{--<input type="checkbox" onclick="checkAllEditHandler({{ $agency->id }})"--}}
                    {{--class="form-check-input" id="checkAllEdit_{{ $agency->id }}">--}}
                    {{--<label class="form-check-label"--}}
                    {{--for="checkAllEdit_{{ $agency->id }}">@lang('sales.all_staff')</label>--}}
                    {{--</div>--}}
                    {{--<select multiple class="form-control  select_all_edit_{{ $agency->id }} select2 " name="staff[]"--}}
                    {{--data-toggle="select2" required>--}}

                    {{--@forelse($staffs as $employee)--}}
                    {{--<option value="{{ $employee->id }}">--}}
                    {{--{{ $employee->{'name_'.app()->getLocale()} }}--}}
                    {{--</option>--}}

                    {{--@empty--}}

                    {{--@endforelse--}}

                    {{--</select>--}}


                    {{--</div>--}}

                </div>


                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary " type="submit">@lang('settings.submit')</button>
                </div>
            </div>

        </form>
    </div>
@endsection

@push('js')

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->
    <script src="{{ asset('assets/libs/footable/footable.all.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ asset('assets/js/pages/foo-tables.init.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/translations/ar.js"></script>

    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


    {{-- tooltip --}}
    <script src="{{ asset('assets/libs/tippy.js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>


    <script src="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('assets/libs/footable/footable.all.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.select2-multiple').select2();
        });


        function checkAllEditHandler(id) {

            if ($("#checkAllEdit_" + id).is(':checked')) { //select all
                $('.select_all_edit_' + id).find('option').prop('selected', true).trigger('change');

            } else { //deselect all
                $('.select_all_edit_' + id).find('option').prop('selected', false).trigger('change');

            }
        }
    </script>
@endpush








