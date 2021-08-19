<?php

namespace Domain\Listings\Actions;

use App\Models\Agency;
use App\Models\Business;
use Modules\Listing\Entities\Listing;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingPlan;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\ListingVideo;
use Modules\Listing\Entities\PortalListing;
use Modules\Listing\Entities\TemporaryPlan;
use Modules\Listing\Entities\ListingDocument;
use Modules\Listing\Entities\TemporaryListing;
use Modules\Listing\Entities\TemporaryDocument;
use Domain\Listings\DataTransferObjects\ListingData;
use Modules\Listing\Entities\ListingChequeCalculator;


class CreateListingAction
{
    public function __invoke(ListingData $listingData): Listing
    {

        $business = Business::where('id', $listingData->business_id)->firstOrFail();
        if ($business->id != auth()->user()->business_id) {

            abort(404);
        }
        $agency = Agency::where('id', $listingData->agency_id)->where('business_id', $business->id)->firstOrFail();
        $video_title = $listingData->video_title;
        $video_link = $listingData->video_link;
        $video_host = $listingData->video_host;
        $cheque_date = $listingData->cheque_date;
        $cheque_amount = $listingData->cheque_amount;
        $cheque_percentage = $listingData->cheque_percentage;
        $documents = $listingData->documents;
        $floor_plans = $listingData->floor_plans;
        $photos = $listingData->photos;

        $validator = Validator::make($listingData->all(), Listing::store_validation($listingData));
        if ($validator->fails()) {
            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', '');
        }

        if (count($cheque_date) != count($cheque_amount) || count($cheque_date) != count($cheque_percentage)) {
            return back()->withInput()->with(flash(trans('listing.cheque_inputs_invalid'), 'danger'))
                ->with('open-tab', '');
        }
        if (count($video_host) != count($video_link) || count($video_host) != count($video_title)) {
            return back()->withInput()->with(flash(trans('listing.video_inputs_invalid'), 'danger'))
                ->with('open-tab', '');
        }

        $inputs = $validator->validated();
        unset($inputs['video_title']);
        unset($inputs['video_link']);
        unset($inputs['video_host']);
        unset($inputs['cheque_date']);
        unset($inputs['cheque_amount']);
        unset($inputs['cheque_percentage']);
        unset($inputs['photos']);
        unset($inputs['floor_plans']);
        unset($inputs['documents']);
        /*   dd('here', $inputs); */

        if (!array_key_exists('view_ids', $inputs)) {
            $inputs['view_ids'] = [];
        }
        if (!array_key_exists('portals', $inputs)) {
            $inputs['portals'] = [];
        }
        $inputs['added_by'] = auth()->user()->id;
        $listing = Listing::create($inputs);


        if (array_key_exists('portals', $inputs) && is_array($inputs['portals'])) {

            foreach ($inputs['portals'] as $portal) {
                PortalListing::create([
                    'listing_id' => $listing->id,
                    'portal_id' => $portal
                ]);
            }
        }


        //* move photos from temporary to listing_photos
        if ($photos && is_array($photos)) {
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
                            'listing_id' => $listing->id,
                            'main' => $photo->main,
                            'watermark' => $photo->watermark,
                            'active' => $photo->active,
                            'photo_main' => $listingData->checked_main_hidden[$key],
                            'icon' => $photo->icon,
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

        //* move plans from temporary to listing_plans

        if ($floor_plans && is_array($floor_plans)) {
            if (!file_exists(public_path("listings"))) {
                mkdir(public_path("listings"));
            }
            if (!file_exists(public_path("listings/plans"))) {
                mkdir(public_path("listings/plans"));
            }

            foreach ($floor_plans as $folder) {
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

        //* move documents from temporary to listing_documents

        if ($documents && is_array($documents)) {
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
        //* save videos

        if (count($video_title) > 0) {
            if ($video_title[0] != null && $video_host[0] != null && $video_link[0] != null) {

                foreach ($video_title as $key => $title) {
                    ListingVideo::create([
                        'listing_id' => $listing->id,
                        'title' => $title,
                        'host' => $video_host[$key],
                        'link' => $video_link[$key],
                    ]);
                }
            }
        }

        if (count($cheque_date) > 0) {
            if ($cheque_date[0] != null && $cheque_amount[0] != null && $cheque_percentage[0] != null) {
                foreach ($cheque_date as $key => $date) {
                    ListingChequeCalculator::create([
                        'listing_id' => $listing->id,
                        'date' => $date,
                        'value' => $cheque_amount[$key],
                        'percent' => $cheque_percentage[$key],
                    ]);
                }
            }
        }

        return $listing;
    }
}