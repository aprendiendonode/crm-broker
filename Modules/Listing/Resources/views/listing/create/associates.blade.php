<div class="col-md-4">
    <h4 class="mb-3">@lang('listing.associates')</h4>
    <div class="form-group form-inline" style="height: 64px;">
            <label class="font-weight-medium text-muted mr-3">@lang('listing.lsm')</label>
            <div style="display:flex; flex:2">
                <div class="radio mr-3">
                    <input type="radio" name="lsm" id="shared" value="shared" @if(old('lsm') == 'shared') checked @endif>
                    <label for="shared">
                        @lang('listing.shared')
                    </label>
                </div>
                <div class="radio">
                    <input type="radio" name="lsm" id="private" value="private" @if(old('lsm','private') == 'private') checked @endif>
                    <label for="private">
                        @lang('listing.private')
                    </label>
                </div>
            </div>
    </div>
    <div class="form-group">
        <label class="font-weight-medium text-muted" for="">@lang('listing.transaction')</label>
        <input 
          type="text" class="form-control" value="{{ old('permit_no') }}" 
          name="permit_no"
         >
     
    </div>
    <div class="form-group">
        <input type="hidden" name="rera_property_no_status" value="{{ old('rera_property_no_status','invalid') }}">
        <input type="hidden" name="rera_property_no_log" value={{ old('rera_property_no_log',1) }}>
        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.permit')</label>
        <div class="d-flex">
            <div class="input-group mr-sm-2" >
                <input
                value="{{ old('rera_property_no') }}"
                 type="text" class="form-control" name="rera_property_no" id="permit2" 
                 >
                <div class="input-group-prepend" >

                    <div class="input-group-text"
                     data-plugin="tippy" data-tippy-placement="top-start" title="Validate">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                </div>
            </div>
            <input
            value="{{ old('rera_property_expiry_date') }}"
            name="rera_property_expiry_date"
             type="text" class="form-control" name="permitPolicy1" id="permitPolicy1" placeholder="@lang('listing.permit_expiry')">
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
                    onclick="event.preventDefault()" id="basic-addon1">
                        <i 
                        data-plugin="tippy" title="@lang('listing.new_landlord')"
                        data-tippy-placement="top-start" 

                        class="fas fa-plus-circle"
                        ></i>
                    </div>
                @endcan

                <select  style="" class="form-control select_landlord_id select2" name="landlord_id" data-toggle="select2" data-placeholder="@lang('listing.landlord')" >
                        <option value="" class="font-weight-medium text-muted"></option>
                        @foreach($landlords as $landlord)
           
                        <option @if(old("landlord_id") == $landlord->id) selected @endif  value="{{ $landlord->id}}">
                            {{ $landlord->name }}
                        </option>
                       @endforeach    

                </select>

            </div>
            </div>
            </div>

    <div id="rent_div" style="display: none;">
        <div class="form-group d-flex align-items-center">
            <div class="checkbox checkbox-primary d-flex align-items-center" style="height:55px">
                <input type="hidden" name="rented" value="no">
                <input
                @if(old('rented') == 'yes') checked @endif
                 id="rented1"
                 name="rented"
                 value="yes"
                 type="checkbox" class="sub-rent-checkbox" onchange="showSubRentDiv()">
                <label for="rented1">
                    @lang('listing.rented')
                </label>
            </div>
        </div>
        <div id="sub_rent_div" @if(old('rented','no') == 'no') style="display:none" @endif>
            <div class="form-group">
                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.tenant_start_date') <i data-plugin="tippy" data-tippy-placement="top-start" title="Tenancy Description" class="fas fa-info-circle"></i></label>
                <div style="flex:2">
                    <div class="d-flex">
                        <div class="input-group mr-sm-2">
                        <input
                        type="text"
                        value="{{ old('tenancy_contract_start_date') }}"
                        name="tenancy_contract_start_date"
                          id="basic-datepicker-1" class="form-control p-1 flatpicker" >
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
                        value="{{ old('tenancy_contract_end_date') }}"
                        name="tenancy_contract_end_date"
                         
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
                            onclick="event.preventDefault()" id="basic-addon1">
                                <i 
                                data-plugin="tippy" title="@lang('listing.new_tenant')"
                                data-tippy-placement="top-start" 

                                class="fas fa-plus-circle"
                                ></i>
                            </div>
                        @endcan
        
                        <select  style="" class="form-control select_tenant_id select2" name="tenant_id" data-toggle="select2" data-placeholder="@lang('listing.tenant')" >
                                <option value="" class="font-weight-medium text-muted"></option>
                                @foreach($tenants as $tenant)
                   
                                <option @if(old("tenant_id") == $tenant->id) selected @endif  value="{{ $tenant->id}}">
                                    {{ $tenant->name }}
                                </option>
                               @endforeach    

                        </select>

                    </div>
                    </div>
                    </div>


            <div class="form-group mb-4">
                {{-- <button onclick="event.preventDefault()"  class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1" data-toggle="modal" data-target="#cheques-modal">Add Cheque</button> --}}
                <button
                 onclick="event.preventDefault()" data-toggle="modal"
                 data-target="#cheque-modal" class="btn btn-outline-dark btn-sm px-1 mr-1 mb-1">
                    <i class="fas fa-plus"></i>
                    <span>
                        @lang('listing.add_cheque')
                    </span>
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

                <select  style="" class="form-control select_souce_id select2" name="source_id" data-toggle="select2" data-placeholder="@lang('listing.sources')" required>
                        <option value="" class="font-weight-medium text-muted"></option>
                        @forelse($lead_sources as $source)
                            <option @if(old("source_id") == $source->id) selected @endif  value="{{ $source->id}}">
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
        class="form-control select2" name="assigned_to"
         data-toggle="select2" data-placeholder="select" 
         >
             <option value=""></option>
            @foreach($staffs as $staff)
             <option
             @if(old('assigned_to') == $staff->id) selected @endif
              value="{{ $staff->id }}">{{ $staff->{'name_'.app()->getLocale()} }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="status" class="font-weight-medium text-muted">  @lang('listing.status')</label>
        <select class="form-control select2" name="status" data-toggle="select2" data-placeholder="select" required>
            <option value=""></option>
            <option @if(old('status','draft') == 'draft') selected @endif value="draft" >@lang('listing.draft')</option>
            <option @if(old('status') == 'live') selected @endif value="live" >@lang('listing.live')</option>
            <option @if(old('status') == 'archive') selected @endif value="archive" >@lang('listing.archive')</option>
            <option @if(old('status') == 'review') selected @endif value="review" >@lang('listing.review')</option>
        
        </select>
    </div>
    <div class="form-group">
        <label for="note" class="font-weight-medium text-muted">@lang('listing.note')</label>
        <textarea
        
         class="form-control"
         name="note" id="noteTextArea1"
          cols="3" rows="3">{{ old('note') }}</textarea>
    </div>
</div>