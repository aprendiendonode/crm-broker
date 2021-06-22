<div class="modal fade" id="featuresModal" tabindex="-1" role="dialog" aria-labelledby="featuresModalLabel" aria-hidden="true">
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
                                <input  type="hidden" name="features[barbeque_area]" value="no">
                                <input
                              
                                 id="barbequeArea" class="choosen-features" type="checkbox" value="yes" name="features[barbeque_area]">
                                <label for="barbequeArea">
                                   @lang('listing.barbeque_area') 
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="features[day_care_center]"  value="no">
                                <input 
                                value="yes"
                               
                                id="dayCareCenter" class="choosen-features" type="checkbox" name="features[day_care_center]" >
                                <label for="dayCareCenter">
                                    @lang('listing.day_care_center') 
                                   
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="features[kids_play_area]">
                                <input id="kidsPlayArea" class="choosen-features" type="checkbox" name="features[kids_play_area]" value="yes"> 
                                <label for="kidsPlayArea">
                                   @lang('listing.kids_play_area') 
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="features[lawn_or_garden]" value="no">
                                <input
                               
                                 id="lawnOrGarden" class="choosen-features" type="checkbox" name="features[lawn_or_garden]" value="yes">
                                <label for="lawnOrGarden">
                               
                                    @lang('listing.lawn_or_garden') 
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input  type="hidden" name="features[cafeteria_or_canteen]" value="no">
                                <input
                                
                                 id="cafeteriaOrCanteen" class="choosen-features" type="checkbox" name="features[cafeteria_or_canteen]" value="yes">
                                <label for="cafeteriaOrCanteen">
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
                                <input name="features[first_aid_medical_center]" type="hidden" value="no">
                                <input 
                                    
                                id="firstAidMedicalCenter" class="choosen-features" type="checkbox" name="features[first_aid_medical_center]" value="yes">
                                <label for="firstAidMedicalCenter">
                                    @lang('listing.first_aid_medical_center')
                                   
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[gym_or_health_club]"  value="no" type="hidden">
                                <input 
                                
                                id="GymOrHealthClub" class="choosen-features" type="checkbox" value="yes" name="features[gym_or_health_club]">
                                <label for="GymOrHealthClub">
                                    @lang('listing.gym_or_health_club')                                  
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[jacuzzi]" value="no" type="hidden">
                                <input 
                                name="features[jacuzzi]"
                                id="jacuzzi" class="choosen-features" type="checkbox" value="yes">
                                <label for="jacuzzi">
                                    @lang('listing.jacuzzi')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[sauna]" value="no" type="hidden">
                                <input 
                                name="features[sauna]"
                                id="sauna" class="choosen-features" type="checkbox" value="yes">
                                <label for="sauna">
                                    @lang('listing.sauna')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[steam_room]" value="no" type="hidden">
                                <input 
                                name="features[steam_room]"
                                id="steam_room" class="choosen-features" type="checkbox" value="yes">
                                <label for="steam_room">
                                    @lang('listing.steam_room')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[swimming_pool]" value="no" type="hidden">
                                <input 
                                name="features[swimming_pool]"
                                id="swimming_pool" class="choosen-features" type="checkbox" value="yes">
                                <label for="swimming_pool">
                                    @lang('listing.swimming_pool')
                                    
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[facilities_for_disabled]" value="no" type="hidden">
                                <input 
                                name="features[facilities_for_disabled]"
                                id="facilities_for_disabled" class="choosen-features" type="checkbox" value="yes">
                                <label for="facilities_for_disabled">
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
                                <input name="features[laundry_room]" value="no" type="hidden">
                                <input 
                                name="features[laundry_room]"
                                id="laundry_room" class="choosen-features" type="checkbox" value="yes">
                                <label for="laundry_room">
                                    @lang('listing.laundry_room')
                                    
                                </label>
                            </div>
                   
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[laundry_facility]" value="no" type="hidden">
                                <input 
                                name="features[laundry_facility]"
                                id="laundry_facility" class="choosen-features" type="checkbox" value="yes">
                                <label for="laundry_facility">
                                    @lang('listing.laundry_facility')
                                    
                                </label>
                            </div>
                       
                        </div>
                        <div class=" col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[shared_kitchen]" value="no" type="hidden">
                                <input 
                                name="features[shared_kitchen]"
                                id="shared_kitchen" class="choosen-features" type="checkbox" value="yes">
                                <label for="shared_kitchen">
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
                                    <input type="text" class="form-control choosen-features-inputs" value="" 
                                    name="features[completion_year]" >
                           
                              
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.elevators_in_building')
                                 
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs" value="" 
                                    name="features[elevators_in_building]" >
                           
                              
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.total_floors')
                                    <span class="text-danger">*</span>
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs" value="" 
                                    name="features[total_floors]" >
                           
                              
                            </div>
                  
                         
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[balcony_or_terrace]" value="no" type="hidden">
                                <input 
                                name="features[balcony_or_terrace]"
                                id="balcony_or_terrace" class="choosen-features" type="checkbox" value="yes">
                                <label for="balcony_or_terrace">
                                    @lang('listing.balcony_or_terrace')
                                    
                                </label>
                            </div>

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[service_elevator]" value="no" type="hidden">
                                <input 
                                name="features[service_elevator]"
                                id="service_elevator" class="choosen-features" type="checkbox" value="yes">
                                <label for="service_elevator">
                                    @lang('listing.service_elevator')
                                    
                                </label>
                            </div>
   
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[lobby_in_building]" value="no" type="hidden">
                                <input 
                                name="features[lobby_in_building]"
                                id="lobby_in_building" class="choosen-features" type="checkbox" value="yes">
                                <label for="lobby_in_building">
                                    @lang('listing.lobby_in_building')
                                    
                                </label>
                            </div>


                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[prayer_room]" value="no" type="hidden">
                                <input 
                                name="features[prayer_room]"
                                id="prayer_room" class="choosen-features" type="checkbox" value="yes">
                                <label for="prayer_room">
                                    @lang('listing.prayer_room')
                                    
                                </label>
                            </div>
                   
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <label class="mb-1 font-weight-medium text-muted" style="flex:1;">@lang('listing.flooring')</label>
                                <div style="flex:2;">
                                    <select class="form-control select2 choosen-features-select"
                                     name="features[flooring]" data-toggle="select2" data-placeholder="select"
                                  
                                     >
                                        <option value=""></option>
                                        <option 
                                         value="tiles">@lang('listing.tiles')</option>
                                        <option
                                         
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
                                <input name="features[business_center]" value="no" type="hidden">
                                <input 
                                name="features[business_center]"
                                id="business_center" class="choosen-features" type="checkbox" value="yes">
                                <label for="business_center">
                                    @lang('listing.business_center')
                                    
                                </label>
                            </div>
                       
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[conference_room]" value="no" type="hidden">
                                <input 
                                name="features[conference_room]"
                                id="conference_room" class="choosen-features" type="checkbox" value="yes">
                                <label for="conference_room">
                                    @lang('listing.conference_room')
                                    
                                </label>
                            </div>
                       

                        </div>
                        <div class="col-md-3">


                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[security_stuff]" value="no" type="hidden">
                                <input 
                                name="features[security_stuff]"
                                id="security_stuff" class="choosen-features" type="checkbox" value="yes">
                                <label for="security_stuff">
                                    @lang('listing.security_stuff')
                                    
                                </label>
                            </div>
                    
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[cctv_security]" value="no" type="hidden">
                                <input 
                                name="features[cctv_security]"
                                 id="cctv_security" class="choosen-features" type="checkbox" value="yes">
                                <label for="cctv_security">
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
                                   class="form-control choosen-features-inputs"
                                   name="features[view]"
                                   value=""
                                  placeholder="@lang('listing.view')">
                            </div>
                            <div class="form-group">
                                <div style="flex:2;">
                                    <select 
                                    class="form-control select2 choosen-features-select" name="features[pet_policy]" 
                                    data-toggle="select2" data-placeholder="@lang('listing.pet_policy')" >
                                        <option value=""></option>
                                        <option value="allowed">@lang('listing.allowed')</option>
                                        <option value="not_allowed">@lang('listing.not_allowed')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.land_area')
                                  
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs" value="" 
                                    name="features[land_area]" >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_schools')
                                   
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs" value="" 
                                    name="features[nearby_schools]" >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_public_transport')
                                  
                                     </label>
                                    <input type="text" class="form-control choosen-features-inputs" value="" 
                                    name="features[nearby_public_transport]" >
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.floor')</label>
                               <input 
                                 type="text" class="form-control choosen-features-inputs" value="" 
                                 name="features[floor]"
                                >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_rooms')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[other_rooms]"
                                 >
                            </div>
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[maid_rooms]" value="no" type="hidden">
                                <input 
                                name="features[maid_rooms]"
                                 id="maid_rooms" class="choosen-features " type="checkbox" value="yes">
                                <label for="maid_rooms">
                                    @lang('listing.maid_rooms')
                                </label>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_hospitals')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[nearby_hospitals]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_nearby_places')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[other_nearby_places]"
                                 >
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_main_features')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[other_main_features]"
                                 >
                            </div>
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[atm_facility]" value="no" type="hidden">
                                <input 
                                name="features[atm_facility]"
                                 id="atm_facility" class="choosen-features" type="checkbox" value="yes">
                                <label for="atm_facility">
                                    @lang('listing.atm_facility')
                                </label>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.number_of_bathrooms')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[number_of_bathrooms]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.nearby_shopping_malls')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[nearby_shopping_malls]"
                                 >
                            </div>
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[24_hours_concierge]" value="no" type="hidden">
                                <input 
                                name="features[24_hours_concierge]"
                                 id="24_hours_concierge" class="choosen-features" type="checkbox" value="yes">
                                <label for="24_hours_concierge">
                                    @lang('listing.24_hours_concierge')
                                </label>
                          
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[free_hold]" value="no" type="hidden">
                                <input 
                                name="features[free_hold]"
                                 id="free_hold" class="choosen-features" type="checkbox" value="yes">
                                <label for="free_hold">
                                    @lang('listing.free_hold')
                                </label>
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.other_facilities')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[other_facilities]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.number_of_bedrooms')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[number_of_bedrooms]"
                                 >
                            </div>
                            <div class="form-group mb-2">
                                <label class="font-weight-medium text-muted" for="">@lang('listing.distance_from_airport')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[distance_from_airport]"
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
                                <input name="features[broad_band_internet]" value="no" type="hidden">
                                <input 
                                name="features[broad_band_internet]"
                                 id="broad_band_internet" class="choosen-features" type="checkbox" value="yes">
                                <label for="broad_band_internet">
                                    @lang('listing.broad_band_internet')
                                </label>
                            </div>
               
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[satellite_cable_tv]" value="no" type="hidden">
                                <input 
                                name="features[satellite_cable_tv]"
                                 id="satellite_cable_tv" class="choosen-features" type="checkbox" value="yes">
                                <label for="satellite_cable_tv">
                                    @lang('listing.satellite_cable_tv')
                                </label>
                            </div>
              
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[intercom]" value="no" type="hidden">
                                <input 
                                name="features[intercom]"
                                 id="intercom" class="choosen-features" type="checkbox" value="yes">
                                <label for="intercom">
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
                                <input name="features[double_glazed_windows]" value="no" type="hidden">
                                <input 
                                name="features[double_glazed_windows]"
                                 id="double_glazed_windows" class="choosen-features" type="checkbox" value="yes">
                                <label for="double_glazed_windows">
                                    @lang('listing.double_glazed_windows')
                                </label>
                            </div>
                   
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[centerally_air_conditioned]" value="no" type="hidden">
                                <input 
                                name="features[centerally_air_conditioned]"
                                 id="centerally_air_conditioned" class="choosen-features" type="checkbox" value="yes">
                                <label for="centerally_air_conditioned">
                                    @lang('listing.centerally_air_conditioned')
                                </label>
                            </div>
                     
                        </div>
                        <div class="col-md-3">

                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[central_heating]" value="no" type="hidden">
                                <input 
                                name="features[central_heating]"
                                 id="central_heating" class="choosen-features" type="checkbox" value="yes">
                                <label for="central_heating">
                                    @lang('listing.central_heating')
                                </label>
                            </div>
                  
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[electricity_backup]" value="no" type="hidden">
                                <input 
                                name="features[electricity_backup]"
                                 id="electricity_backup" class="choosen-features" type="checkbox" value="yes">
                                <label for="electricity_backup">
                                    @lang('listing.electricity_backup')
                                </label>
                            </div>
                   
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[furnitured]" value="no" type="hidden">
                                <input 
                                name="features[furnitured]"
                                 id="furnitured" class="choosen-features" type="checkbox" value="yes">
                                <label for="furnitured">
                                    @lang('listing.furnitured')
                                </label>
                            </div>
                    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">

                                <label class="font-weight-medium text-muted" for="">@lang('listing.parking_space')</label>
                                <input 
                                  type="text" class="form-control choosen-features-inputs" value="" 
                                  name="features[parking_space]"
                                 >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[storage_area]" value="no" type="hidden">
                                <input 
                                name="features[storage_area]"
                                 id="storage_area" class="choosen-features" type="checkbox" value="yes">
                                <label for="storage_area">
                                    @lang('listing.storage_area')
                                </label>
                            </div>
                  
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[study_room]" value="no" type="hidden">
                                <input 
                                name="features[study_room]"
                                 id="study_room" class="choosen-features" type="checkbox" value="yes">
                                <label for="study_room">
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
                                <input name="features[waste_disposal]" value="no" type="hidden">
                                <input 
                                name="features[waste_disposal]"
                                 id="waste_disposal" class="choosen-features" type="checkbox" value="yes">
                                <label for="waste_disposal">
                                    @lang('listing.waste_disposal')
                                </label>
                            </div>
                    
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[maintenance_stuff]" value="no" type="hidden">
                                <input 
                                name="features[maintenance_stuff]"
                                 id="maintenance_stuff" class="choosen-features" type="checkbox" value="yes">
                                <label for="maintenance_stuff">
                                    @lang('listing.maintenance_stuff')
                                </label>
                            </div>
                      
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox checkbox-primary mb-2">
                                <input name="features[cleaning_services]" value="no" type="hidden">
                                <input 
                                name="features[cleaning_services]"
                                 id="cleaning_services" class="choosen-features" type="checkbox" value="yes">
                                <label for="cleaning_services">
                                    @lang('listing.cleaning_services')
                                </label>
                            </div>
                   
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer px-3">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

