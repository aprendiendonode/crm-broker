<div class="table-responsive">
    <table  class=" table table-bordered toggle-circle mb-0 opportunity-table">
        <thead>
            <tr>
                <th>@lang('sales.name') </th>
                <th > @lang('sales.email') </th>
                
                <th > @lang('sales.phone') </th>
                <th data-hide="phone"> @lang('sales.lead_qualifications') </th>
                <th data-hide="phone , tablet"> @lang('sales.converted_by') </th>
                <th data-hide="phone, tablet"> @lang('sales.controlls') </th>
                
            </tr>
        </thead>
        <tbody>
            
            @forelse($opportunities as $opportunity)

                @php
                        $phone_number = '';
                        if($opportunity->phone1){
                            $phone_number = $opportunity->phone1;
                        } elseif($opportunity->phone2){
                            $phone_number = $opportunity->phone2;
                        } elseif($opportunity->phone3){
                            $phone_number = $opportunity->phone3;
                        }else{
                            $phone_number = $opportunity->phone4;
                        }
                        
                        
                        $email = '';
                        if($opportunity->email1){
                            $email = $opportunity->email1;
                        } elseif($opportunity->email2){
                            $email = $opportunity->email2;
                        }else{
                            $email = $opportunity->email3;
                        }
                        
                        $phone_number = ltrim($phone_number, '0');
                        
                        $phone_information = $countries;
                        $flag = '';
                        $long_name = '';
                        $time = '';
                        foreach ($phone_information as $single_phone) {
                            if ((strlen($single_phone->calling_code) + 1) == strlen($single_phone->phone_code)) {
                                if (substr($phone_number, 0, strlen($single_phone->calling_code)) === $single_phone->calling_code || substr($phone_number, 0, strlen($single_phone->phone_code)) === $single_phone->phone_code) {
                                    $d = new DateTime("now", new DateTimeZone($single_phone->time_zone));
                                    $flag =  $single_phone->flag ;
                                    $long_name =  $single_phone->value ;
                                    $time =  $d->format("h:i A");
                                    break;
                                }
                            }
                        }
                        
                        
                @endphp
            <tr>
                <td class=" ribbon-box">
                    
                    
                    <div class="ribbon
                    
                    @if($opportunity->converting_approval == 'hold')
                    ribbon-warning
                    @elseif($opportunity->converting_approval == 'rejected')
                    ribbon-danger
                    @elseif($opportunity->converting_approval == 'waiting_for_approve')
                    ribbon-success
                    @else
                    ribbon-primary
                    
                    @endif 
                    float-left">
                    <i class="ml-1
                    
                    @if($opportunity->converting_approval == 'hold')
                    mdi mdi-car-brake-hold
                    @elseif($opportunity->converting_approval == 'rejected')
                    mdi mdi-close-thick
                    @elseif($opportunity->converting_approval == 'waiting_for_approve')
                    fa fa-check
                    @else
                    mdi mdi-access-point
                    
                    @endif 
                    
                    
                    mr-1"></i> {{ $opportunity->converting_approval == null ? trans('sales.no_action') : ucfirst(str_replace('_',' ',$opportunity->converting_approval)) }}
                </div>
                <div class="ribbon-content">
                    <p class="mb-0">{{$opportunity->salutation .' : '. ucfirst( $opportunity->full_name )}}</p>
                </div>
                
                
                
           
            
            
            <div class="progress mb-0">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $opportunity->probability_of_winning }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $opportunity->probability_of_winning }}%">{{ $opportunity->probability_of_winning }}</div>
            </div>
            
            
        </td>
        <td>{{ $email}}</td>
        
        
        <td> 
            <div class="d-flex align-items-center">
                
                @if($flag)
                <div style="width:30px" class="mr-1"><img class="w-100" src="{{ asset('images/flags/'.$flag) }}" alt=""></div>
                @endif
                <div>
                    
         
                        <div> {{ $phone_number }}</div>
                        <div>{{ $long_name }}</div>
                        @if($time)
                        <small>{{ $time }}</small>
                    @endif
                </div>
            </div>
        </td>
        <td>
            @can('edit_opportunity')
            
            
            <select onchange="show_qualification_modal({{ $opportunity->id }})" id="modify_opportunity_qualification_{{ $opportunity->id }}" class=" selectpicker mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                @forelse($lead_qualifications as $qualification)
                <option @if($opportunity->qualification_id == $qualification->id) selected @endif  value="{{ $qualification->id}}">{{ $qualification->{'name_'.app()->getLocale()} }}</option>
                @empty
                
                @endforelse
            </select>
            
            
            
            
            @else
            
            {{ $opportunity->qualification->{'name_'.app()->getLocale()} }} 
            @endcan
            
            
        </td>
        <td>
            {{ $opportunity->convertedBy ? $opportunity->convertedBy->{'name_'.app()->getLocale()} :'' }}
        </td>
        
        
        
        
        
        <td>
            @include('sales::opportunities.controlls')
            
        </td>
        
        
        
        
        
        @include('sales::opportunities.modals')
        
    </tr>
    @can('edit_opportunity')
    
    <tr  class="table-row_{{ $opportunity->id }} edit_opportunity_{{ $opportunity->id }}    
        @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $opportunity->id ))
          @else d-none @endif
        "   >
        <td colspan="8">
            
            @include('sales::opportunities.edit',['edited_opportunity' => $opportunity])
            
        </td>
    </tr>
    
    @endcan
    
    
    
    @can('edit_opportunity')
    
    <tr  class="table-row_{{ $opportunity->id }} call_{{ $opportunity->id }}
        @if( (session()->has('open-call-tab') && session('open-call-tab') ==  $opportunity->id ))
          @else d-none @endif
        
        "   >
        <td colspan="8">
            
            @include('sales::opportunities.calls')
            
        </td>
    </tr>
    
    @endcan
    @can('edit_opportunity')
    
    <tr  class="table-row_{{ $opportunity->id }} result_{{ $opportunity->id }}
        @if( (session()->has('open-result-tab') && session('open-result-tab') ==  $opportunity->id ))
          @else d-none @endif
        
        "
           >
        <td colspan="8">
            
            @include('sales::opportunities.result')
            
        </td>
    </tr>
    
    @endcan
    @can('edit_opportunity')
    
    <tr  class="table-row_{{ $opportunity->id }} total_result_{{ $opportunity->id }}
        @if( (session()->has('open-total_result-tab') && session('open-total_result-tab') ==  $opportunity->id ))
          @else d-none @endif
        
        "
           >
        <td colspan="8">
            
            @include('sales::opportunities.total_results.total_results')
            
        </td>
    </tr>
    
    @endcan
    @can('edit_opportunity')
    
    <tr  class="table-row_{{ $opportunity->id }} question_{{ $opportunity->id }}
        @if( (session()->has('open-question-tab') && session('open-question-tab') ==  $opportunity->id ))
          @else d-none @endif
        
        "   >
        <td colspan="8">
            
            @include('sales::opportunities.question')
            
        </td>
    </tr>
    
    @endcan
    
    
    @can('assign_opportunity_to_staff')
    
    <tr  class="table-row_{{ $opportunity->id }} assign_{{ $opportunity->id }}
        @if( (session()->has('open-assign-tab') && session('open-assign-tab') ==  $opportunity->id ))
          @else d-none @endif
        "  >
        <td colspan="8">
            
            @include('sales::opportunities.assign')
            
        </td>
    </tr>
    
    @endcan
    
    
    
    @can('assign_task_on_opportunity')
    
        <tr  class="table-row_{{ $opportunity->id }} task_{{ $opportunity->id }}

            @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $opportunity->id ))
            @else d-none @endif
            
            "  >
            <td colspan="8">
                
                @include('sales::opportunities.tasks.tasks')
                
            </td>
        </tr>
        
    @endcan
    
    
    
    @can('convert_opportunity_to_client')
    
    <tr  class="table-row_{{ $opportunity->id }} client_{{ $opportunity->id }}
        @if( (session()->has('open-client-tab') && session('open-client-tab') ==  $opportunity->id )) 
         @else d-none @endif
        "  >
        <td colspan="8">
            
            @include('sales::opportunities.convert_to_client')
            
        </td>
    </tr>
    
    @endcan
    
    @if($opportunity->client)
    @can('convert_opportunity_to_client')
    @if($opportunity->converting_approval == 'waiting_for_approve')
    <tr  class="table-row_{{ $opportunity->id }} approve_{{ $opportunity->id }}
        @if( (session()->has('open-approve-tab') && session('open-approve-tab') ==  $opportunity->id ))
          @else d-none @endif
        "   >
        <td colspan="8">
            
            @include('sales::opportunities.approve')
            
        </td>
    </tr>
    @endif
    
    @if($opportunity->converting_approval == 'hold' )
    
    <tr  class="table-row_{{ $opportunity->id }} hold_{{ $opportunity->id }}
        @if( (session()->has('open-hold-tab')  ==  $opportunity->id )) 
         @else d-none @endif
        "   >
        <td colspan="8">
            
            @include('sales::opportunities.hold')
            
        </td>
    </tr>
    @endif
    
    @endcan
    
    
    @endif
    
    
    @empty
    <tr>
        <td colspan="8">
            @lang('sales.no_result_for_opportunities')
        </td>
    </tr>
    @endforelse
    
    
    
  </tbody>
</table>
</div>