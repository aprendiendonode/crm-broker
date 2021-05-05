<div class="mb-2">

    <form  method="GET" autocomplete="off">
        <h4>Quick Search</h4>
    <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="form-group d-flex align-items-center" style="height: 64px;">
                    <label class="font-weight-medium text-muted mr-3">Purpose*</label>
                    <div style="display:flex;">
                        <div class="radio mr-3">
                            <input type="radio" name="Purpose1" id="searchAnyRadio1" value="option3" checked>
                            <label for="searchAnyRadio1">
                                Any
                            </label>
                        </div>
                        <div class="radio mr-3">
                            <input type="radio" name="Purpose1" id="searchRentRadio1" value="option3">
                            <label for="searchRentRadio1">
                                Rent
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="Purpose1" id="searchSaleRadio2" value="option3">
                            <label for="searchSaleRadio2">
                                Sale
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
                    <label for="" class="font-weight-medium text-muted">Propery Type</label>
                    <select class="form-control select2" name="propertyType" data-toggle="select2">
                        <option>1</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">Validation Status</label>
                    <select class="form-control select2" name="validationStatus" data-toggle="select2">
                        <option>1</option>
                    </select>
                </div>
            </div>



            <div class="col-md-6 col-lg-4">
                <label class="mb-1 font-weight-medium text-muted">Location</label>

                <input type="text" name="filter_email" id="autocomplete-ajax"
                        placeholder="Type Location to Search"
                        class="form-control"
                        value="{{ request()->has('filter_email') ? request()->get('filter_email') : '' }}"/>


            </div> 

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">Beds</label>
                    <div class="d-flex">
                        <div class="mr-1" style="flex:1">
                            <select class="form-control select2" name="minBeds" data-toggle="select2" data-placeholder="Min">
                                <option value="">1</option>
                                <option value="1">2</option>
                
                            </select>
                        </div>
                        <div class="" style="flex:1">
                            <select class="form-control select2" name="maxBeds" data-toggle="select2" data-placeholder="Max">
                                <option value="">1</option>
                                <option value="1">2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">Assigned</label>
                    <select class="form-control select2" name="assigned" data-toggle="select2" data-placeholder="select">
                                <option value="">1</option>
                                <option value="1">2</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="" class="font-weight-medium text-muted">REF ID</label>
                    <select class="form-control select2" name="refId" data-toggle="select2" data-placeholder="select">
                                <option value="">1</option>
                                <option value="1">2</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="form-group" style="height: 64px;">
                    <label class="font-weight-medium text-muted mr-3">Lsiting Type</label>
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
            </div>



    </div>
    <div>
        <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
        <a class="btn btn-outline-primary" href="{{ url('listing/controll/'.request('agency')) }}">@lang('agency.reset')</a>
    </div>


</form>
</div>

