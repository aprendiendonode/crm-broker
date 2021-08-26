<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Modules\Listing\Entities\Listing;

use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\TemporaryListing;


class UploadListingPhotoAction
{
    public function __invoke(Listing $listing, array $photos, array $checked_main_hidden = [])
    {

        if (!file_exists(public_path("listings"))) {
            mkdir(public_path("listings"));
        }
        if (!file_exists(public_path("listings/photos"))) {
            mkdir(public_path("listings/photos"));
        }

        foreach ($photos as $key => $folder) {
            $photo = TemporaryListing::where('folder', $folder)->first();
            if ($photo) {
                $moved = ListingPhoto::create(
                    [
                        'listing_id'          => $listing->id,
                        'main'                => $photo->main,
                        'watermark'           => $photo->watermark,
                        'active'              => $photo->active,
                        'photo_main'          => $checked_main_hidden[$key],
                        'icon'                => $photo->icon,
                        'listing_category_id' => $photo->listing_category_id,
                    ]
                );

                if ($moved) {
                    $files = File::files(public_path("temporary/listings/$photo->folder"));
                    if (!file_exists(public_path("listings/photos/agency_$listing->agency_id"))) {
                        mkdir(public_path("listings/photos/agency_$listing->agency_id"));
                    }
                    if (!file_exists(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id"))) {
                        mkdir(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id"));
                    }
                    if (!file_exists(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id"))) {
                        mkdir(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id"));
                    }
                    $new_folder = public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id");
                    foreach ($files as $file) {
                        File::move($file->getRealPath(), $new_folder . '/' . $file->getFileName());
                    }
                    $removed_dir = public_path("temporary/listings/$photo->folder");
                    if (file_exists($removed_dir)) {
                        rmdir($removed_dir);
                    }
                }
            }
        }
    }
}