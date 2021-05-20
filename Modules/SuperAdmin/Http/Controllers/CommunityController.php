<?php

namespace Modules\SuperAdmin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Support\Facades\Validator;
use Modules\SuperAdmin\Entities\Community;
use Illuminate\Contracts\Support\Renderable;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $paginate = false;
        $communities = Community::with('city.country');

        if (request('city_id')) {
            $communities = $communities->where('city_id', request('city_id'));
        }
        if (request('community')) {
            $communities = $communities->where(function ($query) {
                $query
                    ->where('name_en', 'like', '%' . request('community') . '%')
                    ->orWhere('name_ar', 'like', '%' . request('community') . '%');
            });
        }

        if (request('country_id')) {
            $communities = $communities->whereHas('city.country', function ($q) {
                return $q->where('id', request('country_id'));
            });
        }


        if (!request('country_id') && !request('city_id') && !request('community')) {
            $paginate = true;
            $communities =  Community::latest()->paginate(50);
        } else {
            $communities = $communities->get();
        }


        return view('superadmin::communities.index', [
            'paginate'    => $paginate,
            'communities' => $communities,
            'cities'      => City::all(),
            'countries'   => Country::all()
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
                'city_id'          => ['required', 'exists:cities,id']

            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }


            $Community =  Community::create([
                'name_en'         => $request->name_en,
                'name_ar'         => $request->name_ar,
                'city_id'         => $request->city_id,

            ]);

            DB::commit();
            return back()->with(flash(trans('superadmin.communities.communities.community_added'), 'success'));
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

        $Community = Community::findorfail($id);
        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id    => ['required', 'string', 'max:225'],
                'edit_name_ar_' . $id    => ['required', 'string', 'max:225'],
                'edit_city_id_' . $id       => ['required', 'exists:cities,id']

            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }


            $Community->update([
                'name_en'         => $request->{'edit_name_en_' . $id},
                'name_ar'         => $request->{'edit_name_ar_' . $id},
                'city_id'         => $request->{'edit_city_id_' . $id},

            ]);
            return back()->with(flash(trans('superadmin.communities.community_updated'), 'success'))->with('open-edit-tab', $id);
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

            $community = Community::where('id', $id)->firstOrFail();
            $community->delete();

            return back()->with(flash(trans('superadmin.communities.community_deleted'), 'success'));
        } catch (\Exception $e) {

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }
}
