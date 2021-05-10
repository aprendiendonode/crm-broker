

    <h4>@lang('sales.assign_staff')</h4>
    
    <form  action="{{ url('sales/assign_staff') }}" data-parsley-validate="" method="POST" >


        <div class="row">

        </div> <!-- end row-->
        <div class="row">
                @csrf
       
                @if($agency)
                <input type="hidden" name="assign_agency_id" value="{{ $agency }}">
                @endif
                @if($business)
                <input type="hidden" name="assign_business_id" value="{{ $business }}">
                @endif

                <input type="hidden" name="assign_lead_id" value="{{ $lead->id }}">
          
            <div class="col-md-12">



                <div class="radio radio-single">
                    <input type="radio" onchange="hide_custom({{ $lead->id }})" id="singleRadio1_{{ $lead->id }}" value="all" name="assigned" aria-label="Single radio One">
                    <label for="singleRadio1_{{ $lead->id }}">@lang('sales.everyone')</label>
                </div>
                <div class="radio radio-success radio-single mb-3 mt-3">
                    <input type="radio" onchange="show_custom({{ $lead->id }})" id="singleRadio2_{{ $lead->id }}" value="custom" name="assigned" checked aria-label="Single radio Two">
                    <label for="singleRadio2_{{ $lead->id }}">@lang('sales.custom')</label>
                </div>

        
                <div class="form-group custom-staff_{{ $lead->id }}">
                    <h4 class="header-title">@lang('sales.select_staff')</h4>
                    @forelse(staff($agency) as $employee)

                    
                        <div class="checkbox checkbox-primary mb-2">
                            <input @if(unserialize($lead->assigned_to) && in_array($employee->id,old('assigned_staff_'.$lead->id,unserialize($lead->assigned_to)))) checked @endif  id="checkbox_{{ $lead->id}}_{{ $employee->id }}" value="{{ $employee->id }}" type="checkbox" name="assigned_staff_{{ $lead->id }}[]">
                            <label for="checkbox_{{ $lead->id}}_{{ $employee->id }}">
                                {{ $employee->{'name_'.app()->getLocale()} }}
                            </label>
                        </div>
              
                    @empty

                    @endforelse
                
                 
                </div>
           
             
    
             
                 
            
            </div>
        
      
    
 
    
            
        </div>
        <div class="d-flex justify-content-end">
        
            <button onclick="event.preventDefault();table_row_hide('lead_assign_'{{ $lead->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
               @lang('sales.cancel')
            </button>
            <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
                <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.assign_staff')
            </button>
        </div>
    
      
        
      
        
        </form>


        @push('js')

        <script>

            function hide_custom(id){
                    $('.custom-staff_'+id).addClass('d-none');
            }

                function show_custom(id){
                    $('.custom-staff_'+id).removeClass('d-none');
                    
                }
        </script>

        @endpush