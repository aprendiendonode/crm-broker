<?php

namespace Modules\Listing\Http\Repositories;

use App\Mail\ContactClient;
use Modules\Listing\Entities\ListingType;
use PDF;
use File;
use Gate;
use App\Models\Agency;
use App\Jobs\SendEmail;
use App\Models\Business;
use App\Models\Template;

use App\Models\BlackList;
use Symfony\Component\HttpFoundation\Response;

use App\Mail\ShareRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SystemTemplate;
use App\Exports\ListingsExport;
use Illuminate\Validation\Rule;

use App\Events\ListingTaskEvent;

use Illuminate\Support\Facades\DB;
use Modules\Sales\Entities\Client;
use Modules\Activity\Entities\Task;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Sales\Entities\LeadType;
use Intervention\Image\Facades\Image;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Developer;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskType;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskStatus;
use Modules\Listing\Entities\ListingPlan;
use Modules\Activity\Entities\ListingNote;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\ListingVideo;
use Modules\Listing\Entities\TemporaryPlan;
use Illuminate\Support\Facades\Notification;
use Modules\Listing\Entities\ListingDocument;
use App\Notifications\ListingTaskNotification;
use Modules\Listing\Entities\TemporaryListing;
use Modules\Listing\Entities\TemporaryDocument;
use Modules\Listing\Entities\ListingChequeCalculator;

class ListingRepo
{
    public function index($agency)
    {

        try {
            $pagination = true;
            $business = auth()->user()->business_id;
            $per_page = 15;

            $types = ListingType::where('agency_id', $agency)->get();
            $agency = Agency::with([
                'lead_sources',
                'landlords',
                'tenants',
                'task_status',
                'task_types',
                'listing_views',
                'developers',
                'cheques',
                'descriptionTemplates'


            ])->where('id', $agency)->where('business_id', $business)->firstOrFail();
            $listing_types = DB::table('listing_types')->get();
            $lead_sources = $agency->lead_sources;
            $task_status = $agency->task_status;
            $task_types = $agency->task_types;
            $listing_views = $agency->listing_views;
            $developers = $agency->developers;
            $cheques = $agency->cheques;
            $landlords = $agency->landlords;
            $tenants = $agency->tenants;
            $descriptionTemplates = $agency->descriptionTemplates;
            $portals = DB::table('portals')->get();

            $listings = Listing::with([
                'tasks', 'agent',
                'tasks.addBy',
                'tasks.staff',
                'type',
                'videos', 'documents', 'plans', 'photos', 'cheques',
                'notes', 'notes.addBy'

            ])->where('agency_id', $agency->id)->where('business_id', $business);
            $locations = $listings->pluck('location')->unique();
            $ref_ids = $listings->pluck('listing_ref')->unique();

            $staffs = staff($agency->id);


            if (request()->has('status_main')) {
                $listings->where('status', request()->status_main);
            }


            //filter
            if (request('purpose')) {
                $listings->where('purpose', request('purpose'));
            }

            if (request('location')) {
                $listings->where('location', request('location'));
            }
            if (request('filter_user')) {
                $listings->where('assigned_to', request('filter_user'));
            }
            if (request('ref_id')) {
                $listings->where('listing_ref', request('ref_id'));
            }

            if (request('type')) {
                $type = request('type');

                $listings->whereHas('type', function ($q) use ($type) {
                    $q->where('id', $type);
                });
            }


            if (request('min_bed')) {
                if (request('min_bed') == 'studio') {
                    $listings->where('beds', request('min_bed'));
                }
                $listings->where('beds', '>=', request('min_bed'));
            }
            if (request('max_bed')) {
                if (request('max_bed') == 'studio') {
                    $listings->where('beds', request('min_bed'));
                }
                $listings->where('beds', '<=', request('max_bed'));
            }


            $listings = $listings->paginate($per_page);
            $all_count = Listing::where('agency_id', $agency->id)->count();
            $draft_count = Listing::where('status', 'draft')->where('agency_id', $agency->id)->count();
            $live_count = Listing::where('status', 'live')->where('agency_id', $agency->id)->count();
            $review_count = Listing::where('status', 'review')->where('agency_id', $agency->id)->count();
            $archive_count = Listing::where('status', 'archive')->where('agency_id', $agency->id)->count();
            $agency_data = $agency;
            $agency = $agency->id;













            return view(
                'listing::listing.index',
                compact(
                    'agency_data',
                    'staffs',
                    'listing_types',
                    'listing_views',
                    'listings',
                    'types',
                    'ref_ids',
                    'pagination',
                    'locations',
                    'agency',
                    'business',
                    'lead_sources',
                    'task_status',
                    'task_types',
                    'developers',
                    'cheques',
                    'landlords',
                    'tenants',
                    'portals',
                    'all_count',
                    'archive_count',
                    'review_count',
                    'draft_count',
                    'live_count',
                    'descriptionTemplates'
                )
            );
        } catch (\Exception $e) {

            abort(404);
        }
    }

    public function store($request)
    {
        $business = Business::where('id', $request->business_id)->firstOrFail();
        if ($business->id != auth()->user()->business_id) {

            abort(404);
        }
        $agency = Agency::where('id', $request->agency_id)->where('business_id', $business->id)->firstOrFail();

        DB::beginTransaction();
        try {

            $video_title = $request->video_title;
            $video_link = $request->video_link;
            $video_host = $request->video_host;
            $cheque_date = $request->cheque_date;
            $cheque_amount = $request->cheque_amount;
            $cheque_percentage = $request->cheque_percentage;
            $documents = $request->documents;
            $floor_plans = $request->floor_plans;
            $photos = $request->photos;

            $validator = Validator::make($request->all(), Listing::store_validation($request));
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

            //* move photos from temporary to listing_photos
            if ($photos && is_array($photos)) {
                if (!file_exists(public_path("listings"))) {
                    mkdir(public_path("listings"));
                }
                if (!file_exists(public_path("listings/photos"))) {
                    mkdir(public_path("listings/photos"));
                }

                foreach ($photos as $folder) {
                    $photo = TemporaryListing::where('folder', $folder)->first();
                    if ($photo) {
                        $moved = ListingPhoto::create(
                            [
                                'listing_id' => $listing->id,
                                'main' => $photo->main,
                                'watermark' => $photo->watermark,
                                'active' => $photo->active,
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

            DB::commit();
            return back()->with(flash(trans('listing.listing_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab', '');
        }
    }


    public function tenant($request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name' => ['required', 'string', 'max:225'],
                    'email' => ['sometimes', 'nullable', 'email', 'string', 'max:225'],
                    'phone' => ['sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                    'salutation' => ['required', 'string', 'in:Mr,Mrs,Ms,Miss'],
                    'source_id' => ['sometimes', 'nullable', 'string', 'exists:lead_sources,id'],
                    'agency' => ['required', 'integer', 'exists:agencies,id'],
                    'business' => ['required', 'integer', 'exists:businesses,id']
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $tenant_type = LeadType::firstOrCreate(
                    ['role' => 'tenant'],
                    ['name_en' => 'tenant', 'name_ar' => 'المستأجر']

                );


                $tenant = Client::create([

                    'name' => $request->name,
                    'email1' => $request->email,
                    'phone1' => $request->phone,
                    'salutation' => $request->salutation,
                    'converted_by' => auth()->user()->id,
                    'was_lead' => 'no',
                    "source_id" => $request->source_id,
                    'type_id' => $tenant_type->id,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('listing.tenant_created'), 'data' => $tenant], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }

    public function landlord($request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name' => ['required', 'string', 'max:225'],
                    'email' => ['sometimes', 'nullable', 'email', 'string', 'max:225'],
                    'phone' => ['sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                    'salutation' => ['required', 'string', 'in:Mr,Mrs,Ms,Miss'],
                    'source_id' => ['sometimes', 'nullable', 'string', 'exists:lead_sources,id'],
                    'agency' => ['required', 'integer', 'exists:agencies,id'],
                    'business' => ['required', 'integer', 'exists:businesses,id']
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $landlord_type = LeadType::firstOrCreate(
                    ['role' => 'landlord'],
                    ['name_en' => 'landlord', 'name_ar' => 'المالك']

                );


                $landlord = Client::create([

                    'name' => $request->name,
                    'email1' => $request->email,
                    'phone1' => $request->phone,
                    'salutation' => $request->salutation,
                    'converted_by' => auth()->user()->id,
                    'was_lead' => 'no',
                    "source_id" => $request->source_id,
                    'type_id' => $landlord_type->id,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('listing.landlord_created'), 'data' => $landlord], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }

    public function developer($request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => ['required', 'string', 'max:225'],
                    'name_ar' => ['sometimes', 'nullable', 'string', 'max:225'],

                    'agency' => ['required', 'integer', 'exists:agencies,id'],
                    'business' => ['required', 'integer', 'exists:businesses,id']
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }


                $developer = Developer::create([

                    'name_en' => $request->name_en,
                    'slug' => \Str::slug($request->name_en),
                    'name_ar' => $request->name_ar,

                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('listing.developer_created'), 'data' => $developer], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function temporary_photos($request)
    {
        if (request()->has('file')) {

            if (!file_exists(public_path("temporary"))) {
                mkdir(public_path("temporary"));
            }
            if (!file_exists(public_path("temporary/listings"))) {
                mkdir(public_path("temporary/listings"));
            }

            $photo = request()->file('file');
            $photo_name = str_replace([' ', '_'], '-', $photo->getClientOriginalName());

            $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

            if (!file_exists(public_path('temporary/listings/' . $main_tmp_folder))) {
                mkdir(public_path('temporary/listings/' . $main_tmp_folder));
            }

            $path = public_path('temporary/listings/' . $main_tmp_folder);
            $photo->move($path, $photo_name);


            $main_photo_path = public_path('temporary/listings/' . $main_tmp_folder . '/' . $photo_name);

            $watermark = public_path('watermark.png');


            // * image with full size and watermark
            $with_watermark_tmp_folder_path = public_path("temporary/listings/$main_tmp_folder/mainWatermark-$photo_name");

            Image::make($main_photo_path)
                ->insert($watermark, 'center', 10, 10)
                ->save($with_watermark_tmp_folder_path);

            $temporary_photo = TemporaryListing::create([
                'folder' => $main_tmp_folder,
                'main' => $photo_name,
                'watermark' => 'mainWatermark-' . $photo_name,
                'active' => 'watermark',
            ]);
            return [
                'photo' => $temporary_photo
            ];
        }
    }

    public function temporary_plans($request)
    {


        if (request()->has('file')) {

            if (!file_exists(public_path("temporary"))) {
                mkdir(public_path("temporary"));
            }
            if (!file_exists(public_path("temporary/plans"))) {
                mkdir(public_path("temporary/plans"));
            }

            $plan = request()->file('file');
            $plan_name = str_replace([' ', '_'], '-', $plan->getClientOriginalName());

            $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

            if (!file_exists(public_path('temporary/plans/' . $main_tmp_folder))) {
                mkdir(public_path('temporary/plans/' . $main_tmp_folder));
            }

            $path = public_path('temporary/plans/' . $main_tmp_folder);
            $plan->move($path, $plan_name);


            $main_plan_path = public_path('temporary/plans/' . $main_tmp_folder . '/' . $plan_name);

            $watermark = public_path('watermark.png');


            // * image with full size and watermark
            $with_watermark_tmp_folder_path = public_path("temporary/plans/$main_tmp_folder/mainWatermark-$plan_name");

            Image::make($main_plan_path)
                ->insert($watermark, 'center', 10, 10)
                ->save($with_watermark_tmp_folder_path);

            $temporary_plan = TemporaryPlan::create([
                'folder' => $main_tmp_folder,
                'main' => $plan_name,
                'watermark' => 'mainWatermark-' . $plan_name,
                'active' => 'watermark',
            ]);
            return [
                'plan' => $temporary_plan
            ];
        }
    }


    public function temporary_documents($request)
    {


        if (request()->has('file')) {

            if (!file_exists(public_path("temporary"))) {
                mkdir(public_path("temporary"));
            }
            if (!file_exists(public_path("temporary/documents"))) {
                mkdir(public_path("temporary/documents"));
            }

            $document = request()->file('file');
            $document_name = str_replace([' ', '_'], '-', $document->getClientOriginalName());

            $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

            if (!file_exists(public_path('temporary/documents/' . $main_tmp_folder))) {
                mkdir(public_path('temporary/documents/' . $main_tmp_folder));
            }

            $path = public_path('temporary/documents/' . $main_tmp_folder);
            $document->move($path, $document_name);

            $temporary_document = TemporaryDocument::create([
                'folder' => $main_tmp_folder,
                'document' => $document_name,

            ]);
            return [
                'document' => $temporary_document
            ];
        }
    }


    public function update($request, $id)
    {
        // dd($request->all());

        $listing = Listing::where('business_id', auth()->user()->business_id)->where('id', $id)->firstOrFail();

        DB::beginTransaction();
        try {

            $video_title = $request->{'edit_video_title_' . $id};
            $video_link = $request->{'edit_video_link_' . $id};
            $video_host = $request->{'edit_video_host_' . $id};
            $cheque_date = $request->{'edit_cheque_date_' . $id};
            $cheque_amount = $request->{'edit_cheque_amount_' . $id};
            $cheque_percentage = $request->{'edit_cheque_percentage_' . $id};
            $documents = $request->{'edit_documents_' . $id};
            $floor_plans = $request->{'edit_floor_plans_' . $id};
            $photos = $request->{'edit_photos_' . $id};

            $validator = Validator::make($request->all(), Listing::update_validation($request, $id));
            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }

            if (count($cheque_date) != count($cheque_amount) || count($cheque_date) != count($cheque_percentage)) {
                return back()->withInput()->with(flash(trans('listing.cheque_inputs_invalid'), 'danger'))
                    ->with('open-edit-tab', $id);
            }
            if (count($video_host) != count($video_link) || count($video_host) != count($video_title)) {
                return back()->withInput()->with(flash(trans('listing.video_inputs_invalid'), 'danger'))
                    ->with('open-edit-tab', $id);
            }

            $inputs = $validator->validated();
            unset($inputs['edit_video_title_' . $id]);
            unset($inputs['edit_video_link_' . $id]);
            unset($inputs['edit_video_host_' . $id]);
            unset($inputs['edit_cheque_date_' . $id]);
            unset($inputs['edit_cheque_amount_' . $id]);
            unset($inputs['edit_cheque_percentage_' . $id]);
            unset($inputs['edit_photos_' . $id]);
            unset($inputs['edit_floor_plans_' . $id]);
            unset($inputs['edit_documents_' . $id]);
            /*   dd('here', $inputs); */

            $fixed_array_keys = [];
            foreach ($inputs as $key => $input) {
                $fixed_array_keys[str_replace(['edit_', '_' . $id], '', $key)] = $input;
            }
            // dd($fixed_array_keys);
            if (!array_key_exists('view_ids', $fixed_array_keys)) {
                $fixed_array_keys['view_ids'] = [];
            }
            if (!array_key_exists('portals', $fixed_array_keys)) {
                $fixed_array_keys['portals'] = [];
            }
            $listing->update($fixed_array_keys);

            //* move photos from temporary to listing_photos
            if ($photos && is_array($photos)) {
                if (!file_exists(public_path("listings"))) {
                    mkdir(public_path("listings"));
                }
                if (!file_exists(public_path("listings/photos"))) {
                    mkdir(public_path("listings/photos"));
                }

                foreach ($photos as $folder) {
                    $photo = TemporaryListing::where('folder', $folder)->first();
                    if ($photo) {
                        $moved = ListingPhoto::create(
                            [
                                'listing_id' => $listing->id,
                                'main' => $photo->main,
                                'watermark' => $photo->watermark,
                                'active' => $photo->active,
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
                $listing->videos->each(function ($q) {
                    $q->delete();
                });
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
                $listing->cheques->each(function ($q) {
                    $q->delete();
                });
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

            DB::commit();
            return back()->with(flash(trans('listing.listing_modified'), 'success'))->with('open-edit-tab', $id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }


    public function brochure($request, $type)
    {
        if ($type == 'single') {
            $pdf = PDF::loadView('listing::listing.brochure_single');
            return $pdf->download('single.pdf');
        } else {
            $pdf = PDF::loadView('listing::listing.brochure_multi');
            return $pdf->download('multi.pdf');
        }
    }


    public function remove_listing_temporary($request)
    {
        if ($request->ajax()) {

            try {
                DB::beginTransaction();
                if ($request->table == 'temporary') {
                    if ($request->type == 'photo') {
                        $photo = TemporaryListing::findOrFail($request->id);
                        deleteDirectory(public_path("temporary/listings/" . $photo->folder));
                        $photo->delete();
                    }
                    if ($request->type == 'plan') {
                        $plan = TemporaryPlan::findOrFail($request->id);
                        deleteDirectory(public_path("temporary/plans/" . $plan->folder));

                        $plan->delete();
                    }
                    if ($request->type == 'document') {
                        $document = TemporaryDocument::findOrFail($request->id);
                        deleteDirectory(public_path("temporary/documents/" . $document->folder));
                        $document->delete();
                    }
                }
                if ($request->table == 'main') {

                    if ($request->type == 'photo') {
                        $photo = ListingPhoto::findOrFail($request->id);
                        deleteDirectory(public_path('listings/photos/agency_' . $photo->listing->agency_id . '/listing_' . $photo->listing->id . '/photo_' . $photo->id));
                        $photo->delete();
                    }
                    if ($request->type == 'plan') {
                        $plan = ListingPlan::findOrFail($request->id);
                        deleteDirectory(public_path('listings/plans/agency_' . $plan->listing->agency_id . '/listing_' . $plan->listing->id . '/plan_' . $plan->id));

                        $plan->delete();
                    }
                    if ($request->type == 'document') {
                        $document = ListingDocument::findOrFail($request->id);
                        deleteDirectory(public_path('listings/documents/agency_' . $document->listing->agency_id . '/listing_' . $document->listing->id . '/document_' . $document->id));
                        $document->delete();
                    }
                }
                DB::commit();

                return response()->json(['message' => trans('listing.removed')], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function update_listing_temporary_active($request)
    {
        if ($request->ajax()) {

            try {

                DB::beginTransaction();
                if ($request->table == 'temporary') {
                    if ($request->type == 'photo') {
                        $photo = TemporaryListing::findOrFail($request->id);
                        $photo->update(['active' => $photo->active == 'watermark' ? 'main' : 'watermark']);
                    }
                    if ($request->type == 'plan') {
                        $plan = TemporaryPlan::findOrFail($request->id);
                        $plan->update(['active' => $plan->active == 'watermark' ? 'main' : 'watermark']);
                    }
                }


                if ($request->table == 'main') {
                    if ($request->type == 'photo') {
                        $photo = ListingPhoto::findOrFail($request->id);
                        $photo->update(['active' => $photo->active == 'watermark' ? 'main' : 'watermark']);
                    }
                    if ($request->type == 'plan') {
                        $plan = ListingPlan::findOrFail($request->id);
                        $plan->update(['active' => $plan->active == 'watermark' ? 'main' : 'watermark']);
                    }
                }


                DB::commit();

                return response()->json(['message' => trans('listing.updated')], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }

    public function modify_title($request)
    {

        if ($request->ajax()) {
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'title' => ['required', 'string', 'max:225'],
                    'id' => ['required', 'integer'],
                    'table' => ['required', 'string', 'max:225', 'in:temporary_documents,temporary_plans,listing_documents,listing_plans'],
                    'type' => ['required', 'string', 'max:225', 'in:document,plan'],

                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }
                $document = '';

                if ($request->type == 'document') {
                    if ($request->table == 'temporary_documents') {

                        $document = TemporaryDocument::findOrFail($request->id)->update([
                            'title' => $request->title,
                        ]);
                    }
                    if ($request->table == 'listing_documents') {
                        $document = ListingDocument::findOrFail($request->id)->update([
                            'title' => $request->title,
                        ]);
                    }
                }
                if ($request->type == 'plan') {
                    if ($request->table == 'temporary_plans') {

                        $plan = TemporaryPlan::findOrFail($request->id)->update([
                            'title' => $request->title,
                        ]);
                    }
                    if ($request->table == 'listing_plans') {
                        $plan = ListingPlan::findOrFail($request->id)->update([
                            'title' => $request->title,
                        ]);
                    }
                }
                DB::commit();
                return response()->json(['message' => trans('listing.title_modified'), 'data' => $document], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }

    public function share_listing($agency)
    {
        $per_page = 10;
        $shared_agencies = \App\Models\Request::where('sender_id', $agency)->where('response', 'accepted');
        $agencies = $shared_agencies->get();
        $shared_agencies = $shared_agencies->pluck('receiver_id')->toArray();
        $listings = Listing::whereIn('agency_id', $shared_agencies)->where('lsm', 'shared');
        $locations = $listings->pluck('location')->unique();
        array_push($shared_agencies, $agency);
        $types = ListingType::whereIn('agency_id', $shared_agencies)->get();


        if (request('purpose')) {
            $listings->where('purpose', request('purpose'));
        }
        if (request('filter_agency')) {
            $listings->where('agency_id', request('filter_agency'));
        }

        if (request('location')) {
            $listings->where('location', request('location'));
        }

        if (request('keywords')) {
            $listings->where('title', 'like', '%' . request('keywords') . '%');
            $listings->where('description_en', 'like', '%' . request('keywords') . '%');
            $listings->where('description_ar', 'like', '%' . request('keywords') . '%');
        }

        if (request('type')) {
            $type = request('type');

            $listings->whereHas('type', function ($q) use ($type) {
                $q->where('id', $type);
            });
        }


        if (request('price_min')) {
            $listings->where('price', '>=', request('price_min'));
        }
        if (request('price_max')) {
            $listings->where('price', '<=', request('price_max'));
        }


        if (request('min_bed')) {
            if (request('min_bed') == 'studio') {
                $listings->where('beds', request('min_bed'));
            }
            $listings->where('beds', '>=', request('min_bed'));
        }
        if (request('max_bed')) {
            if (request('max_bed') == 'studio') {
                $listings->where('beds', request('min_bed'));
            }
            $listings->where('beds', '<=', request('max_bed'));
        }


        if (request('area_min')) {
            $listings->where('area', '>=', request('area_min'));
        }
        if (request('area_max')) {
            $listings->where('area', '<=', request('area_max'));
        }

        if (request('added_from')) {
            $listings->where('created_at', '>=', request('added_from'));
        }
        if (request('added_to')) {
            $listings->where('created_at', '<=', request('added_to'));
        }


        if (request('updated_from')) {
            $listings->where('updated_at', '>=', request('updated_from'));
        }
        if (request('updated_to')) {
            $listings->where('updated_at', '<=', request('updated_to'));
        }


        $listings = $listings->paginate($per_page);

        return view('listing::listing.share_listing', compact('listings', 'locations', 'types','agencies'));
    }


    public
    function requests($agency)
    {
        $per_page = 10;
        $agencies = Agency::where(function ($q) {
            $q->whereHas('receive_requests', function ($q) {
                return $q->where('response', 'refused');
            })->orDoesntHave('receive_requests');
        })->with('black_listed_to', 'black_listed_from');

        $agencies = $agencies->where('id', '!=', $agency)->paginate($per_page);

        $sender = Agency::where('id', $agency)->with('black_listed_to', 'black_listed_from')->first();
        $blocked_from = $sender->black_listed_from->pluck('black_listed_agency_id')->toArray();
        $blocked_to = $sender->black_listed_to->pluck('agency_id')->toArray();


        return view('listing::listing.requests', compact('agencies', 'sender', 'blocked_from', 'blocked_to'));
    }

    public
    function request_response($response, $id)
    {
        DB::beginTransaction();
        try {
            $share_request = \App\Models\Request::findOrFail($id);
            if ($response == 'block') {
                $agency = Agency::findOrFail($share_request->receiver_id);
                $blocked_agency = Agency::findOrFail($share_request->sender_id);

                BlackList::create([
                    'agency_id' => $agency->id,
                    'black_listed_agency_id' => $blocked_agency->id
                ]);

                $share_request->update([
                    'response' => 'refused'
                ]);
            } else {
                $share_request->update([
                    'response' => $response
                ]);
            }


            DB::commit();
            return redirect(route('listings.requests', $share_request->receiver_id))->with(flash(trans('listing.request_replied'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }

    public
    function send_request($request)
    {

        DB::beginTransaction();
        try {
            $agency = Agency::findOrFail($request->agency_id);


            $template = Template::where('agency_id', $request->sender_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'share_request')->first();


            $share_request = \App\Models\Request::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $agency->id,
                'response' => 'pending',
            ]);


            if ($template) {

                $template_with_name = str_replace('{AGENCY}', $agency->company_name_en ?? '', $template->description_en);
                $template_with_action_url = str_replace('{ACTION_URL}', route('listings.request_response', ['accepted', $share_request]), $template_with_name);
                $template_with_refused_url = str_replace('{REFUSE_URL}', route('listings.request_response', ['refused', $share_request]), $template_with_action_url);
                $template_with_block_url = str_replace('{BLOCK_URL}', route('listings.request_response', ['block', $share_request]), $template_with_refused_url);
                Mail::to($agency->company_email)->send(new ShareRequest($template_with_block_url, "Listing Share Request"));
            } else {
                $system_template = SystemTemplate::where('slug', 'share_request')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $request->sender_id,
                    'business_id' => auth()->user()->business_id,
                ]);

                $template_with_name = str_replace('{AGENCY}', $agency->company_name_en ?? '', $template->description_en);
                $template_with_action_url = str_replace('{ACTION_URL}', route('listings.request_response', ['accepted', $share_request]), $template_with_name);
                $template_with_refused_url = str_replace('{REFUSE_URL}', route('listings.request_response', ['refused', $share_request]), $template_with_action_url);
                $template_with_block_url = str_replace('{BLOCK_URL}', route('listings.request_response', ['block', $share_request]), $template_with_refused_url);
                Mail::to($agency->company_email)->send(new ShareRequest($template_with_block_url, "Listing Share Request"));
            }
            DB::commit();
            return back()->with(flash(trans('listing.request_sent'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }

    public
    function contact_client($request)
    {

        DB::beginTransaction();
        try {


            $template = Template::where('agency_id', $request->sender_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'contact_client')->first();

            $listing = Listing::findOrFail($request->listing_id);


            if ($template) {

                Mail::to($listing->agency->company_email)->send(new ContactClient($template, "Contact Client About Listing"));
            } else {
                $system_template = SystemTemplate::where('slug', 'contact_client')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $request->sender_id,
                    'business_id' => auth()->user()->business_id,
                ]);

                Mail::to($listing->agency->company_email)->send(new ContactClient($template, "Contact Client About Listing"));
            }
            DB::commit();
            return back()->with(flash(trans('listing.mail_sent'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }

    public
    function block($request)
    {

        DB::beginTransaction();
        try {
            $agency = Agency::findOrFail($request->sender_id);
            $blocked_agency = Agency::findOrFail($request->agency_id);

            BlackList::create([
                'agency_id' => $agency->id,
                'black_listed_agency_id' => $blocked_agency->id
            ]);


            DB::commit();
            return back()->with(flash(trans('listing.block_applied'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }


    public
    function old_requests($agency)
    {
        $per_page = 10;

        $requests = \App\Models\Request::where('sender_id', $agency)->paginate($per_page);

        return view('listing::listing.old_requests', compact('requests'));
    }


    public
    function black_listed($agency)
    {
        $per_page = 10;

        $black_listed_agencies = BlackList::where('agency_id', $agency)->paginate($per_page);

        return view('listing::listing.black_listed', compact('black_listed_agencies'));
    }


    public
    function unblock($request)
    {

        DB::beginTransaction();
        try {

            BlackList::findorfail($request->id)->delete();


            DB::commit();
            return back()->with(flash(trans('listing.unblock_applied'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }


    public
    function update_listing_portals($request, $id)
    {


        DB::beginTransaction();
        try {

            $listing = Listing::where('business_id', auth()->user()->business_id)->where('id', $id)->firstOrFail();
            $validator = Validator::make($request->all(), [

                'portals_' . $id => ['sometimes', 'nullable', 'array'],
                'portals_' . $id . '.*' => [Rule::exists('portals', 'id')],

            ]);

            if ($validator->fails()) {

                return back()->withInput()->with(flash($validator->errors()->all()[0], 'error'))->with('open-portals-tab', $id);
            }

            $listing->update([
                'portals' => $request->{'portals_' . $id} ? $request->{'portals_' . $id} : []
            ]);


            DB::commit();
            return back()->with(flash(trans('listing.portals_modified'), 'success'))->with('open-portals-tab', $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-portals-tab', $id);
        }
    }


    public
    function destroy($request)
    {

        DB::beginTransaction();
        try {

            $listing = Listing::where('business_id', auth()->user()->business_id)->where('id', $request->listing_id)->firstOrFail();

            $listing->delete();
            DB::commit();
            return back()->with(flash(trans('listing.listing_deleted'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }

    public
    function assign_task($request, $id)
    {

        $listing = Listing::where('id', $request->task_listing_id)->where('business_id', auth()->user()->business_id)->firstOrFail();

        $task_type = TaskType::where('id', $request->{'task_type_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        $task_status = TaskStatus::where('id', $request->{'task_status_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        try {

            $validator = Validator::make($request->all(), [

                "task_agency_id_{$id}" => "required|integer|exists:agencies,id",
                "task_business_id_{$id}" => "required|integer|exists:businesses,id",
                "task_note_en_{$id}" => "sometimes|nullable|string",
                "task_note_ar_{$id}" => "sometimes|nullable|string",
                "task_deadline_{$id}" => "required|date|date_format:Y-m-d",
                "task_time_{$id}" => "required|string",
                "task_custom_reminder_{$id}" => "sometimes|nullable|in:on,off",
                "task_period_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "task_type_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }
            DB::beginTransaction();

            $task = Task::create([
                "agency_id" => $request->{'task_agency_id_' . $id},
                "business_id" => $request->{'task_business_id_' . $id},

                "task_type_id" => $request->{'task_type_' . $id},
                "task_status_id" => $request->{'task_status_' . $id},
                "module" => 'listing',
                "module_id" => $listing->id,
                "deadline" => $request->{'task_deadline_' . $id},


                "time" => $request->{'task_time_' . $id},
                "custom_reminder" => $request->{'task_custom_reminder_' . $id},

                "period_reminder" => $request->{'task_period_reminder_' . $id},

                "type_reminder" => $request->{'task_type_reminder_' . $id},
                "type_reminder_number" => $request->{'task_type_reminder_number_' . $id},


                "add_by" => auth()->user()->id,
            ]);


            $staff_for_notify = [];

            $staff = [];
            if ($request->{'task_staff_' . $id}) {

                $staff = $request->{'task_staff_' . $id};
            }

            $task->staff()->sync($staff);

            $staff_for_notify = $staff;


            if ($request->{'task_note_en_' . $id} || $request->{'task_note_ar_' . $id}) {

                // save note by task id
                $task_note = TaskNote::create([
                    'task_id' => $task->id,
                    'add_by' => auth()->user()->id,
                    'notes_en' => $request->{'task_note_en_' . $id},
                    'notes_ar' => $request->{'task_note_ar_' . $id},
                ]);
            }
            DB::commit();


            $template = Template::where('agency_id', $listing->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'listing_task')->first();


            if ($template) {

                $template_with_name = str_replace('{TASK_NAME}', $listing->listing_ref, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/tasks/' . $listing->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Listing Task Has Been Assigned To You");

                    event(new ListingTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ListingTaskNotification($task));
            } else {
                $system_template = SystemTemplate::where('slug', 'listing_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $listing->agency_id,
                    'business_id' => $listing->business_id,
                ]);


                $template_with_name = str_replace('{TASK_NAME}', $listing->listing_ref, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/tasks/' . $listing->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Listing Task Has Been Assigned To You");

                    event(new ListingTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ListingTaskNotification($task));
            }

            return back()->with(flash(trans('sales.task_assigned'), 'success'))->with('open-task-tab', $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $id);
        }
    }


    public
    function edit_assign_task($request, $id)
    {

        $listing = Listing::where('id', $request->edit_task_listing_id)->where('business_id', auth()->user()->business_id)->firstOrFail();
        $task_type = TaskType::where('id', $request->{'edit_task_type_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();
        $task_status = TaskStatus::where('id', $request->{'edit_task_status_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        $task = Task::where('id', $request->{'edit_task_id_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        try {

            $validator = Validator::make($request->all(), [

                "edit_task_agency_id_{$id}" => "required|integer|exists:agencies,id",
                "edit_task_business_id_{$id}" => "required|integer|exists:businesses,id",
                "edit_task_note_en_{$id}" => "sometimes|nullable|string",
                "edit_task_note_ar_{$id}" => "sometimes|nullable|string",
                "edit_task_deadline_{$id}" => "required|date|date_format:Y-m-d",
                "edit_task_time_{$id}" => "required|string",
                "edit_task_custom_reminder_{$id}" => "sometimes|nullable|in:on,off",
                "edit_task_period_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "edit_task_type_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "edit_task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }

            DB::beginTransaction();

            $task->update([
                "agency_id" => $request->{'edit_task_agency_id_' . $id},
                "business_id" => $request->{'edit_task_business_id_' . $id},

                "task_type_id" => $request->{'edit_task_type_' . $id},
                "task_status_id" => $request->{'edit_task_status_' . $id},
                "module" => 'listing',
                "module_id" => $listing->id,
                "deadline" => $request->{'edit_task_deadline_' . $id},
                "time" => $request->{'edit_task_time_' . $id},
                "custom_reminder" => $request->{'edit_task_custom_reminder_' . $id},

                "period_reminder" => $request->{'edit_task_period_reminder_' . $id},

                "type_reminder" => $request->{'edit_task_type_reminder_' . $id},
                "type_reminder_number" => $request->{'edit_task_type_reminder_number_' . $id},
            ]);


            $staff_for_notify = [];

            $staff = [];
            if ($request->{'edit_task_staff_' . $id}) {

                $staff = $request->{'edit_task_staff_' . $id};
            }
            // dd($request->all(), $staff);
            $task->staff()->sync($staff);

            $staff_for_notify = $staff;


            if ($request->{'edit_task_note_en_' . $id}) {

                // save note by task id
                $task_note = TaskNote::create([
                    'task_id' => $task->id,
                    'add_by' => auth()->user()->id,
                    'notes_en' => $request->{'edit_task_note_en_' . $id},
                ]);
            }
            DB::commit();
            $template = Template::where('agency_id', $listing->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'listing_task')->first();


            if ($template) {

                $template_with_name = str_replace('{TASK_NAME}', $listing->listing_ref, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/tasks/' . $listing->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Listing Task Has Been UPDATED");

                    event(new ListingTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ListingTaskNotification($task));
            } else {
                $system_template = SystemTemplate::where('slug', 'listing_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $listing->agency_id,
                    'business_id' => $listing->business_id,
                ]);

                $template_with_name = str_replace('{TASK_NAME}', $listing->listing_ref, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/tasks/' . $listing->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Listing Task Has Been UPDATED");

                    event(new ListingTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ListingTaskNotification($task));
            }

            return back()->with(flash(trans('sales.task_updated'), 'success'))->with('open-task-tab', $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $id);
        }
    }


    public
    function delete_task(Request $request)
    {


        // abort_if(Gate::denies('assign_task_on_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            $task = Task::where('business_id', auth()->user()->id)->where('id', $request->task_id)->firstOrFail();
            $task->delete();

            DB::commit();
            return back()->with(flash(trans('sales.task_deleted'), 'success'))->with('open-task-tab', $request->task_listing_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $request->task_listing_id);
        }
    }


    public
    function save_note($request)
    {

        if ($request->ajax()) {
            $listing = Listing::where('business_id', auth()->user()->business_id)->where('id', $request->id)->firstOrFail();
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'note' => ['required', 'string'],

                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $listingNote = ListingNote::create([
                    'listing_id' => $listing->id,
                    'add_by' => auth()->user()->id,
                    'notes_en' => $request->note,
                    'notes_ar' => $request->note,
                ]);
                DB::commit();
                return response()->json([
                    'message' => trans('listing.note_created'),
                    'note' => $listingNote->notes_en,
                    'created_at' => $listingNote->created_at->toFormattedDateString(),
                    'added_by' => auth()->user()->{'name_' . app()->getLocale()}
                ], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public
    function listing_update_status($request)
    {

        if ($request->ajax()) {
            $listing = Listing::where('business_id', auth()->user()->business_id)->where('id', $request->id)->firstOrFail();
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'status' => ['required', 'string', 'in:live,review,archive,draft'],

                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $listing->update([
                    'status' => $request->status
                ]);
                DB::commit();
                return response()->json([
                    'message' => trans('listing.status_updated'),
                    'listing' => $listing,

                ], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public
    function export_all($request, $agency)
    {

        abort_if(Gate::denies('can_generate_reports'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Excel::download(new ListingsExport($agency), 'listings-list.xlsx');
    }
}