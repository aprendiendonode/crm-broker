<div class="mb-2">

    <form method="GET" autocomplete="off">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('settings.country')</label>
                    <select class="form-control select2" data-placeholder="@lang('superadmin.cities.select')" name="country_id" id="country_id"
                            data-toggle="select2">
                        <option value=""></option>
                        @foreach($countries->get() as $country)
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
        
 
      


   




        </div>
        <div>
            <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
            <a class="btn btn-outline-primary "
               href="{{ route('countries.index') }}">@lang('sales.reset_filters')</a>
        </div>


    </form>
</div>
