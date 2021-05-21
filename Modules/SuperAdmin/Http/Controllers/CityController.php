<?php

namespace Modules\SuperAdmin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $paginate = false;

        $cities = null;

        if (request('country_id') && !request('city')) {
            $cities = City::with('country')->Where('country_id', request('country_id'))

                ->get();
        }


        if (request('city') && !request('country_id')) {
            // dd('here');
            $cities = City::with('country')->where('name_en', 'like', '%' . request('city') . '%')
                ->orWhere('name_ar', 'like', '%' . request('city') . '%')
                ->get();
        }

        if (request('country_id') && request('city')) {
            $cities = City::with('country')->Where('country_id', request('country_id'))
                ->where('name_en', 'like', '%' . request('city') . '%')
                ->orWhere('name_ar', 'like', '%' . request('city') . '%')
                ->get();
        }


        if (!request('country_id') && !request('city')) {
            $paginate = true;
            $cities =  City::with('country')->latest()->paginate(50);
        }

        return view('superadmin::cities.index', [
            'paginate'   => $paginate,
            'cities'     => $cities,
            'countries'  => Country::all()
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
                'code'             => ['sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                'country_id'       => ['required', 'exists:countries,id']

            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }


            $City =  City::create([
                'name_en'         => $request->name_en,
                'name_ar'         => $request->name_ar,
                'code'         => $request->code,
                'country_id'         => $request->country_id,

            ]);

            DB::commit();
            cache()->forget('cities');
            return back()->with(flash(trans('superadmin.cities.cities.city_added'), 'success'));
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

        $City = City::findorfail($id);
        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id    => ['required', 'string', 'max:225'],
                'edit_name_ar_' . $id    => ['required', 'string', 'max:225'],
                'edit_code_' . $id       => ['sometimes', 'nullable', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                'edit_country_id_' . $id       => ['required', 'exists:countries,id']

            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }


            $City->update([
                'name_en'         => $request->{'edit_name_en_' . $id},
                'name_ar'         => $request->{'edit_name_ar_' . $id},
                'code'         => $request->{'edit_code_' . $id},
                'country_id'         => $request->{'edit_country_id_' . $id},

            ]);
            cache()->forget('cities');
            return back()->with(flash(trans('superadmin.cities.city_updated'), 'success'))->with('open-edit-tab', $id);
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

            $city = City::where('id', $id)->firstOrFail();
            $city->delete();

            return back()->with(flash(trans('superadmin.cities.city_deleted'), 'success'));
        } catch (\Exception $e) {

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }
}