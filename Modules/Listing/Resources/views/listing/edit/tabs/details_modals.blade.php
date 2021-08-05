<div class="card-box">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#details" data-toggle="tab" aria-expanded="false" class="nav-link active">
                @lang('listing.details')
            </a>
        </li>
        <li class="nav-item">
            <a href="#description" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.description')
            </a>
        </li>
        <li class="nav-item">
            <a href="#features" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.features')
            </a>
        </li>
        <li class="nav-item">
            <a href="#videos" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.video')
            </a>
        </li>

       
    </ul>


    <div class="tab-content">
        <div class="tab-pane active" id="details">
            <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal"
             data-target="#details-modal-{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">

                <table class="table table-striped table-info-summary">
                                
                    <tbody>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.ref')
                            </td>
                            <td>
                                 {{ $listing->listing_ref }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.lsm')
                            </td>
                            <td>
                                {{ $listing->lsm }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.title')
                            </td>
                            <td>
                                {{ $listing->title }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.purpose')
                            </td>
                            <td>
                                {{ $listing->purpose }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.type')
                            </td>
                            <td>
                                {{  $listing->type->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
              
                        <tr>
                          
                            <td width="200">
                                @lang('listing.beds')
                            </td>
                            <td>
                                {{  $listing->beds }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.parkings')
                            </td>
                            <td>
                                {{  $listing->parkings }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.baths')
                            </td>
                            <td>
                                {{  $listing->baths }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.baths')
                            </td>
                            <td>
                                {{  $listing->baths }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.area')
                            </td>
                            <td>
                                {{  $listing->area }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.plot_area')
                            </td>
                            <td>
                                {{  $listing->plot_area }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.landlord')
                            </td>
                            <td>
                                {{ $listing->landlord->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.source')
                            </td>
                            <td>
                                {{ $listing->source->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.rented')
                            </td>
                            <td>
                                {{ $listing->rented }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>

                        @if($listing->rented == 'yes')
                            <tr>
                            
                                <td width="200">
                                    @lang('listing.tenant')
                                </td>
                                <td>
                                    {{ $listing->tenant->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                            
                                <td width="200">
                                    @lang('listing.tenancy_contact_start_date')
                                </td>
                                <td>
                                    {{ $listing->tenancy_contact_start_date }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                            
                                <td width="200">
                                    @lang('listing.tenancy_contact_end_date')
                                </td>
                                <td>
                                    {{ $listing->tenancy_contact_end_date }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                        @endif
                        <tr>
                          
                            <td width="200">
                                @lang('listing.developer')
                            </td>
                            <td>
                                {{ $listing->developer->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.never_lived_in')
                            </td>
                            <td>
                                {{ $listing->never_lived_in }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.featured_on_company_website')
                            </td>
                            <td>
                                {{ $listing->featured_on_company_website }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
              
                        <tr>
                          
                            <td width="200">
                                @lang('listing.exclusive_rights')
                            </td>
                            <td>
                                {{ $listing->exclusive_rights }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
              
             
                  
                    </tbody>
                    
                    
                 </table>

                 
                
                
            </div>
        
        </div>


        <div class="tab-pane " id="description">
            <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal"
             data-target="#description-modal-{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
          
                <div> @lang('listing.description'): </div>
                <div> {!! $listing->description !!}</div>
            
            </div>
        
        </div>



        <div class="tab-pane " id="features">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
             data-target="#featuresModal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
          
                <div> @lang('listing.features'): </div>
                <div> {!! $listing->description !!}</div>
            
            </div>
        
        </div>



        <div class="tab-pane " id="videos">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
             data-target="#videos-modal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
          
                <div> @lang('listing.video'): </div>

                @if($listing->videos)
                    @foreach($listing->videos as $video)
                    <div> {{ ucfirst($video->title) }}</div>

                    @endforeach
                @endif    
            
            </div>
        
        </div>
    
    </div>


    <div id="details-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">


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



                    <div class="form-group form-inline" style="height: 64px;">
                        <label class="font-weight-medium text-muted mr-3">@lang('listing.lsm')</label>
                        <div style="display:flex; flex:2">
                            <div class="radio mr-3">
                                <input type="radio" name="edit_lsm_{{ $listing->id }}" id="shared_{{ $listing->id }}" value="shared"
                                 @if(old('edit_lsm_'.$listing->id,$listing->lsm) == 'shared') checked @endif>
                                <label for="shared_{{ $listing->id }}">
                                    @lang('listing.shared')
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="edit_lsm_{{ $listing->id }}" id="private_{{ $listing->id }}" value="private"
                                 @if(old('edit_lsm_'.$listing->id,$listing->lsm) == 'private') checked @endif>
                                <label for="private_{{ $listing->id }}">
                                    @lang('listing.private')
                                </label>
                            </div>
                        </div>
                </div>

                    <div class="form-group">
                        <label class="font-weight-medium text-muted" for="">@lang('listing.title')
                                     
                        </label>
                       <input type="text" class="form-control" value="{{ old('edit_title_'.$listing->id,$listing->title) }}" 
                       name="edit_title_{{ $listing->id }}" >
              
                    </div>

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

                    <div class="form-group ">
                        <div class="form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.beds')</label>
                             <select class="form-control select2" name="edit_beds_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')">
                                <option value=""></option>
                                <option @if(old('edit_beds_'.$listing->id,$listing->beds) == 'studio') selected @endif value="studio"
                                       >@lang('listing.studio')
                                </option>
                    
                                @for($i = 1;$i <= 20 ;$i++)
                                  <option @if(old('edit_beds_'.$listing->id,$listing->beds) == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>

                        </div>
                        <div class="form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.baths')</label>
                            <select class="form-control select2" name="edit_baths_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')">
                               <option value=""></option>

                               @for($i = 1;$i <= 10 ;$i++)
                                 <option @if(old('edit_baths_'.$listing->id,$listing->baths) == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                               @endfor
                           </select>
                        </div>
                    </div>  

                    <div class="form-group ">
                        <div class=" form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.parkings')</label>
                            <input type="text" style="flex:2"  class="form-control" name="edit_parkings_{{ $listing->id }}"
                             value="{{ old('edit_parkings_'.$listing->id,$listing->parkings) }}"  >
                        </div>
                        <div class=" form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.year_built')</label>
                            <input style="flex:2" type="text" class="form-control"  name="edit_year_built_{{ $listing->id }}" 
                            value="{{ old('edit_year_built_'.$listing->id,$listing->year_built) }}" placeholder=""  >
                        </div>
                    </div>  
                    
                    
                    <div class="form-group">
                        <label for="" class="font-weight-medium text-muted">@lang('listing.plot_area')</label>
                        <div class="input-group mb-2">
                            <input name="edit_plot_area_{{ $listing->id }}" type="number" class="form-control"
                             value="{{ old('edit_plot_area_'.$listing->id,$listing->plot_area) }}"
                            >
                            <div class="input-group-prepend">
                                <div class="input-group-text">sqft</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-medium text-muted" for="">@lang('listing.area')
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-2">
                            <input type="number" class="form-control"
                             value="{{ old('edit_area_'.$listing->id,$listing->area) }}" name="edit_area_{{ $listing->id }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">sqft</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.sources')
                        </label>
                
                        <div class="input-group">
                        <div class="input-group-prepend w-100">
                            @can('manage_listing_setting')
                            <div 
                            class="input-group-text cursor-pointer"
                            data-toggle="modal"
                            data-target="#add_source" 
                              onclick="event.preventDefault()" id="basic-addon1">
                                <i 
                                data-plugin="tippy" title="@lang('sales.new_lead_source')"
                                data-tippy-placement="top-start" 
                
                              
                                
                                class="fas fa-plus-circle"
                                ></i>
                            </div>
                            @endcan
                
                                <select  style="" class="form-control select_souce_id select2" name="edit_source_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.sources')" required>
                                        <option value="" class="font-weight-medium text-muted"></option>
                                        @forelse($lead_sources as $source)
                                            <option @if(old("edit_source_id_".$listing->id,$listing->source_id) == $source->id) selected @endif  value="{{ $source->id}}">
                                                {{ $source->{'name_'.app()->getLocale()} }}
                                            </option>
                                        @empty
                                        @endforelse
                                </select>
                        
                         
                       
                           
                        </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.landlord')
                        </label>
                
                        <div class="input-group">
                        <div class="input-group-prepend w-100">
                                @can('manage_listing_setting')
                                    <div 
                                    class="input-group-text cursor-pointer"
                                    data-toggle="modal"
                                    data-target="#add_landlord" 
                                    onclick="event.preventDefault()" id="basic-addon_{{ $listing->id }}">
                                        <i 
                                        data-plugin="tippy" title="@lang('listing.new_landlord')"
                                        data-tippy-placement="top-start" 
                
                                        class="fas fa-plus-circle"
                                        ></i>
                                    </div>
                                @endcan
                
                                <select  style="" class="form-control select_landlord_id select2" name="edit_landlord_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.landlord')" >
                                           <option value="" class="font-weight-medium text-muted"></option>
                                        @foreach($landlords as $landlord)
                           
                                            <option @if(old("edit_landlord_id_".$listing->id,$listing->landlord_id) == $landlord->id) selected @endif  value="{{ $landlord->id}}">
                                                {{ $landlord->name }}
                                            </option>
                                       @endforeach    
                
                                </select>
                
                            </div>
                            </div>
                   </div>
                                                        
                    <div class="form-group ">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.developer')
                        </label>

                        <div class="input-group">
                        <div class="input-group-prepend w-100">
                                @can('manage_listing_setting')
                                    <div 
                                    class="input-group-text cursor-pointer"
                                    data-toggle="modal"
                                    data-target="#add_developer" 
                                    onclick="event.preventDefault()" id="basic-addon1">
                                        <i 
                                        data-plugin="tippy" title="@lang('listing.new_developer')"
                                        data-tippy-placement="top-start" 

                                        class="fas fa-plus-circle"
                                        ></i>
                                    </div>
                                @endcan
                
                                <select  style="" class="form-control select_developer_id select2" name="edit_developer_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.developer')" >
                                        <option value="" class="font-weight-medium text-muted"></option>
                                        @foreach($developers as $developer)
                            
                                            <option 
                                            @if(old("edit_developer_id_".$listing->id,$listing->developer_id) == $developer->id) selected @endif 
                                            value="{{ $developer->id}}">
                                                {{ $developer->{'name_'.app()->getLocale()} }}
                                            </option>
                                        @endforeach    

                                </select>

                            </div>
                        </div>
                </div>
                <div id="rent_div_{{ $listing->id }}" @if(old('edit_purpose_'.$listing->id,$listing->purpose) == 'sale') style="display: none;" @endif>
                    <div class="form-group d-flex align-items-center">
                        <div class="checkbox checkbox-primary d-flex align-items-center" style="height:55px">
                            <input type="hidden" name="edit_rented_{{ $listing->id }}" value="no">
                            <input
                            @if(old('edit_rented_'.$listing->id,$listing->rented) == 'yes') checked @endif
                             id="rented_{{ $listing->id }}"
                             name="edit_rented_{{ $listing->id }}"
                             value="yes"
                             type="checkbox" class="sub-rent-checkbox-{{ $listing->id }}" onchange="editShowSubRentDiv({{ $listing->id }})">
                            <label for="rented_{{ $listing->id }}"">
                                @lang('listing.rented')
                            </label>
                        </div>
                    </div>
                    <div id="sub_rent_div_{{ $listing->id }}" @if(old('edit_rented_'.$listing->id,$listing->rented) == 'no') style="display:none" @endif>
                        <div class="form-group">
                            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.tenant_start_date') <i data-plugin="tippy" data-tippy-placement="top-start" title="Tenancy Description" class="fas fa-info-circle"></i></label>
                            <div style="flex:2">
                                <div class="d-flex">
                                    <div class="input-group mr-sm-2">
                                    <input
                                    type="text"
                                    value="{{ old('edit_tenancy_contract_start_date_'.$listing->id,$listing->tenancy_contract_start_date) }}"
                                    name="edit_tenancy_contract_start_date_{{ $listing->id }}"
                                       class="form-control p-1 flatpicker" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.tenant_end_date') <i data-plugin="tippy" data-tippy-placement="top-start" title="Tenancy Description" class="fas fa-info-circle"></i></label>
                            <div style="flex:2">
                                <div class="d-flex">
                                    <div class="input-group mr-sm-2">
                                    <input
                                        type="text"
                                        value="{{ old('edit_tenancy_contract_end_date_'.$listing->id,$listing->tenancy_contract_end_date) }}"
                                        name="edit_tenancy_contract_end_date_{{ $listing->id }}"
                                        id="basic-datepicker-1"
                                        class="form-control p-1 flatpicker" >
            
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
            
                        <div class="form-group ">
                                    <label class="font-weight-medium text-muted">
                                        @lang('listing.tenant')
                                    </label>
                        
                                    <div class="input-group">
                                    <div class="input-group-prepend w-100">
                                            @can('manage_listing_setting')
                                                <div 
                                                class="input-group-text cursor-pointer"
                                                data-toggle="modal"
                                                data-target="#add_tenant" 
                                                onclick="event.preventDefault()" >
                                                    <i 
                                                    data-plugin="tippy" title="@lang('listing.new_tenant')"
                                                    data-tippy-placement="top-start" 
            
                                                    class="fas fa-plus-circle"
                                                    ></i>
                                                </div>
                                            @endcan
                            
                                            <select  style="" class="form-control select_tenant_id select2" name="edit_tenant_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.tenant')" >
                                                    <option value="" class="font-weight-medium text-muted"></option>
                                                    @foreach($tenants as $tenant)
                                    
                                                    <option @if(old("edit_tenant_id_".$listing->id,$listing->tenant_id) == $tenant->id) selected @endif  value="{{ $tenant->id}}">
                                                        {{ $tenant->name }}
                                                    </option>
                                                @endforeach    
            
                                            </select>
            
                                        </div>
                                      </div>
                            </div>
            
            
                        <div class="form-group mb-4">
                            {{-- <button onclick="event.preventDefault()"  class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1" data-toggle="modal" data-target="#cheques-modal">Add Cheque</button> --}}
                            <button onclick="event.preventDefault()" data-toggle="modal"
                             data-target="#cheque-modal_{{ $listing->id }}" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                                <i class="fas fa-plus"></i>
                              @lang('listing.add_cheque')
                            </button>
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
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                </div>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div> <!-- end card-box-->