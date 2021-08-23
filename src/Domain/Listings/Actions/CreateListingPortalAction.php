<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\Listing;
use Modules\Listing\Entities\PortalListing;
use Modules\Listing\Entities\ListingChequeCalculator;

class CreateListingPortalAction
{



    public function __invoke(Listing $listing, array $portals)
    {
        foreach ($portals as $portal) {
            PortalListing::create([
                'listing_id' => $listing->id,
                'portal_id' => $portal
            ]);
        }
    }
}