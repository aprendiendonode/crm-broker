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



//Route::get('test','Controller@test');
//php artisan cache:forget spatie.permission.cache
//php artisan cache:clear


Route::get('assign-permissions', function () {
    // $user = auth()->user();
    $users = User::where('type', 'owner')->get();
    $permissions = Permission::all();
    foreach ($users as $user) {
        foreach ($permissions as $permission) {
            $user->givePermissionTo($permission->name);
        }
    }
});



Route::middleware(['guest'])->group(function () {
    Route::get('login', 'Auth\LoginController@login_view');
    Route::post('login', 'Auth\LoginController@login_proccess');
});




Route::get('change_language/{lang}', 'Controller@change_language')->name('change_language')->middleware('checkauth');



Route::middleware(['checkauth',  'lang'])->group(function () {
    Route::post('change-mode', function () {
        User::findorfail(auth()->user()->id)->update(['default_mode' => request('mode')]);
        return response()->json(['status' => 'success'], 200);
    });
    Route::post('change-width', function () {
        User::findorfail(auth()->user()->id)->update(['default_width' => request('width')]);
        return response()->json(['status' => 'success'], 200);
    });

    Route::post('change-position', function () {
        User::findorfail(auth()->user()->id)->update(['default_position' => request('position')]);
        return response()->json(['status' => 'success'], 200);
    });
    Route::post('change-sidebar-color', function () {
        User::findorfail(auth()->user()->id)->update(['default_sidebar_color' => request('sidebar_color')]);
        return response()->json(['status' => 'success'], 200);
    });
    Route::post('change-sidebar-size', function () {


        User::findorfail(auth()->user()->id)->update(['default_sidebar_size' => request('sidebar_size')]);
        return response()->json(['status' => 'success'], 200);
    });
    Route::post('reset-to-default', function () {


        User::findorfail(auth()->user()->id)->update([

            'default_sidebar_size'  => 'default',
            'default_mode'          => 'light',
            'default_width'         => 'fluid',
            'default_position'      => 'fixed',
            'default_sidebar_color' => 'light',

        ]);
        return response()->json(['status' => 'success'], 200);
    });


    //moderator

    Route::post('manage_moderator', 'ModeratorController@store');
    Route::patch('manage_moderator/{moderator_id}', 'ModeratorController@update');
//        Route::post('update_privileges', 'ModeratorController@update_privileges');
//        Route::post('changepassword', 'ModeratorController@change_password');
        Route::delete('delete_moderator/{moderator_id}', 'ModeratorController@destroy');
//        Route::post('make-moderator', 'ModeratorController@moderator');
    Route::post('moderator/change-team', 'ModeratorController@change_team');


});

Route::get('change_agency', function () {

//    request()->merge([
//        'agency' => 44,
//    ]);
//    dd(request(),request('agency'),request()->merge(['agency' => 44,]),url()->current() ,redirect()->back(),url()->previous());
    $current_url = explode('/',request()->current);
    $current_url[sizeof($current_url)-1] = request()->agency_id;
    $next_url = implode('/',$current_url);

    return redirect()->to($next_url);
})->name('change_agency');

Route::middleware(['checkauth', 'authority', 'lang'])->group(function () {


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
        } elseif (auth()->user()->type == 'superadmin') {
            return redirect('superadmin/home');
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
        } elseif (auth()->user()->type == 'superadmin') {
            return redirect('superadmin/home');
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

    // manage moderators routes
    Route::get('moderator/{agency}', 'ModeratorController@index');
    Route::get('moderator/{agency}/privileges/{staff}', 'ModeratorController@privileges');
    Route::get('export_moderator/{agency}', 'ModeratorController@export');
    Route::get('moderator/change_activation/{moderator_id}', 'ModeratorController@change_activation');

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
