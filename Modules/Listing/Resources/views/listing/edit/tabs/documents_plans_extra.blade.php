<div class="card-box">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#documents" data-toggle="tab" aria-expanded="false" class="nav-link active">
                @lang('listing.document')
            </a>
        </li>
        <li class="nav-item">
            <a href="#floor-plans" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.floor_plans')
            </a>
        </li>

        <li class="nav-item">
            <a href="#extra-info" data-toggle="tab" aria-expanded="false" class="nav-link ">
                @lang('listing.extra_info')
            </a>
        </li>

       
    </ul>


    <div class="tab-content">
        <div class="tab-pane active" id="documents">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#documents-modal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
           
                @if($listing->documents)
                    @foreach($listing->documents as $document)
                    <div>@lang('listing.title'): {{ $listing->title }}</div>
             
                    @endforeach
                @endif

                @if($listing->documents->count() == 0)
             
                <div>@lang('listing.no_documents')</div>
        
             @endif 
            </div>
        
        </div>

        <div class="tab-pane " id="floor-plans">
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
        <div class="tab-pane " id="extra-info">
            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#extraInfo-modal_{{ $listing->id }}">@lang('listing.edit')</button>

            <div class=" mb-4">
              
                   
                    <div>@lang('listing.key_location'): {{ $listing->key_location }}</div>
                    <div>@lang('listing.govfield1'): {{ $listing->govfield1 }}</div>
                    <div>@lang('listing.govfield2'): {{ $listing->govfield2 }}</div>
                    <div>@lang('listing.yearly_service_charges'): {{ $listing->yearly_service_charges }}</div>
                    <div>@lang('listing.monthly_cooling_charges'): {{ $listing->monthly_cooling_charges }}</div>
                    <div>@lang('listing.monthly_cooling_provider'): {{ $listing->monthly_cooling_provider }}</div>
             

             
            </div>
        
        </div>




    
    </div>


</div> 