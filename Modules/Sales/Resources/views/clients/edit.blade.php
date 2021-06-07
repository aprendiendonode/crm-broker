
<form  action="{{ url('sales/manage_clients/'.$client->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row mb-2">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="edit_agency_id_{{ $client->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="edit_business_id_{{ $client->id }}" value="{{ $business }}">
            @endif


     
    <div class="col-md-12">

       
        <div class="form-group" style="margin-bottom:23px">


             <div>
               <label class="text-muted font-weight-medium" for="">@lang('sales.salutation')</label>
             </div>


             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio1_{{ $client->id }}" value="Mr" name="edit_salutation_{{ $client->id }}" @if(old("edit_salutation_{$client->id}",$client->salutation) == 'Mr')  checked  @endif>
                 <label for="salutationRadio1_{{ $client->id }}"> @lang('sales.Mr') </label>
             </div>
         
         
             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio2_{{ $client->id }}" value="Mrs" name="edit_salutation_{{ $client->id }}" @if(old("edit_salutation_{$client->id}",$client->salutation) == 'Mrs')  checked  @endif>
                 <label for="salutationRadio2_{{ $client->id }}"> @lang('sales.Mrs') </label>
             </div>
             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio3_{{ $client->id }}" value="Miss" name="edit_salutation_{{ $client->id }}" @if(old("edit_salutation_{$client->id}",$client->salutation) == 'Miss')  checked  @endif>
                 <label for="salutationRadio3_{{ $client->id }}"> @lang('sales.Miss') </label>
             </div>
             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio4_{{ $client->id }}" value="Ms" name="edit_salutation_{{ $client->id }}" @if(old("client_salutation_{$client->id}",$client->salutation) == 'Ms')  checked  @endif>
                 <label for="salutationRadio4_{{ $client->id }}"> @lang('sales.Ms') </label>
             </div>
            </div>

    </div>
    <div class="col-md-4">

                    
    
   

        <div class="form-group">
    
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.name')</lable>

            <input type="text" class="form-control"  name="edit_name_{{ $client->id }}" required  value="{{ old("edit_name_{$client->id}",$client->name) }}" placeholder="@lang('sales.name')" >
    
    
        </div>

              
       <div class="form-group">  
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone1')</lable>
     
           <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone1')" type="text" class="form-control" name="edit_phone1_{{ $client->id }}"   value="{{ old("edit_phone1_{$client->id}",$client->phone1) }}" placeholder="@lang('sales.phone1')" required>
        </div>


        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone2')</lable>

            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone2')" type="text" class="form-control" name="edit_phone2_{{ $client->id }}"   value="{{ old("edit_phone2_{$client->id}",$client->phone2) }}" placeholder="@lang('sales.phone2')"  >
        </div>


    

            <div class="form-group"> 
    
              <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.landline')</lable>
      
                  
              <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.landline')" type="text" class="form-control" name="edit_landline_{{ $client->id }}"   value="{{ old("edit_landline_{$client->id}",$client->landline) }}" placeholder="@lang('sales.landline')">
               
              
            </div>
    



        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email1')</lable>

            <input type="email" class="form-control"  name="edit_email1_{{ $client->id }}"  value="{{ old("edit_email1_{$client->id}",$client->email1) }}" placeholder="@lang('sales.email')">
        </div>
    
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email2')</lable>

            <input type="email" class="form-control"  name="edit_email2_{{ $client->id }}" value="{{ old("edit_email2_{$client->id}",$client->email2) }}" placeholder="@lang('sales.email2')" >
        </div>



    </div>




    <div class="col-md-4">
                
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.nationality')</lable>

            <select required onchange="" id="nationality_id_{{ $client->id }}" class="form-control select2 " name="edit_nationality_id_{{ $client->id }}"
                    data-toggle="select2" data-placeholder="@lang('sales.nationality')">
                <option value=""></option>
                @foreach($countries as $nationality)
                    <option class="nationality_{{$nationality->id}}" value="{{$nationality->id}}" {{ old("edit_nationality_id_{$client->id}",$client->nationality_id) == $nationality->id ? 'selected' : ''}}>{{ $nationality->nationality .' '. $nationality->phone_code  }}</option>
                @endforeach
    
            </select>
        </div>
    
{{--     
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.country')</lable>

            <select required   id="country_{{ $client->id }}" class="form-control select2 " name="edit_country_{{ $client->id }}"
                    data-toggle="select2" data-placeholder="@lang('sales.country')">
                <option value=""></option>
                @foreach($countries as $country)
                    <option value="{{$country->value}}" {{ old("edit_country_{$client->id}",$client->country) == $country->value ? 'selected' : ''}}>{{ $country->value }}</option>
                @endforeach
    
            </select>
        </div>

         --}}
    
    
    
        <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date_of_birth')</lable>

            <input type="text" name="edit_date_of_birth_{{ $client->id }}" value="{{ old("edit_date_of_birth_{$client->id}",$client->date_of_birth) }}" class="form-control basic-datepicker" placeholder="@lang('sales.date_of_birth')">
        </div>


        
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.national_id')</lable>

            <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"  name="edit_national_id_{{ $client->id }}"  value="{{ old("edit_national_id_{$client->id}",$client->national_id) }}" placeholder="@lang('sales.national_id')">
        </div>
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport')</lable>

            <input type="text" class="form-control"   name="edit_passport_{{ $client->id }}"  value="{{ old("edit_passport_{$client->id}",$client->passport) }}" placeholder="@lang('sales.passport')">
        </div>



        <div class="form-group ">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport_expiration_date')</lable>

            <input type="text" name="edit_passport_expiration_date_{{ $client->id }}" value="{{ old("edit_passport_expiration_date_{$client->id}",$client->passport_expiration_date) }}"    class="form-control basic-datepicker" placeholder="@lang('sales.passport_expiration_date')">
        </div>



    

     

        
    </div>


    <div class="col-md-4">

    
        <div class="form-group ">


            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.lead_sources')</lable>

           <div class="d-flex justify-content-between">

               
               <div style="flex:4">
                    <select  style="" class="form-control select_souce_id select2" name="edit_source_id_{{ $client->id }}" data-toggle="select2" data-placeholder="@lang('sales.lead_sources')" required>
                        <option value="" class="font-weight-medium text-muted"></option>
                        @forelse($lead_sources as $source)
                            <option @if(old("edit_source_id_{$client->id}",$client->source_id) == $source->id) selected @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
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
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i>
                        </a>

                    @endcan
           
               </div>     
       </div>




    
       <div class="form-group ">


                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.lead_types')</lable>

            <div class="d-flex justify-content-between">

                
                <div style="flex:4">
                    <select  class="form-control select2 select_type_id" name="edit_type_id_{{ $client->id }}"
                        data-toggle="select2" data-placeholder="@lang('sales.lead_types')" required>
                        <option value=""></option>

                        @forelse($lead_types as $type)
                        <option @if(old("edit_type_id_{$client->id}",$client->type_id) == $type->id) selected @endif value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                
                </select>
                </div>
                        @can('manage_client_setting')
                            <a style="margin-top:4px;"
                            data-plugin="tippy" title="@lang('sales.new_lead_type')"
                            data-tippy-placement="top-start" 

                            data-toggle="modal"
                            data-target="#add_type" 
                                ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

                        @endcan 
            
                </div>     
        </div>

{{--             
        <div class="form-group ">


                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.lead_qualifications')</lable>

            <div class="d-flex justify-content-between">

                
                <div style="flex:4">
          
                    <select  class="form-control select2 select_qualification_id" name="edit_qualification_id_{{ $client->id }}" data-toggle="select2" data-placeholder="@lang('sales.lead_qualifications')" required >
                    
                            <option value=""></option>
                            @forelse($lead_qualifications as $ql)
                            <option @if(old("edit_qualification_id_{$client->id}",$client->qualification_id) == $ql->id) selected @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse
                    
                    </select>
                 </div>
                    @can('manage_client_setting')
                        <a style="margin-top:4px;"
                        data-plugin="tippy" title="@lang('sales.new_lead_qualification')"
                        data-tippy-placement="top-start" 
                
                        data-toggle="modal"
                        data-target="#add_qualification" 
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>
                
                    @endcan 
            
                </div>     
        </div>
 --}}

        
        
            
        <div class="form-group ">


            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.way_of_communications')</lable>

        <div class="d-flex justify-content-between">

            
            <div style="flex:4">
      
                <select  class="form-control  select_communication_id select2 " name="edit_communication_id_{{ $client->id }}"
                        data-toggle="select2" data-placeholder="@lang('sales.way_of_communications')" required>
        
                    <option value="" ></option>
                        @forelse($lead_communications as $communication)
                    <option @if(old("edit_communication_id_{$client->id}",$client->communication_id) == $communication->id) selected @endif value="{{ $communication->id}}">{{ $communication->{'name_'.app()->getLocale()} }}</option>
                    @empty
        
                    @endforelse
                
                </select>
             </div>
             @can('manage_client_setting')
             <a style="margin-top:4px;" 
             
             data-plugin="tippy" title="@lang('sales.new_lead_communication')"
             data-tippy-placement="top-start" 
     
             data-toggle="modal"
             data-target="#add_communication" 
              ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>
     
             @endcan 
        
            </div>     
    </div>

            
    <div class="form-group ">


        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_type')</lable>

    <div class="d-flex justify-content-between">

    
    <div style="flex:4">

        <select  class="form-control select_property_id select2 " name="edit_property_id_{{ $client->id }}"
            data-toggle="select2" data-placeholder="@lang('sales.property_type')" required>
            <option value=""></option>

            @forelse($lead_properties as $property)
            <option @if(old("edit_property_id_{$client->id}",$client->property_id) == $property->id) selected @endif value="{{ $property->id}}">{{ $property->{'name_'.app()->getLocale()} }}</option>
            @empty

            @endforelse
        
        </select>
     </div>
        @can('manage_client_setting')
        <a style="margin-top:4px;"
        data-plugin="tippy" title="@lang('sales.new_client_property')"
        data-tippy-placement="top-start" 

        data-toggle="modal"
        data-target="#add_property" 
        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i>
        </a>
        @endcan

    </div>     
</div>


  

    </div>


</div>





<button type="button" class=" btn btn-primary mb-3" onclick="toggle_lead_({{ $client->id }})">@lang('sales.more') <i class="fe-eye"></i></button>

<div class="row toggled_lead_{{ $client->id }} d-none">
    
    
        
    
            
    
     
    
    <div class="col-md-4">


        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.partnername')</lable>

            <input type="text" class="form-control"  name="edit_partner_name_{{ $client->id }}"  value="{{ old("edit_partner_name_{$client->id}",$client->partner_name) }}" placeholder="@lang('sales.partnername')" >
        </div>



        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.company')</lable>

            <input type="text" class="form-control"  name="edit_company_{{ $client->id }}"   value="{{ old("edit_company_{$client->id}",$client->company) }}"  placeholder="@lang('sales.company')">
        </div>



        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.website')</lable>

            <input type="text" pattern="/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/" class="form-control"  name="edit_website_{{ $client->id }}" value="{{ old("edit_website_{$client->id}",$client->website) }}"  placeholder="@lang('sales.website')">
        </div>







        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.po_box')</lable>

            <input type="text" class="form-control" placeholder="@lang('sales.po_box')" value="{{ old("edit_po_box_{$client->id}",$client->po_box) }}" name="edit_po_box_{{ $client->id }}" >
        </div>


    







    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.fax')</lable>

           
           <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.fax')" type="text" class="form-control" name="edit_fax_{{ $client->id }}"   value="{{ old("edit_fax_{$client->id}",$client->fax) }}" placeholder="{{trans('sales.fax')}}"  >
           
        </div>
    
    
    </div>






    
    
    <div class="col-md-4">
           
         
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.developer')</lable>

            <input type="text" class="form-control"  name="edit_developer_{{ $client->id }}"  value="{{ old("edit_developer_{$client->id}",$client->developer) }}" placeholder="@lang('sales.developer')" >
        </div>
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.community')</lable>

            <input type="text" class="form-control"  name="edit_community_{{ $client->id }}"  value="{{ old("edit_community_{$client->id}",$client->community) }}" placeholder="@lang('sales.community')" >
        </div>
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.buliding_name')</lable>

            <input type="text" class="form-control"  name="edit_building_name_{{ $client->id }}"  value="{{ old("edit_building_name_{$client->id}",$client->building_name) }}" placeholder="@lang('sales.buliding_name')" >
        </div>
    
    
        <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.address')</lable>

            <input type="text" class="form-control"  name="edit_address_{{ $client->id }}"  value="{{ old("edit_address_{$client->id}",$client->address) }}" placeholder="@lang('sales.address')" >
        </div>
    

    
        <div class="form-group d-flex  ">
    
            <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
            <div style="flex:4">
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="inlineRadio1_{{ $client->id }}" value="rent" name="edit_property_purpose_{{ $client->id }}" @if($client->property_purpose == 'rent') checked @endif>
                    <label for="inlineRadio1"> @lang('sales.rent') </label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="inlineRadio2_{{ $client->id }}" value="buy" name="edit_property_purpose_{{ $client->id }}" @if($client->property_purpose == 'buy') checked @endif>
                    <label for="inlineRadio2"> @lang('sales.buy') </label>
                </div>
             </div>
    
        </div>
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_no')</lable>

            <input type="text" class="form-control"   name="edit_property_no_{{ $client->id }}" id="property_no_{{ $client->id }}" value="{{ old("edit_property_no_{$client->id}",$client->property_no) }}" placeholder="@lang('sales.property_no')" >
        </div>
 
        
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_reference')</lable>

            <input type="text" class="form-control"  name="edit_property_reference_{{ $client->id }}" value="{{ old("edit_property_reference_{$client->id}",$client->property_reference) }}" placeholder="@lang('sales.property_reference')" >
        </div>
    
    
    
          
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_size_sqft')</lable>

            <input type="text" class="form-control"   name="edit_size_sqft_{{ $client->id }}"  value="{{ old("edit_size_sqft_{$client->id}",$client->size_sqft) }}" placeholder="@lang('sales.property_size_sqft')" >
        </div>
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_size_sqm')</lable>

            <input type="text" class="form-control"  name="edit_size_sqm_{{ $client->id }}"  value="{{ old("edit_size_sqm_{$client->id}",$client->size_sqm) }}" placeholder="@lang('sales.property_size_sqm')" >
        </div>
        <div class="d-flex justify-content-between">

        <div class="form-group pr-2">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.bedrooms')</lable>

            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_bedrooms_{{ $client->id }}"  value="{{ old("edit_bedrooms_{$client->id}",$client->bedrooms) }}" placeholder="@lang('sales.bedrooms')" >
        </div>
    
    
        <div class="form-group pr-2">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.bathrooms')</lable>


            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_bathrooms_{{ $client->id }}" value="{{ old("edit_bathrooms_{$client->id}",$client->bathrooms) }}" placeholder="@lang('sales.bathrooms')" >
        </div>
        <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.parkings')</lable>

            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_parkings_{{ $client->id }}" id="parkings_{{ $client->id }}" value="{{ old("edit_parkings_{$client->id}",$client->parkings) }}" placeholder="@lang('sales.parkings')" >
        </div>
    
         </div>
    
 
       
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.skype')</lable>

            <input type="email" class="form-control"  value="{{ old("edit_skype_{$client->id}",$client->skype) }}" name="edit_skype_{{ $client->id }}" placeholder="@lang('sales.skype')">
        </div>
    
   
    
    
    
    
    
    
    
    </div>



</div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $client->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.submit')
        </button>
    </div>
    
    </form>


    @push('js')
    <script src="{{ asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <script>
       var client_id = @json($client->id);
   $("#range_"+client_id).ionRangeSlider({
        skin: "round",
        min: 10,
        max: 100,
        from: '{{ $client->probability_of_winning }}',
        onStart: function (data) {
            // fired then range slider is ready
            $('.client_probability_of_winning_'+client_id).val(data.from)

        },
        onChange: function (data) {
            // fired on every range slider update
        },
        onFinish: function (data) {
            // console.log(data.from)

            $('.client_probability_of_winning_'+client_id).val(data.from)
        },
        onUpdate: function (data) {
            // fired on changing slider with Update method
        }
    });


    function toggle_lead_(id){

        var lead_div = $('.toggled_lead_'+id);
        if(lead_div.hasClass('d-none')){

            lead_div.removeClass('d-none');

        } else {
            lead_div.addClass('d-none');

        }
    }
    </script>

    @endpush