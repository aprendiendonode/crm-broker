<div class="mb-2">
    <h4 >@lang('activity.emails_list.email_search')</h4>
    <form  method="GET" autocomplete="off">
    <div class="row">

        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.subject'):</label>
                <div class="d-flex flex-wrap">
                    <input class="form-control" type="text" name="subject" id="subject" value="{{ request()->has('subject') ? request()->get('subject') : '' }}" placeholder="@lang('activity.emails_list.subject')" data-plugin="tippy" data-tippy-placement="top-start" title="@lang('activity.emails_list.subject')">
                </div>
            </div>
        </div>



        <div class="col-md-6 col-lg-6">
            <div class="form-group">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.emails_list.sent_date'):</label>
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
                <label for="">@lang('activity.emails_list.sender')</label>
                <select class="selectpicker mb-0 show-tick" data-style="btn-outline-secondary" data-toggle="select2" name="sender_filter" >
                    <option selected disabled>@lang('global.pleaseSelect')</option>
                    @php
                        $sender_filter = request()->has('sender_filter') ? request()->get('sender_filter') : '';
                    @endphp
                    @if($staffs)
                        @foreach($staffs as $staff)
                            <option value="{{$staff->id }}" @if($sender_filter == $staff->id) selected @endif >{{$staff->{'name_'.app()->getLocale()} }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

    </div>


    <div>
        <button class="btn btn-primary" type="submit">@lang('activity.filter_search')</button>
        <a class="btn btn-outline-primary" href="{{ url('activity/emails/'.request('agency')) }}">@lang('agency.reset')</a>
    </div>


</form>
</div>