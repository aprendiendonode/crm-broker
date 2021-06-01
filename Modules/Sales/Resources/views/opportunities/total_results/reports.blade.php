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
          @php
          $result =   $opportunity->results->last();
         @endphp
        
          <tr>
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

              <tr  class="d-none result_report_{{ $result->id }}_{{ $opportunity->id }}"  >
                  <td colspan="6">
                      <div class="form-group">
                          <label class="text-muted font-weight-medium" for="">@lang('sales.note')</label> : {{ $result->note }}
                      </div>
             
                  </td>
              </tr>

          @else   

          @lang('sales.no_records')

          @endif
      </tbody>
    </table>
</div>
</div>
</div>

@push('js')
    
<script>
 
    function  show_result_report_div(result,id){

    $('.result_report_'+result+'_'+id).toggleClass('d-none');

    }

</script>
    
@endpush