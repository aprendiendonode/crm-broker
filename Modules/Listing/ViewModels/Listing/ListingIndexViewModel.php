<?php

namespace Modules\Listing\ViewModels\Listing;

use App\Models\Agency;
use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\DB;
use Modules\Listing\Entities\Listing;
use Modules\Listing\Http\Controllers\ListingController;


// $pagination = true;
// $business = auth()->user()->business_id;
// $listings_query = Listing::with([
//     'tasks', 'agent',
//     'tasks.addBy',
//     'tasks.staff',
//     'type',
//     'videos', 'documents', 'plans', 'photos', 'cheques',
//     'notes', 'notes.addBy',
//     'city', 'community', 'subCommunity',


// ])->where('agency_id', $agency->id)->where('business_id', $business);

// $per_page = 15;
// $agency = Agency::with([
//     'lead_sources',
//     'landlords',
//     'tenants',
//     'task_status',
//     'descriptionTemplates',
//     'country',
//     'language',

// ])->withCount(['listingsAll', 'listingsReview', 'listingsArchive', 'listingsDraft', 'listingsLive'])->where('id', $agency)->where('business_id', $business)->firstOrFail();



// $ref_ids = Listing::where('agency_id', $agency->id)->where('business_id', $business)->pluck('listing_ref');

// if (request('status_main') && request('status_main') != 'all') {
//     $listings_query->where('status', request()->status_main);
// }

// if (request('purpose')) {
//     $listings_query->where('purpose', request('purpose'));
// }

// if (request('filter_city_id')) {
//     $listings_query->where('city_id', request('filter_city_id'));
// }
// if (request('filter_community_id')) {
//     $listings_query->where('community_id', request('filter_community_id'));
// }
// if (request('filter_sub_community_id')) {
//     $listings_query->where('sub_community_id', request('filter_sub_community_id'));
// }

// if (request('location')) {
//     $listings_query->where('location', request('location'));
// }
// if (request('filter_user')) {
//     $listings_query->where('assigned_to', request('filter_user'));
// }
// if (request('ref_id')) {
//     $listings_query->where('listing_ref', request('ref_id'));
// }

// if (request('type')) {
//     $type = request('type');

//     $listings_query->whereHas('type', function ($q) use ($type) {
//         $q->where('id', $type);
//     });
// }

// if (request('min_bed')) {
//     if (request('min_bed') == 'studio') {
//         $listings_query->where('beds', request('min_bed'));
//     }
//     $listings_query->where('beds', '>=', request('min_bed'));
// }
// if (request('max_bed')) {
//     if (request('max_bed') == 'studio') {
//         $listings_query->where('beds', request('min_bed'));
//     }
//     $listings_query->where('beds', '<=', request('max_bed'));
// }

// if (request('listing_id')) {

//     $listings_query->where('id', request('listing_id'));
// }

// 'agency_data' => $agency,
// 'agency' => $agency->id,
// 'agency_region' => $agency->country ? $agency->country->iso2 : '',
// 'agency_lat'            => $agency->country ? $agency->country->lat : '',
// 'agency_lng'            => $agency->country ? $agency->country->lng : '',
// 'agency_language'       => $agency->language->code ?? '',
// 'staffs' => staff($agency->id), //filter
// 'listing_types' => cache()->remember('listing_types', 60 * 60 * 24, function () {
//     return DB::table('listing_types')->get();
// }), //filter
// 'listing_views' => $agency->listing_views,
// 'listings' => $listings_query->paginate($per_page),
// 'ref_ids' => $ref_ids,
// 'pagination' => $pagination,
// 'locations' => $listings_query->pluck('location')->unique(),
// 'business' => $business,
// 'lead_sources' => $agency->lead_sources, //lead source
// 'task_status' => $agency->task_status,
// 'task_types' => $agency->task_types,
// 'developers' => $agency->developers,
// 'cheques' => $agency->cheques,
// 'landlords' => $agency->landlords,
// 'tenants' => $agency->tenants,
// 'portals' =>
// cache()->remember('portals', 60 * 60 * 24, function () {
//     return DB::table('portals')->get();
// }),
// 'cities' =>
// cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
//     return DB::table('cities')->where('country_id', $agency->country_id)->get();
// }),
// 'communities' =>
// cache()->remember('communities', 60 * 60 * 24, function () use ($agency) {
//     return DB::table('communities')->where('country_id', $agency->country_id)->get();
// }),
// 'sub_communities' =>
// cache()->remember('sub_communities', 60 * 60 * 24, function () use ($agency) {
//     return DB::table('sub_communities')->where('country_id', $agency->country_id)->get();
// }),
// 'listing_categories' =>
// cache()->remember('listing_categories', 60 * 60 * 24, function () use ($agency) {
//     return DB::table('listing_categories')->get();
// }),


// 'all_count' => $agency->listings_all_count,
// 'archive_count' => $agency->listings_archive_count,
// 'review_count' => $agency->listings_review_count,
// 'draft_count' => $agency->listings_draft_count,
// 'live_count' => $agency->listings_live_count,
// 'descriptionTemplates' => $agency->descriptionTemplates

class ListingIndexViewModel extends ViewModel
{
    public $agency_id;
    public $agency;
    public $listings;
    public $listing_query;
    public $business;
    public $request;
    public $has_ref = false;
    public $listing_by_ref = null;
    public $pagination = true;
    public $refs_id;
    public $per_page = 15;
    public $locations;

    public function __construct($agency_id = null, Request $request)
    {
        $this->agency_id = $agency_id;
        $this->business  = auth()->user()->business_id;
        $this->request   = $request;


        $this->agency = Agency::with([
            'lead_sources',
            'landlords',
            'tenants',
            'task_status',
            'descriptionTemplates',
            'language',
            'country'
        ])->where('id', $this->agency_id)->where('business_id', $this->business)->withCount(['listingsAll', 'listingsReview', 'listingsArchive', 'listingsDraft', 'listingsLive'])->firstOrFail();
    }

    public function listing_query()
    {
        $this->listings_query = Listing::with([
            'tasks', 'agent',
            'tasks.addBy',
            'tasks.staff',
            'type',
            'videos', 'documents', 'plans', 'photos', 'cheques',
            'notes', 'notes.addBy',
            'city', 'community', 'subCommunity',
        ])->where('agency_id', $this->agency->id)->where('business_id', $this->business);

        if (request('status_main') && request('status_main') != 'all') {
            $this->listings_query->where('status', request()->status_main);
        }

        if (request('purpose')) {
            $this->listings_query->where('purpose', request('purpose'));
        }

        if (request('filter_city_id')) {
            $this->listings_query->where('city_id', request('filter_city_id'));
        }
        if (request('filter_community_id')) {
            $this->listings_query->where('community_id', request('filter_community_id'));
        }
        if (request('filter_sub_community_id')) {
            $this->listings_query->where('sub_community_id', request('filter_sub_community_id'));
        }

        if (request('location')) {
            $this->listings_query->where('location', request('location'));
        }
        if (request('filter_user')) {
            $this->listings_query->where('assigned_to', request('filter_user'));
        }
        if (request('ref_id')) {
            $this->listings_query->where('listing_ref', request('ref_id'));
        }

        if (request('type')) {
            $type = request('type');

            $this->listings_query->whereHas('type', function ($q) use ($type) {
                $q->where('id', $type);
            });
        }

        if (request('min_bed')) {
            if (request('min_bed') == 'studio') {
                $this->listings_query->where('beds', request('min_bed'));
            }
            $this->listings_query->where('beds', '>=', request('min_bed'));
        }
        if (request('max_bed')) {
            if (request('max_bed') == 'studio') {
                $this->listings_query->where('beds', request('min_bed'));
            }
            $this->listings_query->where('beds', '<=', request('max_bed'));
        }

        if (request('listing_id')) {

            $this->listings_query->where('id', request('listing_id'));
        }

        return $this->listings_query;
    }

    public function listings()
    {
        return $this->listings_query->paginate($this->per_page);
    }

    public function locations()
    {
        return $this->listings_query->pluck('location')->unique();
    }
    public function pagination()
    {
        return $this->pagination;
    }
    public function ref_ids()
    {
        $this->ref_ids = Listing::where('agency_id', $this->agency->id)->where('business_id', $this->business)->pluck('listing_ref');
        return $this->ref_ids;
    }
    public function agency_data(): Agency
    {

        return $this->agency;
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
    // public function developers()
    // {
    //     return $this->agency->developers;
    // }
    // public function cheques()
    // {
    //     return $this->agency->cheques;
    // }
    // public function landlords()
    // {
    //     return $this->agency->landlords;
    // }
    // public function tenants()
    // {
    //     return $this->agency->tenants;
    // }
    // public function descriptionTemplates()
    // {
    //     return $this->agency->descriptionTemplates;
    // }
    // public function listing_views()
    // {
    //     return $this->agency->listing_views;
    // }
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
    public function all_count()
    {
        return  $this->agency->listings_all_count;
    }
    public function archive_count()
    {
        return  $this->agency->listings_archive_count;
    }
    public function review_count()
    {
        return  $this->agency->listings_review_count;
    }
    public function draft_count()
    {
        return  $this->agency->listings_draft_count;
    }
    public function live_count()
    {
        return  $this->agency->listings_live_count;
    }
}