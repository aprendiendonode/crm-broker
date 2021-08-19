<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Modules\SuperAdmin\Entities\City;
use Illuminate\Support\Facades\Validator;
use Modules\SuperAdmin\Entities\Community;
use Modules\Listing\Entities\ListingCheque;
use Modules\SuperAdmin\Entities\SubCommunity;
use Domain\Listings\DataTransferObjects\ListingUpdateExtraInfoData;

class UpdateListingExtraInfoAction
{


    public function __invoke(ListingUpdateExtraInfoData $listingUpdateExtraInfoData)
    {
        $listing   = Listing::where('business_id', $listingUpdateExtraInfoData->business)->where('id', $listingUpdateExtraInfoData->listing)->firstOrFail();
        $listing->update([
            'key_location'               => $listingUpdateExtraInfoData->key_location,
            'govfield1'                  => $listingUpdateExtraInfoData->govfield1,
            'govfield2'                  => $listingUpdateExtraInfoData->govfield2,
            'yearly_service_charges'     => $listingUpdateExtraInfoData->yearly_service_charges,
            'monthly_cooling_charges'    => $listingUpdateExtraInfoData->monthly_cooling_charges,
            'monthly_cooling_provider'   => $listingUpdateExtraInfoData->monthly_cooling_provider,
        ]);

        return $listing;
    }
}