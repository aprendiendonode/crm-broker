<div class="card-box">

    {{-- <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#locations" data-toggle="tab" aria-expanded="false" class="nav-link active">
                @lang('listing.locations')
            </a>
        </li>

       
    </ul> --}}


    {{-- <div class="tab-content"> --}}
        {{-- <div class="tab-pane active" id="locations"> --}}
            <button type="button" style="float: right;" class="btn btn-primary mb-2" data-toggle="modal" data-target="#locations-modal-{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
                <div>
                    <table class="table table-striped table-info-summary">
                                
                        <tbody>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.location')
                                </td>
                                <td class="listing-locations-location-{{ $listing->id }}">
                                    {{ $listing->location}}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200" >
                                    @lang('listing.city')
                                </td>
                                <td class="listing-locations-city-{{ $listing->id }}">
                                    {{ $listing->city->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                     
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.community')
                                </td>
                                <td class="listing-locations-community-{{ $listing->id }}">
                                    {{ $listing->community->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.sub_community')
                                </td>
                                <td class="listing-locations-sub-community-{{ $listing->id }}">
                                    {{ $listing->subCommunity->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.unit')
                                </td>
                                <td class="listing-locations-unit-{{ $listing->id }}">
                                    {{ $listing->unit_no }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.floor')
                                </td>
                                <td class="listing-locations-plot-{{ $listing->id }}">
                                    {{ $listing->plot_no }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.street')
                                </td>
                                <td class="listing-locations-street-{{ $listing->id }}">
                                    {{ $listing->street_no }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                     
                 
                      
                        </tbody>
                        
                        
                     </table>
           

                </div>
            
            </div>
        
        {{-- </div>
    
    </div> --}}


    <div id="locations-modal-{{ $listing->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">

                    <div class="form-group">
                        <div class="card-box">
                            <h4 class="header-title mb-3">@lang('listing.location')</h4>        
                            <div id="map_{{ $listing->id }}" class="gmaps" ></div>
                        </div> <!-- end card-box-->
                    </div> <!-- end col-->
 
                    <div class="form-group" >

                        <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.location')</label>
                        <div class="d-flex align-items-center" style="flex:2">
                            <input
                             type="text" class="form-control listing-location-{{ $listing->id }}"
                             name="edit_location_{{ $listing->id }}" id="location_input_{{ $listing->id }}"  
                            value="{{ old('edit_location_'.$listing->id,$listing->location) }}" 
                             placeholder="">
                             <input type="hidden"
                             class="listing-loc-lat-{{ $listing->id }}"
                              name="edit_loc_lat_{{ $listing->id }}"
                               id="latitude_{{ $listing->id }}" value="{{ old('edit_loc_lat_'.$listing->id,$listing->loc_lat) }}" >
                             <input type="hidden" 
                             name="edit_loc_lng_{{ $listing->id }}"
                             class="listing-loc-lng-{{ $listing->id }}"
                              id="longitude_{{ $listing->id }}" value="{{ old('edit_loc_lng_'.$listing->id,$listing->loc_lng) }}">
                       
                        </div>
                    </div>
        
                 <div class="form-group">
        
                    <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
                    <div style="flex:2;">
                        <select
                          
                         onchange="getCommunitites('edit',{{ $listing->id }})" 
                         class="form-control select2 listing-city-{{ $listing->id }} city-in-edit-{{ $listing->id }}".
                          name="edit_city_id_{{ $listing->id }}"
                         data-toggle="select2" data-placeholder="@lang('listing.city')">
                                <option value=""></option>
                            
                            @foreach($cities as $city)
                                <option @if(old('edit_city_id_'.$listing->id,$listing->city_id) == $city->id  ) selected @endif value="{{ $city->id }}">
                                    {{ $city->{'name_'.app()->getLocale()} }}
                                </option>
                            @endforeach
        
                        </select>
                  
                    </div>
                </div>
        
        
        
            <div class="form-group">
        
                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') <span class="text-danger">*</span></label>
                <div style="flex:2;">
                    <select 
                     onchange="getSubCommunities('edit',{{ $listing->id }})" 
                     class="form-control select2 listing-community-{{ $listing->id }} community-in-edit-{{ $listing->id }}" name="edit_community_id_{{ $listing->id }}"
                     data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
                     <option value=""></option>
                     @foreach($communities->where('city_id',$listing->city_id) as $community)
                     <option class="edit-appended-communities-{{ $listing->id }}"
                        @if(old('edit_community_id_'.$listing->id,$listing->community_id) == $community->id)  
                         selected  
                         @endif
                         value="{{ $community->id }}">
        
                        {{ $community->{'name_'.app()->getLocale()}  }}
                     </option>
                     @endforeach
              
                        
                     
        
                    </select>
              
                </div>
            </div>
        
        
            <div class="form-group">
        
                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.sub_community')</label>
                <div style="flex:2;">
                    <select class="form-control select2 sub-community-in-edit-{{ $listing->id }} listing-sub-community-{{ $listing->id }}" name="edit_sub_community_id_{{ $listing->id }}"
                     data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
                     <option value=""></option>
        
                     @foreach($sub_communities->where('community_id',$listing->community_id) as $sub_community)
                     <option class="edit-appended-sub-communities-{{ $listing->id }}"
                     @if(old('edit_sub_community_id_'.$listing->id,$listing->sub_community_id) == $sub_community->id)  
                     selected  
                     @endif
                     value="{{ $sub_community->id }}">
        
                    {{ $sub_community->{'name_'.app()->getLocale()}  }}
                 </option>
                 @endforeach
          
                        
                    </select>
              
                </div>
            </div>
        
        
                
                <div class="form-group">
                    <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.unit')</label>
                    <div class="d-flex" style="flex:2">
                        <input type="text" class="form-control mr-2 listing-unit-{{ $listing->id }}"
                        placeholder="@lang('listing.unit')"
                         name="edit_unit_no_{{ $listing->id }}" data-plugin="tippy" data-tippy-placement="top-start" 
                        title="@lang('listing.unit')" id="unit_{{ $listing->id }}"  value="{{ old('edit_unit_no_'.$listing->id,$listing->unit_no) }}">
                        <input type="text" class="form-control mr-2 listing-plot-{{ $listing->id }}"
                         data-plugin="tippy" data-tippy-placement="top-start" title="@lang('listing.plot')" placeholder="@lang('listing.plot')"
                         name="edit_plot_no_{{ $listing->id }}" id="plot_{{ $listing->id }}"  value="{{ old('edit_plot_no_'.$listing->id,$listing->plot_no) }}">
                        <input type="text" data-plugin="tippy" 
                        placeholder="@lang('street')"
                        data-tippy-placement="top-start" title="@lang('listing.street')" class="form-control listing-street-{{ $listing->id }}"
                         name="edit_street_no_{{ $listing->id }}" id="street_{{ $listing->id }}"  value="{{ old('edit_street_no_'.$listing->id,$listing->street_no) }}">
                    </div>
                </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                    <button type="button" class="btn btn-success" onclick="updateListingLocation(
                        {{ $listing->id }},'{{ route('listings.update-listing-locations') }}',
                     '{{ csrf_token() }}', '{{ $listing->agency_id }}' , '{{ $listing->business_id }}' ,'{{ app()->getLocale()  }}' )">@lang('listing.modify')</button>
                </div>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div> <!-- end card-box-->