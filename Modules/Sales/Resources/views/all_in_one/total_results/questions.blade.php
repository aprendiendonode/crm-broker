      
    <div class="card-box">
        <h4 class="header-title mb-2">@lang('sales.questions')</h4>
        
        <div>
            @if($opportunity->questions)
            <h4 class="header-title"> @lang('sales.total_questions')  : {{ $opportunity->questions->count() }} </h4>
            <h4 class="header-title">@lang('sales.answered') : {{ $opportunity->questions->where('answer', '!=', null)->count() }}  <i class="fa fa-eye cursor-pointer" onclick="show_question_answered_div({{ $opportunity->id }})"></i></h4>
            <h4 class="header-title">@lang('sales.require_answer') : {{ $opportunity->questions->where('answer', '==', null)->count() }} <i class="fa fa-eye cursor-pointer"  onclick="show_question_not_answered_div({{ $opportunity->id }})"></i></h4>
            @endif


        </div>
   

      
        <div class="table-responsive mt-2 d-none question_not_answered_div_{{ $opportunity->id }}">
      
            <table class=" table table-bordered toggle-circle mb-0"  >


                <thead class="thead-light">
                   
                    <th data-sort-ignore="true">@lang('sales.question')</th>
                    <th data-hide="phone, tablet">@lang('sales.date')</th>
                    <th data-hide="phone, tablet">@lang('sales.made_by')</th>
        
                    <th data-hide="phone, tablet">@lang('sales.answer')</th>
                </thead>
                <tbody>
                    @if($opportunity->questions)
                    @forelse($opportunity->questions->where('answer' ,'==',null) as $question)
                    <tr>
                   
        
                    <td>{{ $question->question  }}</td>
        
        
                    <td>{{ $question->created_at->toFormattedDateString() }}</td>
        
        
        
                    <td>{{ $question->addedBy ? $question->addedBy->{'name_'.app()->getLocale()} : '' }}</td>
        
                    <td>
                 
                         <span class="badge badge-danger badge-pill">@lang('sales.not_answered')</span>
            
        
                 
        
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
        <div class="mt-5 table-responsive d-none question_answered_div_{{ $opportunity->id }}">
      
            <table class=" table table-bordered toggle-circle mb-0"  >


                <thead class="thead-light">
                   
                    <th data-sort-ignore="true">@lang('sales.question')</th>
                    <th data-hide="phone, tablet">@lang('sales.date')</th>
                    <th data-hide="phone, tablet">@lang('sales.made_by')</th>
        
                    <th data-hide="phone, tablet">@lang('sales.answer')</th>
                </thead>
                <tbody>
                    @if($opportunity->questions)
                    @forelse($opportunity->questions->where('answer' ,'!=',null) as $question)
                    <tr>
                   
        
                    <td>{{ $question->question  }}</td>
        
        
                    <td>{{ $question->created_at->toFormattedDateString() }}</td>
        
        
        
                    <td>{{ $question->addedBy ? $question->addedBy->{'name_'.app()->getLocale()} : '' }}</td>
        
                    <td>
                      @can('add_question_on_opportunity')    
                        @if($question->answer != null && $question->answered == 'yes' )
                            <i
        
                            onclick="event.preventDefault();show_result_question_answer_div({{ $question->id }},{{ $opportunity->id }})"
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
        
                                onclick="event.preventDefault();show_result_question_answer_div({{ $question->id }},{{ $opportunity->id }})"
                                data-plugin="tippy" 
                                data-tippy-placement="top-start" 
                                title="@lang('sales.view_answer')"
        
                                class="fe-eye cursor-pointer feather-16 px-1 text-success">
                                </i>
                            @else
        
                            <span onclick="event.preventDefault();show_result_question_staff_answer_div({{ $question->id }},{{ $opportunity->id }})"
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
        
                        <tr  class="d-none result_question_answer_{{ $question->id }}_{{ $opportunity->id }}"    >
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
        
        
        
                    
                    <tr  class="d-none result_question_staff_answer_{{ $question->id }}_{{ $opportunity->id }}"     >
                        <td colspan="5">
                        <form action="{{ url('sales/answer') }}" method="post">
                            @csrf
                            <input type="hidden" name="opportunity_id" value="{{ $opportunity->id }}">
                            <input type="hidden" name="question_id"    value="{{ $question->id }}"
                          <label class="text-muted font-weight-medium" for="">@lang('sales.answer')</label> 
                          <textarea class="form-control" name="result_question_answer_{{ $question->id }}_{{ $opportunity->id }}"  cols="30" rows="5"></textarea>
        
        
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
@push('js')
<script>
    
    function  show_question_answered_div(id){

        $('.question_answered_div_'+id).toggleClass('d-none');

    }
    function  show_question_not_answered_div(id){

        $('.question_not_answered_div_'+id).toggleClass('d-none');

    }

</script>
@endpush