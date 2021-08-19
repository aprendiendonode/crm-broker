<?php

namespace Modules\Listing\Http\Controllers\Api;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Listing\Entities\Listing;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Listing\Transformers\Api\ListingResource;
// use Modules\Listing\Transformers\Api\ListingResourceCollection;

class ListingController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function home(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'business_token'  => 'required',
                    'agency_token'  => 'required'
                ],
                [
                    'business_token.required'  => 'Bussiness token is required',
                    'agency_token.required'  => 'Agency token is required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error', 'message' => $validator->errors()->all()[0]), 401);
            }
            $business = Business::where('business_token', $request->business_token)->firstOrFail();

            $agency   = Agency::where('business_id', $business->id)->where('agency_token',$request->agency_token)->firstOrFail();
         
            $listing_types= cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get();
                });
            $cities=  cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('cities')->where('country_id', $agency->country_id)->get();
                });
            $listingsAll=Listing::whereHas('portalsList', function($q){
                    $q->where('portal_id',2);
                })->where('agency_id',$agency->id)->with('photos')->take(6)->get();
                    $data=[];
            foreach($listingsAll as $item){
             
                if($item->photo_main->isEmpty() != true){
                    $image=$item->photo_main->first()->active == 'main' ? asset('listings/photos/agency_'.$agency->id.'/listing_'.$item->id.'/photo_'.$item->photo_main->first()->id.'/'.$item->photo_main->first()->main) : asset('listings/photos/agency_'.$agency->id.'/listing_'.$item->id.'/photo_'.$item->photo_main->first()->id.'/'.$item->photo_main->first()->watermark);
                }else{
                    $image=null;

                }

                $id = array(
                    'id' => $item->id,
                    'purpose' => $item->purpose ?? '',
                    'beds' => $item->beds ?? 0,
                    'parkings' => $item->parkings ?? 0,
                    'baths' => $item->baths ?? 0,
                    'area' => $item->area ?? '',
                    'furnished' => $item->furnished ?? 'no',
                    'title' => $item->title ?? '',
                    'location' => $item->location ?? '',
                    'price' => $item->price ?? '',
                    'rent_frequency' => $item->rent_frequency ?? '',
                    'image' => $image,
                    'shorttime_from' => $item->shorttime_from ?? '',
                    'shorttime_to' => $item->shorttime_to ?? '',
                );
                array_push($data, $id);
            }
            return response()->json(array(
                'status' => 'success',
                'listing' =>  $data,
                'listing_types' => $listing_types,
                'cities' => $cities,
            ), 200);
        } catch (\Throwable $e) {
            return response()->json(array(
                'status' => $e->getMessage()
            ), 401);
        }
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $type = null)
    {

        try {

            $validator = Validator::make(
                $request->all(),
                [
                    'business_token'  => 'required',
                    'agency_token'  => 'required'
                ],
                [
                    'business_token.required'  => 'Bussiness token is required',
                    'agency_token.required'  => 'Agency token is required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error', 'message' => $validator->errors()->all()[0]), 401);
            }
            $business = Business::where('business_token', $request->business_token)->firstOrFail();
            $agency   = Agency::where('business_id', $business->id)->where('agency_token', $request->agency_token)->firstOrFail();
            $listing_types = cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get();
            });
            $cities =  cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('cities')->where('country_id', $agency->country_id)->get();
            });
            if ($type != null) {
                $listingsAll = Listing::whereHas('portalsList', function ($q) {
                    $q->where('portal_id', 2);
                })->where([['agency_id', $agency->id], ['purpose', $type]])->with('photos')->get();
            } else {

                $listingsAll = Listing::whereHas('portalsList', function ($q) {
                    $q->where('portal_id', 2);
                })->where('agency_id', $agency->id)->with('photos')->get();
            }

            $data = [];
            foreach ($listingsAll as $item) {

                if ($item->photo_main->isEmpty() != true) {
                    $image = $item->photo_main->first()->active == 'main' ? asset('listings/photos/agency_' . $agency->id . '/listing_' . $item->id . '/photo_' . $item->photo_main->first()->id . '/' . $item->photo_main->first()->main) : asset('listings/photos/agency_' . $agency->id . '/listing_' . $item->id . '/photo_' . $item->photo_main->first()->id . '/' . $item->photo_main->first()->watermark);
                } else {
                    $image = null;
                }

                $id = array(
                    'id' => $item->id,
                    'purpose' => $item->purpose ?? '',
                    'beds' => $item->beds ?? 0,
                    'parkings' => $item->parkings ?? 0,
                    'baths' => $item->baths ?? 0,
                    'area' => $item->area ?? '',
                    'furnished' => $item->furnished ?? 'no',
                    'title' => $item->title ?? '',
                    'location' => $item->location ?? '',
                    'price' => $item->price ?? '',
                    'rent_frequency' => $item->rent_frequency ?? '',
                    'image' => $image,
                    'shorttime_from' => $item->shorttime_from ?? '',
                    'shorttime_to' => $item->shorttime_to ?? '',
                );
                array_push($data, $id);
            }
            return response()->json(array(
                'status' => 'success',
                'listing' => $data,
                'listing_types' => $listing_types,
                'cities' => $cities
            ), 200);
        } catch (\Throwable $e) {
            return response()->json(array(
                'status' => 'Error'
            ), 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function singleListing(Request $request)
    {
        try {
            //code...
            $validator = Validator::make(
                $request->all(),
                [
                    'business_token'  => 'required',
                    'agency_token'  => 'required',
                    'listing_id'  => 'required'
                ],
                [
                    'business_token.required'  => 'Bussiness token is required',
                    'agency_token.required'  => 'Agency token is required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error', 'message' => $validator->errors()->all()[0]), 401);
            }

            $business = Business::where('business_token', $request->business_token)->firstOrFail();
            $agency   = Agency::where('business_id', $business->id)->where('agency_token', $request->agency_token)->with('country')->firstOrFail();
            $listing  = Listing::where([['agency_id', $agency->id], ['id', $request->listing_id]])->with('videos', 'photos', 
            'documents', 'plans', 'addedBy', 'photo_main','agent','type','cheques','city', 'community', 'subCommunity',
            )->first();

            if (!empty($listing->photo_main->first())) {
                if($listing->photo_main->first()->active == 'main'){

                    $photonemain = asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$listing->photo_main->first()->id.'/'.$listing->photo_main->first()->main);
                }
               else{
                   
                   $photonemain = asset('listings/photos/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/photo_'.$listing->photo_main->first()->id.'/'.$listing->photo_main->first()->watermark);
               }
            
            } else {
                $photonemain = '';
            }
            if (!empty($listing->agent)) {
                $agent_image = $listing->agent->image != null ? asset('profile_images/'.$listing->agent->image) : '' ;
            } else {
                $agent_image = '';
            }
            $listing['image'] = $photonemain;
            $listing['agent_image'] = $agent_image;

            //  image 
            $image = [];
            if ($listing->photos->isEmpty() != true) {
                foreach ($listing->photos as $photos) {
                    $img = $photos->active == 'main' ? asset('listings/photos/agency_' . $agency->id . '/listing_' . $listing->id . '/photo_' . $photos->id . '/' . $photos->main) : asset('listings/photos/agency_' . $agency->id . '/listing_' . $listing->id . '/photo_' . $photos->id . '/' . $photos->watermark);
                    array_push($image, $img);
                }
            }
            //   plans
            $plans = [];
            if ($listing->plans->isEmpty() != true) {
                foreach ($listing->plans as $photos) {
                    $img = $photos->active == 'main' ? asset('listings/plans/agency_' . $listing->agency_id . '/listing_' . $listing->id . '/plan_' . $photos->id . '/' . $photos->main) : asset('listings/plans/agency_' . $listing->agency_id . '/listing_' . $listing->id . '/plan_' . $photos->id . '/' . $photos->watermark);
                    array_push($plans, $img);
                }
            }
            //  fueture filter 
            $filtered = $listing->features ? collect($listing->features) : collect();
            $features = $filtered->filter(function ($value, $key) {
                return $value == 'yes';
            });
            //simiral properties 
            $listingsAll = Listing::whereHas('portalsList', function ($q) {
                $q->where('portal_id', 2);
            })->where([['agency_id', $agency->id], ['id', '!=', $request->listing_id], ['purpose', $listing->purpose]])->with('photos')->take(3)->get();

            $data = [];
            foreach ($listingsAll as $item) {

                if ($item->photo_main->isEmpty() != true) {
                    $imagelisting = $item->photo_main->first()->active == 'main' ? asset('listings/photos/agency_' . $agency->id . '/listing_' . $item->id . '/photo_' . $item->photo_main->first()->id . '/' . $item->photo_main->first()->main) : asset('listings/photos/agency_' . $agency->id . '/listing_' . $item->id . '/photo_' . $item->photo_main->first()->id . '/' . $item->photo_main->first()->watermark);
                } else {
                    $imagelisting = null;
                }

                $id = array(
                    'id' => $item->id,
                    'purpose' => $item->purpose ?? '',
                    'beds' => $item->beds ?? 0,
                    'parkings' => $item->parkings ?? 0,
                    'baths' => $item->baths ?? 0,
                    'area' => $item->area ?? '',
                    'furnished' => $item->furnished ?? 'no',
                    'title' => $item->title ?? '',
                    'location' => $item->location ?? '',
                    'price' => $item->price ?? '',
                    'rent_frequency' => $item->rent_frequency ?? '',
                    'image' => $imagelisting,
                    'shorttime_from' => $item->shorttime_from ?? '',
                    'shorttime_to' => $item->shorttime_to ?? '',
                );
                array_push($data, $id);
            }


            return response()->json(
                array(
                    'status' => 'success',
                    'listing' => $listing,
                    'plans' => $plans,
                    'agency' => $agency,
                    'images' => $image,
                    'features' => $features,
                    'similiar_properties' => $data,
                ),
                200
            );
        } catch (\Throwable $e) {
            // dd($e);
            return response()->json(array(
                'status' => 'Error', 'message' => $e->getMessage()
            ), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function search(Request $request)
    {
        try {

            $validator = Validator::make(
                $request->all(),
                [
                    'business_token'  => 'required',
                    'agency_token'  => 'required',
                    'type'  => 'required', //
                    "listing_typy" => 'nullable|numeric', //
                    "city" => 'array', //
                    "city.*" => 'nullable||numeric', //
                    "bedroom" => 'nullable|numeric', //
                    "bathroom" => 'nullable|numeric', //
                    "furnitured" => 'nullable|string', //
                    "parking" => 'nullable|numeric', //
                    "size" => 'nullable|numeric', //
                    "price_from" => 'nullable|numeric', //
                    "price_to" => 'nullable|numeric', //filter
                ]
            );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error', 'message' => $validator->errors()->all()[0]), 401);
            }
            $business = Business::where('business_token', $request->business_token)->firstOrFail();
            $agency   = Agency::where('business_id', $business->id)->where('agency_token', $request->agency_token)->firstOrFail();
            $listingsAll = Listing::whereHas('portalsList', function ($q) {
                $q->where('portal_id', 2);
            })->where([['agency_id', $agency->id]])->with(['photos', 'photo_main']);

            if ($request->type != null) {
                if ($request->type  == 'short') {
                    //
                    $listingsAll->where('purpose', 'short');
                    if ($request->date != null) {

                        $data = explode(' to ', $request->date);
                        $datefrom = $data[0];
                        $dateto = $data[1];
                        $listingsAll->whereDate('shorttime_from', '<=', $datefrom);
                        $listingsAll->whereDate('shorttime_to', '>=', $dateto);
                    }
                    //  
                    if ($request->city != null) {
                        $listingsAll->whereIn('city_id', $request->city);
                    }
                    if ($request->listing_typy != null) {
                        $listingsAll->where('type_id', $request->listing_typy);
                    }

                    if ($request->bedroom != null) {
                        $listingsAll->where('beds', $request->bedroom);
                    }
                } elseif ($request->type  == 'sale') {
                    $listingsAll->where('purpose', 'sale');
                    if ($request->city != null) {
                        $listingsAll->whereIn('city_id', $request->city);
                    }
                    if ($request->listing_typy != null) {
                        $listingsAll->where('type_id', $request->listing_typy);
                    }
                    if ($request->size != null) {
                        $listingsAll->where('area', $request->size);
                    }
                    if ($request->price_from != null || $request->price_to != null) {
                        if ($request->price_from != null && $request->price_to != null) {
                            $listingsAll->where('price', '>=', $request->price_from);
                            $listingsAll->where('price', '<=', $request->price_to);
                        } elseif ($request->price_from != null) {
                            $listingsAll->where('price', '>=', $request->price_from);
                        } elseif ($request->price_to != null) {
                            $listingsAll->where('price', '<=', $request->price_to);
                        }
                    }
                    if ($request->bedroom != null) {
                        $listingsAll->where('beds', $request->bedroom);
                    }
                    if ($request->bathroom != null) {
                        $listingsAll->where('baths', $request->bathroom);
                    }
                    if ($request->furnitured != null) {
                        $listingsAll->where('furnished', $request->furnitured);
                    }
                    if ($request->parking != null) {
                        $listingsAll->where('parkings', $request->parking);
                    }
                } elseif ($request->type  == 'rent') {
                    $listingsAll->where('purpose', 'rent');
                    if ($request->city != null) {
                        $listingsAll->whereIn('city_id', $request->city);
                    }
                    if ($request->listing_typy != null) {
                        $listingsAll->where('type_id', $request->listing_typy);
                    }
                    if ($request->size != null) {
                        $listingsAll->where('area', $request->size);
                    }
                    if ($request->price_from != null || $request->price_to != null) {
                        if ($request->price_from != null && $request->price_to != null) {
                            $listingsAll->where('price', '>=', $request->price_from);
                            $listingsAll->where('price', '<=', $request->price_to);
                        } elseif ($request->price_from != null) {
                            $listingsAll->where('price', '>=', $request->price_from);
                        } elseif ($request->price_to != null) {
                            $listingsAll->where('price', '<=', $request->price_to);
                        }
                    }
                    if ($request->bedroom != null) {
                        $listingsAll->where('beds', $request->bedroom);
                    }
                    if ($request->bathroom != null) {
                        $listingsAll->where('baths', $request->bathroom);
                    }
                    if ($request->furnitured != null) {
                        $listingsAll->where('furnished', $request->furnitured);
                    }
                    if ($request->parking != null) {
                        $listingsAll->where('parkings', $request->parking);
                    }
                }
            }

            $data = [];
            foreach ($listingsAll->get() as $item) {

                if ($item->photo_main->isEmpty() != true) {
                    $image = $item->photo_main->first()->active == 'main' ? asset('listings/photos/agency_' . $agency->id . '/listing_' . $item->id . '/photo_' . $item->photo_main->first()->id . '/' . $item->photo_main->first()->main) : asset('listings/photos/agency_' . $agency->id . '/listing_' . $item->id . '/photo_' . $item->photo_main->first()->id . '/' . $item->photo_main->first()->watermark);
                } else {
                    $image = null;
                }

                $id = array(
                    'id' => $item->id,
                    'purpose' => $item->purpose ?? '',
                    'beds' => $item->beds ?? 0,
                    'parkings' => $item->parkings ?? 0,
                    'baths' => $item->baths ?? 0,
                    'area' => $item->area ?? '',
                    'furnished' => $item->furnished ?? 'no',
                    'title' => $item->title ?? '',
                    'location' => $item->location ?? '',
                    'price' => $item->price ?? '',
                    'rent_frequency' => $item->rent_frequency ?? '',
                    'image' => $image,
                    'shorttime_from' => $item->shorttime_from ?? '',
                    'shorttime_to' => $item->shorttime_to ?? '',
                );
                array_push($data, $id);
            }
            $listing_types = cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get();
            });
            $cities =  cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('cities')->where('country_id', $agency->country_id)->get();
            });

            return response()->json(array(
                'status' => 'success',
                'listing' => $data,
                'type' => $request->type,
                'listing_types' => $listing_types,
                'cities' => $cities,

            ), 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return response()->json(array(
                'status' => $e->getMessage()
            ), 401);
        }
    }

        /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function neerbyme(Request $request)
    {
        try {

            $validator = Validator::make(
                $request->all(),
                [
                    'business_token'  => 'required',
                    'agency_token'  => 'required',
                    'let'  => 'required',
                    'lang' => 'required',
                 
                ]
            );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error', 'message' => $validator->errors()->all()[0]), 401);
            }
            $latitude       =  $request->let;
            $longitude      =  $request->lang;
            // $distance      =  '20';
            $business = Business::where('business_token', $request->business_token)->firstOrFail();
            $agency   = Agency::where('business_id', $business->id)->where('agency_token', $request->agency_token)->firstOrFail();
            $listingsAll = Listing::whereHas('portalsList', function ($q) {
                $q->where('portal_id', 2);
            })->where([['agency_id', $agency->id]])->with(['photos', 'photo_main']);

            $listing_types = cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get();
            });
            $cities =  cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('cities')->where('country_id', $agency->country_id)->get();
            });
            if ($latitude && $longitude) {
             
                $listingsAll       = $listingsAll->select("*", DB::raw('(6371  * acos( cos( radians('.$latitude.') ) * cos( radians( loc_lat ) ) * cos( radians( loc_lng ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians(loc_lat) ) ) ) AS distance'))->orderBy(DB::raw('ISNULL(distance), distance'), 'ASC');

            }
            $listingsAll= $listingsAll->paginate();
            
            $data=ListingResource::collection($listingsAll);
         

            return response()->json(array(
                'status' => 'success',
                'listing' => $data->response()->getData(true),
                'type' => $request->type,
                'listing_types' => $listing_types,
                'cities' => $cities,

            ), 200);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return response()->json(array(
                'status' => $e->getMessage()
            ), 401);
        }
    }

    function location(){
        try {

            // 39.74311
            $latitude       =      request('lat');
            // -105.152332
            $longitude      =      request('lng');
            $stations = '';
            if (request('fuel')) {
                $fuel = explode(',', request('fuel'));
                $stations       =      Station::with(['stationFuels', 'stationFuels.fuel'])->whereHas('stationFuels', function ($q) use ($fuel) {
                    return $q->whereIn('fuel_id', $fuel);
                });
            } else {
                $stations       =      Station::with(['stationFuels', 'stationFuels.fuel']);
            }

            if (request('lat') && request('lng')) {
                $stations       = $stations->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                   * cos(radians(lat)) * cos(radians(lng) - radians(" . $longitude . "))
                   + sin(radians(" . $latitude . ")) * sin(radians(lat))) AS distance"));

                if (request('distance')) {

                    $stations          =       $stations->having('distance', '<', request('distance'));
                }
                $stations       =       $stations->orderBy('distance', 'asc');
            } else {
                $stations       =       $stations->select("*");
            }
            $stations          =       $stations->get();
            return response()->json(['status' => 'success', 'stations' => $stations], 200);
        } catch (\exception $e) {

            return response()->json(['status' => 'failed', 'message' => __('global.something_went_wrong')], 400);
        }
    }
}