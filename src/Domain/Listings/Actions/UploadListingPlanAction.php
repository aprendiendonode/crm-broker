<?php

namespace Domain\Listings\Actions;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Modules\Listing\Entities\Listing;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingPlan;
use Modules\Listing\Entities\ListingCheque;
use Modules\Listing\Entities\TemporaryPlan;
use Modules\Listing\Entities\ListingDocument;
use Modules\Listing\Entities\TemporaryDocument;
use Domain\Listings\DataTransferObjects\ListingUpdatePricingData;

class UploadListingPlanAction
{



    public function __invoke(Listing $listing, array $plans)
    {

        if (!file_exists(public_path("listings"))) {
            mkdir(public_path("listings"));
        }
        if (!file_exists(public_path("listings/plans"))) {
            mkdir(public_path("listings/plans"));
        }

        foreach ($plans as $folder) {
            $plan = TemporaryPlan::where('folder', $folder)->first();
            if ($plan) {
                $moved = ListingPlan::create(
                    [
                        'listing_id' => $listing->id,
                        'main' => $plan->main,
                        'watermark' => $plan->watermark,
                        'active' => $plan->active,
                        'title' => $plan->title,
                    ]
                );

                if ($moved) {
                    $files = File::files(public_path("temporary/plans/$plan->folder"));

                    if (!file_exists(public_path("listings/plans/agency_$listing->agency_id"))) {
                        mkdir(public_path("listings/plans/agency_$listing->agency_id"));
                    }
                    if (!file_exists(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id"))) {
                        mkdir(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id"));
                    }
                    if (!file_exists(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id"))) {
                        mkdir(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id"));
                    }
                    $new_folder = public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id");
                    foreach ($files as $file) {
                        File::move($file->getRealPath(), $new_folder . '/' . $file->getFileName());
                    }
                    $removed_dir = public_path("temporary/plans/$plan->folder");
                    if (file_exists($removed_dir)) {
                        rmdir($removed_dir);
                    }
                }
            }
        }
    }
}