<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskType;


class TaskTypeController extends Controller
{

    public function index($agency)
    {
        $per_page       = 2;
        $task_types = TaskType::where('agency_id',$agency)->orderBy('id', 'desc')->paginate($per_page);
        $business  = auth()->user()->business_id;

        return view('setting::task_type.index',compact('task_types','agency','business'));
    }

    public function store(Request $request)
    {


//        dd($request->all());
        try {
            // Begin a transaction
            DB::beginTransaction();

            // Validate data
            $validator = Validator::make($request->all(), [
                "agency_id"           => ['required', 'integer', 'exists:agencies,id'],
                "type_en"             => ['required', 'string'],
                "type_ar"             => ['required', 'string'],
//                "address_required"      => ['required', 'string' , 'in:on,off'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            //store task data
            $task_type = TaskType::create([
                "agency_id"             => $request->agency_id,
                "type_en"               => $request->type_en,
                "type_ar"               => $request->type_ar,
//                "address_required"      => $request->address_required,
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
                "type_en_" . $id                => ['required', 'string'],
                "type_ar_" . $id                => ['required', 'string'],
//                "edit_address_required_" . $id  => ['required', 'string' , 'in:on,off'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            //update task data
            $task_type = TaskType::findorfail($id);
            $task_type->update([
                "type_en"             => $request->{'type_en_' . $id},
                "type_ar"             => $request->{'type_ar_' . $id},
//                "address_required"    => $request->{'edit_address_required_' . $id},
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

            $task_type = TaskType::findorfail($id);

            $task_type->delete();

            return back()->with(flash(trans('activity.delete_success'), 'success'));

        } catch (\Exception $e) {

            return redirect()->back()->with(flash(trans('activity.delete_failed'), 'danger'));

            // and throw the error again.
            throw $e;
        }


    }

}
