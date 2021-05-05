<?php

namespace Modules\Sales\Http\Controllers;

use Gate;
use App\Models\Team;

use App\Models\User;
use Illuminate\Support\Str;
use App\Exports\TeamsExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Sales\Entities\LeadType;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LeadTypesController extends Controller
{


    public function index($agency)
    {

        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business  = auth()->user()->business_id;
        $per_page  = 100;

        $lead_types = LeadType::where('agency_id', $agency)->where('business_id', auth()->user()->business_id)->paginate($per_page);


        return view('sales::settings.leadtypes.index', compact('agency', 'lead_types', 'business'));
    }



    public function store(Request $request)
    {

        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        DB::beginTransaction();

        try {
            $validator = Validator::make($request->all(), [

                'name_en'          =>  'required|string',
                'name_ar'          =>  'sometimes|nullable|string',
                'role'             =>  'required|string|in:investor,tenant,buyer,enquirer,seller,agent,other',
                'agency_id'        =>  'required|integer|exists:agencies,id',
                'business_id'      =>  'required|integer|exists:businesses,id'
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            LeadType::create([

                'name_en'            => $request->name_en,
                'slug'               => Str::slug($request->name_en, '-'),
                'role'               => $request->role,
                'name_ar'            => $request->name_ar,
                "business_id"        => $request->business_id,
                "agency_id"          => $request->agency_id,

            ]);

            DB::commit();
            return back()->with(flash(trans('sales.type_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }





    public function update($id, Request $request)
    {

        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead_source = LeadType::findorfail($id);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [

                'edit_name_en_' . $id          =>  'required|string',
                'edit_name_ar_' . $id          =>  'sometimes|nullable|string',
                'edit_role_' . $id             =>  'required|string|in:investor,tenant,buyer,enquirer,seller,agent,other',


            ], [

                'edit_name_en_' . $id . '.required'              =>  trans('agency.name_en_required'),
                'edit_name_en_' . $id . '.string'                =>  trans('agency.name_en_string'),

                'edit_name_ar_' . $id . '.string'                =>  trans('agency.name_ar_string'),


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }



            $lead_source->update([

                'name_en'            => $request->{'edit_name_en_' . $id},
                'name_ar'            => $request->{'edit_name_ar_' . $id},
                'slug'               => Str::slug($request->{'edit_name_en_' . $id}, '-'),
                'role'               => $request->{'edit_role_' . $id},


            ]);

            DB::commit();
            return back()->with(flash(trans('sales.type_updated'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }




    public function destroy()
    {
        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        LeadType::findorfail(request('type_id'))->delete();

        return back()->withInput()->with(flash(trans('sales.type_deleted'), 'success'));
    }
}