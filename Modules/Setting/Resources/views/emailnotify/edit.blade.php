@extends('layouts.master')
@section('title',trans('settings.emailnotify'))
@section('css')


    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


    <style>
        .toggle.android {
            border-radius: 0px;
        }

        .toggle.android .toggle-handle {
            border-radius: 0px;
        }
    </style>

    <style>
        .custom-toggle .btn {
            padding: 0 !important;
        }

        .custom-toggle .toggle.btn {
            min-height: 26px;
            min-width: 46px;
        }
    </style>


    <!-- icons -->
@endsection
@section('content')

    <div class="content p-3">
        <form action="{{route('setting.emailnotify.update',$email_notify->id)}}" data-parsley-validate="" method="post"
              enctype="multipart/form-data">
            <input name="notify" value="{{$email_notify->id}}" type="hidden">
            @csrf
            @method('PUT')
            <input data-plugin="tippy" data-tippy-placement="top-start" type="hidden" id="remove_image"
                   name="remove_image" value="0">
            <div class="mb-2">


                <h3>@lang('settings.emailnotify')</h3>
                <hr>
                <h4>@lang('settings.instant_emails')</h4>
                <div class="row ml-2">

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="listing_assigned" class="custom-control-input"
                                   id="listing_assigned"
                                   value="1" {{$email_notify->listing_assigned == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="listing_assigned">@lang('settings.listing_assigned')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="lead_assigned" class="custom-control-input"
                                   id="lead_assigned"
                                   value="1" {{$email_notify->lead_assigned == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="lead_assigned">@lang('settings.lead_assigned')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="listing_approval" class="custom-control-input"
                                   id="listing_approval"
                                   value="1" {{$email_notify->listing_approval == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="listing_approval">@lang('settings.listing_approval')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="task_assigned" class="custom-control-input"
                                   id="task_assigned"
                                   value="1" {{$email_notify->task_assigned == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="task_assigned">@lang('settings.task_assigned')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="listing_approved" class="custom-control-input"
                                   id="listing_approved"
                                   value="1" {{$email_notify->listing_approved == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="listing_approved">@lang('settings.listing_approved')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="listing_rejected" class="custom-control-input"
                                   id="listing_rejected"
                                   value="1" {{$email_notify->listing_rejected == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="listing_rejected">@lang('settings.listing_rejected')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class="checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="lsm_lead" class="custom-control-input"
                                   id="lsm_lead"
                                   value="1" {{$email_notify->lsm_lead == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="lsm_lead">@lang('settings.lsm_lead')</label>
                        </div>
                    </div>

                    <div class="col-sm-2">

                        <div class=" checkbox checkbox-danger checkbox-circle">
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                   name="email_lead" class="custom-control-input"
                                   id="email_lead"
                                   value="1" {{$email_notify->email_lead == 1 ? 'checked' : ''}}>
                            <label class="custom-control-label"
                                   for="email_lead">@lang('settings.email_lead')</label>
                        </div>
                    </div>

                </div>


                <div class="mb-3">

                    <h4>@lang('settings.reminders')</h4>
                    <div class="ml-3">
                        <div class="row">
                            <div class="col-sm-2">

                                <div class="checkbox checkbox-danger checkbox-circle">
                                    <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                           id="task_reminder"
                                           name="task_reminder" class="custom-control-input"
                                           id="task_reminder"
                                           value="1" {{$email_notify->task_reminder == 1 ? 'checked' : ''}}>
                                    <label class="custom-control-label"
                                           for="task_reminder">@lang('settings.task_reminder')</label>
                                </div>
                            </div>
                            <div class="col-sm-10 d-none" id="task_reminder_inputs">
                                @if(count($reminders) > 0)
                                    @foreach($reminders  as $reminder)
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <select class="form-control select2" name="category[]"
                                                        data-toggle="select2">
                                                    <option value="general_reminder" {{ $reminder->category == 'general_reminder' ? 'selected' : '' }}>@lang('settings.general_reminder')</option>
                                                    <option value="property_viewing" {{ $reminder->category == 'property_viewing' ? 'selected' : '' }}>@lang('settings.property_viewing')</option>
                                                    <option value="call" {{ $reminder->category == 'call' ? 'selected' : '' }}>@lang('settings.call')</option>
                                                    <option value="send_documents" {{ $reminder->category == 'send_documents' ? 'selected' : '' }}>@lang('settings.send_documents')</option>
                                                    <option value="collect_documents" {{ $reminder->category == 'collect_documents' ? 'selected' : '' }}>@lang('settings.collect_documents')</option>
                                                    <option value="meeting" {{ $reminder->category == 'meeting' ? 'selected' : '' }}>@lang('settings.meeting')</option>
                                                    <option value="email" {{ $reminder->category == 'email' ? 'selected' : '' }}>@lang('settings.email')</option>
                                                    <option value="payment_collection" {{ $reminder->category == 'payment_collection' ? 'selected' : '' }}>@lang('settings.payment_collection')</option>
                                                    <option value="cheque_submission" {{ $reminder->category == 'cheque_submission' ? 'selected' : '' }}>@lang('settings.cheque_submission')</option>


                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <select class="form-control" name="type[]">
                                                    <option value="after" {{ $reminder->type == 'after' ? 'selected' : '' }}>@lang('settings.after')</option>
                                                    <option value="before" {{ $reminder->type == 'before' ? 'selected' : '' }}>@lang('settings.before')</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-9"><input data-plugin="tippy"
                                                                                 data-tippy-placement="top-start"
                                                                                 type="number"
                                                                                 name="days[]"
                                                                                 class="form-control"
                                                                                 min="0"
                                                                                 value="{{$reminder->day ?? ''}}"></div>
                                                    <div class="col-sm-3">@lang('settings.days')</div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <input type="text" class="form-control clockpicker" name="time[]"
                                                       autocomplete="off"
                                                       data-autoclose="true" value="{{$reminder->time ?? ''}}">
                                            </div>
                                            <div class="form-group col-sm-1" id="add_task_reminder">
                                                <i class="fa fa-plus-circle"></i>
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="form-group col-sm-3">
                                            <select class="form-control select2" name="category[]"
                                                    data-toggle="select2">
                                                <option value="general_reminder">@lang('settings.general_reminder')</option>
                                                <option value="property_viewing">@lang('settings.property_viewing')</option>
                                                <option value="call">@lang('settings.call')</option>
                                                <option value="send_documents">@lang('settings.send_documents')</option>
                                                <option value="collect_documents">@lang('settings.collect_documents')</option>
                                                <option value="meeting">@lang('settings.meeting')</option>
                                                <option value="email">@lang('settings.email')</option>
                                                <option value="payment_collection">@lang('settings.payment_collection')</option>
                                                <option value="cheque_submission">@lang('settings.cheque_submission')</option>


                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <select class="form-control" name="type[]">
                                                <option value="after">@lang('settings.after')</option>
                                                <option value="before">@lang('settings.before')</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-9"><input data-plugin="tippy"
                                                                             data-tippy-placement="top-start"
                                                                             type="number"
                                                                             name="days[]"
                                                                             min="0"
                                                                             class="form-control"></div>
                                                <div class="col-sm-3">@lang('settings.days')</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <input type="text" class="form-control clockpicker" name="time[]"
                                                   data-autoclose="true" autocomplete="off">
                                        </div>
                                        <div class="form-group col-sm-1" id="add_task_reminder">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>

                    <div class="ml-3">
                        <div class="row">
                            <div class="col-sm-2">

                                <div class="checkbox checkbox-danger checkbox-circle">
                                    <input data-plugin="tippy" data-tippy-placement="top-start" type="checkbox"
                                           name="tenancy_expiry" class="custom-control-input"
                                           id="tenancy_expiry"
                                           value="1" {{$email_notify->tenancy_expiry == 1 ? 'checked' : ''}}>
                                    <label class="custom-control-label"
                                           for="tenancy_expiry">@lang('settings.tenancy_expiry')</label>
                                </div>
                            </div>

                            <div class="col-sm-10 d-none" id="tenancy_expiry_inputs">
                                @if(count($tenancies) > 0)
                                    @foreach($tenancies  as $tenancy)
                                        <div class="row">
                                            <div class="form-group col-sm-3 offset-sm-3">
                                                <select class="form-control" name="tenancy_type[]">
                                                    <option value="after" {{ $tenancy->type == 'after' ? 'selected' : '' }}>@lang('settings.after')</option>
                                                    <option value="before" {{ $tenancy->type == 'before' ? 'selected' : '' }}>@lang('settings.before')</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <div class="row">
                                                    <div class="col-sm-9"><input data-plugin="tippy"
                                                                                 data-tippy-placement="top-start"
                                                                                 type="number"
                                                                                 name="tenancy_days[]"
                                                                                 class="form-control"
                                                                                 min="0"
                                                                                 value="{{$tenancy->day ?? ''}}"></div>
                                                    <div class="col-sm-3">@lang('settings.days')</div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <input type="text" class="form-control clockpicker" name="tenancy_time[]"
                                                       autocomplete="off"
                                                       data-autoclose="true" value="{{$tenancy->time ?? ''}}">
                                            </div>
                                            <div class="form-group col-sm-1" id="add_task_reminder">
                                                <i class="fa fa-plus-circle"></i>
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <div class="row">
                                        <div class="form-group col-sm-3 offset-sm-3">
                                            <select class="form-control" name="tenancy_type[]">
                                                <option value="after">@lang('settings.after')</option>
                                                <option value="before">@lang('settings.before')</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <div class="row">
                                                <div class="col-sm-9"><input data-plugin="tippy"
                                                                             data-tippy-placement="top-start"
                                                                             type="number"
                                                                             name="tenancy_days[]"
                                                                             min="0"
                                                                             class="form-control"></div>
                                                <div class="col-sm-3">@lang('settings.days')</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <input type="text" class="form-control clockpicker" name="tenancy_time[]"
                                                   data-autoclose="true" autocomplete="off">
                                        </div>
                                        <div class="form-group col-sm-1" id="add_task_reminder">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>


                </div>

                <div class="col-sm-12">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted"
                                   for="email_cc">@lang('settings.email_cc')</label>
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="email" name="email_cc"
                                   class="form-control" id="email_cc"
                                   value="{{old('email_cc',$email_notify->email_cc)}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="mb-1 font-weight-medium text-muted"
                                   for="email_bcc">@lang('settings.email_bcc')</label>
                            <input data-plugin="tippy" data-tippy-placement="top-start" type="email"
                                   name="email_bcc" class="form-control" id="email_bcc"
                                   value="{{old('email_bcc',$email_notify->email_bcc)}}">
                        </div>
                    </div>


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

        function reminder() {

        }

        function toggle_desc() {
            type = $('.description').prop('checked');
            if (type == true) {
                //english
                $('.description_en').removeClass('d-none');
                $('.description_ar').addClass('d-none');
            } else {
                $('.description_en').addClass('d-none');
                $('.description_ar').removeClass('d-none');


            }
        }

        $(document).ready(function () {
            $('.select2').select2();
            $('.dropify-clear').click(function () {
                $('#remove_image').val(1)
            });
            $(".clockpicker").clockpicker({
                twelvehour: false
            });


            if ($('#task_reminder').is(':checked')) {
                taskReminderInputs.removeClass('d-none');
            }

            if ($('#tenancy_expiry').is(':checked')) {
                tenancyExpiryInputs.removeClass('d-none');
            }
        });
        ClassicEditor
            .create(document.querySelector('#description_en'))
            .then()
            .catch(error => {

            });

        ClassicEditor
            .create(document.querySelector('#description_ar'), {
                language: 'ar'
            })
            .then()
            .catch(error => {

            });

    </script>


    <script>
        var taskReminderInputs = $('#task_reminder_inputs');
        $('#task_reminder').click(function () {
            if ($(this).prop("checked") == true) {
                taskReminderInputs.removeClass('d-none');
            }
            else if ($(this).prop("checked") == false) {
                taskReminderInputs.addClass('d-none');
            }
        });

        var tenancyExpiryInputs = $('#tenancy_expiry_inputs');
        $('#tenancy_expiry').click(function () {
            if ($(this).prop("checked") == true) {
                tenancyExpiryInputs.removeClass('d-none');
            }
            else if ($(this).prop("checked") == false) {
                tenancyExpiryInputs.addClass('d-none');
            }
        });


    </script>
@endpush








