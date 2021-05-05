<form action="{{ route('activity.tasks.update',$task->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PUT')

        <div class="col-md-6">



            <div class="form-group">
                <label for="">@lang('activity.tasks.task_type')</label>
                <input type="hidden" id="task_types_edit" value="{{$task_types?? ''}}"/>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="task_type_edit_{{ $task->id }}"  id="task_type_edit_{{ $task->id }}" onchange="show_reference_div_edit('{{ $task->id }}')" required>

                    <option value=""                    {{ old('task_type_edit_'.$task->id, '') == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    {{--<option value="general_reminder"    {{ old('task_type_edit_'.$task->id, $task->type ) == 'general_reminder'   ? 'selected' : ''}} > General Reminder</option>--}}
                    {{--<option value="property_viewing"    {{ old('task_type_edit_'.$task->id, $task->type ) == 'property_viewing'   ? 'selected' : ''}} > Property Viewing</option>--}}
                    {{--<option value="call"                {{ old('task_type_edit_'.$task->id, $task->type ) == 'call'               ? 'selected' : ''}} > call</option>--}}
                    {{--<option value="send_documents"      {{ old('task_type_edit_'.$task->id, $task->type ) == 'send_documents'     ? 'selected' : ''}} > Send Documents</option>--}}
                    {{--<option value="collect_documents"   {{ old('task_type_edit_'.$task->id, $task->type ) == 'collect_documents'  ? 'selected' : ''}} > Collect Documents</option>--}}
                    {{--<option value="meeting"             {{ old('task_type_edit_'.$task->id, $task->type ) == 'meeting'            ? 'selected' : ''}} > Meeting</option>--}}
                    {{--<option value="email"               {{ old('task_type_edit_'.$task->id, $task->type ) == 'email'              ? 'selected' : ''}} > Email</option>--}}
                    {{--<option value="payment_collection"  {{ old('task_type_edit_'.$task->id, $task->type ) == 'payment_collection' ? 'selected' : ''}} > Payment Collection</option>--}}
                    {{--<option value="cheque_submission"   {{ old('task_type_edit_'.$task->id, $task->type ) == 'cheque_submission'  ? 'selected' : ''}} > Cheque Submission</option>--}}


                    @if($task_types)
                        @foreach($task_types as $type)
                            <option value="{{$type->id }}"
                                {{ old('task_type_edit_'.$task->id,$task->task_type && $task->task_type->id ? $task->task_type->id : '' ) == $type->id ? 'selected' : ''}}>
                                {{$type->{'type_'.app()->getLocale()} }}
                            </option>
                        @endforeach
                    @endif


                </select>

            </div>



            {{--<div class="form-group" id="reference_div_edit_{{$task->id}}" style="display: none">--}}
                {{--<label for="">@lang('activity.tasks.reference')</label>--}}
                {{--<input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference',$task->reference) }}"/>--}}
            {{--</div>--}}


            <div class="form-group">
                <label for="">@lang('activity.tasks.status')</label>
                <select class="selectpicker mb-0 show-tick" name="status_{{$task->id}}" data-toggle="select2" id="status_{{$task->id}}" required>

                    <option value="" {{old('status_'.$task->id, '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    {{--<optgroup label="Open">--}}
                        {{--<option value="not_started"             {{ old('status_'.$task->id, $task->status ) == 'not_started' ? 'selected' : ''}} > Not Started</option>--}}
                        {{--<option value="in_progress"             {{ old('status_'.$task->id, $task->status ) == 'in_progress' ? 'selected' : ''}} > In Progress</option>--}}
                        {{--<option value="waiting_client"          {{ old('status_'.$task->id, $task->status ) == 'waiting_client' ? 'selected' : ''}} > Waiting for client</option>--}}
                        {{--<option value="waiting_documents"       {{ old('status_'.$task->id, $task->status ) == 'waiting_documents' ? 'selected' : ''}} > Waiting for Documents</option>--}}
                        {{--<option value="waiting_approval"        {{ old('status_'.$task->id, $task->status ) == 'waiting_approval' ? 'selected' : ''}} > Waiting for Approval</option>--}}
                    {{--</optgroup>--}}

                    {{--<optgroup label="Archive">--}}
                        {{--<option value="completed_successful"    {{ old('status_'.$task->id, $task->status ) == 'completed_successful' ? 'selected' : ''}} > Completed-Successful</option>--}}
                        {{--<option value="completed_unsuccessful"  {{ old('status_'.$task->id, $task->status ) == 'completed_unsuccessful' ? 'selected' : ''}} > Completed-Unsuccessful</option>--}}
                        {{--<option value="escalated_manager"       {{ old('status_'.$task->id, $task->status ) == 'escalated_manager' ? 'selected' : ''}} > Escalated to Manager</option>--}}
                    {{--</optgroup>--}}


                    @if($task_status)
                        @foreach($task_status as $status)
                            <option value="{{$status->id }}"
                                {{old('status_'.$task->id, $task->task_status && $task->task_status->id ? $task->task_status->id : '') == $status->id ? 'selected' : ''}} >
                                {{$status->{'status_'.app()->getLocale()} }}
                            </option>
                        @endforeach
                    @endif

                </select>

            </div>

            <input type="hidden" id="old_module_edit_{{$task->id}}" value="{{ old('module_edit_'.$task->id,$task->module) ?? '' }}"/>
            <input type="hidden" id="task_id_edit" value="{{ $task->id }}"/>
            <div class="form-group" style="margin-bottom:32px">
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="lead_edit_{{$task->id}}" value="lead" onchange="show_module_div_edit('lead',{{$task->id}})" name="module_edit_{{$task->id}}" {{ old('module_edit_'.$task->id,$task->module) == 'lead' ? 'checked' : '' }} {{ old('module_edit_'.$task->id,null) == null ? 'checked' : '' }} >
                    <label for="lead_edit_{{$task->id}}"> @lang('sales.lead') </label>
                </div>

                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="opportunity_edit_{{$task->id}}" value="opportunity" onchange="show_module_div_edit('opportunity',{{$task->id}})" name="module_edit_{{$task->id}}" {{ old('module_edit_'.$task->id,$task->module) == 'opportunity' ? 'checked' : '' }} >
                    <label for="opportunity_edit_{{$task->id}}"> @lang('sales.opportunity')</label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="client_edit_{{$task->id}}" value="client" onchange="show_module_div_edit('client',{{$task->id}})" name="module_edit_{{$task->id}}" {{ old('module_edit_'.$task->id,$task->module) == 'client' ? 'checked' : '' }} >
                    <label for="client_edit_{{$task->id}}"> @lang('sales.client') </label>
                </div>
                <div class="radio radio-info form-check-inline">
                    <input type="radio" id="listing_edit_{{$task->id}}" value="listing" onchange="show_module_div_edit('listing',{{$task->id}})" name="module_edit_{{$task->id}}" {{ old('module_edit_'.$task->id,$task->module) == 'listing' ? 'checked' : '' }} >
                    <label for="listing_edit_{{$task->id}}"> @lang('sales.listing') </label>
                </div>
            </div>

            {{--select leads--}}
            <div class="form-group" id="leads_div_edit_{{$task->id}}" style="display:none">
                <label for="">@lang('sales.leads')</label>
                <select class="form-control select2"  data-toggle="select2" name="lead_id_edit_{{$task->id}}" >

                    <option value="" {{old('lead_id_edit_'.$task->id, '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    @if($leads)
                        @foreach($leads as $lead)
                            <option value="{{$lead->id }}"  {{ old('lead_id_edit_'.$task->id, ($task->module == 'lead') ? $task->module_id : '') == $lead->id ? 'selected' : '' }}>{{$lead->full_name ?? ''	 }}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            {{--select opportunity--}}
            <div class="form-group" id="opportunities_div_edit_{{$task->id}}" style="display:none">
                <label for="">@lang('sales.opportunity')</label>
                <select class="form-control select2"  data-toggle="select2" name="opportunity_id_edit_{{$task->id}}" >

                    <option value="" {{old('opportunity_id_edit_'.$task->id, '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>
                    @if($opportunities)
                        @foreach($opportunities as $opportunity)
                            <option value="{{$opportunity->id }}"  {{ old('opportunity_id_edit_'.$task->id,($task->module == 'opportunity') ? $task->module_id : '') == $opportunity->id ? 'selected' : '' }}>{{ $opportunity->lead && $opportunity->lead->full_name ? $opportunity->lead->full_name : ''	 }}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            {{--select client--}}
            {{--<div class="form-group" id="clients_div">--}}
            {{--<label for="">@lang('sales.client')</label>--}}
            {{--<select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="client_id_edit_{{$task->id}}" >--}}

            {{--<option value="" {{old('client_id', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>--}}
            {{--@if($clients)--}}
            {{--@foreach($clients as $client)--}}
            {{--<option value="{{$client->id }}"  {{ old('client_id','') == $client->id ? 'selected' : '' }}>{{$client->name	 }}</option>--}}
            {{--@endforeach--}}
            {{--@endif--}}
            {{--</select>--}}

            {{--</div>--}}

            {{--select listing--}}
            {{--<div class="form-group" id="listings_div">--}}
            {{--<label for="">@lang('sales.listing')</label>--}}
            {{--<select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="listing_id_edit_{{$task->id}}" >--}}

            {{--<option value="" {{old('listing_id', '' ) == '' ? 'selected' : ''}} disabled > @lang('global.pleaseSelect')</option>--}}
            {{--@if($listings)--}}
            {{--@foreach($listings as $listing)--}}
            {{--<option value="{{$listing->id }}"  {{ old('listing_id','') == $listing->id ? 'selected' : '' }}>{{$listing->name	 }}</option>--}}
            {{--@endforeach--}}
            {{--@endif--}}
            {{--</select>--}}

            {{--</div>--}}

            <div class="form" >


                <div class="form-group custom-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="mb-1 font-weight-medium text-muted" for="note_en">@lang('activity.tasks.last_note')</label>

                        <input onchange="toggle_edit_note('{{ $task->id }}')" class="notes_edit_{{ $task->id }}" type="checkbox"
                               checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                               data-offstyle="success">

                    </div>

                    <div class="notes_edit_en_{{ $task->id }}">

                        <textarea id="notes_edit_en_{{ $task->id }}" name="edit_notes_en_{{ $task->id }}" >{{old('edit_notes_en_'.$task->id,$task->notes && $task->notes->last() && $task->notes->last()->notes_en ? $task->notes->last()->notes_en : '')}}</textarea>
                    </div>
                    <div class="notes_edit_ar_{{ $task->id }} d-none">

                        <textarea id="notes_edit_ar_{{ $task->id }}"  name="edit_notes_ar_{{ $task->id }}" >{{old('edit_notes_ar_'.$task->id,$task->notes && $task->notes->last() && $task->notes->last()->notes_ar ? $task->notes->last()->notes_ar : '')}}</textarea>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="">@lang('activity.tasks.staff')</label>
                <select class="form-control select2 "  data-toggle="select2" name="staff_edit_{{$task->id}}[]" id="staff_{{$task->id}}" multiple required>
                    <option disabled>Select</option>
                    @if($staffs)
                        @foreach($staffs as $staff)
                            <option value="{{$staff->id }}"
                                    {{(in_array($staff->id, old('staff_edit_'.$task->id, [])) || $task->staff->contains($staff->id)) ? 'selected' : ''}} >
                                    {{--{{old('staff_edit_'.$task->id,$task->staff && $task->staff->id ? $task->staff->id : '') == $staff->id ? 'selected' : ''}} >--}}
                                    {{$staff->{'name_'.app()->getLocale()} }}
                            </option>
                        @endforeach
                    @endif
                </select>

            </div>

            <div class="form-group mb-3">
                <label class="font-weight-medium text-muted">@lang('activity.tasks.deadline')</label>
                <input type="text" name="deadline_edit_{{$task->id}}" id="deadline_edit_{{$task->id}}" value="{{ old('deadline_edit_'.$task->id,$task->deadline ?? '')}}" class="form-control basic-datepicker" placeholder="@lang('activity.tasks.deadline')" required>
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="">@lang('activity.tasks.time')</label>--}}
                {{--<input type="time" class="form-control" name="time_edit_{{$task->id}}" id="time_edit_{{$task->id}}" value="{{ date('H:i', strtotime( old('time_edit_'.$task->id,$task->time ?? ''))) }}" required>--}}
            {{--</div>--}}

            <div class="form-group mb-3">
                <label for="">@lang('activity.tasks.time')</label>
                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                    <input type="text" class="form-control"  name="time_edit_{{$task->id}}" id="time_edit_{{$task->id}}" value="{{ date('H:i', strtotime( old('time_edit_'.$task->id,$task->time ?? ''))) }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                    </div>
                </div>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"  name="custom_reminder_edit_{{$task->id}}" id="custom_reminder_edit_{{$task->id}}"
                       {{ old('custom_reminder_edit_'.$task->id,$task->custom_reminder ?? '') == 'on' ? 'checked' : '' }}
                       onchange="show_custom_reminder_edit('{{$task->id}}')">

                <label class="custom-control-label" for="custom_reminder_edit_{{$task->id}}">@lang('activity.tasks.custom_reminder')</label>
            </div>

            <div class="form-group mt-2" id="div_custom_reminder_edit_{{$task->id}}" style="display: none">
                <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.custom_reminder')</label>
                <div class="d-flex">
                    <div class="" style="flex:2">
                        <select class="selectpicker mb-0 show-tick"  name="period_reminder_edit_{{$task->id}}" id="period_reminder_edit_{{$task->id}}">
                            <option selected disabled>Select</option>

                            <option value="after" {{ old('period_reminder_edit_'.$task->id,$task->period_reminder)  == 'after' ? 'selected' : ''}}>@lang('activity.after')</option>
                            <option value="before" {{ old('period_reminder_edit_'.$task->id,$task->period_reminder)  == 'before' ? 'selected' : ''}}>@lang('activity.before')</option>

                        </select>
                    </div>
                    <div class="px-2" style="flex:2">
                        <select class="selectpicker mb-0 show-tick"  name="type_reminder_edit_{{$task->id}}" id="type_reminder_edit_{{$task->id}}">
                            <option selected disabled>Select</option>

                            <option value="hours" {{ old('type_reminder_edit_'.$task->id,$task->type_reminder)  == 'hours' ? 'selected' : ''}}>@lang('activity.hour')</option>
                            <option value="days" {{ old('type_reminder_edit_'.$task->id,$task->type_reminder)  == 'days' ? 'selected' : ''}}>@lang('activity.day')</option>

                        </select>
                    </div>
                    <div class="" style="flex:2">
                        <input type="number" class="form-control" name="type_reminder_number_edit_{{$task->id}}" id="type_reminder_number_edit_{{$task->id}}" value="{{old('type_reminder_number_edit_'.$task->id,$task->type_reminder_number)}}">
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_edit_div({{ $task->id }})" type="button" class="btn btn-lg btn-outline-success waves-effect waves-light">
           @lang('agency.cancel')
        </button>
        <button type="submit" class="btn btn-lg btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('agency.modify')
        </button>
    </div>
    
    </form>

@push('js')

    <script>
        $(document).ready(function() {

            var custom_reminder_edit =  document.getElementById('custom_reminder_edit_'+'{{$task->id}}');
            if (custom_reminder_edit.checked == true){
                show_custom_reminder_edit('{{$task->id}}');
            }
            {{--show_reference_div_edit('{{$task->id}}');--}}


            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $task->id ))
                show_module_div_edit('{{$task->module}}' , '{{$task->id}}');
            @endif

            {{--var  tasks = @json($tasks);--}}

            {{--for(var i = 0; i < tasks.data.length; i++) {--}}
                {{--// var task_id_edit = document.getElementById('task_id_edit').value;--}}
                {{--var old_module_edit = document.getElementById('old_module_edit_' + tasks.data[i].id).value;--}}

                {{--// console.log(old_module_edit);--}}
                {{--if (old_module_edit) {--}}
                    {{--show_module_div_edit(old_module_edit, task_id_edit);--}}
                {{--} else {--}}
                    {{--show_module_div_edit('lead', task_id_edit);--}}
                {{--}--}}
            {{--}--}}
        });

        function show_custom_reminder_edit(id)
        {
            var  custom_reminder_edit        = document.getElementById('custom_reminder_edit_'+id);
            var  div_custom_reminder_edit    = document.getElementById('div_custom_reminder_edit_'+id);

            if (custom_reminder_edit.checked == true){
                div_custom_reminder_edit.style.display = "block";
            }else{
                div_custom_reminder_edit.style.display = "none";
            }
        }

        // function show_reference_div_edit(id)
        // {
        //
        //
        //         var task_type_edit = document.getElementById('task_type_edit_'+id).value;
        //         var reference_div_edit = document.getElementById('reference_div_edit_'+id);
        //
        //         if (task_type_edit == 'property_viewing')
        //         {
        //             reference_div_edit.style.display = 'block';
        //
        //         }else{
        //
        //             reference_div_edit.style.display = 'none';
        //
        //         }
        //
        // }

        function show_module_div_edit(module,id)
        {

            var leads_div_edit           = document.getElementById('leads_div_edit_'+id);
            var opportunities_div_edit   = document.getElementById('opportunities_div_edit_'+id);
            var clients_div_edit         = document.getElementById('clients_div_edit_'+id);
            var listings_div_edit        = document.getElementById('listings_div_edit_'+id);

            if (module == 'lead')
            {

                leads_div_edit.style.display         = 'block';
                opportunities_div_edit.style.display = 'none';
                // clients_div_edit.style.display       = 'none';
                // listings_div_edit.style.display      = 'none';

            }else if(module == 'opportunity'){

                leads_div_edit.style.display         = 'none';
                opportunities_div_edit.style.display = 'block';
                // clients_div_edit.style.display       = 'none';
                // listings_div_edit.style.display      = 'none';

            }else if(module == 'client'){

                leads_div_edit.style.display         = 'none';
                opportunities_div_edit.style.display = 'none';
                // clients_div_edit.style.display       = 'block';
                // listings_div_edit.style.display      = 'none';

            }else if(module == 'listing'){

                leads_div_edit.style.display         = 'none';
                opportunities_div_edit.style.display = 'none';
                // clients_div_edit.style.display       = 'none';
                // listings_div_edit.style.display      = 'block';

            }
        }

    </script>
@endpush
