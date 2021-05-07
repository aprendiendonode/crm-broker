<?php

namespace Modules\Listing\Http\Repositories;

use File;
use Gate;
use App\Models\Agency;

use App\Jobs\SendEmail;

use App\Models\Business;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Entities\Client;
use Modules\Activity\Entities\Task;

use Modules\Sales\Entities\LeadType;

use Intervention\Image\Facades\Image;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Developer;
use Illuminate\Support\Facades\Validator;
use Modules\Listing\Entities\ListingChequeCalculator;
use Modules\Listing\Entities\ListingPlan;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\ListingVideo;
use Modules\Listing\Entities\TemporaryPlan;
use Modules\Listing\Entities\ListingDocument;
use Modules\Listing\Entities\TemporaryListing;
use Modules\Listing\Entities\TemporaryDocument;
use PDF;

class ListingRepo
{
    public function index($agency)
    {

        try {
            $pagination = true;
            $business  = auth()->user()->business_id;
            $per_page  = 15;

            $agency = Agency::with([
                'lead_sources',
                'landlords',
                'tenants',
                'task_status',
                'task_types',
                'listing_views',
                'developers',
                'cheques',


            ])->where('id', $agency)->where('business_id', $business)->firstOrFail();

            $listing_types              = DB::table('listing_types')->get();
            $lead_sources               = $agency->lead_sources;
            $task_status                = $agency->task_status;
            $task_types                 = $agency->task_types;
            $listing_views              = $agency->listing_views;
            $developers                 = $agency->developers;
            $cheques                    = $agency->cheques;
            $landlords                  = $agency->landlords;
            $tenants                    = $agency->tenants;
            $portals                    =  DB::table('portals')->get();

            $listings = Listing::with([
                'tasks',  'agent',
                'tasks.addBy',
                'tasks.staff',
                'type',
                'videos', 'documents', 'plans', 'photos', 'cheques'

            ])->where('agency_id', $agency->id)->where('business_id', $business);




            $staffs = staff($agency->id);



            if (request()->has('status_main')) {
                $listings->where('status', request()->status_main);
            }

            $listings = $listings->paginate($per_page);
            $all_count = Listing::where('agency_id', $agency->id)->count();
            $draft_count = Listing::where('status', 'draft')->where('agency_id', $agency->id)->count();
            $live_count = Listing::where('status', 'live')->where('agency_id', $agency->id)->count();
            $review_count = Listing::where('status', 'review')->where('agency_id', $agency->id)->count();
            $archive_count = Listing::where('status', 'archive')->where('agency_id', $agency->id)->count();

            $agency = $agency->id;
            return view(
                'listing::listing.index',
                compact(
                    'staffs',
                    'listing_types',
                    'listing_views',
                    'listings',
                    'pagination',
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
                    'live_count'
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

            $video_title        = $request->video_title;
            $video_link         = $request->video_link;
            $video_host         = $request->video_host;
            $cheque_date        = $request->cheque_date;
            $cheque_amount      = $request->cheque_amount;
            $cheque_percentage  = $request->cheque_percentage;
            $documents          = $request->documents;
            $floor_plans        = $request->floor_plans;
            $photos             = $request->photos;

            $validator = Validator::make($request->all(), Listing::store_validation($request));
            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', '');
            }

            if (count($cheque_date) != count($cheque_amount) ||  count($cheque_date) != count($cheque_percentage)) {
                return back()->withInput()->with(flash(trans('listing.cheque_inputs_invalid'), 'danger'))
                    ->with('open-tab', '');
            }
            if (count($video_host) != count($video_link) ||  count($video_host) != count($video_title)) {
                return back()->withInput()->with(flash(trans('listing.video_inputs_invalid'), 'danger'))
                    ->with('open-tab', '');
            }

            $inputs             = $validator->validated();
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
                        $moved =  ListingPhoto::create(
                            [
                                'listing_id' => $listing->id,
                                'main'       => $photo->main,
                                'watermark'  => $photo->watermark,
                                'active'     => $photo->active,
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
                            $new_folder =  public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id");
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
                        $moved =  ListingPlan::create(
                            [
                                'listing_id' => $listing->id,
                                'main'       => $plan->main,
                                'watermark'  => $plan->watermark,
                                'active'     => $plan->active,
                                'title'      => $plan->title,
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
                            $new_folder =  public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id");
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
                        $moved =  ListingDocument::create(
                            [
                                'listing_id'     => $listing->id,
                                'document'       => $document->document,
                                'title'          => $document->title,
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
                            $new_folder =  public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id");
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
                            'title'      => $title,
                            'host'       => $video_host[$key],
                            'link'       => $video_link[$key],
                        ]);
                    }
                }
            }

            if (count($cheque_date) > 0) {
                if ($cheque_date[0] != null && $cheque_amount[0] != null && $cheque_percentage[0] != null) {
                    foreach ($cheque_date as $key => $date) {
                        ListingChequeCalculator::create([
                            'listing_id' => $listing->id,
                            'date'       => $date,
                            'value'      => $cheque_amount[$key],
                            'percent'    => $cheque_percentage[$key],
                        ]);
                    }
                }
            }

            DB::commit();
            return back()->with(flash(trans('listing.listing_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab',  '');
        }
    }





    public function tenant($request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name'          => ['required', 'string', 'max:225'],
                    'email'         => ['sometimes', 'nullable', 'email', 'string', 'max:225'],
                    'phone'         => ['sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                    'salutation'    => ['required', 'string', 'in:Mr,Mrs,Ms,Miss'],
                    'source_id'     => ['sometimes', 'nullable', 'string', 'exists:lead_sources,id'],
                    'agency'        => ['required', 'integer', 'exists:agencies,id'],
                    'business'      => ['required', 'integer', 'exists:businesses,id']
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $tenant_type = LeadType::firstOrCreate(
                    ['role' => 'tenant'],
                    ['name_en' => 'tenant', 'name_ar' => 'المستأجر']

                );


                $tenant = Client::create([

                    'name'             => $request->name,
                    'email1'           => $request->email,
                    'phone1'           => $request->phone,
                    'salutation'       => $request->salutation,
                    'converted_by'     => auth()->user()->id,
                    'was_lead'         => 'no',
                    "source_id"        => $request->source_id,
                    'type_id'          => $tenant_type->id,
                    "business_id"      => $request->business,
                    "agency_id"        => $request->agency,

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

                    'name'          => ['required', 'string', 'max:225'],
                    'email'         => ['sometimes', 'nullable', 'email', 'string', 'max:225'],
                    'phone'         => ['sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                    'salutation'    => ['required', 'string', 'in:Mr,Mrs,Ms,Miss'],
                    'source_id'     => ['sometimes', 'nullable', 'string', 'exists:lead_sources,id'],
                    'agency'        => ['required', 'integer', 'exists:agencies,id'],
                    'business'      => ['required', 'integer', 'exists:businesses,id']
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $landlord_type = LeadType::firstOrCreate(
                    ['role' => 'landlord'],
                    ['name_en' => 'landlord', 'name_ar' => 'المالك']

                );


                $landlord = Client::create([

                    'name'             => $request->name,
                    'email1'           => $request->email,
                    'phone1'           => $request->phone,
                    'salutation'       => $request->salutation,
                    'converted_by'     => auth()->user()->id,
                    'was_lead'         => 'no',
                    "source_id"        => $request->source_id,
                    'type_id'          => $landlord_type->id,
                    "business_id"      => $request->business,
                    "agency_id"        => $request->agency,

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

                    'name_en'          => ['required', 'string', 'max:225'],
                    'name_ar'          => ['sometimes', 'nullable', 'string', 'max:225'],

                    'agency'        => ['required', 'integer', 'exists:agencies,id'],
                    'business'      => ['required', 'integer', 'exists:businesses,id']
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }



                $developer = Developer::create([

                    'name_en'             => $request->name_en,
                    'slug'             => \Str::slug($request->name_en),
                    'name_ar'             => $request->name_ar,

                    "business_id"      => $request->business,
                    "agency_id"        => $request->agency,

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

            $photo      = request()->file('file');
            $photo_name = str_replace([' ', '_'], '-', $photo->getClientOriginalName());

            $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

            if (!file_exists(public_path('temporary/listings/' . $main_tmp_folder))) {
                mkdir(public_path('temporary/listings/' . $main_tmp_folder));
            }

            $path  = public_path('temporary/listings/' . $main_tmp_folder);
            $photo->move($path, $photo_name);


            $main_photo_path = public_path('temporary/listings/' . $main_tmp_folder . '/' . $photo_name);

            $watermark = public_path('watermark.png');


            // * image with full size and watermark
            $with_watermark_tmp_folder_path = public_path("temporary/listings/$main_tmp_folder/mainWatermark-$photo_name");

            Image::make($main_photo_path)
                ->insert($watermark, 'center', 10, 10)
                ->save($with_watermark_tmp_folder_path);

            $temporary_photo = TemporaryListing::create([
                'folder'    => $main_tmp_folder,
                'main'      => $photo_name,
                'watermark' =>  'mainWatermark-' . $photo_name,
                'active'    => 'watermark',
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

            $plan      = request()->file('file');
            $plan_name = str_replace([' ', '_'], '-', $plan->getClientOriginalName());

            $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

            if (!file_exists(public_path('temporary/plans/' . $main_tmp_folder))) {
                mkdir(public_path('temporary/plans/' . $main_tmp_folder));
            }

            $path  = public_path('temporary/plans/' . $main_tmp_folder);
            $plan->move($path, $plan_name);


            $main_plan_path = public_path('temporary/plans/' . $main_tmp_folder . '/' . $plan_name);

            $watermark = public_path('watermark.png');


            // * image with full size and watermark
            $with_watermark_tmp_folder_path = public_path("temporary/plans/$main_tmp_folder/mainWatermark-$plan_name");

            Image::make($main_plan_path)
                ->insert($watermark, 'center', 10, 10)
                ->save($with_watermark_tmp_folder_path);

            $temporary_plan = TemporaryPlan::create([
                'folder'    => $main_tmp_folder,
                'main'      =>  $plan_name,
                'watermark' =>  'mainWatermark-' . $plan_name,
                'active'    => 'watermark',
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

            $document      = request()->file('file');
            $document_name = str_replace([' ', '_'], '-', $document->getClientOriginalName());

            $main_tmp_folder = auth()->user()->business_id . '-main' . '-' . uniqid() . '-' . now()->timestamp;

            if (!file_exists(public_path('temporary/documents/' . $main_tmp_folder))) {
                mkdir(public_path('temporary/documents/' . $main_tmp_folder));
            }

            $path  = public_path('temporary/documents/' . $main_tmp_folder);
            $document->move($path, $document_name);

            $temporary_document = TemporaryDocument::create([
                'folder'    => $main_tmp_folder,
                'document'      =>  $document_name,

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

            $video_title        = $request->{'edit_video_title_' . $id};
            $video_link         = $request->{'edit_video_link_' . $id};
            $video_host         = $request->{'edit_video_host_' . $id};
            $cheque_date        = $request->{'edit_cheque_date_' . $id};
            $cheque_amount      = $request->{'edit_cheque_amount_' . $id};
            $cheque_percentage  = $request->{'edit_cheque_percentage_' . $id};
            $documents          = $request->{'edit_documents_' . $id};
            $floor_plans        = $request->{'edit_floor_plans_' . $id};
            $photos             = $request->{'edit_photos_' . $id};

            $validator = Validator::make($request->all(), Listing::update_validation($request, $id));
            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }

            if (count($cheque_date) != count($cheque_amount) ||  count($cheque_date) != count($cheque_percentage)) {
                return back()->withInput()->with(flash(trans('listing.cheque_inputs_invalid'), 'danger'))
                    ->with('open-edit-tab', $id);
            }
            if (count($video_host) != count($video_link) ||  count($video_host) != count($video_title)) {
                return back()->withInput()->with(flash(trans('listing.video_inputs_invalid'), 'danger'))
                    ->with('open-edit-tab', $id);
            }

            $inputs             = $validator->validated();
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
                        $moved =  ListingPhoto::create(
                            [
                                'listing_id' => $listing->id,
                                'main'       => $photo->main,
                                'watermark'  => $photo->watermark,
                                'active'     => $photo->active,
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
                            $new_folder =  public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id");
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
                        $moved =  ListingPlan::create(
                            [
                                'listing_id' => $listing->id,
                                'main'       => $plan->main,
                                'watermark'  => $plan->watermark,
                                'active'     => $plan->active,
                                'title'      => $plan->title,
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
                            $new_folder =  public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id");
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
                        $moved =  ListingDocument::create(
                            [
                                'listing_id'     => $listing->id,
                                'document'       => $document->document,
                                'title'          => $document->title,
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
                            $new_folder =  public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id");
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
                            'title'      => $title,
                            'host'       => $video_host[$key],
                            'link'       => $video_link[$key],
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
                            'date'       => $date,
                            'value'      => $cheque_amount[$key],
                            'percent'    => $cheque_percentage[$key],
                        ]);
                    }
                }
            }

            DB::commit();
            return back()->with(flash(trans('listing.listing_modified'), 'success'))->with('open-edit-tab',  $id);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-edit-tab',  $id);
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
                        $photo->update(['active' =>  $photo->active == 'watermark' ? 'main' : 'watermark']);
                    }
                    if ($request->type == 'plan') {
                        $plan = TemporaryPlan::findOrFail($request->id);
                        $plan->update(['active' =>  $plan->active == 'watermark' ? 'main' : 'watermark']);
                    }
                }


                if ($request->table == 'main') {
                    if ($request->type == 'photo') {
                        $photo = ListingPhoto::findOrFail($request->id);
                        $photo->update(['active' =>  $photo->active == 'watermark' ? 'main' : 'watermark']);
                    }
                    if ($request->type == 'plan') {
                        $plan = ListingPlan::findOrFail($request->id);
                        $plan->update(['active' =>  $plan->active == 'watermark' ? 'main' : 'watermark']);
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

                    'title'          => ['required', 'string', 'max:225'],
                    'id'             => ['required', 'integer'],
                    'table'          => ['required', 'string', 'max:225', 'in:temporary_documents,temporary_plans,listing_documents,listing_plans'],
                    'type'          => ['required', 'string', 'max:225', 'in:document,plan'],

                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }
                $document = '';

                if ($request->type == 'document') {
                    if ($request->table == 'temporary_documents') {

                        $document = TemporaryDocument::findOrFail($request->id)->update([
                            'title'  => $request->title,
                        ]);
                    }
                    if ($request->table == 'listing_documents') {
                        $document = ListingDocument::findOrFail($request->id)->update([
                            'title'  => $request->title,
                        ]);
                    }
                }
                if ($request->type == 'plan') {
                    if ($request->table == 'temporary_plans') {

                        $plan = TemporaryPlan::findOrFail($request->id)->update([
                            'title'  => $request->title,
                        ]);
                    }
                    if ($request->table == 'listing_plans') {
                        $plan = ListingPlan::findOrFail($request->id)->update([
                            'title'  => $request->title,
                        ]);
                    }
                }
                DB::commit();
                return response()->json(['message' => trans('listing.title_modified'), 'data' => $document], 200);
            } catch (\Exception $e) {
                DB::rollback();
                dd($e->getMessage());
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function share_listing($agency)
    {
        return view('listing::listing.share_listing');
    }
}