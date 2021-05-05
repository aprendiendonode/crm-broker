<div class="col-md-4">
    <h4 class="mb-3">@lang('listing.associates')</h4>
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
        <label class="font-weight-medium text-muted" for="">@lang('listing.transaction')</label>
        <input 
          type="text" class="form-control" value="{{ old('edit_permit_no_'.$listing->id,$listing->permit_no) }}" 
          name="edit_permit_no_{{ $listing->id }}"
         >
     
    </div>
    <div class="form-group">
        <input type="hidden" name="edit_rera_property_no_status_{{ $listing->id }}" value="{{ old('edit_rera_property_no_status_'.$listing->id,$listing->rera_property_no_status) }}">
        <input type="hidden" name="edit_rera_property_no_log_{{ $listing->id }}" value={{ old('edit_rera_property_no_log_'.$listing->id,$listing->rera_property_no_log) }}>
        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.permit')</label>
        <div class="d-flex">
            <div class="input-group mr-sm-2" >
                <input
                value="{{ old('edit_rera_property_no_'.$listing->id,$listing->rera_property_no) }}"
                 type="text" class="form-control" name="edit_rera_property_no_{{ $listing->id }}" id="permit_{{ $listing->id }}" 
                 >
                <div class="input-group-prepend" >

                    <div class="input-group-text"
                     data-plugin="tippy" data-tippy-placement="top-start" title="Validate">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                </div>
            </div>
            <input
            value="{{ old('edit_rera_property_expiry_date_'.$listing->id,$listing->rera_property_expiry_date) }}"
            name="edit_rera_property_expiry_date_{{ $listing->id }}"
             type="text" class="form-control flatpicker"  id="permitPolicy_{{ $listing->id }}" placeholder="@lang('listing.permit_expiry')">
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

    <div class="form-group">
        <label for="assignTo" class="font-weight-medium text-muted">
            @lang('listing.assign_to')
        </label>
        <select 
        required
        class="form-control select2" name="edit_assigned_to_{{ $listing->id }}"
         data-toggle="select2" data-placeholder="select" 
         >
                <option value=""></option>
            @foreach($staffs as $staff)
                <option
                    @if(old('edit_assigned_to_'.$listing->id,$listing->assigned_to) == $staff->id) selected @endif
                    value="{{ $staff->id }}"
                    >
                    {{ $staff->{'name_'.app()->getLocale()} }}
                  
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status" class="font-weight-medium text-muted">  @lang('listing.status')</label>
        <select class="form-control select2" name="edit_status_{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.select')" required>
            <option value=""></option>
            <option @if(old('edit_status_'.$listing->id,$listing->status) == 'draft') selected @endif value="draft" >@lang('listing.draft')</option>
            <option @if(old('edit_status_'.$listing->id,$listing->status) == 'live') selected @endif value="live" >@lang('listing.live')</option>
            <option @if(old('edit_status_'.$listing->id,$listing->status) == 'archive') selected @endif value="archive" >@lang('listing.archive')</option>
            <option @if(old('edit_status_'.$listing->id,$listing->status) == 'review') selected @endif value="review" >@lang('listing.review')</option>
        
        </select>
    </div>
    <div class="form-group">
        <label  class="font-weight-medium text-muted">@lang('listing.note')</label>
        <textarea
        
         class="form-control"
         name="edit_note_{{ $listing->id }}" 
          cols="3" rows="3">{{ old('edit_note_'.$listing->id,$listing->Note) }}</textarea>
    </div>
</div>

