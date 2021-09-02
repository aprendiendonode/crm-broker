<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\ListingPhoto;




class RemoveListingPhotoAction
{

    public function __invoke($id)
    {
        $photo = ListingPhoto::findOrFail($id);
        deleteDirectory(public_path('listings/photos/agency_' . $photo->listing->agency_id . '/listing_' . $photo->listing->id . '/photo_' . $photo->id));
        $photo->delete();
    }
}