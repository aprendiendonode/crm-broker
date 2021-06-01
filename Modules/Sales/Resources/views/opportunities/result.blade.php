


<form  action="{{ url('sales/manage_opportunities/result/'.$opportunity->id) }}" data-parsley-validate="" method="POST" >



{{-- 
    <button onclick="event.preventDefault();show_report_form_div({{ $opportunity->id }});" class="btn mb-3  btn-primary waves-effect waves-light mr-2">
        <span class="btn-label"><i class="mdi mdi-plus"></i></span> @lang('sales.modify_final_result')
    </button> --}}




    {{-- <div class="row  report_form_{{ $opportunity->id }}" style="display: none;opacity:0;transition:0.7s"> --}}
    <div class="row  report_form_{{ $opportunity->id }}" >
  

        @csrf
        @method('PATCH')
        {{-- <div class="col-md-4"> --}}
             
    
            {{-- <div class="form-group ">
     
                <label class="text-muted font-weight-medium">@lang('sales.status')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>

                <select  class="form-control select2 " name="result_status_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.status')" required >
                            

                 <option   value="in_progress"> @lang('sales.in_progress') </option>
                 <option    value="meeting"> @lang('sales.meeting') </option>
                 <option    value="successful"> @lang('sales.successful') </option>
                 <option    value="unsuccessful"> @lang('sales.unsuccessful') </option>


                  
                </select>
    
               
            </div> --}}
        {{-- </div> --}}



    

        <div class="col-md-4">
            <div class="form-group ">
     
                <label class="text-muted font-weight-medium">@lang('sales.stage')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>

                <select  class="form-control select2 " name="result_stage_{{ $opportunity->id }}" data-toggle="select2" data-placeholder="@lang('sales.stage')" required >
                            

                 <option    value="pending"> @lang('sales.pending') </option>
                 <option   value="in_progress"> @lang('sales.in_progress') </option>

                 <option    value="lost"> @lang('sales.lost') </option>
                 <option    value="won"> @lang('sales.won') </option>


                  
                </select>
    
               
            </div>
        </div>

    

 
        <div class="col-md-8 mb-3">
            <label class="text-muted font-weight-medium">@lang('sales.note')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>


            <textarea required class="form-control" name="result_note_{{ $opportunity->id }}"  cols="15" rows="5">{{ old('result_note_'.$opportunity->id) }}</textarea>
        </div> 


        <div class="col-md-4 mt-3">
            <div class="d-flex justify-content-end">
    
           
                <button type="submit" class="btn  btn-success waves-effect waves-light mr-2">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.modify_result')
                </button>


                <button onclick="event.preventDefault();hide_result_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
                    @lang('sales.cancel')
                 </button>
            </div>

        </div>

        
    </div>
</form>

<div class=" card">


     
    <div class="card-box">
        <h4 class="header-title">@lang('sales.result_report')</h4>
   

      
        <div class="table-responsive">
      
            <table  class="table table-bordered toggle-circle mb-0" >


      <thead class="thead-light">
          <th>#</th>
          {{-- <th>@lang('sales.status')</th> --}}
          <th>@lang('sales.stage')</th>
          <th>@lang('sales.date')</th>
          <th>@lang('sales.made_by')</th>

          <th>@lang('sales.note')</th>
      </thead>
      <tbody>
          @if($opportunity->results)
          @forelse($opportunity->results->sortByDesc('id') as $result)
          <tr  >
          <td>{{ ($loop->index + 1) }}  </td>

          {{-- <td>{{ str_replace(['_','-'],' ',$result->status)  }}</td> --}}
          <td>{{ $result->stage  }}</td>
          <td>{{ $result->created_at->toFormattedDateString() }}</td>



          <td>{{ $result->addedBy ? $result->addedBy->{'name_'.app()->getLocale()} : '' }}</td>

          <td>
 

                      <i

                      onclick="event.preventDefault();show_result_report_div({{ $result->id }},{{ $opportunity->id }})"
                      data-plugin="tippy" 
                      data-tippy-placement="top-start" 
                      title="@lang('sales.view_note')"

                      class="fe-eye cursor-pointer feather-16 px-1 text-success">
                      </i>
                 

 
       

          </td>
          </tr>
         
              <tr  class="result_report_{{ $result->id }}_{{ $opportunity->id }} d-none"    >
                  <td colspan="6">
                      <div class="form-group">
                          <label class="text-muted font-weight-medium" for="">@lang('sales.note')</label> : {{ $result->note }}
                      </div>
             
                  </td>
              </tr>

        



          @empty
          <tr>
           <td colspan="6" class="text-center">@lang('sales.no_records')</td>
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

</div>



@push('js')

<script>

    
  
function  show_report_form_div(id){

var  div = document.querySelector('.report_form_'+id);
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
  
function  show_question_div(id){
// hide_edit_div(id)
// hide_result_div(id)
// hide_task_div(id)
var  div = document.querySelector('.question_'+id);
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
  
function  show_result_question_answer_div(question,id){
// hide_edit_div(id)
// hide_result_div(id)
// hide_task_div(id)
var  div = document.querySelector('.result_question_answer_'+question +'_'+id);
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
function  show_result_question_staff_answer_div(question,id){
// hide_edit_div(id)
// hide_result_div(id)
// hide_task_div(id)
var  div = document.querySelector('.result_question_staff_answer_'+question +'_'+id);
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





  
function  show_result_report_div(result,id){

       if($('.result_report_'+result+'_'+id).hasClass('d-none')){
            $('.result_report_'+result+'_'+id).removeClass('d-none');
        }else{
            $('.result_report_'+result+'_'+id).addClass('d-none');
    
        }

}
</script>
    
@endpush