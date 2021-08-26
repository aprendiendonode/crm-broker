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
use Domain\Listings\Actions\CreateTenantAction;
use Modules\Listing\Entities\TemporaryDocument;
use Domain\Listings\Actions\CreateListingAction;
use Domain\Listings\Actions\CreateLandlordAction;
use Domain\Listings\Actions\CreateDeveloperAction;
use Modules\Listing\Http\Repositories\ListingRepo;
use Domain\Listings\Actions\UploadListingPlanAction;
use Domain\Listings\DataTransferObjects\ListingData;
use Domain\Listings\Actions\CreateListingVideoAction;
use Domain\Listings\Actions\UpdateListingAgentAction;
use Domain\Listings\Actions\RemoveListingUploadAction;
use Domain\Listings\Actions\UpdateListingPhotosAction;
use Domain\Listings\Actions\UploadTemporaryPlanAction;
use Domain\Listings\Actions\UpdateListingDetailsAction;
use Domain\Listings\Actions\UpdateListingFeatureAction;
use Domain\Listings\Actions\UpdateListingPricingAction;
use Domain\Listings\Actions\UploadTemporaryPhotoAction;
use Modules\Listing\Http\Requests\CreateListingRequest;
use Domain\Listings\Actions\UpdateListingLocationAction;
use Domain\Listings\Actions\UploadListingDocumentAction;
use Domain\Listings\Actions\UpdateListingExtraInfoAction;
use Domain\Listings\Actions\UpdateListingMainPhotoAction;
use Domain\Listings\DataTransferObjects\CreateTenantData;
use Domain\Listings\Actions\UploadTemporaryDocumentAction;
use Domain\Listings\Actions\UpdateListingDescriptionAction;
use Domain\Listings\DataTransferObjects\CreateLandlordData;
use Domain\Listings\Actions\UpdateListingUploadsTitleAction;
use Domain\Listings\DataTransferObjects\CreateDeveloperData;
use Modules\Listing\Http\Requests\UpdateListingVideoRequest;
use Modules\Listing\ViewModels\Listing\ListingFormViewModel;
use Modules\Listing\ViewModels\Listing\ListingShowViewModel;
use Modules\Listing\Http\Requests\CreateListingTenantRequest;
use Modules\Listing\Http\Requests\UpdateListingPhotosRequest;
use Modules\Listing\Http\Requests\UploadTemporaryPlanRequest;
use Modules\Listing\ViewModels\Listing\ListingIndexViewModel;
use Domain\Listings\Actions\UpdateListingUploadCategoryAction;
use Domain\Listings\Actions\UploadListingUploadCategoryAction;
use Modules\Listing\Http\Requests\UpdateListingDetailsRequest;
use Modules\Listing\Http\Requests\UpdateListingFeatureRequest;
use Modules\Listing\Http\Requests\UpdateListingPricingRequest;
use Modules\Listing\Http\Requests\UploadTemporaryPhotoRequest;
use Modules\Listing\ViewModels\Listing\CreateListingViewModel;
use Domain\Listings\Actions\RemoveListingTemporaryUploadAction;
use Domain\Listings\DataTransferObjects\ListingCreateVideoData;
use Domain\Listings\DataTransferObjects\ListingUpdateAgentData;
use Modules\Listing\Http\Requests\CreateListingLandlordRequest;
use Modules\Listing\Http\Requests\UpdateListingDocumentRequest;
use Modules\Listing\Http\Requests\UpdateListingLocationRequest;
use Domain\Listings\DataTransferObjects\ListingUpdatePhotosData;
use Modules\Listing\Http\Requests\CreateListingDeveloperRequest;
use Modules\Listing\Http\Requests\RemoveListingTemporaryRequest;
use Modules\Listing\Http\Requests\UpdateListingExtraInfoRequest;
use Modules\Listing\Http\Requests\UpdateListingFloorPlanRequest;
use Domain\Listings\DataTransferObjects\ListingUpdateDetailsData;
use Domain\Listings\DataTransferObjects\ListingUpdateFeatureData;
use Domain\Listings\DataTransferObjects\ListingUpdatePricingData;
use Modules\Listing\Http\Requests\UploadTemporaryDocumentRequest;
use Domain\Listings\DataTransferObjects\ListingUpdateLocationData;
use Modules\Listing\Http\Requests\UpdateListingDescriptionRequest;
use Domain\Listings\DataTransferObjects\ListingUpdateExtraInfoData;
use Modules\Listing\Http\Requests\UpdateListingUploadsTitleRequest;
use Domain\Listings\DataTransferObjects\ListingUpdateDescriptionData;
use Modules\Listing\Http\Requests\UpdateListingUploadCategoryRequest;
use Domain\Listings\DataTransferObjects\UpdateListingUploadsTitleData;

class ListingController extends Controller
{

    protected $repository;
    function __construct(ListingRepo $repository)
    {
        $this->repository = $repository;
    }
    public function index($agency, Request $request)
    {

        abort_if(Gate::denies('view_listing'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $viewModel = new ListingIndexViewModel($agency, $request);
        return view('listing::listing.index', $viewModel);
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

    public function updateListingPricing(UpdateListingPricingRequest $request, UpdateListingPricingAction $updateListingPricingAction)
    {
        if ($request->ajax()) {
            try {
                $cheque = $updateListingPricingAction(ListingUpdatePricingData::fromRequest($request));
                return response()->json(['message' => trans('global.modified'), 'cheque' => $cheque], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }

    public function updateListingLocation(UpdateListingLocationRequest $request, UpdateListingLocationAction $updateListingLocationAction)
    {
        if ($request->ajax()) {

            try {
                $listing = $updateListingLocationAction(ListingUpdateLocationData::fromRequest($request));
                return response()->json([
                    'message' => trans('global.modified'), 'city' =>  $listing['city'],
                    'community' => $listing['community'], 'sub_community' => $listing['sub_community']
                ], 200);
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
    public function updateListingDescription(UpdateListingDescriptionRequest $request, UpdateListingDescriptionAction $updateListingDescriptionAction)
    {

        try {
            $updateListingDescriptionAction(ListingUpdateDescriptionData::fromRequest($request));
            return redirect(url('listing/controll/' . $request->agency . '?listing_id=' . $request->listing_id))->with(flash(trans('listing.description_updated'), 'success'));
        } catch (\Exception $e) {

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab', '');
        }
    }

    public function updateListingDetails(UpdateListingDetailsRequest $request, UpdateListingDetailsAction $listingUpdateDetailsAction)
    {
        if ($request->ajax()) {
            try {

                $listing =  $listingUpdateDetailsAction(ListingUpdateDetailsData::fromRequest($request));
                return response()->json([
                    'message'   => trans('global.modified'), 'source' => $listing->source->{'name_' . app()->getLocale()} ?? '',
                    'developer' => $listing->developer->{'name_' . app()->getLocale()} ?? '',
                    'landlord'  => $listing->landlord->{'name'} ?? '',
                    'tenant'    => $listing->tenant->{'name'}  ?? '',
                ], 200);
            } catch (\Exception $th) {
                return response()->json([
                    'message' => trans('global.something_wrong')

                ], 400);
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

    public function updateListingVideos(UpdateListingVideoRequest $request, CreateListingVideoAction $createListingVideoAction)
    {
        if ($request->ajax()) {
            try {
                $listing     = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();
                $createListingVideoAction($listing, ListingCreateVideoData::fromRequest($request));
                return response()->json(['message' => trans('listing.video_added')], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }

    public function updateListingFeatures(UpdateListingFeatureRequest $request, UpdateListingFeatureAction $updateListingFeatureAction)
    {
        if ($request->ajax()) {
            try {
                $all =  $updateListingFeatureAction(ListingUpdateFeatureData::fromRequest($request));
                return response()->json(['message' => trans('listing.modified')], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }

    public function updateListingDocuments(UpdateListingDocumentRequest $request, UploadListingDocumentAction $updateListingDocumentAction)
    {
        if ($request->ajax()) {
            try {
                $listing  = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();
                if ($request->documents && is_array($request->documents)) {
                    $updateListingDocumentAction($listing, $request->documents);
                }
                return response()->json([
                    'message' => trans('global.modified')
                ], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }

    public function updateListingFloors(UpdateListingFloorPlanRequest $request, UploadListingPlanAction $uploadListingPlanAction)
    {

        if ($request->ajax()) {
            try {
                $listing    = Listing::where('business_id', $request->business)->where('id', $request->listing)->firstOrFail();
                if ($request->floors && is_array($request->floors)) {
                    $uploadListingPlanAction($listing, $request->floors);
                }
                return response()->json([
                    'message' => trans('global.modified')
                ], 200);
            } catch (\Exception $th) {
                return response()->json(['message' => trans('global.something_wrong')], 400);
            }
        }
    }
    public function tenant(CreateListingTenantRequest $request, CreateTenantAction $createTenantAction)
    {

        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $tenant = $createTenantAction(CreateTenantData::fromRequest($request));
                DB::commit();
                return response()->json(['message' => trans('listing.tenant_created'), 'data' => $tenant], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }
    public function landlord(CreateListingLandlordRequest $request, CreateLandlordAction $createLandlordAction)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $landlord = $createLandlordAction(CreateLandlordData::fromRequest($request));
                DB::commit();
                return response()->json(['message' => trans('listing.landlord_created'), 'data' => $landlord], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function developer(CreateListingDeveloperRequest $request, CreateDeveloperAction $createDeveloperAction)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $developer =  $createDeveloperAction(CreateDeveloperData::fromRequest($request));
                DB::commit();
                return response()->json(['message' => trans('listing.developer_created'), 'data' => $developer], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function temporary_photos(UploadTemporaryPhotoRequest $request, UploadTemporaryPhotoAction $uploadTemporaryPhotoAction)
    {

        $temporary_photo = $uploadTemporaryPhotoAction(request()->file('file'), $request);
        return [
            'photo' => $temporary_photo
        ];
    }
    public function temporary_plans(UploadTemporaryPlanRequest $request, UploadTemporaryPlanAction $uploadTemporaryPlanAction)
    {
        $temporary_plan = $uploadTemporaryPlanAction(request()->file('file'), $request);
        return [
            'plan' => $temporary_plan
        ];
    }
    public function temporary_documents(UploadTemporaryDocumentRequest $request, UploadTemporaryDocumentAction $uploadListingDocumentAction)
    {
        $temporary_document = $uploadListingDocumentAction(request()->file('file'), $request);
        return [
            'document' => $temporary_document
        ];
    }
    public function modify_title(UpdateListingUploadsTitleRequest $request, UpdateListingUploadsTitleAction $updateListingUploadsTitleAction)
    {
        if ($request->ajax()) {
            DB::beginTransaction();

            try {

                $title = $updateListingUploadsTitleAction(UpdateListingUploadsTitleData::fromRequest($request));
                DB::commit();
                return response()->json(['message' => trans('listing.title_modified'), 'data' => $title], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }



    public function remove_listing_temporary(
        RemoveListingTemporaryRequest $request,
        RemoveListingTemporaryUploadAction $removeListingTemporaryUploadAction,
        RemoveListingUploadAction $removeListingUploadAction
    ) {

        if ($request->ajax()) {

            try {
                DB::beginTransaction();
                if ($request->table == 'temporary') {
                    $removeListingTemporaryUploadAction($request->type, $request->id);
                }
                if ($request->table == 'main') {
                    $removeListingUploadAction($request->type, $request->id);
                }
                DB::commit();

                return response()->json(['message' => trans('listing.removed')], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }
    public function update_listing_temporary_active(Request $request)
    {
        return $this->repository->update_listing_temporary_active($request);
    }
    public function update_listing_main_photo(Request $request, UpdateListingMainPhotoAction $updateListingMainPhotoAction)
    {
        if ($request->ajax()) {
            try {
                DB::beginTransaction();
                $photo =   $updateListingMainPhotoAction($request);
                DB::commit();
                return response()->json(['message' => trans('listing.updated'), 'photo' => $photo], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }




    public function update_listing_temporary_category(UpdateListingUploadCategoryRequest $request, UpdateListingUploadCategoryAction $updateListingUploadCategoryAction)
    {

        if ($request->ajax()) {
            try {
                DB::beginTransaction();
                $updateListingUploadCategoryAction($request);
                DB::commit();
                return response()->json(['message' => trans('listing.updated')], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
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

    public function brochure(Request $request, $type, $agency)
    {
        $listing = Listing::findorfail($request->listing);

        if ($type == 'single') {

            $pdf = PDF::loadView('listing::listing.brochure_single', ['listing' => $listing]);
            return $pdf->stream($listing->title . '.pdf');
        } else {
            $pdf = PDF::loadView('listing::listing.brochure_multi', ['listing' => $listing]);
            return $pdf->stream($listing->title . '.pdf');
        }
    }
}