<?php

namespace Modules\Listing\Http\Repositories;

use App\Events\StatisticsFinishedEvent;
use App\Imports\StatisticsImport;
use App\Jobs\FinishedStatisticsSheet;
use App\Jobs\ImportStatisticsSheet;
use App\Jobs\StartLeadsInsertJobs;
use App\Models\Statistics;
use App\Models\User;
use App\Notifications\StatisticsFinishedNotification;
use PDF;
use File;
use Gate;
use App\Models\Agency;
use App\Jobs\SendEmail;
use App\Models\Business;
use App\Models\Template;
use App\Models\BlackList;
use App\Mail\ShareRequest;

use App\Mail\ContactClient;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\SystemTemplate;
use App\Exports\ListingsExport;
use Illuminate\Validation\Rule;
use App\Events\ListingTaskEvent;
use Modules\Sales\Entities\Lead;

use Illuminate\Support\Facades\DB;

use Modules\Sales\Entities\Client;
use Modules\Activity\Entities\Task;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Sales\Entities\LeadType;
use Intervention\Image\Facades\Image;
use Modules\Listing\Entities\Listing;
use Modules\Listing\Entities\PortalListing;
use Modules\Sales\Entities\Developer;
use Modules\SuperAdmin\Entities\City;
use Modules\Agency\Entities\Watermark;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskType;
use Modules\Sales\Entities\Opportunity;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskStatus;
use Modules\Listing\Entities\ListingPlan;
use Modules\SuperAdmin\Entities\ListingType;
use Modules\Activity\Entities\ListingNote;
use Modules\Listing\Entities\ListingPhoto;
use Modules\Listing\Entities\ListingVideo;
use Modules\SuperAdmin\Entities\Community;
use Modules\Listing\Entities\TemporaryPlan;
use Illuminate\Support\Facades\Notification;
use Modules\Listing\Entities\ListingDocument;
use App\Notifications\ListingTaskNotification;
use Modules\Listing\Entities\TemporaryListing;
use Symfony\Component\HttpFoundation\Response;
use Modules\Listing\Entities\TemporaryDocument;
use Modules\Listing\Entities\ListingChequeCalculator;

class ListingRepo
{
    public function index($agency)
    {


        try {

            return view(
                'listing::listing.index',
                []
            );
        } catch (\Exception $e) {
            abort(404);
        }
    }

    // public function store($request)
    // {
    //     $business = Business::where('id', $request->business_id)->firstOrFail();
    //     if ($business->id != auth()->user()->business_id) {

    //         abort(404);
    //     }
    //     $agency = Agency::where('id', $request->agency_id)->where('business_id', $business->id)->firstOrFail();

    //     DB::beginTransaction();
    //     try {

    //         $video_title = $request->video_title;
    //         $video_link = $request->video_link;
    //         $video_host = $request->video_host;
    //         $cheque_date = $request->cheque_date;
    //         $cheque_amount = $request->cheque_amount;
    //         $cheque_percentage = $request->cheque_percentage;
    //         $documents = $request->documents;
    //         $floor_plans = $request->floor_plans;
    //         $photos = $request->photos;

    //         $validator = Validator::make($request->all(), Listing::store_validation($request));
    //         if ($validator->fails()) {
    //             return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', '');
    //         }

    //         if (count($cheque_date) != count($cheque_amount) || count($cheque_date) != count($cheque_percentage)) {
    //             return back()->withInput()->with(flash(trans('listing.cheque_inputs_invalid'), 'danger'))
    //                 ->with('open-tab', '');
    //         }
    //         if (count($video_host) != count($video_link) || count($video_host) != count($video_title)) {
    //             return back()->withInput()->with(flash(trans('listing.video_inputs_invalid'), 'danger'))
    //                 ->with('open-tab', '');
    //         }

    //         $inputs = $validator->validated();
    //         unset($inputs['video_title']);
    //         unset($inputs['video_link']);
    //         unset($inputs['video_host']);
    //         unset($inputs['cheque_date']);
    //         unset($inputs['cheque_amount']);
    //         unset($inputs['cheque_percentage']);
    //         unset($inputs['photos']);
    //         unset($inputs['floor_plans']);
    //         unset($inputs['documents']);
    //         /*   dd('here', $inputs); */

    //         if (!array_key_exists('view_ids', $inputs)) {
    //             $inputs['view_ids'] = [];
    //         }
    //         if (!array_key_exists('portals', $inputs)) {
    //             $inputs['portals'] = [];
    //         }
    //         $inputs['added_by'] = auth()->user()->id;
    //         $listing = Listing::create($inputs);


    //         if (array_key_exists('portals', $inputs)) {
    //             foreach ($inputs['portals'] as $portal) {
    //                 PortalListing::create([
    //                     'listing_id' => $listing->id,
    //                     'portal_id' => $portal
    //                 ]);
    //             }
    //         }
    //         //* move photos from temporary to listing_photos
    //         if ($photos && is_array($photos)) {
    //             if (!file_exists(public_path("listings"))) {
    //                 mkdir(public_path("listings"));
    //             }
    //             if (!file_exists(public_path("listings/photos"))) {
    //                 mkdir(public_path("listings/photos"));
    //             }

    //             foreach ($photos as $key => $folder) {
    //                 $photo = TemporaryListing::where('folder', $folder)->first();
    //                 if ($photo) {
    //                     $moved = ListingPhoto::create(
    //                         [
    //                             'listing_id' => $listing->id,
    //                             'main' => $photo->main,
    //                             'watermark' => $photo->watermark,
    //                             'active' => $photo->active,
    //                             'photo_main' => $request->checked_main_hidden[$key],
    //                             'icon' => $photo->icon,
    //                             'listing_category_id' => $photo->listing_category_id,
    //                         ]
    //                     );

    //                     if ($moved) {
    //                         $files = File::files(public_path("temporary/listings/$photo->folder"));
    //                         if (!file_exists(public_path("listings/photos/agency_$listing->agency_id"))) {
    //                             mkdir(public_path("listings/photos/agency_$listing->agency_id"));
    //                         }
    //                         if (!file_exists(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id"))) {
    //                             mkdir(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id"));
    //                         }
    //                         if (!file_exists(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id"))) {
    //                             mkdir(public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id"));
    //                         }
    //                         $new_folder = public_path("listings/photos/agency_$listing->agency_id/listing_$listing->id/photo_$moved->id");
    //                         foreach ($files as $file) {


    //                             File::move($file->getRealPath(), $new_folder . '/' . $file->getFileName());
    //                         }
    //                         $removed_dir = public_path("temporary/listings/$photo->folder");
    //                         if (file_exists($removed_dir)) {
    //                             rmdir($removed_dir);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //         //* move plans from temporary to listing_plans

    //         if ($floor_plans && is_array($floor_plans)) {
    //             if (!file_exists(public_path("listings"))) {
    //                 mkdir(public_path("listings"));
    //             }
    //             if (!file_exists(public_path("listings/plans"))) {
    //                 mkdir(public_path("listings/plans"));
    //             }

    //             foreach ($floor_plans as $folder) {
    //                 $plan = TemporaryPlan::where('folder', $folder)->first();
    //                 if ($plan) {
    //                     $moved = ListingPlan::create(
    //                         [
    //                             'listing_id' => $listing->id,
    //                             'main' => $plan->main,
    //                             'watermark' => $plan->watermark,
    //                             'active' => $plan->active,
    //                             'title' => $plan->title,
    //                         ]
    //                     );

    //                     if ($moved) {
    //                         $files = File::files(public_path("temporary/plans/$plan->folder"));

    //                         if (!file_exists(public_path("listings/plans/agency_$listing->agency_id"))) {
    //                             mkdir(public_path("listings/plans/agency_$listing->agency_id"));
    //                         }
    //                         if (!file_exists(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id"))) {
    //                             mkdir(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id"));
    //                         }
    //                         if (!file_exists(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id"))) {
    //                             mkdir(public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id"));
    //                         }
    //                         $new_folder = public_path("listings/plans/agency_$listing->agency_id/listing_$listing->id/plan_$moved->id");
    //                         foreach ($files as $file) {
    //                             File::move($file->getRealPath(), $new_folder . '/' . $file->getFileName());
    //                         }
    //                         $removed_dir = public_path("temporary/plans/$plan->folder");
    //                         if (file_exists($removed_dir)) {
    //                             rmdir($removed_dir);
    //                         }
    //                     }
    //                 }
    //             }
    //         }

    //         //* move documents from temporary to listing_documents

    //         if ($documents && is_array($documents)) {
    //             if (!file_exists(public_path("listings"))) {
    //                 mkdir(public_path("listings"));
    //             }
    //             if (!file_exists(public_path("listings/documents"))) {
    //                 mkdir(public_path("listings/documents"));
    //             }

    //             foreach ($documents as $folder) {
    //                 $document = TemporaryDocument::where('folder', $folder)->first();
    //                 if ($document) {
    //                     $moved = ListingDocument::create(
    //                         [
    //                             'listing_id' => $listing->id,
    //                             'document' => $document->document,
    //                             'title' => $document->title,
    //                         ]
    //                     );

    //                     if ($moved) {
    //                         $files = File::files(public_path("temporary/documents/$document->folder"));

    //                         if (!file_exists(public_path("listings/documents/agency_$listing->agency_id"))) {
    //                             mkdir(public_path("listings/documents/agency_$listing->agency_id"));
    //                         }
    //                         if (!file_exists(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id"))) {
    //                             mkdir(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id"));
    //                         }
    //                         if (!file_exists(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id"))) {
    //                             mkdir(public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id"));
    //                         }
    //                         $new_folder = public_path("listings/documents/agency_$listing->agency_id/listing_$listing->id/document_$moved->id");
    //                         foreach ($files as $file) {
    //                             File::move($file->getRealPath(), $new_folder . '/' . $file->getFileName());
    //                         }
    //                         $removed_dir = public_path("temporary/documents/$document->folder");
    //                         if (file_exists($removed_dir)) {
    //                             rmdir($removed_dir);
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //         //* save videos

    //         if (count($video_title) > 0) {
    //             if ($video_title[0] != null && $video_host[0] != null && $video_link[0] != null) {

    //                 foreach ($video_title as $key => $title) {
    //                     ListingVideo::create([
    //                         'listing_id' => $listing->id,
    //                         'title' => $title,
    //                         'host' => $video_host[$key],
    //                         'link' => $video_link[$key],
    //                     ]);
    //                 }
    //             }
    //         }

    //         if (count($cheque_date) > 0) {
    //             if ($cheque_date[0] != null && $cheque_amount[0] != null && $cheque_percentage[0] != null) {
    //                 foreach ($cheque_date as $key => $date) {
    //                     ListingChequeCalculator::create([
    //                         'listing_id' => $listing->id,
    //                         'date' => $date,
    //                         'value' => $cheque_amount[$key],
    //                         'percent' => $cheque_percentage[$key],
    //                     ]);
    //                 }
    //             }
    //         }

    //         DB::commit();
    //         return back()->with(flash(trans('listing.listing_created'), 'success'));
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab', '');
    //     }
    // }



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


    public function share_listing($agency)
    {
        $per_page = 10;
        $shared_agencies = \App\Models\Request::where('sender_id', $agency)->where('response', 'accepted');
        $agencies = $shared_agencies->get();
        $shared_agencies = $shared_agencies->pluck('receiver_id')->toArray();
        $listings = Listing::whereIn('agency_id', $shared_agencies)->where('lsm', 'shared');
        $locations = $listings->pluck('location')->unique();
        array_push($shared_agencies, $agency);
        $types = ListingType::all();


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

        return view('listing::listing.share_listing', compact('listings', 'locations', 'types', 'agencies'));
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
            if (!empty($request->{'portals_' . $id})) {
                $listing->portalsList->isEmpty() != true ? $listing->portalsList->each->delete() : '';
                foreach ($request->{'portals_' . $id} as $item) {
                    PortalListing::create([
                        'listing_id' => $listing->id,
                        'portal_id' => $item
                    ]);
                }
            }

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


    public function export_all($request, $agency)
    {

        abort_if(Gate::denies('can_generate_reports'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Excel::download(new ListingsExport($agency), 'listings-list.xlsx');
    }

    public function get_communities($request)
    {


        if ($request->ajax()) {


            try {
                $communities = City::with('communities')->where('id', $request->city_id)->firstOrFail()->communities;


                return response()->json(['message' => trans('listing.success'), 'communities' => $communities], 200);
            } catch (\Exception $e) {

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }

    public function get_sub_communities($request)
    {


        if ($request->ajax()) {

            try {
                $sub_communities = Community::with('sub_communities')->where('id', $request->community_id)->firstOrFail()->sub_communities;
                return response()->json(['message' => trans('listing.success'), 'sub_communities' => $sub_communities], 200);
            } catch (\Exception $e) {
                dd($e);
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function show($listing_id, $listing_ref)
    {
        $listing = Listing::with(['agency', 'agent'])->where('id', $listing_id)->firstOrFail();
        return view('listing::listing.front', ['listing' => $listing]);
    }

    public function statistics($agency)
    {
        return view('listing::listing.upload_statistics_sheet', compact('agency'));
    }

    public function statistics_view($agency)
    {
        $per_page  = 15;
        $pagination  = true;
        $statistics = Statistics::where('agency_id', $agency);

        if (request('filter_data_source')) {
            $statistics->where('data_source', request('filter_data_source'));
        }
        if (request('filter_date_from')) {
            $statistics->where('day', '>=', request('filter_date_from'));
        }
        if (request('filter_date_to')) {
            $statistics->where('day', '<=', request('filter_date_to'));
        }
        if (request('filter_property_purpose')) {
            $statistics->where('type', request('filter_property_purpose'));
        }
        if (request('filter_size_sqft_from')) {
            $statistics->where('size_sqft', '>=', request('filter_size_sqft_from'));
        }

        if (request('filter_size_sqft_to')) {
            $statistics->where('size_sqft', '<=', request('filter_size_sqft_to'));
        }
        if (request('filter_price_sqft_from')) {
            $statistics->where('price_sqft', '>=', request('filter_price_sqft_from'));
        }

        if (request('filter_price_sqft_to')) {
            $statistics->where('price_sqft', '<=', request('filter_price_sqft_to'));
        }

        if (request('filter_size_sqm_from')) {
            $statistics->where('size_sqm', '>=', request('filter_size_sqm_from'));
        }

        if (request('filter_size_sqm_to')) {
            $statistics->where('size_sqm', '<=', request('filter_size_sqm_to'));
        }
        if (request('filter_price_sqm_from')) {
            $statistics->where('price_sqm', '>=', request('filter_price_sqm_from'));
        }

        if (request('filter_price_sqm_to')) {
            $statistics->where('price_sqm', '<=', request('filter_price_sqm_to'));
        }
        if (request('filter_total_worth_from')) {
            $statistics->where('total_worth', '>=', request('filter_total_worth_from'));
        }

        if (request('filter_total_worth_to')) {
            $statistics->where('total_worth', '<=', request('filter_total_worth_to'));
        }

        $statistics = $statistics->paginate($per_page);

        return view('listing::listing.statistics_view', compact('agency', 'statistics', 'pagination'));
    }

    public function statistics_process($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'file' => 'required|file|mimes:xlsx,csv,xls'
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            $business = auth()->user()->business_id;
            $user_id = auth()->user()->id;
            $agency = request('agency');
            $statistics_file = time() . $request->file->getClientOriginalName();

            $request->file->move(public_path('statistics_sheets'), $statistics_file);
            StartLeadsInsertJobs::withChain([
                new ImportStatisticsSheet($business, $agency, $statistics_file, $user_id),
                new FinishedStatisticsSheet($user_id)
            ])->dispatch();


            return back()->with(flash(trans('listing.sheet_import_process_start'), 'success'));
        } catch (\Exception $e) {
            return back()->with(flash(trans('agency.something_went_wrong'), 'error'));
        }
    }











    public function mark($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type'  => ['required', 'in:hot,basic,signature'],
                'ids'   => ['required', 'string']
            ]);



            if ($validator->fails()) {

                return response()->json(['message' => $validator->errors()->all()[0]], 400);
            }

            $ids = explode(',', $request->ids);


            Listing::whereIn('id', $ids)->update(['hot' => $request->type]);
            $msg = trans('listing.listing_marked') . ' ' . ucfirst($request->type);
            return response()->json(['message' => $msg], 200);
        } catch (\Exception $e) {


            return response()->json(['message' => trans('agency.something_went_wrong')], 400);
        }
    }



    public function lsm_change($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type'  => ['required', 'in:private,shared'],
                'ids'   => ['required', 'string']
            ]);



            if ($validator->fails()) {

                return response()->json(['message' => $validator->errors()->all()[0]], 400);
            }

            $ids = explode(',', $request->ids);


            Listing::whereIn('id', $ids)->update(['lsm' => $request->type]);
            $msg = trans('listing.listing_lsm') . ' ' . ucfirst($request->type);
            return response()->json(['message' => $msg], 200);
        } catch (\Exception $e) {


            return response()->json(['message' => trans('agency.something_went_wrong')], 400);
        }
    }


    public function staff_change_shortcut($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ids'        => ['required', 'string'],
                'staff_id'   => ['required'],
                'agency' => ['required', 'integer', 'exists:agencies,id']
            ]);

            if ($validator->fails()) {

                return response()->json(['message' => $validator->errors()->all()[0]], 400);
            }

            if (!in_array($request->staff_id, staff($request->agency)->pluck('id')->toArray())) {
                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }



            $ids = explode(',', $request->ids);


            Listing::whereIn('id', $ids)->update(['assigned_to' => $request->staff_id]);
            $msg = trans('listing.listing_staff_updated');
            return response()->json(['message' => $msg], 200);
        } catch (\Exception $e) {


            return response()->json(['message' => trans('agency.something_went_wrong')], 400);
        }
    }
    public function status_change_shortcut($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ids'        => ['required', 'string'],
                'status'    => ['required', 'in:draft,live,review,archive'],
            ]);

            if ($validator->fails()) {

                return response()->json(['message' => $validator->errors()->all()[0]], 400);
            }

            $ids = explode(',', $request->ids);


            Listing::whereIn('id', $ids)->update(['status' => $request->status]);
            $msg = trans('listing.listing_status_updated');
            return response()->json(['message' => $msg], 200);
        } catch (\Exception $e) {


            return response()->json(['message' => trans('agency.something_went_wrong')], 400);
        }
    }
    public function move_to_archive($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ids'        => ['required', 'string'],
                'status'    => ['required', 'in:archive'],
            ]);

            if ($validator->fails()) {

                return response()->json(['message' => $validator->errors()->all()[0]], 400);
            }

            $ids = explode(',', $request->ids);


            Listing::whereIn('id', $ids)->update(['status' => $request->status]);
            $msg = trans('listing.listing_status_updated');
            return response()->json(['message' => $msg], 200);
        } catch (\Exception $e) {


            return response()->json(['message' => trans('agency.something_went_wrong')], 400);
        }
    }
}