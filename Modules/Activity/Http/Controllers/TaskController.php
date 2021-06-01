<?php

namespace Modules\Activity\Http\Controllers;

use App\Jobs\TaskReminder;
use App\Mail\EmailGeneral;
use App\Models\Agency;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskStatus;
use Modules\Activity\Entities\TaskType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\Task;
use Illuminate\Support\Facades\DB;
use Modules\Listing\Entities\Listing;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\Lead;
use Modules\Sales\Entities\Opportunity;
use Modules\Setting\Entities\EmailNotify;
use Modules\Setting\Entities\EmailNotifyReminder;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($agency)
    {

        $tasks_with_custom_reminder = tasks_with_custom_reminder($agency);
        $tasks_reminder = tasks_reminder($agency);
        $merged = array_merge($tasks_with_custom_reminder, $tasks_reminder);
        $clients = getClientUpcomingBirthdays();
//        dd($merged, $clients);
        $per_page       = 10;
        $tasks          = auth()->user()->getTasksByUserId($agency);
        // dynamic status
        if (request('action') == 'up_coming') {

            $tasks_upcoming = $tasks->whereHas('task_status', function ($query) {
                $query->where('type_complete', '=', 'off');
            });
            $tasks = $tasks_upcoming;
        } elseif (request('action') == 'completed') {

            $tasks_completed = $tasks->whereHas('task_status', function ($query) {
                $query->where('type_complete', '=', 'on');
            });

            $tasks = $tasks_completed;
        }
        if(request('id'))
        {
            $tasks->where('id', request('id'));
        }
        // static status
        //        if (request('action') == 'up_coming'){
        //
        //            $tasks = $tasks->whereIn('status',['not_started','in_progress','waiting_client','waiting_documents','waiting_approval']);
        ////            $tasks = $tasks_upcoming;
        //
        //        }elseif (request('action') == 'completed'){
        //
        //            $tasks = $tasks->whereIn('status',['completed_successful','completed_unsuccessful','escalated_manager']);
        //
        //
        ////            $tasks = $tasks_completed;
        //        }

        //filter tasks
        if (request('staff_filter') != null) {
            //            $tasks->where('staff_id', request('staff_filter'));
            $tasks->whereHas('staff', function ($query) {
                $query->where('staff_id', request('staff_filter'));
            });
        }

        if (request('filter_from_date') != null) {
            $tasks->where('created_at', '>=', request('filter_from_date') . ' 00:00:00');
        }

        if (request('filter_to_date') != null) {
            $tasks->where('created_at', '<=', request('filter_to_date') . ' 23:59:59');
        }

        if (request('filter_from_deadline') != null) {
            $tasks->where('deadline', '>=', request('filter_from_deadline'));
        }

        if (request('filter_to_deadline') != null) {
            $tasks->where('deadline', '<=', request('filter_to_deadline'));
        }


        // if user is super admin show all tasks

        //if user is owner of business show tasks related by this business and agency

        //if user is stuff show tasks related to you only
        $tasks          = $tasks->orderBy('id', 'desc')->paginate($per_page);
        $task_status    = TaskStatus::where('agency_id', $agency)->get();
        $task_types     = TaskType::where('agency_id', $agency)->get();
        $leads          = Lead::where('agency_id', $agency)->get();
        $opportunities  = Opportunity::where('agency_id', $agency)->get();
        $clients        = Client::where('agency_id', $agency)->get();
        $listings       = Listing::where('agency_id', $agency)->get();

        //        $staffs         = User::where('agency_id',$agency)->where('active','=','1')->where('type','staff')->get();
        $staffs         = staff($agency);

        return view(
            'activity::task.index',
            compact('tasks', 'task_status', 'task_types', 'staffs', 'leads', 'opportunities', 'clients', 'listings')
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('activity::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        try {
            // Begin a transaction
            DB::beginTransaction();

            // Validate data
            $validator = Validator::make($request->all(), [
                "agency_id"             => ['required', 'integer', 'exists:agencies,id'],
                "task_type"             => ['required', 'integer', 'exists:task_types,id'],
                "reference"             => ['nullable', 'string'],
                "status"                => ['required', 'integer', 'exists:task_statuses,id'],
                'module'                => ['required', 'in:lead,opportunity,client,listing'],
                'lead_id'               => ['required_if:module,==,lead', 'integer', 'exists:leads,id'],
                'opportunity_id'        => ['required_if:module,==,opportunity', 'integer', 'exists:opportunities,id'],
                'client_id'             => ['required_if:module,==,client', 'integer', 'exists:clients,id'],
                'listing_id'            => ['required_if:module,==,listing', 'integer', 'exists:listings,id'],
                "note_en"               => ['nullable', 'string'],
                "note_ar"               => ['nullable', 'string'],
                'staffs.*'              => ['integer', 'exists:users,id'],
                'staffs'                => ['array', 'required',],
                "deadline"              => ['required', 'date'],
                "time"                  => ['required', 'date_format:H:i'],
                "custom_reminder"       => ['nullable', 'in:on,off'],
                "period_reminder"       => ['required_if:custom_reminder,==,on', 'in:after,before'],
                "type_reminder"         => ['required_if:custom_reminder,==,on', 'in:hours,days'],
                "type_reminder_number"  => ['required_if:custom_reminder,==,on', 'integer', 'nullable'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }


            if ($request->custom_reminder == 'on') {
                $period_reminder        = $request->period_reminder;
                $type_reminder          = $request->type_reminder;
                $type_reminder_number   = $request->type_reminder_number;
            } else {
                $period_reminder        = null;
                $type_reminder          = null;
                $type_reminder_number   = null;
                $request->custom_reminder = 'off';
            }

            $module_id = null;
            if ($request->module == 'lead') {

                $module_id = $request->lead_id;
            } elseif ($request->module == 'opportunity') {

                $module_id = $request->opportunity_id;
            } elseif ($request->module == 'client') {

                $module_id = $request->client_id;
            } elseif ($request->module == 'listing') {

                $module_id = $request->listing_id;
            }


            //store task data
            $task = Task::create([
                "agency_id"             => $request->agency_id,
                "task_type_id"          => $request->task_type,
                "reference"             => $request->reference,
                "task_status_id"        => $request->status,
                "module"                => $request->module,
                "module_id"             => $module_id,
                "deadline"              => $request->deadline,
                "time"                  => $request->time,
                "custom_reminder"       => $request->custom_reminder,
                "period_reminder"       => $period_reminder,
                "type_reminder"         => $type_reminder,
                "type_reminder_number"  => $type_reminder_number,
                "add_by"                => auth()->user()->id,
                "business_id"           => auth()->user()->business->id,
            ]);

            if ($request->staffs) {
                $task->staff()->attach($request->staffs);
            }

            if ($request->note_en || $request->note_ar) {

                // save note by task id
                $task_note = TaskNote::create([
                    'task_id'       => $task->id,
                    'add_by'        => auth()->user()->id,
                    'notes_en'      => $request->note_en,
                    'notes_ar'      => $request->note_ar,
                ]);
            }

            setActivity('task',$task->id,$task->agency_id,$task->business_id,'the task #'.$task->id.' has been created by ' .auth()->user()->name_en,
                'تم إضافة مهمة رقم #'.$task->id.' تمت بواسطه ' .auth()->user()->name_en);
            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('activity.create_success'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return redirect()->back()->with(flash(trans('activity.create_failed'), 'danger'))->withInput()->with('open-tab', 'yes');

            // and throw the error again.
//            throw $e;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($agency,$id)
    {
//        dd($agency,$id);
        $task = Task::findorfail($id);
        if (owner()){

            $tasks = auth()->user()->getTasksByUserId()->pluck('id');
        }else{
            $tasks = auth()->user()->getTasksByUserId()->pluck('task_id');

        }

        if (!in_array($task->id, $tasks->toArray())) {

            return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
        }

        return view('activity::task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('activity::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        try {

            // Begin a transaction
            DB::beginTransaction();
            // validate data
            $validator = Validator::make($request->all(), [

                "task_type_edit_" . $id               => ['required', 'integer', 'exists:task_types,id'],
                "reference_edit_" . $id               => ['string'],
                "status_" . $id                       => ['required', 'integer', 'exists:task_statuses,id'],
                "edit_notes_en_" . $id                => ['nullable', 'string'],
                "edit_notes_ar_" . $id                => ['nullable', 'string'],
                'module_edit_' . $id                  => ['required', 'in:lead,opportunity,client,listing'],
                'lead_id_edit_' . $id                 => ['required_if:module_edit_' . $id . ',==,lead', 'integer', 'exists:leads,id'],
                'opportunity_id_edit_' . $id          => ['required_if:module_edit_' . $id . ',==,opportunity', 'integer', 'exists:opportunities,id'],
                'client_id_edit_' . $id               => ['required_if:module_edit_' . $id . ',==,client', 'integer', 'exists:clients,id'],
                'listing_id_edit_' . $id              => ['required_if:module_edit_' . $id . ',==,listing', 'integer', 'exists:listings,id'],
                'staff_edit_' . $id . '.*'              => ['integer', 'exists:users,id'],
                'staff_edit_' . $id                   => ['array', 'required',],
                "deadline_edit_" . $id                => ['required', 'date'],
                "time_edit_" . $id                    => ['required', 'date_format:H:i'],
                "custom_reminder_edit_" . $id         => ['nullable', 'in:on,off'],
                "period_reminder_edit_" . $id         => ['required_if:custom_reminder,==,on', 'in:after,before'],
                "type_reminder_edit_" . $id           => ['required_if:custom_reminder,==,on', 'in:hours,days'],
                "type_reminder_number_edit_" . $id    => ['required_if:custom_reminder,==,on', 'integer', 'nullable'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }

            if ($request->{'custom_reminder_edit_' . $id} == 'on') {

                $period_reminder        = $request->{'period_reminder_edit_' . $id};
                $type_reminder          = $request->{'type_reminder_edit_' . $id};
                $type_reminder_number   = $request->{'type_reminder_number_edit_' . $id};
                $custom_reminder_edit   = 'on';
            } else {
                $period_reminder        = null;
                $type_reminder          = null;
                $type_reminder_number   = null;
                $custom_reminder_edit   = 'off';
            }

            $module_id = null;
            if ($request->{'module_edit_' . $id} == 'lead') {

                $module_id = $request->{'lead_id_edit_' . $id};
            } elseif ($request->{'module_edit_' . $id} == 'opportunity') {

                $module_id = $request->{'opportunity_id_edit_' . $id};
            } elseif ($request->{'module_edit_' . $id} == 'client') {

                $module_id = $request->{'client_id_edit_' . $id};
            } elseif ($request->{'module_edit_' . $id} == 'listing') {

                $module_id = $request->{'listing_id_edit_' . $id};
            }

            //update TASK data
            $task = Task::findorfail($id);
            $task->update([
                "task_type_id"          => $request->{'task_type_edit_' . $id},
                "reference"             => $request->{'reference_edit_' . $id},
                "task_status_id"        => $request->{'status_' . $id},
                "module"                => $request->{'module_edit_' . $id},
                "module_id"             => $module_id,
                "deadline"              => $request->{'deadline_edit_' . $id},
                "time"                  => $request->{'time_edit_' . $id},
                "custom_reminder"       => $custom_reminder_edit,
                "period_reminder"       => $period_reminder,
                "type_reminder"         => $type_reminder,
                "type_reminder_number"  => $type_reminder_number,
                "add_by"                => auth()->user()->id,
            ]);

            if ($request->{'staff_edit_' . $id}) {
                $task->staff()->sync($request->{'staff_edit_' . $id});
            }

            // update note data by task id

            if ($task->notes && $task->notes->last()) {


                $note_id = $task->notes->last()->id;
                $task_note = TaskNote::updateOrCreate(
                    ['id' => $note_id],
                    [
                        'task_id'       => $task->id,
                        'add_by'        => auth()->user()->id,
                        'notes_en'      => $request->{'edit_notes_en_' . $id},
                        'notes_ar'      => $request->{'edit_notes_ar_' . $id},
                    ]
                );

                if ($note_id){

                    setActivity('task_note',$task_note->id,$task->agency_id,$task->business_id,'the note #'.$task_note->id.' has been added by ' .auth()->user()->name_en,
                        'تم إضافة ملاحظه رقم #'.$task_note->id.' تمت بواسطه ' .auth()->user()->name_en);
                }else{

                    setActivity('task_note',$task_note->id,$task->agency_id,$task->business_id,'the note #'.$task_note->id.' has been edited by ' .auth()->user()->name_en,
                        'تم تعديل ملاحظه رقم #'.$task_note->id.' تمت بواسطه ' .auth()->user()->name_en);
                }

            }

            setActivity('task',$task->id,$task->agency_id,$task->business_id,'the task #'.$task->id.' has been edited by ' .auth()->user()->name_en,
                'تم تعديل مهمة رقم #'.$task->id.' تمت بواسطه ' .auth()->user()->name_en);


            // Commit the transaction
            DB::commit();
            return back()->with(flash(trans('activity.update_success'), 'success'));
        } catch (\Exception $e) {

            //return
            DB::rollback();
            return redirect()->back()->with(flash(trans('activity.update_failed'), 'danger'))->withInput()->with('open-edit-tab', $id);

            // and throw the error again.
            //throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $task = Task::findorfail($id);

        if ($task->delete()) {

            setActivity('task',$task->id,$task->agency_id,$task->business_id,'the task #'.$task->id.' has been deleted by ' .auth()->user()->name_en,
                'تم حذف مهمة رقم #'.$task->id.' تمت بواسطه ' .auth()->user()->name_en);

            return back()->withInput()->with(flash(trans('activity.tasks.task_deleted'), 'success'));
        } else {

            return redirect()->back()->with(flash(trans('activity.tasks.task_deleted_failed'), 'danger'));
        }
    }


    // update static status
    //    public function update_status(Request $request)
    //    {
    //        try{
    //            $task = Task::findorfail($request->id);
    //
    //            $validator = Validator::make($request->all(),[
    //                "status" => [
    //                    'required',
    //                    'string',
    //                    'in:not_started,in_progress,waiting_client,waiting_documents,waiting_approval,
    //                        completed_successful,completed_unsuccessful,escalated_manager'
    //                ],
    //            ]);
    //
    //            if($validator->fails()) {
    //
    //                return response()->json([
    //                    'message' => $validator->errors()->all()[0]
    //                ],200);
    //            }
    //            $task->update([
    //                'status' => $request->status,
    //            ]);
    //
    //            return response()->json([
    //                'message' => trans('activity.update_success')
    //            ],200);
    //
    //        } catch (\Exception $e) {
    //
    //
    //            return response()->json([
    //                'message' => trans('activity.update_failed')
    //            ],401);
    //
    //            // and throw the error again.
    //            throw $e;
    //        }
    //    }

    // update dynamic status
    public function update_status(Request $request)
    {

        try {
            $task = Task::findorfail($request->id);

            $validator = Validator::make($request->all(), [
                "status" => ['required', 'integer', 'exists:task_statuses,id'],
            ]);

            if ($validator->fails()) {

                return response()->json(Response::HTTP_CREATED)->with(['message' => 'Status Not In Status Tasks Of Agency', 'alert-type' => 'error']);
            }

            $task->update([
                'task_status_id' => $request->status,
            ]);

            setActivity('task',$task->id,$task->agency_id,$task->business_id,'the task #'.$task->id.' has been edited by ' .auth()->user()->name_en.' (Status ('.$task->task_status->status_en. ') )',
                'تم تعديل مهمة رقم #'.$task->id.' تمت بواسطه ' .auth()->user()->name_en .'(الحاله('. $task->task_status->status_ar.'))');

            return response()->json([
                'message' => trans('activity.update_success')
            ], 200);
        } catch (\Exception $e) {


            return response()->json([
                'message' => trans('activity.update_failed')
            ], 200);

            // and throw the error again.
            //throw $e;
        }
    }

    public function add_note(Request $request)
    {

        try {

            // validation data
            $task = Task::findorfail($request->task_id);

            if (owner()){

                $tasks = auth()->user()->getTasksByUserId()->pluck('id');
            }else{
                $tasks = auth()->user()->getTasksByUserId()->pluck('task_id');

            }

            if (!in_array($task->id, $tasks->toArray())) {

                return abort(Response::HTTP_FORBIDDEN, trans('global.forbidden_page_not_allow_to_you'));
            }

            $validator = Validator::make($request->all(), [
                "add_new_note_en_" . $request->task_id  => ['required', 'string'],
                "add_new_note_ar_" . $request->task_id  => ['required', 'string'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
            }

            // save note by task id
            $task_note = TaskNote::create([
                'task_id'       => $task->id,
                'add_by'        => auth()->user()->id,
                'notes_en'      => $request->{'add_new_note_en_' . $request->task_id},
                'notes_ar'      => $request->{'add_new_note_ar_' . $request->task_id},
            ]);

            setActivity('task_note',$task_note->id,$task->agency_id,$task->business_id,'the note #'.$task_note->id.' has been added by ' .auth()->user()->name_en,
                'تم إضافة ملاحظه رقم #'.$task_note->id.' تمت بواسطه ' .auth()->user()->name_en);

            return back()->with(flash(trans('activity.create_success'), 'success'));
        } catch (\Exception $e) {

            return redirect()->back()->with(flash(trans('activity.create_failed'), 'danger'))->withInput();
            // and throw the error again.
            //throw $e;
        }

    }
//
//    public function tasks_with_custom_reminder($agency_id)
//    {
//
//        $tasks = Task::where('agency_id', $agency_id)->get();
//        $tasks_reminder_byDate = [];
////        dd($tasks);
//        foreach($tasks as $task)
//        {
//            if ($task->custom_reminder == 'on')
//            {
//                if ($task->period_reminder == 'before')
//                {
//                    if ($task->type_reminder == 'days')
//                    {
//
//                        $date = strtotime('-'.$task->type_reminder_number.' day',strtotime($task->deadline));
//                        $date_remind = date('Y-m-d', $date);
//                        $tasks_reminder_byDate[$date_remind][$task->time][] = $task;
//
//                    }else{
//                        //hours
//                        $time = strtotime('-'.$task->type_reminder_number.' hour',strtotime($task->time));
//                        $time_remind = date('h:i:s', $time);
//                        $tasks_reminder_byDate[$task->deadline][$time_remind][] = $task;
//                    }
//
//                }else{
//                    //after
//                    if ($task->type_reminder == 'days')
//                    {
//
//                        $date = strtotime('+'.$task->type_reminder_number.' day',strtotime($task->deadline));
//                        $date_remind = date('Y-m-d', $date);
//                        $tasks_reminder_byDate[$date_remind][$task->time][] = $task;
//
//                    }else{
//                        //hours
//                        $time = strtotime('+'.$task->type_reminder_number.' hour',strtotime($task->time));
//                        $time_remind = date('h:i:s', $time);
//                        $tasks_reminder_byDate[$task->deadline][$time_remind][] = $task;
//                    }
//
//                }
//            }
//        }
//
//        return $tasks_reminder_byDate;
//    }
//
//    public function tasks_reminder($agency_id)
//    {
//        $email_notify = EmailNotify::where('agency_id', $agency_id)->first();
//        $general_reminders = EmailNotifyReminder::where( 'email_notify_id'  , $email_notify->id)->where( 'category'  , 'general_reminder')->get();
//
//        $tasks_reminder_byDate = [];
//        foreach($general_reminders as $general_reminder ){
//
//            $type   = $general_reminder->type;
//            $day    = $general_reminder->day;
//            $time   = $general_reminder->time;
//
//            $status_complete = TaskStatus::where('agency_id', $agency_id)->where('type_complete','on')->pluck('id');
//
//            $tasks = Task::where('agency_id', $agency_id)
//                ->where('custom_reminder','off')
//                ->whereNotIn('task_status_id',$status_complete)
//                ->get();
//
//            foreach($tasks as $task)
//            {
//                if ($type == 'before')
//                {
//
//                    $date = strtotime('-'.$day.' day',strtotime($task->deadline));
//                    $date_remind = date('Y-m-d', $date);
//                    $tasks_reminder_byDate[$date_remind][$time][] = $task;
//
//                }else{
//                    //after
//                    $date = strtotime('+'.$day.' day',strtotime($task->deadline));
//                    $date_remind = date('Y-m-d', $date);
//                    $tasks_reminder_byDate[$date_remind][$time][] = $task;
//
//                }
//            }
//
//        }
//        return $tasks_reminder_byDate;
//    }
}
