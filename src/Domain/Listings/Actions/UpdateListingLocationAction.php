<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Modules\SuperAdmin\Entities\City;
use Illuminate\Support\Facades\Validator;
use Modules\SuperAdmin\Entities\Community;
use Modules\Listing\Entities\ListingCheque;
use Modules\SuperAdmin\Entities\SubCommunity;
use Domain\Listings\DataTransferObjects\ListingUpdateLocationData;

class UpdateListingLocationAction
{


    public function __invoke(ListingUpdateLocationData $listingUpdateLocationData)
    {

        $listing   = Listing::where('business_id', $listingUpdateLocationData->business)->where('id', $listingUpdateLocationData->listing)->firstOrFail();
        $city      =  City::findOrFail($listingUpdateLocationData->city);
        $community =  Community::findOrFail($listingUpdateLocationData->community);
        $sub_community = '';
        if ($listingUpdateLocationData->sub_community) {

            $sub_community       =  SubCommunity::findOrFail($listingUpdateLocationData->sub_community);
        }

        $validator = Validator::make($listingUpdateLocationData->all(), [
            "loc_lat"                                  => ['sometimes', 'nullable', 'string'],
            "loc_lng"                                  => ['sometimes', 'nullable', 'string'],
            "location"                                 => ['sometimes', 'nullable', 'string'],
            "sub_community"                            => ['sometimes', 'nullable', 'string', 'exists:sub_communities,id'],
            "unit"                                     => ['sometimes', 'nullable', 'string'],
            "plot"                                     => ['sometimes', 'nullable', 'string'],
            "street"                                   => ['sometimes', 'nullable', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->all()[0]], 400);
        }
        $listing->update([
            'loc_lat'                   => $listingUpdateLocationData->loc_lat,
            'loc_lng'                   => $listingUpdateLocationData->loc_lng,
            'location'                  => $listingUpdateLocationData->location,
            'sub_community_id'          => $listingUpdateLocationData->sub_community,
            'community_id'              => $listingUpdateLocationData->community,
            'city_id'                   => $listingUpdateLocationData->city,
            'unit_no'                   => $listingUpdateLocationData->unit,
            'plot_no'                   => $listingUpdateLocationData->plot,
            'street_no'                 => $listingUpdateLocationData->street,
        ]);

        return ['listing' => $listing, 'city' => $city, 'community' => $community, 'sub_community' => $sub_community];
    }
}