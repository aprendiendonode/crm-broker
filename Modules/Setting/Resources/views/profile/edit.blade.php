@extends('layouts.master')
@section('title',trans('settings.profile'))
@section('css')


    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>


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
        <form action="{{route('setting.profiles.update',$user->id)}}" data-parsley-validate="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input  data-plugin="tippy" data-tippy-placement="top-start" type="hidden" id="remove_image" name="remove_image" value="0">
            <div class="mb-2">

                <div class="row">

                    <div class="col-sm-6">
                        <h2>@lang('settings.basic_info')</h2>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="email">@lang('settings.email')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="email" name="email" class="form-control" id="email"
                                       value="{{old('email',$user->email)}}" required>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="brn">@lang('settings.brn')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="text" name="brn" class="form-control" id="brn"
                                       value="{{old('brn',$user->brn)}}" >
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="name_en">@lang('settings.name_en')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="text" name="name_en" class="form-control" id="name_en"
                                       value="{{old('name_en',$user->name_en)}}" required>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="name_ar">@lang('settings.name_ar')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="text" name="name_ar" class="form-control" id="name_ar"
                                       value="{{old('name_ar',$user->name_ar)}}">
                            </div>
                        </div>


                        <div class="col-md-12">

                            <div class="form-group custom-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="mb-1 font-weight-medium text-muted"
                                           for="description_en">@lang('settings.description')</label>

                                    <input  data-plugin="tippy" data-tippy-placement="top-start" onchange="toggle_desc()" class="description" type="checkbox"
                                           checked data-toggle="toggle" data-on="Ar" data-off="EN"
                                           data-onstyle="primary"
                                           data-offstyle="success">

                                </div>

                                <div class="description_en">

                                    <textarea id="description_en"
                                              name="description_en">{{old('description_en',$user->description_en)}}</textarea>
                                </div>
                                <div class="description_ar d-none">


                                    <textarea id="description_ar"
                                              name="description_ar">{{old('description_ar',$user->description_ar)}}</textarea>
                                </div>

                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('agency.skype')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="email" class="form-control" maxlength="25" value="{{ old('skype',$user->skype) }}"
                                       name="skype" id="skype">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('agency.whats_app')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="text" class="form-control" value="{{ old('whatsapp',$user->whatsapp) }}" name="whatsapp"
                                       id="whatsapp">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="image">@lang('settings.image')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="file" name="image" data-plugins="dropify" id="image"
                                       data-default-file="{{$user->image != null ? asset('profile_images/'.$user->image) : ''}}"/>
                            </div>
                        </div>




                    </div>

                    <div class="col-sm-6">
                        <h2>@lang('settings.postal_info')</h2>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('settings.primary_number')</label>
                                <div class="d-flex">
                                    <div class="" style="flex:1">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="country_code"
                                               id="country_code" value="{{old('country_code',$user->country_code)}}" required>
                                    </div>
                                    <div class="px-2" style="flex:1">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="city_code"
                                               id="city_code" value="{{old('city_code',$user->city_code)}}" required>
                                    </div>
                                    <div class="" style="flex:4">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="phone"
                                               id="phone" value="{{old('phone',$user->phone)}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('settings.secondary_number')</label>
                                <div class="d-flex">
                                    <div class="" style="flex:1">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="cell_code"
                                               id="cell_code" value="{{old('cell_code',$user->cell_code)}}">
                                    </div>
                                    <div class="px-2" style="flex:1">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="cell"
                                               id="cell" value="{{old('cell',$user->cell)}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted">@lang('settings.fax')</label>
                                <div class="d-flex">
                                    <div class="" style="flex:1">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="fax_country_code"
                                               id="fax_country_code"
                                               value="{{old('fax_country_code',$user->fax_country_code)}}">
                                    </div>
                                    <div class="px-2" style="flex:1">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="fax_city_code"
                                               id="fax_city_code" value="{{old('fax_city_code',$user->fax_city_code)}}">
                                    </div>
                                    <div class="" style="flex:4">
                                        <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" class="form-control" maxlength="25" name="staff_fax"
                                               id="staff_fax" value="{{old('staff_fax',$user->staff_fax)}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="zip">@lang('settings.zip')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="number" name="zip" class="form-control" id="zip"
                                       value="{{old('zip',$user->zip)}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted"
                                       for="address">@lang('settings.address')</label>
                                <input  data-plugin="tippy" data-tippy-placement="top-start" type="text" name="address" class="form-control" id="address"
                                       value="{{old('address',$user->address)}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">@lang('settings.country')</label>
                                <select class="form-control select2" name="nationality_id" id="country"
                                        data-toggle="select2">
                                    <option value="">Select</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{$user->nationality_id == $country->id ? 'selected' : ''}}>{{$country->value ?? ''}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">@lang('settings.language')</label>
                                <select class="form-control select2" name="language" id="language"
                                        data-toggle="select2">
                                    <option value="">Select</option>
                                        <option value="en" {{$user->language == 'en' ? 'selected' : ''}}>@lang('settings.english')</option>
                                        <option value="ar" {{$user->language == 'ar' ? 'selected' : ''}}>@lang('settings.arabic')</option>
                                </select>
                            </div>
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

    <script>

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
@endpush








