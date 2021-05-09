    <div class="col-md-12 mt-2 mb-2">
        
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.reason')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

        <textarea required class="form-control" disabled  cols="30" rows="4">{{ $opportunity->hold_reason }}</textarea>
    </div>


    <div class="col-md-12 mt-2 ">
            
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.on_hold_by')</lable>

        <p class="h5">{{ $opportunity->holdBy ? $opportunity->holdBy->{'name_'.app()->getLocale()} : ''  }}</p>
    </div>
    <div class="col-md-12 mt-2 mb-2">
            
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.reject_date')</lable>

        <p class="h5">{{ $opportunity->hold_date }}</p>
    </div>

    <div class="col-md-12 mt-2 mb-2">
    
        <p  onclick="event.preventDefault();toggle_reapprove_form({{ $opportunity->id }})" class="font-weight-medium cursor-pointer">@lang('sales.resubmit_approval')</p>
    </div>





<div class=" approval_form_{{ $opportunity->id }} d-none">
    <form  action="{{ url('sales/suggest-for-approve') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">



        <div class="row">

                @csrf
        

                <input type="hidden" value="{{ $opportunity->id }}" name="opportunity_id">
                <input type="hidden" value="{{ $opportunity->client->id }}" name="client_id">
        
    
            <div class="col-md-6">
        

            
        
                <div class="form-group">

                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.name')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                    <input type="text" class="form-control"  name="hold_name_{{ $opportunity->id }}" required  value="{{ old('hold_name_'.$opportunity->id,$opportunity->client->name) }}" placeholder="@lang('sales.name')" >
            
                </div>

                <div class="form-group">

                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date_of_birth')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>
        
                    <input  required type="text" name="hold_date_of_birth_{{ $opportunity->id }}" value="{{ old("hold_date_of_birth_{$opportunity->id}",$opportunity->client->date_of_birth) }}" class="form-control basic-datepicker" placeholder="@lang('sales.date_of_birth')">
                </div>




                <div class="form-group">
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.national_id')</lable>
        
                    <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"  name="hold_national_id_{{ $opportunity->id }}"  value="{{ old("hold_national_id_{$opportunity->id}",$opportunity->client->national_id) }}" placeholder="@lang('sales.national_id')">
                </div>
                <div class="form-group">
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport')</lable>
        
                    <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"  name="hold_passport_{{ $opportunity->id }}"  value="{{ old("hold_passport_{$opportunity->id}",$opportunity->client->passport) }}" placeholder="@lang('sales.passport')">
                </div>
        
        
        
                <div class="form-group ">
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport_expiration_date')</lable>
        
                    <input type="text" name="hold_passport_expiration_date_{{ $opportunity->id }}" value="{{ old("hold_passport_expiration_date_{$opportunity->id}",$opportunity->client->passport_expiration_date) }}"    class="form-control basic-datepicker" placeholder="@lang('sales.passport_expiration_date')">
                </div>
        
            
        

                
                <div class="form-group">
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>

                    <input type="email" class="form-control" required name="hold_email1_{{ $opportunity->id }}"  value="{{ old("hold_email1_{$opportunity->id}",$opportunity->client->email1) }}" placeholder="@lang('sales.email')">
                </div>


                
        
    
    
    
        
            
            </div>
        
    
            
            <div class="col-md-6">
        

        

                        
                <div class="form-group">       
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone1')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

                    <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone1')" type="text" class="form-control" name="hold_phone1_{{ $opportunity->id }}"   value="{{ old("hold_phone1_{$opportunity->id}",$opportunity->client->phone1) }}" placeholder="@lang('sales.phone1')" required>
                    
                </div>



                        


                <div class="form-group">

                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.country')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

                    <select required   id="convert_country_{{ $opportunity->id }}" class="form-control select2 " name="hold_country_{{ $opportunity->id }}"
                            data-toggle="select2" data-placeholder="@lang('sales.country')">
                        <option value=""></option>
                        @foreach($countries as $country)
                            <option value="{{$country->value}}" {{ old("hold_country_{$opportunity->id}",$opportunity->client->country) == $country->value ? 'selected' : ''}}>{{ $country->value }}</option>
                        @endforeach
            
                    </select>
                </div>


                <div class="form form-group">
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.language')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

                    <select required  style="" class="form-control  select2" name="hold_language_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.language')" required>
                        <option value="" class="font-weight-medium text-muted"></option>
                        @forelse($languages as $language)
                            <option {{ old("hold_language_{$opportunity->id}",$opportunity->client->language) == $language->code ? 'selected' : ''}}  value="{{ $language->code}}">{{ ucfirst($language->name) }}</option>
                        @empty

                        @endforelse

                    </select>
                </div>
                

                <div class="form form-group">
                    <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.currency')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> 

                    <select required  style="" class="form-control  select2" name="hold_currency_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.currency')" required>
                        <option value="" class="font-weight-medium text-muted"></option>
                        @forelse($currencies as $currency)
                            <option  @if(old('hold_currency_'.$opportunity->id,$opportunity->client->currency) == $currency->code ) selected @endif value="{{ $currency->code}}">{{ $currency->code .' ( '.$currency->name .' )'  }}</option>
                        @empty

                        @endforelse

                    </select>
                </div>



        



            
            </div>
            
    

        
        

            <input type="hidden" name="hold_contract_id_{{ $opportunity->id }}" value="{{ $opportunity->client->contracts->first()->id }}">


            

                
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group d-flex  mt-3">--}}
        {{----}}
                    {{--<p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.contract_type')</p>--}}
                    {{--<div style="flex:4">--}}
                        {{--<div class="radio radio-info form-check-inline">--}}
                            {{--<input type="radio" onchange="contract_type_hold({{ $opportunity->id }},'rent')" id="inline_hold1_{{ $opportunity->id }}" value="rent" class="contract_type" name="hold_contract_type_{{ $opportunity->id }}" --}}
                             {{--@if($opportunity->client->contracts->first()->contract_type == 'rent') checked @endif>--}}
                            {{--<label for="inline_hold1_{{ $opportunity->id }}"> @lang('sales.rent') </label>--}}
                        {{--</div>--}}
                        {{--<div class="radio radio-info form-check-inline">--}}
                            {{--<input type="radio" onchange="contract_type_hold({{ $opportunity->id }},'sale')"  id="inline_hold2_{{ $opportunity->id }}" class="contract_type" value="sale" name="hold_contract_type_{{ $opportunity->id }}" @if($opportunity->client->contracts->first()->contract_type == 'sale') checked @endif  >--}}
                            {{--<label for="inline_hold2_{{ $opportunity->id}}"> @lang('sales.sale') </label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
            {{----}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="col-md-6">--}}

                {{----}}
                {{--<div class="form-group">       --}}
                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> --}}
            {{----}}
                    {{--<input data-plugin="tippy" required  data-tippy-placement="top-start" title="@lang('sales.landlord')" type="text" class="form-control" name="hold_landlord_{{ $opportunity->id }}"   value="{{ old("hold_landlord_{$opportunity->id}",$opportunity->client->contracts->first()->landlord_name) }}" placeholder="@lang('sales.landlord')" required>--}}
                    {{----}}
                {{--</div>--}}
                {{--<div class="form-group">       --}}
                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord_national_id')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> --}}
        {{----}}
                    {{--<input data-plugin="tippy" required  data-tippy-placement="top-start" pattern="/^([0-9\s\-\+\(\)]*)$/" title="@lang('sales.landlord_national_id')" type="text" class="form-control" name="hold_landlord_national_id_{{ $opportunity->id }}"   value="{{ old("hold_landlord_national_id_{$opportunity->id}",$opportunity->client->contracts->first()->landlord_national_id) }}" placeholder="@lang('sales.landlord_national_id')" required>--}}
                    {{----}}
                {{--</div>--}}
                {{--<div class="form-group">       --}}
                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" > @lang('sales.landlord_address')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> --}}
        {{----}}
                        {{--<textarea class="form-control" required name="hold_landlord_address_{{ $opportunity->id }}" id="" cols="30" rows="4">{{ old('hold_landlord_address_'.$opportunity->id,$opportunity->client->contracts->first()->landlord_address) }}</textarea>                --}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}

                {{--<div class="form-group">       --}}
                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> --}}
                    {{----}}
                    {{--<input required data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.customer')" type="text" class="form-control" name="hold_customer_{{ $opportunity->id }}"   value="{{ old("hold_customer_{$opportunity->id}",$opportunity->client->contracts->first()->customer_name) }}" placeholder="@lang('sales.customer')" required>--}}
                    {{----}}
                {{--</div>--}}



                {{--<div class="form-group">       --}}
                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer_national_id')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> --}}

                    {{--<input data-plugin="tippy" required  data-tippy-placement="top-start" pattern="/^([0-9\s\-\+\(\)]*)$/" title="@lang('sales.customer_national_id')" type="text" class="form-control" name="hold_customer_national_id_{{ $opportunity->id }}"   value="{{ old("hold_landlord_national_id_{$opportunity->id}",$opportunity->client->contracts->first()->customer_national_id) }}" placeholder="@lang('sales.customer_national_id')" required>--}}
                    {{----}}
                {{--</div>--}}


                {{--<div class="form-group">       --}}
                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" > @lang('sales.customer_address')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable> --}}
        {{----}}
                        {{--<textarea class="form-control" required name="hold_customer_address_{{ $opportunity->id }}"  cols="30" rows="4">{{ old('hold_customer_address_'.$opportunity->id,$opportunity->client->contracts->first()->customer_address) }}</textarea>                --}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="form-group">--}}

                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>--}}
            {{----}}
                    {{--<input type="text" required name="hold_date_{{ $opportunity->id }}" value="{{ old("hold_date_{$opportunity->id}",$opportunity->client->contracts->first()->start_date) }}" class="form-control basic-datepicker" placeholder="@lang('sales.date')">--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{----}}
                {{--<div class="form-group end_date_{{ $opportunity->id }} ">--}}

                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.end_date')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>--}}

                    {{--<input type="text"  name="hold_end_date_{{ $opportunity->id }}" value="{{ old("hold_end_date_{$opportunity->id}",$opportunity->client->contracts->first()->start_date) }}" class="form-control basic-datepicker" placeholder="@lang('sales.end_date')">--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{----}}

                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.listing_address')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></lable>--}}
                {{----}}
                    {{--<textarea required class="form-control" name="hold_address_{{ $opportunity->id }}"  cols="30" rows="4">{{ old("hold_address_{$opportunity->id}",$opportunity->client->contracts->first()->address) }}</textarea>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{----}}

                    {{--<lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.note')</lable>--}}
                {{----}}
                    {{--<textarea class="form-control" name="hold_note_{{ $opportunity->id }}"  cols="30" rows="4">{{ old("hold_note_{$opportunity->id}",$opportunity->client->contracts->first()->notes) }}</textarea>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{----}}
                {{--<div class="form-group">--}}
                    {{--<label class="text-muted pr-2 font-weight-medium" for="recurring">{{ trans('sales.contract_amount') }}<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>--}}
                    {{--<input required class="form-control "  placeholder="@lang('sales.contract_amount')"  type="text" name="hold_amount_{{$opportunity->id }}" id="hold_amount_{{ $opportunity->id }}" value="{{ old('hold_amount_'.$opportunity->id,$opportunity->client->contracts->first()->amount ) }}" required>--}}
        {{----}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="col-md-6">--}}


                {{----}}
                {{--<div class="form-group mt-4">--}}

                    {{--<div class="card">--}}
                        {{--<div class="card-body">--}}
                            {{--<div class="dropdown float-right">--}}
                             {{----}}
                        {{----}}
                            {{--</div> <!-- end dropdown-->--}}
            {{----}}
                            {{--<h5 class="card-title font-16 mb-3">@lang('sales.attachments')</h5>--}}
            {{----}}
                            {{--<!-- file preview template -->--}}
                            {{--<div class="d-none" id="uploadPreviewTemplate">--}}
                                {{--<div class="card mt-1 mb-0 shadow-none border">--}}
                                    {{--<div class="p-2">--}}
                                        {{--<div class="row align-items-center">--}}
                                            {{--<div class="col-auto">--}}
                                                {{--<img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">--}}
                                            {{--</div>--}}
                                            {{--<div class="col pl-0">--}}
                                                {{--<a href="javascript:void(0);" class="text-muted font-weight-medium" data-dz-name></a>--}}
                                                {{--<p class="mb-0" data-dz-size></p>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-auto">--}}
                                                {{--<!-- Button -->--}}
                                                {{--<a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>--}}
                                                    {{--<i class="dripicons-cross"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- end file preview template -->--}}
                                {{----}}
                            {{--@if($opportunity->client->contracts->first()->documents)--}}
                {{----}}
                {{----}}
                            {{--@foreach($opportunity->client->contracts->first()->documents as $document)--}}
            {{----}}
            {{----}}
            {{----}}
                            {{----}}
                            {{--<div class="card mb-1 shadow-none border">--}}
                                {{--<div class="p-2">--}}
                                    {{--<div class="row align-items-center">--}}
                                        {{--<div class="col-auto">--}}
                                            {{--<div class="avatar-sm">--}}
                                                {{--<span class="avatar-title badge-soft-primary text-primary rounded">--}}
                                                {{--{{ ucfirst($document->extension) }}--}}
                                                {{--</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col pl-0">--}}
                                            {{--<a href="javascript:void(0);" class="text-muted font-weight-medium">{{ $document->name }}</a>--}}
                                            {{-- <p class="mb-0 font-12">2.3 MB</p> --}}
                                        {{--</div>--}}
                                        {{--<div class="col-auto">--}}
                                            {{--<!-- Button -->--}}
            {{----}}
            {{----}}
            {{----}}
            {{----}}
                                            {{--<a target="_blank" href="{{ asset('upload/contracts/'.$opportunity->client->id.'/'.$document->document) }}" class="btn btn-link font-16 text-muted">--}}
                                                {{--<i class="fa fa-eye"></i>--}}
                                            {{--</a>--}}
            {{----}}
                                            {{--<a download href="{{ asset('upload/contracts/'.$opportunity->client->id.'/'.$document->document) }}" class="btn btn-link font-16 text-muted">--}}
                                                {{--<i class="dripicons-download"></i>--}}
                                            {{--</a>--}}

                                            {{--<a  class="px-2" onclick="event.preventDefault();remove_document({{$opportunity->id}},{{$opportunity->client->id}},{{ $document->id }},{{ $opportunity->client->contracts->first()->id }});">--}}
                                                {{--<i class="fas  fa-trash cursor-pointer text-danger">--}}

                                                {{--</i>--}}
                                            {{----}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
            {{----}}
            {{----}}
                            {{--@endforeach           --}}
                                {{----}}
            {{----}}
                {{----}}
                            {{--@else   --}}
                {{----}}
                            {{--@lang('sales.no_records')--}}
                {{----}}
                            {{--@endif--}}
            {{----}}
            {{----}}
            {{----}}
            {{----}}
                        {{--</div>--}}

                        {{--<p class="cursor-pointer  pl-3" onclick="event.preventDefault();toggle_document_input({{ $opportunity->id }});"><i class="fas fa-lg fa-cloud-download-alt text-info"></i>  <i class="show_documents_text_{{ $opportunity->id }}">@lang('sales.upload_documents')</i> <i class="hide_documents_text_{{ $opportunity->id }} d-none">@lang('sales.hide_documents')</i></p> --}}

                    {{--</div>--}}
                            {{----}}
                    {{----}}
          {{----}}

            {{--</div>--}}
                {{--<div class="form-group upload_documents_{{ $opportunity->id }} d-none">--}}
                    {{--<label class="mb-1 font-weight-medium text-muted"--}}
                        {{--for="image">@lang('sales.contract_documents')</label>--}}
                    {{--<input  multiple type="file" name="hold_contract_documents_{{ $opportunity->id }}[]" data-plugins="dropify" id="image"--}}
                        {{--data-default-file="" />--}}
                {{--</div>--}}




            {{----}}

            {{--</div>--}}


                {{-- <div class="col-md-12  @if($opportunity->client->contracts->first()->has_recurring == 'yes' ) d-none @endif  no-recurring-message_{{ $opportunity->id }}">
                    <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.recurrings')</lable> 
                    <p class="h5 mb-3">@lang('sales.contract_has_no_recurrings')</p> 

                </div> --}}

        
                        
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group d-flex  mt-3">--}}
        {{----}}
                    {{--<p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.recurring')</p>--}}
                    {{--<div style="flex:4">--}}
                        {{--<div class="radio radio-info form-check-inline">--}}
                            {{--<input--}}
                            {{--@if($opportunity->client->contracts->first()->has_recurring  == 'yes') checked @endif--}}
                             {{--type="radio" onchange="recurring_hold({{ $opportunity->id }},'yes')" id="recurring_yes_{{ $opportunity->id }}" value="yes" class="recurring_yes" name="hold_recurring_type_{{ $opportunity->id }}" >--}}
                            {{--<label for="recurring_yes_{{ $opportunity->id }}"> @lang('sales.yes') </label>--}}
                        {{--</div>--}}
                        {{--<div class="radio radio-info form-check-inline">--}}
                            {{--<input--}}
                            {{--@if($opportunity->client->contracts->first()->has_recurring  == 'no') checked @endif--}}

                            {{--type="radio" onchange="recurring_hold({{ $opportunity->id }},'no')"  id="recurring_no_{{ $opportunity->id }}" class="recurring_no" value="no" name="hold_recurring_type_{{ $opportunity->id }}" >--}}
                            {{--<label for="recurring_no_{{ $opportunity->id }}"> @lang('sales.no') </label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
            {{----}}
                {{--</div>--}}
            {{--</div>--}}

      {{----}}
            {{----}}
            {{--<div class="col-md-6 @if($opportunity->client->contracts->first()->has_recurring == 'yes' ) d-none @endif  hold_recurrings_type_{{ $opportunity->id }}">--}}
        {{----}}
                {{--<div class="form-group">--}}
                    {{--<label class="text-muted pr-2 font-weight-medium recurring-label_{{ $opportunity->id }}" for="recurring">{{ trans('sales.contract_recurring') }}</label>--}}
                    {{--<input class="form-control " --}}
                    {{--placeholder="@lang('sales.type_recurring_number_and_press_enter')" --}}
                    {{--onkeypress="generate_hold(event,{{ $opportunity->id }})"--}}
                    {{--type="text"  --}}
                    {{--id="hold_recurring_{{ $opportunity->id }}" value="{{ old('hold_recurring_'.$opportunity->id ) }}"--}}
                    {{--value="{{ $opportunity->client->contracts->first()->recurring_number }}"--}}
                    {{-->--}}
        {{----}}
                {{--</div>--}}
    {{----}}
            {{--</div>--}}
    {{----}}

            {{--<div class="col-md-12 ">--}}
                {{--<div class="row recurring_row_hold_{{ $opportunity->id }}">--}}
            {{--@if($opportunity->client->contracts->first()->has_recurring == 'yes' && $opportunity->client->contracts->first()->recurrings)--}}




                    {{--<div class="col-md-12 all_recurrings_hold_{{ $opportunity->id }}"><i onclick="add_single_recurring_hold({{ $opportunity->id }})" style="cursor:pointer" class=" fa fa-plus float-right add_recurring_input"></i><div/>--}}

                        {{--<div class="row recurring_single_row_hold_{{ $opportunity->id }}">--}}
                    {{----}}
                    {{----}}
                            {{--@foreach($opportunity->client->contracts->first()->recurrings as $recurring)--}}
                                {{--<div class="col-md-1 remove_recurring_hold_{{ $opportunity->id }} remove_hold_single_{{ $opportunity->id }}_{{ $loop->index }}">--}}
                                    {{--<i class="fa fa-trash mt-2" style="cursor: pointer" onclick="remove_hold_single_recurring({{ $loop->index }},{{ $opportunity->id }})" > </i>--}}
                                 {{--</div>--}}
                                {{--<div class="form-group remove_recurring_hold_{{ $opportunity->id }} col-md-5  remove_hold_single_{{ $opportunity->id }}_{{ $loop->index }}">--}}
                                    {{--<input value="{{ $recurring->amount}}" type="text" class="form-control mb-2 recurring_{{ $opportunity->id }}_{{ $loop->index + 1 }} remove_hold_single_{{ $opportunity->id }}_{{ $loop->index }}"  name="recurrings_amount_{{ $opportunity->id }}[{{ $loop->index }}]"   required />  --}}
                                    {{--<input  value="{{ $recurring->date}}" type="date" class="form-control  recurring_{{ $opportunity->id }}_{{ $loop->index + 1 }} remove_hold_single_{{ $opportunity->id }}_{{ $loop->index }}"  name="recurrings_dates_{{ $opportunity->id }}[{{ $loop->index }}]"   required />    --}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 remove_recurring_hold_{{ $opportunity->id }}  remove_hold_single_{{ $opportunity->id }}_{{ $loop->index }}">--}}
                                {{--</div>  --}}
                            {{--@endforeach   --}}
                                {{----}}
                                            {{----}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--@else  --}}
                   {{----}}
                    {{--@endif    --}}
                {{--</div>--}}
                    {{----}}
        {{--</div>--}}
    

        
        <div class="d-flex justify-content-start ml-2">
        
            <button onclick="event.preventDefault();toggle_reapprove_form({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
            @lang('sales.cancel')
            </button>
            <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">





                <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.submit_for_approve')
            </button>
        </div>



    </div>
 
    </form>

    </div>
  
   

        <div class="d-flex justify-content-end ">

            <button onclick="event.preventDefault();hide_hold_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
                @lang('sales.cancel')
            </button>

        </div>

   

  @push('js')
<script>

        $(document).ready(function() {
        $(window).keypress(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
        });
        function generate_hold(event,id){
   if(event.keyCode != 13){
       return false
   }
       if($('#hold_recurring_'+id).val() == '' || $('#hold_recurring_'+id).val() == 0){
       alert('No recurring Entered')
       return false;
       }
       
       
       $('.hold_recurrings_type_'+id).addClass('d-none')
       

       
       $('.recurring-label_'+id).addClass('d-none');
       $('.remove_recurring_hold_'+id).remove();
    //    $('.all_recurrings_hold_'+id).remove();
       var html ='<div class="col-md-12 all_recurrings_hold_'+id+'">\
        <i onclick="add_single_recurring_hold('+id+')" style="cursor:pointer" class=" fa fa-plus float-right add_recurring_input"></i>\
        <div/>';

       html += '<div class="row recurring_single_row_hold_'+id+'">'

       for(var i =0; i < $('#hold_recurring_'+id).val(); i++){

        
           // html += '<div class="form-group remove_recurring  col-md-1" >'+ (i + 1) +' - </div>'
 
        html += '<div class="col-md-1 remove_recurring_hold_'+id+' remove_hold_single_'+id+'_'+ i +'"><i onclick="remove_hold_single_recurring('+ i +','+id+')" style="cursor: pointer" class="fa fa-trash mt-2"> </i> </div>'
        html += '<div class="form-group remove_recurring_hold_'+id+' col-md-5  remove_hold_single_'+id+'_'+ i +'">';
        html += '<input type="text" class="form-control mb-2 recurring_'+id+'_'+(i)+'  remove_hold_single_'+id+'_'+ i +'"  name="recurrings_amount_'+id+'['+i+']"   required />'    
        html += '<input type="date" class="form-control  recurring_'+id+'_'+(i)+'  remove_hold_single_'+id+'_'+ i +'"  name="recurrings_dates_'+id+'['+i+']"   required />' 
        html += '</div><div class="col-md-6 remove_recurring_hold_'+id+'  remove_hold_single_'+id+'_'+ i +' "></div>'    

              
       }

       html += '</div>'

   
       $('.recurring_row_hold_'+id).append( html)
     
   
       $('.recurring_1').focus();
       $('#hold_recurring_'+id).val('')

}

       function toggle_reapprove_form(id){

        var lead_div = $('.approval_form_'+id);
            if(lead_div.hasClass('d-none')){

                lead_div.removeClass('d-none');

            } else {
                lead_div.addClass('d-none');

            }
        }



    function add_single_recurring_hold(id){
        

        if(confirm('Do you Want To add More Recurring ?') == false){
            return false;
        }
            inputs = $('.recurring_row_hold_'+id).find("input[type=text]");

           var next_input = inputs.length + 1 ;


       var html = '';        
        html += '<div class="col-md-1 remove_recurring_hold_'+id+' remove_hold_single_'+id+'_'+ next_input +'"><i onclick="remove_hold_single_recurring('+ next_input +','+id+')" style="cursor: pointer" class="fa fa-trash mt-2"> </i> </div>'
        html += '<div class="form-group remove_recurring_hold_'+id+' col-md-5  remove_hold_single_'+id+'_'+ next_input +'">';
        html += '<input type="text" class="form-control mb-2 recurring_'+id+'_'+(next_input)+'  remove_hold_single_'+id+'_'+ next_input +'"  name="recurrings_amount_'+id+'['+next_input+']"   required />'    
        html += '<input type="date" class="form-control  recurring_'+id+'_'+(next_input)+'  remove_hold_single_'+id+'_'+ next_input +'"  name="recurrings_dates_'+id+'['+next_input+']"   required />' 
        html += '</div><div class="col-md-6 remove_recurring_hold_'+id+'  remove_hold_single_'+id+'_'+ next_input +' "></div>'    


        $('.recurring_single_row_hold_'+id).append( html)
          
        
        $('.recurring_'+(next_input)).focus();
    }


        
    function remove_hold_single_recurring(i,id){


        if(confirm('Are You Sure ?') == false){
            return false;
        }

        $('.remove_hold_single_'+id+'_'+i).remove();


       
    }



   function contract_type_hold(id,type){

        if(type == "rent"){

            $('.end_date_'+id).removeClass('d-none');

        }else{
            $('.end_date_'+id).addClass('d-none');

        }
   }

   function recurring_hold(id,type){
   
        if(type == "yes"){
          
            $('.hold_recurrings_type_'+id).removeClass('d-none');

            // $('.no-recurring-message_'+id).addClass('d-none');

        }else{

            // $('.no-recurring-message_'+id).removeClass('d-none');

            
            if(confirm('You Are deleting Your Recurrings') == true){
                
                
                $('.hold_recurrings_type_'+id).addClass('d-none');
                $('.all_recurrings_hold_'+id).remove();

                $('#hold_recurring_'+id).val('')
                $('#hold_recurring_'+id).prop('type','text')
            } else {
                $('.recurring_yes').prop('checked', true);
            }


          
        }
   }




   function remove_document(opportunity,client,document,contract){

        if(confirm('Are You Sure')){
            $.ajax({
                url:'{{ url("sales/opportunity-remove-document") }}',
                type:'post',
                data:{
                    _token: "{{ csrf_token() }}",
                    client : client,
                    document    : document,
                    contract    : contract     

                },success: function(data){
                   
                    $('.document_row_'+opportunity+'_'+document).remove()
                    toast(data.message, 'success')

                },error: function(error){
                    toast(error.responseJSON.message, 'error')

                }
            });
        }

   }


   function toggle_document_input(id){

        var upload_div = $('.upload_documents_'+id);
        var show_text = $('.show_documents_text_'+id);
        var hide_text = $('.hide_documents_text_'+id);
            if(upload_div.hasClass('d-none')){

                upload_div.removeClass('d-none');

                show_text.addClass('d-none');
                hide_text.removeClass('d-none');

            } else {
                upload_div.addClass('d-none');

                show_text.removeClass('d-none');
                hide_text.addClass('d-none');

            }
   
      
   }
</script>
  @endpush