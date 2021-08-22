<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Modules\Listing\Entities\Listing;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingCheque;
use Modules\Listing\Entities\ListingDocument;
use Modules\Listing\Entities\TemporaryDocument;
use Domain\Listings\DataTransferObjects\ListingUpdatePricingData;

class UploadListingDocumentAction
{



    public function __invoke(Listing $listing, array $documents)
    {


        if (!file_exists(public_path("listings"))) {
            mkdir(public_path("listings"));
        }
        if (!file_exists(public_path("listings/documents"))) {
            mkdir(public_path("listings/documents"));
        }

        foreach ($documents as $folder) {
            $document = TemporaryDocument::where('folder', $folder)->first();
            if ($document) {
                $moved = ListingDocument::create(
                    [
                        'listing_id' => $listing->id,
                        'document' => $document->document,
                        'title' => $document->title,
                    ]
                );

                if ($moved) {
                    $files = File::files(public_path("temporary/documents/$document->folder"));

                    if (!file_exists(public_path("listings/documents/agency_$listing->agency_id"))) {
                        mkdir(public_path("listings/documents/agency_$listing->agency_id"));
                    }
                    if (!file_exists(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id"))) {
                        mkdir(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id"));
                    }
                    if (!file_exists(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id"))) {
                        mkdir(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id"));
                    }
                    $new_folder = public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id");
                    foreach ($files as $file) {
                        File::move($file->getRealPath(), $new_folder . '/' . $file->getFileName());
                    }
                    $removed_dir = public_path("temporary/documents/$document->folder");
                    if (file_exists($removed_dir)) {
                        rmdir($removed_dir);
                    }
                }
            }
        }
    }
}