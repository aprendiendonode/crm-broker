<?php

namespace Modules\Agency\Http\Controllers;

use Gate;

use App\Models\City;
use App\Models\User;
use App\Models\Agency;
use App\Models\Country;
use App\Exports\TeamsExport;
use Illuminate\Http\Request;
use App\Models\AgencySetting;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Modules\Agency\Entities\Watermark;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{


    public function index($agency)
    {

        // agency_settings();
        abort_if(Gate::denies('manage_agency_settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business  = auth()->user()->business_id;


        return view('agency::settings.index', compact('business', 'agency'));
    }



    public function watermark_edit($agency)
    {

        abort_if(Gate::denies('manage_agency_settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {


            $watermark = Watermark::firstOrCreate([
                'agency_id' => $agency,
                'current' => 'yes',
                'business_id' => auth()->user()->business_id,
            ]);


            DB::commit();
            return view('agency::settings.watermark', compact('watermark', 'agency'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'));
        }
    }


    public function watermark_process(Request $request)
    {

        abort_if(Gate::denies('manage_agency_settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'agency_id'     =>  'required|exists:agencies,id',
                'watermark_id'  =>  'required|exists:watermarks,id',
                'active'        =>  'required|in:yes,no',
                'position'      =>  'required|in:top-left,top,top-right,left,center,right,bottom-left,bottom,bottom-right',
                'transparent'   =>  'required|max:100|min:0',
                'image'         =>  'sometimes|nullable|mimes:jpeg,jpg,png,gif',
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            if ($request->image) {
                $image =  upload_image($request->image, public_path('upload/watermarks'), true, true);
            }

            $watermark = Watermark::firstOrCreate([
                'agency_id' => $request->agency_id,
                'current' => 'yes',
                'business_id' => auth()->user()->business_id,
            ]);
            if ($watermark->image && $request->image) {
                remove_image($watermark->image, 'upload/watermarks');
            }

            $watermark->update([
                'transparent'   => $request->transparent,
                'position'   => $request->position,
                'active'   => $request->active,
                'update_listing'   => $request->update_listing,
                'image'   => $image,
            ]);


            DB::commit();
            return back()->with(flash(trans('agency.watermark_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'));
        }
    }



    public function update(Request $request)
    {


        $agency = Agency::findorfail($request->agency_id);

        abort_if(Gate::denies('manage_agency_settings'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request->all());
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [


                "quick_show_number_of_bedrooms" => "required|in:yes,no",
                "quick_show_number_of_parkings" =>  "required|in:yes,no",
                "quick_show_number_of_photos" =>  "required|in:yes,no",
                "quick_show_number_of_videos" =>  "required|in:yes,no",
                "listings_landlord_should_be_mandatory" =>  "required|in:yes,no",
                "listings_source_should_be_mandatory" =>  "required|in:yes,no",
                "listings_reference_should_contain_staff_initial" =>  "required|in:yes,no",
                "listings_show_building_name" =>  "required|in:yes,no",
                "leads_can_assign_multiple_agents" =>  "required|in:yes,no",
                "leads_source_should_be_mandatory" =>  "required|in:yes,no",
                "leads_contacts_should_be_mandatory" =>  "required|in:yes,no",
                "leads_area_min_should_be_mandatory" =>  "required|in:yes,no",
                "leads_budget_max_should_be_mandatory" =>  "required|in:yes,no",
                "contacts_per_page" => "required|integer|in:20,50,100",
                "company_profile_primary_number_should_be_mandatory" => "required|in:yes,no",
                "lsm_overall_status" => "required|in:activated,deactivated",
                "lsm_share_status" => "required|in:private,shared",
                "lsm_listings_per_page" => "required|integer|in:20,50,100",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }



            AgencySetting::updateOrInsert(
                [
                    'agency_id' => $request->agency_id
                ],
                [

                    "quick_show_number_of_bedrooms" =>   $request->quick_show_number_of_bedrooms,
                    "quick_show_number_of_parkings" =>   $request->quick_show_number_of_parkings,
                    "quick_show_number_of_photos"   =>   $request->quick_show_number_of_photos,
                    "quick_show_number_of_videos"   =>   $request->quick_show_number_of_videos,


                    "listings_landlord_should_be_mandatory" =>   $request->listings_landlord_should_be_mandatory,
                    "listings_source_should_be_mandatory"   =>   $request->listings_source_should_be_mandatory,
                    "listings_reference_should_contain_staff_initial" =>   $request->listings_reference_should_contain_staff_initial,
                    "listings_show_building_name"      =>  $request->listings_show_building_name,


                    "leads_can_assign_multiple_agents"       =>  $request->leads_can_assign_multiple_agents,
                    "leads_source_should_be_mandatory"       =>  $request->leads_source_should_be_mandatory,
                    "leads_contacts_should_be_mandatory"     => $request->leads_contacts_should_be_mandatory,
                    "leads_area_min_should_be_mandatory"     =>  $request->leads_area_min_should_be_mandatory,
                    "leads_budget_max_should_be_mandatory"   =>  $request->leads_budget_max_should_be_mandatory,


                    "contacts_per_page"                      => $request->contacts_per_page,
                    "company_profile_primary_number_should_be_mandatory" => $request->company_profile_primary_number_should_be_mandatory,
                    "lsm_overall_status"     => $request->lsm_overall_status,
                    "lsm_share_status"       =>  $request->lsm_share_status,
                    "lsm_listings_per_page"  => $request->lsm_listings_per_page,
                ]
            );

            DB::commit();
            return back()->with(flash(trans('agency.settings_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'));
        }
    }






    public function notifications($agency)
    {

        $notifications = auth()->user()->notifications;

        return view('notifications', compact('notifications'));
    }
}
