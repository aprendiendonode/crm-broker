<div class="mb-2">

    <form  method="GET" autocomplete="off">
    <div class="row">
        
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('agency.name')</label>
                    <input type="text" class="form-control" maxlength="25" name="filter_name" value="{{ request()->has('filter_name') ? request()->get('filter_name') : '' }}" id="defaultconfig">
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
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
            </div>


 

            <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="" class="font-weight-medium text-muted">@lang('agency.team')</label>
                <select class="form-control select2" name="filter_team" data-toggle="select2">
                    <option value=""></option>
                    @php
                    $team_filter = request()->has('filter_team') ? request()->get('filter_team') : ''
                   @endphp
                    @forelse($teams as $team)
                        <option @if($team_filter == $team->id) selected @endif value="{{ $team->id }}">{{ $team->{'name_'.app()->getLocale()} }}</option>
                    @empty
                    @endforelse
               
              
            
    
                </select>
            </div>
            </div>



            <div class="col-md-6 col-lg-4">
                <label class="mb-1 font-weight-medium text-muted">@lang('agency.email')</label>

                <input type="text" name="filter_email" id="autocomplete-ajax"
                           class="form-control"
                           value="{{ request()->has('filter_email') ? request()->get('filter_email') : '' }}"/>


            </div> 

            <div class="col-md-6 col-lg-4">
          
          
            <div class="form-group">
                <label for="country" class="font-weight-medium text-muted">@lang('agency.nationaly')</label>
                <select  class="form-control select2"  name="filter_nationality"  data-toggle="select2" >
                    <option value=""></option>
                    @php
                     $nationality_filter = request()->has('filter_nationality') ? request()->get('filter_nationality') : ''
                    @endphp
                   @foreach($countries as $country)
                       <option @if($nationality_filter == $country->id) selected @endif value="{{$country->id}}">{{$country->value ?? ''}}</option>
                   @endforeach

                </select>
            </div>
        </div>


    </div>
    <div>
        <button class="btn btn-primary" type="submit">@lang('agency.filter_submit')</button>
        <a class="btn btn-outline-primary" href="{{ url('agency/staff/'.request('agency')) }}">@lang('agency.reset')</a>
    </div>


</form>
</div>