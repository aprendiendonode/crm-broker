@if($client->contracts)

<div class=" card">

        <div class="card-box">
            <h4 class="header-title">@lang('sales.contracts')</h4>
       

          
            <div class="table-responsive">
          
                <table class=" table table-bordered toggle-circle mb-0"  >


                    <thead class="thead-light">
                       
                        <th data-sort-ignore="true">@lang('sales.landlord')</th>
                        <th data-sort-ignore="true">@lang('sales.customer')</th>
                        <th data-sort-ignore="true">@lang('sales.by')</th>
                        <th data-hide="phone, tablet">@lang('sales.date')</th>         
                        <th data-hide="phone, tablet">@lang('sales.controlls')</th>         

                    </thead>
                    <tbody>
                      
                        @forelse($client->contracts as $contract)
                        <tr>
                       
            
                        <td>{{ $contract->landlord_name  }}</td>
                        <td>{{ $contract->customer_name  }}</td>
            
            
                        <td>{{ $contract->convertedBy ? $contract->convertedBy->{'name_'.app()->getLocale()} : '' }}</td>
                        <td>{{ $contract->created_at->toFormattedDateString() }}</td>
 
            
                        <td>
                          
                                <i
            
                                onclick="event.preventDefault();show_client_contract({{ $contract->id }},{{ $client->id }})"
                                data-plugin="tippy" 
                                data-tippy-placement="top-start" 
                                title="@lang('sales.view_answer')"
            
                                class="fe-eye cursor-pointer feather-16 px-1 text-success">
                                </i>
                      
                      
                     
            
                        </td>
                        </tr>
            
            
                            <tr  class="d-none result_contract_answer_{{ $contract->id }}_{{ $client->id }}"    >
                                <td colspan="5">
                                    

                                    <div class="row">


                        
                                        <div class="col-md-12">
                                        
                                    
                                                <label class="text-muted pr-2  h5 font-weight-medium" style="flex:2">@lang('sales.contract_type')</label>
                    
                                                <p class="h5">{{ ucfirst($contract->contract_type) }}</p>
                                            
                                    
                                        </div>
                    
                    
                                        <div class="col-md-6">
                    
                                            
                                      
                                            <div class="form-group">  
                                                
                                                <lable class="text-muted pr-2 h5 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord_national_id')</lable> 
                                                <p class="h5">{{ $contract->landlord_national_id}}</p>
                                                                    
                                            </div>
                                            <div class="form-group">   
                                                
                                                <lable class="text-muted pr-2 h5 font-weight-medium mt-1" style="flex:2"> @lang('sales.landlord_address')</lable> 
                                                <p class="h5">{{ ucfirst($contract->landlord_address)}}</p>
                                                    
                                            </div>
                                        </div>
                                
                    
                    
                                    <div class="col-md-6">
                    
                                       
                                            <div class="form-group"> 
                                                
                                                <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer_national_id')</lable> 
                                                <p class="h5">{{ $contract->customer_national_id}}</p>
                                                
                                            </div>
                    
                    
                                            <div class="form-group">  
                                                
                                                        
                                                <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.customer_address')</lable> 
                                                <p class="h5">{{ $contract->customer_address}}</p>
                                            
                                            </div>
                                        </div>
                    
                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.date')</lable> 
                                                <p class="h5">{{ $contract->start_date}}</p>
                                            
                                            
                                            </div>
                    
                                        </div>
                                        <div class="col-md-6">
                                        
                                            <div class="form-group end_date_{{ $client->id }} ">
                    
                                                <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.end_date')</lable> 
                                                <p class="h5">{{ $contract->end_date}}</p>
                                            
                                            </div>
                    
                                        </div>
                    
                                        <div class="col-md-6">
                                            <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.listing_address')</lable> 
                                            <p class="h5">{{ $contract->address}}</p>
                                        
                                        </div>
                    
                                        <div class="col-md-6">
                                            @if($contract->notes != null)
                                            <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.note')</lable> 
                                            <p class="h5">{{ $contract->notes}}</p>
                                            
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                        
                                            <div class="form-group">
                    
                    
                    
                                                <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.contract_amount')</lable> 
                                                <p class="h5">{{ $contract->amount}}</p>
                                
                                            </div>
                    
                                        </div>
                    
                      
                    
                             </div>
                    
                    <div class="row">
                                         
                            <div class="col-md-12">
                    
                                
                            
                    
                            @if($contract->has_recurring == 'yes')
                                                        
                                <div class="card-box">
                                    <h4 class="header-title">@lang('sales.recurrings')</h4>
                            
                    
                                
                                    <div class="table-responsive">
                                
                                            <table class="table table-bordered toggle-circle mb-0">
                    
                    
                                                <thead class="thead-light">
                                                    <th>#</th>
                                                    <th>@lang('sales.amount')</th>
                                                    <th>@lang('sales.date')</th>
                                        
                                                </thead>
                                                <tbody>
                    
                    
                                                            
                                                    @if($contract->recurrings)
                    
                    
                                                    @foreach($contract->recurrings as $recurring)
                    
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $recurring->amount }}</td>
                                                            <td>{{ $recurring->date }}</td>
                                                    
                    
                                                            {{-- <img src="{{ asset('upload/contracts/'.$client->id.'/'.$document->document) }}" alt="{{ $document->name }}">   --}}
                    
                                                        </tr>
                                                        
                                    
                                                    @endforeach           
                                                        
                    
                                        
                                                    @else   
                                        
                                                    @lang('sales.no_records')
                                        
                                                    @endif
                                                </tbody>
                                            </table>
                    
                    
                    
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                    
                                @else
                                <lable class="text-muted h5 pr-2 font-weight-medium mt-1" style="flex:2"> @lang('sales.recurrings')</lable> 
                                <p class="h5 mb-3">@lang('sales.contract_has_no_recurrings')</p>
                    
                                @endif
                    
                                
                         </div>
                    
                         
                        
                           <div class="col-md-8 ">
                        
                    
                    
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-right">
                                     
                                
                                    </div> <!-- end dropdown-->
                    
                                    <h5 class="card-title font-16 mb-3">@lang('sales.attachments')</h5>
                    
                                    <!-- file preview template -->
                                    <div class="d-none" id="uploadPreviewTemplate">
                                        <div class="card mt-1 mb-0 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                    </div>
                                                    <div class="col pl-0">
                                                        <a href="javascript:void(0);" class="text-muted font-weight-medium" data-dz-name></a>
                                                        <p class="mb-0" data-dz-size></p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- Button -->
                                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                            <i class="dripicons-cross"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end file preview template -->
                                        
                                    @if($contract->documents)
                        
                        
                                    @foreach($contract->documents as $document)
                    
                    
                    
                                    
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title badge-soft-primary text-primary rounded">
                                                            {{ ucfirst($document->extension) }} 
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);" class="text-muted font-weight-medium">{{ $document->name }}</a>
                                                    {{-- <p class="mb-0 font-12">2.3 MB</p> --}}
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                    
                    
                    
                    
                                                    <a target="_blank" href="{{ asset('upload/contracts/'.$client->id.'/'.$document->document) }}" class="btn btn-link font-16 text-muted">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                    
                                                    <a download href="{{ asset('upload/contracts/'.$client->id.'/'.$document->document) }}" class="btn btn-link font-16 text-muted">
                                                        <i class="dripicons-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                    
                                    @endforeach           
                                        
                    
                        
                                    @else   
                        
                                    @lang('sales.no_records')
                        
                                    @endif
                    
                    
                    
                    
                                </div>
                            </div>
                        
                                </div>
                        </div>
                        
                    
                    
                    













                                </td>
                            </tr>
            
  
                        @empty
                        <tr>
                         <td colspan="5" class="text-center">@lang('sales.no_records')</td>
                        </tr>
            
                        @endforelse
          
                    </tbody>
            
                  </table>
            </div> <!-- end .table-responsive-->
        </div> <!-- end card-box -->




     
</div>

  
    
@endif







@push('js')

<script>

    
 
function  show_contract_form(id){

$('.contract_form_'+id).toggleClass('d-none');

}
  
function  show_client_contract(contract,id){
$('.result_contract_answer_'+contract +'_'+id).toggleClass('d-none');

}
function  show_result_contract_staff_answer_div(contract,id){
    $('.result_contract_staff_answer_'+contract +'_'+id).toggleClass('d-none');

}

</script>
    
@endpush