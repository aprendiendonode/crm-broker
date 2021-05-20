<div class="mb-2">

    <form method="GET" autocomplete="off">
        <div class="row">
            <input type="hidden" name="filter" value='true'>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('settings.country')</label>
                    <select class="form-control select2" data-placeholder="@lang('superadmin.cities.select')" name="country_id" id="country_id"
                            data-toggle="select2">
                        <option value=""></option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}" 
                                    @if( request()->has('country_id')  && request('country_id')   == $country->id)
                                    selected
                                    @endif
                                >
                                {{$country->value ?? ''}}
                            </option>
                        @endforeach
        
                    </select>
                </div>
            </div>


            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="city" class="font-weight-medium text-muted">@lang('superadmin.communities.city')</label>
                    <select class="form-control select2" data-placeholder="@lang('superadmin.communities.select')" name="city_id" id="city_id"
                            data-toggle="select2">
                        <option value=""></option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" {{request('city_id') && request('city_id')  == $city->id ? 'selected' : ''}}>{{$city->{'name_'.app()->getLocale()} }}</option>
                        @endforeach

                    </select>
                </div>
            </div>



         
   
            <div class="col-md-6">
                <div class="form-group">
                    <label for="community" class="font-weight-medium text-muted">@lang('superadmin.communities.community')</label>
                    <select class="form-control select2" data-placeholder="@lang('superadmin.communities.select')" name="community" id="community"
                            data-toggle="select2">
                        <option value=""></option>
                        @foreach($communities as $community)
                            <option value="{{$community->id}}" {{request('community') && request('community')  == $community->id ? 'selected' : ''}}>{{$community->{'name_'.app()->getLocale()} }}</option>
                        @endforeach

                    </select>
                </div>
            </div>


        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sub_community" class="font-weight-medium text-muted">@lang('superadmin.sub_communities.sub_community')</label>
                   <input class="form-control" type="text" name="sub_community" value="{{ request()->has('sub_community') ?   request('sub_community') : '' }}">
                </div>
            </div>
        
        
        

        </div>
        <div>
            <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
            <a class="btn btn-outline-primary "
               href="{{ route('sub-communities.index') }}">@lang('sales.reset_filters')</a>
        </div>


    </form>
</div>
