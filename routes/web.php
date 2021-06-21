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

$id =  32;
$communities = [
    'Al Raha Golf Gardens',
    'Sas Al Nakhl Village',
    'Al Ghadeer',
    'Yas Island',
    'Al Raha Gardens',
    'Hydra Golf Walk',
    'Al Bateen',
    'Al Hosn',
    'Al Karamah',
    'Al Khalidiyah',
    'Al Khubeirah',
    'Al Manhal',
    'Al Maqtaa',
    'Al Markaziya',
    'Al Mushrif',
    'Hadbat Al Zaafran',
    'Khalifa City A',
    'Khor Al Maqta',
    'Lulu Island',
    'Madinat Zayed',
    'Marina Village',
    'Mina Zayed',
    'Mussafah',
    'Qasr El Bahr',
    'Al Ras Al Akhdar',
    'Al Raha Beach',
    'Sheikh Khalifa Bin Zayed Street',
    'Al Reem Island',
    'Mohammed Bin Zayed City',
    'Hydra Village',
    'Al Mafraq Industrial Area',
    'Airport Street',
    'Al Zahraa',
    'Danet Abu Dhabi',
    'Saadiyat Island',
    'Al Salam Street',
    'The Quay',
    'Qasr Al Sarab',
    'Building Material City',
    'Abu Dhabi Gate City (Officers City)',
    'Tourist Club Area (TCA)',
    'Al Gurm',
    'Nurai Island',
    'Al Muroor',
    'Al Mafraq',
    'Al Nahyan',
    'Hamdan Street',
    'Electra Street',
    'Al Wahdah',
    'Al Shamkha',
    'Sheikh Rashid Bin Saeed Street',
    'Al Manaseer',
    'Al Zaab',
    'Between Two Bridges (Bain Al Jessrain)',
    'Al Matar',
    'Al Bahia',
    'Al Shawamekh',
    'Baniyas',
    'Zayed Military City',
    'Zayed City (Khalifa City C)',
    'Al Mina',
    'Jawazat Street',
    'Al Najda Street',
    'Grand Mosque District',
    'Corniche Road',
    'Defence Street',
    'Al Rawdah',
    'Al Falah City',
    'NBB Workers City - Mojumaat Hameem',
    'Al Markaz',
    'Diplomatic Area',
    'Capital Centre',
    'Umm Al Nar',
    'Navy Gate',
    'Al Wathba',
    'Ghantoot',
    'Al Ruwais',
    'Al Dhafrah',
    'Corniche Area',
    'Zayed Sports City',
    'Al Reef',
    'Masdar City',
    'Liwa Street',
    'Al Nasr Street',
    'Al Samha',
    'Al Danah',
    'Eastern Road',
    'Al Marhaba',
    'Al Qurm',
    'Shakhbout City (Khalifa City B)',
    'Nareel Island</o',
    'Al Maryah Island',
    'Al Falah Street',
    'KIZAD',
    'Al Taweelah',
    'Al Shahama',
    'Rawdhat Abu Dhabi',
    'Al Tibbiya',
    'Al Aman',
    'Dalma Island',
    'Al Fahid',
    'The Marina',
    'Al Shamkha South',
    'Liwa',
    'Al Hayer',
    'Sweihan',
    'Al Ajban',
    'Abu Krayyah',
    'Al Nahda',
    'Al Saad',
    'Al Zahiyah',
    'Madinat Zayed Western Region',
    'Al Rahba',
    'Al Faya',
    'Al Jurf',
    'Al Sader',
    'Al Muntazah',
    'Al Mirfa',
    'Madinat Al Riyadh',
    'Al Rehhan',
    'Rabdan',
];

Route::get('test',function() use ($communities,$id){

//    foreach ($communities as $community){
//        \Illuminate\Support\Facades\DB::table('communities')->insert([
//            'name_en' => $community,
//            'name_ar' => $community,
//            'city_id' => $id,
//            'country_id' => 234
//        ]);
//    }
});
//Route::get('test','Controller@test');

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
        } elseif( auth()->user()->type == 'superadmin'){
            return redirect('superadmin/home' );
        }
        else {
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
        }elseif( auth()->user()->type == 'superadmin'){
            return redirect('superadmin/home' );

        }  else {
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
