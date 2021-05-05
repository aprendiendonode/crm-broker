<?php

namespace Modules\Agency\Http\Controllers;

use Gate;
use App\Models\Team;

use App\Models\User;
use App\Exports\TeamsExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{


    public function index($agency)
    {

        abort_if(Gate::denies('view_team'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business  = auth()->user()->business_id;
        $per_page  = 3;

        $teams = Team::where('agency_id', $agency)->where('business_id', auth()->user()->business_id)->paginate($per_page);
        $staffs = User::where('type', 'staff')->where('agency_id', $agency)->where('business_id', $business)->get();


        return view('agency::team.index', compact('agency', 'teams', 'business', 'staffs'));
    }



    public function store(Request $request)
    {

        abort_if(Gate::denies('add_team'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [

                'name_en'          =>  'required|string',
                'name_ar'          =>  'sometimes|nullable|string',
                'agency_id'        =>  'required|integer|exists:agencies,id',
                'business_id'      =>  'required|integer|exists:businesses,id'
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $user = Team::create([

                'name_en'            => $request->name_en,
                'name_ar'            => $request->name_ar,
                "business_id"        => $request->business_id,
                "agency_id"          => $request->agency_id,

            ]);

            DB::commit();
            return back()->with(flash(trans('agency.team_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }





    public function update($id, Request $request)
    {

        abort_if(Gate::denies('edit_team'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $team = Team::findorfail($id);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id          =>  'required|string',
                'edit_name_ar_' . $id          =>  'sometimes|nullable|string',


            ], [

                'edit_name_en_' . $id . '.required'              =>  trans('agency.name_en_required'),
                'edit_name_en_' . $id . '.string'                =>  trans('agency.name_en_string'),

                'edit_name_ar_' . $id . '.string'                =>  trans('agency.name_ar_string'),


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }



            $team->update([

                'name_en'            => $request->{'edit_name_en_' . $id},
                'name_ar'            => $request->{'edit_name_ar_' . $id},

            ]);


            DB::commit();
            return back()->with(flash(trans('agency.team_updated'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }




    public function destroy()
    {
        abort_if(Gate::denies('delete_team'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Team::findorfail(request('team_id'))->delete();

        return back()->withInput()->with(flash(trans('agency.team_deleted'), 'success'));
    }




    public function export($agency)
    {
        abort_if(Gate::denies('can_generate_reports'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Excel::download(new TeamsExport($agency), 'teams-list.xlsx');
    }


    public function add_member(Request $request)
    {

        abort_if(Gate::denies('edit_team'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        $team = Team::findorfail($request->team_id);

        try {


            $validator = Validator::make(
                $request->all(),
                [
                    'members'   => 'required|array|min:1',
                    'members.*' => 'integer|exists:users,id',
                ]

            );


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            User::whereIn('id', $request->members)->update(['team_id' => $request->team_id]);




            DB::commit();
            return back()->with(flash(trans('agency.team_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'));
        }
    }
}