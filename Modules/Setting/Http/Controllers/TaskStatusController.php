<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Activity\Entities\TaskStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class TaskStatusController extends Controller
{

    public function index($agency)
    {
        $per_page       = 2;
        $task_status = TaskStatus::where('agency_id',$agency)->orderBy('id', 'desc')->paginate($per_page);
        $business  = auth()->user()->business_id;

        return view('setting::task_status.index',compact('task_status','agency','business'));
    }

    public function store(Request $request)
    {


        try {
            // Begin a transaction
            DB::beginTransaction();

            // Validate data
            $validator = Validator::make($request->all(), [
                "agency_id"             => ['required', 'integer', 'exists:agencies,id'],
                "status_en"             => ['required', 'string'],
                "status_ar"             => ['required', 'string'],
                "type"                  => ['required', 'string' , 'in:on,off'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            //store task data
            $task_status = TaskStatus::create([
                "agency_id"             => $request->agency_id,
                "status_en"             => $request->status_en,
                "status_ar"             => $request->status_ar,
                "type_complete"         => $request->type,
                "business_id"           => auth()->user()->business->id,
            ]);

            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('activity.create_success'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->back()->with(flash(trans('activity.create_failed'), 'danger'))->withInput()->with('open-tab', 'yes');

            // and throw the error again.
            throw $e;
        }
    }

    public function update(Request $request,$id)
    {

        try {
            // Begin a transaction
            DB::beginTransaction();

            // Validate data
            $validator = Validator::make($request->all(), [
                "status_en_" . $id      => ['required', 'string'],
                "status_ar_" . $id      => ['required', 'string'],
                "edit_type_" . $id      => ['required', 'string' , 'in:on,off'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            //update task data
            $task_status = TaskStatus::findorfail($id);
            $task_status->update([
                "status_en"             => $request->{'status_en_' . $id},
                "status_ar"             => $request->{'status_ar_' . $id},
                "type_complete"         => $request->{'edit_type_' . $id},
            ]);

            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('activity.update_success'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->back()->with(flash(trans('activity.update_failed'), 'danger'))->withInput()->with('open-tab', 'yes');

            // and throw the error again.
            throw $e;
        }
    }

    public function destroy($id)
    {
        try{

            $task_status = TaskStatus::findorfail($id);

            $task_status->delete();

            return back()->with(flash(trans('activity.delete_success'), 'success'));

        } catch (\Exception $e) {

            return redirect()->back()->with(flash(trans('activity.delete_failed'), 'danger'));

            // and throw the error again.
            throw $e;
        }


    }

}
