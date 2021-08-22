<?php

namespace Modules\Listing\Http\Controllers;

use PDF;
use File;
use Gate;
use App\Models\User;
use App\Models\Agency;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Listing\Entities\Listing;
use Modules\SuperAdmin\Entities\City;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingPlan;
use Modules\Listing\Entities\ListingView;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\ListingVideo;
use Modules\SuperAdmin\Entities\Community;
use Modules\Listing\Entities\ListingCheque;
use Modules\Listing\Entities\TemporaryPlan;
use Modules\Listing\Entities\ListingDocument;
use Modules\SuperAdmin\Entities\SubCommunity;
use Modules\Listing\Entities\TemporaryListing;
use Symfony\Component\HttpFoundation\Response;
use Modules\Listing\Entities\TemporaryDocument;
use Domain\Listings\Actions\CreateListingAction;
use Modules\Listing\Http\Repositories\ListingRepo;
use Domain\Listings\DataTransferObjects\ListingData;
use Domain\Listings\Actions\UpdateListingAgentAction;
use Domain\Listings\Actions\UpdateListingPhotosAction;
use Domain\Listings\Actions\UpdateListingDetailsAction;
use Domain\Listings\Actions\UpdateListingPricingAction;
use Modules\Listing\Http\Requests\CreateListingRequest;
use Domain\Listings\Actions\UpdateListingLocationAction;
use Domain\Listings\Actions\UpdateListingExtraInfoAction;
use Modules\Listing\ViewModels\Listing\ListingFormViewModel;
use Modules\Listing\ViewModels\Listing\ListingShowViewModel;
use Modules\Listing\Http\Requests\UpdateListingPhotosRequest;
use Modules\Listing\Http\Requests\UpdateListingDetailsRequest;
use Modules\Listing\ViewModels\Listing\CreateListingViewModel;
use Domain\Listings\DataTransferObjects\ListingUpdateAgentData;
use Domain\Listings\DataTransferObjects\ListingUpdatePhotosData;
use Modules\Listing\Http\Requests\UpdateListingExtraInfoRequest;
use Domain\Listings\DataTransferObjects\ListingUpdateDetailsData;
use Domain\Listings\DataTransferObjects\ListingUpdatePricingData;
use Domain\Listings\DataTransferObjects\ListingUpdateLocationData;
use Domain\Listings\DataTransferObjects\ListingUpdateExtraInfoData;

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


    public function create($agency, Request $request)
    {

        $business = auth()->user()->business_id;
        $viewModel = new ListingFormViewModel($agency, $business, $request);
        return view('listing::listing.create.index', $viewModel);
    }

    public function store(CreateListingRequest $request, CreateListingAction $createListingAction)
    {
        DB::beginTransaction();
        try {
            $createListingAction(ListingData::fromRequest($request));
            DB::commit();
            return back()->with(flash(trans('listing.listing_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab', '');
        }
    }




    public function show($listing_id, $listing_ref)
    {
        abort_if(Gate::denies('view_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $viewModel = new ListingShowViewModel($listing_id);
        return view('listing::listing.front',  $viewModel);
    }



    public function load_edit_view(Request $request)
    {
        $business = auth()->user()->business_id;
        $listing = Listing::findOrFail($request->listing);
        $viewModel = new ListingFormViewModel($listing->agency_id, $business, $request,  $listing);
        return view('listing::listing.edit.index', $viewModel);
    }



    public function updateListingAgent(Request $request, UpdateListingAgentAction $updateListingAgentAction)
    {
        if ($request->ajax()) {
            try {
                $agent = $updateListingAgentAction(ListingUpdateAgentData::fromRequest($request));
                return response()->json(['message' => trans('global.modified'), 'agent' => $agent], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }

    public function updateListingPricing(Request $request, UpdateListingPricingAction $updateListingPricingAction)
    {
        if ($request->ajax()) {
            try {
                $cheque = $updateListingPricingAction(ListingUpdatePricingData::fromRequest($request));
                return response()->json(['message' => trans('global.modified'), 'cheque' => $cheque], 200);
            } catch (\Exception $th) {

                dd($th);
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }



    public function updateListingLocation(Request $request, UpdateListingLocationAction $updateListingLocationAction)
    {
        if ($request->ajax()) {
            try {
                $listing = $updateListingLocationAction(ListingUpdateLocationData::fromRequest($request));
                return response()->json(['message' => trans('global.modified'), 'city' =>  $listing['city'], 'community' => $listing['community'], 'sub_community' => $listing['sub_community']], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }

    public function updateListingExtraInfo(UpdateListingExtraInfoRequest $request, UpdateListingExtraInfoAction $updateListingExtraInfoAction)
    {

        if ($request->ajax()) {
            try {
                $updateListingExtraInfoAction(ListingUpdateExtraInfoData::fromRequest($request));
                return response()->json(['message' => trans('global.modified')], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }



    public function updateListingDetails(UpdateListingDetailsRequest $request, UpdateListingDetailsAction $listingUpdateDetailsAction)
    {
        if ($request->ajax()) {
            try {
                $listingUpdateDetailsAction(ListingUpdateDetailsData::fromRequest($request));
                return response()->json(['message' => trans('global.modified')], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }
    public function updateListingPhotos(UpdateListingPhotosRequest $request, UpdateListingPhotosAction $updateListingPhotosAction)
    {

        if ($request->ajax()) {
            try {

                $listing = $updateListingPhotosAction(ListingUpdatePhotosData::fromRequest($request));
                return response()->json([
                    'message'            => trans('global.modified'),
                    'has_new_main_photo' => $listing['has_new_main_photo'],
                    'new_main_photo'     => $listing['new_main_photo'],
                    'path'               => $listing['path']
                ], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }





    public function updateListingVideos(Request $request)
    {


        if ($request->ajax()) {
            try {
                $listing     = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();

                $validator = Validator::make($request->all(), [
                    "video_title"                             => ['required', 'string'],
                    "video_link"                              => ['required', 'string'],
                    "video_host"                              => ['required', 'string'],
                ]);
                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }
                $video_title =  json_decode($request->video_title);
                $video_link  =  json_decode($request->video_link);
                $video_host  =  json_decode($request->video_host);
                if (count($video_host) != count($video_link) || count($video_host) != count($video_title)) {
                    return response()->json(['message' => trans('listing.video_inputs_invalid')], 400);
                }
                if (count($video_title) > 0) {
                    $listing->videos->each(function ($q) {
                        $q->delete();
                    });
                    if ($video_title[0] != null && $video_host[0] != null && $video_link[0] != null) {

                        foreach ($video_title as $key => $title) {
                            ListingVideo::create([
                                'listing_id' => $listing->id,
                                'title'      => $title,
                                'host'       => $video_host[$key],
                                'link'       => $video_link[$key],
                            ]);
                        }
                    }
                }

                return response()->json(['message' => trans('listing.video_added')], 200);
            } catch (\Exception $th) {

                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }



    public function updateListingFeatures(Request $request)
    {


        if ($request->ajax()) {
            try {
                $listing     = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();







                $validator = Validator::make($request->all(), [
                    "checkboxesFeatureName"                              => ['required', 'string'],
                    "checkboxesFeatureValue"                             => ['required', 'string'],
                    "inputsFeatureName"                                  => ['required', 'string'],
                    "inputsFeatureValue"                                 => ['required', 'string'],
                    "selectsFeatureName"                                 => ['required', 'string'],
                    "selectsFeatureValue"                                => ['required', 'string'],

                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }
                $checkboxesFeatureName   =  json_decode($request->checkboxesFeatureName);
                $checkboxesFeatureValue  =  json_decode($request->checkboxesFeatureValue);
                $checkboxes = [];
                foreach ($checkboxesFeatureName as $key =>  $name) {
                    $checkboxes[$name] =
                        $checkboxesFeatureValue[$key];
                }


                $inputsFeatureName   =  json_decode($request->inputsFeatureName);
                $inputsFeatureValue  =  json_decode($request->inputsFeatureValue);
                $inputs = [];
                foreach ($inputsFeatureName as $key =>  $name) {
                    $inputs[$name] =
                        $inputsFeatureValue[$key];
                }

                $selectsFeatureName   =  json_decode($request->selectsFeatureName);
                $selectsFeatureValue  =  json_decode($request->selectsFeatureValue);
                $selects = [];
                foreach ($selectsFeatureName as $key =>  $name) {
                    $selects[$name] =
                        $selectsFeatureValue[$key];
                }

                $merged = array_merge($checkboxes, $inputs);
                $all = array_merge($merged, $selects);


                $listing->update(['features' => $all]);
                return response()->json(['message' => trans('listing.modified')], 200);
            } catch (\Exception $th) {

                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }




    public function updateListingDocuments(Request $request)
    {

        if ($request->ajax()) {
            try {


                $listing             = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();


                $validator = Validator::make($request->all(), [
                    "documents"                             => ['required', 'string'],
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }
                $documents              = json_decode($request->documents);

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
                return response()->json([
                    'message' => trans('global.modified')
                ], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }



    public function updateListingFloors(Request $request)
    {

        if ($request->ajax()) {
            try {


                $listing             = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();


                $validator = Validator::make($request->all(), [
                    "floors"                             => ['required', 'string'],
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }
                $floor_plans              = json_decode($request->floors);

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

                return response()->json([
                    'message' => trans('global.modified')
                ], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }



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