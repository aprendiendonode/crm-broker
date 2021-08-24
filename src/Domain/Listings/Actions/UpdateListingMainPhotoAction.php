<?php

namespace Domain\Listings\Actions;


use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\LeadType;
use Modules\Listing\Entities\Listing;
use Modules\Listing\Entities\ListingPhoto;
use Domain\Listings\DataTransferObjects\CreateTenantData;

class UpdateListingMainPhotoAction
{



    public function __invoke($updateListingMainPhotoData)
    {
        ListingPhoto::where('listing_id', $updateListingMainPhotoData->listing_id)->update(['photo_main' => 'no']);
        $photo =  ListingPhoto::findOrFail($updateListingMainPhotoData->id);
        $photo->update(['photo_main' => 'yes']);

        return $photo;
    }
}