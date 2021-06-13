<div class="table-responsive">
    <table  class="table table-bordered toggle-circle mb-0">
        <thead>
        <tr >
            <th>@lang('sales.name') </th>
            <th > @lang('sales.email') </th>
          
            <th > @lang('sales.phone') </th>
            <th > @lang('sales.lead_source') </th>
            <th > @lang('sales.lead_type') </th>
            <th > @lang('sales.lead_qualifications') </th>
            <th > @lang('sales.controlls') </th>
          
        </tr>
        </thead>
        <tbody>

                    @forelse($leads as $lead)

                    @php

                    $phone_number = '';
                    if($lead->phone1){
                        $phone_number = $lead->phone1_code .''.$lead->phone1;
                    } elseif($lead->phone2){
                        $phone_number = $lead->phone2_code .''.$lead->phone2;
                    } elseif($lead->phone3){
                        $phone_number =$lead->phone3_code .''. $lead->phone3;
                    }else{
                        $phone_number = $lead->phone4_code .''.$lead->phone4;
                    }


                    $email = '';
                    if($lead->email1){
                        $email = $lead->email1;
                    } elseif($lead->email2){
                        $email = $lead->email2;
                    }else{
                        $email = $lead->email3;
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
            <tr >
                <td>{{ ucfirst( $lead->full_name )}}</td>
                <td>{{ $email}}</td>


                <td> 
                    <div class="d-flex align-items-center">
                 
                        @if($flag)
                        <div style="width:30px" class="mr-1"><img class="w-100" src="{{ asset('images/flags/'.$flag) }}" alt=""></div>
                        @endif
                        <div>

                            @php

                       


                            @endphp
                            <div> {{ $phone_number }}</div>
                            <div>{{ $long_name }}</div>
                            @if($time)
                            <small>{{ $time }}</small>
                            @endif
                        </div>
                    </div>
                </td>
                <td>


                    @can('edit_lead')
                    <select onchange="show_source_modal({{ $lead->id }})" id="modify_lead_source_{{ $lead->id }}" class=" form-control mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                        @forelse($lead_sources as $source)
                        <option @if($lead->source_id == $source->id) selected @endif  value="{{ $source->id}}">{{ $source->{'name_'.app()->getLocale()} }}</option>
                        @empty
    
                        @endforelse
                    </select>


                    @else


                      {{ $lead->source ? $lead->source->{'name_'.app()->getLocale()} : '' }}


                    @endcan
                
                
                </td>
                <td>
                    
                    @can('edit_lead')
                    
                    <select onchange="show_type_modal({{ $lead->id }})" id="modify_lead_type_{{ $lead->id }}" class=" form-control mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                        @forelse($lead_types as $type)
                         <option @if($lead->type_id == $type->id) selected @endif  value="{{ $type->id}}">{{ $type->{'name_'.app()->getLocale()} }}</option>
                        @empty
    
                        @endforelse
                    </select>

                    @else

                    {{ $lead->type ? $lead->type->{'name_'.app()->getLocale()} : '' }}

                    @endcan
                                                    
                    </td>
                <td>

                    @can('edit_lead')

                        
                                                  
                    <select onchange="show_qualification_modal({{ $lead->id }})" id="modify_lead_qualification_{{ $lead->id }}" class=" form-control mb-0 show-tick" name="lsm_listings_per_page"  data-style="btn-outline-secondary">
                        @forelse($lead_qualifications as $qualification)
                         <option @if($lead->qualification_id == $qualification->id) selected @endif  value="{{ $qualification->id}}">{{ $qualification->{'name_'.app()->getLocale()} }}</option>
                        @empty
    
                        @endforelse
                    </select>


                        
                    @else
                     {{ $lead->qualification ? $lead->qualification->{'name_'.app()->getLocale()} : '' }}
                    @endcan
                </td>

             
                <td>
                    @include('sales::leads.controlls')
                   
                </td>

            
                @include('sales::leads.modals')

            </tr>
            @can('edit_lead')

                <tr  class="table-row_{{ $lead->id }} edit_lead_{{ $lead->id }} @if( (session()->has('open-edit-tab') && session('open-edit-tab') ==  $lead->id ))  @else d-none @endif"   >
                    <td colspan="8">

                        @include('sales::leads.edit',['edited_lead' => $lead])

                    </td>
                </tr>

            @endcan



            @can('edit_lead')

                <tr  class="table-row_{{ $lead->id }}  lead_call_{{ $lead->id }}  @if( (session()->has('open-call-tab') && session('open-call-tab') ==  $lead->id ))  @else d-none @endif"  >
                    <td colspan="8">

                        @include('sales::leads.calls')

                    </td>
                </tr>

             @endcan


      

              @can('assign_task_on_lead')

                    <tr  class="table-row_{{ $lead->id }}  lead_task_{{ $lead->id }}  @if( (session()->has('open-task-tab') && session('open-task-tab') ==  $lead->id ))  @else d-none @endif"   >
                        <td colspan="8">

                            @include('sales::leads.tasks')

                        </td>
                    </tr>

               @endcan


               @can('edit_lead')

               <tr  class="table-row_{{ $lead->id }}  lead_opportunity_{{ $lead->id }} @if( (session()->has('open-opportunity-tab') && session('open-opportunity-tab') ==  $lead->id ))  @else d-none @endif"   >
                   <td colspan="8">

                       @include('sales::leads.convert_to_opportunity')

                   </td>
               </tr>

              @endcan


            @empty
            <tr>
                <td colspan="8">
                    @lang('sales.no_result_for_leads')
                </td>
            </tr>
            @endforelse



        </tbody>
    </table>
  
   </div>

</div>