
    <div class="card">
    
            
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
          
    </div>
       