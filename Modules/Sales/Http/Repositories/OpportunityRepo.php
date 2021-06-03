<?php

namespace Modules\Sales\Http\Repositories;

use Gate;
use App\Models\Agency;

use App\Jobs\SendEmail;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Mail\EmailGeneral;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\SystemTemplate;
use App\Events\OpportunityEvent;
use Modules\Sales\Entities\Call;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Entities\Client;
use Modules\Activity\Entities\Task;
use App\Events\OpportunityTaskEvent;
use Modules\Listing\Entities\Listing;
use App\Events\OpportunityAnswerEvent;
use App\Events\OpportunityResultEvent;
use Modules\Sales\Entities\CallStatus;
use Modules\Setting\Entities\Template;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskType;
use Modules\Sales\Entities\Opportunity;
use App\Events\OpportunityQuestionEvent;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskStatus;
use Modules\Sales\Entities\ClientContract;
use Illuminate\Support\Facades\Notification;
use Modules\Sales\Entities\ContractDocument;
use Modules\Sales\Entities\ContractRecurring;
use Modules\Sales\Entities\OpportunityResult;
use App\Notifications\OpportunityNotification;
use Modules\Sales\Entities\LeadQualifications;
use Symfony\Component\HttpFoundation\Response;
use Modules\Sales\Entities\OpportunityQuestion;
use App\Notifications\OpportunityTaskNotification;
use Modules\Sales\Entities\OpportunityTempContract;
use App\Notifications\OpportunityAnswerNotification;
use App\Notifications\OpportunityResultNotification;
use App\Notifications\OpportunityQuestionNotification;

class OpportunityRepo
{
    public function index($agency)
    {

        $pagination = true;
        $business = auth()->user()->business_id;
        $per_page = 15;

        $agency = Agency::with([
            'lead_sources', 'lead_qualifications', 'lead_types', 'lead_properties', 'lead_priorities', 'lead_communications',
            'task_status', 'task_types', 'developers'
        ])->where('id', $agency)->where('business_id', $business)->first();
        abort_if(!$agency, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunities = Opportunity::with([
            'tasks', 'calls', 'convertedBy', 'assigns', 'assigns.assignedBy', 'current_assign',
            'rejectedBy',
            'holdBy',
            'submitForApproveBy',

            'current_assign.assignedBy', 'tasks.addBy',
            'tasks.staff',
            'calls.madeBy',
            'questions',
            'questions.addedBy',
            'results',
            'results.addedBy',
            'client'
        ])->where('agency_id', $agency->id)->where('business_id', $business);



        if (request('filter_phone') != null) {

            $opportunities->where(function ($query) {
                $query->where('phone1', request('filter_phone'))
                    ->orWhere('phone2', request('filter_phone'))
                    ->orWhere('phone3', request('filter_phone'))
                    ->orWhere('phone4', request('filter_phone'))
                    ->orWhere('landline', request('filter_phone'))
                    ->orWhere('fax', request('filter_phone'));
            });
        }
        if (request('id')) {

            $opportunities->where('id', request('id'));
        }
        if (request('filter_name') != null) {
            $opportunities->where(function ($query) {
                $query->where('first_name', 'like', '%' . request('filter_name') . '%')
                    ->orWhere('sec_name', 'like', '%' . request('filter_name') . '%')
                    ->orWhere('full_name', 'like', '%' . request('filter_name') . '%');
            });
        }
        if (request('filter_email') != null) {
            $opportunities->where(function ($query) {
                $query->where('email1', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('email2', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('email3', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('skype', 'like', '%' . request('filter_email') . '%');
            });
        }
        if (request('filter_source') != null) {
            $opportunities->where(function ($query) {
                $query->where('source_id', request('filter_source'));
            });
        }
        if (request('filter_status') != null) {
            $opportunities->where(function ($query) {
                $query->where('status', request('filter_status'));
            });
        }
        if (request('filter_stage') != null) {
            $opportunities->where(function ($query) {
                $query->where('stage', request('filter_stage'));
            });
        }
        if (request('filter_type') != null) {
            $opportunities->where(function ($query) {
                $query->where('type_id', request('filter_type'));
            });
        }
        if (request('filter_qualifications') != null) {
            $opportunities->where(function ($query) {
                $query->where('qualification_id', request('filter_qualifications'));
            });
        }
        if (request('filter_way_of_communications') != null) {
            $opportunities->where(function ($query) {
                $query->where('communication_id', request('filter_way_of_communications'));
            });
        }
        if (request('filter_priority') != null) {
            $opportunities->where(function ($query) {
                $query->where('priority_id', request('filter_priority'));
            });
        }
        if (request('filter_property_purpose') != null) {
            $opportunities->where(function ($query) {
                $query->where('property_purpose', request('filter_property_purpose'));
            });
        }
        if (request('filter_user') != null) {

            $opportunities = $opportunities->get()->filter(function ($q) {

                $assigned = $q->current_assign->first() && unserialize($q->current_assign->first()->assigned_to) != null ? unserialize($q->current_assign->first()->assigned_to) : [];

                return in_array(request('filter_user'), $assigned);
            });

            $pagination = false;
        } else {
            $opportunities = $opportunities->paginate($per_page);
        }





        return view(
            'sales::opportunities.index',
            [
                'staffs'        =>  staff($agency->id),
                'agency'        => $agency->id,
                'business'      => $business,
                'opportunities' => $opportunities,
                'countries'              =>
                cache()->remember('countries', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('countries')->get();
                }),

                'languages' =>
                cache()->remember('languages', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('languages')->get();
                }),
                'cities'                 =>
                cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('cities')->get();
                }),
                'communities'            =>
                cache()->remember('communities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('communities')->get();
                }),
                'sub_communities'        =>
                cache()->remember('sub_communities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('sub_communities')->get();
                }),
                'pagination'             => $pagination,

                'developers'              =>           $agency->developers,
                'lead_sources' =>           $agency->lead_sources,
                'lead_priorities' =>            $agency->lead_priorities,
                'lead_types' =>            $agency->lead_types,
                'lead_properties' =>            $agency->lead_properties,

                'lead_qualifications' =>            $agency->lead_qualifications,
                'lead_communications' =>            $agency->lead_communications,
                'task_status' =>            $agency->task_status,
                'task_types' =>            $agency->task_types,
                'call_status' =>            $agency->call_status,
                'currencies' => DB::table('currencies')->get()


            ]

        );
    }


    public function update($id, $request)
    {


        $opportunity = Opportunity::where('id', $id)->where('business_id', auth()->user()->business_id)->firstOrFail();

        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), Opportunity::update_validation($id));
            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }
            $inputs = $validator->validated();
            $fixed_array_keys = [];
            foreach ($inputs as $key => $input) {
                $fixed_array_keys[str_replace(['edit_', '_' . $id], '', $key)] = $input;
            }
            $fixed_array_keys['full_name'] =  $request->{'edit_full_name_' . $id} != null ? $request->{'edit_full_name_' . $id} : ($request->{'edit_first_name_' . $id} . ' ' . $request->{'edit_sec_name_' . $id});
            $opportunity->update($fixed_array_keys);
            DB::commit();
            return back()->with(flash(trans('sales.opportunity_updated'), 'success'))->with('open-edit-tab', $id);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }


    public function make_call($request, $id)
    {

        $qualification = LeadQualifications::where('id', $request->{'call_qualification_id_' . $id})->where('business_id', auth()->user()->business_id)->first();
        $call_status = CallStatus::where('id', $request->{'call_status_id_' . $id})->where('business_id', auth()->user()->business_id)->first();

        $opportunity = Opportunity::where('id', $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$qualification, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$call_status, Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [

                "call_contact_date_" . $id => "required|date|date_format:Y-m-d",
                "call_contact_time_" . $id => "required|string",
                "call_next_action_date_" . $id => "sometimes|nullable|date|date_format:Y-m-d",
                "call_next_action_time_" . $id => "sometimes|nullable|string",
                "call_note_" . $id => "required|string",


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-call-tab', $id);
            }


            $call = Call::create([
                'module' => 'opportunity',
                'module_id' => $opportunity->id,
                'agency_id' => $opportunity->agency_id,
                'business_id' => $opportunity->business_id,
                'status_id' => $call_status->id,
                'made_by' => auth()->user()->id,
                'contact_date' => $request->{'call_contact_date_' . $id},
                'contact_time' => $request->{'call_contact_time_' . $id},

                'next_action_date' => $request->{'call_next_action_date_' . $id},
                'next_action_time' => $request->{'call_next_action_time_' . $id},
                'note' => $request->{'call_note_' . $id},
            ]);


            if ($call) {
                $opportunity->update(['qualification_id' => $qualification->id]);
            }


            DB::commit();
            return back()->with(flash(trans('sales.call_created'), 'success'))->with('open-call-tab', $id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-call-tab', $id);
        }
    }


    public function assign_staff($request)
    {

        $opportunity = Opportunity::where('id', $request->assign_opportunity_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();


        try {


            $opportunity->current_assign()->update([
                'end_assign' => date('Y-m-d'),
                'status' => 'off',

            ]);


            $staff_to_notify = [];

            if ($request->assigned == 'all') {

                $opportunity->assigns()->create([
                    'assigned_to' => serialize(staff($request->assign_agency_id)->pluck('id')->toArray()),
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                    'opportunity_id' => $opportunity->id,
                    'start_assign' => date('Y-m-d'),
                    'assigned_by' => auth()->user()->id,
                    'reason_change_assign' => $request->{'assigned_note_' . $request->assign_opportunity_id}

                ]);

                $opportunity->update(['assigned_to' => serialize(staff($request->assign_agency_id)->pluck('id')->toArray())]);


                $staff_to_notify = staff($request->assign_agency_id)->pluck('id')->toArray();
            } elseif ($request->assigned == 'custom') {
                $staff = [];

                if ($request->{'assigned_staff_' . $request->assign_opportunity_id}) {

                    $staff = $request->{'assigned_staff_' . $request->assign_opportunity_id};
                }

                $opportunity->update(['assigned_to' => serialize($staff)]);

                $opportunity->assigns()->create([
                    'assigned_to' => serialize($staff),
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                    'opportunity_id' => $opportunity->id,
                    'start_assign' => date('Y-m-d'),
                    'assigned_by' => auth()->user()->id,
                    'reason_change_assign' => $request->{'assigned_note_' . $request->assign_opportunity_id}

                ]);

                $staff_to_notify = $staff;
            }

            DB::commit();

            $template = Template::where('agency_id', $opportunity->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_assign')->first();


            if ($template) {

                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_to_notify)->get();
                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, trans('sales.opportunity_assied_to_you'));

                    event(new OpportunityEvent($opportunity, $send_to->id));
                }
                Notification::send($users, new OpportunityNotification($opportunity));
            } else {
                $system_template = SystemTemplate::where('slug', 'opportunity_assign')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                ]);


                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_to_notify)->get();
                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, trans('sales.opportunity_assied_to_you'));

                    event(new OpportunityEvent($opportunity, $send_to->id));
                }
                Notification::send($users, new OpportunityNotification($opportunity));
            }


            return back()->with(flash(trans('sales.staff_assigned'), 'success'))->with('open-assign-tab', $request->assign_opportunity_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-assign-tab', $request->assign_opportunity_id);
        }
    }


    public function assign_task($request, $id)
    {

        $opportunity = Opportunity::where('id', $request->task_opportunity_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');


        $task_type = TaskType::where('id', $request->{'task_type_' . $id})->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$task_type, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task_status = TaskStatus::where('id', $request->{'task_status_' . $id})->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$task_status, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {

            $validator = Validator::make($request->all(), [

                "task_agency_id_{$id}" => "required|integer|exists:agencies,id",
                "task_business_id_{$id}" => "required|integer|exists:businesses,id",
                "task_note_en_{$id}" => "sometimes|nullable|string",
                "task_note_ar_{$id}" => "sometimes|nullable|string",
                "task_deadline_{$id}" => "required|date|date_format:Y-m-d",
                "task_time_{$id}" => "required|string",
                "task_custom_reminder_{$id}" => "sometimes|nullable|in:on,off",
                "task_period_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "task_type_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }
            DB::beginTransaction();

            $task = Task::create([
                "agency_id" => $request->{'task_agency_id_' . $id},
                "business_id" => $request->{'task_business_id_' . $id},

                "task_type_id" => $request->{'task_type_' . $id},
                "task_status_id" => $request->{'task_status_' . $id},
                "module" => 'opportunity',
                "module_id" => $opportunity->id,
                "deadline" => $request->{'task_deadline_' . $id},


                "time" => $request->{'task_time_' . $id},
                "custom_reminder" => $request->{'task_custom_reminder_' . $id},

                "period_reminder" => $request->{'task_period_reminder_' . $id},

                "type_reminder" => $request->{'task_type_reminder_' . $id},
                "type_reminder_number" => $request->{'task_type_reminder_number_' . $id},


                "add_by" => auth()->user()->id,
            ]);


            $staff_for_notify = [];

            $staff = [];
            if ($request->{'task_staff_' . $id}) {

                $staff = $request->{'task_staff_' . $id};
            }

            $task->staff()->sync($staff);

            $staff_for_notify = $staff;


            if ($request->{'task_note_en_' . $id} || $request->{'task_note_ar_' . $id}) {

                // save note by task id
                $task_note = TaskNote::create([
                    'task_id' => $task->id,
                    'add_by' => auth()->user()->id,
                    'notes_en' => $request->{'task_note_en_' . $id},
                    'notes_ar' => $request->{'task_note_ar_' . $id},
                ]);
            }
            DB::commit();


            $template = Template::where('agency_id', $opportunity->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_task')->first();


            if ($template) {

                $template_with_name = str_replace('{TASK_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Opportunity Task Has Been Assigned To You");

                    event(new OpportunityTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new OpportunityTaskNotification($task));
            } else {
                $system_template = SystemTemplate::where('slug', 'opportunity_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                ]);


                $template_with_name = str_replace('{TASK_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Opportunity Task Has Been Assigned To You");

                    event(new OpportunityTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new OpportunityTaskNotification($task));
            }

            return back()->with(flash(trans('sales.task_assigned'), 'success'))->with('open-task-tab', $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $id);
        }
    }

    public function edit_assign_task($request, $id)
    {

        $opportunity = Opportunity::where('id', $request->edit_task_opportunity_id)->where('business_id', auth()->user()->business_id)->firstOrFail();
        $task_type = TaskType::where('id', $request->{'edit_task_type_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();
        $task_status = TaskStatus::where('id', $request->{'edit_task_status_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        $task = Task::where('id', $request->{'edit_task_id_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        try {

            $validator = Validator::make($request->all(), [

                "edit_task_agency_id_{$id}" => "required|integer|exists:agencies,id",
                "edit_task_business_id_{$id}" => "required|integer|exists:businesses,id",
                "edit_task_note_en_{$id}" => "sometimes|nullable|string",
                "edit_task_note_ar_{$id}" => "sometimes|nullable|string",
                "edit_task_deadline_{$id}" => "required|date|date_format:Y-m-d",
                "edit_task_time_{$id}" => "required|string",
                "edit_task_custom_reminder_{$id}" => "sometimes|nullable|in:on,off",
                "edit_task_period_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "edit_task_type_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "edit_task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }

            DB::beginTransaction();

            $task->update([
                "agency_id" => $request->{'edit_task_agency_id_' . $id},
                "business_id" => $request->{'edit_task_business_id_' . $id},

                "task_type_id" => $request->{'edit_task_type_' . $id},
                "task_status_id" => $request->{'edit_task_status_' . $id},
                "module" => 'opportunity',
                "module_id" => $opportunity->id,
                "deadline" => $request->{'edit_task_deadline_' . $id},
                "time" => $request->{'edit_task_time_' . $id},
                "custom_reminder" => $request->{'edit_task_custom_reminder_' . $id},

                "period_reminder" => $request->{'edit_task_period_reminder_' . $id},

                "type_reminder" => $request->{'edit_task_type_reminder_' . $id},
                "type_reminder_number" => $request->{'edit_task_type_reminder_number_' . $id},
            ]);


            $staff_for_notify = [];

            $staff = [];
            if ($request->{'edit_task_staff_' . $id}) {

                $staff = $request->{'edit_task_staff_' . $id};
            }
            // dd($request->all(), $staff);
            $task->staff()->sync($staff);

            $staff_for_notify = $staff;


            if ($request->{'edit_task_note_en_' . $id}) {

                // save note by task id
                $task_note = TaskNote::create([
                    'task_id' => $task->id,
                    'add_by' => auth()->user()->id,
                    'notes_en' => $request->{'edit_task_note_en_' . $id},
                ]);
            }
            DB::commit();
            $template = Template::where('agency_id', $opportunity->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_task')->first();


            if ($template) {

                $template_with_name = str_replace('{TASK_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Opportunity Task Has Been UPDATED");

                    event(new OpportunityTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new OpportunityTaskNotification($task));
            } else {
                $system_template = SystemTemplate::where('slug', 'opportunity_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                ]);

                $template_with_name = str_replace('{TASK_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Opportunity Task Has Been UPDATED");

                    event(new OpportunityTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new OpportunityTaskNotification($task));
            }

            return back()->with(flash(trans('sales.task_updated'), 'success'))->with('open-task-tab', $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $id);
        }
    }


    public function convert_to_client($request)
    {

        $opportunity = Opportunity::where('id', $request->opportunity_id)->where('business_id', auth()->user()->business_id)->firstOrFail();

        try {


            $validator = Validator::make($request->all(), Opportunity::convert_to_client_validation($request));

            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-client-tab', $request->opportunity_id);
            }

            if (
                !($request->{"client_passport_" . $request->opportunity_id})
                &&
                !($request->{"client_national_id_" . $request->opportunity_id})
            ) {

                return back()->withInput()->with(flash(trans('sales.type_one_of_passport_or_national_id'), 'error'))->with('open-client-tab', $request->opportunity_id);
            }


            if (($request->{"client_passport_" . $request->opportunity_id})) {


                if (!$request->{"client_passport_expiration_date_" . $request->opportunity_id}) {
                    return back()->withInput()->with(flash(trans('sales.passport_expiration_date_is_required'), 'error'))->with('open-client-tab', $request->opportunity_id);
                }
            }

            if ($request->{"client_recurring_type_" . $request->opportunity_id} == 'yes') {


                if (count($request->{'recurrings_amount_' . $request->opportunity_id}) != count($request->{'recurrings_dates_' . $request->opportunity_id})) {

                    return back()->withInput()->with(flash(trans('sales.recurring_and_dates_not_equal'), 'error'))->with('open-client-tab', $request->opportunity_id);
                }
                if (count($request->{'recurrings_dates_' . $request->opportunity_id}) > count(array_unique($request->{'recurrings_dates_' . $request->opportunity_id}))) {

                    return back()->withInput()->with(flash(trans('sales.dates_of_recurrings_are_repeated'), 'error'))->with('open-client-tab', $request->opportunity_id);
                }


                // count() > count(array_unique());


                $recurring_value = 0;
                foreach ($request->{'recurrings_amount_' . $request->opportunity_id} as $r) {
                    $recurring_value += $r;
                }

                if ($request->{'client_amount_' . $request->opportunity_id} != $recurring_value) {
                    return back()->withInput()->with(flash(trans('sales.recurrings_not_equal_amount'), 'error'))->with('open-client-tab', $request->opportunity_id);
                }
            }


            $check_unique_emails = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {

                $query->where([
                    ['email1', '!=', null],
                    ['email1', request()->{"client_email1_" . request()->opportunity_id}],
                ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', request()->{"client_email1_" . request()->opportunity_id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', request()->{"client_email1_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', request()->{"client_email2_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', request()->{"client_email2_" . request()->opportunity_id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', request()->{"client_email2_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', request()->{"client_skype_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', request()->{"client_skype_" . request()->opportunity_id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', request()->{"client_skype_" . request()->opportunity_id}],
                    ]);
            })->get();


            $check_unique_phones = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->Where([
                        ['phone1', '!=', null],
                        ['phone1', request()->{"client_phone1_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', request()->{"client_phone1_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', request()->{"client_phone1_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', request()->{"client_phone2_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', request()->{"client_phone2_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', request()->{"client_phone2_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', request()->{"client_landline_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', request()->{"client_landline_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', request()->{"client_landline_" . request()->opportunity_id}],
                    ]);
            })->get();


            $check_unique_passport = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['passport', '!=', null],
                        ['passport', request()->{"client_passport_" . request()->opportunity_id}],
                    ]);
            })->get();

            $check_unique_fax = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['fax', '!=', null],
                        ['fax', request()->{"client_fax_" . request()->opportunity_id}],
                    ]);
            })->get();

            $check_unique_twitter = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['twitter', '!=', null],
                        ['twitter', request()->{"client_twitter_" . request()->opportunity_id}],
                    ]);
            })->get();
            $check_unique_facebook = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['facebook', '!=', null],
                        ['facebook', request()->{"client_facebook_" . request()->opportunity_id}],
                    ]);
            })->get();


            $check_unique_linkedin = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['linkedin', '!=', null],
                        ['linkedin', request()->{"client_linkedin_" . request()->opportunity_id}],
                    ]);
            })->get();

            $check_unique_national_id = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['national_id', '!=', null],
                        ['national_id', request()->{"client_national_id_" . request()->opportunity_id}],
                    ]);
            })->get();


            if (count($check_unique_emails) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_email') . ' ' . $check_unique_emails->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }
            if (count($check_unique_passport) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_passport') . ' ' . $check_unique_passport->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }

            if (count($check_unique_phones) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_phone') . ' ' . $check_unique_phones->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }
            if (count($check_unique_fax) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_fax') . ' ' . $check_unique_fax->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }
            if (count($check_unique_twitter) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_twitter') . ' ' . $check_unique_twitter->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }
            if (count($check_unique_facebook) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_facebook') . ' ' . $check_unique_facebook->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }
            if (count($check_unique_linkedin) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_linkedin') . ' ' . $check_unique_linkedin->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }
            if (count($check_unique_national_id) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_national_id') . ' ' . $check_unique_national_id->first()->full_name ?? '', 'danger'))->with('open-client-tab', $opportunity->id);
            }


            DB::beginTransaction();

            // $client = Client::create([
            //     'table_name' => 'clients',
            //     'agency_id' => $opportunity->agency_id,

            //     "business_id" => $opportunity->business_id,


            //     'website' => $request->{"client_website_" . $request->opportunity_id},

            //     'name' => $request->{"client_name_" . $request->opportunity_id},

            //     'landline' => $request->{"client_landline_" . $request->opportunity_id},

            //     'email1' => $request->{"client_email1_" . $request->opportunity_id},
            //     'email2' => $request->{"client_email2_" . $request->opportunity_id},

            //     'fax' => $request->{"client_fax_" . $request->opportunity_id},

            //     'phone1' => $request->{"client_phone1_" . $request->opportunity_id},
            //     'phone2' => $request->{"client_phone2_" . $request->opportunity_id},

            //     'country' => $request->{"client_country_" . $request->opportunity_id},
            //     'city' => $request->{"client_city_" . $request->opportunity_id},


            //     'skype' => $request->{"client_skype_" . $request->opportunity_id},
            //     'twitter' => $request->{"client_twitter_" . $request->opportunity_id},
            //     'facebook' => $request->{"client_facebook_" . $request->opportunity_id},
            //     'linkedin' => $request->{"client_linkedin_" . $request->opportunity_id},

            //     'longitude' => $request->{"client_longitude_" . $request->opportunity_id},
            //     'latitude' => $request->{"client_latitude_" . $request->opportunity_id},


            //     'language' => $request->{"client_language_" . $request->opportunity_id},
            //     'currency' => $request->{"client_currency_" . $request->opportunity_id},
            //     'company' => $request->{"client_company_" . $request->opportunity_id},
            //     'passport' => $request->{"client_passport_" . $request->opportunity_id},
            //     'national_id' => $request->{"client_national_id_" . $request->opportunity_id},
            //     'passport_expiration_date' => $request->{"client_passport_expiration_date_" . $request->opportunity_id},


            //     "date_of_birth" => $request->{"client_date_of_birth_" . $request->opportunity_id},


            //     'converted_by' => auth()->user()->id,

            //     "source_id" => $opportunity->source_id,

            //     "type_id" => $opportunity->type_id,
            //     "communication_id" => $opportunity->communication_id,


            //     "po_box" => $opportunity->po_box,


            //     "partner_name" => $opportunity->partner_name,

            //     'converted_from' => $opportunity->id,
            //     'status' => 'pending',

            //     "developer" => $opportunity->developer,
            //     "community" => $opportunity->community,
            //     "building_name" => $opportunity->building_name,
            //     "property_purpose" => $opportunity->property_purpose,
            //     "property_no" => $opportunity->property_no,
            //     "property_id" => $opportunity->property_id,

            //     "property_reference" => $opportunity->property_reference,
            //     "size_sqft" => $opportunity->size_sqft,
            //     "size_sqm" => $opportunity->size_sqm,
            //     "bedrooms" => $opportunity->bedrooms,
            //     "bathrooms" => $opportunity->bathrooms,
            //     "parkings" => $opportunity->parkings,

            //     "salutation" => $opportunity->salutation,
            //     "other" => $opportunity->other,
            //     "nationality_id" => $opportunity->nationality_id,

            // ]);

            $contract = OpportunityTempContract::create([
                'opportunity_id' => $opportunity->id,
                'converted_by' => auth()->user()->id,
                'status' => 'pending',
                'contract_type' => $request->{'client_contract_type_' . $request->opportunity_id},

                'customer_name' => $request->{'client_customer_' . $request->opportunity_id},
                'customer_national_id' => $request->{'client_customer_national_id_' . $request->opportunity_id},
                'customer_address' => $request->{'client_customer_address_' . $request->opportunity_id},


                'landlord_name' => $request->{'client_landlord_' . $request->opportunity_id},
                'landlord_national_id' => $request->{'client_landlord_national_id_' . $request->opportunity_id},
                'landlord_address' => $request->{'client_landlord_address_' . $request->opportunity_id},
                'address' => $request->{'client_address_' . $request->opportunity_id},

                'start_date' => $request->{'client_date_' . $request->opportunity_id},
                'end_date' => $request->{'client_end_date_' . $request->opportunity_id},
                'notes' => $request->{'client_note_' . $request->opportunity_id},
                'has_recurring' => $request->{'client_recurring_type_' . $request->opportunity_id},
                'recurring_number' => $request->{'recurrings_amount_' . $request->opportunity_id} && count($request->{'recurrings_amount_' . $request->opportunity_id}) > 0 ? count($request->{'recurrings_amount_' . $request->opportunity_id}) : null,
                'amount' => $request->{'client_amount_' . $request->opportunity_id},

                'agency_id' => $opportunity->agency_id,
                'business_id' => $opportunity->business_id,


            ]);


            if ($request->{'client_recurring_type_' . $request->opportunity_id} == 'yes') {

                $amounts = $request->{'recurrings_amount_' . $request->opportunity_id};
                $dates = $request->{'recurrings_dates_' . $request->opportunity_id};

                foreach ($amounts as $key => $amount) {
                    ContractRecurring::create([
                        'contract_id' => $contract->id,
                        'opportunity_id' => $opportunity->id,
                        'amount' => $amount,
                        'date' => $dates[$key],
                        'payed' => 'no',
                        'agency_id' => $opportunity->agency_id,
                        'business_id' => $opportunity->business_id,
                    ]);
                }
            }


            //                    foreach (request()->{'client_contract_documents_' . $request->opportunity_id} as $file) {
            //                        $size =  $file->getSize();
            //                        $extenstion =  $file->getClientOriginalExtension();
            //
            //                        $document = upload_image($file, public_path('upload/contracts/' . $client->id), true);
            //                        ContractDocument::create([
            //                            'contract_id' => $contract->id,
            //                            'extension'   => $extenstion,
            //                            'size'        => $size,
            //                            'client_id'   => $client->id,
            //                            'document'    => $document,
            //                            'name'        => $file->getClientOriginalName(),
            //                            'agency_id'   => $client->agency_id,
            //                            'business_id' => $client->business_id,
            //
            //
            //                        ]);
            //                    }


            $opportunity->update([
                'converting_approval' => 'waiting_for_approve',
                'reject_reason' => null,
                'rejected_by' => null,
                'reject_date' => null,


                'hold_reason' => null,
                'hold_by' => null,
                'hold_date' => null,

                'submit_for_approve_by' => auth()->user()->id,
                'submit_for_approve_date' => date('Y-m-d'),

            ]);

            DB::commit();

            return back()->with(flash(trans('sales.opportunity_waiting_for_approval'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-client-tab', $request->opportunity_id);
        }
    }


    public function result($request, $id)
    {


        $opportunity = Opportunity::where('id', $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [


                // "result_status_{$id}" => "required|in:in_progress,meeting,unsuccessful,successful",
                "result_stage_{$id}" => "required|in:pending,won,lost",
                "result_note_{$id}" => "required|string",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-result-tab', $id);
            }

            $stage = $opportunity->stage;

            $opportunity->update([
                // 'status' => $request->{'result_status_' . $id},
                'stage' => $request->{'result_stage_' . $id},
            ]);

            $result = OpportunityResult::create([
                // 'status' => $request->{'result_status_' . $id},
                'stage' => $request->{'result_stage_' . $id},
                'note' => $request->{'result_note_' . $id},
                'added_by' => auth()->user()->id,
                'opportunity_id' => $opportunity->id,
            ]);

            DB::commit();

            $template = Template::where('agency_id', $opportunity->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_result')->first();


            if ($template) {

                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);

                $template_with_assigned_by = str_replace('{UPDATED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_status = str_replace('{STATUS}', $request->{'result_status_' . $id}, $template_with_assigned_by);
                $template_with_stage = str_replace('{STAGE}', $request->{'result_stage_' . $id}, $template_with_status);
                $template_with_note = str_replace('{NOTE}', $request->{'result_note_' . $id}, $template_with_stage);

                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_note);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                SendEmail::dispatch(get_owner()->email, $template_with_site_name, "Opportunity Result Report Has Been Confirmed");
                // Mail::to(get_owner()->email)->send(new EmailGeneral($template_with_site_name, "Opportunity Result Report Has Been Confirmed"));
                event(new OpportunityResultEvent($result, get_owner()->id, $opportunity));
                // }
                Notification::send(get_owner(), new OpportunityResultNotification($result, $opportunity));
            } else {
                $system_template = SystemTemplate::where('slug', 'opportunity_result')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                ]);


                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);

                $template_with_assigned_by = str_replace('{UPDATED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_status = str_replace('{STATUS}', $request->{'result_status_' . $id}, $template_with_assigned_by);
                $template_with_stage = str_replace('{STAGE}', $request->{'result_stage_' . $id}, $template_with_status);
                $template_with_note = str_replace('{NOTE}', $request->{'result_note_' . $id}, $template_with_stage);

                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_note);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                SendEmail::dispatch(get_owner()->email, $template_with_site_name, "Opportunity Result Report Has Been Confirmed");
                // Mail::to(get_owner()->email)->send(new EmailGeneral($template_with_site_name, "Opportunity Result Report Has Been Confirmed"));
                event(new OpportunityResultEvent($result, get_owner()->id, $opportunity));
                // }
                Notification::send(get_owner(), new OpportunityResultNotification($result, $opportunity));
            }

            return back()->with(flash(trans('sales.result_report_updated'), 'success'))->with('open-result-tab', $id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-result-tab', $id);
        }
    }


    public function update_qualification_index($request)
    {


        $opportunity = Opportunity::where('id', $request->id)->where('business_id', auth()->user()->business_id)->first();
        $qualification = LeadQualifications::where('id', $request->qualification_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(!$qualification, Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(Gate::denies('edit_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {


            DB::beginTransaction();

            try {

                $opportunity->update([
                    'qualification_id' => $request->qualification_id,
                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.qualification_updated'), 'opportunity' => $opportunity], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => $e->getMessage() . ' ' . trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function question($request, $id)
    {


        $opportunity = Opportunity::where('id', $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [


                "question_body_{$id}" => "required|string",

            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-question-tab', $id);
            }


            $question = OpportunityQuestion::create([
                'question' => $request->{'question_body_' . $id},
                'opportunity_id' => $opportunity->id,
                'agency_id' => $opportunity->agency_id,
                'business_id' => $opportunity->business_id,
                'added_by' => auth()->user()->id,

            ]);

            DB::commit();


            $template = Template::where('agency_id', $opportunity->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_question')->first();


            if ($template) {

                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);

                $template_with_assigned_by = str_replace('{MADE_BY}', auth()->user()->name_en, $template_with_name);

                $template_with_question = str_replace('{QUESTION}', $request->{'question_body_' . $id}, $template_with_assigned_by);

                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_question);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $to_notify = unserialize($opportunity->current_assign->first()->assigned_to) != null ? unserialize($opportunity->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)->get();

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Opportunity Question");

                    event(new OpportunityQuestionEvent($question, $send_to->id, $opportunity));
                }

                Notification::send($users, new OpportunityQuestionNotification($question, $opportunity));
            } else {
                $system_template = SystemTemplate::where('slug', 'opportunity_question')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                ]);
                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);

                $template_with_assigned_by = str_replace('{MADE_BY}', auth()->user()->name_en, $template_with_name);

                $template_with_question = str_replace('{QUESTION}', $request->{'question_body_' . $id}, $template_with_assigned_by);

                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_question);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $to_notify = unserialize($opportunity->current_assign->first()->assigned_to) != null ? unserialize($opportunity->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)->get();


                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Opportunity Question");

                    event(new OpportunityQuestionEvent($question, $send_to->id, $opportunity));
                }

                Notification::send($users, new OpportunityQuestionNotification($question, $opportunity));
            }

            return back()->with(flash(trans('sales.question_made'), 'success'))->with('open-question-tab', $id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-question-tab', $id);
        }
    }


    public function answer($request)
    {

        $opportunity = Opportunity::where('id', $request->opportunity_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');
        $question = OpportunityQuestion::where('id', $request->question_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$question, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [


                "result_question_answer_{$request->question_id}_{$request->opportunity_id}" => "required|string",

            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-question-tab', $request->opportunity_id);
            }


            $question->update([
                'answer' => $request->{'result_question_answer_' . $request->question_id . '_' . $request->opportunity_id},
                'answered_by' => auth()->user()->id,
                'answered' => 'yes',

            ]);

            DB::commit();


            $template = Template::where('agency_id', $opportunity->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_answer')->first();

            if ($template) {

                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);

                $template_with_answered_by = str_replace('{ANSWERED_BY}', auth()->user()->name_en, $template_with_name);

                $template_with_question = str_replace('{QUESTION}', $question->question, $template_with_answered_by);
                $template_with_answer = str_replace('{ANSWER}', $request->{'result_question_answer_' . $request->question_id . '_' . $request->opportunity_id}, $template_with_question);

                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_answer);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);


                $to_notify = unserialize($opportunity->current_assign->first()->assigned_to) != null ? unserialize($opportunity->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)
                    ->where('id', '!=', get_owner()->id)
                    ->get();

                SendEmail::dispatch(get_owner()->email, $template_with_site_name, "New Answer");

                event(new OpportunityAnswerEvent($question, get_owner()->id, $opportunity));

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Opportunity Question");

                    event(new OpportunityQuestionEvent($question, $send_to->id, $opportunity));
                }


                Notification::send(get_owner(), new OpportunityAnswerNotification($question, $opportunity));
            } else {
                $system_template = SystemTemplate::where('slug', 'opportunity_answer')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $opportunity->agency_id,
                    'business_id' => $opportunity->business_id,
                ]);

                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);

                $template_with_answered_by = str_replace('{ANSWERED_BY}', auth()->user()->name_en, $template_with_name);

                $template_with_question = str_replace('{QUESTION}', $question->question, $template_with_answered_by);
                $template_with_answer = str_replace('{ANSWER}', $request->{'result_question_answer_' . $request->question_id . '_' . $request->opportunity_id}, $template_with_question);

                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_answer);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);


                $to_notify = unserialize($opportunity->current_assign->first()->assigned_to) != null ? unserialize($opportunity->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)
                    ->where('id', '!=', get_owner()->id)
                    ->get();

                SendEmail::dispatch(get_owner()->email, $template_with_site_name, "New Answer");

                event(new OpportunityAnswerEvent($question, get_owner()->id, $opportunity));

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Opportunity Question");

                    event(new OpportunityQuestionEvent($question, $send_to->id, $opportunity));
                }


                Notification::send(get_owner(), new OpportunityAnswerNotification($question, $opportunity));
            }


            return back()->with(flash(trans('sales.answer_made'), 'success'))->with('open-question-tab', $request->opportunity_id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-question-tab', $request->opportunity_id);
        }
    }


    public function suggest_new_convert($request)
    {

        $opportunity = Opportunity::where('id', $request->opportunity_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {


            $validator = Validator::make($request->all(), Opportunity::suggest_new_convert_validation($request));


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-hold-tab', $request->opportunity_id);
            }

            if (
                !($request->{"hold_passport_" . $request->opportunity_id})
                &&
                !($request->{"hold_national_id_" . $request->opportunity_id})
            ) {

                return back()->withInput()->with(flash(trans('sales.type_one_of_passport_or_national_id'), 'error'))->with('open-hold-tab', $request->opportunity_id);
            }


            if (($request->{"hold_passport_" . $request->opportunity_id})) {


                if (!$request->{"hold_passport_expiration_date_" . $request->opportunity_id}) {
                    return back()->withInput()->with(flash(trans('sales.passport_expiration_date_is_required'), 'error'))->with('open-hold-tab', $request->opportunity_id);
                }
            }

            if ($request->{"hold_recurring_type_" . $request->opportunity_id} == 'yes') {


                if (count($request->{'recurrings_amount_' . $request->opportunity_id}) != count($request->{'recurrings_dates_' . $request->opportunity_id})) {

                    return back()->withInput()->with(flash(trans('sales.recurring_and_dates_not_equal'), 'error'))->with('open-hold-tab', $request->opportunity_id);
                }
                if (count($request->{'recurrings_dates_' . $request->opportunity_id}) > count(array_unique($request->{'recurrings_dates_' . $request->opportunity_id}))) {

                    return back()->withInput()->with(flash(trans('sales.dates_of_recurrings_are_repeated'), 'error'))->with('open-hold-tab', $request->opportunity_id);
                }

                $recurring_value = 0;
                foreach ($request->{'recurrings_amount_' . $request->opportunity_id} as $r) {
                    $recurring_value += $r;
                }

                if ($request->{'hold_amount_' . $request->opportunity_id} != $recurring_value) {
                    return back()->withInput()->with(flash(trans('sales.recurrings_not_equal_amount'), 'error'))
                        ->with('open-hold-tab', $request->opportunity_id);
                }
            }

            $check_unique_emails = Client::where('id', '!=', $request->client_id)->where('business_id', $opportunity->business_id)
                ->where('agency_id', $opportunity->agency_id)->where(function ($query) {

                    $query->where([
                        ['email1', '!=', null],
                        ['email1', request()->{"hold_email1_" . request()->opportunity_id}],
                    ])
                        ->orWhere([
                            ['email2', '!=', null],
                            ['email2', request()->{"hold_email1_" . request()->opportunity_id}],
                        ])->orWhere([
                            ['skype', '!=', null],
                            ['skype', request()->{"hold_email1_" . request()->opportunity_id}],
                        ]);
                })->get();


            $check_unique_phones = Client::where('id', '!=', $request->client_id)->where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->Where([
                        ['phone1', '!=', null],
                        ['phone1', request()->{"hold_phone1_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', request()->{"hold_phone1_" . request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', request()->{"hold_phone1_" . request()->opportunity_id}],
                    ]);
            })->get();


            $check_unique_passport = Client::where('id', '!=', $request->client_id)->where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['passport', '!=', null],
                        ['passport', request()->{"hold_passport_" . request()->opportunity_id}],
                    ]);
            })->get();


            $check_unique_national_id = Client::where('id', '!=', $request->client_id)->where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['national_id', '!=', null],
                        ['national_id', request()->{"hold_national_id_" . request()->opportunity_id}],
                    ]);
            })->get();


            if (count($check_unique_emails) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_email') . ' ' . $check_unique_emails->first()->full_name ?? '', 'danger'))->with('open-hold-tab', $opportunity->id);
            }
            if (count($check_unique_passport) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_passport') . ' ' . $check_unique_passport->first()->full_name ?? '', 'danger'))->with('open-hold-tab', $opportunity->id);
            }

            if (count($check_unique_phones) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_phone') . ' ' . $check_unique_phones->first()->full_name ?? '', 'danger'))->with('open-hold-tab', $opportunity->id);
            }


            if (count($check_unique_national_id) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_national_id') . ' ' . $check_unique_national_id->first()->full_name ?? '', 'danger'))->with('open-hold-tab', $opportunity->id);
            }

            DB::beginTransaction();

            $opportunity->client->update([


                'name' => $request->{"hold_name_" . $request->opportunity_id},
                'email1' => $request->{"hold_email1_" . $request->opportunity_id},
                'phone1' => $request->{"hold_phone1_" . $request->opportunity_id},
                'country' => $request->{"hold_country_" . $request->opportunity_id},

                'language' => $request->{"hold_language_" . $request->opportunity_id},
                'currency' => $request->{"hold_currency_" . $request->opportunity_id},
                'passport' => $request->{"hold_passport_" . $request->opportunity_id},
                'national_id' => $request->{"hold_national_id_" . $request->opportunity_id},
                'passport_expiration_date' => $request->{"hold_passport_expiration_date_" . $request->opportunity_id},


                "date_of_birth" => $request->{"hold_date_of_birth_" . $request->opportunity_id},


                "source_id" => $opportunity->source_id,


            ]);


            $contract = ClientContract::findorfail($request->{"hold_contract_id_" . $request->opportunity_id});

            $contract->update([

                'status' => 'pending',
                'contract_type' => $request->{'hold_contract_type_' . $request->opportunity_id},

                'customer_name' => $request->{'hold_customer_' . $request->opportunity_id},
                'customer_national_id' => $request->{'hold_customer_national_id_' . $request->opportunity_id},
                'customer_address' => $request->{'hold_customer_address_' . $request->opportunity_id},


                'landlord_name' => $request->{'hold_landlord_' . $request->opportunity_id},
                'landlord_national_id' => $request->{'hold_landlord_national_id_' . $request->opportunity_id},
                'landlord_address' => $request->{'hold_landlord_address_' . $request->opportunity_id},
                'address' => $request->{'hold_address_' . $request->opportunity_id},

                'start_date' => $request->{'hold_date_' . $request->opportunity_id},
                'end_date' => $request->{'hold_end_date_' . $request->opportunity_id},
                'notes' => $request->{'hold_note_' . $request->opportunity_id},
                'has_recurring' => $request->{'hold_recurring_type_' . $request->opportunity_id},
                'recurring_number' => $request->{'recurrings_amount_' . $request->opportunity_id} &&
                    count($request->{'recurrings_amount_' . $request->opportunity_id}) > 0 ?
                    count($request->{'recurrings_amount_' . $request->opportunity_id}) : null,
                'amount' => $request->{'hold_amount_' . $request->opportunity_id},


            ]);


            if ($request->{'hold_recurring_type_' . $request->opportunity_id} == 'yes') {

                // deleteing all recuring then adding a new ones
                $contract->recurrings->each(function ($q) {
                    $q->delete();
                });


                $merged = array();
                foreach ($request->{'recurrings_amount_' . $request->opportunity_id} as $key => $arr) {

                    $merged[$key][] = $arr;
                }
                foreach ($request->{'recurrings_dates_' . $request->opportunity_id} as $key => $arr) {

                    $merged[$key][] = $arr;
                }

                foreach ($merged as $recurring) {
                    ContractRecurring::create([
                        'contract_id' => $contract->id,
                        'client_id' => $opportunity->client->id,
                        'amount' => $recurring[0],
                        'date' => $recurring[1],
                        'payed' => 'no',
                        'agency_id' => $opportunity->client->agency_id,
                        'business_id' => $opportunity->client->business_id,
                    ]);
                }
            }

            if ($request->has('hold_contract_documents_' . $request->opportunity_id)) {

                foreach (request()->{'hold_contract_documents_' . $request->opportunity_id} as $file) {
                    $size = $file->getSize();
                    $extenstion = $file->getClientOriginalExtension();

                    $document = upload_image($file, public_path('upload/contracts/' . $opportunity->client->id), true);
                    ContractDocument::create([
                        'contract_id' => $contract->id,
                        'extension' => $extenstion,
                        'size' => $size,
                        'client_id' => $opportunity->client->id,
                        'document' => $document,
                        'name' => $file->getClientOriginalName(),
                        'agency_id' => $opportunity->client->agency_id,
                        'business_id' => $opportunity->client->business_id,

                    ]);
                }
            } else {
                if (!($contract->documents->count() > 0)) {

                    //                    return back()->withInput()->with(flash(trans('sales.documents_required'), 'error'))->with('open-hold-tab', $request->opportunity_id);
                }
            }


            $opportunity->update([
                'converting_approval' => 'waiting_for_approve',


                'reject_reason' => null,
                'rejected_by' => null,
                'reject_date' => null,


                'hold_reason' => null,
                'hold_by' => null,
                'hold_date' => null,

                'submit_for_approve_by' => auth()->user()->id,
                'submit_for_approve_date' => date('Y-m-d'),

            ]);

            DB::commit();

            return back()->with(flash(trans('sales.opportunity_waiting_for_approval'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-hold-tab', $request->opportunity_id);
        }
    }

    public function remove_document($request)
    {

        abort_if(Gate::denies('convert_opportunity_to_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client = Client::where('id', $request->client)->where('business_id', auth()->user()->business_id)->first();
        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contract = ClientContract::where('id', $request->contract)->where('client_id', $client->id)->where('business_id', auth()->user()->business_id)->first();
        abort_if(!$contract, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $document = ContractDocument::where('id', $request->document)->where('client_id', $client->id)->where('business_id', auth()->user()->business_id)->first();
        abort_if(!$document, Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            DB::beginTransaction();
            if (file_exists(public_path('upload/contracts/' . $client->id . '/' . $document->document))) {
                unlink(public_path('upload/contracts/' . $client->id . '/' . $document->document));
            } else {
                return response()->json(['message' => trans('sales.file_doesnt_exist')], 400);
            }
            $document->delete();
            DB::commit();

            return response()->json(['message' => trans('sales.document_removed')], 200);
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json(['message' => trans('sales.something_went_wrong')], 400);
        }
    }


    public function client_reject($request)
    {
        $opportunity = Opportunity::where('id', $request->opportunity_id)->where('business_id', auth()->user()->business_id)
            ->first();
        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {
            $validator = Validator::make($request->all(), [

                "reject_reason_" . $opportunity->id => "required|string",

            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))
                    ->with('open-approve-tab', $opportunity->id);
            }

            DB::beginTransaction();

            $opportunity->client->contracts->first()->documents->each(function ($q) use ($opportunity) {
                if (file_exists(public_path('upload/contracts/' . $opportunity->client->id . '/' . $q->document))) {
                    unlink(public_path('upload/contracts/' . $opportunity->client->id . '/' . $q->document));
                }

                $q->delete();
            });
            $opportunity->client->contracts->first()->recurrings->each(function ($q) {
                $q->delete();
            });
            $opportunity->client->contracts->each(function ($q) {
                $q->delete();
            });

            $opportunity->client->delete();

            $opportunity->update([
                'converting_approval' => 'rejected',
                'reject_reason' => $request->{'reject_reason_' . $opportunity->id},
                'rejected_by' => auth()->user()->id,
                'reject_date' => date('Y-m-d'),


                'hold_reason' => null,
                'hold_by' => null,
                'hold_date' => null,

                'submit_for_approve_by' => null,
                'submit_for_approve_date' => null,
            ]);


            DB::commit();
            return back()->with(flash(trans('sales.client_rejected'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with(
                'open-client-tab',
                $request->opportunity_id
            );
        }
    }

    public function approve_client($request)
    {

        try {
            $opportunity = Opportunity::where('id', $request->opportunity_id)
                ->where('business_id', auth()->user()->business_id)->firstOrFail();

            $client = Client::where('id', $request->client_id)->where('converted_from', $opportunity->id)
                ->where('business_id', auth()->user()->business_id)->firstOrFail();



            DB::beginTransaction();
            $client->update(['status' => 'accepted']);
            $opportunity->delete();
            DB::commit();
            return back()->with(flash(trans('sales.client_approved'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with(
                'open-approve-tab',
                $request->opportunity_id
            );
        }
    }








    public function load_listing($request)
    {
        if ($request->ajax()) {
            $agency = Agency::findOrFail($request->agency_id);
            return response()->json(['listings' => Listing::where('agency_id', $agency->id)->pluck('listing_ref', 'id')]);
        }
    }
}
