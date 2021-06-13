
<div class="row">
<div class="col-md-4">
    <h4>@lang('sales.make_call')</h4>

<form  action="{{ url('sales/manage_leads/assign_call/'.$lead->id) }}" data-parsley-validate="" method="POST" enctype="multipart/form-data">
    <div class="row">
            @csrf
            @method('PATCH')
    
            @if($agency)
            <input type="hidden" name="call_agency_id_{{ $lead->id }}" value="{{ $agency }}">
            @endif
            @if($business)
            <input type="hidden" name="call_business_id_{{ $lead->id }}" value="{{ $business }}">
            @endif

    
  
        <div class="col-md-12">




            


            <div class="form-group ">


                <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.lead_qualifications')</lable>

               <div class="d-flex justify-content-between">

                   
                   <div style="flex:4">
               
                       <select  class="form-control select2 select_qualification_id" name="call_qualification_id_{{ $lead->id }}" data-toggle="select2" data-placeholder="@lang('sales.lead_qualifications')" required >
                   
                           <option value=""></option>
                           @forelse($lead_qualifications as $ql)
                           <option @if(old("call_qualification_id_{$lead->id}",$lead->qualification_id) == $ql->id) selected @endif  value="{{ $ql->id}}">{{ $ql->{'name_'.app()->getLocale()} }}</option>
                           @empty

                           @endforelse
                   
                   </select>
                   </div>
                       @can('manage_opportunity_setting')
                       <a style="margin-top:4px;"
                       data-plugin="tippy" title="@lang('sales.new_lead_qualification')"
                       data-tippy-placement="top-start" 

                       data-toggle="modal"
                       data-target="#add_qualification" 
                       ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

                       @endcan 
               
                   </div>     
           </div>



           
           <div class="form-group ">


               <lable class="text-muted pr-2 font-weight-medium mt-1" style="flex:2">@lang('sales.call_status')</lable>

              <div class="d-flex justify-content-between">

                  
                  <div style="flex:4">
              
                   
                           <select  class="form-control select2 select_callstatus_id" name="call_status_id_{{ $lead->id }}" data-toggle="select2" data-placeholder="@lang('sales.call_status')" required >
                       
                               <option value=""></option>
                               @forelse($call_status as $status)
                               <option @if(old("call_status_id_{$lead->id}") == $status->id) selected @endif  value="{{ $status->id}}">{{ $status->{'name_'.app()->getLocale()} }}</option>
                               @empty

                               @endforelse
                       
                       </select>
                  </div>
                      @can('manage_lead_setting')
                      <a style="margin-top:4px;"
                      data-plugin="tippy" title="@lang('sales.new_call_status')"
                      data-tippy-placement="top-start" 

                      data-toggle="modal"
                      data-target="#add_callstatus" 
                      ><i style="padding:9px !important; margin-top:-2px !important;margin-right: 1px !important;" class=" btn btn-secondary fa fa-plus"></i></a>

                      @endcan 
              
                  </div>     
          </div>
   
    
    
       
         
            <div class="form-group mb-3  ">
                <label class="text-muted font-weight-medium">@lang('sales.contact_date')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>
                <div class="input-group">
                <input type="text" name="call_contact_date_{{ $lead->id }}"  class="form-control basic-datepicker" value="{{ old('call_contact_date_'.$lead->id,  date('Y-m-d')) }}" placeholder="@lang('sales.contact_date')" required>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                </div>
            </div>                
            </div>
          
    
            <div class="form-group mb-3">
                <label class="text-muted font-weight-medium">@lang('sales.contact_time')</label>
                <div class="input-group  clockpicker"  data-placement="top" data-align="top" data-autoclose="true">
                    <input type="text" name="call_contact_time_{{ $lead->id }}" class="form-control" value="{{ old('call_contact_date_{$lead->id}',date('h:i') ) }}" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                    </div>
                </div>
            </div>
         
             
        
        </div>
    
  
    
    <div class="col-md-12">
        <div class="form-group mb-3  ">
            <label class="text-muted font-weight-medium">@lang('sales.next_action_date')</label>
            <div class="input-group">
            <input type="text" name="call_next_action_date_{{ $lead->id }}"  class="form-control basic-datepicker" value="{{ old('call_next_action_date_'.$lead->id) }}" placeholder="@lang('sales.next_action_date')">
            <div class="input-group-append">
                <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
            </div>
        </div>                
        </div>
      

   
        <div class="form-group mb-3">
            <label class="text-muted font-weight-medium">@lang('sales.next_action_time')</label>
            <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                <input type="text" name="call_next_action_time_{{ $lead->id }}"  class="form-control" placeholder="@lang('sales.next_action_time')">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                </div>
            </div>
        </div>
    
    </div>






    <div class="col-md-12">

        
       
    
        <div class="form form-group">
                
    
    
            <label class="text-muted font-weight-medium">@lang('sales.call_breif')<i class="text-danger" style="font-size:15px;font-weight:bold">*</i></label>

                <textarea required class="form-control" name="call_note_{{ $lead->id }}" placeholder="@lang('sales.note')">{{old("call_note_{$lead->id}")}}</textarea>
              


        </div>

    </div>

    <div class="d-flex justify-content-end">
    
        <button onclick="event.preventDefault();table_row_hide('lead_call_{{ $lead->id }}')" type="button" class="btn  btn-outline-success waves-effect waves-light">
           @lang('sales.cancel')
        </button>
        <button type="submit" class="btn  btn-success waves-effect waves-light ml-2">
            <span class="btn-label"><i class="mdi mdi-check-all"></i></span>@lang('sales.make_call')
        </button>
    </div>

</div>

  
    
  
    
    </form>
</div>
<div class="col-md-8 card">



    <div class="card-box">
        <h4 class="header-title">@lang('sales.call_history')</h4>
   

      
        <div class="table-responsive">
      
                <table class="table table-bordered toggle-circle mb-0">


      
                    <thead class="thead-light">
                        <th>#</th>
                        <th>@lang('sales.call_status')</th>
            
                        <th>@lang('sales.contact_date')</th>
                        <th>@lang('sales.next_action_date')</th>
                        <th>@lang('sales.made_by')</th>
                        <th>@lang('sales.call_breif')</th>
            
                        <th>@lang('sales.controlls')</th>
                    </thead>
                    <tbody>
                        @if($lead->calls)
                        @forelse($lead->calls as $call)
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
            
                            onclick="event.preventDefault();show_call_breif_div({{ $call->id }},{{ $lead->id }})"
                            data-plugin="tippy" 
                            data-tippy-placement="top-start" 
                            title="@lang('sales.call_breif')"
            
                            class="fe-eye cursor-pointer feather-16 px-1">
                            </i>
                        </td>
                        <td>
                            @can('delete_call')
                            <i 
                                 data-plugin="tippy" 
                                 data-tippy-placement="top-start" 
                                 title="@lang('sales.delete_call')"
                                 data-toggle="modal" data-target="#delete-call-alert-modal_{{ $call->id }}"
                             
                                 class="fe-trash cursor-pointer feather-16">
                             </i> 
                      
                         @endcan
            
                        </td>
            
            
                        </tr>
            
            
                        <tr  class="call_breif_{{ $call->id }}_{{ $lead->id }}"    style="display: none;opacity:0;transition:0.7s" >
                            <td colspan="5">
                              <label class="text-muted font-weight-medium" for="">@lang('sales.call_breif')</label> : {{ $call->note }}
                            </td>
                        </tr>
            
            
            
            
            
            
                        <div id="delete-call-alert-modal_{{ $call->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body p-4">
                                        <div class="text-center">
                                            <i class="dripicons-information h1 text-danger"></i>
                                            <h4 class="mt-2">@lang('agency.head_up')</h4>
                                            <p class="mt-3">@lang('sales.call_warning') </p>
                                            <form action="{{ url('sales/delete-calls') }}" method="post">
                                                @csrf
                                                <input  type="hidden" name="call_id" value="{{ $call->id }}">
                                                <input type="hidden" name="call_lead_id" value="{{ $lead->id }}">
            
                                                <button type="submit" formaction="{{ url('sales/delete-calls')}}"class="btn btn-danger my-2">@lang('agency.confirm_delete')</button>
                                                <button type="button" class="btn btn-success my-2" data-dismiss="modal">@lang('agency.cancel')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
            
            
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



</div>
</div>


