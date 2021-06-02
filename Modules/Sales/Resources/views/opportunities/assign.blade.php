

    <h4>@lang('sales.assign_staff')</h4>
    
    <form  action="{{ url('sales/assign_opportunity_staff') }}" data-parsley-validate="" method="POST" >


      
        <div class="row">
                @csrf
       
                @if($agency)
                <input type="hidden" name="assign_agency_id" value="{{ $agency }}">
                @endif
                @if($business)
                <input type="hidden" name="assign_business_id" value="{{ $business }}">
                @endif

                <input type="hidden" name="assign_opportunity_id" value="{{ $opportunity->id }}">
          
            <div class="col-md-4">



                <div class="mb-3">
                        <textarea placeholder="@lang('sales.note')" class="form-control" name="assigned_note_{{ $opportunity->id }}"  cols="20" rows="4">{{ old('assigned_note_'.$opportunity->id ) }}</textarea>

                </div>



                <div class="radio radio-single">
                    <input type="radio" onchange="hide_custom({{ $opportunity->id }})" id="singleRadio1_{{ $opportunity->id }}" value="all" name="assigned" aria-label="Single radio One">
                    <label for="singleRadio1_{{ $opportunity->id }}">@lang('sales.everyone')</label>
                </div>
                <div class="radio radio-success radio-single mb-3 mt-3">
                    <input type="radio" onchange="show_custom({{ $opportunity->id }})" id="singleRadio2_{{ $opportunity->id }}" value="custom" name="assigned" checked aria-label="Single radio Two">
                    <label for="singleRadio2_{{ $opportunity->id }}">@lang('sales.custom')</label>
                </div>

        
                <div class="form-group custom-staff_{{ $opportunity->id }}">
                    <h4 class="header-title">@lang('sales.select_staff')</h4>
                    @forelse($staffs as $employee)

                    
                        <div class="checkbox checkbox-primary mb-2">
                            <input   id="checkbox_{{ $opportunity->id}}_{{ $employee->id }}" value="{{ $employee->id }}" type="checkbox" name="assigned_staff_{{ $opportunity->id }}[]">
                            <label for="checkbox_{{ $opportunity->id}}_{{ $employee->id }}">
                                {{ $employee->{'name_'.app()->getLocale()} }}
                            </label>
                        </div>
              
                    @empty

                    @endforelse
                
                 
                </div>
           
             
    
             
                 
            
            </div>
        
      
    <div class="col-md-8">


      

            
            <div class="card-box">
                
                <h5>@lang('sales.assigned_to_opportunity')</h5>
                                        
            <div class="table-responsive">
            <table class="foo-assign table table-bordered toggle-circle mb-0">
                    
               
            
                    <thead class="thead-light">
                        <th>#</th>
                        <th>@lang('sales.assigned_to')</th>
                        <th>@lang('sales.assigned_by')</th>
                        <th data-hide="phone">@lang('sales.start_date')</th>
                        <th data-hide="phone">@lang('sales.note')</th>
                    </thead>
                    <tbody>
                        
                        @if($opportunity->assigns)

                        @forelse($opportunity->current_assign->sortByDesc('id') as $current_assign)
                        <tr>
                        <td>{{ ($loop->index + 1) }}  </td>
                
                        <td>
                            @if(unserialize($current_assign->assigned_to) != null)
                                    @forelse(unserialize($current_assign->assigned_to) as $current_u)
                                    @php
                                    $current_users = $staffs->where('id', $current_u)->first();
                                    
                                    
                                    @endphp

                                      {{-- <p>{{ $current_users ? $current_users->{'name_'.app()->getLocale()} :'' }}</p> --}}
                                   <img
                                    class="avatar-sm rounded-circle"
                                    data-plugin="tippy" 
                                    data-tippy-placement="top-start" 
                                    title="{{ $current_users ? $current_users->{'name_'.app()->getLocale()} :'' }}"
                                
                                    src="{{  $current_users->image != null ? asset('profile_images/'.$current_users->image) :
                                    asset('images/user-placeholder.jpg')  }}"
                                    alt="{{  $current_users->{'name_'.app()->getLocale()}  }}" >
                
                                    @empty
                                    @endif
                            @endif
                            
                        
                        </td>
            
            
            
                        <td>{{ $current_assign->assignedBy ? $current_assign->assignedBy->{'name_'.app()->getLocale()} : '' }}</td>
                        <td>{{ $current_assign->start_assign }}</td>
                        <td>
                        
                        
                        <i
                            onclick="event.preventDefault();show_current_note_assign_div({{ $current_assign->id }} , {{ $opportunity->id }} )"
                            data-plugin="tippy" 
                            data-tippy-placement="top-start" 
                            title="@lang('sales.note')"

                            class="fe-eye cursor-pointer feather-16 px-1">
                            </i>
                        
                        
                        </td>
            
            
                        </tr>

                        <tr  class="d-none opportunity_current_assign_note_{{$current_assign->id}}_{{ $opportunity->id }}" >
                        <td colspan="5">

                            {{-- @include('sales::opportunities.assign',['edited_opportunity' => $opportunity]) --}}

                        <div class="form-group">
                            <label class="text-muted font-weight-medium" for=""> @lang('sales.note') : </label> 
                            {{ $current_assign->reason_change_assign}}
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
                
            


        <div >

                    <h5> 
                        @lang('sales.view_assign_history') 

                        <i
                        onclick="event.preventDefault();show_history_assign_div( {{ $opportunity->id }} )"
                        data-plugin="tippy" 
                        data-tippy-placement="top-start" 
                        title="@lang('sales.click_to_view')"

                        class="fe-eye cursor-pointer feather-16 px-1">
                        </i>
                    
                    </h5>


        <div class="opportunity_history_assign_{{ $opportunity->id }} d-none"  >
                   
        <div class="card-box">
       
                                        
                    <div class="table-responsive">
                    <table class="foo-assign-history table table-bordered toggle-circle mb-0">
                            
                            
                    <thead class="thead-light">
                        <th>#</th>
                        <th>@lang('sales.assigned_to')</th>
                        <th>@lang('sales.assigned_by')</th>
                        <th data-hide="phone">@lang('sales.start_date')</th>
                        <th data-hide="phone">@lang('sales.end_date')</th>
                        <th data-hide="phone">@lang('sales.note')</th>
                    </thead>
                    <tbody>
                        
                        @if($opportunity->assigns)

                        @forelse($opportunity->assigns->sortByDesc('id') as $assign)
                        <tr>
                        <td>{{ ($loop->index + 1) }}  </td>
                
                        <td>
                            @if(unserialize($assign->assigned_to) != null)
                                @forelse(unserialize($assign->assigned_to) as $u)
                                @php
                                $user = $staffs->where('id', $u)->first();
 
                                @endphp
                                    {{-- <p>{{ $user ? $user->{'name_'.app()->getLocale()} :''  }}</p> --}}

                                    <img
                                    class="avatar-sm rounded-circle"
                                    data-plugin="tippy" 
                                    data-tippy-placement="top-start" 
                                    title="{{ $user ? $user->{'name_'.app()->getLocale()} :'' }}"
                                
                                    src="{{  $user->image != null ? asset('profile_images/'.$user->image) :
                                    asset('images/user-placeholder.jpg')  }}"
                                    alt="{{  $user->{'name_'.app()->getLocale()}  }}" > 
          
                                    @empty
                                    @endif
                            @endif
                            
                        
                        </td>
            
            
            
                        <td>{{ $assign->assignedBy ? $assign->assignedBy->{'name_'.app()->getLocale()} : '' }}</td>
                        <td>{{ $assign->start_assign }}</td>
                        <td>{{ $assign->end_assign }}</td>
                        <td>
                        
                        
                           <i
                            onclick="event.preventDefault();show_note_assign_div({{ $assign->id }} , {{ $opportunity->id }} )"
                            data-plugin="tippy" 
                            data-tippy-placement="top-start" 
                            title="@lang('sales.note')"

                            class="fe-eye cursor-pointer feather-16 px-1">
                            </i>
                        
                        
                        </td>
            
            
                        </tr>

                        <tr  class="opportunity_assign_note_{{$assign->id}}_{{ $opportunity->id }} d-none" >
                        <td colspan="6">

                            {{-- @include('sales::opportunities.assign',['edited_opportunity' => $opportunity]) --}}

                        <div class="form-group">
                            <label class="text-muted font-weight-medium" for=""> @lang('sales.note') : </label> 
                            {{ $assign->reason_change_assign}}
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
    </div>


        <div class="d-flex justify-content-end">
        
            <button onclick="event.preventDefault();hide_assign_div({{ $opportunity->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
               @lang('sales.cancel')
            </button>
            <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
                <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.assign_staff')
            </button>
        </div>
    
      
        
      
        
        </form>


        @push('js')

        <script>

       

        </script>

        @endpush