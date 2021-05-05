<?php

namespace Modules\Sales\Http\Controllers;

use Gate;
use App\Models\Team;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Sales\Entities\CallStatus;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CallStatusController extends Controller
{


    public function index($agency)
    {

        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business  = auth()->user()->business_id;
        $per_page  = 100;

        $call_status = CallStatus::where('agency_id', $agency)->where('business_id', auth()->user()->business_id)->paginate($per_page);


        return view('sales::settings.callstatus.index', compact('agency', 'call_status', 'business'));
    }



    public function store(Request $request)
    {

        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


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

            CallStatus::create([

                'name_en'            => $request->name_en,
                'slug'               => Str::slug($request->name_en, '-'),
                'name_ar'            => $request->name_ar,
                "business_id"        => $request->business_id,
                "agency_id"          => $request->agency_id,

            ]);

            DB::commit();
            return back()->with(flash(trans('sales.status_created'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }





    public function update($id, Request $request)
    {

        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $call_status = CallStatus::findorfail($id);
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



            $call_status->update([

                'name_en'            => $request->{'edit_name_en_' . $id},
                'slug'               => Str::slug($request->{'edit_name_en_' . $id}, '-'),

                'name_ar'            => $request->{'edit_name_ar_' . $id},

            ]);


            DB::commit();
            return back()->with(flash(trans('sales.status_updated'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('agency.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }




    public function destroy()
    {
        abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        CallStatus::findorfail(request('status_id'))->delete();

        return back()->withInput()->with(flash(trans('sales.status_deleted'), 'success'));
    }




    public function add_call_status(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en'  => 'required|string',
                    'name_ar'  => 'sometimes|nullable|string',
                    'agency'   => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $status = CallStatus::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.status_created'), 'data' => $status], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }
}