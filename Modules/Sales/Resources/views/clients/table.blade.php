<div class="table-responsive">
    <table  class=" table table-bordered toggle-circle mb-0 client-table">
        <thead>
            <tr>
                <th>@lang('sales.name') </th>
                <th > @lang('sales.email') </th>
                
                <th > @lang('sales.phone') </th>
                <th data-hide="phone , tablet"> @lang('sales.converted_by') </th>
                <th data-hide="phone, tablet"> @lang('sales.controlls') </th>
                
            </tr>
        </thead>
        <tbody>
            
            @forelse($clients as $client)
            
            
            @php
            $phone_number = '';
            if($client->phone1){
                $phone_number = $client->phone1;
            } else{
                $phone_number = $client->phone2;
            }
            
            
            $email = '';
            if($client->email1){
                $email = $client->email1;
            } else{
                $email = $client->email2;
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
                <td>
            {{$client->salutation .' : '. ucfirst( $client->name )}}

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
            {{ $client->convertedBy ? $client->convertedBy->{'name_'.app()->getLocale()} :'' }}
        </td>
        
        
        
        
        
        <td>
            @include('sales::clients.controlls')
            
        </td>
        
        
        
        
        
        @include('sales::clients.modals')
        
    </tr>
        @can('edit_client')
        
        <tr  class="table-row_{{ $client->id }} edit_client_{{ $client->id }}    
            @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $client->id ))
            @else d-none @endif
            "   >
            <td colspan="8">
                
                @include('sales::clients.edit',['edited_client' => $client])
                
            </td>
        </tr>
        
        @endcan
        
        
        
        @can('edit_client')
        
        <tr  class="table-row_{{ $client->id }} client_call_{{ $client->id }}
            @if( (session()->has('open-call-tab') && session('open-call-tab') ==  $client->id ))
            @else d-none @endif
            
            "   >
            <td colspan="8">
                
                @include('sales::clients.calls')
                
            </td>
        </tr>
        
        @endcan
    

        @can('edit_client')
        
        <tr  class="table-row_{{ $client->id }} client_question_{{ $client->id }}
            @if( (session()->has('open-question-tab') && session('open-question-tab') ==  $client->id ))
            @else d-none @endif
            
            "   >
            <td colspan="8">
                
                @include('sales::clients.question')
                
            </td>
        </tr>
        
        @endcan
        
    @can('assign_task_on_client')
    
    <tr  class="table-row_{{ $client->id }} client_task_{{ $client->id }}

        @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $client->id ))
          @else d-none @endif
        
        "  >
        <td colspan="8">
            
            @include('sales::clients.tasks.tasks')
            
        </td>
    </tr>
    
    @endcan
        @can('edit_client')
        
            <tr  class="table-row_{{ $client->id }} client_contract_{{ $client->id }}

                @if( (session()->has('open-contract-tab') && session('open-contract-tab') ==  $client->id ))
                @else d-none @endif
                
                "  >
                <td colspan="8">
                    
                    @include('sales::clients.contracts')
                    
                </td>
            </tr>
        
        @endcan
    @empty
    <tr>
        <td colspan="8">
            @lang('sales.no_result_for_clients')
        </td>
    </tr>
    @endforelse
    
    
    
    </tbody>
    </table>

</div>
