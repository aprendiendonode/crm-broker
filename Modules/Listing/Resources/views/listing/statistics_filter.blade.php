<div class="mb-2">

    <form method="GET" autocomplete="off">
        <div class="row">


            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.data_source')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_data_source"
                           value="{{ request()->has('filter_data_source') ? request()->get('filter_data_source') : '' }}"
                    >
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.email')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_email"
                           value="{{ request()->has('filter_email') ? request()->get('filter_email') : '' }}"

                    >
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.phone')</label>
                    <input type="number" class="form-control" maxlength="25" name="filter_phone"
                           value="{{ request()->has('filter_phone') ? request()->get('filter_phone') : '' }}"
                    >
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.status')</label>
                    <select class="form-control select2" name="status" data-toggle="select2">
                        <option value="active">@lang('sales.active')</option>
                        <option value="archive">@lang('sales.archive')</option>


                    </select>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
                <div style="flex:4">
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio12" value="rent" name="filter_property_purpose" @if( request()->has('filter_property_purpose')  && request('filter_property_purpose')   == 'rent') checked @endif>
                        <label for="inlineRadio12"> @lang('sales.rent') </label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio22" value="buy" name="filter_property_purpose" @if( request()->has('filter_property_purpose')  && request('filter_property_purpose')   == 'buy') checked @endif>
                        <label for="inlineRadio22"> @lang('sales.buy') </label>
                    </div>
                </div>
            </div>





        </div>
        <div>
            <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
            <a class="btn btn-outline-primary "
               @if(owner())
               href="{{ url('listing/statistics_data/'.request('agency')) }}"

               @elseif(moderator())
               href="{{ url('listing/statistics_data/'.request('agency')) }}"
               @else
               href="{{ url('listing/statistics_data/'.auth()->user()->agency_id) }}"
                    @endif
            >@lang('sales.reset_filters')</a>
        </div>


    </form>
</div>
