<div id="description-modal-{{ $listing->id }}" class="modal fade description-profile-modal-{{ $listing->id }}" tabindex="-1" role="dialog" aria-labelledby="extraInfoLabel" aria-hidden="true">
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

                        <input  data-plugin="tippy" data-tippy-placement="top-start" onchange="toggle_edit_desc({{ $listing->id }})" class="edit-toggle-description-{{ $listing->id }}" type="checkbox"
                        checked data-toggle="toggle" data-on="Ar" data-off="EN"
                        data-onstyle="primary"
                        data-offstyle="success"
                        name="toggling"
                        >
        
                    </div>
                    <div class="">
                            <div class="edit_description_en_{{ $listing->id }}">
                                <textarea 
                                id="edit_description_en_{{ $listing->id }}"
                                    class="form-control textarea-en"
                                    style="min-height: 334px;"
                                    row="6" col="6" name="edit_description_en_{{ $listing->id }}">{{old('edit_description_en_'.$listing->id,$listing->description_en)}}</textarea>
                            </div>    
                            <div class="edit_description_ar_{{ $listing->id }} d-none">
                                <textarea 
                                id="edit_description_ar_{{ $listing->id }}"
                                    class="form-control textarea-ar"
                                    style="min-height: 334px;direction:rtl"
                                    row="6" col="6"  name="edit_description_ar_{{ $listing->id }}">{{old('edit_description_ar_'.$listing->id,$listing->description_ar)}}</textarea>
                            </div>
                            <div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3 en-button-{{ $listing->id }} ">
                            <button onclick="event.preventDefault();editshowCompanyProfile(this,'en',{{ $listing->id }})" data-agencyprofile="{{ $agency_data->description_en }}" class="btn p-0 agency-profile-en-{{ $listing->id }}">@lang('listing.company_profile')</button>
                            <p class="agency-profile-message-en-{{ $listing->id }} text-danger"></p>

                        </div>
                        <div class="col-3 ar-button-{{ $listing->id }} d-none ">
                            <button onclick="event.preventDefault();editshowCompanyProfile(this,'ar',{{ $listing->id }})" data-agencyprofile="{{ $agency_data->description_ar }}" class="btn p-0 agency-profile-ar-{{ $listing->id }}">@lang('listing.company_profile')</button>
                            <p class="agency-profile-message-ar-{{ $listing->id }} text-danger"></p>

                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0 profile-en-{{ $listing->id }}">
                                    <select
                                    onchange="event.preventDefault();editshowAgentProfile(this,'en',{{ $listing->id }})"
                                     style="width:100px" class="form-control select2 agent-profile-en-{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.agent_profile')">
                                        <option value=""></option>

                                        <optgroup label="@lang('listing.english')">

                                            @foreach($staffs as $staff )
                                                <option
                                                  data-agentprofile="{{ $staff->description_en }}"
                                                  value=""
                                                  >{{ $staff->{'name_'.app()->getLocale()} }}
                                                </option>
                                           @endforeach     
                                        </optgroup>
                                    </select>
                                    <p class="agent-profile-message-en-{{ $listing->id }} text-danger"></p>
                            </div>
                            <div class="form-group mb-0 d-none profile-ar-{{ $listing->id }}">
                                    <select
                                    onchange="event.preventDefault();editshowAgentProfile(this,'ar',{{ $listing->id }})"
                                     style="width:100px" class="form-control select2 agent-profile-ar-{{ $listing->id }}" data-toggle="select2" data-placeholder="@lang('listing.agent_profile')">
                                        <option value=""></option>
                                        <optgroup label="@lang('listing.english')">
                                        @foreach($staffs as $staff )
                                            <option 
                                               value=""
                                               data-agentprofile="{{ $staff->description_ar }}">{{ $staff->{'name_'.app()->getLocale()} }}
                                            </option>
                                       @endforeach     
                                        </optgroup>
                                    </select>

                                    <p class="agent-profile-message-ar-{{ $listing->id }} text-danger"></p>
                            </div>
                        </div>



                        <div class="col-3 features_copy_en_{{ $listing->id }}">
                            <button onclick="event.preventDefault();editloadCheckedFeatures('en',{{ $listing->id }})" data-checkedfeatures="" class="btn p-0 listing-checked-filters-{{ $listing->id }}">@lang('listing.copy_features')</button>
                            <p class="features_copy_message_en text-danger"></p>

                        </div>
                        <div class="col-3 d-none features_copy_ar_{{ $listing->id }}">
                            <button onclick="event.preventDefault();editloadCheckedFeatures('ar',{{ $listing->id }})" data-checkedfeatures="" class="btn p-0 listing-checked-filters-{{ $listing->id }}">@lang('listing.copy_features')</button>
                            <p class="features_copy_message_ar_{{ $listing->id }} text-danger"></p>

                        </div>
                        <div class="col-3">
                            <div class="form-group mb-0 templates-en-{{ $listing->id }}">
                                <select 
                                onchange="event.preventDefault();editshowTemplates('en',{{ $listing->id }})"
                                style="width:100px" class="form-control select2 load-templates-en-{{ $listing->id }}"  data-toggle="select2" data-placeholder="@lang('listing.select_template')">
                                         <option value=""></option>
                                   
                                         <optgroup label="@lang('listing.english')">
                                            @foreach($descriptionTemplates->where('description_en' ,'!=' ,null) as $desc )
                                            <option value="" data-desctemplate="{{ $desc->description_en }}">{{ $desc->title }}</option>
                                           @endforeach
                                         </optgroup>
                                   
                                </select>
                            </div>
                            <div class="form-group mb-0 d-none templates-ar-{{ $listing->id }}">
                                <select 
                                onchange="event.preventDefault();editshowTemplates('ar',{{ $listing->id }})"
                                style="width:100px" class="form-control select2 load-templates-ar-{{ $listing->id }}"  data-toggle="select2" data-placeholder="@lang('listing.select_template')">
                                         <option value=""></option>
                                   
                                         <optgroup  label="@lang('listing.arabic')">
                                            @foreach($descriptionTemplates->where('description_ar' ,'!=' ,null) as $desc )
                                            <option value="" data-desctemplate="{{ $desc->description_ar }}">{{ $desc->title }}</option>
                                           @endforeach
                                         </optgroup>
                                   
                                </select>
                            </div>
                        </div>
                  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">@lang('listing.done')</button>
                </div>
            </div>
        </div>
    </div>
</div>

