<?php

namespace Domain\Listings\Actions;

use Modules\Sales\Entities\Developer;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\TemporaryListing;
use Domain\Listings\DataTransferObjects\CreateDeveloperData;

class UpdateListingUploadCategoryAction
{

    public function __invoke($request)
    {
        if ($request->table == 'temp') {
            TemporaryListing::findOrFail($request->id)->update(['listing_category_id' => $request->category_id]);
        } else {
            ListingPhoto::findOrFail($request->id)->update(['listing_category_id' => $request->category_id]);
        }
    }
}