<!-- extra info modal content -->
<div id="extraInfo-modal_{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="extraInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-2">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-info-circle text-primary fa-2x"></i>
                    <h4>@lang('listing.extra_info')</h4>
                </div>
                <div>
                    <div class="row">
                        <div class="col-6">

    
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.key_location')</label>
                                <input 
                                  type="text" class="form-control listing-key-location-{{ $listing->id }}" value="{{ old('edit_key_location_'.$listing->id,$listing->key_location) }}" 
                                  name="edit_key_location_{{ $listing->id }}"
                                 >
                             
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.govfield1')</label>
                                <input 
                                  type="text" class="form-control listing-govfield1-{{ $listing->id }}" value="{{ old('edit_govfield1_'.$listing->id,$listing->govfield1) }}" 
                                  name="edit_govfield1_{{ $listing->id }}"
                                 >
                            
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.govfield2')</label>
                                <input 
                                  type="text" class="form-control  listing-govfield2-{{ $listing->id }}" value="{{ old('edit_govfield2_'.$listing->id,$listing->govfield2) }}" 
                                  name="edit_govfield2_{{ $listing->id }}"
                                 >
                       
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.yearly_service_charges')</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control  listing-yearly-service-charges-{{ $listing->id }}" 
                                    name="edit_yearly_service_charges_{{ $listing->id }}" value="{{ old('edit_yearly_service_charges_'.$listing->id,$listing->yearly_service_charges) }}"
                                    id="yearly_service_charges_{{ $listing->id }}">
                                    <div class="input-group-prepend">
                                        {{-- <div class="input-group-text">AED</div> --}}
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.monthly_cooling_charges')</label>
                                <input 
                                  type="number" class="form-control listing-monthly-cooling-charges-{{ $listing->id }}" value="{{ old('edit_monthly_cooling_charges_'.$listing->id,$listing->monthly_cooling_charges) }}" 
                                  name="edit_monthly_cooling_charges_{{ $listing->id }}"
                                 >
                               
                            </div>
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.monthly_cooling_provider')</label>
                                <input 
                                  type="text" class="form-control listing-monthly-cooling-provider-{{ $listing->id }}" value="{{ old('edit_monthly_cooling_provider_'.$listing->id,$listing->monthly_cooling_provider) }}" 
                                  name="edit_monthly_cooling_provider_{{ $listing->id }}"
                                 >
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">@lang('listing.close')</button>

                <button type="button" class="btn btn-success" onclick="updateListingExtraInfo(
                    {{ $listing->id }},'{{ route('listings.update-listing-extra-info') }}',
                 '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )">@lang('listing.modify')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
