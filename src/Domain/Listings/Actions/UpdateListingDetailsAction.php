<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Modules\SuperAdmin\Entities\City;
use Illuminate\Support\Facades\Validator;
use Modules\SuperAdmin\Entities\Community;
use Modules\Listing\Entities\ListingCheque;
use Modules\SuperAdmin\Entities\SubCommunity;
use Domain\Listings\DataTransferObjects\ListingUpdateDetailsData;

class UpdateListingDetailsAction
{


    public function __invoke(ListingUpdateDetailsData $listingUpdateDetailsData): Listing
    {

        $listing   = Listing::where('business_id', $listingUpdateDetailsData->business)->where('id', $listingUpdateDetailsData->listing)->firstOrFail();
        $listing->update([
            "purpose"                                  => $listingUpdateDetailsData->purpose,
            "status"                                   => $listingUpdateDetailsData->status,
            "title"                                    => $listingUpdateDetailsData->title,
            "type_id"                                  => $listingUpdateDetailsData->type,
            "never_lived_in"                           => $listingUpdateDetailsData->never_lived_in,
            "featured_on_company_website"              => $listingUpdateDetailsData->featured_on_company_website,
            "exclusive_rights"                         => $listingUpdateDetailsData->exclusive_rights,
            "beds"                                     => $listingUpdateDetailsData->beds,
            "baths"                                    => $listingUpdateDetailsData->baths,
            "parkings"                                 => $listingUpdateDetailsData->parkings,
            "year_built"                               => $listingUpdateDetailsData->year_built,
            "developer_id"                             => $listingUpdateDetailsData->developer,
            "plot_area"                                => $listingUpdateDetailsData->plot_area,
            "area"                                     => $listingUpdateDetailsData->area,
            "lsm"                                      => $listingUpdateDetailsData->lsm,
            "landlord_id"                              => $listingUpdateDetailsData->landlord,
            "rented"                                   => $listingUpdateDetailsData->rented,
            "tenancy_contract_start_date"              => $listingUpdateDetailsData->tenant_start_date,
            "tenancy_contract_end_date"                => $listingUpdateDetailsData->tenant_end_date,
            "tenant_id"                                => $listingUpdateDetailsData->tenant,
            "source_id"                                => $listingUpdateDetailsData->source,
            'view_ids'                                 => $listingUpdateDetailsData->views
        ]);


        return $listing;
    }
}