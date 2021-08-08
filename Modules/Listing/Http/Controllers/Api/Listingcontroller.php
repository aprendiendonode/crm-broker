<?php

namespace Modules\Listing\Http\Controllers\Api;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Listing\Entities\Listing;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;

class ListingController extends Controller
{
     
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function home(Request $request){
      try{
        $validator = Validator::make($request->all(), [
            'business_token'  => 'required',
            'agency_token'  => 'required'
           ],[
                'business_token.required'  => 'Bussiness token is required',
                'agency_token.required'  => 'Agency token is required'
            ]
           );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error','message' =>$validator->errors()->all()[0]),401);
            }
            $business = Business::where('business_token', $request->business_token)->firstOrFail();
            $agency   = Agency::where('business_id', $business->id)->where('agency_token',$request->agency_token)->firstOrFail();
            $listing_types= cache()->remember('listing_types', 60 * 60 * 24, function () {
                return DB::table('listing_types')->get(['name_en','name_ar','id']);
                });
            $cities=  cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('cities')->where('country_id', $agency->country_id)->get();
                });
            $listingsAll=Listing::whereHas('portalsList', function($q){
                    $q->where('portal_id',2);
                })->where('agency_id',$agency->id)->with('photos')->take(6)->get();
              return response()->json(array(
                'status' => 'success',
                'listing' => $listingsAll,
                'listing_types' => $listing_types,
                'cities' => $cities,
            ),200);
          } catch (\Throwable $e) {
               return response()->json(array(
                   'status' => $e->getMessage()),401);
           }
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request,$type=null)
    {
       
      try {
          
          $validator = Validator::make($request->all(), [
            'business_token'  => 'required',
            'agency_token'  => 'required'
           ],[
                'business_token.required'  => 'Bussiness token is required',
                'agency_token.required'  => 'Agency token is required'
            ]
           );

            if ($validator->fails()) {
                return response()->json(array('status' => 'Error','message' =>$validator->errors()->all()[0]),401);
            }
          $business = Business::where('business_token', $request->business_token)->firstOrFail();
          $agency   = Agency::where('business_id', $business->id)->where('agency_token',$request->agency_token)->firstOrFail();
          if($type != null){
            $listingsAll=Listing::whereHas('portalsList', function($q){
                $q->where('portal_id',2);
            })->where([['agency_id',$agency->id],['purpose',$type]])->with('photos')->get();

          }else{

              $listingsAll=Listing::whereHas('portalsList', function($q){
                    $q->where('portal_id',2);
                  })->where('agency_id',$agency->id)->with('photos')->get();
          }

            $data=[];
            foreach($listingsAll as $item){
             
                if($item->photos->isEmpty() != true){
                    $image=$item->photos->first()->active == 'main' ? asset('listings/photos/agency_'.$agency->id.'/listing_'.$item->id.'/photo_'.$item->photos->first()->id.'/'.$item->photos->first()->main) : asset('listings/photos/agency_'.$agency->id.'/listing_'.$item->id.'/photo_'.$item->photos->first()->id.'/'.$item->photos->first()->watermark);
                }else{
                    $image=null;
                }
                
               $id=array(
                    'id' => $item->id,
                    'purpose' => $item->purpose ?? '',
                    'beds' => $item->beds ?? 0,
                    'parkings' => $item->parkings ??0,
                    'baths' => $item->baths ??0,
                    'area' => $item->area ?? '',
                    'furnished' => $item->furnished ?? 'no',
                    'title' => $item->title ?? '',
                    'location' => $item->location ?? '',
                    'price' => $item->price ?? '',
                    'rent_frequency' => $item->rent_frequency ?? '',
                    'image' =>$image,
                    );
                    array_push($data,$id);      
            }
          return response()->json(array(
             'status' => 'success',
             'listing' => $data),
             200);
           } catch (\Throwable $e) {
            return response()->json(array(
                'status' => 'Error'),401);
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
            $validator = Validator::make($request->all(), [
              'business_token'  => 'required',
              'agency_token'  => 'required',
              'listing_id'  => 'required'
             ],[
                  'business_token.required'  => 'Bussiness token is required',
                  'agency_token.required'  => 'Agency token is required'
              ]
             );
  
              if ($validator->fails()) {
                  return response()->json(array('status' => 'Error','message' =>$validator->errors()->all()[0]),401);
              }

              $business = Business::where('business_token', $request->business_token)->firstOrFail();
              $agency   = Agency::where('business_id', $business->id)->where('agency_token',$request->agency_token)->with('country')->firstOrFail();
              $listing=Listing::where([['agency_id',$agency->id],['id',$request->listing_id]])->with('videos','photos','documents','plans','addedBy')->first();
             //  image 
              $image=[];
              if($listing->photos->isEmpty() != true){
                  foreach ($listing->photos as $photos){
                    $img=$photos->active == 'main' ? asset('listings/photos/agency_'.$agency->id.'/listing_'.$listing->id.'/photo_'.$photos->id.'/'.$photos->main) : asset('listings/photos/agency_'.$agency->id.'/listing_'.$listing->id.'/photo_'.$photos->id.'/'.$photos->watermark);
                    array_push($image,$img);
                  }
               }
            //   plans
              $plans=[];
              if($listing->plans->isEmpty() != true){
                  foreach ($listing->plans as $photos){
                    $img=$photos->active == 'main' ? asset('listings/plans/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/plan_'.$photos->id.'/'.$photos->main) : asset('listings/plans/agency_'.$listing->agency_id.'/listing_'.$listing->id.'/plan_'.$photos->id.'/'.$photos->watermark);
                    array_push($plans,$img);
                  }
               }
            //  fueture filter 
                $filtered =$listing->features ? collect($listing->features) : collect();
                $features = $filtered->filter(function ($value, $key) {
                    return $value == 'yes';
                });
           //simiral properties 
           $listingsAll=Listing::whereHas('portalsList', function($q){
             $q->where('portal_id',2);
              })->where([['agency_id',$agency->id],['id','!=',$request->listing_id]])->with('photos')->take(4)->get(); 

              $data=[];
              foreach($listingsAll as $item){
               
                  if($item->photos->isEmpty() != true){
                      $imagelisting=$item->photos->first()->active == 'main' ? asset('listings/photos/agency_'.$agency->id.'/listing_'.$item->id.'/photo_'.$item->photos->first()->id.'/'.$item->photos->first()->main) : asset('listings/photos/agency_'.$agency->id.'/listing_'.$item->id.'/photo_'.$item->photos->first()->id.'/'.$item->photos->first()->watermark);
                  }else{
                      $imagelisting=null;
                  }
                  
                 $id=array(
                      'id' => $item->id,
                      'purpose' => $item->purpose ?? '',
                      'beds' => $item->beds ?? 0,
                      'parkings' => $item->parkings ??0,
                      'baths' => $item->baths ??0,
                      'area' => $item->area ?? '',
                      'furnished' => $item->furnished ?? 'no',
                      'title' => $item->title ?? '',
                      'location' => $item->location ?? '',
                      'price' => $item->price ?? '',
                      'rent_frequency' => $item->rent_frequency ?? '',
                      'image' =>$imagelisting,
                      );
                      array_push($data,$id);      
              }


          return response()->json(array(
                'status' => 'success',
                'listing' => $listing,
                'plans' => $plans,
                'agency' => $agency,
                'images' => $image,
                'features' => $features,
                'similiar_properties' =>$data,
                ),
                200);
             } catch (\Throwable $e) {
                dd($e);
              return response()->json(array(
                  'status' => 'Error','message' =>$e->getMessage()),401);
          }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function rented_list(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function buyed_listing($id)
    {
        return view('listing::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('listing::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
