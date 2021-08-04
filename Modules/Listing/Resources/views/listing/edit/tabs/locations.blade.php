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
                                <td>
                                    {{ $listing->location}}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.city')
                                </td>
                                <td>
                                    {{ $listing->city->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                     
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.community')
                                </td>
                                <td>
                                    {{ $listing->community->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.sub_community')
                                </td>
                                <td>
                                    {{ $listing->sub_community->{'name_'.app()->getLocale()} ?? '' }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.unit')
                                </td>
                                <td>
                                    {{ $listing->unit }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.floor')
                                </td>
                                <td>
                                    {{ $listing->floor }}
                                    <!-- ko foreach: externalListings --><!-- /ko -->
                                </td>
                            </tr>
                            <tr>
                              
                                <td width="200">
                                    @lang('listing.street')
                                </td>
                                <td>
                                    {{ $listing->street }}
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
                            <input type="text" class="form-control" name="edit_location_{{ $listing->id }}" id="location_input_{{ $listing->id }}"  
                            value="{{ old('edit_location_'.$listing->id,$listing->location) }}" 
                             placeholder="">
                             <input type="hidden" name="edit_loc_lat_{{ $listing->id }}" id="latitude_{{ $listing->id }}" value="{{ old('edit_loc_lat_'.$listing->id,$listing->loc_lat) }}" >
                             <input type="hidden" name="edit_loc_lng_{{ $listing->id }}" id="longitude_{{ $listing->id }}" value="{{ old('edit_loc_lng_'.$listing->id,$listing->loc_lng) }}">
                       
                        </div>
                    </div>
        
                 <div class="form-group">
        
                    <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
                    <div style="flex:2;">
                        <select required onchange="getCommunitites('edit',{{ $listing->id }})" class="form-control select2 city-in-edit-{{ $listing->id }}" name="edit_city_id_{{ $listing->id }}"
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
                    <select required onchange="getSubCommunities('edit',{{ $listing->id }})" class="form-control select2 community-in-edit-{{ $listing->id }}" name="edit_community_id_{{ $listing->id }}"
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
                    <select class="form-control select2 sub-community-in-edit-{{ $listing->id }}" name="edit_sub_community_id_{{ $listing->id }}"
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
                        <input type="text" class="form-control mr-2"
                        placeholder="@lang('listing.unit')"
                         name="edit_unit_no_{{ $listing->id }}" data-plugin="tippy" data-tippy-placement="top-start" 
                        title="@lang('listing.unit')" id="unit_{{ $listing->id }}"  value="{{ old('edit_unit_no_'.$listing->id,$listing->unit_no) }}">
                        <input type="text" class="form-control mr-2"
                         data-plugin="tippy" data-tippy-placement="top-start" title="@lang('listing.plot')" placeholder="@lang('listing.plot')"
                         name="edit_plot_no_{{ $listing->id }}" id="plot_{{ $listing->id }}"  value="{{ old('edit_plot_no_'.$listing->id,$listing->plot_no) }}">
                        <input type="text" data-plugin="tippy" 
                        placeholder="@lang('street')"
                        data-tippy-placement="top-start" title="@lang('listing.street')" class="form-control"
                         name="edit_street_no_{{ $listing->id }}" id="street_{{ $listing->id }}"  value="{{ old('edit_street_no_'.$listing->id,$listing->street_no) }}">
                    </div>
                </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('listing.close')</button>
                </div>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div> <!-- end card-box-->