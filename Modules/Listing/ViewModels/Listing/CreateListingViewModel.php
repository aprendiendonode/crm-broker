<?php

namespace Modules\Listing\ViewModels\Listing;

use App\Models\Agency;
use Spatie\ViewModels\ViewModel;
use Illuminate\Http\Request;
use Modules\Listing\Entities\Listing;
use Modules\Listing\Http\Controllers\ListingController;

class CreateListingViewModel extends ViewModel
{
    public $agency_id;
    public $agency_data;
    public $business;
    public $request;
    public $has_ref = false;
    public $listing_by_ref = null;
    public function __construct($agency_id, $business, Request $request)
    {
        $this->agency_id = $agency_id;
        $this->business  = $business;
        $this->request   = $request;
    }

    public function agency_data(): Agency
    {
        return Agency::with([
            'lead_sources',
            'landlords',
            'tenants',
            'task_status',
            'descriptionTemplates',
            'language',
            'country'
        ])->where('id', $this->agency)->where('business_id', $this->business)->firstOrFail();
    }
    public function listing_by_ref(): Listing
    {
        $listing_by_ref = null;
        $has_ref = false;
        if ($this->request->ref) {

            $this->listing_by_ref = Listing::where('listing_ref', $this->request->ref)->where('agency_id', $this->agency)->first();
            if ($this->listing_by_ref) {
                $this->has_ref = true;
            }
        }

        return $this->listing_by_ref;
    }
}