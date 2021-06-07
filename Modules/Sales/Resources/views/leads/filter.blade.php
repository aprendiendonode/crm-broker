<div class="mb-2">

    <form method="GET" autocomplete="off">
        <div class="row">


            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_name"
                           value="{{ request()->has('filter_name') ? request()->get('filter_name') : '' }}"
                           id="defaultconfig">
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.email')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_email"
                           value="{{ request()->has('filter_email') ? request()->get('filter_email') : '' }}"
                           id="defaultconfig">
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.phone')</label>
                    <input type="number" class="form-control" maxlength="25" name="filter_phone"
                           value="{{ request()->has('filter_phone') ? request()->get('filter_phone') : '' }}"
                           id="defaultconfig">
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.reference')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_reference"
                           value="{{ request()->has('filter_reference') ? request()->get('filter_reference') : '' }}"
                           id="defaultconfig">
                </div>
            </div>



            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.lead_sources')</label>
                    <select class="form-control select2" name="filter_source" data-toggle="select2">
                        <option value=""></option>
                        @forelse($lead_sources as $source)
                            <option @if( request()->has('filter_source')  && request('filter_source')   == $source->id) selected @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.lead_types')</label>
                    <select class="form-control select2" name="filter_type" data-toggle="select2">
                        <option value=""></option>
                        @forelse($lead_types as $type)
                            <option @if( request()->has('filter_type')  && request('filter_type')   == $type->id) selected @endif value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.lead_qualifications')</label>
                    <select class="form-control select2" name="filter_qualifications" data-toggle="select2">
                        <option value=""></option>
                        @forelse($lead_qualifications as $ql)
                            <option @if( request()->has('filter_qualifications')  && request('filter_qualifications')   == $ql->id) selected @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.way_of_communications')</label>
                    <select class="form-control select2" name="filter_way_of_communications" data-toggle="select2">
                        <option value=""></option>
                        @forelse($lead_communications as $communication)
                            <option @if( request()->has('filter_way_of_communications')  && request('filter_way_of_communications')   == $communication->id) selected @endif value="{{ $communication->id}}">{{ $communication->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.priority')</label>
                    <select class="form-control select2" name="filter_priority" data-toggle="select2">
                        <option value=""></option>
                        @forelse($lead_priorities as $priority)
                            <option @if( request()->has('filter_priority')  && request('filter_priority')   == $priority->id) selected @endif value="{{ $priority->id}}">{{ $priority->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse

                    </select>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <p class="text-muted pr-2 font-weight-medium" style="flex:2">@lang('sales.property_purpose')</p>
                <div style="flex:4">
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio1" value="rent" name="filter_property_purpose" @if( request()->has('filter_property_purpose')  && request('filter_property_purpose')   == 'rent') checked @endif>
                        <label for="inlineRadio1"> @lang('sales.rent') </label>
                    </div>
                    <div class="radio radio-info form-check-inline">
                        <input type="radio" id="inlineRadio2" value="buy" name="filter_property_purpose" @if( request()->has('filter_property_purpose')  && request('filter_property_purpose')   == 'buy') checked @endif>
                        <label for="inlineRadio2"> @lang('sales.buy') </label>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="country" class="font-weight-medium text-muted">@lang('sales.select_staff')</label>
                    <select class="form-control select2" name="filter_user" data-toggle="select2">
                        <option value=""></option>
                        @forelse(staff($agency) as $employee)
                            <option @if( request()->has('filter_user') && request('filter_user')  == $employee->id) selected @endif value="{{ $employee->id}}"> {{ $employee->{'name_'.app()->getLocale()} }}</option>
                        @empty

                        @endforelse

                    </select>
                </div>
            </div> --}}





        </div>
        <div>
            <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
            <a class="btn btn-outline-primary "
               href="{{ url('sales/leads/'.request('agency')) }}">@lang('sales.reset_filters')</a>
        </div>


    </form>
</div>
