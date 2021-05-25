<?php

namespace Modules\SuperAdmin\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Support\Facades\Validator;
use Modules\SuperAdmin\Entities\Community;
use Illuminate\Contracts\Support\Renderable;
use Modules\SuperAdmin\Entities\SubCommunity;

class SubCommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $paginate = false;
        $sub_communities = SubCommunity::with(['community.city.country', 'community.city', 'community']);

        if (request('city_id')) {
            $sub_communities = $sub_communities->whereHas('community.city', function ($q) {
                $q->where('id', request('city_id'));
            });
        }
        if (request('community')) {
            $sub_communities = $sub_communities->where('community_id', request('community'));
        }

        if (request('country_id')) {
            $sub_communities = $sub_communities->whereHas('community.city.country', function ($q) {
                return $q->where('id', request('country_id'));
            });
        }
        if (request('sub_community')) {

            $sub_communities = $sub_communities->where(function ($query) {
                $query
                    ->where('name_en', 'like', '%' . request('sub_community') . '%')
                    ->orWhere('name_ar', 'like', '%' . request('sub_community') . '%');
            });
        }


        if (!request('country_id') && !request('city_id') && !request('community') && !request('sub_community')) {
            $paginate = true;
            $sub_communities =  SubCommunity::latest()->paginate(50);
        } else {
            $sub_communities = $sub_communities->get();
        }




        return view('superadmin::sub_communities.index', [
            'sub_communities' => $sub_communities,
            'paginate'        => $paginate,
            'communities'     => Community::all(),
            'cities'          => City::all(),
            'countries'       => Country::all()
        ]);
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [

                'name_en'          => ['required', 'string', 'max:225'],
                'name_ar'          => ['required', 'string', 'max:225'],
                'community_id'          => ['required', 'exists:communities,id']

            ]);

            $community = Community::findOrFail($request->community_id);
            $city = City::findOrFail($community->city_id);
            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }


            $SubCommunity =  SubCommunity::create([
                'name_en'              => $request->name_en,
                'name_ar'              => $request->name_ar,
                'community_id'         => $request->community_id,
                'country_id'           => $city->country_id

            ]);

            DB::commit();
            cache()->forget('sub_communities');
            return back()->with(flash(trans('superadmin.sub_communities.sub_added'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }





    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $SubCommunity = SubCommunity::findorfail($id);

        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id    => ['required', 'string', 'max:225'],
                'edit_name_ar_' . $id    => ['required', 'string', 'max:225'],
                'edit_community_id_' . $id       => ['required', 'exists:communities,id']

            ]);
            $community = Community::findOrFail($request->{'edit_community_id_' . $id});
            $city = City::findOrFail($community->city_id);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }


            $SubCommunity->update([
                'name_en'               => $request->{'edit_name_en_' . $id},
                'name_ar'               => $request->{'edit_name_ar_' . $id},
                'community_id'          => $request->{'edit_community_id_' . $id},
                'country_id'            => $city->country_id

            ]);
            cache()->forget('sub_communities');

            return back()->with(flash(trans('superadmin.sub_communities.sub_updated'), 'success'))->with('open-edit-tab', $id);
        } catch (\Exception $e) {
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {

            $community = SubCommunity::where('id', $id)->firstOrFail();
            $community->delete();

            return back()->with(flash(trans('superadmin.sub_communities.sub_deleted'), 'success'));
        } catch (\Exception $e) {

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }
}