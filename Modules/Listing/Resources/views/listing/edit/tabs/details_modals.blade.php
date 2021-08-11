 <div class ="card-box">


    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#details-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link active">
                @lang('listing.details')
            </a>
        </li>
        <li class="nav-item">
            <a href="#description-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.description')
            </a>
        </li>
        <li class="nav-item">
            <a href="#features-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.features')
            </a>
        </li>
        <li class="nav-item">
            <a href="#videos-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.video')
            </a>
        </li>

       
    </ul>


    <div class="tab-content">
        <div class="tab-pane active" id="details-{{ $listing->id }}">
            <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal"
             data-target="#details-modal-{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">

                <table class="table table-striped table-info-summary">
                                
                    <tbody>
                  
                        <tr>
                          
                            <td width="200">
                                @lang('listing.ref')
                            </td>
                            <td class="listing-details-ref-{{ $listing->id }}">
                                 {{ $listing->listing_ref }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.status')
                            </td>
                            <td class="listing-details-status-{{ $listing->id }}">
                                 {{ $listing->status }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.lsm')
                            </td>
                            <td class="listing-details-lsm-{{ $listing->id }}">
                                {{ $listing->lsm }}
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.title')
                            </td>
                            <td class="listing-details-title-{{ $listing->id }}">
                                {{ $listing->title }}
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.purpose')
                            </td>
                            <td class="listing-details-purpose-{{ $listing->id }}">
                                {{ $listing->purpose }}
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.type')
                            </td>
                            <td class="listing-details-type-{{ $listing->id }}">
                                {{  $listing->type->{'name_'.app()->getLocale()} ?? '' }}
                            </td>
                        </tr>
              
                        <tr>
                          
                            <td width="200">
                                @lang('listing.beds')
                            </td>
                            <td class="listing-details-beds-{{ $listing->id }}">
                                {{  $listing->beds }}
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.parkings')
                            </td>
                            <td class="listing-details-parkings-{{ $listing->id }}">
                                {{  $listing->parkings }}
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.baths')
                            </td>
                            <td class="listing-details-baths-{{ $listing->id }}">
                                {{  $listing->baths }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.year_built')
                            </td>
                            <td class="listing-details-year-built-{{ $listing->id }}">
                                {{  $listing->year_built }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.area')
                            </td>
                            <td class="listing-details-area-{{ $listing->id }}">
                                {{  $listing->area }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.plot_area')
                            </td>
                            <td class="listing-details-plot-area-{{ $listing->id }}">
                                {{  $listing->plot_area }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.landlord')
                            </td>
                            <td class="listing-details-landlord-{{ $listing->id }}">
                                {{ $listing->landlord->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.source')
                            </td>
                            <td class="listing-details-source-{{ $listing->id }}">
                                {{ $listing->source->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.rented')
                            </td>
                            <td class="listing-details-rented-{{ $listing->id }}">
                                {{ $listing->rented }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>

                        @if($listing->rented == 'yes')
                            <tr>
                            
                                <td width="200">
                                    @lang('listing.tenant')
                                </td>
                                <td class="listing-details-tenant-{{ $listing->id }}">
                                    {{ $listing->tenant->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                            
                                <td width="200">
                                    @lang('listing.tenancy_contact_start_date')
                                </td>
                                <td class="listing-details-tenant-start-date-{{ $listing->id }}">
                                    {{ $listing->tenancy_contact_start_date }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                            
                                <td width="200">
                                    @lang('listing.tenancy_contact_end_date')
                                </td>
                                <td class="listing-details-tenant-end-date-{{ $listing->id }}">
                                    {{ $listing->tenancy_contact_end_date }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                        @endif
                        <tr>
                          
                            <td width="200">
                                @lang('listing.developer')
                            </td>
                            <td class="listing-details-developer-{{ $listing->id }}">
                                {{ $listing->developer->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.never_lived_in')
                            </td>
                            <td class="listing-details-never-lived-in-{{ $listing->id }}">
                                {{ $listing->never_lived_in }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.featured_on_company_website')
                            </td>
                            <td class="listing-details-featured-on-company-website-{{ $listing->id }}">
                                {{ $listing->featured_on_company_website }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
              
                        <tr>
                          
                            <td width="200">
                                @lang('listing.exclusive_rights')
                            </td>
                            <td class="listing-details-exclusive-rights-{{ $listing->id }}">
                                {{ $listing->exclusive_rights }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
              
             
                  
                    </tbody>
                    
                    
                 </table>

                 
                
                
            </div>
        
        </div>


        <div class="tab-pane " id="description-{{ $listing->id }}">
            <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal"
             data-target="#description-modal-{{ $listing->id }}" >@lang('listing.edit')</button>

            <div class=" mb-4">
          
                <div> @lang('listing.description'): </div>
                <div> {!! $listing->description_en !!}</div>
            
            </div>
        
        </div>



        <div class="tab-pane " id="features-{{ $listing->id }}">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal"
             data-target="#featuresModal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
          
                <div> @lang('listing.features'): </div>
                <div> </div>
            
            </div>
        
        </div>



        <div class="tab-pane " id="videos-{{ $listing->id }}">
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content ">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">
                            <label for="status" class="font-weight-medium text-muted">  @lang('listing.status')</label>
                            <select class="form-control select2 listing-status-{{ $listing->id }}" name="edit_status_{{ $listing->id }}"
                                 data-toggle="select2" data-placeholder="@lang('listing.select')" required>
                                <option value=""></option>
                                <option @if(old('edit_status_'.$listing->id,$listing->status) == 'draft') selected @endif value="draft" >@lang('listing.draft')</option>
                                <option @if(old('edit_status_'.$listing->id,$listing->status) == 'live') selected @endif value="live" >@lang('listing.live')</option>
                                <option @if(old('edit_status_'.$listing->id,$listing->status) == 'archive') selected @endif value="archive" >@lang('listing.archive')</option>
                                <option @if(old('edit_status_'.$listing->id,$listing->status) == 'review') selected @endif value="review" >@lang('listing.review')</option>
                            
                            </select>
                        </div>
                      
                        <div class="col-md-6 form-group ">
                            <label class="font-weight-medium text-muted">
                                @lang('listing.purpose')
                            </label>
               
                            <select 
                                     onchange="editShowRentDiv({{ $listing->id }})"
                                     class="listing-purpose-{{ $listing->id }} rent-radio-{{ $listing->id }} form-control  select2" 
                                     name="edit_purpose_{{ $listing->id }}"
                                     data-toggle="select2" data-placeholder="@lang('listing.purpose')"
                                     required
                             >
                                    <option value="sale"  @if(old('edit_purpose_'.$listing->id,$listing->purpose)  == 'sale') selected @endif>
                                        @lang('listing.sale')
                                    </option>
                                    <option value="rent" @if(old('edit_purpose_'.$listing->id,$listing->purpose)  == 'rent') selected @endif>
                                        @lang('listing.rent')
                                    </option>
                                    <option value="short" @if(old('edit_purpose_'.$listing->id,$listing->purpose)  == 'short') selected @endif>
                                        @lang('listing.short time')
                                    </option>
                                  
                            </select>
                
                           
                        </div>


    
    
                        <div class="col-md-6 form-group " style="height: 64px;">
                                  <label class="font-weight-medium text-muted">@lang('listing.lsm')</label>

                                    <select 
                                    
                                        class="listing-lsm-{{ $listing->id }} form-control  select2" 
                                        name="edit_lsm_{{ $listing->id }}"
                                    
                                        data-toggle="select2" data-placeholder="@lang('listing.lsm')"
                                        required
                                        >
                                        <option value="shared"  @if(old('edit_lsm_'.$listing->id,$listing->lsm)  == 'shared') selected @endif>
                                            @lang('listing.shared')
                                        </option>
                                        <option value="private" @if(old('edit_lsm_'.$listing->id,$listing->lsm)  == 'private') selected @endif>
                                            @lang('listing.private')
                                        </option>
                                        
                            
                                  </select>
                        </div>
       
              
                        <div class="col-md-6 form-group">
                            <label class="font-weight-medium text-muted" for="">@lang('listing.title')
                                        
                            </label>
                            <input type="text" class="listing-title-{{ $listing->id }} form-control" value="{{ old('edit_title_'.$listing->id,$listing->title) }}" 
                            name="edit_title_{{ $listing->id }}" >
                    
                        </div>

                    <div class="col-md-6 form-group">
                        <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.type')<span class="text-danger"> *</span></label>
                        <div style="flex:2;">
                            <select class="listing-type-{{ $listing->id }} form-control select2 listing_type_{{ $listing->id }}" onchange="editShowFurnishedQuestion({{ $listing->id }});"   name="edit_type_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.listing_types')" required>
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

                    <div class="col-md-6 form-group ">
                        <div class="form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.beds')</label>
                             <select class="listing-beds-{{ $listing->id }} form-control select2" name="edit_beds_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')">
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
                            <select class="listing-baths-{{ $listing->id }} form-control select2" name="edit_baths_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')">
                               <option value=""></option>

                               @for($i = 1;$i <= 10 ;$i++)
                                 <option @if(old('edit_baths_'.$listing->id,$listing->baths) == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                               @endfor
                           </select>
                        </div>
                    </div>  

                    <div class="col-md-6 form-group ">
                        <div class=" form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.parkings')</label>
                            <input type="text" style="flex:2"  class="listing-parkings-{{ $listing->id }} form-control" name="edit_parkings_{{ $listing->id }}"
                             value="{{ old('edit_parkings_'.$listing->id,$listing->parkings) }}"  >
                        </div>
                        <div class=" form-group" style="flex:1">
                            <label for="" style="flex:1">@lang('listing.year_built')</label>
                            <input style="flex:2" type="text" class="listing-year-built-{{ $listing->id }} form-control"  name="edit_year_built_{{ $listing->id }}" 
                            value="{{ old('edit_year_built_'.$listing->id,$listing->year_built) }}" placeholder=""  >
                        </div>
                    </div>  
                    
                    
                    <div class="col-md-6 form-group">
                        <label for="" class="font-weight-medium text-muted">@lang('listing.plot_area')</label>
                        <div class="input-group mb-2">
                            <input name="edit_plot_area_{{ $listing->id }}" type="number" class="listing-plot-area-{{ $listing->id }} form-control"
                             value="{{ old('edit_plot_area_'.$listing->id,$listing->plot_area) }}"
                            >
                            <div class="input-group-prepend">
                                <div class="input-group-text">sqft</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="font-weight-medium text-muted" for="">@lang('listing.area')
                            <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-2">
                            <input type="number" class="listing-area-{{ $listing->id }} form-control"
                             value="{{ old('edit_area_'.$listing->id,$listing->area) }}" name="edit_area_{{ $listing->id }}" required>
                            <div class="input-group-prepend">
                                <div class="input-group-text">sqft</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 form-group ">
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
                
                                <select  style="" class="listing-source-{{ $listing->id }} form-control select_souce_id select2" name="edit_source_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.sources')" required>
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
                    <div class="col-md-6 form-group ">
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
                
                                <select  style="" class="listing-landlord-{{ $listing->id }} form-control select_landlord_id select2" name="edit_landlord_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.landlord')" >
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
                                                        
                        <div class="col-md-6 form-group  ">
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
                    
                                    <select  style="" class="form-control select_developer_id select2 listing-developer-{{ $listing->id }}" name="edit_developer_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.developer')" >
                                            <option value="" class=" font-weight-medium text-muted"></option>
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

                        <div class="col-md-6"></div>

              

                        <div class="col-md-4">

                            <label class="font-weight-medium text-muted">
                                @lang('listing.never_lived_in')
                            </label>
            
                            <select 
                                    
                                    class="listing-never-lived-in-{{ $listing->id }}  form-control  select2" 
                                    name="edit_never_lived_in_{{ $listing->id }}"
                                    data-toggle="select2" data-placeholder="@lang('listing.never_lived_in')"
                                    required
                            >
                                <option value="yes"  @if($listing->never_lived_in  == 'yes') selected @endif>
                                    @lang('listing.yes')
                                </option>
                                
                                <option value="no"  @if($listing->never_lived_in  == 'no') selected @endif>
                                    @lang('listing.no')
                                </option>
                                
                                
                            </select>
                        </div>



                        <div class="col-md-4">

                            <label class="font-weight-medium text-muted">
                                @lang('listing.featured_on_company_website')
                            </label>
            
                            <select 
                                    
                                    class="listing-featured-on-company-website-{{ $listing->id }}  form-control  select2" 
                                    name="edit_featured_on_company_website_{{ $listing->id }}"
                                    data-toggle="select2" data-placeholder="@lang('listing.featured_on_company_website')"
                                    required
                            >
                                <option value="yes"  @if($listing->featured_on_company_website  == 'yes') selected @endif>
                                    @lang('listing.yes')
                                </option>
                                
                                <option value="no"  @if($listing->featured_on_company_website  == 'no') selected @endif>
                                    @lang('listing.no')
                                </option>
                                
                                
                            </select>
                        </div>


                
                        <div class="col-md-4">

                            <label class="font-weight-medium text-muted">
                                @lang('listing.exclusive_rights')
                            </label>
            
                            <select 
                                    
                                    class="listing-exclusive-rights-{{ $listing->id }}  form-control  select2" 
                                    name="edit_exclusive_rights_{{ $listing->id }}"
                                    data-toggle="select2" data-placeholder="@lang('listing.exclusive_rights')"
                                    required
                            >
                                <option value="yes"  @if($listing->exclusive_rights  == 'yes') selected @endif>
                                    @lang('listing.yes')
                                </option>
                                
                                <option value="no"  @if($listing->exclusive_rights  == 'no') selected @endif>
                                    @lang('listing.no')
                                </option>
                                
                                
                            </select>
                        </div>





                        <div class="col-md-12">

                            <div id="rent_div_{{ $listing->id }}" @if(old('edit_purpose_'.$listing->id,$listing->purpose) != 'rent') style="display: none;" @endif>
                                <div class="form-group d-flex align-items-center">
                                    <div class="checkbox checkbox-primary d-flex align-items-center" style="height:55px">
                                        <input type="hidden" class="listing-rented-{{ $listing->id }}" name="edit_rented_{{ $listing->id }}" value="no">
                                        <input
                                        @if(old('edit_rented_'.$listing->id,$listing->rented) == 'yes') checked @endif
                                        id="rented_{{ $listing->id }}"
                                        name="edit_rented_{{ $listing->id }}"
                                        value="yes"
                                        type="checkbox" class="listing-rented-{{ $listing->id }} sub-rent-checkbox-{{ $listing->id }}" onchange="editShowSubRentDiv({{ $listing->id }})">
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
                                                class="listing-tenant-start-date-{{ $listing->id }} form-control p-1 flatpicker" >
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
                                                    class="listing-tenant-end-date-{{ $listing->id }} form-control p-1 flatpicker" >
                        
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
                                        
                                                        <select  style="" class="listing-tenant-{{ $listing->id }} form-control select_tenant_id select2" name="edit_tenant_id_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.tenant')" >
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
                        
                        </div>









                </div>


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                    <button type="button" class="btn btn-success"
                     onclick="updateListingDetails(
                        {{ $listing->id }},'{{ route('listings.update-listing-details') }}',
                     '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )"
                     >@lang('listing.modify')</button>
                </div>

            </div>  
            {{-- </div><!-- /.modal-content --> --}}

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div> <!-- end card-box-->