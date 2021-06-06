
                    
            <h5>@lang('sales.information')</h5>
                                    
        <div class="table-responsive">
        <table class="foo-assign table table-bordered toggle-circle mb-0">
                
           
        
                <thead class="thead-light">
                    <th>#</th>
                    <th>@lang('sales.lead_source')</th>
                    <th>@lang('sales.lead_type')</th>
                    <th>@lang('sales.lead_communications')</th>
               
                </thead>
                <tbody>
                    
                <tr>
                    <td>#</td>
                    <td>{{ $lead_sources->where('id',$opportunity->source_id)->first() ? $lead_sources->where('id',$opportunity->source_id)->first()->{'name_'.app()->getLocale()} : '' }}</td>
                    <td>{{ $lead_types->where('id',$opportunity->type_id)->first()? $lead_types->where('id',$opportunity->type_id)->first()->{'name_'.app()->getLocale()} : '' }}</td>
                    <td>{{ $lead_communications->where('id',$opportunity->communication_id)->first()?  $lead_communications->where('id',$opportunity->communication_id)->first()->{'name_'.app()->getLocale()} :'' }}</td>

                </tr>
            
           
                </tbody>
                </table>
    
        </div>

       