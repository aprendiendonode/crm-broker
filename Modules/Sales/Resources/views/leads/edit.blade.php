<form action="{{ url('sales/manage_leads/'.$lead->id) }}" data-parsley-validate="" method="POST"
      enctype="multipart/form-data">
    <div class="row">
        @csrf

        @if($agency)
            <input type="hidden" name="edit_agency_id_{{ $lead->id }}" value="{{ $agency }}">
        @endif
        @if($business)
            <input type="hidden" name="edit_business_id_{{ $lead->id }}" value="{{ $business }}">
        @endif


        <div class="col-md-4">
            <div class="form-group" style="margin-bottom:32px">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.salutation')</label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="salutationRadio1_{{ $lead->id }}" value="Mr"
                           name="edit_salutation_{{ $lead->id }}"
                           @if(old("edit_salutation_{$lead->id}",$lead->salutation) == 'Mr')  checked @endif>
                    <label for="salutationRadio1_{{ $lead->id }}"> @lang('sales.Mr') </label>
                </div>


                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="salutationRadio2_{{ $lead->id }}" value="Mrs"
                           name="edit_salutation_{{ $lead->id }}"
                           @if(old("edit_salutation_{$lead->id}",$lead->salutation) == 'Mrs')  checked @endif>
                    <label for="salutationRadio2_{{ $lead->id }}"> @lang('sales.Mrs') </label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="salutationRadio3_{{ $lead->id }}" value="Miss"
                           name="edit_salutation_{{ $lead->id }}"
                           @if(old("edit_salutation_{$lead->id}",$lead->salutation) == 'Miss')  checked @endif>
                    <label for="salutationRadio3_{{ $lead->id }}"> @lang('sales.Miss') </label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="salutationRadio4_{{ $lead->id }}" value="Ms"
                           name="edit_salutation_{{ $lead->id }}"
                           @if(old("edit_salutation_{$lead->id}",$lead->salutation) == 'Ms')  checked @endif>
                    <label for="salutationRadio4_{{ $lead->id }}"> @lang('sales.Ms') </label>
                </div>
            </div>
            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.firstname')</label>
                </div>


                <input type="text" class="form-control" name="edit_first_name_{{ $lead->id }}" required
                       value="{{ old("edit_first_name_{$lead->id}",$lead->first_name) }}"
                       placeholder="@lang('sales.firstname')">

                {{-- <input type="text" class="form-control" value="ZAHRA SABEEL MOHAMED ALBLOUSHI" name="edit_lead_name_{{ $lead->id }}" required="" data-parsley-id="13"> --}}

            </div>
            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.secondname')</label>
                </div>
                <input type="text" class="form-control" name="edit_sec_name_{{ $lead->id }}"
                       value="{{ old("edit_sec_name_{$lead->id}",$lead->sec_name) }}"
                       placeholder="@lang('sales.secondname')">
            </div>

            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.fullname')</label>
                </div>
                <input type="text" class="form-control" name="edit_full_name_{{ $lead->id }}"
                       value="{{ old("edit_full_name_{$lead->id}",$lead->full_name) }}"
                       placeholder="@lang('sales.fullname')">
            </div>
            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.partnername')</label>
                </div>
                <input type="text" class="form-control" name="edit_partner_name_{{ $lead->id }}"
                       value="{{ old("edit_partner_name_{$lead->id}",$lead->partner_name) }}"
                       placeholder="@lang('sales.partnername')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.date_of_birth')</label>
                </div>
                <input type="text" name="edit_date_of_birth_{{ $lead->id }}"
                       value="{{ old("edit_date_of_birth_{$lead->id}",$lead->date_of_birth) }}"
                       class="form-control basic-datepicker" placeholder="@lang('sales.date_of_birth')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.email')</label>
                </div>
                <input type="email" class="form-control" name="edit_email1_{{ $lead->id }}"
                       value="{{ old("edit_email1_{$lead->id}",$lead->email1) }}" placeholder="@lang('sales.email')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.email2')</label>
                </div>
                <input type="email" class="form-control" name="edit_email2_{{ $lead->id }}"
                       value="{{ old("edit_email2_{$lead->id}",$lead->email2) }}" placeholder="@lang('sales.email2')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.email3')</label>
                </div>
                <input type="email" class="form-control" name="edit_email3_{{ $lead->id }}"
                       value="{{ old("edit_email3_{$lead->id}",$lead->email3) }}" placeholder="@lang('sales.email3')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.nationality')</label>
                </div>
                <select required onchange="toggleEditCountryData({{ $lead->id }})" id="nationality_id_{{ $lead->id }}"
                        class="form-control select2 " name="edit_nationality_id_{{ $lead->id }}"
                        data-toggle="select2" data-placeholder="@lang('sales.nationality')">
                    <option value=""></option>
                    @foreach($countries as $nationality)
                        <option class="nationality_{{$nationality->id}}"
                                value="{{$nationality->id}}" {{ old("edit_nationality_id_{$lead->id}",$lead->nationality_id) == $nationality->id ? 'selected' : ''}}>{{ $nationality->nationality   }}</option>
                    @endforeach

                </select>
            </div>


            {{-- <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.country')</label>
                </div>
                <select required id="country_{{ $lead->id }}" class="form-control select2 "
                        name="edit_country_{{ $lead->id }}"
                        data-toggle="select2" data-placeholder="@lang('sales.country')">
                    <option value=""></option>
                    @foreach($countries as $country)
                        <option value="{{$country->value}}" {{ old("edit_country_{$lead->id}",$lead->country) == $country->value ? 'selected' : ''}}>{{ $country->value }}</option>
                    @endforeach

                </select>
            </div> --}}


            <input type="hidden" class="country_code" name="edit_country_code_{{ $lead->id }}"
                   value="{{ old("edit_country_code_{$lead->id}",$lead->country_code) }}">
            <input type="hidden" class="timezone" name="edit_timezone_{{ $lead->id }}"
                   value="{{ old("edit_timezone_{$lead->id}",$lead->timezone) }}">
            <input type="hidden" class="country_flag" name="edit_country_flag_{{ $lead->id }}"
                   value="{{ old("edit_country_flag_{$lead->id}",$lead->country_flag) }}">


            <div class="form-group d-flex">

                <div style="flex:2">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.country_code')</label>
                    </div>
                    <select class="form-control select2" name="edit_phone1_code_{{ $lead->id }}" required>
                        <option value=""></option>
                        @foreach($countries as $code)
                            <option 
                            @if(old('edit_phone1_code_'.$lead->id,$lead->phone1_code) == $code->phone_code)
                             selected
                            @endif
                                    value="{{$code->phone_code}}" >{{ $code->phone_code .' ( '. $code->iso2 .' ) '   }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="flex:4">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.phone1')</label>
                </div>
                <div class="">
                    <input  pattern="/^([0-9\s\-\+\(\)]*)$/"
                            type="text" class="form-control"
                           name="edit_phone1_{{ $lead->id }}" value="{{ old("edit_phone1_{$lead->id}",$lead->phone1) }}"
                           placeholder="@lang('sales.phone1')" required>
                </div>
            </div>
            </div>


            <div class="form-group d-flex">

                <div style="flex:2">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.country_code')</label>
                    </div>
                    <select class="form-control select2" name="edit_phone2_code_{{ $lead->id }}" >
                        <option value=""></option>
                        @foreach($countries as $code)
                            <option 
                            @if(old('edit_phone2_code_'.$lead->id,$lead->phone2_code) == $code->phone_code)
                             selected
                            @endif
                                    value="{{$code->phone_code}}" >{{ $code->phone_code .' ( '. $code->iso2 .' ) '   }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="flex:4">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.phone2')</label>
                </div>

                <div class="">
                    <input  pattern="/^([0-9\s\-\+\(\)]*)$/" 
                            type="text" class="form-control"
                           name="edit_phone2_{{ $lead->id }}" value="{{ old("edit_phone2_{$lead->id}",$lead->phone2) }}"
                           placeholder="@lang('sales.phone2')">
                </div>
            </div>
            </div>


            <div class="form-group d-flex">


                <div style="flex:2">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.country_code')</label>
                    </div>
                    <select class="form-control select2" name="edit_phone3_code_{{ $lead->id }}" >
                        <option value=""></option>
                        @foreach($countries as $code)
                            <option 
                            @if(old('edit_phone3_code_'.$lead->id,$lead->phone3_code) == $code->phone_code)
                             selected
                            @endif
                                    value="{{$code->phone_code}}" >{{ $code->phone_code .' ( '. $code->iso2 .' ) '   }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="flex:4">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.phone3')</label>
                </div>


                <div class="">
                    <input  pattern="/^([0-9\s\-\+\(\)]*)$/" 
                            type="text" class="form-control"
                           name="edit_phone3_{{ $lead->id }}" value="{{ old("edit_phone3_{$lead->id}",$lead->phone3) }}"
                           placeholder="@lang('sales.phone3')">
                </div>
            </div>
            </div>


            <div class="form-group d-flex">

                          <div style="flex:2">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.country_code')</label>
                    </div>
                    <select class="form-control select2" name="edit_phone4_code_{{ $lead->id }}" >
                        <option value=""> </option>
                        @foreach($countries as $code)
                            <option 
                                @if(old('edit_phone4_code_'.$lead->id,$lead->phone4_code) == $code->phone_code)
                                selected
                                @endif
                                value="{{$code->phone_code}}" >{{ $code->phone_code .' ( '. $code->iso2 .' ) '   }}
                           </option>
                        @endforeach
                    </select>
                </div>
                <div style="flex:4">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.phone4')</label>
                </div>

                <div class="">
                    <input  pattern="/^([0-9\s\-\+\(\)]*)$/" 
                            type="text" class="form-control"
                           name="edit_phone4_{{ $lead->id }}" value="{{ old("edit_phone4_{$lead->id}",$lead->phone4) }}"
                           placeholder="@lang('sales.phone4')">
                </div>
            </div>
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.landline')</label>
                </div>
                <div class="">
                    <input  pattern="/^([0-9\s\-\+\(\)]*)$/" 
                            type="text" class="form-control"
                           name="edit_landline_{{ $lead->id }}"
                           value="{{ old("edit_landline_{$lead->id}",$lead->landline) }}"
                           placeholder="@lang('sales.landline')">
                </div>

            </div>

            {{-- <div class="form-group">
                <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.salutation')</label>
                    </div>

                    <div class="" >
                        <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.zip')" type="text" class="form-control" name="edit_zip_{{ $lead->id }}"   value="{{ old("zip{$lead->id}") }}"} placeholder="" >lang('sales.zip')"  >
                    </div>

            </div> --}}

            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.fax')</label>
                </div>

                <div class="">
                    <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start"
                           title="@lang('sales.fax')" type="text" class="form-control" name="edit_fax_{{ $lead->id }}"
                           value="{{ old("edit_fax_{$lead->id}",$lead->fax) }}" placeholder="{{trans('sales.fax')}}">
                </div>

            </div>


        </div>


        <div class="col-md-4">


            <div class="form-group ">


                <label class="text-muted font-weight-medium" for="">@lang('sales.lead_sources')</label>

                <div class="d-flex justify-content-between">


                    <div style="flex:4">
                        <select style="" class="form-control select_souce_id select2" name="edit_source_id_{{ $lead->id }}" data-toggle="select2"
                                data-placeholder="@lang('sales.lead_sources')" required>
                            <option value="" class="font-weight-medium text-muted"></option>
                            @forelse($lead_sources as $source)
                                <option @if(old("edit_source_id_{$lead->id}",$lead->source_id) == $source->id) selected
                                        @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                    @can('manage_lead_setting')
                        <a
                                style="margin-top:4px;"
                                data-plugin="tippy" title="@lang('sales.new_lead_source')"
                                data-tippy-placement="top-start"

                                data-toggle="modal"
                                data-target="#add_source"
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;"
                            class=" btn btn-secondary fa fa-plus"></i>
                        </a>

                    @endcan

                </div>
            </div>

            <div class="form-group ">


                <label class="text-muted font-weight-medium" for="">@lang('sales.lead_types')</label>

                <div class="d-flex justify-content-between">


                    <div style="flex:4">
                        <select class="form-control select2 select_type_id" name="edit_type_id_{{ $lead->id }}"
                                data-toggle="select2" data-placeholder="@lang('sales.lead_types')" required>
                            <option value=""></option>

                            @forelse($lead_types as $type)
                                <option @if(old("edit_type_id_{$lead->id}",$lead->type_id) == $type->id) selected
                                        @endif value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                    @can('manage_lead_setting')
                        <a style="margin-top:4px;"
                           data-plugin="tippy" title="@lang('sales.new_lead_type')"
                           data-tippy-placement="top-start"

                           data-toggle="modal"
                           data-target="#add_type"
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;"
                            class=" btn btn-secondary fa fa-plus"></i></a>

                    @endcan

                </div>
            </div>

            <div class="form-group ">


                <label class="text-muted font-weight-medium" for="">@lang('sales.lead_qualifications')</label>

                <div class="d-flex justify-content-between">


                    <div style="flex:4">
                        <select class="form-control select2 select_qualification_id" name="edit_qualification_id_{{ $lead->id }}"
                                data-toggle="select2" data-placeholder="@lang('sales.lead_qualifications')" required>

                            <option value=""></option>
                            @forelse($lead_qualifications as $ql)
                                <option @if(old("edit_qualification_id_{$lead->id}",$lead->qualification_id) == $ql->id) selected
                                        @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                    @can('manage_lead_setting')
                        <a style="margin-top:4px;"
                           data-plugin="tippy" title="@lang('sales.new_lead_qualification')"
                           data-tippy-placement="top-start"

                           data-toggle="modal"
                           data-target="#add_qualification"
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;"
                            class=" btn btn-secondary fa fa-plus"></i></a>


                    @endcan

                </div>
            </div>

            <div class="form-group ">


                <label class="text-muted font-weight-medium" for="">@lang('sales.way_of_communications')</label>


                <div class="d-flex justify-content-between">


                    <div style="flex:4">
                        <select class="form-control  select_communication_id select2 " name="edit_communication_id_{{ $lead->id }}"
                                data-toggle="select2" data-placeholder="@lang('sales.way_of_communications')" required>

                            <option name=""></option>
                            @forelse($lead_communications as $communication)
                                <option @if(old("edit_communication_id_{$lead->id}",$lead->communication_id) == $communication->id) selected
                                        @endif value="{{ $communication->id}}">{{ $communication->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    @can('manage_lead_setting')
                        <a style="margin-top:4px;"

                           data-plugin="tippy" title="@lang('sales.new_lead_communication')"
                           data-tippy-placement="top-start"

                           data-toggle="modal"
                           data-target="#add_communication"
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;"
                            class=" btn btn-secondary fa fa-plus"></i></a>

                    @endcan

                </div>
            </div>

            <div class="form-group ">


                <label class="text-muted font-weight-medium" for="">@lang('sales.priority')</label>



                <div class="d-flex justify-content-between">


                    <div style="flex:4">
                        <select class="form-control select2 select_priority_id" name="edit_priority_id_{{ $lead->id }}"
                                data-placeholder="@lang('sales.priority')"
                                data-toggle="select2" required>
                            <option name=""></option>

                            @forelse($lead_priorities as $priority)
                                <option @if(old("edit_priority_id_{$lead->id}",$lead->priority_id) == $priority->id) selected
                                        @endif value="{{ $priority->id}}">{{ $priority->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                    @can('manage_lead_setting')
                        <a style="margin-top:4px;"
                           data-plugin="tippy"
                           title="@lang('sales.new_lead_priority')"
                           data-tippy-placement="top-start"

                           data-toggle="modal"
                           data-target="#add_priority"
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;"
                            class=" btn btn-secondary fa fa-plus"></i></a>

                    @endcan

                </div>
            </div>





            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.company')</label>
                </div>
                <input type="text" class="form-control" name="edit_company_{{ $lead->id }}"
                       value="{{ old("edit_company_{$lead->id}",$lead->company) }}"
                       placeholder="@lang('sales.company')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.website')</label>
                </div>
                <input type="text" pattern="/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/"
                       class="form-control" name="edit_website_{{ $lead->id }}"
                       value="{{ old("edit_website_{$lead->id}",$lead->website) }}"
                       placeholder="@lang('sales.website')">
            </div>


            <div class="form form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.note')</label>
                </div>

                <div class="note">

                    <textarea id="edit_note_{{$lead->id}}" name="edit_note_{{ $lead->id }}"
                              placeholder="@lang('sales.note')">{{old("edit_note_{$lead->id}",$lead->note)}}</textarea>
                </div>


            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.po_box')</label>
                </div>
                <input type="text" class="form-control" placeholder="@lang('sales.po_box')"
                       value="{{ old("edit_po_box_{$lead->id}",$lead->po_box) }}" name="edit_po_box_{{ $lead->id }}">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.passport')</label>
                </div>
                <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"
                       name="edit_passport_{{ $lead->id }}"
                       value="{{ old("edit_passport_{$lead->id}",$lead->passport) }}"
                       placeholder="@lang('sales.passport')">
            </div>


            <div class="form-group ">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.passport_expiration_date')</label>
                </div>
                <input type="text" name="edit_passport_expiration_date_{{ $lead->id }}"
                       value="{{ old("edit_passport_expiration_date_{$lead->id}",$lead->passport_expiration_date) }}"
                       class="form-control basic-datepicker" placeholder="@lang('sales.passport_expiration_date')">
            </div>


        </div>


        <div class="col-md-4">



               
            <div class="form-group ">
                <label class="font-weight-medium text-muted">
                    @lang('leads.developer')
                </label>

                <div class="input-group">
                   <div class="input-group-prepend w-100">
                        @can('manage_lead_setting')
                            <div 
                            class="input-group-text cursor-pointer"
                            data-toggle="modal"
                            data-target="#add_developer" 
                            onclick="event.preventDefault()" id="basic-addon1">
                                <i 
                                data-plugin="tippy" title="@lang('sales.new_developer')"
                                data-tippy-placement="top-start" 

                                class="fas fa-plus-circle"
                                ></i>
                            </div>
                        @endcan
        
                        <select  style="" class="form-control select_developer_id select2" name="edit_developer_{{ $lead->id }}" data-toggle="select2" data-placeholder="@lang('sales.developer')" >
                                <option value="" class="font-weight-medium text-muted"></option>
                                @foreach($developers as $developer)
                    
                                    <option 
                                    @if(old("edit_developer_".$lead->id,$lead->developer) == $developer->id) selected @endif 
                                    value="{{ $developer->id}}">
                                        {{ $developer->{'name_'.app()->getLocale()} }}
                                    </option>
                                @endforeach    

                        </select>

                      </div>
                   </div>
         </div>





         <div class="form-group">

            <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
            <div style="flex:2;">
                <select required onchange="getCommunitites('edit',{{ $lead->id }})" class="form-control select2 city-in-edit-{{ $lead->id }}" name="edit_city_id_{{ $lead->id }}"
                 data-toggle="select2" data-placeholder="@lang('listing.city')">
                        <option value=""></option>
                    
                    @foreach($cities as $city)
                        <option @if(old('edit_city_id_'.$lead->id,$lead->city_id) == $city->id  ) selected @endif value="{{ $city->id }}">
                            {{ $city->{'name_'.app()->getLocale()} }}
                        </option>
                    @endforeach

                </select>
          
            </div>
        </div>



    <div class="form-group">

        <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') <span class="text-danger">*</span></label>
        <div style="flex:2;">
            <select required onchange="getSubCommunities('edit',{{ $lead->id }})" class="form-control select2 community-in-edit-{{ $lead->id }}" name="edit_community_{{ $lead->id }}"
             data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
             <option value=""></option>
             @foreach($communities->where('city_id',$lead->city_id) as $community)
             <option class="edit-appended-communities-{{ $lead->id }}"
                @if(old('edit_community_'.$lead->id,$lead->community) == $community->id)  
                 selected  
                 @endif
                 value="{{ $community->id }}">

                {{ $community->{'name_'.app()->getLocale()}  }}
             </option>
             @endforeach
      
                
             

            </select>
      
        </div>
    </div>


    <div class="form-group">

        <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.sub_community')</label>
        <div style="flex:2;">
            <select class="form-control select2 sub-community-in-edit-{{ $lead->id }}" name="edit_sub_community_{{ $lead->id }}"
             data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
             <option value=""></option>

             @foreach($sub_communities->where('community_id',$lead->community) as $sub_community)
             <option class="edit-appended-sub-communities-{{ $lead->id }}"
             @if(old('edit_sub_community_id_'.$lead->id,$lead->sub_community) == $sub_community->id)  
             selected  
             @endif
             value="{{ $sub_community->id }}">

            {{ $sub_community->{'name_'.app()->getLocale()}  }}
         </option>
         @endforeach
  
                
            </select>
      
        </div>
    </div>



            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.buliding_name')</label>
                </div>
                <input type="text" class="form-control" name="edit_building_name_{{ $lead->id }}"
                       value="{{ old("edit_building_name_{$lead->id}",$lead->building_name) }}"
                       placeholder="@lang('sales.buliding_name')">
            </div>


            
        <div class="form-group" >

            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.location')</label>
            <div class="d-flex align-items-center" style="flex:2">
                <input type="text" class="form-control" name="edit_address_{{ $lead->id }}" id="location_input_{{ $lead->id }}"  
                value="{{ old('edit_address_'.$lead->id,$lead->address) }}" 
                 placeholder="">
                 <input type="hidden" name="edit_loc_lat_{{ $lead->id }}" id="latitude_{{ $lead->id }}" value="{{ old('edit_loc_lat_'.$lead->id,$lead->loc_lat) }}" >
                 <input type="hidden" name="edit_loc_lng_{{ $lead->id }}" id="longitude_{{ $lead->id }}" value="{{ old('edit_loc_lng_'.$lead->id,$lead->loc_lng) }}">
                <div class="text-center pl-1">
                    <i class="fas fa-map-marker-alt" style="font-size:1.2rem"  data-toggle="modal" data-target="#map-modal-{{ $lead->id }}"></i>
                </div>
            </div>
        </div>




        <div id="map-modal-{{ $lead->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cheque-modalLabel" aria-hidden="true">
            <div style="overflow:auto;" class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header py-2">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
        
        
        
                        <div id="map_{{ $lead->id }}" style="width:490px;height:500px;"></div>
        
                    </div>
               
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        



            <div class="form-group d-flex  ">

                <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
                <div style="flex:4">
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio1_{{ $lead->id }}" value="rent"
                               name="edit_property_purpose_{{ $lead->id }}"
                               @if($lead->property_purpose == 'rent') checked @endif>
                        <label for="inlineRadio1"> @lang('sales.rent') </label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio2_{{ $lead->id }}" value="buy"
                               name="edit_property_purpose_{{ $lead->id }}"
                               @if($lead->property_purpose == 'buy') checked @endif>
                        <label for="inlineRadio2"> @lang('sales.buy') </label>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.property_no')</label>
                </div>
                <input type="text" class="form-control" name="edit_property_no_{{ $lead->id }}"
                       id="property_no_{{ $lead->id }}"
                       value="{{ old("edit_property_no_{$lead->id}",$lead->property_no) }}"
                       placeholder="@lang('sales.property_no')">
            </div>






            <div class="form-group ">


                <label class="text-muted font-weight-medium" for="">@lang('sales.property_type')</label>


                <div class="d-flex justify-content-between">


                    <div style="flex:4">
                        <select class="form-control select_property_id select2 " name="edit_property_id_{{ $lead->id }}"
                                data-toggle="select2" data-placeholder="@lang('sales.property_type')" required>
                            <option value=""></option>

                            @forelse($lead_properties as $property)
                                <option @if(old("edit_property_id_{$lead->id}",$lead->property_id) == $property->id) selected
                                        @endif value="{{ $property->id}}">{{ $property->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                    @can('manage_lead_setting')
                        <a style="margin-top:4px;"
                           data-plugin="tippy" title="@lang('sales.new_lead_property')"
                           data-tippy-placement="top-start"

                           data-toggle="modal"
                           data-target="#add_property"
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;"
                            class=" btn btn-secondary fa fa-plus"></i></a>

                    @endcan

                </div>
            </div>




            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.property_reference')</label>
                </div>
                <input type="text" class="form-control" name="edit_property_reference_{{ $lead->id }}"
                       value="{{ old("edit_property_reference_{$lead->id}",$lead->property_reference) }}"
                       placeholder="@lang('sales.property_reference')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.property_size_sqft')</label>
                </div>
                <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"
                       name="edit_size_sqft_{{ $lead->id }}"
                       value="{{ old("edit_size_sqft_{$lead->id}",$lead->size_sqft) }}"
                       placeholder="@lang('sales.property_size_sqft')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.property_size_sqm')</label>
                </div>
                <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"
                       name="edit_size_sqm_{{ $lead->id }}"
                       value="{{ old("edit_size_sqm_{$lead->id}",$lead->size_sqm) }}"
                       placeholder="@lang('sales.property_size_sqm')">
            </div>
            <div class="d-flex justify-content-between">
                <div class="form-group pr-2">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.bedrooms')</label>
                    </div>
                    <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"
                           name="edit_bedrooms_{{ $lead->id }}"
                           value="{{ old("edit_bedrooms_{$lead->id}",$lead->bedrooms) }}"
                           placeholder="@lang('sales.bedrooms')">
                </div>


                <div class="form-group pr-2">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.bathrooms')</label>
                    </div>
                    <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"
                           name="edit_bathrooms_{{ $lead->id }}"
                           value="{{ old("edit_bathrooms_{$lead->id}",$lead->bathrooms) }}"
                           placeholder="@lang('sales.bathrooms')">
                </div>
                <div class="form-group">
                    <div>
                        <label class="text-muted font-weight-medium" for="">@lang('sales.parkings')</label>
                    </div>
                    <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"
                           name="edit_parkings_{{ $lead->id }}" id="parkings_{{ $lead->id }}"
                           value="{{ old("edit_parkings_{$lead->id}",$lead->parkings) }}"
                           placeholder="@lang('sales.parkings')">
                </div>

            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.other')</label>
                </div>
                <input type="text" class="form-control" name="edit_other_{{ $lead->id }}"
                       value="{{ old("edit_other_{$lead->id}",$lead->other) }}" placeholder="@lang('sales.other')">
            </div>


            <div class="form-group">
                <div>
                    <label class="text-muted font-weight-medium" for="">@lang('sales.skype')</label>
                </div>
                <input type="email" class="form-control" value="{{ old("edit_skype_{$lead->id}",$lead->skype) }}"
                       name="edit_skype_{{ $lead->id }}" placeholder="@lang('sales.skype')">
            </div>


        </div>
    </div>

    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();table_row_hide('edit_lead_{{ $lead->id }}')" type="button"
                class="btn  btn-outline-success waves-effect waves-light">
            @lang('sales.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.submit')
        </button>
    </div>

</form>
