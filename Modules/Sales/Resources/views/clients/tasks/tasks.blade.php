
<div class="row">
<div class="col-md-4">
    <h4>@lang('sales.add_task')</h4>

<form  action="{{ url('sales/manage_clients/assign_task/'.$client->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="task_agency_id_{{ $client->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="task_business_id_{{ $client->id }}" value="{{ $business }}">
            @endif


            <input type="hidden" value="{{ $client->id }}" name="task_client_id">

    
  
        <div class="col-md-12">
    
       
            <div class="form-group">
                <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.task_type')</label>
                <select class="form-control mb-0 show-tick"  data-toggle="select2" name="task_type_{{ $client->id }}" id="task_type_{{ $client->id }}" data-style="btn-outline-secondary" onchange="show_reference_div()"  required>

                    <option value="" > @lang('global.pleaseSelect')</option>
                   

                        @if($task_types)
                            @foreach($task_types as $type)
                               <option value="{{$type->id }}" {{ old('task_type_'.$client->id) == $type->id ? 'selected' : '' }}>{{$type->{'type_'.app()->getLocale()} }}</option>
                           @endforeach
                        @endif


                </select>

            </div>



            <div class="form-group">
                <label class="font-weight-medium text-muted" for="  ">@lang('activity.tasks.status')</label>
                <select class="form-control mb-0 show-tick"  data-toggle="select2" name="task_status_{{ $client->id }}" data-style="btn-outline-secondary" required>

                    <option value=""  > @lang('global.pleaseSelect')</option>
        
                        @if($task_status)
                        
                                <optgroup label="@lang('sales.open')">
                                   @foreach($task_status->where('type_complete','off') as $status)
                                      
                                        <option value="{{$status->id }}"  {{ old('task_status_'.$client->id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach          
                                </optgroup>  
                                
                                <optgroup label="@lang('sales.archive')">
                                    @foreach($task_status->where('type_complete','on') as $status)
                                      
                                        <option value="{{$status->id }}"  {{ old('task_status_'.$client->id) == $status->id ? 'selected' : '' }}>{{$status->{'status_'.app()->getLocale()} }}</option>
                                      
                                    @endforeach     
                                </optgroup> 
                      
                        @endif


                    </select>



            </div>
    
   
             
        
        </div>
    
  
    
    <div class="col-md-12">


            <div class="form-group ">
          


                    <textarea class="form-control" name="task_note_en_{{ $client->id }}" >{{old('task_note_en_'.$client->id)}}</textarea>
             
     

            </div>

        </div>


   
            
        <div class="col-md-12">

                <div class="form-check">
                    <input type="checkbox" onclick="checkAllHandler()" class="form-check-input" id="checkAll">
                    <label class="form-check-label" for="checkAll">@lang('sales.all_staff')</label>
                </div>
            <select onclick="bulk_select()" multiple class="form-control  select_all select2 " name="task_staff_{{ $client->id }}[]"
                data-toggle="select2" required>

                @forelse($staffs as $employee)
                        <option @if(old('task_staff_'.$client->id) &&
                         in_array($employee->id,old('task_staff_'.$client->id)) )
                          selected @endif value="{{ $employee->id }}">
                            {{ $employee->{'name_'.app()->getLocale()} }}
                        </option>

                @empty

                @endforelse

        </select>
       
         

         
             
        
        </div>
    
        <div class="col-md-12">
            <div class="form-group mb-1">
                <label class="font-weight-medium text-muted">@lang('activity.tasks.deadline')</label>
                <input type="text" name="task_deadline_{{ $client->id }}" id="task_deadline_{{ $client->id }}" value="{{ old('task_deadline_'.$client->id,date('Y-m-d')) }}"  class="form-control basic-datepicker" placeholder="@lang('activity.tasks.deadline')" required>
            </div>
    
        
        </div>
        <div class="col-md-12 mb-1">
            <label class="font-weight-medium text-muted" for="">@lang('activity.tasks.time')</label>
            {{-- <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true"> --}}
                <input type="text" class="form-control clockpicker" name="task_time_{{ $client->id }}" id="task_time_{{ $client->id }}" data-autoclose="true" value="{{ old('task_time_'.$client->id,date('h:i')) }}" required>
        
            {{-- </div> --}}
        </div>
        
        
            <div class="col-md-12">
        
                
                <div class="custom-control custom-checkbox mb-3">
                    <input type="hidden"  name="task_custom_reminder_{{ $client->id }}" value="off" >
                    <input type="checkbox" @if(old('task_custom_reminder_'.$client->id) == 'on') checked  @endif class="custom-control-input" value="on" name="task_custom_reminder_{{ $client->id }}" id="task_custom_reminder_{{ $client->id }}" onchange="show_custom_reminder({{ $client->id }})">
                    <label class="custom-control-label" for="task_custom_reminder_{{ $client->id }}">@lang('activity.tasks.custom_reminder')</label>
                </div>
        
                <div class="form-group mt-2" id="div_custom_reminder_{{ $client->id }}" style="display: none">
                    <label class="mb-1 font-weight-medium text-muted">@lang('activity.tasks.custom_reminder')</label>
                    <div class="d-flex">
                        <div class="" style="flex:2">
                            <select class="form-control mb-0 show-tick" data-style="btn-outline-secondary"  name="task_period_reminder_{{ $client->id }}" id="task_period_reminder_{{ $client->id }}">
        
                                    <option value="after" {{ old('task_period_reminder_'.$client->id) == 'after' ? 'selected' : '' }}>@lang('activity.after')</option>
                                    <option value="before" {{ old('task_period_reminder_'.$client->id) == 'before' ? 'selected' : '' }}>@lang('activity.before')</option>
        
                            </select>
                        </div>
                        <div class="px-2" style="flex:2">
                            <select class="form-control mb-0 show-tick"  data-style="btn-outline-secondary" name="task_type_reminder_{{ $client->id }}" id="task_type_reminder_{{ $client->id }}">
        
                                <option value="hours" {{ old('task_type_reminder_'.$client->id) == 'hours' ? 'selected' : '' }}>@lang('activity.hour')</option>
                                <option value="days" {{ old('task_type_reminder_'.$client->id)  == 'days'  ? 'selected' : '' }}>@lang('activity.day')</option>
        
                            </select>
                        </div>
                        <div class="" style="flex:2">
                            <input type="number" class="form-control" data-parsley-type="integer" name="task_type_reminder_number_{{ $client->id }}" id="task_type_reminder_number_{{ $client->id }}" value="{{ old('task_type_reminder_number_'.$client->id,1) }}">
                        </div>
                    </div>
                </div>
               
            
        
            </div>
    </div>






    

    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_task_div({{ $client->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit"  class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.start_task')
        </button>
    </div>
</form>
</div>
<div class="col-md-8 card">
@include('sales::clients.tasks.table')

</div>
</div>




</div>


@push('js')




  

<script>

    $(document).ready(function () {
       var reminder = @json(old('task_custom_reminder_'.$client->id));
       var task_client_id  = @json($client->id);
        if(reminder == 'on'){

            show_custom_reminder(task_client_id)
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


 



 
      
    function  show_task_row(client,task){
        $('.task_row_'+task+'_'+client).toggleClass('d-none');

    }

    function  hide_task_row(client,task){
        $('.task_row_'+task+'_'+client).addClass('d-none');



    }
    function  toggle_task_edit(client,task){
        $('.task_edit_'+task+'_'+client).toggleClass('d-none');

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