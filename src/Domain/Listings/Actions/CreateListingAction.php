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

    private UploadListingDocumentAction $uploadListingDocumentAction;

    public function __construct(UploadListingDocumentAction $uploadListingDocumentAction)
    {
        $this->uploadListingDocumentAction = $uploadListingDocumentAction;
    }


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
        $inputs = collect($listingData)->except([
            'video_title',
            'video_link',
            'video_host',
            'cheque_date',
            'cheque_amount',
            'cheque_percentage',
            'photos',
            'floor_plans',
            'documents',
        ]);
        // dd($inputs);
        $inputs = $inputs->toArray();

        if (!array_key_exists('view_ids', $inputs)) {
            $inputs['view_ids'] = [];
        }
        if (!array_key_exists('portals', $inputs)) {
            $inputs['portals'] = [];
        }

        $listing = Listing::create(
            [
                "business_id"                => $inputs['business_id'],
                "agency_id"                  => $inputs['agency_id'],
                "type_id"                    => $inputs['type_id'],
                "loc_lat"                    => $inputs['loc_lat'],
                "loc_lng"                    => $inputs['loc_lng'],
                "purpose"                    => $inputs['purpose'],
                "location"                   => $inputs['location'],
                "city_id"                    => $inputs['city_id'],
                "community_id"               => $inputs['community_id'],
                "sub_community_id"           => $inputs['sub_community_id'],
                "unit_no"                    => $inputs['unit_no'],
                "plot_no"                    => $inputs['plot_no'],
                "street_no"                  => $inputs['street_no'],
                "portals"                    => $inputs['portals'],
                "view_ids"                   => $inputs['view_ids'],
                "price"                      => $inputs['price'],
                "rent_frequency"             => $inputs['rent_frequency'],
                "comission_percent"          => $inputs['comission_percent'],
                "comission_value"            => $inputs['comission_value'],
                "never_lived_in"             => $inputs['never_lived_in'],
                "featured_on_company_website" => $inputs['featured_on_company_website'],
                "exclusive_rights"           => $inputs['exclusive_rights'],
                "beds"                       => $inputs['beds'],
                "baths"                      => $inputs['baths'],
                "parkings"                   => $inputs['parkings'],
                "year_built"                 => $inputs['year_built'],
                "developer_id"               => $inputs['developer_id'],
                "plot_area"                  => $inputs['plot_area'],
                "area"                       => $inputs['area'],
                "deposite_percent"           => $inputs['deposite_percent'],
                "deposite_value"             => $inputs['deposite_value'],
                "listing_rent_cheque_id"     => $inputs['listing_rent_cheque_id'],
                "title"                      => $inputs['title'],
                "lsm"                        => $inputs['lsm'],
                "landlord_id"                => $inputs['landlord_id'],
                "rented"                     => $inputs['rented'],
                "tenancy_contract_start_date" => $inputs['tenancy_contract_start_date'],
                "tenancy_contract_end_date"  => $inputs['tenancy_contract_end_date'],
                "tenant_id"                  => $inputs['tenant_id'],
                "source_id"                  => $inputs['source_id'],
                "assigned_to"                => $inputs['assigned_to'],
                "status"                     => $inputs['status'],
                "note"                       => $inputs['note'],
                "features"                   => $inputs['features'],
                "key_location"               => $inputs['key_location'],
                "govfield1"                  => $inputs['govfield1'],
                "govfield2"                  => $inputs['govfield2'],
                "yearly_service_charges"     => $inputs['yearly_service_charges'],
                "monthly_cooling_charges"    => $inputs['monthly_cooling_charges'],
                "monthly_cooling_provider"   => $inputs['monthly_cooling_provider'],
                "description_en"             => $inputs['description_en'],
                "description_ar"             => $inputs['description_ar'],
                "added_by"                   => auth()->user()->id
            ]
        );

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
        if ($documents && is_array($documents)) {

            ($this->uploadListingDocumentAction)($listing, $documents);
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