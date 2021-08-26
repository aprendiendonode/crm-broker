<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Modules\Listing\Entities\Listing;
use Modules\SuperAdmin\Entities\City;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\TemporaryListing;
use File;
use Domain\Listings\DataTransferObjects\ListingUpdatePhotosData;

class UpdateListingPhotosAction
{


    public function __invoke(ListingUpdatePhotosData $listingUpdatePhotosData): array
    {

        $listing    = Listing::where('business_id', auth()->user()->business_id)->where('id', $listingUpdatePhotosData->listing)->firstOrFail();
        $has_new_main_photo     = 'no';
        $new_photo_main         = null;
        if (!file_exists(public_path("listings"))) {
            mkdir(public_path("listings"));
        }
        if (!file_exists(public_path("listings/photos"))) {
            mkdir(public_path("listings/photos"));
        }

        foreach ($listingUpdatePhotosData->photos as $key => $folder) {
            $photo = TemporaryListing::where('folder', $folder)->first();
            if ($photo) {

                if (in_array('yes', $listingUpdatePhotosData->checked_main_hidden)) {
                    ListingPhoto::where('listing_id', $listing->id)->update(['photo_main' => 'no']);
                }

                $moved = ListingPhoto::create(
                    [
                        'listing_id'             => $listing->id,
                        'main'                   => $photo->main,
                        'watermark'              => $photo->watermark,
                        'active'                 => $photo->active,
                        'photo_main'             => $listingUpdatePhotosData->checked_main_hidden[$key],
                        'icon'                   => $photo->icon,
                        'listing_category_id'    =>  $photo->listing_category_id
                    ]
                );

                if ($moved->photo_main == 'yes') {

                    $has_new_main_photo = 'yes';
                    $new_photo_main     = $moved;
                }
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

        return ['has_new_main_photo' => $has_new_main_photo, 'new_main_photo' => $new_photo_main, 'path' => asset('listings/photos/agency_' . $listing->agency_id . '/listing_' . $listing->id . '/photo_')];
    }
}