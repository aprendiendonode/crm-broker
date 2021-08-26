<?php

namespace Domain\Listings\Actions;

use Modules\Listing\Entities\TemporaryListing;
use Modules\Listing\Entities\TemporaryDocument;


class RemoveListingTemporaryDocumentAction
{

    public function __invoke($id)
    {
        $document = TemporaryDocument::findOrFail($id);
        deleteDirectory(public_path("temporary/documents/" . $document->folder));
        $document->delete();
    }
}