<div class="card-box">

    {{-- <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#agent" data-toggle="tab" aria-expanded="false" class="nav-link active">
                @lang('listing.pricing')
            </a>
        </li>

       
    </ul> --}}


    {{-- <div class="tab-content"> --}}
        {{-- <div class="tab-pane active" id="agent"> --}}
            <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pricing-modal-{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">

                <table class="table table-striped table-info-summary">
                                
                    <tbody>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.Price')
                            </td>
                            <td class="listing-pricing-price-{{ $listing->id }}">
                                {{ $listing->price  }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.commission')
                            </td>
                            <td class="listing-pricing-commission-{{ $listing->id }}">
                                {{  $listing->comission_value .' - '. $listing->comission_percent .'%'  }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                 
                        <tr>
                          
                            <td width="200">
                                @lang('listing.deposite')
                            </td>
                            <td class="listing-pricing-deposite-{{ $listing->id }}">
                                {{ $listing->deposite_value .' - '. $listing->deposite_percent .'%' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.rent_frequency')
                            </td>
                            <td class="listing-pricing-rent-frequency-{{ $listing->id }}">
                                {{ $listing->rent_frequency  }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                        <tr>
                          
                            <td width="200">
                                @lang('listing.cheque')
                            </td>
                            <td class="listing-pricing-cheque-{{ $listing->id }}">
                                {{ $listing->cheque_type->{'name_'.app()->getLocale()} ?? '' }}
                                <!-- ko foreach: externalListings --><!-- /ko -->
                            </td>
                        </tr>
                 
             
                  
                    </tbody>
                    
                    
                 </table>
     
            </div>
        
        {{-- </div> --}}
    
    {{-- </div> --}}


    <div id="pricing-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-medium text-muted" style="flex:1">
                        <span id="rent-sale-label-{{ $listing->id }}">
                            @if($listing->purpose == 'rent')
                             @lang('listing.rent')
                            @else
                             @lang('listing.price')
                            @endif
                        </span>
                        <span class="text-danger"> *</span></label>
                        <div class="input-group mb-2" >
                            <input type="number"  value="{{ old('edit_price_'.$listing->id,$listing->price) }}" class="listing-price-{{ $listing->id }} form-control decimal_convert" 
                                   name="edit_price_{{ $listing->id }}" onkeyup="updatePriceEdit({{ $listing->id }})" onchange="updatePriceEdit({{ $listing->id }})" min="1" id="rent-sale_{{ $listing->id }}" required>
                        
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
                                     type="number" class="form-control listing-commission-percent-{{ $listing->id }}" 
                                     id="annual-commission_{{ $listing->id }}"
                                        onchange="updatePriceEdit({{ $listing->id }})"
                                        onkeyup="updatePriceEdit({{ $listing->id }})"
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
                                     type="text" class="form-control listing-commission-value-{{ $listing->id }}"
                                      id="commissionValue_{{ $listing->id }}"
                                       data-tippy-placement="top-start"
                                        title=""
                                        readonly
                                        >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">AED</div>
                                    </div>
                                </div>
                                
                            </div>
               
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.deposite')</label>
                        <div style="flex:2">
                            <div class="d-flex">
           
                                <div class="input-group mr-sm-2" >
                                    <input 
                                     name="edit_deposite_percent_{{ $listing->id }}"
                                     value="{{ old('edit_deposite_percent_'.$listing->id,$listing->deposite_percent) }}"
                                     type="number" class="form-control listing-deposite-percent-{{ $listing->id }}" id="deposit-percenatage_{{ $listing->id }}"
                                       onchange="updatePriceEdit({{ $listing->id }})"
                                       onkeyup="updatePriceEdit({{ $listing->id }})"
                                     >
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">%</div>
                                    </div>
                                </div>
           
                                <div class="input-group" >
                                    <input 
                                    name="edit_deposite_value_{{ $listing->id }}"
                                    value="{{ old('edit_deposite_value_'.$listing->id,$listing->deposite_value) }}"
                                    type="text"
                                    id="depositValue_{{ $listing->id }}" 
                                    class="form-control listing-deposite-value-{{ $listing->id }}" readonly>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">AED</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        {{-- rent paid every month,week,day,year --}}
                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent_frequency')</label>
                        <div class="d-flex" style="flex:2">
                            <select name="edit_rent_frequency_{{ $listing->id }}" class="form-control select2 listing-rent-frequency-{{ $listing->id }}" 
                              data-toggle="select2" data-placeholder="@lang('listing.rent_frequency')">
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
                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.cheque')</label>
                         <select class="form-control select2 listing-cheque-{{ $listing->id }}"
                          name="edit_listing_rent_cheque_id_{{ $listing->id }}" 
                          data-toggle="select2" data-placeholder="@lang('listing.select')">
                            <option value=""></option>
                            @foreach($cheques as $cheque)
                            <option
                               @if($cheque->id == old('edit_listing_rent_cheque_id_'.$listing->id,$listing->listing_rent_cheque_id))
                                selected
                               @endif
                             value="{{ $cheque->id }}">{{ $cheque->{'name_'.app()->getLocale()}  }}</option>
           
                            @endforeach
                    
                        </select>
                    </div>
     
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                    <button type="button" class="btn btn-success"
                    onclick="updateListingPricing(
                        {{ $listing->id }},'{{ route('listings.update-listing-pricing') }}',
                     '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )"
                     >@lang('listing.modify')</button>
                </div>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div> <!-- end card-box-->