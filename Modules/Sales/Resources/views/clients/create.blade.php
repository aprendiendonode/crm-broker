<form  action="{{ url('sales/manage_clients') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
<div class="row">
        @csrf

        @if($agency)
        <input type="hidden" name="agency_id" value="{{ $agency }}">
        @endif
        @if($business)
        <input type="hidden" name="business_id" value="{{ $business }}">
        @endif

    <div class="col-md-4">

            
        <div class="form-group d-flex justify-content-between">

           
           
            @can('manage_client_setting')
                <a 
                style="margin-top:4px;"
                   data-plugin="tippy" title="@lang('sales.new_client_source')"
                    data-tippy-placement="top-start" 

                    data-toggle="modal"
                    data-target="#add_source" 
               ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i>
               </a>

            @endcan   
              <div style="flex:4">
                
                    <select  style="" class="form-control select_souce_id select2" name="source_id" data-toggle="select2" data-placeholder="@lang('sales.client_sources')" required>
                        <option value="" class="font-weight-medium text-muted"></option>
                    @forelse($client_sources as $source)
                        <option @if(old('source_id') == $source->id) selected @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
                    @empty

                    @endforelse

                    </select>
              </div>
         
           
    
        </div>


                
        <div class="form-group d-flex justify-content-between">

            @can('manage_client_setting')
            <a style="margin-top:4px;"
            data-plugin="tippy" title="@lang('sales.new_client_type')"
            data-tippy-placement="top-start" 

            data-toggle="modal"
            data-target="#add_type" 
                ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

           @endcan     
            <div style="flex:4">

            <select  class="form-control select2 select_type_id" name="type_id"
                    data-toggle="select2" data-placeholder="@lang('sales.client_types')" required>
                    <option value=""></option>

                    @forelse($client_types as $type)
                    <option @if(old('type_id') == $type->id) selected @endif value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                    @empty
    
                    @endforelse
              
            </select>
            </div>
        </div>


      


        <div class="form-group d-flex justify-content-between">
            @can('manage_client_setting')
            <a style="margin-top:4px;"
            data-plugin="tippy" title="@lang('sales.new_client_qualification')"
            data-tippy-placement="top-start" 

            data-toggle="modal"
            data-target="#add_qualification" 
               ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>


            @endcan   
            <div style="flex:4">

            <select  class="form-control select2 select_qualification_id" name="qualification_id" data-toggle="select2" data-placeholder="@lang('sales.client_qualifications')" required >
        
                    <option value=""></option>
                    @forelse($client_qualifications as $ql)
                    <option @if(old('qualification_id') == $ql->id) selected @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                    @empty

                    @endforelse
              
            </select>

            </div>
        </div>

        


             
        <div class="form-group d-flex justify-content-between" >
            @can('manage_client_setting')
            <a style="margin-top:4px;" 
            
            data-plugin="tippy" title="@lang('sales.new_client_communication')"
            data-tippy-placement="top-start" 

            data-toggle="modal"
            data-target="#add_communication" 
             ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

             @endcan
            <div style="flex:4">

            <select  class="form-control  select_communication_id select2 " name="communication_id"
                    data-toggle="select2" data-placeholder="@lang('sales.way_of_communications')" required>

                <option name="" ></option>
                     @forelse($client_communications as $communication)
                <option @if(old('communication_id') == $communication->id) selected @endif value="{{ $communication->id}}">{{ $communication->{'name_'.app()->getLocale()} }}</option>
                @empty

                @endforelse
              
            </select>

            </div>
        </div>


        <div class="form-group d-flex justify-content-between">
            @can('manage_client_setting')
            <a style="margin-top:4px;"
                    data-plugin="tippy"
                    title="@lang('sales.new_client_priority')"
                    data-tippy-placement="top-start" 

                    data-toggle="modal"
                    data-target="#add_priority" 
                  ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

            @endcan      
            <div style="flex:4">

                <select  class="form-control select2 select_priority_id" name="priority_id" data-placeholder="@lang('sales.priority')"
                        data-toggle="select2" required>
                    <option name="" ></option>
            
                    @forelse($client_priorities as $priority)
                    <option @if(old('priority_id') == $priority->id) selected @endif value="{{ $priority->id}}">{{ $priority->{'name_'.app()->getLocale()} }}</option>
                    @empty

                    @endforelse
                
                </select>
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control"  name="company"   value="{{ old('company') }}"  placeholder="@lang('sales.company')">
        </div>



        <div class="form-group">
            <input type="text" pattern="/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/" class="form-control"  name="website" value="{{ old('website') }}" id="website" placeholder="@lang('sales.website')">
        </div>



{{--         
        
   

        <div class="form-group mb-3">
            <input type="text" name="contact_date"  class="form-control basic-datepicker" placeholder="@lang('sales.contact_date')">
        </div>


        
        <div class="form-group mb-3">
            <input type="text" name="next_action_date" class="form-control basic-datepicker" placeholder="@lang('sales.next_action_date')">
        </div>

 --}}



        <div class="form form-group">
            


            <div class="note">

                <textarea id="note" name="note" placeholder="@lang('sales.note')">{{old('note')}}</textarea>
            </div>    


        </div>






        <div class="form-group">
            <input type="text" class="form-control" placeholder="@lang('sales.po_box')" value="{{ old('po_box') }}" name="po_box" >
        </div>


    

        <div class="form-group">
            <input type="text" class="form-control"   name="passport"  value="{{ old('passport') }}" placeholder="@lang('sales.passport')">
        </div>



        <div class="form-group ">
            <input type="text" name="passport_expiration_date" value="{{ old('passport_expiration_date') }}"    class="form-control basic-datepicker" placeholder="@lang('sales.passport_expiration_date')">
        </div>



    
    </div>



    

        

 

<div class="col-md-4">
    <div class="form-group" style="margin-bottom:32px">
    <div class="radio radio-info form-check-inline">
        <input type="radio" id="salutationRadio1" value="Mr" name="salutation" checked>
        <label for="salutationRadio1"> @lang('sales.Mr') </label>
    </div>


    <div class="radio radio-info form-check-inline">
        <input type="radio" id="salutationRadio2" value="Mrs" name="salutation" >
        <label for="salutationRadio2"> @lang('sales.Mrs') </label>
    </div>
    <div class="radio radio-info form-check-inline">
        <input type="radio" id="salutationRadio3" value="Miss" name="salutation" >
        <label for="salutationRadio3"> @lang('sales.Miss') </label>
    </div>
    <div class="radio radio-info form-check-inline">
        <input type="radio" id="salutationRadio4" value="Ms" name="salutation" >
        <label for="salutationRadio4"> @lang('sales.Ms') </label>
    </div>
        </div>
    <div class="form-group">

    
            <input type="text" class="form-control"  name="first_name" required  value="{{ old('first_name') }}" placeholder="@lang('sales.firstname')" >

            {{-- <input type="text" class="form-control" value="ZAHRA SABEEL MOHAMED ALBLOUSHI" name="client_name" required="" data-parsley-id="13"> --}}

    </div>
    <div class="form-group">
        <input type="text" class="form-control"  name="sec_name"  value="{{ old('sec_name') }}" placeholder="@lang('sales.secondname')" >
    </div>

    <div class="form-group">
        <input type="text" class="form-control"  name="full_name"  value="{{ old('full_name') }}" placeholder="@lang('sales.fullname')" >
    </div>
    <div class="form-group">
        <input type="text" class="form-control"  name="partner_name"  value="{{ old('partner_name') }}" placeholder="@lang('sales.partnername')" >
    </div>



    <div class="form-group">
        <input type="text" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control basic-datepicker" placeholder="@lang('sales.date_of_birth')">
    </div>




    <div class="form-group">
        <input type="email" class="form-control"  name="email1"  value="{{ old('email1') }}" placeholder="@lang('sales.email')">
    </div>




    <div class="form-group">
        <input type="email" class="form-control"  name="email2" value="{{ old('email2') }}" placeholder="@lang('sales.email2')" >
    </div>


    <div class="form-group">
        <input type="email" class="form-control"  name="email3"  value="{{ old('email3') }}" placeholder="@lang('sales.email3')" >
    </div>

    
    <div class="form-group">
        <select required onchange="toggleCountryData()" id="nationality_id" class="form-control select2 " name="nationality_id"
                data-toggle="select2" data-placeholder="@lang('sales.nationality')">
            <option value=""></option>
            @foreach($countries as $nationality)
                <option class="nationality_{{$nationality->id}}" value="{{$nationality->id}}" {{ old('nationality_id') == $nationality->id ? 'selected' : ''}}>{{ $nationality->nationality .' '. $nationality->phone_code  }}</option>
            @endforeach

        </select>
    </div>


    <div class="form-group">
        <select required  id="country" class="form-control select2 " name="country"
                data-toggle="select2" data-placeholder="@lang('sales.country')">
            <option value=""></option>
            @foreach($countries as $country)
                <option value="{{$country->value}}" {{ old('country') == $country->value ? 'selected' : ''}}>{{ $country->value }}</option>
            @endforeach

        </select>
    </div>


    <input type="hidden" class="country_code" name="country_code"  >
    <input type="hidden" class="timezone"     name="timezone"      >
    <input type="hidden" class="country_flag" name="country_flag"  >



    
    <div class="form-group">       
            <div class="" >
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.phone1')" type="text" class="form-control" name="phone1"   value="{{ old('phone1') }}" placeholder="@lang('sales.phone1')" required>
            </div>
    </div>


    <div class="form-group">
                  
            <div class="" >
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.phone2')" type="text" class="form-control" name="phone2"   value="{{ old('phone2') }}" placeholder="@lang('sales.phone2')"  >
            </div>
    </div>



    
    <div class="form-group">
             
          
            <div class="" >
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.phone3')" type="text" class="form-control" name="phone3"   value="{{ old('phone3') }}" placeholder="@lang('sales.phone3')" >
            </div>
    </div>



    <div class="form-group">
                  
            <div class="" >
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.phone4')" type="text" class="form-control" name="phone4"   value="{{ old('phone4') }}" placeholder="@lang('sales.phone4')"  >
            </div>
    </div>


    
    <div class="form-group"> 
            <div class="">
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.landline')" type="text" class="form-control" name="landline"   value="{{ old('landline') }}" placeholder="@lang('sales.landline')">
            </div>
      
    </div>

    {{-- <div class="form-group">
       
            <div class="" >
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.zip')" type="text" class="form-control" name="zip"   value="{{ old('zip') }}"  placeholder="@lang('sales.zip')"  >
            </div>
       
    </div> --}}

    <div class="form-group">
       
            <div class="" >
                <input data-plugin="tippy"  data-tippy-placement="top-start" title="@lang('sales.fax')" type="text" class="form-control" name="fax"   value="{{ old('fax') }}"  placeholder="@lang('sales.fax')"  >
            </div>
       
    </div>


</div>


<div class="col-md-4">
       
     
    <div class="form-group">
        
        <input type="text" class="form-control"  name="developer"  value="{{ old('developer') }}" placeholder="@lang('sales.developer')" >
    </div>



    <div class="form-group">
        <input type="text" class="form-control"  name="community"  value="{{ old('community') }}" placeholder="@lang('sales.community')" >
    </div>



    <div class="form-group">
        <input type="text" class="form-control"  name="building_name"  value="{{ old('building_name') }}" placeholder="@lang('sales.buliding_name')" >
    </div>


    <div class="form-group">
        <input type="text" class="form-control"  name="address"  value="{{ old('address') }}" placeholder="@lang('sales.address')" >
    </div>






     





    <div class="form-group d-flex  ">

        <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
        <div style="flex:4">
            <div class="radio radio-info form-check-inline">
                <input type="radio" id="inlineRadio1" value="rent" name="property_purpose" checked>
                <label for="inlineRadio1"> @lang('sales.rent') </label>
            </div>
            <div class="radio radio-info form-check-inline">
                <input type="radio" id="inlineRadio2" value="buy" name="property_purpose">
                <label for="inlineRadio2"> @lang('sales.buy') </label>
            </div>
         </div>

    </div>

    <div class="form-group">
        <input type="text" class="form-control"   name="property_no" id="property_no" value="{{ old('property_no') }}" placeholder="@lang('sales.property_no')" >
    </div>

    
                 
    <div class="form-group d-flex justify-content-between">
        @can('manage_client_setting')
        <a style="margin-top:4px;"
        data-plugin="tippy" title="@lang('sales.new_client_property')"
        data-tippy-placement="top-start" 

        data-toggle="modal"
        data-target="#add_property" 
           ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

        @endcan   
           <div style="flex:4">

                <select  class="form-control select_property_id select2 " name="property_id"
                        data-toggle="select2" data-placeholder="@lang('sales.property_type')" required>
                        <option value=""></option>

                        @forelse($client_properties as $property)
                        <option @if(old('property_id') == $property->id) selected @endif value="{{ $property->id}}">{{ $property->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                
                </select>
            </div>     
    </div>


    
    <div class="form-group">
        <input type="text" class="form-control"  name="property_reference" value="{{ old('property_reference') }}" placeholder="@lang('sales.property_reference')" >
    </div>



      
    <div class="form-group">
        <input type="text" class="form-control"    name="size_sqft"  value="{{ old('size_sqft') }}" placeholder="@lang('sales.property_size_sqft')" >
    </div>


    <div class="form-group">
        <input type="text" class="form-control"   name="size_sqm"  value="{{ old('size_sqm') }}" placeholder="@lang('sales.property_size_sqm')" >
    </div>
    <div class="d-flex justify-content-between">
    <div class="form-group pr-2">
        <input type="text" class="form-control"   name="bedrooms"  value="{{ old('bedrooms') }}" placeholder="@lang('sales.bedrooms')" >
    </div>


    <div class="form-group pr-2">
        <input type="text" class="form-control"   name="bathrooms" value="{{ old('bathrooms') }}" placeholder="@lang('sales.bathrooms')" >
    </div>
    <div class="form-group">
        <input type="text" class="form-control"   name="parkings" id="parkings" value="{{ old('parkings') }}" placeholder="@lang('sales.parkings')" >
    </div>

     </div>

 
    <div class="form-group">
        <input type="text" class="form-control"  name="other"  value="{{ old('other') }}" placeholder="@lang('sales.other')" >
    </div>


   

    <div class="form-group">
        <input type="email" class="form-control"  value="{{ old('skype') }}" name="skype" placeholder="@lang('sales.skype')">
    </div>





    @can('assign_client_to_staff')
    


         
        <div class="form-group">

             <label for="" class="font-weight-medium text-muted">@lang('sales.assign_staff')</label>


            <div class="radio radio-single">
                <input type="radio" onchange="hide_create_custom()" id="singleRadio1" value="all" name="assigned" aria-label="Single radio One">
                <label for="singleRadio1">@lang('sales.everyone')</label>
            </div>
            <div class="radio radio-success radio-single mb-3 mt-3">
                <input type="radio" onchange="show_create_custom()" id="singleRadio2" value="custom" name="assigned" checked aria-label="Single radio Two">
                <label for="singleRadio2">@lang('sales.custom')</label>
            </div>

    
            <div class="form-group custom-create-staff">
                <h4 class="header-title">@lang('sales.select_staff')</h4>
                @forelse($staffs as $employee)

                
                    <div class="checkbox checkbox-primary mb-2">
                        <input  id="checkbox_{{ $employee->id }}" value="{{ $employee->id }}" type="checkbox" name="assigned_to[]">
                        <label for="checkbox_{{ $employee->id }}">
                            {{ $employee->{'name_'.app()->getLocale()} }}
                        </label>
                    </div>
          
                @empty

                @endforelse

             
             
            </div>
       
         

         
             
        
        </div>


    @endif







</div>
</div>

<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn  btn-outline-success waves-effect waves-light">
       @lang('sales.cancel')
    </button>
    <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.submit')
    </button>
</div>

</form>


@push('js')

<script>

    function hide_create_custom(){
            $('.custom-create-staff').addClass('d-none');
    }

        function show_create_custom(id){
            $('.custom-create-staff').removeClass('d-none');
            
        }
</script>

@endpush