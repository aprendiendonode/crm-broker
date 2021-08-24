<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\ListingPlan;
use Modules\Listing\Entities\TemporaryPlan;
use Modules\Listing\Entities\ListingDocument;
use Modules\Listing\Entities\TemporaryDocument;
use Domain\Listings\DataTransferObjects\UpdateListingUploadsTitleData;

class UpdateListingUploadsTitleAction
{

    public function __invoke(UpdateListingUploadsTitleData $updateListingUploadsTitleAction)
    {

        $title = '';
        if ($updateListingUploadsTitleAction->type == 'document') {
            if ($updateListingUploadsTitleAction->table == 'temporary_documents') {
                $title = TemporaryDocument::findOrFail($updateListingUploadsTitleAction->id)->update([
                    'title' => $updateListingUploadsTitleAction->title,
                ]);
            }
            if ($updateListingUploadsTitleAction->table == 'listing_documents') {
                $title = ListingDocument::findOrFail($updateListingUploadsTitleAction->id)->update([
                    'title' => $updateListingUploadsTitleAction->title,
                ]);
            }
        }
        if ($updateListingUploadsTitleAction->type == 'plan') {
            if ($updateListingUploadsTitleAction->table == 'temporary_plans') {
                $title = TemporaryPlan::findOrFail($updateListingUploadsTitleAction->id)->update([
                    'title' => $updateListingUploadsTitleAction->title,
                ]);
            }
            if ($updateListingUploadsTitleAction->table == 'listing_plans') {
                $title = ListingPlan::findOrFail($updateListingUploadsTitleAction->id)->update([
                    'title' => $updateListingUploadsTitleAction->title,
                ]);
            }
        }


        return $title;
    }
}