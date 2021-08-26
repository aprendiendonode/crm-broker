<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\ListingDocument;



class RemoveListingDocumentAction
{

    public function __invoke($id)
    {
        $document = ListingDocument::findOrFail($id);
        deleteDirectory(public_path('listings/documents/agency_' . $document->listing->agency_id . '/listing_' . $document->listing->id . '/document_' . $document->id));
        $document->delete();
    }
}