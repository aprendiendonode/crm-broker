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
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.day')</label>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">

                                <input type="text" class="form-control basic-datepicker" name="filter_date_from" placeholder="@lang('listing.from')"
                                       value="{{ request()->has('filter_date_from') ? request()->get('filter_date_from') : '' }}"

                                >
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control basic-datepicker" name="filter_date_to" placeholder="@lang('listing.to')"
                                       value="{{ request()->has('filter_date_to') ? request()->get('filter_date_to') : '' }}"
                                >
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.size_sqft')</label>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">

                                <input type="number" class="form-control" name="filter_size_sqft_from"
                                       placeholder="@lang('listing.from')"
                                       value="{{ request()->has('filter_size_sqft_from') ? request()->get('filter_size_sqft_from') : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="filter_size_sqft_to"
                                       placeholder="@lang('listing.to')"
                                       value="{{ request()->has('filter_size_sqft_to') ? request()->get('filter_size_sqft_to') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.price_sqft')</label>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">

                                <input type="number" class="form-control" name="filter_price_sqft_from"
                                       placeholder="@lang('listing.from')"
                                       value="{{ request()->has('filter_price_sqft_from') ? request()->get('filter_price_sqft_from') : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="filter_price_sqft_to"
                                       placeholder="@lang('listing.to')"
                                       value="{{ request()->has('filter_price_sqft_to') ? request()->get('filter_price_sqft_to') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.total_worth')</label>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">

                                <input type="number" class="form-control" name="filter_total_worth_from"
                                       placeholder="@lang('listing.from')"
                                       value="{{ request()->has('filter_total_worth_from') ? request()->get('filter_total_worth_from') : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="filter_total_worth_to"
                                       placeholder="@lang('listing.to')"
                                       value="{{ request()->has('filter_total_worth_to') ? request()->get('filter_total_worth_to') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.size_sqm')</label>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">

                                <input type="number" class="form-control" name="filter_size_sqm_from"
                                       placeholder="@lang('listing.from')"
                                       value="{{ request()->has('filter_size_sqm_from') ? request()->get('filter_size_sqm_from') : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="filter_size_sqm_to"
                                       placeholder="@lang('listing.to')"
                                       value="{{ request()->has('filter_size_sqm_to') ? request()->get('filter_size_sqm_to') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.price_sqm')</label>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">

                                <input type="number" class="form-control" name="filter_price_sqm_from"
                                       placeholder="@lang('listing.from')"
                                       value="{{ request()->has('filter_price_sqm_from') ? request()->get('filter_price_sqm_from') : '' }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="filter_price_sqm_to"
                                       placeholder="@lang('listing.to')"
                                       value="{{ request()->has('filter_price_sqm_to') ? request()->get('filter_price_sqm_to') : '' }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-lg-4">
                <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
                <div style="flex:4">
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio12" value="rent" name="filter_property_purpose"
                               @if( request()->has('filter_property_purpose')  && request('filter_property_purpose')   == 'rent') checked @endif>
                        <label for="inlineRadio12"> @lang('sales.rent') </label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio22" value="buy" name="filter_property_purpose"
                               @if( request()->has('filter_property_purpose')  && request('filter_property_purpose')   == 'buy') checked @endif>
                        <label for="inlineRadio22"> @lang('sales.buy') </label>
                    </div>
                </div>
            </div>


        </div>
        <div class="mt-3">
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
