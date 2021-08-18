<?php

namespace Modules\Listing\ViewModels\Listing;

use App\Models\Agency;
use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\DB;
use Modules\Listing\Entities\Listing;
use Modules\Listing\Http\Controllers\ListingController;

class CreateListingViewModel extends ViewModel
{
    public $agency_id;
    public $agency;
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

        $this->agency = Agency::with([
            'lead_sources',
            'landlords',
            'tenants',
            'task_status',
            'descriptionTemplates',
            'language',
            'country'
        ])->where('id', $this->agency_id)->where('business_id', $this->business)->firstOrFail();

        return $this->agency;
    }
    public function listing_by_ref()
    {

        if ($this->request->ref) {
            $this->listing_by_ref = Listing::where('listing_ref', $this->request->ref)->where('agency_id', $this->agency_id)->first();
            if ($this->listing_by_ref) {
                $this->has_ref = true;
            }
        }

        return $this->listing_by_ref;
    }

    public function agency()
    {
        return $this->agency_id;
    }

    public function staffs()
    {
        return staff($this->agency_id);
    }

    public function agency_region()
    {
        return $this->agency->country->iso2 ?? '';
    }
    public function agency_lat()
    {
        return $this->agency->country->lat ?? '';
    }
    public function agency_lng()
    {
        return $this->agency->country->lng ?? '';
    }
    public function agency_language()
    {
        return $this->agency->language->code ?? '';
    }


    public function lead_sources()
    {
        return $this->agency->lead_sources;
    }
    public function task_status()
    {
        return $this->agency->task_status;
    }
    public function task_types()
    {
        return $this->agency->task_types;
    }
    public function developers()
    {
        return $this->agency->developers;
    }
    public function cheques()
    {
        return $this->agency->cheques;
    }
    public function landlords()
    {
        return $this->agency->landlords;
    }
    public function tenants()
    {
        return $this->agency->tenants;
    }
    public function descriptionTemplates()
    {
        return $this->agency->descriptionTemplates;
    }
    public function listing_views()
    {
        return $this->agency->listing_views;
    }
    public function portals()
    {
        return  cache()->remember('portals', 60 * 60 * 24, function () {
            return DB::table('portals')->get();
        });
    }

    public function listing_types()
    {
        return  cache()->remember('listing_types', 60 * 60 * 24, function () {
            return DB::table('listing_types')->get();
        });
    }
    public function cities()
    {
        return  cache()->remember('cities', 60 * 60 * 24, function () {
            return DB::table('cities')->where('country_id', $this->agency->country_id)->get();
        });
    }
    public function communities()
    {
        return  cache()->remember('communities', 60 * 60 * 24, function () {
            return DB::table('communities')->where('country_id', $this->agency->country_id)->get();
        });
    }
    public function sub_communities()
    {
        return  cache()->remember('sub_communities', 60 * 60 * 24, function () {
            return DB::table('sub_communities')->where('country_id', $this->agency->country_id)->get();
        });
    }
    public function listing_categories()
    {
        return  cache()->remember('listing_categories', 60 * 60 * 24, function () {
            return DB::table('listing_categories')->get();
        });
    }
}