<form  action="{{ url('sales/manage_clients/edit_assign_task/'.$client->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="edit_task_agency_id_{{ $client->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="edit_task_business_id_{{ $client->id }}" value="{{ $business }}">
            @endif
            <input type="hidden" name="edit_task_id_{{ $client->id }}" value="{{ $task->id }}">


            <input type="hidden" value="{{ $client->id }}" name="edit_task_client_id">

    
  
        <div class="form-group col-md-6">
    
       
                <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.task_type')</label>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="edit_task_type_{{ $client->id }}" id="task_type_{{ $client->id }}" data-style="btn-outline-secondary" onchange="show_reference_div()"  required>

                    <option value="" > @lang('global.pleaseSelect')</option>
                   

                        @if($task_types)
                            @foreach($task_types as $type)
                               <option value="{{$type->id }}" {{  old('edit_task_type_'.$client->id,$task->task_type_id) == $type->id ? 'selected' : '' }}>{{$type->{'type_'.app()->getLocale()} }}</option>
                           @endforeach
                        @endif


                </select>

            </div>

            {{-- @dump($task_status); --}}

            <div class="form-group col-md-6">
                <label class="font-weight-medium text-muted" for="  ">@lang('activity.tasks.status')</label>
                <select class="selectpicker mb-0 show-tick"  data-toggle="select2" name="edit_task_status_{{ $client->id }}" data-style="btn-outline-secondary" required>

                    <option value=""  > @lang('global.pleaseSelect')</option>
            
                        @if($task_status)
                        
                                <optgroup label="@lang('sales.open')">
                                   @foreach($task_status->where('type_complete','off') as $status)


                                      
                                        <option value="{{$status->id }}"  {{ old('edit_task_status_'.$client->id,$task->task_status_id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach          
                                </optgroup>  
                                
                                <optgroup label="@lang('sales.archive')">
                                    @foreach($task_status->where('type_complete','on') as $status)
                                      
                                        <option value="{{$status->id }}"  {{ old('edit_task_status_'.$client->id,$task->task_status_id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach     
                                </optgroup> 
                      
                        @endif


                    </select>



         
    
   
             
        
        </div>
    
  
    
    <div class="col-md-6">


            <div class="form-group ">
          


                    <textarea class="form-control" name="edit_task_note_en_{{ $client->id }}" >{!! $task->notes->last() ? $task->notes->last()->{'notes_'.app()->getLocale()} :'' !!}</textarea>
             
     

            </div>

        </div>


   
            
        <div class="col-md-6">
 
            <div class="form-check">
                <input type="checkbox" onclick="checkAllEditHandler({{ $task->id }})" class="form-check-input" id="checkAllEdit_{{ $task->id }}">
                <label class="form-check-label" for="checkAllEdit_{{ $task->id }}">@lang('sales.all_staff')</label>
            </div>
        <select  multiple class="form-control  select_all_edit_{{ $task->id }} select2 " name="edit_task_staff_{{ $client->id }}[]"
            data-toggle="select2" required>

            @forelse($staffs as $employee)
                @if($client->current_assign && $client->current_assign->first() && unserialize($client->current_assign->first()->assigned_to) && in_array($employee->id,unserialize($client->current_assign->first()->assigned_to)))
                    <option @if(in_array($employee->id,$task->staff->pluck('id')->toArray())) selected @endif value="{{ $employee->id }}">
                        {{ $employee->{'name_'.app()->getLocale()} }}
                    </option>
                @endif

            @empty

            @endforelse

         </select>
   
       
         

         
             
        
        </div>
    
        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="font-weight-medium text-muted">@lang('activity.tasks.deadline')</label>
                <input type="text" name="edit_task_deadline_{{ $client->id }}" id="edit_task_deadline_{{ $client->id }}" value="{{ old('edit_task_deadline_'.$client->id,$task->deadline) }}"  class="form-control basic-datepicker" placeholder="@lang('activity.tasks.deadline')" required>
            </div>
    
        
        </div>
        <div class="col-md-6 mb-1">
            <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.time')</label>
                <input type="text" class="form-control clockpicker" name="edit_task_time_{{ $client->id }}" id="edit_task_time_{{ $client->id }}" data-autoclose="true" value="{{ old('edit_task_time_'.$client->id,$task->time) }}" required>
        
        </div>
        
        
            <div class="col-md-6">
        
                
                <div class="custom-control custom-checkbox mb-3">
                    <input type="hidden"  name="edit_task_custom_reminder_{{ $client->id }}" value="off" >
                    <input type="checkbox" @if(old('edit_task_custom_reminder_'.$client->id,$task->custom_reminder) == 'on')
                     checked  @endif class="custom-control-input" value="on"
                      name="edit_task_custom_reminder_{{ $client->id }}"
                     id="task_custom_edit_reminder_{{ $client->id }}_{{ $task->id }}"
                      onchange="show_custom_edit_reminder({{ $client->id }},{{ $task->id }})">
                    <label class="custom-control-label" for="task_custom_edit_reminder_{{ $client->id }}_{{ $task->id }}">
                        @lang('activity.tasks.custom_reminder')
                    </label>
                </div>
        
                <div class="form-group mt-2" id="div_custom_edit_reminder_{{ $client->id }}_{{ $task->id }}"
                    @if(old('edit_task_custom_reminder_'.$client->id,$task->custom_reminder) != 'on')
                    style="display: none"
                      @endif 
                    >
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.custom_reminder')</label>
                    <div class="d-flex">
                        <div class="" style="flex:2">
                            <select class="selectpicker mb-0 show-tick" data-style="btn-outline-secondary"  name="edit_task_period_reminder_{{ $client->id }}" id="edit_task_period_reminder_{{ $client->id }}">
        
                                    <option value="after" {{ old('edit_task_period_reminder_'.$client->id,$task->period_reminder) == 'after' ? 'selected' : '' }}>@lang('activity.after')</option>
                                    <option value="before" {{ old('edit_task_period_reminder_'.$client->id,$task->period_reminder) == 'before' ? 'selected' : '' }}>@lang('activity.before')</option>
        
                            </select>
                        </div>
                        <div class="px-2" style="flex:2">
                            <select class="selectpicker mb-0 show-tick"  data-style="btn-outline-secondary" name="edit_task_type_reminder_{{ $client->id }}" id="edit_task_type_reminder_{{ $client->id }}">
        
                                <option value="hours" {{ old('edit_task_type_reminder_'.$client->id,$task->type_reminder) == 'hours' ? 'selected' : '' }}>@lang('activity.hour')</option>
                                <option value="days" {{ old('edit_task_type_reminder_'.$client->id,$task->type_reminder)  == 'days'  ? 'selected' : '' }}>@lang('activity.day')</option>
        
                            </select>
                        </div>
                        <div class="" style="flex:2">
                            <input type="number" class="form-control" data-parsley-type="integer"
                             name="edit_task_type_reminder_number_{{ $client->id }}"
                              id="edit_task_type_reminder_number_{{ $client->id }}"
                               value="{{ old('task_type_reminder_number_'.$client->id,$task->type_reminder_number) }}">
                        </div>
                    </div>
                </div>
               
            
        
            </div>
    </div>






    

    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();toggle_task_edit({{ $client->id }},{{ $task->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit"  class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.modify')
        </button>
    </div>
</form>


@push('js')
<script>
         function hide_task_edit_custom(id,task){
                $('.custom-task-edit-staff_'+id+'_'+task).addClass('d-none');
        }

        function show_task_edit_custom(id,task){
            $('.custom-task-edit-staff_'+id+'_'+task).removeClass('d-none');
            
        }
</script>
@endpush