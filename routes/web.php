<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\Route;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Client;
use Spatie\Permission\Models\Permission;
use Spatie\ArrayToXml\ArrayToXml;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test','Controller@test');

Route::middleware(['guest'])->group(function () {

    Route::get('login', 'Auth\LoginController@login_view');
    Route::post('login', 'Auth\LoginController@login_proccess');
});




Route::get('change_language/{lang}', 'Controller@change_language')->name('change_language')->middleware('checkauth');
Route::middleware(['checkauth', 'authority'])->group(function () {


    Route::get('xml/{business}/{agency}/listings', function ($business, $agency) {
        $listings = Listing::where('business_id', $business)->where('agency_id', $agency)
            ->get()->map(function ($listing, $key) {

                $images = [];
                foreach ($listing->photos->pluck('path') as $photo) {

                    $images[]   = (string)$photo;
                }
                // dd($images);
                return [
                    'Count'                    => ['_cdata' => ((string)($key + 1))],
                    'Unit_Type'                => ['_cdata' => $listing->type ? $listing->type->name_en : ''],
                    'Ad_Type'                  => ['_cdata' => \Str::ucfirst($listing->purpose)],
                    'Emirate'                  => ['_cdata' => $listing->city],
                    'Community'                => ['_cdata' => $listing->community],
                    'Property_Name'            => ['_cdata' => $listing->location],
                    'Property_Ref_No'          => ['_cdata' => $listing->listing_ref],
                    'price'                    => ['_cdata' => $listing->price],
                    'Frequency'                => ['_cdata' => $listing->rent_frequency],
                    'Unit_Builtup_Area'        => ['_cdata' => $listing->area],
                    'No_of_Rooms'              => ['_cdata' => $listing->beds],
                    'No_of_Bathrooms'          => ['_cdata' => $listing->baths],
                    'Property_Title'           => ['_cdata' => $listing->title],
                    'Web_Remarks'              => ['_cdata' => $listing->description_en],
                    'Listing_Agent'           =>  ['_cdata' => $listing->agent ? $listing->agent->name_en : ''],
                    'Listing_Agent_Phone'     =>  ['_cdata' => $listing->agent ? $listing->agent->phone : ''],
                    'Listing_Agent_Email'     =>  ['_cdata' => $listing->agent ? $listing->agent->email : ''],
                    'Images'                  =>  ['ImageUrl' =>   $images],
                    'Listing_Date'            =>  ['c_data' => $listing->create_at],
                    'Last_Updated'            =>  ['c_data' => $listing->updated_at],
                    'Facilities'              =>  ['Facility'  =>  $listing->view->name_en],
                    'unit_measure'            => ['c_data' => $listing->updated_at],
                    'Geopoints'               => [
                        'Latitude' => $listing->updated_at,
                        'Longitude' => $listing->updated_at,
                    ],
                    'Permit_Id'      => ['c_data' => $listing->permit_id],
                    'featured_on_companywebsite'    => ['c_data' => $listing->updated_at],
                    'Developer' => ['c_data' => $listing->devloper ? $listing->developer->name_en : ''],
                    'under_construction'    => ['c_data' => $listing->updated_at],
                    'Off_Plan'    => ['c_data' => $listing->updated_at],
                    'Views' =>
                    ['view' =>  $listing->view->name_en],

                    'Cheques' =>  $listing->view->name_en,
                    'Exclusive_Rights' =>  $listing->exclusive_rights,

                ];
            });

        $result = ArrayToXml::convert(['listing' => $listings->toArray()], 'listings');
        return response()->xml($result);
    });
    Route::feeds();


    Route::get('/', function () {

        if (owner()) {
            $agency_found =  auth()->user()->agencies->first();
            if ($agency_found) {
                return redirect('home/' . $agency_found->id);
            }
        } elseif (moderator()) {
            $agencies = explode(',', auth()->user()->can_access);
            if (count($agencies) > 0) {
                return redirect('home/' . $agencies[0]);
            }
        } else {
            if (auth()->user()->agency_id != null) {

                return redirect('home/' . auth()->user()->agency_id);
            }
        }
    });


    Route::get('/home', function () {

        if (owner()) {
            $agency_found =  auth()->user()->agencies->first();
            if ($agency_found) {
                return redirect('home/' . $agency_found->id);
            }
        } elseif (moderator()) {
            $agencies = explode(',', auth()->user()->can_access);
            if (count($agencies) > 0) {
                return redirect('home/' . $agencies[0]);
            }
        } else {
            if (auth()->user()->agency_id != null) {

                return redirect('home/' . auth()->user()->agency_id);
            }
        }
    });

    Route::get('/{agency}', function () {

        if (owner()) {
            $agency_found =  auth()->user()->agencies->first();
            if ($agency_found) {
                return redirect('home/' . $agency_found->id);
            }
        } elseif (moderator()) {
            $agencies = explode(',', auth()->user()->can_access);
            if (count($agencies) > 0) {
                return redirect('home/' . $agencies[0]);
            }
        } else {
            if (auth()->user()->agency_id != null) {

                return redirect('home/' . auth()->user()->agency_id);
            }
        }
    });


    Route::get('home/{agency}', function () {

        return view('dashboard');
    });
});





Route::middleware(['checkauth'])->group(function () {

    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('update_permissions/{agency}', function () {

        $user = User::findorfail(1);
        $permissions = Permission::pluck('id')->toArray();
        foreach ($permissions as $permission) {
            $user->givePermissionTo($permission);
        }
    });

    Route::post('update_notification', 'Controller@change_Notify_status');

});
