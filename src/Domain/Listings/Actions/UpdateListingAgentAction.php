<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Domain\Listings\DataTransferObjects\ListingUpdateAgentData;

class UpdateListingAgentAction
{


    public function __invoke(ListingUpdateAgentData $listingUpdateAgentData)
    {

        $listing = Listing::where('business_id', $listingUpdateAgentData->business)->where('id', $listingUpdateAgentData->listing)->firstOrFail();
        $agent = User::where('id', $listingUpdateAgentData->agent)->where('business_id', $listingUpdateAgentData->business)->firstOrFail();
        $listing->update([
            'assigned_to'      => $listingUpdateAgentData->agent
        ]);

        return  $agent;
    }
}