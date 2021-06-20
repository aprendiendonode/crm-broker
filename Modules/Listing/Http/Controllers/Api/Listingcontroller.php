<?php

namespace Modules\Listing\Http\Controllers\Api;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Listing\Entities\Listing;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;

class Listingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
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
          $listingsAll=Listing::whereHas('portalsList', function($q){
                $q->where('portal_id',2);
              })->where('agency_id',$agency->id)->with('photos')->get();

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
              $agency   = Agency::where('business_id', $business->id)->where('agency_token',$request->agency_token)->firstOrFail();
              $listing=Listing::where('agency_id',$agency->id)->with('photos')->first();
                return response()->json(array(
                'status' => 'success',
                'listing' => $listing),
                200);
             } catch (\Throwable $e) {
                
              return response()->json(array(
                  'status' => 'Error','message' =>$e->getMessage()),401);
          }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
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
