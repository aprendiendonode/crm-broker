<div class="mb-2">
    <a href="#"  onclick="show_advanced_search_div()"><u>@lang('activity.advanced_search')</u></a>
    <h4 id="quick_search">@lang('activity.quick_search')</h4>
    <h4 id="advanced_search" style="display: none">@lang('activity.advanced_search')</h4>
    <form  method="GET" autocomplete="off">
    <div class="row">

        <div class="col-md-6 col-lg-4">
            <div class="form-group">
                <label for="">@lang('activity.tasks.staff')</label>
                <select class="selectpicker mb-0 show-tick" data-style="btn-outline-secondary" data-toggle="select2" name="staff_filter" >
                    <option selected disabled>@lang('global.pleaseSelect')</option>
                    @php
                        $staff_filter = request()->has('staff_filter') ? request()->get('staff_filter') : ''
                    @endphp
                    @if($staffs)
                        @foreach($staffs as $staff)
                            <option value="{{$staff->id }}" @if($staff_filter == $staff->id) selected @endif >{{$staff->{'name_'.app()->getLocale()} }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="col-md-6 col-lg-4" id="id_div" style="display: none;transition:0.7s">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.notes_list.id'):</label>
                <div class="d-flex flex-wrap">
                    <input class="form-control" type="text" name="id" id="id" value="{{ request()->has('id') ? request()->get('id') : '' }}" placeholder="@lang('activity.notes_list.id')" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.notes_list.id')" >
                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.date'):</label>
                    <div class="d-flex flex-wrap">
                        <div class="m-1" style="flex:3">
                            <input type="text" name="filter_from_date" id="filter_from_date" value="{{ request()->has('filter_from_date') ? request()->get('filter_from_date') : '' }}" placeholder="@lang('activity.tasks.from')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.from')" >
                        </div>
                        <div class="m-1" style="flex:3">
                            <input type="text" name="filter_to_date" id="filter_to_date" value="{{ request()->has('filter_to_date') ? request()->get('filter_to_date') : '' }}" placeholder="@lang('activity.tasks.to')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.to')" >

                        </div>

                    </div>
                </div>
        </div>

        <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.notes_list.keyword'):</label>
                    <div class="d-flex flex-wrap">
                            <input class="form-control" type="text" name="keyword" id="keyword" value="{{ request()->has('keyword') ? request()->get('keyword') : '' }}" placeholder="@lang('activity.notes_list.keyword')" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.notes_list.keyword')">
                    </div>
                </div>
            </div>

        </div>


    <div>
        <button class="btn btn-primary" type="submit">@lang('activity.filter_search')</button>
        <a class="btn btn-outline-primary" href="{{ url('activity/notes/'.request('agency').'/'.request()->segment(4)) }}">@lang('agency.reset')</a>
    </div>


</form>
</div>