<div id="description-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="extraInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                            <i class="fas fa-info-circle text-primary fa-2x"></i>
                            <h4>
                                @lang('listing.add_description')
                            </h4>
                    </div>
                <div>
                    <div class="d-flex justify-content-between">
                        <label class="font-weight-medium text-muted">
                            @lang('listing.description')
                        </label>
        
                    </div>
                    <div class="">
                            <div class="description_en">
                                <textarea 
                                class="form-control"
                                style="min-height: 334px;"
                                 row="6" col="6" name="description_en">{{old('description_en')}}</textarea>
                            </div>    
                    {{--         <div class="description_ar d-none">
                                <textarea id="description_ar" 
                                row="6" col="6"  name="description_ar">{{old('description_ar')}}</textarea>
                            </div> --}}
                            <div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <button class="btn p-0">@lang('listing.company_profile')</button>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0">
                                    <select style="width:100px" class="form-control select2" data-toggle="select2" data-placeholder="Agent Profile">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0">
                                    <select style="width:100px" class="form-control select2"  data-toggle="select2" data-placeholder="Copy Features">
                                            <option value=""></option>
                                            <option value="1">2</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0">
                                    <select style="width:100px" class="form-control select2"  data-toggle="select2" data-placeholder="Select Template">
                                            <option value=""></option>
                                            <option value="1">2</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">@lang('listing.done')</button>
                </div>
            </div>
        </div>
    </div>
</div>

