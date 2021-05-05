  
@can('add_question_on_client')    
      
    <button onclick="event.preventDefault();show_question_form({{ $client->id }});" class="btn mb-3  btn-primary waves-effect waves-light mr-2">
        <span class="btn-label"><i class="mdi mdi-plus"></i></span> @lang('sales.question')
    </button>


    <form action="{{ url('sales/manage_clients/question/'.$client->id) }}" data-parsley-validate="" method="POST">
        @csrf
        @method('PATCH')
        <div class="row d-none  question_form_{{ $client->id }}" >
                <div class="col-md-12 mb-2">

                        <textarea required class="form-control" name="question_body_{{ $client->id }}"  cols="30" rows="6">{{ old('question_body_'.$client->id) }}</textarea>

                </div>

                <div class="col-md-12">

                    <button type="submit" class="btn mb-3  btn-success waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="mdi mdi-plus"></i></span> @lang('sales.make_question')
                    </button>

                </div>
                
        </div>
    </form>

@endcan
<div class=" card">



     
        <div class="card-box">
            <h4 class="header-title">@lang('sales.questions')</h4>
       

          
            <div class="table-responsive">
          
                <table class=" table table-bordered toggle-circle mb-0"  >


                    <thead class="thead-light">
                       
                        <th data-sort-ignore="true">@lang('sales.question')</th>
                        <th data-hide="phone, tablet">@lang('sales.date')</th>
                        <th data-hide="phone, tablet">@lang('sales.made_by')</th>
            
                        <th data-hide="phone, tablet">@lang('sales.answer')</th>
                    </thead>
                    <tbody>
                        @if($client->questions)
                        @forelse($client->questions as $question)
                        <tr>
                       
            
                        <td>{{ $question->question  }}</td>
            
            
                        <td>{{ $question->created_at->toFormattedDateString() }}</td>
 
                        <td>{{ $question->addedBy ? $question->addedBy->{'name_'.app()->getLocale()} : '' }}</td>
            
                        <td>
                          @can('add_question_on_client')    
                            @if($question->answer != null && $question->answered == 'yes' )
                                <i
            
                                onclick="event.preventDefault();show_result_question_answer_div({{ $question->id }},{{ $client->id }})"
                                data-plugin="tippy" 
                                data-tippy-placement="top-start" 
                                title="@lang('sales.view_answer')"
            
                                class="fe-eye cursor-pointer feather-16 px-1 text-success">
                                </i>
                            @else
            
                             <span class="badge badge-danger badge-pill">@lang('sales.not_answered')</span>
                
            
                            @endif
                          @else
            
                                @if($question->answer != null && $question->answered == 'yes' )
                                    <i
            
                                    onclick="event.preventDefault();show_result_question_answer_div({{ $question->id }},{{ $client->id }})"
                                    data-plugin="tippy" 
                                    data-tippy-placement="top-start" 
                                    title="@lang('sales.view_answer')"
            
                                    class="fe-eye cursor-pointer feather-16 px-1 text-success">
                                    </i>
                                @else
            
                                <span onclick="event.preventDefault();show_result_question_staff_answer_div({{ $question->id }},{{ $client->id }})"
                                     class="badge badge-danger badge-pill cursor-pointer">@lang('sales.demands_respond') 
                                         <i
            
                                    
                                    data-plugin="tippy" 
                                    data-tippy-placement="top-start" 
                                    title="@lang('sales.demands_respond')"
                
                                    class="fe-eye cursor-pointer feather-16 px-1">
                                    </i>
                                </span>
            
            
                           
                                
                                @endif
            
                          @endcan
                     
            
                        </td>
                        </tr>
            
                   
                        @if($question->answer != null && $question->answered == 'yes' )
            
                            <tr  class="d-none result_question_answer_{{ $question->id }}_{{ $client->id }}"    >
                                <td colspan="5">
                                    <div class="form-group">
                                        <label class="text-muted font-weight-medium" for="">@lang('sales.answer')</label> : {{ $question->answer }}
                                    </div>
                                    <div class="form-group">
                                        <label class="text-muted font-weight-medium" for="">@lang('sales.by')</label> : {{ $question->answeredBy ? $question->answeredBy->{'name_'.app()->getLocale()} :''  }}
            
                                    </div>    
                                    <div class="form-group">
                                        <label class="text-muted font-weight-medium" for="">@lang('sales.at')</label> : {{ $question->updated_at->toFormattedDateString()   }}
            
                                    </div>    
                                </td>
                            </tr>
            
                        @endif
            
            
            
                        
                        <tr  class="d-none result_question_staff_answer_{{ $question->id }}_{{ $client->id }}"     >
                            <td colspan="5">
                            <form action="{{ url('sales/answer') }}" method="post">
                                @csrf
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <input type="hidden" name="question_id"    value="{{ $question->id }}"
                              <label class="text-muted font-weight-medium" for="">@lang('sales.answer')</label> 
                              <textarea class="form-control" name="result_question_answer_{{ $question->id }}_{{ $client->id }}"  cols="30" rows="5"></textarea>
            
            
                              <button type="submit" class="btn mb-3  btn-success waves-effect waves-light mr-2 mt-2">
                                <span class="btn-label"><i class="mdi mdi-plus"></i></span> @lang('sales.answer')
                            </button>
                            </form>
            
                            </td>
                        </tr>
            
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
            </div> <!-- end .table-responsive-->
        </div> <!-- end card-box -->




     
</div>

</div>

</div>



@push('js')

<script>

    
 
function  show_question_form(id){

$('.question_form_'+id).toggleClass('d-none');

}
  
function  show_result_question_answer_div(question,id){
$('.result_question_answer_'+question +'_'+id).toggleClass('d-none');

}
function  show_result_question_staff_answer_div(question,id){
    $('.result_question_staff_answer_'+question +'_'+id).toggleClass('d-none');

}

</script>
    
@endpush