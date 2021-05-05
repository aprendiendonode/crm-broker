
<form  action="{{ url('sales/convert-to-opportunity') }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
    
            @if($agency)
            <input type="hidden" name="opportunity_agency_id_{{ $lead->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="opportunity_business_id_{{ $lead->id }}" value="{{ $business }}">
            @endif

            <input type="hidden" value="{{ $lead->id }}" name="lead_id">
    
    
        <div class="col-md-4">
    
                
     
{{--     
             
            <div class="form-group d-flex justify-content-between">
    
               
               
                    @can('manage_lead_setting')
                        <a 
                        style="margin-top:4px;"
                        data-plugin="tippy" title="@lang('sales.new_opportunity_stage')"
                            data-tippy-placement="top-start" 
        
                            data-toggle="modal"
                            data-target="#add_source" 
                    ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i>
                    </a>

                    @endcan   
                  <div style="flex:4">
                    
                        <select  style="" class="form-control select_stage_id select2" name="opportunity_stage_id_{{ $lead->id }}" data-toggle="select2" data-placeholder="@lang('sales.opportunity_stage')" required>
                            <option value="" class="font-weight-medium text-muted"></option>
                        @forelse($opportunity_stages as $stage)
                            <option @if(old("opportunity_stage_id_".$lead->id) == $stage->id) selected @endif  value="{{ $stage->id}}">{{ $stage->{'name_'.app()->getLocale()} }}</option>
                        @empty
    
                        @endforelse
    
                        </select>
                  </div>
             
               
        
            </div> --}}


            <div class="form-group d-flex justify-content-between">
                @can('manage_lead_setting')
                <a style="margin-top:4px;"
                data-plugin="tippy" title="@lang('sales.new_lead_qualification')"
                data-tippy-placement="top-start" 
    
                data-toggle="modal"
                data-target="#add_qualification" 
                   ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>
    
                @endcan   
                <div style="flex:4">
    
                <select  class="form-control select2 select_qualification_id" name="opportunity_qualification_id_{{ $lead->id }}" data-toggle="select2" data-placeholder="@lang('sales.lead_qualifications')" required >
            
                        <option value=""></option>
                        @forelse($lead_qualifications as $ql)
                        <option @if(old("opportunity_qualification_id_{$lead->id}",$lead->qualification_id) == $ql->id) selected @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                        @empty
    
                        @endforelse
                  
                </select>
    
                </div>
            </div>


            <div class="form-group">
                <h4 class="header-title">@lang('sales.probability_of_winning')</h4>
    
                    <input type="text"  id="range_{{ $lead->id }}" class="range">
                    <input type="hidden" class="opportunity_probability_of_winning_{{ $lead->id }}" name="opportunity_probability_of_winning_{{ $lead->id }}">
              
             </div> <!-- end col -->
    
    
 
    
            <div class="form form-group">
                
    
    
                <div class="note">
    
                    <textarea required class="form-control" name="opportunity_note_{{ $lead->id }}" placeholder="@lang('sales.note')">{{old("opportunity_note_".$lead->id,$lead->note)}}</textarea>
                </div>    
    
    
            </div>
    
        
        </div>
    
    <div class="col-md-2"></div>
    
        
    
            
    
     
    
    {{-- <div class="col-md-4"> --}}
  

{{--         
        <div class="form-group">

    
            <input type="text" class="form-control"  name="opportunity_next_action_{{ $lead->id }}" required  value="{{ old('opportunity_next_action_'.$lead->id) }}" placeholder="@lang('sales.next_action')" >


         </div>
 --}}

         
         {{-- <div class="form-group ">
            <input type="text" name="opportunity_next_action_date_{{ $lead->id }}" value="{{ old("opportunity_next_action_date_{$lead->id}") }}"  required   class="form-control basic-datepicker" placeholder="@lang('sales.next_action_date')">
         </div> --}}
{{-- 
         <div class="form-group">

    
            <input type="text" data-parsley-type="integer" class="form-control"  name="opportunity_expected_revenue_{{ $lead->id }}" required  value="{{ old('opportunity_expected_revenue_'.$lead->id) }}" placeholder="@lang('sales.expected_revenue')" >


         </div>
 --}}

      
     


    
    {{-- </div> --}}
    
    <div class="col-md-6">
           
  
    
        <h4 class="header-title">@lang('sales.who_responsible')</h4>
            @forelse(staff($agency) as $employee)

            
                <div class="checkbox checkbox-primary mb-2">
                    <input   id="opportunity_checkbox_{{ $lead->id}}_{{ $employee->id }}" value="{{ $employee->id }}" type="checkbox" name="opportunity_assigned_staff_{{ $lead->id }}[]">
                    <label for="opportunity_checkbox_{{ $lead->id}}_{{ $employee->id }}">
                        {{ $employee->{'name_'.app()->getLocale()} }}
                    </label>
                </div>
    
            @empty

            @endforelse
    
      
    
    </div>
 



    
    </div>
    </div>
    
    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();hide_opportunity_div({{ $lead->id }})" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.convert')
        </button>
    </div>
    
    </form>
    
    @push('js')
    <script src="{{ asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <script>
       var lead_id = @json($lead->id);
   $("#range_"+lead_id).ionRangeSlider({
        skin: "round",
        min: 10,
        max: 100,
        from: 5,
        onStart: function (data) {
            // fired then range slider is ready
            $('.opportunity_probability_of_winning_'+lead_id).val(data.from)

        },
        onChange: function (data) {
            // fired on every range slider update
        },
        onFinish: function (data) {
            // console.log(data.from)

            $('.opportunity_probability_of_winning_'+lead_id).val(data.from)
        },
        onUpdate: function (data) {
            // fired on changing slider with Update method
        }
    });
    </script>

    @endpush