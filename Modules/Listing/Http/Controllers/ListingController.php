<?php

namespace Modules\Listing\Http\Controllers;

use Gate;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Listing\Entities\Listing;
use Symfony\Component\HttpFoundation\Response;
use Modules\Listing\Http\Repositories\ListingRepo;


class ListingController extends Controller
{

    protected $repository;
    function __construct(ListingRepo $repository)
    {
        $this->repository = $repository;
    }
    public function index($agency)
    {
        abort_if(Gate::denies('view_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->repository->index($agency);
    }


    public function create($agency)
    {
        $business = auth()->user()->business_id;

        $agency = Agency::with([
            'lead_sources',
            'landlords',
            'tenants',
            'task_status',
            'descriptionTemplates'

        ])->withCount(['listingsAll', 'listingsReview', 'listingsArchive', 'listingsDraft', 'listingsLive'])->where('id', $agency)->where('business_id', $business)->firstOrFail();


        return view('listing::listing.create.index', [
            'agency_data' => $agency,
            'business' => $business,
            'agency' => $agency->id,
            'staffs' => staff($agency->id),
            'agency_region' => $agency->country ? $agency->country->iso2 : '',

            'lead_sources' => $agency->lead_sources,
            'task_status' => $agency->task_status,
            'task_types' => $agency->task_types,
            'developers' => $agency->developers,
            'cheques' => $agency->cheques,
            'landlords' => $agency->landlords,
            'tenants' => $agency->tenants,
            'descriptionTemplates' => $agency->descriptionTemplates,
            'portals' =>
            cache()->remember('portals', 60 * 60 * 24, function () {
                return DB::table('portals')->get();
            }),
            'listing_types' => cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get();
            }),
            'listing_views' => $agency->listing_views,
            'cities' =>  cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('cities')->where('country_id', $agency->country_id)->get();
            }),
            'communities' =>
            cache()->remember('communities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('communities')->where('country_id', $agency->country_id)->get();
            }),
            'sub_communities' =>
            cache()->remember('sub_communities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('sub_communities')->where('country_id', $agency->country_id)->get();
            }),
            'listing_categories' =>
            cache()->remember('listing_categories', 60 * 60 * 24, function () use ($agency) {
                return DB::table('listing_categories')->get();
            }),

        ]);
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('add_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->repository->store($request);
    }

    public function show($listing_id, $listing_ref)
    {
        abort_if(Gate::denies('view_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $this->repository->show($listing_id, $listing_ref);
    }



    public function load_edit_view(Request $request)
    {
        // dd($request);
        $listing = Listing::findorfail($request->listing);
        $agency = Agency::with([
            'lead_sources',
            'landlords',
            'tenants',
            'task_status',
            'descriptionTemplates'

        ])->withCount(['listingsAll', 'listingsReview', 'listingsArchive', 'listingsDraft', 'listingsLive'])->where('id', $listing->agency_id)->firstOrFail();



        return view('listing::listing.edit', [
            'listing'    => $listing,
            'agency_data' => $agency,
            'agency' => $agency->id,
            'agency_region' => $agency->country ? $agency->country->iso2 : '',
            'lead_sources' => $agency->lead_sources,
            'task_status' => $agency->task_status,
            'task_types' => $agency->task_types,
            'developers' => $agency->developers,
            'cheques' => $agency->cheques,
            'landlords' => $agency->landlords,
            'tenants' => $agency->tenants,
            'portals' =>
            cache()->remember('portals', 60 * 60 * 24, function () {
                return DB::table('portals')->get();
            }),
            'cities' =>
            cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('cities')->where('country_id', $agency->country_id)->get();
            }),
            'communities' =>
            cache()->remember('communities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('communities')->where('country_id', $agency->country_id)->get();
            }),
            'sub_communities' =>
            cache()->remember('sub_communities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('sub_communities')->where('country_id', $agency->country_id)->get();
            }),
            'listing_categories' =>
            cache()->remember('listing_categories', 60 * 60 * 24, function () use ($agency) {
                return DB::table('listing_categories')->get();
            }),
            'listing_types' => cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get();
            }),
            'listing_views' => $agency->listing_views,
            'staffs' => staff($agency->id),
            'descriptionTemplates' => $agency->descriptionTemplates


            // 'agency'     => $listing->agency_id,
            // 'business'   => $listing->agency_id,
        ]);
    }





    /**********************************End Assign Task********************************* */







    public function locations($agency)
    {

        return view('listing::location');
    }
    public function uploader($agency)
    {
        return view('listing::uploader');
    }

    public function tenant(Request $request, ListingRepo $repo)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return $repo->tenant($request);
    }
    public function landlord(Request $request, ListingRepo $repo)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return $repo->landlord($request);
    }
    public function developer(Request $request, ListingRepo $repo)
    {

        abort_if(Gate::denies('manage_listing_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return $repo->developer($request);
    }


    public function temporary_photos(Request $request)
    {
        return $this->repository->temporary_photos($request);
    }
    public function temporary_plans(Request $request)
    {
        return $this->repository->temporary_plans($request);
    }
    public function temporary_documents(Request $request)
    {
        return $this->repository->temporary_documents($request);
    }
    public function modify_title(Request $request)
    {
        return $this->repository->modify_title($request);
    }

    public function update(Request $request, $id)
    {
        return $this->repository->update($request, $id);
    }
    public function brochure(Request $request, $type, $agency)
    {
        return $this->repository->brochure($request, $type, $agency);
    }
    public function remove_listing_temporary(Request $request)
    {
        return $this->repository->remove_listing_temporary($request);
    }
    public function update_listing_temporary_active(Request $request)
    {
        return $this->repository->update_listing_temporary_active($request);
    }
    public function update_listing_main_photo(Request $request)
    {
        return $this->repository->update_listing_main_photo($request);
    }
    public function update_listing_temporary_category(Request $request)
    {
        return $this->repository->update_listing_temporary_category($request);
    }
    public function share_listing($agency, ListingRepo $repository)
    {
        abort_if(Gate::denies('share_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repository->share_listing($agency);
    }
    public function requests($agency, ListingRepo $repository)
    {
        abort_if(Gate::denies('listing_requests'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repository->requests($agency);
    }
    public function send_request(Request $request, ListingRepo $repository)
    {
        return $repository->send_request($request);
    }
    public function request_response($response, $id, ListingRepo $repository)
    {
        return $repository->request_response($response, $id);
    }
    public function block(Request $request, ListingRepo $repository)
    {
        return $repository->block($request);
    }
    public function unblock(Request $request, ListingRepo $repository)
    {
        return $repository->unblock($request);
    }
    public function old_requests($agency, ListingRepo $repository)
    {
        return $repository->old_requests($agency);
    }
    public function black_listed($agency, ListingRepo $repository)
    {
        return $repository->black_listed($agency);
    }

    public function contact_client(Request $request, ListingRepo $repository)
    {
        return $repository->contact_client($request);
    }



    public function update_listing_portals(Request $request, $id)
    {
        return $this->repository->update_listing_portals($request, $id);
    }
    public function destroy(Request $request)
    {
        return $this->repository->destroy($request);
    }
    public function assign_task(Request $request, $id)
    {
        return $this->repository->assign_task($request, $id);
    }
    public function edit_assign_task(Request $request, $id)
    {
        return $this->repository->edit_assign_task($request, $id);
    }
    public function delete_task(Request $request)
    {
        return $this->repository->delete_task($request);
    }
    public function save_note(Request $request)
    {
        return $this->repository->save_note($request);
    }
    public function listing_update_status(Request $request)
    {
        return $this->repository->listing_update_status($request);
    }
    public function export_all(Request $request, $agency)
    {
        return $this->repository->export_all($request, $agency);
    }
    public function get_communities(Request $request)
    {
        return $this->repository->get_communities($request);
    }
    public function get_sub_communities(Request $request)
    {
        return $this->repository->get_sub_communities($request);
    }
    public function statistics($agency)
    {
        return $this->repository->statistics($agency);
    }
    public function statistics_view($agency)
    {
        return $this->repository->statistics_view($agency);
    }
    public function statistics_process(Request $request)
    {
        return $this->repository->statistics_process($request);
    }

    public function mark(Request $request)
    {
        return $this->repository->mark($request);
    }
    public function lsm_change(Request $request)
    {
        return $this->repository->lsm_change($request);
    }
    public function staff_change_shortcut(Request $request)
    {
        return $this->repository->staff_change_shortcut($request);
    }
    public function status_change_shortcut(Request $request)
    {
        return $this->repository->status_change_shortcut($request);
    }
    public function move_to_archive(Request $request)
    {
        return $this->repository->move_to_archive($request);
    }
}
