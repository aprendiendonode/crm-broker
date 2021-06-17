<?php

use App\Models\Agency;
use Dirape\Token\Token;
use App\Models\Business;

use Illuminate\Http\Request;
use Modules\Sales\Entities\Lead;
use Illuminate\Support\Facades\Route;
use Modules\Sales\Entities\LeadSource;



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

    // $token_key = (new Token())->Unique('users', 'api_token', 60);
    // dd('here', new Token()->Random(10));
    // Business::create(
    //     [

    //         'business_token' => (new Token())->Unique('businesses', 'business_token', 60)
    //     ]
    // );

    // Agency::create(
    //     [
    //         'comapny_name_en' => 'test_token',
    //         'comapny_name_ar' => 'test_token',
    //         'comapny_email'   => 'company@gmail.com',
    //         'comapny_email'   => 'company@gmail.com',
    //         'business_id' => 1,

    //         'agency_token' => (new Token())->Unique('agencies', 'agency_token', 60)
    //     ]
    // );



    $business = Business::where('business_token', $business_token)->firstOrFail();
    $agency   = Agency::where('business_id', $business->id)->where('agency_token', $agency_token)->firstOrFail();
    dd();



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
                'name_ar' => 'فيسبوك',
                'slug'    => 'facebook',

            ]);

            $lead_source_id = $lead_source->id;
        }
    }

    Lead::create([
        'table_name'         => 'leads',
        "source_id"          => $request->source_id,

        "type_id"            => $request->type_id,
        "qualification_id"   => $request->qualification_id,
        "communication_id"          => $request->communication_id,
        "priority_id"               => $request->priority_id,

        "first_name"     => $request->first_name,
        "sec_name"       => $request->last_name,
        "full_name"      => $request->full_name,

        "email1"         => $request->email,
        "phone1"         => $request->phone_number,
        // "phone1_code"    => $request->phone1_code,
        "country"        => $agency->country_id,
        "city_id"        => $request->city_id,

        "agency_id"      => $agency->agency_id,
        'business_id'    => $business->business_id,

    ]);
});
