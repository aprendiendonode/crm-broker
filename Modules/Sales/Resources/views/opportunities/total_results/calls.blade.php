    
    <div class="card-box">
        <h4 class="header-title">@lang('sales.call_result')</h4>

        <div class="mt-3">

            <h4 class="header-title">@lang('sales.total_call') : {{ $opportunity->calls ? $opportunity->calls->count() : '' }}  <i class="fa fa-eye cursor-pointer" onclick="show_total_call_div({{ $opportunity->id }})"></i></h4>
        </div>
   

      
        <div class="table-responsive d-none total_calls_{{ $opportunity->id }}">
      
                <table class="foo-call table table-bordered toggle-circle mb-0">


                    <thead class="thead-light">
                        <th>#</th>
                        <th>@lang('sales.call_status')</th>
                        <th>@lang('sales.contact_date')</th>
                        <th data-hide="phone">@lang('sales.next_action_date')</th>
                        <th data-hide="phone">@lang('sales.made_by')</th>
                        <th data-hide="phone">@lang('sales.call_breif')</th>
                    </thead>
                    <tbody>
                        @if($opportunity->calls)
             

                        @forelse($opportunity->calls as $call)
                   
                        <tr>
                        <td>{{ ($loop->index + 1) }}  </td>
                        <td>
                            
                         @php
                            $call_status =  $call_status->where('id',$call->status_id)->first();                   
                         @endphp
                         
                         {{ $call_status ? str_replace("_"," ",$call_status->{'name_'.app()->getLocale()} ):'' }}
             
                          </td>
                        <td>{{ $call->contact_date .' '. $call->contact_time }}</td>
            
            
                        <td>{{ $call->next_action_date .' '. $call->next_action_time }}</td>
            
            
            
                        <td>{{ $call->madeBy ? $call->madeBy->{'name_'.app()->getLocale()} : '' }}</td>
            
                        <td>
                 
            
                               
                            <i
            
                            onclick="event.preventDefault();show_call_breif_div({{ $call->id }},{{ $opportunity->id }})"
                            data-plugin="tippy" 
                            data-tippy-placement="top-start" 
                            title="@lang('sales.call_breif')"
            
                            class="fe-eye cursor-pointer feather-16 px-1">
                            </i>
            
                        </td>
           
                        </tr>
            
                        <tr  class="call_breif_{{ $call->id }}_{{ $opportunity->id }} d-none"    >
                            <td colspan="7">
                              <label class="text-muted font-weight-medium" for="">@lang('sales.call_breif')</label> : {{ $call->note }}
                            </td>
                        </tr>
            
            
                           @empty 
                           @lang('sales.no_records')

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
        
 function  show_total_call_div(id){

    $('.total_calls_'+id).toggleClass('d-none');

    }
</script>
@endpush