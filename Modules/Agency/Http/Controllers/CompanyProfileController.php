<?php

namespace Modules\Agency\Http\Controllers;

use Gate;

use App\Models\User;
use App\Models\Agency;
use App\Models\Language;
use App\Exports\TeamsExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\SuperAdmin\Entities\City;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CompanyProfileController extends Controller
{


    public function index($agency)
    {

        abort_if(Gate::denies('manage_agency_profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business  = auth()->user()->business_id;


        $agency = Agency::where('id', $agency)->where('business_id', $business)->first();
        if (!$agency) {
            abort(404);
        }
        $countries = Country::all();
        $languages = Language::all();
        $cities    = City::all();

        return view(
            'agency::company_profile.index',
            compact('agency', 'business', 'countries', 'cities', 'languages')
        );
    }



    public function update($id, Request $request)
    {
        $agency = Agency::findorfail($id);
        abort_if(Gate::denies('manage_agency_profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($request->all());
        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [

                'company_name_en'  => 'required|string',
                'company_name_ar'  => 'sometimes|nullable|string',

                'company_email'    => 'required|string|email|unique:users,email,' . $id,

                'description_en'   => 'nullable|sometimes|string',
                'description_ar'   => 'nullable|sometimes|string',

                'country_code'     => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                'country_symbol'     => 'required|string',
                //                'city_code'        => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                'phone'            => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',


                'cell_code'        => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                'cell_symbol'        => 'sometimes|nullable|string',
                'cell'             => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'website'          => 'sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',


                'fax_country_code' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                'fax_city_code'    => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                'company_fax'      => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',


                'address'          => 'sometimes|nullable|string',

                'trade_license'    => 'sometimes|nullable|string',

                'image'            => 'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',

                'company_orn'      => 'sometimes|nullable|string',

                'country_id'       => 'required|integer|exists:countries,id',
                'language_id'       => 'required|integer|exists:languages,id',
                'city_id'          => 'sometimes|nullable|integer|exists:cities,id',



            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $image = '';
            if ($request->image != null) {
                $image = upload_agency_image($request->image, 'company_profile_images', $agency);
            }

            $agency->update([

                'company_name_en'  => $request->company_name_en,
                'company_name_ar'  => $request->company_name_ar,

                'company_email'    => $request->company_email,


                'description_en'   => $request->description_en,
                'description_ar'   => $request->description_ar,

                'country_code'     => $request->country_code,
                'country_symbol'     => $request->country_symbol,
                'city_code'        => $request->city_code,
                'phone'            => $request->phone,

                'cell_code'        => $request->cell_code,
                'cell_symbol'        => $request->cell_symbol,
                'cell'             => $request->cell,

                'website'          => $request->website,

                'fax_country_code' => $request->fax_country_code,
                'fax_city_code'    => $request->fax_city_code,
                'company_fax'      => $request->company_fax,
                'address'          => $request->address,

                'trade_license'    => $request->trade_license,
                'image'            => $image,

                'company_orn'      => $request->company_orn,

                'country_id'       => $request->country_id,
                'city_id'          => $request->city_id,
                'language_id'          => $request->language_id,

            ]);

            DB::commit();
            cache()->forget('cities');
            cache()->forget('communities');
            cache()->forget('sub_communities');

            return back()->with(flash(trans('agency.agency_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'));
        }
    }
}