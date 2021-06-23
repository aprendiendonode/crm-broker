<?php

use App\Models\Agency;
use Dirape\Token\Token;
use App\Models\Business;

use Illuminate\Http\Request;
use Modules\Sales\Entities\Lead;
use Illuminate\Support\Facades\Route;
use Modules\SuperAdmin\Entities\City;
use Modules\Sales\Entities\LeadSource;

use LanguageDetection\Language;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::put('campain-leads-facebook/{business_token}/{agency_token}', function (Request $request, $business_token, $agency_token) {
    // dd($request->all());
    $business = Business::where('business_token', $business_token)->firstOrFail();
    $agency   = Agency::where('business_id', $business->id)->where('agency_token', $agency_token)->firstOrFail();
    $ld = new Language(['en', 'ar']);
    $deteced =   $ld->detect($request->city)->bestResults()->close();
    $city = '';
    if (array_key_exists('en', $deteced)) {
        $city =  str_replace(' ', '_', strtolower($request->city));
        $city =  City::where('slug', $city)->first();
    } else {
        $city =  City::where('name_ar', $request->city)->first();
    }
    list($firstName, $lastName) = array_pad(explode(' ', trim($request->full_name)), 2, null);
    $lead_source = LeadSource::where('slug', $request->platform == 'fb' ? 'facebook' : 'instagram')->where('agency_id', $agency->id)->first();
    $lead_source_id = '';
    if ($lead_source) {
        $lead_source_id = $lead_source->id;
    } else {
        if ($request->platform == 'fb') {
            $lead_source =  LeadSource::create([
                'name_en' => 'Facebook',
                'name_ar' => 'فيسبوك',
                'slug'    => 'facebook',

            ]);

            $lead_source_id = $lead_source->id;
        } else {
            $lead_source =  LeadSource::create([
                'name_en' => 'Instagram',
                'name_ar' => 'انستجرام',
                'slug'    => 'instagram',

            ]);

            $lead_source_id = $lead_source->id;
        }
    }

    Lead::create([
        'table_name'             => 'leads',
        "source_id"              => $request->source_id,
        "first_name"             => $firstName,
        "sec_name"               => $lastName,
        "full_name"              => $request->full_name,
        "email1"                 => $request->email,
        "phone1"                 => $request->phone_number,
        "city_id"                => $city ? $city->id : '',
        "agency_id"              => $agency->agency_id,
        'business_id'            => $business->business_id,
        'created_at'             => $request->created_time,
        'campaign_id'            => $request->campaign_id,
        'campaign_name'          => $request->campaign_name,
        'campaign_lead_id'       => $request->id,
        'campaign_form_id'       => $request->form_id,
        'campaign_ad_id'         => $request->ad_id,
        'campaign_ad_name'       => $request->ad_name,
        'campaign_adset_name'    =>  $request->adset_name,


    ]);
});
