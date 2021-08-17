<!-- extra info modal content -->
<div id="extraInfo-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="extraInfoLabel" aria-hidden="true">
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
                                  type="text" class="form-control" value="{{ old('key_location',$has_ref ? $listing_by_ref->key_location : '') }}" 
                                  name="key_location"
                                 >
                             
                            </div>

                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.govfield1')</label>
                                <input 
                                  type="text" class="form-control" value="{{ old('govfield1',$has_ref ? $listing_by_ref->govfield1 : '') }}" 
                                  name="govfield1"
                                 >
                            
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.govfield2')</label>
                                <input 
                                  type="text" class="form-control" value="{{ old('govfield2',$has_ref ? $listing_by_ref->govfield2 : '') }}" 
                                  name="govfield2"
                                 >
                       
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.yearly_service_charges')</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="yearly_service_charges" value="{{ old('yearly_service_charges',$has_ref ? $listing_by_ref->yearly_service_charges : '') }}"
                                    id="yearly_service_charges">
                                    <div class="input-group-prepend">
                                        {{-- <div class="input-group-text">AED</div> --}}
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.monthly_cooling_charges')</label>
                                <input 
                                  type="number" class="form-control" value="{{ old('monthly_cooling_charges',$has_ref ? $listing_by_ref->monthly_cooling_charges : '') }}" 
                                  name="monthly_cooling_charges"
                                 >
                               
                            </div>
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.monthly_cooling_provider')</label>
                                <input 
                                  type="text" class="form-control" value="{{ old('monthly_cooling_provider',$has_ref ? $listing_by_ref->monthly_cooling_provider : '') }}" 
                                  name="monthly_cooling_provider"
                                 >
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">@lang('listing.done')</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

