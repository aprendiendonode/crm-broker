<div class="mb-2">

    <button type="button" id="advanced-btn" class="btn btn-outline-primary waves-effect waves-light"

            onclick="advanced_search()">@lang('settings.advanced_search')</button>

    <form method="GET" autocomplete="off"   @if( !request()->has('purpose')) style="display: none;opacity:0;transition:0.7s" @endif id="advanced_filter_form">

        <div class="row">
            <div class="col-md-6 col-lg-4">

                <div class="col-sm-12">
                    <div class="form-group d-flex align-items-center" style="height: 64px;">
                        <label class="font-weight-medium text-muted mr-3">@lang('listing.purpose')</label>
                        <div style="display:flex;">
                            <div class="radio mr-3">
                                <input type="radio" name="purpose" id="searchAnyRadio1" value="" checked >
                                <label for="searchAnyRadio1">
                                    Any
                                </label>
                            </div>
                            <div class="radio mr-3">
                                <input type="radio" name="purpose" id="searchRentRadio1" value="rent" @if(request()->has('purpose') && request('purpose') == 'rent') checked @endif>
                                <label for="searchRentRadio1">
                                    Rent
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="purpose" id="searchSaleRadio2" value="sale" @if(request()->has('purpose') && request('purpose') == 'sale') checked @endif>
                                <label for="searchSaleRadio2">
                                    Sale
                                </label>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="font-weight-medium text-muted">@lang('listing.location')</label>
                        <select class="form-control select2" name="location" data-toggle="select2">
                            <option></option>
                            @forelse($locations as $location)
                                <option value="{{$location}}" @if(request()->has('location') && request('location') == $location) selected  @endif> {{$location}} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <label class="mb-1 font-weight-medium text-muted">@lang('listing.keywords')  <i title="{{trans('listing.keyword_info')}}" class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" ></i> </label>

                    <input type="text" name="keywords" id="autocomplete-ajax"
                           placeholder="{{trans('listing.keywords')}}"
                           class="form-control"
                           value="{{ request()->has('keywords') ? request()->get('keywords') : '' }}"/>


                </div>


            </div>
            <div class="col-md-6 col-lg-4">

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="font-weight-medium text-muted">@lang('listing.type')</label>
                        <select class="form-control select2" name="type" data-toggle="select2">
                            <option></option>
                            @forelse($types as $type)
                                <option value="{{$type->id ?? ''}}" @if(request()->has('type') && request('type') == $type->id ) selected  @endif> {{$type->{'name_'.app()->getLocale()} ?? ''}} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('listing.price')</label>
                        <div class="d-flex">
                            <div class="mr-1" style="flex:1">
                                <input type="text" name="price_min" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.min')}}"
                                       class="form-control"
                                       value="{{ request()->has('price_min') ? request()->get('price_min') : '' }}"/>
                            </div>
                            <div class="" style="flex:1">
                                <input type="text" name="price_max" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.max')}}"
                                       class="form-control"
                                       value="{{ request()->has('price_max') ? request()->get('price_max') : '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
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
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('listing.area')</label>
                        <div class="d-flex">
                            <div class="mr-1" style="flex:1">
                                <input type="text" name="area_min" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.min')}}"
                                       class="form-control"
                                       value="{{ request()->has('area_min') ? request()->get('area_min') : '' }}"/>
                            </div>
                            <div class="" style="flex:1">
                                <input type="text" name="area_max" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.max')}}"
                                       class="form-control"
                                       value="{{ request()->has('area_max') ? request()->get('area_max') : '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">


                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('listing.added')</label>
                        <div class="d-flex">
                            <div class="mr-1" style="flex:1">
                                <input type="date" name="added_from" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.from')}}"
                                       class="form-control  basic-datepicker"
                                       value="{{ request()->has('added_from') ? request()->get('added_from') : '' }}"/>
                            </div>
                            <div class="" style="flex:1">
                                <input type="date" name="added_to" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.to')}}"
                                       class="form-control  basic-datepicker"
                                       value="{{ request()->has('added_to') ? request()->get('added_to') : '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="mb-1 font-weight-medium text-muted">@lang('listing.updated')</label>
                        <div class="d-flex">
                            <div class="mr-1" style="flex:1">
                                <input type="text" name="updated_from" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.from')}}"
                                       class="form-control  basic-datepicker"
                                       value="{{ request()->has('updated_from') ? request()->get('updated_from') : '' }}"/>
                            </div>
                            <div class="" style="flex:1">
                                <input type="text" name="updated_to" id="autocomplete-ajax"
                                       placeholder="{{trans('listing.to')}}"
                                       class="form-control  basic-datepicker"
                                       value="{{ request()->has('updated_to') ? request()->get('updated_to') : '' }}"/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="font-weight-medium text-muted">@lang('listing.agency')</label>
                        <select class="form-control select2" name="filter_agency" data-toggle="select2">
                            <option></option>
                            @forelse($agencies as $agency)
                                <option value="{{$agency->receiver->id ?? ''}}" @if(request()->has('filter_agency') && request('filter_agency') == $agency->receiver->id ) selected  @endif> {{$agency->receiver->{'company_name_'.app()->getLocale()} ?? ''}} </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button class="btn btn-primary m-2" type="submit">@lang('agency.filter_submit')</button>
            <a class="btn btn-outline-primary"
               href="{{ url('listing/share/'.request('agency')) }}">@lang('agency.reset')</a>
        </div>


    </form>
</div>

