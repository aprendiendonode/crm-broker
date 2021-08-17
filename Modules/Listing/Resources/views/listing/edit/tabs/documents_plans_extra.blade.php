<div class="card-box">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#documents-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link active">
                @lang('listing.document')
            </a>
        </li>
        <li class="nav-item">
            <a href="#floor-plans-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.floor_plans')
            </a>
        </li>

        <li class="nav-item">
            <a href="#extra-info-{{ $listing->id }}" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.extra_info')
            </a>
        </li>

       
    </ul>


    <div class="tab-content">
        <div class="tab-pane active" id="documents-{{ $listing->id }}">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#documents-modal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
           
                @if($listing->documents)
                    @foreach($listing->documents as $document)
                    <div>@lang('listing.title'): {{ $document->title }}</div>
             
                    @endforeach
                @endif

                @if($listing->documents->count() == 0)
             
                <div>@lang('listing.no_documents')</div>
        
             @endif 
            </div>
        
        </div>

        <div class="tab-pane " id="floor-plans-{{ $listing->id }}">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#floorPlans-modal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
                @if($listing->plans)
                    @foreach($listing->plans as $plan)
                    <div>@lang('listing.added_at'): {{ $listing->created_at->toFormattedDateString() }}</div>
                    @endforeach
                @endif    

                @if($listing->plans->count() == 0)
             
                    <div>@lang('listing.no_floor_plans')</div>
            
                 @endif 
            </div>
        
        </div>
        <div class="tab-pane " id="extra-info-{{ $listing->id }}">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#extraInfo-modal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
                <table class="table table-striped table-info-summary">
                                
                    <tbody>
                        <tr>
                            <td width="200">
                                @lang('listing.key_location')
                            </td>
                            <td class="listing-extra-info-key-location-{{ $listing->id }}">
                                {{ $listing->key_location }}
                            </td>
                        </tr>
                        <tr>
                            <td width="200">
                                @lang('listing.govfield1')
                            </td>
                            <td class="listing-extra-info-govfield1-{{ $listing->id }}">
                                {{ $listing->govfield1 }}
                            </td>
                        </tr>
                        <tr>
                            <td width="200">
                                @lang('listing.govfield2')
                            </td>
                            <td class="listing-extra-info-govfield2-{{ $listing->id }}">
                                {{ $listing->govfield2 }}
                            </td>
                        </tr>
                        <tr>
                            <td width="200">
                                @lang('listing.yearly_service_charges')
                            </td>
                            <td class="listing-extra-info-yearly-service-charges-{{ $listing->id }}">
                                {{ $listing->yearly_service_charges }}
                            </td>
                        </tr>
                        <tr>
                            <td width="200">
                                @lang('listing.monthly_cooling_charges')
                            </td>
                            <td class="listing-extra-info-monthly-cooling-charges-{{ $listing->id }}">
                                {{ $listing->monthly_cooling_charges }}
                            </td>
                        </tr>
                        <tr>
                            <td width="200">
                                @lang('listing.monthly_cooling_provider')
                            </td>
                            <td class="listing-extra-info-monthly-cooling-provider-{{ $listing->id }}">
                                {{ $listing->monthly_cooling_provider }}
                            </td>
                        </tr>

                    </tbody>
                </table>        
     
             

             
            </div>
        
        </div>




    
    </div>


</div> 