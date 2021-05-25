
<h4 >@lang('activity.tasks.add_new_task') </h4>
<form  action="{{route('activity.tasks.store')}}" method="POST">
    @csrf
    <div class="row">
        <input type="hidden" name="agency_id" value="{{Request::segment(3)}}"/>
        <div class="col-md-6">


            <div class="form-group">
                <label for="">@lang('activity.tasks.task_type')</label>
                <input type="hidden" id="task_types" value="{{$task_types?? ''}}"/>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="task_type" id="task_type" onchange="show_reference_div()"  required>

                    <option value="" {{old('task_type','' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    {{--<option value="general_reminder"    {{ old('task_type','' ) == 'general_reminder'   ? 'selected' : ''}} > General Reminder</option>--}}
                    {{--<option value="property_viewing"    {{ old('task_type','' ) == 'property_viewing'   ? 'selected' : ''}} > Property Viewing</option>--}}
                    {{--<option value="call"                {{ old('task_type','' ) == 'call'               ? 'selected' : ''}} > call</option>--}}
                    {{--<option value="send_documents"      {{ old('task_type','' ) == 'send_documents'     ? 'selected' : ''}} > Send Documents</option>--}}
                    {{--<option value="collect_documents"   {{ old('task_type','' ) == 'collect_documents'  ? 'selected' : ''}} > Collect Documents</option>--}}
                    {{--<option value="meeting"             {{ old('task_type','' ) == 'meeting'            ? 'selected' : ''}} > Meeting</option>--}}
                    {{--<option value="email"               {{ old('task_type','' ) == 'email'              ? 'selected' : ''}} > Email</option>--}}
                    {{--<option value="payment_collection"  {{ old('task_type','' ) == 'payment_collection' ? 'selected' : ''}} > Payment Collection</option>--}}
                    {{--<option value="cheque_submission"   {{ old('task_type','' ) == 'cheque_submission'  ? 'selected' : ''}} > Cheque Submission</option>--}}


                        @if($task_types)
                            @foreach($task_types as $type)
                                <option value="{{$type->id }}" {{ old('task_type','') == $type->id ? 'selected' : '' }}>{{$type->{'type_'.app()->getLocale()} }}</option>
                            @endforeach
                        @endif


                </select>

            </div>


            {{--<div class="form-group" id="reference_div">--}}
                {{--<label for="">@lang('activity.tasks.reference')</label>--}}
                {{--<input type="text" class="form-control" id="reference" name="reference" />--}}

            {{--</div>--}}

            <div class="form-group">
                <label for="">@lang('activity.tasks.status')</label>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="status" required>

                    <option value="" {{old('status', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    {{--<optgroup label="Open">--}}
                        {{--<option value="not_started"             {{old('status', '' ) == 'not_started' ? 'selected' : ''}} > Not Started</option>--}}
                        {{--<option value="in_progress"             {{old('status', '' ) == 'in_progress' ? 'selected' : ''}} > In Progress</option>--}}
                        {{--<option value="waiting_client"          {{old('status', '' ) == 'waiting_client' ? 'selected' : ''}} > Waiting for client</option>--}}
                        {{--<option value="waiting_documents"       {{old('status', '' ) == 'waiting_documents' ? 'selected' : ''}} > Waiting for Documents</option>--}}
                        {{--<option value="waiting_approval"        {{old('status', '' ) == 'waiting_approval' ? 'selected' : ''}} > Waiting for Approval</option>--}}
                    {{--</optgroup>--}}

                    {{--<optgroup label="Archive">--}}
                        {{--<option value="completed_successful"    {{old('status', '' ) == 'completed_successful' ? 'selected' : ''}} > Completed-Successful</option>--}}
                        {{--<option value="completed_unsuccessful"  {{old('status', '' ) == 'completed_unsuccessful' ? 'selected' : ''}} > Completed-Unsuccessful</option>--}}
                        {{--<option value="escalated_manager"       {{old('status', '' ) == 'escalated_manager' ? 'selected' : ''}} > Escalated to Manager</option>--}}
                    {{--</optgroup>--}}

                    @if($task_status)
                        @foreach($task_status as $status)
                            <option value="{{$status->id }}"  {{ old('status','') == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                        @endforeach
                    @endif


                </select>



            </div>
            <input type="hidden" id="old_module" value="{{ old('module',null) ?? '' }}"/>
            <div class="form-group" style="margin-bottom:32px">
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="lead" value="lead" onchange="show_module_div('lead')" name="module" {{ old('module') == 'lead' ? 'checked' : '' }} {{ old('module',null) == null ? 'checked' : '' }} >
                    <label for="lead"> @lang('sales.lead') </label>
                </div>

                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="opportunity" value="opportunity" onchange="show_module_div('opportunity')" name="module" {{ old('module',null) == 'opportunity' ? 'checked' : '' }} >
                    <label for="opportunity"> @lang('sales.opportunity')</label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="client" value="client" onchange="show_module_div('client')" name="module" {{ old('module',null) == 'client' ? 'checked' : '' }} >
                    <label for="client"> @lang('sales.client') </label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="listing" value="listing" onchange="show_module_div('listing')" name="module" {{ old('module',null) == 'listing' ? 'checked' : '' }} >
                    <label for="listing"> @lang('sales.listing') </label>
                </div>
            </div>

            {{--select leads--}}
            <div class="form-group" id="leads_div" style="display:none">
                <label for="">@lang('sales.leads')</label>
                <select class="form-control select2"  data-toggle="select2" name="lead_id" >

                    <option value="" {{old('lead_id', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    @if($leads)
                        @foreach($leads as $lead)
                            <option value="{{$lead->id }}"  {{ old('lead_id','') == $lead->id ? 'selected' : '' }}>{{$lead->full_name ?? ''	 }}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            {{--select opportunity--}}
            <div class="form-group" id="opportunities_div" style="display:none">
                <label for="">@lang('sales.opportunity')</label>
                <select class="form-control select2"  data-toggle="select2" name="opportunity_id" >

                    <option value="" {{old('opportunity_id', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    @if($opportunities)
                        @foreach($opportunities as $opportunity)
                            <option value="{{$opportunity->id }}"  {{ old('opportunity_id','') == $opportunity->id ? 'selected' : '' }}>{{ $opportunity->lead && $opportunity->lead->full_name ? $opportunity->lead->full_name : ($opportunity->full_name ?? '')	 }}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            {{--select client--}}
            <div class="form-group" id="clients_div" style="display:none">
                <label for="">@lang('sales.client')</label>
                <select class="form-control select2"  data-toggle="select2" name="client_id" >

                    <option value="" {{old('client_id', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    @if($clients)
                        @foreach($clients as $client)
                            <option value="{{$client->id }}"  {{ old('client_id','') == $client->id ? 'selected' : '' }}>{{$client->name ?? '' }}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            {{--select listing--}}
            <div class="form-group" id="listings_div" style="display:none">
                <label for="">@lang('sales.listing')</label>
                <select class="form-control select2"  data-toggle="select2" name="listing_id" >

                    <option value="" {{old('listing_id', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    @if($listings)
                        @foreach($listings as $listing)
                            <option value="{{$listing->id }}"  {{ old('listing_id','') == $listing->id ? 'selected' : '' }}>{{$listing->title ?? ''	 }}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            <div class="form">


                <div class="form-group custom-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="mb-1 font-weight-medium text-muted" for="note_en">@lang('activity.tasks.note')</label>

                        <input onchange="toggle_note()" class="note" type="checkbox"
                               checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                               data-offstyle="success">

                    </div>

                    <div class="note_en">

                        <textarea id="note_en" name="note_en" >{{old('note_en')}}</textarea>
                    </div>
                    <div class="note_ar d-none">


                        <textarea id="note_ar"  name="note_ar" >{{old('note_ar')}}</textarea>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-md-6">

                 <div class="form-group">
                    <label for="">@lang('activity.tasks.staff')</label>
                    <select class="form-control select2" data-toggle="select2" name="staffs[]" multiple required>
                        <option disabled>Select</option>
                        @if($staffs)
                            @foreach($staffs as $staff)
                                <option value="{{$staff->id }}"  {{in_array($staff->id, old('staffs', [])) ? 'selected' : ''}}>
                                    {{$staff->{'name_'.app()->getLocale()} }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                 </div>

            <div class="form-group mb-3">
                <label class="font-weight-medium text-muted">@lang('activity.tasks.deadline')</label>
                <input type="text" name="deadline" id="deadline_add" value="{{ old('deadline') ?? '' }}"  class="form-control basic-datepicker" placeholder="@lang('activity.tasks.deadline')" required>
            </div>

            <div class="form-group mb-3">
                <label for="">@lang('activity.tasks.time')</label>
                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                    <input type="text" class="form-control" name="time" id="time" value="{{ old('time','') }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                    </div>
                </div>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="custom_reminder" id="custom_reminder" {{ old('custom_reminder','on') ? 'checked' : '' }} onchange="show_custom_reminder()">
                <label class="custom-control-label" for="custom_reminder">@lang('activity.tasks.custom_reminder')</label>
            </div>

            <div class="form-group mt-2" id="div_custom_reminder" style="display: none">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.custom_reminder')</label>
                <div class="d-flex">
                    <div class="" style="flex:2">
                        <select class="selectpicker mb-0 show-tick"  name="period_reminder" id="period_reminder">

                                <option value="after" {{ old('period_reminder','') == 'after' ? 'selected' : '' }}>@lang('activity.after')</option>
                                <option value="before" {{ old('period_reminder','') == 'before' ? 'selected' : '' }}>@lang('activity.before')</option>

                        </select>
                    </div>
                    <div class="px-2" style="flex:2">
                        <select class="selectpicker mb-0 show-tick"  name="type_reminder" id="type_reminder">

                            <option value="hours" {{ old('type_reminder','') == 'hours' ? 'selected' : '' }}>@lang('activity.hour')</option>
                            <option value="days" {{ old('type_reminder','') == 'days' ? 'selected' : '' }}>@lang('activity.day')</option>

                        </select>
                    </div>
                    <div class="" style="flex:2">
                        <input type="number" class="form-control" name="type_reminder_number" id="type_reminder_number" value="{{ old('type_reminder_number',1) }}">
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="d-flex justify-content-end">

        <button onclick="event.preventDefault();hide_add_div()" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2" id="submit">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.submit')
        </button>
    </div>
</form>



@push('js')

<script>

    $(document).ready(function(){
        var custom_reminder = document.getElementById('custom_reminder');
        if (custom_reminder.checked == true){
            div_custom_reminder.style.display = "block";
        }else{
            div_custom_reminder.style.display = "none";
        }

        var old_module = document.getElementById('old_module').value;

        if (old_module){
            show_module_div(old_module);
        } else{
            show_module_div('lead');
        }

    });

    function hide_add_div(){

        var  div = document.querySelector('.add_task');

        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    function show_custom_reminder()
    {
        var  custom_reminder        = document.getElementById('custom_reminder');
        var  div_custom_reminder    = document.getElementById('div_custom_reminder');

        if (custom_reminder.checked == true){
            div_custom_reminder.style.display = "block";
        }else{
            div_custom_reminder.style.display = "none";
        }
    }

    function show_module_div(module)
    {
        var leads_div           = document.getElementById('leads_div');
        var opportunities_div   = document.getElementById('opportunities_div');
        var clients_div         = document.getElementById('clients_div');
        var listings_div        = document.getElementById('listings_div');

        if (module == 'lead')
        {
            leads_div.style.display         = 'block';
            opportunities_div.style.display = 'none';
            clients_div.style.display       = 'none';
            listings_div.style.display      = 'none';

        }else if(module == 'opportunity'){

            leads_div.style.display         = 'none';
            opportunities_div.style.display = 'block';
            clients_div.style.display       = 'none';
            listings_div.style.display      = 'none';

        }else if(module == 'client'){

            leads_div.style.display         = 'none';
            opportunities_div.style.display = 'none';
            clients_div.style.display       = 'block';
            listings_div.style.display      = 'none';

        }else if(module == 'listing'){

            leads_div.style.display         = 'none';
            opportunities_div.style.display = 'none';
            clients_div.style.display       = 'none';
            listings_div.style.display      = 'block';

        }
    }
</script>
@endpush