<?php

namespace Modules\Listing\Http\Controllers\Api;

use App\Models\Agency;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class Listingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
      try {
          //code...
          $business = Business::where('business_token', '1CecqRpAW2Yi2yttT0esqpKSHKbzrzFw7AeYq31rlYdZaRWhuJQsnj79H8Zf')->firstOrFail();
          $agency   = Agency::where('business_id', $business->id)->where('agency_token', 'hLrmNWDmtEfLQjDNB9dNpwHFyQHFPliIgB9mHq4ZC1bV5FOedghrLT6GQmaG')->firstOrFail();
          //   $agency->listingsAll->Where('portals','like', '%' .'2'.'%');
        //   dd($agency->listingsAll);
          return response()->json(array(
            'status' => 'success',
            'listing' => $agency->listingsAll),
            200);
        } catch (\Throwable $th) {
            return response()->json(array(
                'status' => 'Error'),401);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('listing::create');
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
