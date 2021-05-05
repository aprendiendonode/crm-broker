<div class="mb-2">
    <h4>@lang('activity.quick_search')</h4>
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
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.date'):</label>
                    <div class="d-flex flex-wrap">
                        <div class="m-1" style="flex:3">
                            {{--<input type="date" class="form-control" name="filter_from_date" id="filter_from_date" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.from')" value="{{ request()->has('filter_from_date') ? request()->get('filter_from_date') : '' }}">--}}
                            <input type="text" name="filter_from_date" id="filter_from_date" value="{{ request()->has('filter_from_date') ? request()->get('filter_from_date') : '' }}" placeholder="@lang('activity.tasks.from')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.from')" required>
                        </div>
                        <div class="m-1" style="flex:3">
                            {{--<input type="date" class="form-control" name="filter_to_date" id="filter_to_date" data-plugin="tippy" data-tippy-placement="top-start"  title="@lang('activity.tasks.to')" value="{{ request()->has('filter_to_date') ? request()->get('filter_to_date') : '' }}">--}}
                            <input type="text" name="filter_to_date" id="filter_to_date" value="{{ request()->has('filter_to_date') ? request()->get('filter_to_date') : '' }}" placeholder="@lang('activity.tasks.to')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.to')" required>

                        </div>

                    </div>
                </div>
            </div>

        <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.deadline'):</label>
                    <div class="d-flex flex-wrap">
                        <div class="m-1" style="flex:3">
                            {{--<input type="date" class="form-control" name="filter_from_deadline" id="filter_from_deadline" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.from')" value="{{ request()->has('filter_from_deadline') ? request()->get('filter_from_deadline') : '' }}">--}}
                            <input type="text" name="filter_from_deadline" id="filter_from_deadline" title="@lang('activity.tasks.from')" value="{{ request()->has('filter_from_deadline') ? request()->get('filter_from_deadline') : '' }}" placeholder="@lang('activity.tasks.from')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" required>

                        </div>
                        <div class="m-1" style="flex:3">
{{--                            <input type="date" class="form-control" name="filter_to_deadline" id="filter_to_deadline" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.tasks.to')" value="{{ request()->has('filter_to_deadline') ? request()->get('filter_to_deadline') : '' }}">--}}
                            <input type="text" name="filter_to_deadline" id="filter_to_deadline" title="@lang('activity.tasks.to')" value="{{ request()->has('filter_to_deadline') ? request()->get('filter_to_deadline') : '' }}" placeholder="@lang('activity.tasks.to')"  class="form-control basic-datepicker"  data-plugin="tippy" data-tippy-placement="top-start" required>

                        </div>
                    </div>
                </div>
            </div>



    </div>
    <div>
        <button class="btn btn-primary" type="submit">@lang('activity.filter_search')</button>
        <a class="btn btn-outline-primary" href="{{ url('activity/tasks/'.request('agency')) }}">@lang('agency.reset')</a>
    </div>


</form>
</div>