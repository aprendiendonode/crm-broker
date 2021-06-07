
<div class="row">
<div class="col-md-4">
    <h4>@lang('sales.add_task')</h4>

<form  action="{{ url('sales/manage_leads/assign_task/'.$lead->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="task_agency_id_{{ $lead->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="task_business_id_{{ $lead->id }}" value="{{ $business }}">
            @endif


            <input type="hidden" value="{{ $lead->id }}" name="task_lead_id">

    
  
        <div class="col-md-12">
    
       
            <div class="form-group">
                <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.task_type')</label>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="task_type_{{ $lead->id }}" id="task_type_{{ $lead->id }}" data-style="btn-outline-secondary" onchange="show_reference_div()"  required>

                    <option value="" > @lang('global.pleaseSelect')</option>
                        {{-- <option value="general_reminder"    {{ old('task_type' ) == 'general_reminder'   ? 'selected' : ''}} > General Reminder</option>
                        <option value="property_viewing"    {{ old('task_type' ) == 'property_viewing'   ? 'selected' : ''}} > Property Viewing</option>
                        <option value="call"                {{ old('task_type' ) == 'call'               ? 'selected' : ''}} > call</option>
                        <option value="send_documents"      {{ old('task_type' ) == 'send_documents'     ? 'selected' : ''}} > Send Documents</option>
                        <option value="collect_documents"   {{ old('task_type' ) == 'collect_documents'  ? 'selected' : ''}} > Collect Documents</option>
                        <option value="meeting"             {{ old('task_type' ) == 'meeting'            ? 'selected' : ''}} > Meeting</option>
                        <option value="email"               {{ old('task_type' ) == 'email'              ? 'selected' : ''}} > Email</option>
                        <option value="payment_collection"  {{ old('task_type' ) == 'payment_collection' ? 'selected' : ''}} > Payment Collection</option>
                        <option value="cheque_submission"   {{ old('task_type' ) == 'cheque_submission'  ? 'selected' : ''}} > Cheque Submission</option> --}}


                        @if($task_types)
                            @foreach($task_types as $type)
                               <option value="{{$type->id }}" {{ old('task_type_'.$lead->id) == $type->id ? 'selected' : '' }}>{{$type->{'type_'.app()->getLocale()} }}</option>
                           @endforeach
                        @endif


                </select>

            </div>



            <div class="form-group">
                <label class="font-weight-medium text-muted" for="  ">@lang('activity.tasks.status')</label>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="task_status_{{ $lead->id }}" data-style="btn-outline-secondary" required>

                    <option value=""  > @lang('global.pleaseSelect')</option>
                    {{-- <optgroup label="Open">
                        <option value="not_started"             {{old('status', '' ) == 'not_started' ? 'selected' : ''}} > Not Started</option>
                        <option value="in_progress"             {{old('status', '' ) == 'in_progress' ? 'selected' : ''}} > In Progress</option>
                        <option value="waiting_client"          {{old('status', '' ) == 'waiting_client' ? 'selected' : ''}} > Waiting for client</option>
                        <option value="waiting_documents"       {{old('status', '' ) == 'waiting_documents' ? 'selected' : ''}} > Waiting for Documents</option>
                        <option value="waiting_approval"        {{old('status', '' ) == 'waiting_approval' ? 'selected' : ''}} > Waiting for Approval</option>
                        </optgroup>

                        <optgroup label="Archive">
                            <option value="completed_successful"    {{old('status', '' ) == 'completed_successful' ? 'selected' : ''}} > Completed-Successful</option>
                            <option value="completed_unsuccessful"  {{old('status', '' ) == 'completed_unsuccessful' ? 'selected' : ''}} > Completed-Unsuccessful</option>
                            <option value="escalated_manager"       {{old('status', '' ) == 'escalated_manager' ? 'selected' : ''}} > Escalated to Manager</option>
                        </optgroup> --}}

                        @if($task_status)
                        
                                <optgroup label="@lang('sales.open')">
                                   @foreach($task_status->where('type_complete','off') as $status)
                                      
                                        <option value="{{$status->id }}"  {{ old('task_status_'.$lead->id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach          
                                </optgroup>  
                                
                                <optgroup label="@lang('sales.archive')">
                                    @foreach($task_status->where('type_complete','on') as $status)
                                      
                                        <option value="{{$status->id }}"  {{ old('task_status_'.$lead->id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach     
                                </optgroup> 
                      
                        @endif


                    </select>



            </div>
    
   
             
        
        </div>
    
  
    
    <div class="col-md-12">
        <div class="form">


            <div class="form-group custom-toggle">
                <div class="d-flex justify-content-between">
                    <label class="mb-1 font-weight-medium text-muted" for="note_en">@lang('activity.tasks.note')</label>

                    <input onchange="toggle_task_note({{ $lead->id }})" class="notes_task_{{ $lead->id }}" type="checkbox"
                           checked data-toggle="toggle" data-on="Ar" data-off="EN" data-onstyle="primary"
                           data-offstyle="success">

                </div>

                <div class="task_note_en_{{ $lead->id }}">

                    <textarea id="task_note_en_{{ $lead->id }}" name="task_note_en_{{ $lead->id }}" >{{old('task_note_en_'.$lead->id)}}</textarea>
                </div>
                <div class="task_note_ar_{{ $lead->id }} d-none">


                    <textarea id="task_note_ar_{{ $lead->id }}"  name="task_note_ar_{{ $lead->id }}" >{{old('task_note_ar_'.$lead->id)}}</textarea>
                </div>

            </div>

        </div>


   
            
        <div class="col-md-12">



            <div class="radio radio-single">
                <input type="radio" onchange="hide_task_custom({{ $lead->id }})" id="task_radio_1_{{ $lead->id }}" value="all" name="task_assigned_{{ $lead->id }}" aria-label="Single radio One">
                <label clas="font-weight-medium text-muted" for="task_radio_1_{{ $lead->id }}">@lang('sales.everyone')</label>
            </div>
            <div class="radio radio-success radio-single mb-3 mt-2">
                <input type="radio" onchange="show_task_custom({{ $lead->id }})" id="task_radio_2_{{ $lead->id }}" value="custom" name="task_assigned_{{ $lead->id }}" checked aria-label="Single radio Two">
                <label class="font-weight-medium text-muted" for="task_radio_2_{{ $lead->id }}">@lang('sales.custom')</label>
            </div>

    
            <div class="form-group custom-task-staff_{{ $lead->id }}">
                <h4 class="header-title">@lang('sales.select_staff')</h4>
                @forelse(staff($agency) as $employee)
                
                        <div class="checkbox checkbox-primary mb-2">
                            <input   id="task_{{ $lead->id}}_{{ $employee->id }}" value="{{ $employee->id }}" type="checkbox" name="task_staff_{{ $lead->id }}[]">
                            <label class="font-weight-medium text-muted" for="task_{{ $lead->id}}_{{ $employee->id }}">
                                {{ $employee->{'name_'.app()->getLocale()} }}
                            </label>
                        </div>
                  
          
                @empty

                @endforelse
            
             
            </div>
       
         

         
             
        
        </div>
    
    </div>




    <div class="col-md-12">
        <div class="form-group mb-1">
            <label class="font-weight-medium text-muted">@lang('activity.tasks.deadline')</label>
            <input type="text" name="task_deadline_{{ $lead->id }}" id="task_deadline_{{ $lead->id }}" value="{{ old('task_deadline_'.$lead->id,date('Y-m-d')) }}"  class="form-control basic-datepicker" placeholder="@lang('activity.tasks.deadline')" required>
        </div>

    
    </div>


    
    <div class="col-md-12 mb-1">
        <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.time')</label>
        {{-- <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true"> --}}
            <input type="text" class="form-control clockpicker" name="task_time_{{ $lead->id }}" id="task_time_{{ $lead->id }}" data-autoclose="true" value="{{ old('task_time_'.$lead->id,date('h:i')) }}" required>
    
        {{-- </div> --}}
    </div>


    <div class="col-md-12">

        
        <div class="custom-control custom-checkbox mb-3">
            <input type="hidden"  name="task_custom_reminder_{{ $lead->id }}" value="off" >
            <input type="checkbox" @if(old('task_custom_reminder_'.$lead->id) == 'on') checked  @endif class="custom-control-input" value="on" name="task_custom_reminder_{{ $lead->id }}" id="task_custom_reminder_{{ $lead->id }}" onchange="show_custom_reminder({{ $lead->id }})">
            <label class="custom-control-label" for="task_custom_reminder_{{ $lead->id }}">@lang('activity.tasks.custom_reminder')</label>
        </div>

        <div class="form-group mt-2" id="div_custom_reminder_{{ $lead->id }}" style="display: none">
            <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.custom_reminder')</label>
            <div class="d-flex">
                <div class="" style="flex:2">
                    <select class="selectpicker mb-0 show-tick" data-style="btn-outline-secondary"  name="task_period_reminder_{{ $lead->id }}" id="task_period_reminder_{{ $lead->id }}">

                            <option value="after" {{ old('task_period_reminder_'.$lead->id) == 'after' ? 'selected' : '' }}>@lang('activity.after')</option>
                            <option value="before" {{ old('task_period_reminder_'.$lead->id) == 'before' ? 'selected' : '' }}>@lang('activity.before')</option>

                    </select>
                </div>
                <div class="px-2" style="flex:2">
                    <select class="selectpicker mb-0 show-tick"  data-style="btn-outline-secondary" name="task_type_reminder_{{ $lead->id }}" id="task_type_reminder_{{ $lead->id }}">

                        <option value="hours" {{ old('task_type_reminder_'.$lead->id) == 'hours' ? 'selected' : '' }}>@lang('activity.hour')</option>
                        <option value="days" {{ old('task_type_reminder_'.$lead->id)  == 'days'  ? 'selected' : '' }}>@lang('activity.day')</option>

                    </select>
                </div>
                <div class="" style="flex:2">
                    <input type="number" class="form-control" data-parsley-type="integer" name="task_type_reminder_number_{{ $lead->id }}" id="task_type_reminder_number_{{ $lead->id }}" value="{{ old('task_type_reminder_number_'.$lead->id,1) }}">
                </div>
            </div>
        </div>
       
    

    </div>

    
</div>
<div class="d-flex justify-content-end">

    <button onclick="event.preventDefault();table_row_hide('lead_task_{{ $lead->id }}')" type="button" class="btn  btn-outline-success waves-effect waves-light">
       @lang('sales.cancel')
    </button>
    <button type="submit" onclick="check_assigned_staff()" class="btn  btn-success waves-effect waves-light ml-2">
        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.start_task')
    </button>
</div>

  
    
  
    
    </form>
</div>
<div class="col-md-8 card">

  
        <div class="card-box">
                
            <h5>@lang('sales.task_history')</h5>
                                    
        <div class="table-responsive">
        <table class="table table-bordered toggle-circle mb-0">
                
          

        <thead class="thead-light">
            <th>#</th>
            <th>@lang('sales.type')</th>
            <th>@lang('sales.status')</th>
            <th>@lang('sales.deadline')</th>
            <th>@lang('sales.assigned_by')</th>
            <th>@lang('sales.controlls')</th>
        </thead>
        <tbody>
            @if($lead->tasks)
            @forelse($lead->tasks->sortByDesc('id') as $task)
            <tr>
            <td>{{ ($loop->index + 1) }}  </td>
            <td>

                @php
                   $task_type =  Modules\Activity\Entities\TaskType::where('id' ,$task->task_type_id)->get();
                   
                @endphp
                
                {{ $task_type ?str_replace("_"," ", $task_type->first()->{'type_'.app()->getLocale()} ) :'' }}
            </td>
            <td>
                
                @php
                   $task_status =  Modules\Activity\Entities\TaskStatus::where('id' ,$task->task_status_id)->get();
                   
                @endphp
                
                {{ $task_status ? str_replace("_"," ",$task_status->first()->{'status_'.app()->getLocale()} ):'' }}
                
                
                
            
            </td>


            <td>

                @php

                    $task_type_complete = $task_status ? $task_status->first()->type_complete : '';

                @endphp
                
                {{  Carbon\Carbon::parse($task->deadline.' '.  $task->time)->diffForHumans()   }}


                   @if(!( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete != 'on' ) <span class="badge badge-soft-danger">@lang('sales.overdue')</span> 
                   @elseif(!( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete == 'on')  <span class="badge badge-soft-success">@lang('sales.achieved')</span>
                   @elseif(( Carbon\Carbon::parse($task->deadline.' '.  $task->time)->gt(now()) ) && $task_type_complete == 'off')  <span class="badge badge-soft-info">@lang('sales.active')</span> @endif  </td>

  

            <td>{{ $task->addBy ? $task->addBy->{'name_'.app()->getLocale()} : '' }}</td>

            <td>
                {{-- @can('delete_lead') --}}
                    <i
                        data-plugin="tippy" 
                        data-tippy-placement="top-start" 
                        title="@lang('sales.details')"
                        
                        onclick="show_task_row({{ $lead->id }},{{ $task->id }})"
                        class="fe-eye cursor-pointer feather-16">
                    </i>
                    <i
                        data-plugin="tippy" 
                        data-tippy-placement="top-start" 
                        title="@lang('sales.delete_task')"
                        data-toggle="modal" data-target="#delete-task-alert-modal_{{ $task->id }}"
                    
                        class="fe-trash cursor-pointer feather-16">
                    </i>
                {{-- @endcan --}}
            </td>
            </tr>


            <tr  class="task_row_{{ $task->id }}_{{ $lead->id }}"   style="display: none;opacity:0;transition:0.7s">
                <td colspan="7">

                    @include('sales::leads.task_row')

                </td>
            </tr>





            <div id="delete-task-alert-modal_{{ $task->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                <i class="dripicons-information h1 text-danger"></i>
                                <h4 class="mt-2">@lang('agency.head_up')</h4>
                                <p class="mt-3">@lang('sales.task_warning') </p>
                                <form action="{{ url('sales/delete-tasks') }}" method="post">
                                    @csrf
                                    <input  type="hidden" name="task_id" value="{{ $task->id }}">
                                    <input type="hidden" name="task_lead_id" value="{{ $lead->id }}">

                                    <button type="submit" formaction="{{ url('sales/delete-tasks')}}"class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                    <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            @empty
            <tr>
             <td colspan="5" class="text-center">@lang('sales.no_records')</td>
            </tr>

            @endforelse
            @else   

            @lang('sales.no_records')

            @endif
        </tbody>
      </table>
        </div>
        </div>
    </div>
</div>


@push('js')




  

<script>

    $(document).ready(function () {
       var reminder = @json(old('task_custom_reminder_'.$lead->id));
       var task_lead_id  = @json($lead->id);
        if(reminder == 'on'){

            show_custom_reminder(task_lead_id)
        }
    })
        function hide_task_custom(id){
                $('.custom-task-staff_'+id).addClass('d-none');
        }

        function show_task_custom(id){
            $('.custom-task-staff_'+id).removeClass('d-none');
            
        }
    
   function show_custom_reminder(id)
    {
        
        var  custom_reminder        = document.getElementById('task_custom_reminder_'+id);
        var  div_custom_reminder    = document.getElementById('div_custom_reminder_'+id);

        if (custom_reminder.checked == true){
            div_custom_reminder.style.display = "block";
        }else{
            div_custom_reminder.style.display = "none";
        }
    }


    function toggle_task_note(id){
        type = $('.notes_task_'+id).prop('checked');
        if(type == true){
            //english
            $('.task_note_en_'+id).removeClass('d-none');
            $('.task_note_ar_'+id).addClass('d-none');
        } else {
            $('.task_note_en_'+id).addClass('d-none');
            $('.task_note_ar_'+id).removeClass('d-none');


        }
    }


 



 
      
    function  show_task_row(lead,task){
  
    var  div = document.querySelector('.task_row_'+task+'_'+lead);
        if(div.style.display === 'none'){




        div.style.display = '';

        setTimeout(function(){

            div.style.opacity = 1;
     
        },10);
    } else {
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    }

    }

    function  hide_task_row(lead,task){
        var  div = document.querySelector('.task_row_'+task+'_'+lead);
    
        div.style.display = 'none';
        setTimeout(function(){

        div.style.opacity = 0;
   

        },10);

    

    }

</script>
@endpush