<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingCheque;
use Domain\Listings\DataTransferObjects\ListingUpdatePricingData;

class UpdateListingPricingAction
{


    public function __invoke(ListingUpdatePricingData $listingUpdatePricingData)
    {
        $listing = Listing::where('business_id', $listingUpdatePricingData->business)->where('id', $listingUpdatePricingData->listing)->firstOrFail();

        $cheque =  ListingCheque::where('id', $listingUpdatePricingData->cheque)->where('business_id', $listingUpdatePricingData->business)
            ->where('agency_id', $listingUpdatePricingData->agency)->first();
        $listing->update([
            'price'                  => $listingUpdatePricingData->price,
            'rent_frequency'         => $listingUpdatePricingData->rent_frequency,
            'comission_percent'      => $listingUpdatePricingData->commission_percent,
            'comission_value'        => $listingUpdatePricingData->commission_value,
            'deposite_percent'       => $listingUpdatePricingData->deposite_percent,
            'deposite_value'         => $listingUpdatePricingData->deposite_value,
            'listing_rent_cheque_id' => $cheque->id ?? null,
        ]);
        return $cheque;
    }
}