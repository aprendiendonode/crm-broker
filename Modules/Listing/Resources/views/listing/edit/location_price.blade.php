<div class="col-md-4">
    <h4 class="mb-3">@lang('listing.location_price')</h4>
        <div class="form-group">
            <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.type')<span class="text-danger"> *</span></label>
            <div style="flex:2;">
                <select class="form-control select2 listing_type_{{ $listing->id }}" onchange="editShowFurnishedQuestion({{ $listing->id }});"   name="edit_type_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.listing_types')" required>
                    <option value=""></option>
                        <optgroup label="@lang('listing.residential')">
                            @foreach($listing_types->where('type','residential') as $type)
                            <option 
                            data-furnished="{{ $type->furnished_question }}"
                            @if(old('edit_type_id_'.$listing->id,$listing->type_id) == $type->id) selected @endif
                            value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                            @endforeach

                        </optgroup>
                        <optgroup label="@lang('listing.commercial')">
                            @foreach($listing_types->where('type','commercial') as $type)
                            <option
                            @if(old('edit_type_id_'.$listing->id,$listing->type_id) == $type->id) selected @endif
                             value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                            @endforeach

                        </optgroup>
        
                </select>
            </div>
        </div>
        <div class="form-group d-flex align-items-center" style="height: 64px;">
            <label class="font-weight-medium text-muted mr-3">@lang('listing.purpose')<span class="text-danger">*</span></label>
            <div style="display:flex;">
                <div class="radio mr-3">
                    <input type="radio" name="edit_purpose_{{ $listing->id }}" id="radio1_{{ $listing->id }}" value="rent"
                     @if(old('edit_purpose_'.$listing->id,$listing->purpose)  ) checked @endif class="rent-radio-{{ $listing->id }}" onchange="editShowRentDiv({{ $listing->id }})">
                    <label for="radio1_{{ $listing->id }}">
                        @lang('listing.rent')
                    </label>
                </div>
                <div class="radio">
                    <input type="radio" name="edit_purpose_{{ $listing->id }}" id="radio2_{{ $listing->id }}" class="rent-radio-{{ $listing->id }}" value="sale" @if(old('edit_purpose_'.$listing->id,$listing->purpose) == 'sale' ) checked @endif onchange="editShowRentDiv({{ $listing->id }})">
                    <label for="radio2_{{ $listing->id }}">
                        @lang('listing.sale')
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group" >

                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.location')</label>
                <div class="d-flex align-items-center" style="flex:2">
                    <input type="text" class="form-control" name="edit_location_{{ $listing->id }}" id="location_input_{{ $listing->id }}"  
                    value="{{ old('edit_location_'.$listing->id,$listing->location) }}" 
                     placeholder="">
                    <div class="text-center pl-1">
                        <i class="fas fa-map-marker-alt" style="font-size:1.2rem"  data-toggle="modal" data-target="#map-modal-{{ $listing->id }}"></i>
                    </div>
                </div>
         </div>


        <div class="form-group" >
            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.city')</label>
            <div class="d-flex align-items-center" style="flex:2">
                <input type="text" class="form-control" name="edit_city_{{ $listing->id }}" id="city_{{ $listing->id }}"  
                value="{{ old('edit_city_'.$listing->id,$listing->city) }}" 
                required
                 placeholder="">
      
            </div>
        </div>


        <div class="form-group" >
            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.community')</label>
            <div class="d-flex align-items-center" style="flex:2">
                <input type="text" class="form-control" name="edit_community_{{ $listing->id }}" id="community_{{ $listing->id }}"
                  value="{{ old('edit_community_'.$listing->id,$listing->community) }}" 
                required placeholder="">
       
            </div>
        </div>


        
        <div class="form-group">
            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.unit')</label>
            <div class="d-flex" style="flex:2">
                <input type="text" class="form-control mr-2"
                placeholder="@lang('listing.unit')"
                 name="edit_unit_no_{{ $listing->id }}" data-plugin="tippy" data-tippy-placement="top-start" 
                title="@lang('listing.unit')" id="unit_{{ $listing->id }}"  value="{{ old('edit_unit_no_'.$listing->id,$listing->unit_no) }}">
                <input type="text" class="form-control mr-2"
                 data-plugin="tippy" data-tippy-placement="top-start" title="@lang('listing.plot')" placeholder="@lang('listing.plot')"
                 name="edit_plot_no_{{ $listing->id }}" id="plot_{{ $listing->id }}"  value="{{ old('edit_plot_no_'.$listing->id,$listing->plot_no) }}">
                <input type="text" data-plugin="tippy" 
                placeholder="@lang('street')"
                data-tippy-placement="top-start" title="@lang('listing.street')" class="form-control"
                 name="edit_street_no_{{ $listing->id }}" id="street_{{ $listing->id }}"  value="{{ old('edit_street_no_'.$listing->id,$listing->street_no) }}">
            </div>
        </div>
        <div class="form-group">

            <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.views')<span class="text-danger"> *</span></label>
            <div style="flex:2;">
                <select class="form-control select2" multiple="multiple" name="edit_view_ids_{{ $listing->id }}[]"
                 data-toggle="select2" data-placeholder="@lang('listing.views')">
                        <option value=""></option>
               
                    @foreach($listing_views as $view)
                        <option @if(old('edit_view_ids_'.$listing->id,$listing->view_ids) && in_array($view->id,old('edit_view_ids_'.$listing->id,$listing->view_ids))  ) selected @endif value="{{ $view->id }}">
                            {{ $view->{'name_'.app()->getLocale()} }}
                        </option>
                    @endforeach

                </select>
          
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent')<span class="text-danger"> *</span></label>
            <div class="input-group mb-2" >
                <input type="text"  value="{{ old('edit_price_'.$listing->id,$listing->price) }}" class="form-control decimal_convert" 
                       name="edit_price_{{ $listing->id }}" id="rent_{{ $listing->id }}" required>
            
            </div>
        </div>
        <div class="form-group">

            {{-- rent paid every month,week,day,year --}}
            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent_frequency')</label>
            <div class="d-flex" style="flex:2">
                <select name="edit_rent_frequency_{{ $listing->id }}" class="form-control select2" 
                   name="edit_Frequency_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.rent_frequency')">
                    <option value=""></option>
                    <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'yearly') selected @endif value="yearly">
                        @lang('listing.yearly')
                    </option>
                    <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'monthly') selected @endif value="monthly">
                        @lang('listing.monthly')
                    </option>
                    <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'weekly') selected @endif value="weekly">
                        @lang('listing.weekly')
                    </option>
                    <option @if(old('edit_rent_frequency_'.$listing->id,$listing->rent_frequency) == 'daily') selected @endif value="daily">
                        @lang('listing.daily')
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.annual_commission')</label>
            <div style="flex:2">
                <div class="d-flex">
                    <div class="input-group mb-2 mr-sm-2" >
                        <input
                        name ="edit_comission_percent_{{ $listing->id }}"
                        value="{{ old('edit_comission_percent_'.$listing->id,$listing->comission_percent) }}"
                         type="text" class="form-control" 
                         id="inlineFormInputGroupUsername1_{{ $listing->id }}"
                         data-tippy-placement="top-start" title=""
                         >
                        <div class="input-group-prepend">
                            <div class="input-group-text">%</div>
                        </div>
                    </div>
                    <div class="input-group mb-2" >
                        <input
                        name="edit_comission_value_{{ $listing->id }}"
                        value="{{ old('edit_comission_value_'.$listing->id,$listing->comission_value) }}"
                         type="text" class="form-control"
                          id="inlineFormInputGroupUsername2_{{ $listing->id }}"
                           data-tippy-placement="top-start"
                            title=""
                            >
                        <div class="input-group-prepend">
                            <div class="input-group-text">AED</div>
                        </div>
                    </div>
                    
                </div>
                <div>
                    <div class="checkbox checkbox-primary mb-2">
                        <input type="hidden" name="edit_never_lived_in_{{ $listing->id }}" value="no">
                        <input 
                        @if(old('edit_never_lived_in_'.$listing->id,$listing->never_lived_in) == 'yes') checked @endif
                        id="neverLivedIn_{{ $listing->id }}"  type="checkbox" name="edit_never_lived_in_{{ $listing->id }}" value="yes">
                        <label for="neverLivedIn_{{ $listing->id }}">
                           @lang('listing.never_lived_in') 
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary mb-2">
                        <input  value="no" type="hidden" name="edit_featured_on_company_website_{{ $listing->id }}">
                        <input
                        value='yes'
                        @if(old('edit_featured_on_company_website_'.$listing->id,$listing->featured_on_company_website) == 'yes') checked @endif
                         id="featuredOnCompanywebsite_{{ $listing->id }}" type="checkbox" name="edit_featured_on_company_website_{{ $listing->id }}">
                        <label for="featuredOnCompanywebsite_{{ $listing->id }}">
                            @lang('listing.featured_on_company_website')
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary mb-2">
                        <input  type="hidden" name="edit_exclusive_rights_{{ $listing->id }}" value="no"> 
                        <input id="exclusiveRights_{{ $listing->id }}" name="edit_exclusive_rights_{{ $listing->id }}" type="checkbox" 
                        @if(old('edit_exclusive_rights_'.$listing->id,$listing->exclusive_rights) == 'yes') checked @endif
                         value="yes"
                         >
                        <label for="exclusiveRights_{{ $listing->id }}">
                           @lang('listing.exclusive_rights')
                        </label>
                    </div>
                </div>
            </div>
        </div>
        

    
</div>