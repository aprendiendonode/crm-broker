<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\Listing;
use Domain\Listings\DataTransferObjects\ListingUpdateDescriptionData;

class UpdateListingDescriptionAction
{


    public function __invoke(ListingUpdateDescriptionData $listingUpdateDescriptionData)
    {
        $listing   = Listing::where('business_id', auth()->user()->business_id)
            ->where('id', $listingUpdateDescriptionData->listing)->firstOrFail();
        $listing->update([
            'description_en' => $listingUpdateDescriptionData->description_en,
            'description_ar' => $listingUpdateDescriptionData->description_ar,
        ]);

        return $listing;
    }
}