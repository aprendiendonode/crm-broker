@extends('layouts.master')
@section('title',trans('agency.profile'))
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



<link rel="stylesheet" href="{{ asset('assets/css/intlcss/intlTelInput.css') }}" />
<script
src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"
integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw=="
crossorigin="anonymous"
></script>


    <!-- icons -->
@endsection
@section('title',trans('agency.agency_profile'))

@section('content')

    <div class="content p-3">
        <div class="d-flex justify-content-between mb-3">
            <h4>
                @lang('agency.agency_profile')
            </h4>


        </div>
        <form action="{{route('agency.profile.update',$agency->id)}}" data-parsley-validate="" name="agency-update" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <input  data-plugin="tippy" data-tippy-placement="top-start" type="hidden" id="remove_image" name="remove_image" value="0"> --}}
            @if($business)
                <input type="hidden" name="business_id" value="{{ $business }}">
            @endif
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h4>@lang('agency.basic_info')</h4>

                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="name_en">@lang('agency.name')</label>
                        <input data-plugin="tippy" data-tippy-placement="top-start" type="text" name="company_name_en"
                               class="form-control" id="name_en"
                               value="{{old('name_en',$agency->company_name_en)}}" required>
                    </div>


                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="name_ar">@lang('agency.name_ar')</label>
                        <input data-plugin="tippy" data-tippy-placement="top-start" type="text" name="company_name_ar"
                               class="form-control" id="name_ar"
                               value="{{old('name_ar',$agency->company_name_ar)}}">
                    </div>


                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="email">@lang('agency.email')</label>
                        <input data-plugin="tippy" data-tippy-placement="top-start" type="email" name="company_email"
                               class="form-control" id="email"
                               value="{{old('email',$agency->company_email)}}" required>
                    </div>


                    <div class="form-group custom-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="mb-1 font-weight-medium text-muted"
                                   for="description_en">@lang('agency.description')</label>

                            <input data-plugin="tippy" data-tippy-placement="top-start" onchange="toggle_desc()"
                                   class="description" type="checkbox"
                                   checked data-toggle="toggle" data-on="Ar" data-off="EN"
                                   data-onstyle="primary"
                                   data-offstyle="success">

                        </div>

                        <div class="description_en">

                                    <textarea id="description_en"
                                              name="description_en">{{old('description_en',$agency->description_en)}}</textarea>
                        </div>
                        <div class="description_ar d-none">


                                    <textarea id="description_ar"
                                              name="description_ar">{{old('description_ar',$agency->description_ar)}}</textarea>
                        </div>

                    </div>


                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="image">@lang('agency.image')</label>
                        <input data-plugin="tippy" data-tippy-placement="top-start" type="file" name="image"
                               data-plugins="dropify" id="image"
                               data-default-file="{{$agency->image != null ? asset('company_profile_images/'.$agency->image) : ''}}"/>
                    </div>


                </div>

                <div class="col-sm-6">
                    <h4>@lang('agency.contact_info')</h4>


                    <div class="form-group d-flex">

                        <input type="hidden" name="country_code" class="country_code"   value="{{ old('country_code',$agency->country_code) }}">
                        <input type="hidden" name="country_symbol" class="country_symbol" value="{{ old('country_symbol',$agency->country_symbol) }}">
                       
                        <input type="hidden" name="cell_code" class="cell_code"   value="{{ old('cell_code',$agency->cell_code) }}">
                        <input type="hidden" name="cell_symbol" class="cell_symbol" value="{{ old('cell_symbol',$agency->cell_symbol) }}">
                       
                        <div style="flex:4">
                            <div>
                                <label class="text-muted font-weight-medium" for="">@lang('agency.primary')</label>
                            </div>
                            <div class="">
                                <input  
                                        type="text" class="form-control phone"
                                    name="phone" value="{{ old("phone",$agency->phone) }}"
                                    placeholder="@lang('sales.phone')" required>
                            </div>
                         </div>
                    </div>
            
            
                    <div class="form-group d-flex">
            
                 
                        <div style="flex:4">
                            <div>
                                <label class="text-muted font-weight-medium" for="">@lang('agency.secondary')</label>
                            </div>
            
                            <div class="">
                                <input   
                                        type="text" class="form-control cell"
                                    name="cell" value="{{ old("cell",$agency->cell) }}"
                                    placeholder="@lang('agency.cell')">
                            </div>
                         </div>
                    </div>
            

                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="address">@lang('agency.website')</label>
                        <input type="text" name="website" class="form-control" id="website"
                               value="{{old('website',$agency->website)}}">
                    </div>

                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('agency.fax')</label>
                        <div class="d-flex">


                            <div class="" style="flex:1">
                                <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/"
                                       data-tippy-placement="top-start" title="@lang('agency.fax_country_code')"
                                       type="text" class="form-control" name="fax_country_code"
                                       placeholder="@lang('agency.fax_country_code')"
                                       value="{{ old('fax_country_code', $agency->fax_country_code) }}">
                            </div>
                            <div class="px-2" style="flex:1">
                                <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/"
                                       data-tippy-placement="top-start" title="@lang('agency.fax_city_code')"
                                       type="text" class="form-control" name="fax_city_code"
                                       value="{{ old('fax_city_code',$agency->fax_city_code) }}"
                                       placeholder="@lang('agency.fax_city_code')">
                            </div>
                            <div class="" style="flex:4">
                                <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/"
                                       data-tippy-placement="top-start" title="@lang('agency.company_fax')" type="text"
                                       class="form-control" name="company_fax"
                                       value="{{ old('company_fax',$agency->company_fax) }}"
                                       placeholder="@lang('agency.company_fax')">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="address">@lang('agency.address')</label>
                        <input data-plugin="tippy" data-tippy-placement="top-start" type="text" name="address"
                               class="form-control" id="address"
                               value="{{old('address',$agency->address)}}">
                    </div>


                    <div class="form-group">
                        <label for="country" class="font-weight-medium text-muted">@lang('agency.country')</label>
                        <select required onchange="toggleCities()" class="form-control select2 " name="country_id"
                                id="country"
                                data-toggle="select2">
                            <option value="">Select</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}" {{ old('country_id',$agency->country_id) == $country->id ? 'selected' : ''}}>{{$country->value ?? ''}}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group d-none city_append">
                        <label for="city" class="font-weight-medium text-muted">@lang('agency.city')</label>

                        <select class="form-control select2" name="city_id" id="city" data-toggle="select2">
                            <option value=""></option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="trade_license">@lang('agency.trade_license')</label>
                        <input type="text" name="trade_license" class="form-control" id="trade_license"
                               value="{{old('trade_license',$agency->trade_license)}}">
                    </div>


                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted"
                               for="company_orn">@lang('agency.company_orn')</label>
                        <input type="text" name="company_orn" class="form-control" id="company_orn"
                               value="{{old('company_orn',$agency->company_orn)}}">
                    </div>


                </div>

            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit_company')
                </button>
            </div>

        </form>
    </div>
@endsection

@push('js')

    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Footable js -->

    <!-- Init js -->
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

        $(document).ready(function () {

            $('.select2').select2();

            var agency = @json($agency);

            if (agency.country_id != null) {

                toggleCities();
            }
        })

        function toggleCities() {
            var cities = @json($cities);
            var agency = @json($agency);
            var country = $('#country').val();


            var filtered = [];
            for (var i = 0; i < cities.length; i++) {

                if (cities[i].country_id == country) {
                    filtered.push(cities[i])
                }


            }

            if (filtered.length > 0) {
                $('#city option').remove();
                var html = '';
                $('.city_append').removeClass('d-none')
                var locale = '{{ app()->getLocale() }}'


                for (var i = 0; i < filtered.length; i++) {
                    html += '<option value="" ></option>'
                    html += '<option ' + (agency.city_id == filtered[i].id ? "selected" : "") + ' value="' + filtered[i].id + '" >' + (locale == 'en' ? filtered[i].name_en : filtered[i].name_ar) + '</option>'


                }

                $('#city').append(html);
                $('.city_append').removeClass('d-none');
            } else {
                $('.city_append').addClass('d-none')
                $('#city option').remove();


            }


        }

    </script>


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


            var agency = @json($agency);
                var phone = document.querySelector(".phone");
                var phone_iti = window.intlTelInput(phone, {
                
                initialCountry: "auto",
                utilsScript: "{{ asset('assets/js/util.js') }}",
                });
                if(agency.country_symbol ){

                    phone_iti.setCountry(agency.country_symbol);
                }



                $('.phone').change(function(){
                    var number = phone_iti.getSelectedCountryData();
                    if(phone_iti.isValidNumber() == false){
                        $('.phone').css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = false;
                        return false;
                    } else{
                        $('.phone').css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }


                
                    var str = phone.value;
                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                        formSubmit = false;
                        $('.phone').css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        return false;
                    }else{

                        $('.phone').css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }

            
                    
                })

                phone.addEventListener("countrychange", function() {
                        number = phone_iti.getSelectedCountryData()           
                        $('.country_code').val(number.dialCode)
                        $('.country_symbol').val(number.iso2)
                        if(phone.value != ''){
                            var str = phone.value;
                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                formSubmit = false;
                                $('.phone').css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                            }else{

                                $('.phone').css({"border-color": "#ced4da", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                formSubmit = true;
                            }
                        }
                        if(!phone_iti.isValidNumber()){
                                formSubmit = false;
                                $('.phone').css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                        }


                });
                





                var cell = document.querySelector(".cell");
                var cell_iti = window.intlTelInput(cell, {
                
                initialCountry: "auto",
                utilsScript: "{{ asset('assets/js/util.js') }}",
                });
                if(agency.cell_symbol){

                    cell_iti.setCountry(agency.cell_symbol);
                }



                $('.cell').change(function(){
                    var number = cell_iti.getSelectedCountryData();
                    if(cell_iti.isValidNumber() == false){
                        $('.cell').css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = false;
                        return false;
                    } else{
                        $('.cell').css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }


                
                    var str = cell.value;
                    if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                        formSubmit = false;
                        $('.cell').css({"border-color": "red", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        return false;
                    }else{

                        $('.cell').css({"border-color": "#ced4da", 
                        "border-width":"1px", 
                        "border-style":"solid"});
                        formSubmit = true;
                    }

            
                    
                })

                cell.addEventListener("countrychange", function() {
                        number = cell_iti.getSelectedCountryData()           
                        $('.cell_code').val(number.dialCode)
                        $('.cell_symbol').val(number.iso2)
                        if(cell.value != ''){
                            var str = cell.value;
                            if(str.split('').slice(0,(number.dialCode.length)).join('') == number.dialCode){
                                formSubmit = false;
                                $('.cell').css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                            }else{

                                $('.cell').css({"border-color": "#ced4da", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                formSubmit = true;
                            }
                        }
                        if(!cell_iti.isValidNumber()){
                                formSubmit = false;
                                $('.cell').css({"border-color": "red", 
                                "border-width":"1px", 
                                "border-style":"solid"});
                                return false;
                        }


                });




                $('form[name="agency-update"]').submit(function(e){
                    return formSubmit == false ? event.preventDefault() : true;
                });




    </script>
@endpush








