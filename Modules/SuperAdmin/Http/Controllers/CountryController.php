<?php

namespace Modules\SuperAdmin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $countries = null;
        if (request('country_id')) {
            $countries = Country::where('id', '=', request('country_id'))->latest();
        } else {
            $countries = Country::latest();
        }
        return view('superadmin::countries.index', [
            'countries' => $countries
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

                'name_en'    => ['required', 'string', 'max:225'],
                'name_ar'    => ['required', 'string', 'max:225'],
                'value'      => ['required', 'string', 'max:225'],
                'timezone'   => ['required', 'string', 'max:225'],
                'code'       => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                'flag'       => ['required', 'mimes:png,jpg,jpeg,gif', 'max:2048']

            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }


            $country =  Country::create([
                'name_en'         => $request->name_en,
                'name_ar'         => $request->name_ar,
                'value'           => $request->value,
                'phone_code'      => $request->code,
                'time_zone'       => $request->timezone,
            ]);

            $name = Str::lower($country->value) . '.' . $request->file('flag')->getClientOriginalExtension();
            if ($request->flag != null) {
                $flag =  upload_flag($request->flag, 'images/flags', $name, $country);
                $country->update(['flag' =>  $flag]);
            }

            DB::commit();
            cache()->forget('countries');
            return back()->with(flash(trans('superadmin.countries.countries.country_added'), 'success'));
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

        $country = Country::findorfail($id);
        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id    => ['required', 'string', 'max:225'],
                'edit_name_ar_' . $id    => ['required', 'string', 'max:225'],
                'edit_value_' . $id      => ['required', 'string', 'max:225'],
                'edit_timezone_' . $id   => ['required', 'string', 'max:225'],
                'edit_code_' . $id       => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
                'edit_flag_' . $id       => ['sometimes', 'nullable', 'mimes:png,jpg,jpeg,gif', 'max:2048']


            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }

            $flag = '';
            if ($request->has('edit_flag_' . $id)) {
                $name = Str::lower($country->value) . '.' . $request->file('edit_flag_' . $id)->getClientOriginalExtension();

                $flag =  upload_flag($request->{'edit_flag_' . $id}, 'images/flags', $name, $country);
            }
            $country->update([
                'name_en'         => $request->{'edit_name_en_' . $id},
                'name_ar'         => $request->{'edit_name_ar_' . $id},
                'value'           => $request->{'edit_value_' . $id},
                'phone_code'      => $request->{'edit_code_' . $id},
                'time_zone'       => $request->{'edit_timezone_' . $id},
                'flag'            => $flag,
            ]);

            cache()->forget('countries');
            return back()->with(flash(trans('superadmin.countries.country_updated'), 'success'))->with('open-edit-tab', $id);
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

            $country = Country::where('id', $id)->firstOrFail();

            $country->delete();

            return back()->with(flash(trans('superadmin.countries.country_deleted'), 'success'));
        } catch (\Exception $e) {

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'));
        }
    }
}