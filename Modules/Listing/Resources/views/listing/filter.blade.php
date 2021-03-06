<div class="mb-2">

    <form  method="GET" autocomplete="off">
        <h4>@lang('listing.advanced_search')</h4>
    <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="form-group d-flex align-items-center" style="height: 64px;">
                    <label class="font-weight-medium text-muted mr-3">@lang('listing.purpose')</label>
                    <div style="display:flex;">
                        <div class="radio mr-3">
                            <input type="radio" name="purpose" id="searchAnyRadio1" value="" checked >
                            <label for="searchAnyRadio1">
                                @lang('listing.any')
                            </label>
                        </div>
                        <div class="radio mr-3">
                            <input type="radio" name="purpose" id="searchRentRadio1" value="rent" @if(request()->has('purpose') && request('purpose') == 'rent') checked @endif>
                            <label for="searchRentRadio1">
                                @lang('listing.rent')
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="purpose" id="searchSaleRadio2" value="sale" @if(request()->has('purpose') && request('purpose') == 'sale') checked @endif>
                            <label for="searchSaleRadio2">
                                @lang('listing.sale')
                                
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="purpose" id="searchSaleRadio3" value="short" @if(request()->has('purpose') && request('purpose') == 'short') checked @endif>
                            <label for="searchSaleRadio3">
                                @lang('listing.short')
                                
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.primary_no')</label>
                    <div class="d-flex">
                        <div class="" style="flex:1">
                            <input data-plugin="tippy" data-tippy-placement="top-start" title="@lang('agency.country_code')"  class="form-control" name="country_code" type="text" class="form-control" maxlength="25" value="{{ request()->has('filter_country_code') ? request()->get('filter_country_code') : '' }}" name="filter_country_code" >
                        </div>
                        <div class="px-2" style="flex:1">
                            <input type="text" class="form-control" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('agency.city_code')" maxlength="25" value="{{ request()->has('filter_city_code') ? request()->get('filter_city_code') : '' }}" name="filter_city_code" >
                        </div>
                        <div class="" style="flex:4">
                            <input type="text" class="form-control" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('agency.phone')" maxlength="25" value="{{ request()->has('filter_phone') ? request()->get('filter_phone') : '' }}" name="filter_phone" >
                        </div>
                    </div>
                </div>
            </div> -->


 

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">@lang('listing.property_type')</label>
                    <select class="form-control select2" name="type" data-toggle="select2">
                        <option></option>
                        @forelse($listing_types as $type)
                            <option value="{{$type->id ?? ''}}" @if(request()->has('type') && request('type') == $type->id ) selected  @endif> {{$type->{'name_'.app()->getLocale()} ?? ''}} </option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            {{-- <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">Validation Status</label>
                    <select class="form-control select2" name="validationStatus" data-toggle="select2">
                        <option>1</option>
                    </select>
                </div>
            </div>
 --}}


            <div class="col-md-6 col-lg-4">
                <label class="mb-1 font-weight-medium text-muted">@lang('listing.location')</label>

                <select class="form-control select2" name="location" data-toggle="select2">
                    <option></option>
                    @forelse($locations as $location)
                        <option value="{{$location}}" @if(request()->has('location') && request('location') == $location) selected  @endif> {{$location}} </option>
                    @empty
                    @endforelse
                </select>

            </div> 

            <div class="form-group col-md-4">

                <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.city')</label>
                <div style="flex:2;">
                    <select  onchange="getCommunitites('create',null,'{{ app()->getLocale() }}' ,'{{  route('listings.get-communities') }}' ,'{{ csrf_token() }}')" class="form-control select2 city-in-create" name="filter_city_id"
                     data-toggle="select2" data-placeholder="@lang('listing.city')">
                            <option value=""></option>
                        
                        @foreach($cities as $city)
                            <option @if(request('filter_city_id') == $city->id  ) selected @endif value="{{ $city->id }}">
                                {{ $city->{'name_'.app()->getLocale()} }}
                            </option>
                        @endforeach

                    </select>
              
                </div>
            </div>



        <div class="form-group  col-md-4">

            <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.community') </label>
            <div style="flex:2;">
                <select  onchange="getSubCommunities('create',null,'{{ app()->getLocale() }}','{{  route('listings.get-sub-communities') }}' ,'{{ csrf_token() }}')" class="form-control select2 community-in-create" name="filter_community_id"
                 data-toggle="select2" data-placeholder="@lang('listing.choose_city_first')">
                        <option value=""></option>
                    
                  @if(request()->has('filter_city_id'))
                    @if(request()->has('filter_community_id'))
                        @foreach($communities->where('city_id',request('filter_city_id')) as $community)
                            <option class="create-appended-communities"
                                @if(request('filter_community_id') == $community->id)  
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


        <div class="form-group  col-md-4">

            <label class="font-weight-medium text-muted" style="flex:1;">@lang('listing.sub_community')</label>
            <div style="flex:2;">
                <select class="form-control select2 sub-community-in-create" name="filter_sub_community_id"
                 data-toggle="select2" data-placeholder="@lang('listing.choose_community_first')">
                        <option value=""></option>

                        @if(request()->has('filter_city_id') &&  request()->has('filter_community_id'))
                    
                        @if(request()->has('filter_sub_community_id') )
                            @foreach($sub_communities->where('community_id',request('filter_community_id')) as $sub_community)
                                <option class="create-appended-sub-communities"
                                    @if(request('filter_sub_community_id') == $sub_community->id)  
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

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.beds')</label>
                    <div class="d-flex">
                        <div class="mr-1" style="flex:1">
                            <select class="form-control select2" name="min_bed" data-toggle="select2"
                                    data-placeholder="{{trans('listing.min')}}">
                                <option value=""></option>
                                <option @if(request()->has('min_bed') && request('min_bed') == 'studio') selected @endif value="studio"
                                >@lang('listing.studio')</option>

                                @for($i = 1;$i <= 20 ;$i++)
                                    <option @if(request()->has('min_bed') && request('min_bed') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                        <div class="" style="flex:1">
                            <select class="form-control select2" name="max_bed" data-toggle="select2"
                                    data-placeholder="{{trans('listing.max')}}">
                                <option value=""></option>
                                <option @if(request()->has('max_bed') && request('max_bed') == 'studio') selected @endif value="studio"
                                >@lang('listing.studio')</option>

                                @for($i = 1;$i <= 20 ;$i++)
                                    <option @if(request()->has('max_bed') && request('max_bed') == $i) selected @endif value="{{ $i }}">{{ $i }}</option>
                                @endfor

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">@lang('listing.assigned')</label>
                    <select class="form-control select2" name="filter_user" data-toggle="select2">
                        <option value=""></option>
                        @forelse($staffs as $employee)
                            <option @if( request()->has('filter_user') && request('filter_user')  == $employee->id) selected @endif value="{{ $employee->id}}"> {{ $employee->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse

                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">@lang('listing.ref_id')</label>
                    <select class="form-control select2" name="ref_id" data-toggle="select2">
                        <option></option>
                        @forelse($ref_ids as $id)
                            <option value="{{$id}}" @if(request()->has('ref_id') && request('ref_id') == $id) selected  @endif> {{$id}} </option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            {{-- <div class="col-md-6 col-lg-4">
                <div class="form-group" style="height: 64px;">
                    <label class="font-weight-medium text-muted mr-3">@lang('listing.listing_type')</label>
                    <div class="d-flex flex-wrap">
                        <div class="radio mr-2" style="">
                            <input type="radio" name="searchListingType" id="searchLsitingRadio1" value="option3" checked>
                            <label for="searchLsitingRadio1">
                                All
                            </label>
                        </div>
                        <div class="radio mr-2" style="">
                            <input type="radio" name="searchListingType" id="searchLsitingRadio2" value="option3">
                            <label for="searchLsitingRadio2">
                                Hot
                            </label>
                        </div>
                        <div class="radio mr-2">
                            <input type="radio" name="searchListingType" id="searchLsitingRadio3" value="option3">
                            <label for="searchLsitingRadio3">
                                Signature
                            </label>
                        </div>
                        <div class="radio" style="">
                            <input type="radio" name="searchListingType" id="searchLsitingRadio4" value="option3">
                            <label for="searchLsitingRadio4">
                                Basic
                            </label>
                        </div>
                    </div>
                </div>
            </div> --}}



    </div>
    <div>
        <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
        <a class="btn btn-outline-primary" href="{{ url('listing/controll/'.request('agency')) }}">@lang('agency.reset')</a>
    </div>


</form>
</div>

