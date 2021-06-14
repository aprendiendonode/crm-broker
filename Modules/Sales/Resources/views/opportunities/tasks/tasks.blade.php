
<div class="row">
<div class="col-md-4">
    <h4>@lang('sales.add_task')</h4>

<form  action="{{ url('sales/manage_opportunities/assign_task/'.$opportunity->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="task_agency_id_{{ $opportunity->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="task_business_id_{{ $opportunity->id }}" value="{{ $business }}">
            @endif


            <input type="hidden" value="{{ $opportunity->id }}" name="task_opportunity_id">

    
  
        <div class="col-md-12">
    
       
            <div class="form-group">
                <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.task_type')</label>
                <select class="form-control mb-0 show-tick"  data-toggle="select2" name="task_type_{{ $opportunity->id }}" id="task_type_{{ $opportunity->id }}" data-style="btn-outline-secondary" onchange="show_reference_div()"  required>

                    <option value="" > @lang('global.pleaseSelect')</option>
                   

                        @if($task_types)
                            @foreach($task_types as $type)
                               <option value="{{$type->id }}" {{ old('task_type_'.$opportunity->id) == $type->id ? 'selected' : '' }}>{{$type->{'type_'.app()->getLocale()} }}</option>
                           @endforeach
                        @endif


                </select>

            </div>



            <div class="form-group">
                <label class="font-weight-medium text-muted" for="  ">@lang('activity.tasks.status')</label>
                <select class="form-control mb-0 show-tick"  data-toggle="select2" name="task_status_{{ $opportunity->id }}" data-style="btn-outline-secondary" required>

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
                                      
                                        <option value="{{$status->id }}"  {{ old('task_status_'.$opportunity->id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach          
                                </optgroup>  
                                
                                <optgroup label="@lang('sales.archive')">
                                    @foreach($task_status->where('type_complete','on') as $status)
                                      
                                        <option value="{{$status->id }}"  {{ old('task_status_'.$opportunity->id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach     
                                </optgroup> 
                      
                        @endif


                    </select>



            </div>
    
   
             
        
        </div>
    
  
    
    <div class="col-md-12">


            <div class="form-group ">
          


                    <textarea class="form-control" name="task_note_en_{{ $opportunity->id }}" >{{old('task_note_en_'.$opportunity->id)}}</textarea>
             
     

            </div>

        </div>


   
            
        <div class="col-md-12">



            {{-- <div class="radio radio-single">
                <input type="radio" onchange="hide_task_custom({{ $opportunity->id }})" id="task_radio_1_{{ $opportunity->id }}" value="all" name="task_assigned_{{ $opportunity->id }}" aria-label="Single radio One">
                <label clas="font-weight-medium text-muted" for="task_radio_1_{{ $opportunity->id }}">@lang('sales.everyone')</label>
            </div>
            <div class="radio radio-success radio-single mb-3 mt-2">
                <input type="radio" onchange="show_task_custom({{ $opportunity->id }})" id="task_radio_2_{{ $opportunity->id }}" value="custom" name="task_assigned_{{ $opportunity->id }}" checked aria-label="Single radio Two">
                <label class="font-weight-medium text-muted" for="task_radio_2_{{ $opportunity->id }}">@lang('sales.custom')</label>
            </div> --}}

    
            {{-- <div class="form-group custom-task-staff_{{ $opportunity->id }}">
                <h4 class="header-title">@lang('sales.select_staff')</h4>
                @forelse($staffs as $employee)
                    @if(unserialize($opportunity->current_assign->first()->assigned_to) && in_array($employee->id,unserialize($opportunity->current_assign->first()->assigned_to)))
                
                        <div class="checkbox checkbox-primary mb-2">
                            <input   id="task_{{ $opportunity->id}}_{{ $employee->id }}" value="{{ $employee->id }}" type="checkbox" name="task_staff_{{ $opportunity->id }}[]">
                            <label class="font-weight-medium text-muted" for="task_{{ $opportunity->id}}_{{ $employee->id }}">
                                {{ $employee->{'name_'.app()->getLocale()} }}
                            </label>
                        </div>
                    @endif
          
                @empty

                @endforelse
            
             
            </div> --}}

                <div class="form-check">
                    <input type="checkbox" onclick="checkAllHandler()" class="form-check-input" id="checkAll">
                    <label class="form-check-label" for="checkAll">@lang('sales.all_staff')</label>
                </div>
            <select onclick="bulk_select()" multiple class="form-control  select_all select2 " name="task_staff_{{ $opportunity->id }}[]"
                data-toggle="select2" required>

                @forelse($staffs as $employee)
                    @if(unserialize($opportunity->current_assign->first()->assigned_to) && in_array($employee->id,unserialize($opportunity->current_assign->first()->assigned_to)))
                        <option @if(old('task_staff_'.$opportunity->id) && in_array($employee->id,old('task_staff_'.$opportunity->id)) ) selected @endif value="{{ $employee->id }}">
                            {{ $employee->{'name_'.app()->getLocale()} }}
                        </option>


                    @endif
    
                @empty

                @endforelse

        </select>
       
         

         
             
        
        </div>
    
        <div class="col-md-12">
            <div class="form-group mb-1">
                <label class="font-weight-medium text-muted">@lang('activity.tasks.deadline')</label>
                <input type="text" name="task_deadline_{{ $opportunity->id }}" id="task_deadline_{{ $opportunity->id }}" value="{{ old('task_deadline_'.$opportunity->id,date('Y-m-d')) }}"  class="form-control basic-datepicker" placeholder="@lang('activity.tasks.deadline')" required>
            </div>
    
        
        </div>
        <div class="col-md-12 mb-1">
            <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.time')</label>
            {{-- <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true"> --}}
                <input type="text" class="form-control clockpicker" name="task_time_{{ $opportunity->id }}" id="task_time_{{ $opportunity->id }}" data-autoclose="true" value="{{ old('task_time_'.$opportunity->id,date('h:i')) }}" required>
        
            {{-- </div> --}}
        </div>
        
        
            <div class="col-md-12">
        
                
                <div class="custom-control custom-checkbox mb-3">
                    <input type="hidden"  name="task_custom_reminder_{{ $opportunity->id }}" value="off" >
                    <input type="checkbox" @if(old('task_custom_reminder_'.$opportunity->id) == 'on') checked  @endif class="custom-control-input" value="on" name="task_custom_reminder_{{ $opportunity->id }}" id="task_custom_reminder_{{ $opportunity->id }}" onchange="show_custom_reminder({{ $opportunity->id }})">
                    <label class="custom-control-label" for="task_custom_reminder_{{ $opportunity->id }}">@lang('activity.tasks.custom_reminder')</label>
                </div>
        
                <div class="form-group mt-2" id="div_custom_reminder_{{ $opportunity->id }}" style="display: none">
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.custom_reminder')</label>
                    <div class="d-flex">
                        <div class="" style="flex:2">
                            <select class="form-control mb-0 show-tick" data-style="btn-outline-secondary"  name="task_period_reminder_{{ $opportunity->id }}" id="task_period_reminder_{{ $opportunity->id }}">
        
                                    <option value="after" {{ old('task_period_reminder_'.$opportunity->id) == 'after' ? 'selected' : '' }}>@lang('activity.after')</option>
                                    <option value="before" {{ old('task_period_reminder_'.$opportunity->id) == 'before' ? 'selected' : '' }}>@lang('activity.before')</option>
        
                            </select>
                        </div>
                        <div class="px-2" style="flex:2">
                            <select class="form-control mb-0 show-tick"  data-style="btn-outline-secondary" name="task_type_reminder_{{ $opportunity->id }}" id="task_type_reminder_{{ $opportunity->id }}">
        
                                <option value="hours" {{ old('task_type_reminder_'.$opportunity->id) == 'hours' ? 'selected' : '' }}>@lang('activity.hour')</option>
                                <option value="days" {{ old('task_type_reminder_'.$opportunity->id)  == 'days'  ? 'selected' : '' }}>@lang('activity.day')</option>
        
                            </select>
                        </div>
                        <div class="" style="flex:2">
                            <input type="number" class="form-control" data-parsley-type="integer" name="task_type_reminder_number_{{ $opportunity->id }}" id="task_type_reminder_number_{{ $opportunity->id }}" value="{{ old('task_type_reminder_number_'.$opportunity->id,1) }}">
                        </div>
                    </div>
                </div>
               
            
        
            </div>
    </div>






    

    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_task_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit"  class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.start_task')
        </button>
    </div>
</form>
</div>
<div class="col-md-8 card">
@include('sales::opportunities.tasks.table')

</div>
</div>




</div>


@push('js')




  

<script>

    $(document).ready(function () {
       var reminder = @json(old('task_custom_reminder_'.$opportunity->id));
       var task_opportunity_id  = @json($opportunity->id);
        if(reminder == 'on'){

            show_custom_reminder(task_opportunity_id)
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

   function show_custom_edit_reminder(id,task)
    {
        
        var  custom_reminder        = document.getElementById('task_custom_edit_reminder_'+id+'_'+task);
        var  div_custom_reminder    = document.getElementById('div_custom_edit_reminder_'+id+'_'+task);

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


 



 
      
    function  show_task_row(opportunity,task){
        $('.task_row_'+task+'_'+opportunity).toggleClass('d-none');

    }

    function  hide_task_row(opportunity,task){
        $('.task_row_'+task+'_'+opportunity).addClass('d-none');



    }
    function  toggle_task_edit(opportunity,task){
        $('.task_edit_'+task+'_'+opportunity).toggleClass('d-none');

    }
var counter = 1;
function bulk_select(){
 
    var selected = $('.select_all').val();
  
    var selected_array = selected.includes('all');

    if(selected_array ){
       
        $('.select_all option').find('option').prop('selected',false).trigger('change');
        
    }
    

}

function checkAllHandler() {

    if($("#checkAll").is(':checked') ){ //select all
    console.log('select')
    $('.select_all').find('option').prop('selected',true).trigger('change');
    
} else { //deselect all
    console.log('deselect')
        $('.select_all').find('option').prop('selected',false).trigger('change');

      }
}
function checkAllEditHandler(id) {

    if($("#checkAllEdit_"+id).is(':checked') ){ //select all
    $('.select_all_edit_'+id).find('option').prop('selected',true).trigger('change');
    
} else { //deselect all
        $('.select_all_edit_'+id).find('option').prop('selected',false).trigger('change');

      }
}


</script>
@endpush