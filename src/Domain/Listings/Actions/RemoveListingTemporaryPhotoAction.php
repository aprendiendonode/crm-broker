<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\TemporaryListing;


class RemoveListingTemporaryPhotoAction
{

    public function __invoke($id)
    {
        $photo = TemporaryListing::findOrFail($id);
        deleteDirectory(public_path("temporary/listings/" . $photo->folder));
        $photo->delete();
    }
}