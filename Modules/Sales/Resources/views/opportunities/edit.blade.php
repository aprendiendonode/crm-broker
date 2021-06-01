
<form  action="{{ url('sales/manage_opportunities/'.$opportunity->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row mb-2">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="edit_agency_id_{{ $opportunity->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="edit_business_id_{{ $opportunity->id }}" value="{{ $business }}">
            @endif


     
    <div class="col-md-12">

       
        <div class="form-group" style="margin-bottom:23px">


            <div>
             <label class="text-muted font-weight-medium" for="">@lang('sales.salutation')</label>
             </div>


             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio1_{{ $opportunity->id }}" value="Mr" name="edit_salutation_{{ $opportunity->id }}" @if(old("edit_salutation_{$opportunity->id}",$opportunity->salutation) == 'Mr')  checked  @endif>
                 <label for="salutationRadio1_{{ $opportunity->id }}"> @lang('sales.Mr') </label>
             </div>
         
         
             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio2_{{ $opportunity->id }}" value="Mrs" name="edit_salutation_{{ $opportunity->id }}" @if(old("edit_salutation_{$opportunity->id}",$opportunity->salutation) == 'Mrs')  checked  @endif>
                 <label for="salutationRadio2_{{ $opportunity->id }}"> @lang('sales.Mrs') </label>
             </div>
             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio3_{{ $opportunity->id }}" value="Miss" name="edit_salutation_{{ $opportunity->id }}" @if(old("edit_salutation_{$opportunity->id}",$opportunity->salutation) == 'Miss')  checked  @endif>
                 <label for="salutationRadio3_{{ $opportunity->id }}"> @lang('sales.Miss') </label>
             </div>
             <div class="radio radio-info form-check-inline">
                 <input type="radio" id="salutationRadio4_{{ $opportunity->id }}" value="Ms" name="edit_salutation_{{ $opportunity->id }}" @if(old("opportunity_salutation_{$opportunity->id}",$opportunity->salutation) == 'Ms')  checked  @endif>
                 <label for="salutationRadio4_{{ $opportunity->id }}"> @lang('sales.Ms') </label>
             </div>
            </div>

    </div>
    <div class="col-md-4">

                    
    
   

        <div class="form-group">
    
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.firstname')</lable>

                <input type="text" class="form-control"  name="edit_first_name_{{ $opportunity->id }}" required  value="{{ old("edit_first_name_{$opportunity->id}",$opportunity->first_name) }}" placeholder="@lang('sales.firstname')" >
    
    
        </div>
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.secondname')</lable>

            <input type="text" class="form-control"  name="edit_sec_name_{{ $opportunity->id }}"  value="{{ old("edit_sec_name_{$opportunity->id}",$opportunity->sec_name) }}" placeholder="@lang('sales.secondname')" >
        </div>
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.fullname')</lable>

            <input type="text" class="form-control"  name="edit_full_name_{{ $opportunity->id }}"   value="{{ old("edit_full_name_{$opportunity->id}",$opportunity->full_name) }}" placeholder="@lang('sales.fullname')" >
        </div>



              
       <div class="form-group">  
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone1')</lable>
     
           <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone1')" type="text" class="form-control" name="edit_phone1_{{ $opportunity->id }}"   value="{{ old("edit_phone1_{$opportunity->id}",$opportunity->phone1) }}" placeholder="@lang('sales.phone1')" required>
        </div>


        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone2')</lable>

            <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone2')" type="text" class="form-control" name="edit_phone2_{{ $opportunity->id }}"   value="{{ old("edit_phone2_{$opportunity->id}",$opportunity->phone2) }}" placeholder="@lang('sales.phone2')"  >
        </div>



        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email1')</lable>

            <input type="email" class="form-control"  name="edit_email1_{{ $opportunity->id }}"  value="{{ old("edit_email1_{$opportunity->id}",$opportunity->email1) }}" placeholder="@lang('sales.email')">
        </div>
    
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email2')</lable>

            <input type="email" class="form-control"  name="edit_email2_{{ $opportunity->id }}" value="{{ old("edit_email2_{$opportunity->id}",$opportunity->email2) }}" placeholder="@lang('sales.email2')" >
        </div>



    </div>




    <div class="col-md-4">

     

                
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.nationality')</lable>

            <select required onchange="toggleEditCountryData({{ $opportunity->id }})" id="nationality_id_{{ $opportunity->id }}" class="form-control select2 " name="edit_nationality_id_{{ $opportunity->id }}"
                    data-toggle="select2" data-placeholder="@lang('sales.nationality')">
                <option value=""></option>
                @foreach($countries as $nationality)
                    <option class="nationality_{{$nationality->id}}" value="{{$nationality->id}}" {{ old("edit_nationality_id_{$opportunity->id}",$opportunity->nationality_id) == $nationality->id ? 'selected' : ''}}>{{ $nationality->nationality .' '. $nationality->phone_code  }}</option>
                @endforeach
    
            </select>
        </div>
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.country')</lable>

            <select required   id="country_{{ $opportunity->id }}" class="form-control select2 " name="edit_country_{{ $opportunity->id }}"
                    data-toggle="select2" data-placeholder="@lang('sales.country')">
                <option value=""></option>
                @foreach($countries as $country)
                    <option value="{{$country->value}}" {{ old("edit_country_{$opportunity->id}",$opportunity->country) == $country->value ? 'selected' : ''}}>{{ $country->value }}</option>
                @endforeach
    
            </select>
        </div>
    
    

        <div class="">
            <h4 class="header-title">@lang('sales.probability_of_winning')</h4>

                <input type="text"  id="range_{{ $opportunity->id }}" class="range">
                <input type="hidden" class="opportunity_probability_of_winning_{{ $opportunity->id }}" name="opportunity_probability_of_winning_{{ $opportunity->id }}">
          
        </div> 


     

        
    </div>


    <div class="col-md-4">

    
        <div class="form-group ">


            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.lead_sources')</lable>

           <div class="d-flex justify-content-between">

               
               <div style="flex:4">
                    <select  style="" class="form-control select_souce_id select2" name="edit_source_id_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.lead_sources')" required>
                        <option value="" class="font-weight-medium text-muted"></option>
                        @forelse($lead_sources as $source)
                            <option @if(old("edit_source_id_{$opportunity->id}",$opportunity->source_id) == $source->id) selected @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
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
                    <select  class="form-control select2 select_type_id" name="edit_type_id_{{ $opportunity->id }}"
                        data-toggle="select2" data-placeholder="@lang('sales.lead_types')" required>
                        <option value=""></option>

                        @forelse($lead_types as $type)
                        <option @if(old("edit_type_id_{$opportunity->id}",$opportunity->type_id) == $type->id) selected @endif value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                
                </select>
                </div>
                        @can('manage_opportunity_setting')
                            <a style="margin-top:4px;"
                            data-plugin="tippy" title="@lang('sales.new_lead_type')"
                            data-tippy-placement="top-start" 

                            data-toggle="modal"
                            data-target="#add_type" 
                                ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

                        @endcan 
            
                </div>     
        </div>

            
        <div class="form-group ">


                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.lead_qualifications')</lable>

            <div class="d-flex justify-content-between">

                
                <div style="flex:4">
          
                    <select  class="form-control select2 select_qualification_id" name="edit_qualification_id_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.lead_qualifications')" required >
                    
                            <option value=""></option>
                            @forelse($lead_qualifications as $ql)
                            <option @if(old("edit_qualification_id_{$opportunity->id}",$opportunity->qualification_id) == $ql->id) selected @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                            @empty

                            @endforelse
                    
                    </select>
                 </div>
                    @can('manage_opportunity_setting')
                        <a style="margin-top:4px;"
                        data-plugin="tippy" title="@lang('sales.new_lead_qualification')"
                        data-tippy-placement="top-start" 
                
                        data-toggle="modal"
                        data-target="#add_qualification" 
                        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>
                
                    @endcan 
            
                </div>     
        </div>


        
        
            
        <div class="form-group ">


            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.way_of_communications')</lable>

        <div class="d-flex justify-content-between">

            
            <div style="flex:4">
      
                <select  class="form-control  select_communication_id select2 " name="edit_communication_id_{{ $opportunity->id }}"
                        data-toggle="select2" data-placeholder="@lang('sales.way_of_communications')" required>
        
                    <option value="" ></option>
                        @forelse($lead_communications as $communication)
                    <option @if(old("edit_communication_id_{$opportunity->id}",$opportunity->communication_id) == $communication->id) selected @endif value="{{ $communication->id}}">{{ $communication->{'name_'.app()->getLocale()} }}</option>
                    @empty
        
                    @endforelse
                
                </select>
             </div>
             @can('manage_opportunity_setting')
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


        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.priority')</lable>

    <div class="d-flex justify-content-between">

        
        <div style="flex:4">
  
            <select  class="form-control select2 select_priority_id" name="edit_priority_id_{{ $opportunity->id }}" data-placeholder="@lang('sales.priority')"
                data-toggle="select2" required>
            <option name="edit__{{ $opportunity->id }}" ></option>
    
            @forelse($lead_priorities as $priority)
            <option @if(old("edit_priority_id_{$opportunity->id}",$opportunity->priority_id) == $priority->id) selected @endif value="{{ $priority->id}}">{{ $priority->{'name_'.app()->getLocale()} }}</option>
            @empty

            @endforelse
        
        </select>
         </div>
         @can('manage_opportunity_setting')
        <a style="margin-top:4px;"
                data-plugin="tippy"
                title="@lang('sales.new_lead_priority')"
                data-tippy-placement="top-start" 

                data-toggle="modal"
                data-target="#add_priority" 
              ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

        @endcan 
    
        </div>     
</div>





        
                
    <div class="form-group ">


        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_type')</lable>

    <div class="d-flex justify-content-between">

    
    <div style="flex:4">

        <select  class="form-control select_property_id select2 " name="edit_property_id_{{ $opportunity->id }}"
            data-toggle="select2" data-placeholder="@lang('sales.property_type')" required>
            <option value=""></option>

            @forelse($lead_properties as $property)
            <option @if(old("edit_property_id_{$opportunity->id}",$opportunity->property_id) == $property->id) selected @endif value="{{ $property->id}}">{{ $property->{'name_'.app()->getLocale()} }}</option>
            @empty

            @endforelse
        
        </select>
     </div>
        @can('manage_opportunity_setting')
        <a style="margin-top:4px;"
        data-plugin="tippy" title="@lang('sales.new_opportunity_property')"
        data-tippy-placement="top-start" 

        data-toggle="modal"
        data-target="#add_property" 
        ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i>
        </a>
        @endcan

    </div>     
</div>






<div class="form-group">

    <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
    <div style="flex:2;">
        <select required onchange="getCommunitites('edit',{{ $opportunity->id }})" class="form-control select2 city-in-edit-{{ $opportunity->id }}" name="edit_city_id_{{ $opportunity->id }}"
         data-toggle="select2" data-placeholder="@lang('listing.city')">
                <option value=""></option>
            
            @foreach($cities as $city)
                <option @if(old('edit_city_id_'.$opportunity->id,$opportunity->city_id) == $city->id  ) selected @endif value="{{ $city->id }}">
                    {{ $city->{'name_'.app()->getLocale()} }}
                </option>
            @endforeach

        </select>
  
    </div>
</div>



<div class="form-group">

<label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') <span class="text-danger">*</span></label>
<div style="flex:2;">
    <select required onchange="getSubCommunities('edit',{{ $opportunity->id }})" class="form-control select2 community-in-edit-{{ $opportunity->id }}" name="edit_community_{{ $opportunity->id }}"
     data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
     <option value=""></option>
     @foreach($communities->where('city_id',$opportunity->city_id) as $community)
     <option class="edit-appended-communities-{{ $opportunity->id }}"
        @if(old('edit_community_'.$opportunity->id,$opportunity->community) == $community->id)  
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
    <select class="form-control select2 sub-community-in-edit-{{ $opportunity->id }}" name="edit_sub_community_{{ $opportunity->id }}"
     data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
     <option value=""></option>

     @foreach($sub_communities->where('community_id',$opportunity->community) as $sub_community)
     <option class="edit-appended-sub-communities-{{ $opportunity->id }}"
     @if(old('edit_sub_community_id_'.$opportunity->id,$opportunity->sub_community) == $sub_community->id)  
     selected  
     @endif
     value="{{ $sub_community->id }}">

    {{ $sub_community->{'name_'.app()->getLocale()}  }}
 </option>
 @endforeach

        
    </select>

</div>
</div>







  

    </div>


</div>





<button type="button" class=" btn btn-primary mb-3" onclick="toggle_lead_({{ $opportunity->id }})">@lang('sales.more') <i class="fe-eye"></i></button>

<div class="row toggled_lead_{{ $opportunity->id }} d-none">
    
    
        
    
            
    
     
    
    <div class="col-md-4">


        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.partnername')</lable>

            <input type="text" class="form-control"  name="edit_partner_name_{{ $opportunity->id }}"  value="{{ old("edit_partner_name_{$opportunity->id}",$opportunity->partner_name) }}" placeholder="@lang('sales.partnername')" >
        </div>



        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.company')</lable>

            <input type="text" class="form-control"  name="edit_company_{{ $opportunity->id }}"   value="{{ old("edit_company_{$opportunity->id}",$opportunity->company) }}"  placeholder="@lang('sales.company')">
        </div>



        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.website')</lable>

            <input type="text" pattern="/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/" class="form-control"  name="edit_website_{{ $opportunity->id }}" value="{{ old("edit_website_{$opportunity->id}",$opportunity->website) }}"  placeholder="@lang('sales.website')">
        </div>







        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.po_box')</lable>

            <input type="text" class="form-control" placeholder="@lang('sales.po_box')" value="{{ old("edit_po_box_{$opportunity->id}",$opportunity->po_box) }}" name="edit_po_box_{{ $opportunity->id }}" >
        </div>


    

        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport')</lable>

            <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"  name="edit_passport_{{ $opportunity->id }}"  value="{{ old("edit_passport_{$opportunity->id}",$opportunity->passport) }}" placeholder="@lang('sales.passport')">
        </div>



        <div class="form-group ">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.passport_expiration_date')</lable>

            <input type="text" name="edit_passport_expiration_date_{{ $opportunity->id }}" value="{{ old("edit_passport_expiration_date_{$opportunity->id}",$opportunity->passport_expiration_date) }}"    class="form-control basic-datepicker" placeholder="@lang('sales.passport_expiration_date')">
        </div>








    
    
    
        <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.date_of_birth')</lable>

            <input type="text" name="edit_date_of_birth_{{ $opportunity->id }}" value="{{ old("edit_date_of_birth_{$opportunity->id}",$opportunity->date_of_birth) }}" class="form-control basic-datepicker" placeholder="@lang('sales.date_of_birth')">
        </div>
    

    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.fax')</lable>

           
           <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.fax')" type="text" class="form-control" name="edit_fax_{{ $opportunity->id }}"   value="{{ old("edit_fax_{$opportunity->id}",$opportunity->fax) }}" placeholder="{{trans('sales.fax')}}"  >
           
        </div>
    
    
    </div>



    <div class="col-md-4">



    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.email3')</lable>

            <input type="email" class="form-control"  name="edit_email3_{{ $opportunity->id }}"  value="{{ old("edit_email3_{$opportunity->id}",$opportunity->email3) }}" placeholder="@lang('sales.email3')" >
        </div>
    
  
    
    
        
        <div class="form-group">
                 
        <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone3')</lable>

         <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone3')" type="text" class="form-control" name="edit_phone3_{{ $opportunity->id }}"    value="{{ old("edit_phone3_{$opportunity->id}",$opportunity->phone3) }}" placeholder="@lang('sales.phone3')" >
        </div>
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.phone4')</lable>
            
          <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.phone4')" type="text" class="form-control" name="edit_phone4_{{ $opportunity->id }}"   value="{{ old("edit_phone4_{$opportunity->id}",$opportunity->phone4) }}" placeholder="@lang('sales.phone4')"  >
        </div>
    
    
        
        <div class="form-group"> 

          <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.landline')</lable>
  
              
          <input data-plugin="tippy" pattern="/^([0-9\s\-\+\(\)]*)$/" data-tippy-placement="top-start" title="@lang('sales.landline')" type="text" class="form-control" name="edit_landline_{{ $opportunity->id }}"   value="{{ old("edit_landline_{$opportunity->id}",$opportunity->landline) }}" placeholder="@lang('sales.landline')">
           
          
        </div>


    
    </div>


    
    
    <div class="col-md-4">
           
         
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.developer')</lable>

            <input type="text" class="form-control"  name="edit_developer_{{ $opportunity->id }}"  value="{{ old("edit_developer_{$opportunity->id}",$opportunity->developer) }}" placeholder="@lang('sales.developer')" >
        </div>
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.community')</lable>

            <input type="text" class="form-control"  name="edit_community_{{ $opportunity->id }}"  value="{{ old("edit_community_{$opportunity->id}",$opportunity->community) }}" placeholder="@lang('sales.community')" >
        </div>
    
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.buliding_name')</lable>

            <input type="text" class="form-control"  name="edit_building_name_{{ $opportunity->id }}"  value="{{ old("edit_building_name_{$opportunity->id}",$opportunity->building_name) }}" placeholder="@lang('sales.buliding_name')" >
        </div>
    
    
        <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.address')</lable>

            <input type="text" class="form-control"  name="edit_address_{{ $opportunity->id }}"  value="{{ old("edit_address_{$opportunity->id}",$opportunity->address) }}" placeholder="@lang('sales.address')" >
        </div>
    

    
        <div class="form-group d-flex  ">
    
            <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
            <div style="flex:4">
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="inlineRadio1_{{ $opportunity->id }}" value="rent" name="edit_property_purpose_{{ $opportunity->id }}" @if($opportunity->property_purpose == 'rent') checked @endif>
                    <label for="inlineRadio1"> @lang('sales.rent') </label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="inlineRadio2_{{ $opportunity->id }}" value="buy" name="edit_property_purpose_{{ $opportunity->id }}" @if($opportunity->property_purpose == 'buy') checked @endif>
                    <label for="inlineRadio2"> @lang('sales.buy') </label>
                </div>
             </div>
    
        </div>
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_no')</lable>

            <input type="text" class="form-control"   name="edit_property_no_{{ $opportunity->id }}" id="property_no_{{ $opportunity->id }}" value="{{ old("edit_property_no_{$opportunity->id}",$opportunity->property_no) }}" placeholder="@lang('sales.property_no')" >
        </div>
 
        
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_reference')</lable>

            <input type="text" class="form-control"  name="edit_property_reference_{{ $opportunity->id }}" value="{{ old("edit_property_reference_{$opportunity->id}",$opportunity->property_reference) }}" placeholder="@lang('sales.property_reference')" >
        </div>
    
    
    
          
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_size_sqft')</lable>

            <input type="text" class="form-control" pattern="/^([0-9\s\-\+\(\)]*)$/"   name="edit_size_sqft_{{ $opportunity->id }}"  value="{{ old("edit_size_sqft_{$opportunity->id}",$opportunity->size_sqft) }}" placeholder="@lang('sales.property_size_sqft')" >
        </div>
    
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.property_size_sqm')</lable>

            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_size_sqm_{{ $opportunity->id }}"  value="{{ old("edit_size_sqm_{$opportunity->id}",$opportunity->size_sqm) }}" placeholder="@lang('sales.property_size_sqm')" >
        </div>
        <div class="d-flex justify-content-between">

        <div class="form-group pr-2">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.bedrooms')</lable>

            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_bedrooms_{{ $opportunity->id }}"  value="{{ old("edit_bedrooms_{$opportunity->id}",$opportunity->bedrooms) }}" placeholder="@lang('sales.bedrooms')" >
        </div>
    
    
        <div class="form-group pr-2">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.bathrooms')</lable>


            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_bathrooms_{{ $opportunity->id }}" value="{{ old("edit_bathrooms_{$opportunity->id}",$opportunity->bathrooms) }}" placeholder="@lang('sales.bathrooms')" >
        </div>
        <div class="form-group">

            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.parkings')</lable>

            <input type="text" class="form-control"  pattern="/^([0-9\s\-\+\(\)]*)$/" name="edit_parkings_{{ $opportunity->id }}" id="parkings_{{ $opportunity->id }}" value="{{ old("edit_parkings_{$opportunity->id}",$opportunity->parkings) }}" placeholder="@lang('sales.parkings')" >
        </div>
    
         </div>
    
     
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.other')</lable>

            <input type="text" class="form-control"  name="edit_other_{{ $opportunity->id }}"  value="{{ old("edit_other_{$opportunity->id}",$opportunity->other) }}" placeholder="@lang('sales.other')" >
        </div>
    
    
       
    
        <div class="form-group">
            <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.skype')</lable>

            <input type="email" class="form-control"  value="{{ old("edit_skype_{$opportunity->id}",$opportunity->skype) }}" name="edit_skype_{{ $opportunity->id }}" placeholder="@lang('sales.skype')">
        </div>
    
   
    
    
    
    
    
    
    
    </div>



</div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
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
       var opportunity_id = @json($opportunity->id);
   $("#range_"+opportunity_id).ionRangeSlider({
        skin: "round",
        min: 10,
        max: 100,
        from: '{{ $opportunity->probability_of_winning }}',
        onStart: function (data) {
            // fired then range slider is ready
            $('.opportunity_probability_of_winning_'+opportunity_id).val(data.from)

        },
        onChange: function (data) {
            // fired on every range slider update
        },
        onFinish: function (data) {
            // console.log(data.from)

            $('.opportunity_probability_of_winning_'+opportunity_id).val(data.from)
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