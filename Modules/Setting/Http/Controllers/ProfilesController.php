<?php

namespace Modules\Setting\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\SuperAdmin\Entities\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;
use Modules\Setting\Http\Requests\UpdateProfile;

class ProfilesController extends Controller
{



    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, $agency)
    {
        abort_if(\Gate::denies('manage_own_profile'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findorfail($id);
        $countries = Country::all();

        return view('setting::profile.edit', compact('user', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|string|email|unique:users,email,' . $id,
                    'brn' => 'sometimes|nullable|string',
                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'description_en' => 'nullable|sometimes|string',
                    'description_ar' => 'nullable|sometimes|string',
                    'image' => 'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',
                    'nationality_id' => 'required|integer|exists:countries,id',
                    'country_code' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                    'city_code' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                    'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                    'cell_code' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                    'cell' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                    'fax_country_code' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                    'fax_city_code' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                    'staff_fax' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                    'address' => 'sometimes|nullable|string',
                    'zip' => 'sometimes|nullable|numeric',
                    'skype' => 'sometimes|nullable|string|email',
                    'whatsapp' => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',
                    'language' => 'required|in:en,ar',


                ],
                [
                    'email.required' => trans('agency.email_required'),
                    'email.string' => trans('agency.email_string'),
                    'email.email' => trans('agency.email_valid'),
                    'email.unique' => trans('agency.email_unique'),
                    'brn.string' => trans('agency.brn_string'),
                    'name_en.required' => trans('agency.name_en_required'),
                    'name_en.string' => trans('agency.name_en_string'),

                    'name_ar.string' => trans('agency.name_ar_string'),

                    'description_en.string' => trans('agency.description_en_string'),
                    'description_ar.string' => trans('agency.description_ar__string'),


                    'image.image' => trans('agency.image_not_image'),
                    'image.mimes' => trans('agency.image_not_valid_ext'),
                    'image.max' => trans('agency.image_max'),


                    'nationality_id.required' => trans('agency.nationality_required'),

                    'country_code.required' => trans('agency.country_code_required'),
                    'country_code.string' => trans('agency.country_code_string'),
                    'country_code.regex' => trans('agency.country_code_regex'),
                    'country_code.exists' => trans('agency.country_code_exists'),

                    'city_code.required' => trans('agency.city_code_required'),
                    'city_code.string' => trans('agency.city_code_string'),
                    'city_code.regex' => trans('agency.city_code_regex'),
                    'phone.required' => trans('agency.phone_required'),
                    'phone.string' => trans('agency.phone_string'),
                    'phone.regex' => trans('agency.phone_regex'),

                    'cell_code.string' => trans('agency.cell_code_string'),
                    'cell_code.regex' => trans('agency.cell_code_regex'),
                    'cell.string' => trans('agency.cell_string'),
                    'cell.string' => trans('agency.cell_regex'),

                    'fax_country_code.string' => trans('agency.fax_country_code_string'),
                    'fax_country_code.regex' => trans('agency.fax_country_code_regex'),


                    'fax_city_code.string' => trans('agency.fax_city_code_string'),
                    'fax_city_code.regex' => trans('agency.fax_city_code_regex'),


                    'staff_fax.string' => trans('agency.staff_fax_string'),
                    'staff_fax.regex' => trans('agency.staff_fax_regex'),


                    'address.string' => trans('agency.address_string'),

                    'zip.string' => trans('agency.zip_string'),

                    'skype.string' => trans('agency.skype_string'),

                    'skype.email' => trans('agency.skype_email'),


                    'whatsapp.string' => trans('agency.whatsapp_string'),
                    'whatsapp.regex' => trans('agency.whatsapp_regex'),

                ]
            );


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $user = User::findorfail(auth()->user()->id);

            if ($request->remove_image == 1) {
                remove_image($user->image, 'profile_images');
                $user->update([
                    'image' => null
                ]);
            }

            $data = [
                'email' => $request->email,
                'brn' => $request->brn,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'country_code' => $request->country_code,
                'city_code' => $request->city_code,
                'phone' => $request->phone,
                'cell_code' => $request->cell_code,
                'cell' => $request->cell,
                'fax_country_code' => $request->fax_country_code,
                'fax_city_code' => $request->fax_city_code,
                'staff_fax' => $request->staff_fax,
                'zip' => $request->zip,
                'address' => $request->address,
                'nationality_id' => $request->nationality_id,
                'whatsapp' => $request->whatsapp,
                'skype' => $request->skype,
                'language' => $request->language,
            ];


            if ($request->image != null) {
                $data += ['image' => upload_profile_image($request->image, 'profile_images', $user)];
            }
            $user->update($data);

            DB::commit();

            return back()->with(flash(trans('settings.success'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('settings.failed'), 'error'));
        }
    }


    public function change_password_view()
    {

        return view('setting::profile.change_password');
    }


    public function change_password_process(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:6|confirmed',
        ]);
        DB::beginTransaction();
        try {

            if (Hash::check($request->current_password, auth()->user()->password)) {

                $user = User::findorfail(auth()->user()->id);

                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);

                DB::commit();

                return back()->with(flash(trans('settings.success'), 'success'));
            }


            return back()->with(flash(trans('settings.failed'), 'error'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with(flash(trans('settings.failed'), 'error'));
        }
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