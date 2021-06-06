<?php

namespace Modules\Agency\Http\Controllers;

use Gate;
use App\Models\Team;
use App\Models\User;


use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\PermissionGroup;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\SuperAdmin\Entities\Country;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class StaffController extends Controller
{


    public function index($agency)
    {

        abort_if(Gate::denies('view_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();
        $business  = auth()->user()->business_id;
        $per_page  = 3;

        $staffs = null;
        $staffs = User::where('type', 'staff')->where('agency_id', $agency)->where('business_id', auth()->user()->business_id);

        if (request('staff') != null) {
            $staffs->where('id', request('staff'));
        }

        if (request('filter_team') != null) {
            $staffs->where('team_id', request('filter_team'));
        }
        if (request('filter_name') != null) {
            $staffs->where('name_en', 'like', '%' . request('filter_name') . '%');
        }

        if (request('filter_email') != null) {

            $staffs->where('email',  request('filter_email'));
        }



        if (request('filter_country_code') != null) {
            $staffs->where('country_code', 'like', '%' . request('filter_country_code') . '%');
        }
        if (request('filter_city_code')  != null) {
            $staffs->where('city_code', 'like', '%' . request('filter_city_code') . '%');
        }

        if (request('filter_phone') != null) {
            $staffs->where('city_code', 'like', '%' . request('filter_phone') . '%');
        }

        if (request('filter_nationality') != null) {
            $staffs->where('nationality_id', 'like', '%' . request('filter_nationality') . '%');
        }



        $staffs = $staffs->paginate($per_page);
        $emails = User::where('type', 'staff')->where('agency_id', $agency)->where('business_id', auth()->user()->business_id)->pluck('email')->toArray();
        $teams  = Team::where('agency_id', $agency)->get();
        return view('agency::staff.index', compact('countries', 'agency', 'staffs', 'business', 'emails', 'teams'));
    }



    public function store(Request $request)
    {

        abort_if(Gate::denies('add_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [
                'email'            =>  'required|string|email|unique:users,email',
                'brn'              =>  'sometimes|nullable|string',
                'active'           =>  'required|in:0,1',
                'name_en'          =>  'required|string',
                'name_ar'          =>  'sometimes|nullable|string',
                'description_en'   =>  'nullable|sometimes|string',
                'description_ar'   =>  'nullable|sometimes|string',
                'image'            =>  'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',
                'nationality_id'   =>  'required|integer|exists:countries,id',
                'team_id'          =>  'sometimes|nullable|exists:teams,id',
                'phone'            =>  'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'cell'             => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'staff_fax'        => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'address'          => 'sometimes|nullable|string',
                'zip'              => 'sometimes|nullable|numeric',
                'skype'            => 'sometimes|nullable|string|email',
                'whatsapp'         => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',


                'password'         => 'required|confirmed|min:6',
                'agency_id'        => 'required|integer|exists:agencies,id',
                'business_id'      => 'required|integer|exists:businesses,id'
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $user = User::create([
                'email'              => $request->email,
                'brn'                => $request->brn,
                'name_en'            => $request->name_en,
                'name_ar'            => $request->name_ar,
                'description_en'     => $request->description_en,
                'description_ar'     => $request->description_ar,
                'password'           => Hash::make($request->password),


                'phone'              => $request->phone,


                'cell'               => $request->cell,


                'staff_fax'          => $request->staff_fax,


                'address'            => $request->address,
                'zip'                => $request->zip,
                'nationality_id'     => $request->nationality_id,
                "skype"              => $request->skype,
                "active"             => $request->active,
                "whatsapp"           => $request->whatsapp,
                "team_id"            => $request->team_id,
                "agency_id"          => $request->agency_id,
                'business_id'        => $request->business_id,
                'can_access'         => $request->agency_id,
            ]);

            $image = '';
            if ($user) {

                $defaul_permissions = [1, 2, 3, 5, 6, 8, 9, 10, 48, 17, 42, 45, 52, 19, 20, 30, 35, 50];

                foreach ($defaul_permissions as $permission) {
                    $user->givePermissionTo($permission);
                }

                if ($request->hasFile('image')) {

                    $image =  upload_profile_image($request->image, 'profile_images', $user);

                    $user->update(['image' => $image]);
                }
            } else {
                return back()->withInput()->with(flash(trans('agency.staff_creating_failed'), 'error'))->with('open-tab', 'yes');
            }
            DB::commit();
            return back()->with(flash(trans('agency.staff_created'), 'success'));
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }





    public function update($id, Request $request)
    {

        abort_if(Gate::denies('edit_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::findorfail($id);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'edit_email_' . $id            =>  "required|string|email|unique:users,email," . $id,
                'edit_brn_' . $id              =>  'sometimes|nullable|string',
                'edit_active_' . $id           =>  'required|in:0,1',
                'edit_name_en_' . $id          =>  'required|string',
                'edit_name_ar_' . $id          =>  'sometimes|nullable|string',
                'edit_description_en_' . $id   =>  'nullable|sometimes|string',
                'edit_description_ar_' . $id   =>  'nullable|sometimes|string',
                'edit_image_' . $id            =>  'nullable|sometimes|image|mimes:jpg,png,jpeg|max:2024',
                'edit_nationality_id_' . $id   =>  'required|integer|exists:countries,id',
                'edit_team_id_' . $id          =>  'sometimes|nullable|exists:teams,id',
                'edit_phone_' . $id            =>  'required||string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'edit_cell_' . $id             => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'edit_staff_fax_' . $id        => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

                'edit_address_' . $id          => 'sometimes|nullable|string',
                'edit_zip_' . $id              => 'sometimes|nullable|numeric',
                'edit_skype_' . $id            => 'sometimes|nullable|string|email',
                'edit_whatsapp_' . $id         => 'sometimes|nullable|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:20',

            ], [
                'edit_email_' . $id . '.required'              =>  trans('agency.email_required'),
                'edit_email_' . $id . '.string'                =>  trans('agency.email_string'),
                'edit_email_' . $id . '.email'                 =>  trans('agency.email_valid'),
                'edit_email_' . $id . '.unique'                =>  trans('agency.email_unique'),
                'edit_brn_' . $id . '.string'                  =>  trans('agency.brn_string'),
                'edit_active_' . $id . '.required'             =>  trans('agency.active_required'),
                'edit_active_' . $id . '.in'                   =>  trans('agency.active_in'),
                'edit_name_en_' . $id . '.required'              =>  trans('agency.name_en_required'),
                'edit_name_en_' . $id . '.string'                =>  trans('agency.name_en_string'),

                'edit_name_ar_' . $id . '.string'                =>  trans('agency.name_ar_string'),

                'edit_description_en_' . $id . '.string'   => trans('agency.description_en_string'),
                'edit_description_ar_' . $id . '.string'   => trans('agency.description_ar__string'),


                'edit_image_' . $id . '.image'            => trans('agency.image_not_image'),
                'edit_image_' . $id . '.mimes'            => trans('agency.image_not_valid_ext'),
                'edit_image_' . $id . '.max'              => trans('agency.image_max'),


                'edit_nationality_id_' . $id . '.required'  => trans('agency.nationality_required'),
                'edit_team_id_' . $id . '.exists'          => trans('agency.team_exists'),

                'edit_country_code_' . $id . '.required'     => trans('agency.country_code_required'),
                'edit_country_code_' . $id . '.string'       =>  trans('agency.country_code_string'),
                'edit_country_code_' . $id . '.regex'        =>  trans('agency.country_code_regex'),
                'edit_country_code_' . $id . '.exists'        =>  trans('agency.country_code_exists'),

                'edit_city_code_' . $id . '.required'        => trans('agency.city_code_required'),
                'edit_city_code_' . $id . '.string'          =>  trans('agency.city_code_string'),
                'edit_city_code_' . $id . '.regex'           =>  trans('agency.city_code_regex'),
                'edit_phone_' . $id . '.required'            => trans('agency.phone_required'),
                'edit_phone_' . $id . '.string'              => trans('agency.phone_string'),
                'edit_phone_' . $id . '.regex'               => trans('agency.phone_regex'),

                'edit_cell_code_' . $id . '.string'       => trans('agency.cell_code_string'),
                'edit_cell_code_' . $id . '.regex'       => trans('agency.cell_code_regex'),
                'edit_cell_' . $id    . '.string'         => trans('agency.cell_string'),
                'edit_cell_' . $id    . '.string'         => trans('agency.cell_regex'),

                'edit_fax_country_code_' . $id . '.string'     => trans('agency.fax_country_code_string'),
                'edit_fax_country_code_' . $id . '.regex'     => trans('agency.fax_country_code_regex'),


                'edit_fax_city_code_' . $id . '.string'       => trans('agency.fax_city_code_string'),
                'edit_fax_city_code_' . $id . '.regex'       => trans('agency.fax_city_code_regex'),


                'edit_staff_fax_' . $id . '.string'       => trans('agency.staff_fax_string'),
                'edit_staff_fax_' . $id . '.regex'       => trans('agency.staff_fax_regex'),



                'edit_address_' . $id . '.string'       => trans('agency.address_string'),

                'edit_zip_' . $id . '.string'       => trans('agency.zip_string'),

                'edit_skype_' . $id . '.string'       => trans('agency.skype_string'),

                'edit_skype_' . $id . '.email'       => trans('agency.skype_email'),


                'edit_whatsapp_' . $id . '.string'       => trans('agency.whatsapp_string'),
                'edit_whatsapp_' . $id . '.regex'          => trans('agency.whatsapp_regex'),



            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }



            $user->update([
                'email'              => $request->{'edit_email_' . $id},
                'brn'                => $request->{'edit_brn_' . $id},
                'name_en'            => $request->{'edit_name_en_' . $id},
                'name_ar'            => $request->{'edit_name_ar_' . $id},
                'description_en'     => $request->{'edit_description_en_' . $id},
                'description_ar'     => $request->{'edit_description_ar_' . $id},


                'country_code'       => $request->{'edit_country_code_' . $id},
                'city_code'          => $request->{'edit_city_code_' . $id},
                'phone'              => $request->{'edit_phone_' . $id},


                'cell_code'          => $request->{'edit_cell_code_' . $id},
                'cell'               => $request->{'edit_cell_' . $id},


                'fax_country_code'   => $request->{'edit_fax_country_code_' . $id},
                'fax_city_code'      => $request->{'edit_fax_city_code_' . $id},
                'staff_fax'          => $request->{'edit_staff_fax_' . $id},


                'address'            => $request->{'edit_address_' . $id},
                'zip'                => $request->{'edit_zip_' . $id},
                'nationality_id'     => $request->{'edit_nationality_id_' . $id},
                "skype"              => $request->{'edit_skype_' . $id},
                "active"             => $request->{'edit_active_' . $id},
                "whatsapp"           => $request->{'edit_whatsapp_' . $id},
                "team_id"            => $request->{'edit_team_id_' . $id},

            ]);

            $image = '';

            if ($request->hasFile('edit_image_' . $id)) {

                $image =  upload_profile_image($request->{'edit_image_' . $id}, 'profile_images', $user);

                $user->update(['image' => $image]);
            }

            DB::commit();
            return back()->with(flash(trans('agency.staff_updated'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }



    public function privileges($agency, $staff)
    {

        abort_if(Gate::denies('manage_all_staff_privileges'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $permission_groups = PermissionGroup::all();
        $staff = User::findorfail($staff);
        $defaults = [1, 2, 3, 5, 6, 8, 9, 10, 48, 17, 42, 45, 52, 19, 20, 22, 30, 35, 50];

        $permissions = $staff->permissions->pluck('id')->toArray();
        return view('agency::staff.privileges', compact('permission_groups', 'staff', 'permissions', 'defaults'));
    }


    public function update_privileges(Request $request)
    {

        abort_if(Gate::denies('manage_all_staff_privileges'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'staff_id' => 'required|integer',
                'permission.*' => 'integer|exists:permissions,id',
            ]);

            if ($validator->fails()) {
                back()->withInput()->with(flash(trans('agency.privileges_wasnt_saved'), 'error'));
            }



            $staff = User::findorfail($request->staff_id);


            $staff->syncPermissions($request->permission);

            DB::commit();
            return back()->with(flash(trans('agency.privileges_updated'), 'success'));
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.privileges_wasn_saved'), 'error'));
        }
    }



    public function change_password(Request $request)
    {

        abort_if(Gate::denies('edit_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        $user =  User::findorfail($request->user_id);
        try {
            $validator = Validator::make($request->all(), [
                'password'    => 'required|confirmed|min:6'
            ], [
                'password.confirm' => trans('agency.password_confirm'),
                'password.min' => trans('agency.password_min'),
            ]);

            if ($validator->fails()) {

                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            $user->update([
                'password' => Hash::make($request->password)
            ]);

            DB::commit();

            return back()->with(flash(trans('agency.password_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.password_wasn_saved'), 'error'));
        }
    }


    public function destroy()
    {
        abort_if(Gate::denies('delete_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        User::findorfail(request('user_id'))->delete();

        return back()->withInput()->with(flash(trans('agency.staff_deleted'), 'success'));
    }




    public function export($agency)
    {
        abort_if(Gate::denies('can_generate_reports'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Excel::download(new UsersExport($agency), 'users-list.xlsx');
    }


    public function moderator(Request $request)
    {

        abort_if(!owner(), Response::HTTP_FORBIDDEN, '403 Forbidden');



        $user = User::findorfail($request->user_id);

        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'user_id' =>  'required|integer',
                'agencies.*' => 'integer|exists:agencies,id',
            ]);

            if ($validator->fails()) {
                return  back()->withInput()->with(flash(trans('agency.proccess_wasnt_saved'), 'error'));
            }

            $agencies = implode(',', $request->agencies);
            $user->update([
                'can_access' => $agencies,
                'type'       => 'moderator',
            ]);

            if ($request->make_admin == 'yes') {
                $permissions = Permission::pluck('id')->toArray();
                $user->syncPermissions($permissions);
            }


            DB::commit();
            return back()->with(flash(trans('agency.staff_promoted'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return  back()->withInput()->with(flash(trans('agency.proccess_wasnt_saved'), 'error'));
        }
    }
}