 <div class="col-md-4">
        <h4 class="mb-3">@lang('listing.location_price')</h4>
            <div class="form-group">
                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.type')<span class="text-danger"> *</span></label>
                <div style="flex:2;">
                    <select class="form-control select2 listing_type" onchange="showFurnishedQuestion();"  name="type_id" data-toggle="select2" data-placeholder="@lang('listing.listing_types')" required>
                        <option value=""></option>
                            <optgroup label="@lang('listing.residential')">
                                @foreach($listing_types->where('type','residential') as $type)
                                <option 
                                data-furnished="{{ $type->furnished_question }}"
                                @if(old('type_id') == $type->id) selected @endif
                                value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                @endforeach

                            </optgroup>
                            <optgroup label="@lang('listing.commercial')">
                                @foreach($listing_types->where('type','commercial') as $type)
                                <option value="{{ $type->id }}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                                @endforeach

                            </optgroup>
            
                    </select>
                </div>
            </div>
            <div class="form-group d-flex align-items-center" style="height: 64px;">
                <label class="font-weight-medium text-muted mr-3">@lang('listing.purpose')<span class="text-danger">*</span></label>
                <div style="display:flex;">
                    <div class="radio mr-3">
                        <input type="radio" name="purpose" id="radio1" value="rent" @if(old('purpose')  ) checked @endif class="rent-radio" onchange="showRentDiv()">
                        <label for="radio1">
                            @lang('listing.rent')
                        </label>
                    </div>
                    <div class="radio">
                        <input type="radio" name="purpose" id="radio2" value="sale" @if(old('purpose','sale') == 'sale' ) checked @endif onchange="showRentDiv()">
                        <label for="radio2">
                            @lang('listing.sale')
                        </label>
                    </div>
                </div>
            </div>
          
            <div class="form-group" >
                    <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.location')</label>
                    <div class="d-flex align-items-center" style="flex:2">
                        <input type="text" class="form-control" name="location"  id="location_input"  value="{{ old('location') }}" 
                         >
                         <input type="hidden" name="loc_lat" id="latitude" value="{{ old('loc_lat') }}" >
                         <input type="hidden" name="loc_lng" id="longitude" value="{{ old('loc_long') }}">
                     
                        <div class="text-center pl-1">
                            {{-- <i class="fas fa-map-marker-alt" style="font-size:1.2rem"  onclick="initModal()"></i> --}}
                            <i class="fas fa-map-marker-alt" style="font-size:1.2rem"  data-toggle="modal" data-target="#map-modal"></i>
                        </div>
                    </div>
                </div>


                <div class="form-group">

                    <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')<span class="text-danger">*</span></label>
                    <div style="flex:2;">
                        <select required onchange="getCommunitites('create',null)" class="form-control select2 city-in-create" name="city_id"
                         data-toggle="select2" data-placeholder="@lang('listing.city')">
                                <option value=""></option>
                            
                            @foreach($cities as $city)
                                <option @if(old('city_id') == $city->id  ) selected @endif value="{{ $city->id }}">
                                    {{ $city->{'name_'.app()->getLocale()} }}
                                </option>
                            @endforeach
    
                        </select>
                  
                    </div>
                </div>


    
            <div class="form-group">

                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') <span class="text-danger">*</span></label>
                <div style="flex:2;">
                    <select required onchange="getSubCommunities('create',null)" class="form-control select2 community-in-create" name="community_id"
                     data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
                            <option value=""></option>
                        
                            @if(old('city_id'))
                        @if(old('community_id'))
                            @foreach($communities->where('city_id',old('city_id')) as $community)
                                <option class="create-appended-communities"
                                    @if(old('community_id') == $community->id)  
                                        selected  
                                        @endif
                                        value="{{ $community->id }}">
                    
                                    {{ $community->{'name_'.app()->getLocale()}  }}
                                </option>
                            @endforeach
                        @endif
                    @endif    
                    
     

                    </select>
              
                </div>
            </div>


            <div class="form-group">

                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.sub_community')</label>
                <div style="flex:2;">
                    <select class="form-control select2 sub-community-in-create" name="sub_community_id"
                     data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
                            <option value=""></option>

                            @if(old('city_id') && old('community_id'))
                            @if(old('sub_community_id'))
                                @foreach($sub_communities->where('community_id',old('community_id')) as $sub_community)
                                    <option class="create-appended-sub-communities"
                                        @if(old('sub_community_id') == $sub_community->id)  
                                            selected  
                                            @endif
                                            value="{{ $sub_community->id }}"
                                    >
                        
                                        {{ $sub_community->{'name_'.app()->getLocale()}  }}
                                    </option>
                                @endforeach
                            @endif
                        @endif  
                    </select>
              
                </div>
            </div>


            <div class="form-group">
                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.unit')</label>
                <div class="d-flex" style="flex:2">
                    <input type="text" class="form-control mr-2"
                    placeholder="@lang('listing.unit')"
                     name="unit_no" data-plugin="tippy" data-tippy-placement="top-start" 
                    title="Unit" id="unit"  value="{{ old('unit_no') }}">
                    <input type="text" class="form-control mr-2"
                     data-plugin="tippy" data-tippy-placement="top-start" title="Plot" placeholder="@lang('listing.plot')"
                     name="plot_no" id="plot"  value="{{ old('plot_no') }}">
                    <input type="text" data-plugin="tippy" 
                    placeholder="@lang('street')"
                    data-tippy-placement="top-start" title="Street" class="form-control"
                     name="street_no" id="street"  value="{{ old('street_no') }}">
                </div>
            </div>
            <div class="form-group">

                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.views')<span class="text-danger"> *</span></label>
                <div style="flex:2;">
                    <select class="form-control select2" multiple="multiple" name="view_ids[]"
                     data-toggle="select2" data-placeholder="@lang('listing.views')">
                            <option value=""></option>
                        
                        @foreach($listing_views as $view)
                            <option @if(old('view_ids') && in_array($view->id,old('view_ids'))  ) selected @endif value="{{ $view->id }}">
                                {{ $view->{'name_'.app()->getLocale()} }}
                            </option>
                        @endforeach

                    </select>
              
                </div>
            </div>
   
            <div class="form-group">
                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent')<span class="text-danger"> *</span></label>
                <div class="input-group mb-2" >
                    <input onkeyup="float_numbers()" type="text"  value="{{ old('price') }}" class="form-control decimal_convert" 
                           name="price" id="rent" required>
                    {{-- <div class="input-group-prepend">
                        <div class="input-group-text">AED</div>
                    </div> --}}
                </div>
            </div>
            <div class="form-group">

                {{-- rent paid every month,week,day,year --}}
                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.rent_frequency')</label>
                <div class="d-flex" style="flex:2">
                    <select name="rent_frequency" class="form-control select2" 
                       name="Frequency" data-toggle="select2" data-placeholder="@lang('listing.rent_frequency')">
                        <option value=""></option>
                        <option @if(old('rent_frequency') == 'yearly') selected @endif value="yearly">
                            @lang('listing.yearly')
                        </option>
                        <option @if(old('rent_frequency') == 'monthly') selected @endif value="monthly">
                            @lang('listing.monthly')
                        </option>
                        <option @if(old('rent_frequency') == 'weekly') selected @endif value="weekly">
                            @lang('listing.weekly')
                        </option>
                        <option @if(old('rent_frequency') == 'daily') selected @endif value="daily">
                            @lang('listing.daily')
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="font-weight-medium text-muted" style="flex:1">@lang('listing.annual_commission')</label>
                <div style="flex:2">
                    <div class="d-flex">
                        <div class="input-group mb-2 mr-sm-2" >
                            <input
                            name ="comission_percent"
                            value="{{ old('comission_percent') }}"
                             type="text" class="form-control" 
                             id="inlineFormInputGroupUsername1"
                             data-tippy-placement="top-start" title=""
                             >
                            <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                            </div>
                        </div>
                        <div class="input-group mb-2" >
                            <input
                            name="comission_value"
                            value="{{ old('comission_value') }}"
                             type="text" class="form-control"
                              id="inlineFormInputGroupUsername2"
                               data-tippy-placement="top-start"
                                title=""
                                >
                            <div class="input-group-prepend">
                                <div class="input-group-text">AED</div>
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <div class="checkbox checkbox-primary mb-2">
                            <input type="hidden" name="never_lived_in" value="no">
                            <input 
                            @if(old('never_lived_in') == 'yes') checked @endif
                            id="neverLivedIn"  type="checkbox" name="never_lived_in" value="yes">
                            <label for="neverLivedIn">
                               @lang('listing.never_lived_in') 
                            </label>
                        </div>
                        <div class="checkbox checkbox-primary mb-2">
                            <input  value="no" type="hidden" name="featured_on_company_website">
                            <input
                            value='yes'
                            @if(old('featured_on_company_website') == 'yes') checked @endif
                             id="featuredOnCompanywebsite" type="checkbox" name="featured_on_company_website">
                            <label for="featuredOnCompanywebsite">
                                @lang('listing.featured_on_company_website')
                            </label>
                        </div>
                        <div class="checkbox checkbox-primary mb-2">
                            <input  type="hidden" name="exclusive_rights" value="no"> 
                            <input id="exclusiveRights" name="exclusive_rights" type="checkbox" @if(old('exclusive_rights') == 'yes') checked @endif
                             value="yes"
                             >
                            <label for="exclusiveRights">
                               @lang('listing.exclusive_rights')
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
    
        
    </div>


    @push('js')
   
    @endpush