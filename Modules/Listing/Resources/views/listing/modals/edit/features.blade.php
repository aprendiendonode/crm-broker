<div class="modal fade" id="featuresModal_{{ $listing->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $listing->id }}_featuresModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h3 class="mb-3">@lang('listing.listing_features')</h3>
                </div>

                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.recreation_family')</h4>
                    <div class="row">
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden"
                                 name="edit_features_{{ $listing->id }}[barbeque_area]" value="no">
                                <input
                                
                                @if( property_exists($listing->features, 'barbeque_area') && $listing->features->barbeque_area == 'yes') checked @endif
                                 id="barbequeArea_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes" name="edit_features_{{ $listing->id }}[barbeque_area]">
                                <label for="barbequeArea_{{ $listing->id }}">
                                   @lang('listing.barbeque_area') 
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input
                               
                                  type="hidden" name="edit_features_{{ $listing->id }}[day_care_center]"  value="no">
                                <input 
                                @if( property_exists($listing->features,'day_care_center') && $listing->features->day_care_center == 'yes') checked @endif
                                value="yes"
                                id="dayCareCenter_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                name="edit_features_{{ $listing->id }}[day_care_center]" >
                                <label for="dayCareCenter_{{ $listing->id }}">
                                    @lang('listing.day_care_center') 
                                   
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="edit_features_{{ $listing->id }}[kids_play_area]">
                                <input
                                @if( property_exists($listing->features, 'kids_play_area' ) && $listing->features->kids_play_area == 'yes') checked @endif
                                 id="kidsPlayArea_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 name="edit_features_{{ $listing->id }}[kids_play_area]" value="yes"> 
                                <label for="kidsPlayArea_{{ $listing->id }}">
                                   @lang('listing.kids_play_area') 
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="edit_features_{{ $listing->id }}[lawn_or_garden]" value="no">
                                <input
                                @if( property_exists($listing->features, 'lawn_or_garden' ) && $listing->features->lawn_or_garden == 'yes') checked @endif
                                 id="lawnOrGarden_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 name="edit_features_{{ $listing->id }}[lawn_or_garden]" value="yes">
                                <label for="lawnOrGarden_{{ $listing->id }}">
                                    @lang('listing.lawn_or_garden')
                                   
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="edit_features_{{ $listing->id }}[cafeteria_or_canteen]" value="no">
                                <input
                                @if( property_exists($listing->features,'cafeteria_or_canteen') && $listing->features->cafeteria_or_canteen == 'yes') checked @endif
                                 id="cafeteriaOrCanteen_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 name="edit_features_{{ $listing->id }}[cafeteria_or_canteen]" value="yes">
                                <label for="cafeteriaOrCanteen_{{ $listing->id }}">
                                    @lang('listing.cafeteria_or_canteen')
                                    <i data-plugin="tippy" data-tippy-placement="top-start" title="Cafeteria Description" class="fas fa-info-circle"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.health_and_fitness')</h4>
                    <div class="row">
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[first_aid_medical_center]" type="hidden" value="no">
                                <input 
                                @if( property_exists($listing->features,'first_aid_medical_center') && $listing->features->first_aid_medical_center == 'yes') checked @endif   
                                id="firstAidMedicalCenter_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                name="edit_features_{{ $listing->id }}[first_aid_medical_center]" value="yes">
                                <label for="firstAidMedicalCenter_{{ $listing->id }}">
                                    @lang('listing.first_aid_medical_center')
                                   
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[gym_or_health_club]"  value="no" type="hidden">
                                <input 
                                @if( property_exists($listing->features,'gym_or_health_club') && $listing->features->gym_or_health_club == 'yes') checked @endif 
                                id="GymOrHealthClub_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes" name="edit_features_{{ $listing->id }}[gym_or_health_club]">
                                <label for="GymOrHealthClub_{{ $listing->id }}">
                                    @lang('listing.gym_or_health_club')                                  
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[jacuzzi]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[jacuzzi]"
                                @if( property_exists($listing->features,'jacuzzi') && $listing->features->jacuzzi == 'yes') checked @endif
                                id="jacuzzi_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="jacuzzi_{{ $listing->id }}">
                                    @lang('listing.jacuzzi')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[sauna]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[sauna]"
                                @if( property_exists($listing->features,'sauna') && $listing->features->sauna == 'yes') checked @endif
                                id="sauna_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="sauna_{{ $listing->id }}">
                                    @lang('listing.sauna')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[steam_room]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[steam_room]"
                                @if( property_exists($listing->features,'steam_room') && $listing->features->steam_room == 'yes') checked @endif
                                id="steam_room_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="steam_room_{{ $listing->id }}">
                                    @lang('listing.steam_room')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[swimming_pool]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[swimming_pool]"
                                @if( property_exists($listing->features,'swimming_pool') && $listing->features->swimming_pool == 'yes') checked @endif
                                
                                id="swimming_pool_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="swimming_pool_{{ $listing->id }}">
                                    @lang('listing.swimming_pool')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[facilities_for_disabled]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[facilities_for_disabled]"
                                @if( property_exists($listing->features,'facilities_for_disabled') && $listing->features->facilities_for_disabled == 'yes') checked @endif
                                
                                id="facilities_for_disabled_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="facilities_for_disabled_{{ $listing->id }}">
                                    @lang('listing.facilities_for_disabled')
                                    
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.laundry_and_kitchen')</h4>
                    <div class="row">
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[laundry_room]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[laundry_room]"
                                @if( property_exists($listing->features,'laundry_room') && $listing->features->laundry_room == 'yes') checked @endif
                               
                                id="laundry_room_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="laundry_room_{{ $listing->id }}">
                                    @lang('listing.laundry_room')
                                    
                                </label>
                            </div>
                   
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[laundry_facility]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[laundry_facility]"
                                @if( property_exists($listing->features,'laundry_facility') && $listing->features->laundry_facility == 'yes') checked @endif
                                
                                id="laundry_facility_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="laundry_facility_{{ $listing->id }}">
                                    @lang('listing.laundry_facility')
                                    
                                </label>
                            </div>
                       
                        </div>
                        <div class=" col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[shared_kitchen]" value="no" type="hidden">
                                <input
                                name="edit_features_{{ $listing->id }}[shared_kitchen]" 
                                @if( property_exists($listing->features,'shared_kitchen') && $listing->features->shared_kitchen == 'yes') checked @endif
                               
                                id="shared_kitchen_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="shared_kitchen_{{ $listing->id }}">
                                    @lang('listing.shared_kitchen')
                                    
                                </label>
                            </div>
                
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.building')</h4>
                    <div class="row">
                        <div class="col-md-3">

                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.completion_year')
                                    <span class="text-danger">*</span>
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                     value="{{ property_exists($listing->features, 'completion_year') ? $listing->features->completion_year : ''}}" 
                                    name="edit_features_{{ $listing->id }}[completion_year]" >
                           
                              
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.elevators_in_building')
                                 
                                     </label>
                                    <input type="text" class="form-control" value="{{  property_exists($listing->features,'elevators_in_building') ? $listing->features->elevators_in_building : ''}}" 
                                    name="edit_features_{{ $listing->id }}[elevators_in_building]" >
                           
                              
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.total_floors')
                                    <span class="text-danger">*</span>
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" value="{{ property_exists($listing->features, 'total_floors' ) ? $listing->features->total_floors : ''}}" 
                                    name="edit_features_{{ $listing->id }}[total_floors]" >
                           
                              
                            </div>
                  
                         
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[balcony_or_terrace]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[balcony_or_terrace]"
                                @if( property_exists($listing->features,'balcony_or_terrace') && $listing->features->balcony_or_terrace == 'yes') checked @endif

                                id="balcony_or_terrace_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="balcony_or_terrace_{{ $listing->id }}">
                                    @lang('listing.balcony_or_terrace')
                                    
                                </label>
                            </div>

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[service_elevator]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[service_elevator]"
                                @if( property_exists($listing->features,'service_elevator') && $listing->features->service_elevator == 'yes') checked @endif  
                                 id="service_elevator_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="service_elevator_{{ $listing->id }}">
                                    @lang('listing.service_elevator')
                                    
                                </label>
                            </div>
   
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[lobby_in_building]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[lobby_in_building]"
                                @if( property_exists($listing->features,'lobby_in_building') && $listing->features->lobby_in_building == 'yes') checked @endif 
                                id="lobby_in_building_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="lobby_in_building_{{ $listing->id }}">
                                    @lang('listing.lobby_in_building')
                                    
                                </label>
                            </div>


                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[prayer_room]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[prayer_room]" 
                                @if( property_exists($listing->features,'prayer_room') && $listing->features->prayer_room == 'yes') checked @endif
                                id="prayer_room_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="prayer_room_{{ $listing->id }}">
                                    @lang('listing.prayer_room')
                                    
                                </label>
                            </div>
                   
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted" style="flex:1;">@lang('listing.flooring')</label>
                                <div style="flex:2;">
                                    <select 
                                    class="form-control select2 choosen-features-select-{{ $listing->id }}"
                                     name="edit_features_{{ $listing->id }}[flooring]"
                                      data-toggle="select2" 
                                      data-placeholder="select">
                                        <option value=""></option>
                                        <option 
                                        @if( property_exists($listing->features,'flooring') && $listing->features->flooring == 'tiles') selected @endif
                                         value="tiles">@lang('listing.tiles')</option>
                                        <option
                                        @if( property_exists($listing->features,'flooring') && $listing->features->flooring == 'marble') selected @endif
                                         value="marble">@lang('listing.marble')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.business_and_security')</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[business_center]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[business_center]"
                                @if( property_exists($listing->features,'business_center') && $listing->features->business_center == 'yes') checked @endif
                              
                                id="business_center_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="business_center_{{ $listing->id }}">
                                    @lang('listing.business_center')
                                    
                                </label>
                            </div>
                       
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[conference_room]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[conference_room]"
                                @if( property_exists($listing->features,'conference_room') && $listing->features->conference_room == 'yes') checked @endif
                                
                                id="conference_room_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="conference_room_{{ $listing->id }}">
                                    @lang('listing.conference_room')
                                    
                                </label>
                            </div>
                       

                        </div>
                        <div class="col-md-3">


                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[security_stuff]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[security_stuff]"
                                @if( property_exists($listing->features,'security_stuff') && $listing->features->security_stuff == 'yes') checked @endif
                                id="security_stuff_{{ $listing->id }}" type="checkbox" 
                                class="choosen-features-{{ $listing->id }}"
                                value="yes">
                                <label for="security_stuff_{{ $listing->id }}">
                                    @lang('listing.security_stuff')
                                    
                                </label>
                            </div>
                    
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[cctv_security]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[cctv_security]"
                                @if( property_exists($listing->features,'cctv_security') && $listing->features->cctv_security == 'yes') checked @endif
                                 id="cctv_security_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="cctv_security_{{ $listing->id }}">
                                    @lang('listing.cctv_security')
                                </label>
                            </div>
                    
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.miscellaneous')</h4>
                    <div class="row">
                        <div class=" col-md-3">
                            <div class="form-group mb-2">
                                <input
                                
                                  type="text"
                                  class="form-control choosen-features-inputs-{{ $listing->id }}"
                                   name="edit_features_{{ $listing->id }}[view]"
                                   value="{{ in_array('view',(array)$listing->features) && $listing->features->view ? $listing->features->view : ''}}"
                                  id="view_{{ $listing->id }}" placeholder="@lang('listing.view')">
                            </div>
                            <div class="form-group">
                                <div style="flex:2;">
                                    <select 
                                    class="form-control select2 choosen-features-select-{{ $listing->id }}" name="edit_features_{{ $listing->id }}[pet_policy]" 
                                    data-toggle="select2" data-placeholder="@lang('listing.pet_policy')" >
                                        <option value=""></option>
                                        <option
                                        @if( property_exists($listing->features,'pet_policy') && $listing->features->pet_policy == 'allowed') selected @endif

                                         value="allowed">@lang('listing.allowed')</option>
                                        <option
                                        @if( property_exists($listing->features,'pet_policy') && $listing->features->pet_policy == 'not_allowed') selected @endif
                                         value="not_allowed">@lang('listing.not_allowed')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.land_area')
                                  
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                    value="{{ property_exists($listing->features, 'land_area' ) ? $listing->features->land_area : ''}}" 
                                    name="edit_features_{{ $listing->id }}[land_area]" >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_schools')
                                   
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                     value="{{ property_exists($listing->features, 'nearby_schools' ) ? $listing->features->nearby_schools : ''}}" 
                                    name="edit_features_{{ $listing->id }}[nearby_schools]" >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_public_transport')
                                  
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                    value="{{  property_exists($listing->features,'nearby_public_transport') ? $listing->features->nearby_public_transport : ''}}" 
                                    name="edit_features_{{ $listing->id }}[nearby_public_transport]" >
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.floor')</label>
                               <input 
                                 type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                  value="{{property_exists($listing->features,'floor') ? $listing->features->floor : ''}}" 
                                 name="edit_features_{{ $listing->id }}[floor]"
                                >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_rooms')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                   value="{{ property_exists($listing->features,'other_rooms') ? $listing->features->other_rooms : ''}}" 
                                  name="edit_features_{{ $listing->id }}[other_rooms]"
                                 >
                            </div>
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[maid_rooms]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[maid_rooms]"
                                @if( property_exists($listing->features,'maid_rooms') && $listing->features->maid_rooms == 'yes') checked @endif
                                
                                 id="maid_rooms_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="maid_rooms_{{ $listing->id }}">
                                    @lang('listing.maid_rooms')
                                </label>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_hospitals')</label>
                                <input 

                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                  value="{{ property_exists($listing->features, 'nearby_hospitals') ? $listing->features->nearby_hospitals : ''}}" 
                                  name="edit_features_{{ $listing->id }}[nearby_hospitals]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_nearby_places')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                  value="{{ property_exists($listing->features, 'other_nearby_places' ) ? $listing->features->other_nearby_places : ''}}" 
                                  name="edit_features_{{ $listing->id }}[other_nearby_places]"
                                 >
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_main_features')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                  value="{{ property_exists($listing->features, 'other_main_features' ) ? $listing->features->other_main_features : ''}}"
                                  
                                  name="edit_features_{{ $listing->id }}[other_main_features]"
                                 >
                            </div>
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[atm_facility]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[atm_facility]"
                                @if( property_exists($listing->features,'atm_facility') && $listing->features->atm_facility == 'yes') checked @endif
                                
                                 id="atm_facility_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="atm_facility_{{ $listing->id }}">
                                    @lang('listing.atm_facility')
                                </label>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.number_of_bathrooms')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                  value="{{ property_exists($listing->features, 'number_of_bathrooms') ? $listing->features->number_of_bathrooms : ''}}"
                                  name="edit_features_{{ $listing->id }}[number_of_bathrooms]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_shopping_malls')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                  value="{{ property_exists($listing->features, 'nearby_shopping_malls' ) ? $listing->features->nearby_shopping_malls : ''}}"
                                  name="edit_features_{{ $listing->id }}[nearby_shopping_malls]"
                                 >
                            </div>
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[24_hours_concierge]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[24_hours_concierge]"
                                @if( property_exists($listing->features,'24_hours_concierge') && $listing->features->{'24_hours_concierge'} == 'yes') checked @endif
                                 id="24_hours_concierge_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="24_hours_concierge_{{ $listing->id }}">
                                    @lang('listing.24_hours_concierge')
                                </label>
                          
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[free_hold]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[free_hold]"
                                @if( property_exists($listing->features,'free_hold') && $listing->features->free_hold == 'yes') checked @endif
                                 id="free_hold_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="free_hold_{{ $listing->id }}">
                                    @lang('listing.free_hold')
                                </label>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_facilities')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}" 
                                  value="{{ property_exists( $listing->features ,'other_facilities') ? $listing->features->other_facilities : ''}}"
                                  name="edit_features_{{ $listing->id }}[other_facilities]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.number_of_bedrooms')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                  value="{{ property_exists( $listing->features , 'number_of_bedrooms' ) ? $listing->features->number_of_bedrooms : ''}}"
                                  name="edit_features_{{ $listing->id }}[number_of_bedrooms]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.distance_from_airport')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                  value="{{ property_exists( $listing->features , 'distance_from_airport') ? $listing->features->distance_from_airport : ''}}"                         
                                  name="edit_features_{{ $listing->id }}[distance_from_airport]"
                                 >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.technology')</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[broad_band_internet]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[broad_band_internet]"
                               
                                @if( property_exists($listing->features,'broad_band_internet') && $listing->features->broad_band_internet == 'yes') checked @endif
                                 id="broad_band_internet_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="broad_band_internet_{{ $listing->id }}">
                                    @lang('listing.broad_band_internet')
                                </label>
                            </div>
               
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[satellite_cable_tv]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[satellite_cable_tv]"
                                @if( property_exists($listing->features,'satellite_cable_tv') && $listing->features->satellite_cable_tv == 'yes') checked @endif

                                 id="satellite_cable_tv_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="satellite_cable_tv_{{ $listing->id }}">
                                    @lang('listing.satellite_cable_tv')
                                </label>
                            </div>
              
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[intercom]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[intercom]"
                                @if( property_exists($listing->features,'intercom') && $listing->features->intercom == 'yes') checked @endif

                                 id="intercom_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="intercom_{{ $listing->id }}">
                                    @lang('listing.intercom')
                                </label>
                            </div>
                   
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.features')</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[double_glazed_windows]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[double_glazed_windows]"
                                @if( property_exists($listing->features,'double_glazed_windows') && $listing->features->double_glazed_windows == 'yes') checked @endif
                                 id="double_glazed_windows_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="double_glazed_windows_{{ $listing->id }}">
                                    @lang('listing.double_glazed_windows')
                                </label>
                            </div>
                   
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[centerally_air_conditioned]" value="no" type="hidden">
                                <input 
                                @if( property_exists($listing->features,'centerally_air_conditioned') && $listing->features->centerally_air_conditioned == 'yes') checked @endif
                                name="edit_features_{{ $listing->id }}[centerally_air_conditioned]"
                                 id="centerally_air_conditioned_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="centerally_air_conditioned_{{ $listing->id }}">
                                    @lang('listing.centerally_air_conditioned')
                                </label>
                            </div>
                     
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[central_heating]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[central_heating]"
                                @if( property_exists($listing->features,'central_heating') && $listing->features->central_heating == 'yes') checked @endif

                                 id="central_heating_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="central_heating_{{ $listing->id }}">
                                    @lang('listing.central_heating')
                                </label>
                            </div>
                  
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[electricity_backup]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[electricity_backup]"
                                @if( property_exists($listing->features,'electricity_backup') && $listing->features->electricity_backup == 'yes') checked @endif

                                 id="electricity_backup_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="electricity_backup_{{ $listing->id }}">
                                    @lang('listing.electricity_backup')
                                </label>
                            </div>
                   
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[furnitured]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[furnitured]"
                                @if( property_exists($listing->features,'furnitured') && $listing->features->furnitured == 'yes') checked @endif
                               
                                 id="furnitured_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="furnitured_{{ $listing->id }}">
                                    @lang('listing.furnitured')
                                </label>
                            </div>
                    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.parking_space')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs-{{ $listing->id }}"
                                  value="{{ property_exists( $listing->features , 'parking_space' ) ? $listing->features->parking_space : ''}}"
                                   
                                  name="edit_features_{{ $listing->id }}[parking_space]"
                                 >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[storage_area]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[storage_area]"
                                @if( property_exists($listing->features,'storage_area') && $listing->features->storage_area == 'yes') checked @endif
                                
                                 id="storage_area_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="storage_area_{{ $listing->id }}">
                                    @lang('listing.storage_area')
                                </label>
                            </div>
                  
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[study_room]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[study_room]"
                                @if( property_exists($listing->features,'study_room') && $listing->features->study_room == 'yes') checked @endif
                                 id="study_room_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="study_room_{{ $listing->id }}">
                                    @lang('listing.study_room')
                                </label>
                            </div>
                      
                        </div>
                    </div>
                </div>
                <div class="feature-section">                                                
                    <h4 class="font-weight-bold mb-2">@lang('listing.cleaning_and_maintenance')</h4>
                    <div class="row">
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[waste_disposal]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[waste_disposal]"
                                @if( property_exists($listing->features,'waste_disposal') && $listing->features->waste_disposal == 'yes') checked @endif
                                
                                 id="waste_disposal_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="waste_disposal_{{ $listing->id }}">
                                    @lang('listing.waste_disposal')
                                </label>
                            </div>
                    
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[maintenance_stuff]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[maintenance_stuff]"
                                @if( property_exists($listing->features,'maintenance_stuff') && $listing->features->maintenance_stuff == 'yes') checked @endif
                                
                                 id="maintenance_stuff_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="maintenance_stuff_{{ $listing->id }}">
                                    @lang('listing.maintenance_stuff')
                                </label>
                            </div>
                      
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="edit_features_{{ $listing->id }}[cleaning_services]" value="no" type="hidden">
                                <input 
                                name="edit_features_{{ $listing->id }}[cleaning_services]"
                                @if( property_exists($listing->features,'cleaning_services') && $listing->features->cleaning_services == 'yes') checked @endif
                                
                                 id="cleaning_services_{{ $listing->id }}" type="checkbox" 
                                 class="choosen-features-{{ $listing->id }}"
                                 value="yes">
                                <label for="cleaning_services_{{ $listing->id }}">
                                    @lang('listing.cleaning_services')
                                </label>
                            </div>
                   
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                    <button 
                        type="button"
                        class="btn btn-success"
                        onclick="updateListingFeatures(
                        {{ $listing->id }},'{{ route('listings.update-listing-features') }}',
                       '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )">@lang('listing.update')</button>
        
        
                </div>
            </div>
        </div><!-- /.modal-content -->

      
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

