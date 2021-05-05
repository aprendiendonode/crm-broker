<?php

namespace Modules\Sales\Http\Repositories;

use App\Models\Agency;
use App\Jobs\SendEmail;
use App\Models\SystemTemplate;
use Modules\Sales\Entities\Call;
use Illuminate\Support\Facades\DB;
use Modules\Activity\Entities\Task;
use App\Events\ClientTaskEvent;
use App\Events\ClientAnswerEvent;
use Modules\Sales\Entities\CallStatus;
use Modules\Setting\Entities\Template;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskType;
use Modules\Sales\Entities\Client;
use App\Events\ClientQuestionEvent;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskStatus;
use Illuminate\Support\Facades\Notification;
use Modules\Sales\Entities\LeadQualifications;
use Symfony\Component\HttpFoundation\Response;
use Modules\Sales\Entities\ClientQuestion;
use App\Notifications\ClientTaskNotification;
use App\Notifications\ClientAnswerNotification;
use App\Notifications\ClientQuestionNotification;

class ClientRepo
{
    public function index($agency)
    {
        $pagination = true;
        $business  = auth()->user()->business_id;
        $per_page  = 15;

        $agency = Agency::with([
            'lead_sources', 'lead_types', 'lead_properties', 'lead_communications',
            'task_status', 'task_types'
        ])->where('id', $agency)->where('business_id', $business)->first();
        abort_if(!$agency, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = DB::table('countries')->get();
        $lead_sources               = $agency->lead_sources;
        $lead_priorities            = $agency->lead_priorities;
        $lead_types                 = $agency->lead_types;
        $lead_properties            = $agency->lead_properties;
        $lead_communications        = $agency->lead_communications;
        $task_status                = $agency->task_status;
        $task_types                 = $agency->task_types;
        $call_status                 = $agency->call_status;
        // $cities                     = City::all();
        $cities                     = DB::table('cities')->get();
        $languages                  = DB::table('languages')->get();
        $currencies                 = DB::table('currencies')->get();



        $clients = Client::with([
            'tasks', 'calls', 'convertedBy',
            'tasks.addBy',
            'tasks.staff',
            'calls.madeBy',
            'questions',
            'questions.addedBy',
        ])->where('agency_id', $agency->id)->where('business_id', $business);

        $staffs = staff($agency->id);

        if (request('filter_phone') != null) {

            $clients->where(function ($query) {
                $query->where('phone1', 'like', '%' . request('filter_phone') . '%')
                    ->orWhere('phone2', 'like', '%' . request('filter_phone') . '%')
                    ->orWhere('landline', 'like', '%' . request('filter_phone') . '%')
                    ->orWhere('fax', 'like', '%' . request('filter_phone') . '%');
            });
        }


        if (request('filter_name') != null) {
            $clients->where(function ($query) {
                $query->where('name', 'like', '%' . request('filter_name') . '%');
            });
        }

        if (request('filter_email') != null) {
            $clients->where(function ($query) {
                $query->where('email1', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('email2', 'like', '%' . request('filter_email') . '%');
            });
        }


        if (request('filter_source') != null) {
            $clients->where(function ($query) {
                $query->where('source_id', request('filter_source'));
            });
        }

        if (request('filter_type') != null) {
            $clients->where(function ($query) {
                $query->where('type_id', request('filter_type'));
            });
        }
        if (request('filter_qualifications') != null) {
            $clients->where(function ($query) {
                $query->where('qualification_id', request('filter_qualifications'));
            });
        }
        if (request('filter_way_of_communications') != null) {
            $clients->where(function ($query) {
                $query->where('communication_id', request('filter_way_of_communications'));
            });
        }

        if (request('filter_priority') != null) {
            $clients->where(function ($query) {
                $query->where('priority_id', request('filter_priority'));
            });
        }

        if (request('filter_property_purpose') != null) {
            $clients->where(function ($query) {
                $query->where('property_purpose', request('filter_property_purpose'));
            });
        }



            $clients = $clients->paginate($per_page);





        $agency = $agency->id;
        return view(
            'sales::clients.index',
            compact(
                'staffs',
                'clients',
                'pagination',
                'cities',
                'languages',
                'currencies',
                'countries',
                'agency',
                'business',
                'lead_sources',
                'lead_communications',
                'lead_types',
                'lead_properties',
                'task_status',
                'task_types',
                'call_status',
            )
        );
    }


    public function update($id, $request)
    {


        $client = Client::where('id', $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), Client::update_validation($id));
            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }

            $fullname = $request->{'edit_full_name_' . $id} != null ? $request->{'edit_full_name_' . $id} : ($request->{'edit_first_name_' . $id} . ' ' . $request->{'edit_sec_name_' . $id});

            $client->update([

                "source_id"                    => $request->{'edit_source_id_' . $id},

                "type_id"                      => $request->{'edit_type_id_' . $id},
                "communication_id"             => $request->{'edit_communication_id_' . $id},
                "company"                      => $request->{'edit_company_' . $id},
                "address"                      => $request->{'edit_address_' . $id},
                "website"                      => $request->{'edit_website_' . $id},
                "po_box"                       => $request->{'edit_po_box_' . $id},
                "passport"                     => $request->{'edit_passport_' . $id},
                "passport_expiration_date"     => $request->{'edit_passport_expiration_date_' . $id},
                "name"                         => $request->{'edit_name_' . $id},
                "partner_name"                 => $request->{'edit_partner_name_' . $id},
                "date_of_birth"                => $request->{'edit_date_of_birth_' . $id},
                "email1"                       => $request->{'edit_email1_' . $id},
                "email2"                       => $request->{'edit_email2_' . $id},
                "nationality_id"               => $request->{'edit_nationality_id_' . $id},
                "country"                      => $request->{'edit_country_' . $id},
//                "city_id"                      => $request->{'edit_city_id_' . $id},
                "phone1"                       => $request->{'edit_phone1_' . $id},
                "phone2"                       => $request->{'edit_phone2_' . $id},
                "landline"                     => $request->{'edit_landline_' . $id},
                "fax"                          => $request->{'edit_fax_' . $id},
                "developer"                    => $request->{'edit_developer_' . $id},
                "community"                    => $request->{'edit_community_' . $id},
                "building_name"                => $request->{'edit_building_name_' . $id},
                "property_purpose"             => $request->{'edit_property_purpose_' . $id},
                "property_no"                  => $request->{'edit_property_no_' . $id},
                "property_id"                  => $request->{'edit_property_id_' . $id},

                "property_reference"           => $request->{'edit_property_reference_' . $id},
                "size_sqft"                    => $request->{'edit_size_sqft_' . $id},
                "size_sqm"                     => $request->{'edit_size_sqm_' . $id},
                "bedrooms"                     => $request->{'edit_bedrooms_' . $id},
                "bathrooms"                    => $request->{'edit_bathrooms_' . $id},
                "parkings"                     => $request->{'edit_parkings_' . $id},
                "salutation"                   => $request->{'edit_salutation_' . $id},
                "skype"                        => $request->{'edit_skype_' . $id},
            ]);

            DB::commit();
            return back()->with(flash(trans('sales.client_updated'), 'success'))->with('open-edit-tab', $id);
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }


    public function make_call($request, $id)
    {

        $call_status         = CallStatus::where('id', $request->{'call_status_id_' . $id})->where('business_id', auth()->user()->business_id)->first();

        $client = Client::where('id',  $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$call_status, Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [

                "call_contact_date_" . $id      => "required|date|date_format:Y-m-d",
                "call_contact_time_" . $id      => "required|string",
                "call_next_action_date_" . $id  => "sometimes|nullable|date|date_format:Y-m-d",
                "call_next_action_time_" . $id  => "sometimes|nullable|string",
                "call_note_" . $id              => "required|string",



            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-call-tab', $id);
            }


            $call = Call::create([
                'module'             => 'client',
                'module_id'          => $client->id,
                'agency_id'          => $client->agency_id,
                'business_id'        => $client->business_id,
                'status_id'          => $call_status->id,
                'made_by'            => auth()->user()->id,
                'contact_date'       => $request->{'call_contact_date_' . $id},
                'contact_time'       => $request->{'call_contact_time_' . $id},

                'next_action_date'   => $request->{'call_next_action_date_' . $id},
                'next_action_time'   => $request->{'call_next_action_time_' . $id},
                'note'               => $request->{'call_note_' . $id},
            ]);





            DB::commit();
            return back()->with(flash(trans('sales.call_created'), 'success'))->with('open-call-tab', $id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-call-tab', $id);
        }
    }





    public function assign_task($request, $id)
    {

        $client = Client::where('id', $request->task_client_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');


        $task_type = TaskType::where('id', $request->{'task_type_' . $id})->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$task_type, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task_status = TaskStatus::where('id', $request->{'task_status_' . $id})->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$task_status, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {

            $validator  = Validator::make($request->all(), [

                "task_agency_id_{$id}"            => "required|integer|exists:agencies,id",
                "task_business_id_{$id}"          => "required|integer|exists:businesses,id",
                "task_note_en_{$id}"              => "sometimes|nullable|string",
                "task_note_ar_{$id}"              => "sometimes|nullable|string",
                "task_deadline_{$id}"             => "required|date|date_format:Y-m-d",
                "task_time_{$id}"                 => "required|string",
                "task_custom_reminder_{$id}"      => "sometimes|nullable|in:on,off",
                "task_period_reminder_{$id}"      => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "task_type_reminder_{$id}"        => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);



            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }
            DB::beginTransaction();

            $task = Task::create([
                "agency_id"                 => $request->{'task_agency_id_' . $id},
                "business_id"               => $request->{'task_business_id_' . $id},

                "task_type_id"              => $request->{'task_type_' . $id},
                "task_status_id"            => $request->{'task_status_' . $id},
                "module"                    => 'client',
                "module_id"                 => $client->id,
                "deadline"                  => $request->{'task_deadline_' . $id},


                "time"                      => $request->{'task_time_' . $id},
                "custom_reminder"           => $request->{'task_custom_reminder_' . $id},

                "period_reminder"           => $request->{'task_period_reminder_' . $id},

                "type_reminder"             => $request->{'task_type_reminder_' . $id},
                "type_reminder_number"      => $request->{'task_type_reminder_number_' . $id},


                "add_by"                    => auth()->user()->id,
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
                    'task_id'       => $task->id,
                    'add_by'        => auth()->user()->id,
                    'notes_en'      => $request->{'task_note_en_' . $id},
                    'notes_ar'      => $request->{'task_note_ar_' . $id},
                ]);
            }
            DB::commit();




            $template = Template::where('agency_id', $client->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'client_task')->first();


            if ($template) {

                $template_with_name         = str_replace('{TASK_NAME}', $client->full_name, $template->description_en);
                $template_with_assigned_by  = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url          = str_replace('{TASK_URL}', url('sales/clients/' . $client->agency_id), $template_with_assigned_by);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Client Task Has Been Assigned To You");

                    event(new ClientTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ClientTaskNotification($task));
            } else {
                $system_template = SystemTemplate::where('slug', 'client_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $client->agency_id,
                    'business_id' => $client->business_id,
                ]);

                $template_with_name         = str_replace('{TASK_NAME}', $client->full_name, $template->description_en);
                $template_with_assigned_by  = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url          = str_replace('{TASK_URL}', url('sales/clients/' . $client->agency_id), $template_with_assigned_by);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Client Task Has Been Assigned To You");

                    event(new ClientTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ClientTaskNotification($task));

            }

                return back()->with(flash(trans('sales.task_assigned'), 'success'))->with('open-task-tab',  $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab',  $id);
        }
    }
    public function edit_assign_task($request, $id)
    {

        $client = Client::where('id', $request->edit_task_client_id)->where('business_id', auth()->user()->business_id)->firstOrFail();
        $task_type = TaskType::where('id', $request->{'edit_task_type_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();
        $task_status = TaskStatus::where('id', $request->{'edit_task_status_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        $task = Task::where('id', $request->{'edit_task_id_' . $id})->where('business_id', auth()->user()->business_id)->firstOrFail();

        try {

            $validator  = Validator::make($request->all(), [

                "edit_task_agency_id_{$id}"            => "required|integer|exists:agencies,id",
                "edit_task_business_id_{$id}"          => "required|integer|exists:businesses,id",
                "edit_task_note_en_{$id}"              => "sometimes|nullable|string",
                "edit_task_note_ar_{$id}"              => "sometimes|nullable|string",
                "edit_task_deadline_{$id}"             => "required|date|date_format:Y-m-d",
                "edit_task_time_{$id}"                 => "required|string",
                "edit_task_custom_reminder_{$id}"      => "sometimes|nullable|in:on,off",
                "edit_task_period_reminder_{$id}"      => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "edit_task_type_reminder_{$id}"        => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "edit_task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);



            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }

            DB::beginTransaction();

            $task->update([
                "agency_id"                 => $request->{'edit_task_agency_id_' . $id},
                "business_id"               => $request->{'edit_task_business_id_' . $id},

                "task_type_id"              => $request->{'edit_task_type_' . $id},
                "task_status_id"            => $request->{'edit_task_status_' . $id},
                "module"                    => 'client',
                "module_id"                 => $client->id,
                "deadline"                  => $request->{'edit_task_deadline_' . $id},
                "time"                      => $request->{'edit_task_time_' . $id},
                "custom_reminder"           => $request->{'edit_task_custom_reminder_' . $id},

                "period_reminder"           => $request->{'edit_task_period_reminder_' . $id},

                "type_reminder"             => $request->{'edit_task_type_reminder_' . $id},
                "type_reminder_number"      => $request->{'edit_task_type_reminder_number_' . $id},
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
                    'task_id'       => $task->id,
                    'add_by'        => auth()->user()->id,
                    'notes_en'      => $request->{'edit_task_note_en_' . $id},
                ]);
            }
            DB::commit();
            $template = Template::where('agency_id', $client->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'client_task')->first();


            if ($template) {

                $template_with_name         = str_replace('{TASK_NAME}', $client->full_name, $template->description_en);
                $template_with_assigned_by  = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url          = str_replace('{TASK_URL}', url('sales/clients/' . $client->agency_id), $template_with_assigned_by);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Client Task Has Been UPDATED");

                    event(new ClientTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ClientTaskNotification($task));
            }
            else {
                $system_template = SystemTemplate::where('slug', 'client_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $client->agency_id,
                    'business_id' => $client->business_id,
                ]);

                $template_with_name         = str_replace('{TASK_NAME}', $client->full_name, $template->description_en);
                $template_with_assigned_by  = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url          = str_replace('{TASK_URL}', url('sales/clients/' . $client->agency_id), $template_with_assigned_by);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff_for_notify)->get();

                foreach ($users as $send_to) {
                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Client Task Has Been UPDATED");

                    event(new ClientTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new ClientTaskNotification($task));

            }

                return back()->with(flash(trans('sales.task_updated'), 'success'))->with('open-task-tab',  $id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab',  $id);
        }
    }



    public function question($request, $id)
    {


        $client = Client::where('id', $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {

            $validator  = Validator::make($request->all(), [


                "question_body_{$id}" => "required|string",

            ]);



            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-question-tab', $id);
            }

            $question = ClientQuestion::create([
                'question'       => $request->{'question_body_' . $id},
                'client_id'      => $client->id,
                'agency_id'      => $client->agency_id,
                'business_id'    => $client->business_id,
                'added_by'       => auth()->user()->id,
            ]);

            DB::commit();




            $template = Template::where('agency_id', $client->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'client_question')->first();


            if ($template) {

                $template_with_name         = str_replace('{OPPORTUNITY_NAME}', $client->full_name, $template->description_en);

                $template_with_assigned_by  = str_replace('{MADE_BY}', auth()->user()->name_en, $template_with_name);

                $template_with_question  = str_replace('{QUESTION}', $request->{'question_body_' . $id}, $template_with_assigned_by);

                $template_with_url          = str_replace('{OPPORTUNITY_URL}', url('sales/clients/' . $client->agency_id), $template_with_question);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $to_notify = unserialize($client->current_assign->first()->assigned_to) != null ? unserialize($client->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)->get();

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Client Question");

                    event(new ClientQuestionEvent($question, $send_to->id));
                }

                Notification::send($users, new ClientQuestionNotification($question));
            }
            else {
                $system_template = SystemTemplate::where('slug', 'client_question')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $client->agency_id,
                    'business_id' => $client->business_id,
                ]);


                $template_with_name         = str_replace('{OPPORTUNITY_NAME}', $client->full_name, $template->description_en);

                $template_with_assigned_by  = str_replace('{MADE_BY}', auth()->user()->name_en, $template_with_name);

                $template_with_question  = str_replace('{QUESTION}', $request->{'question_body_' . $id}, $template_with_assigned_by);

                $template_with_url          = str_replace('{OPPORTUNITY_URL}', url('sales/clients/' . $client->agency_id), $template_with_question);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $to_notify = unserialize($client->current_assign->first()->assigned_to) != null ? unserialize($client->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)->get();

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Client Question");

                    event(new ClientQuestionEvent($question, $send_to->id));
                }

                Notification::send($users, new ClientQuestionNotification($question));
            }

                return back()->with(flash(trans('sales.question_made'), 'success'))->with('open-question-tab', $id);
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-question-tab', $id);
        }
    }



    public function answer($request)
    {

        $client = Client::where('id', $request->client_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$client, Response::HTTP_FORBIDDEN, '403 Forbidden');
        $question = ClientQuestion::where('id', $request->question_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$question, Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();
        try {

            $validator  = Validator::make($request->all(), [


                "result_question_answer_{$request->question_id}_{$request->client_id}"  => "required|string",

            ]);



            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-question-tab', $request->client_id);
            }


            $question->update([
                'answer'          => $request->{'result_question_answer_' . $request->question_id . '_' . $request->client_id},
                'answered_by'     => auth()->user()->id,
                'answered'        => 'yes',

            ]);

            DB::commit();


            $template = Template::where('agency_id', $client->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'client_answer')->first();


            if ($template) {

                $template_with_name         = str_replace('{OPPORTUNITY_NAME}', $client->full_name, $template->description_en);
                $template_with_answered_by  = str_replace('{ANSWERED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_question  = str_replace('{QUESTION}', $question->question, $template_with_answered_by);
                $template_with_answer  = str_replace('{ANSWER}',  $request->{'result_question_answer_' . $request->question_id . '_' . $request->client_id}, $template_with_question);
                $template_with_url          = str_replace('{OPPORTUNITY_URL}', url('sales/clients/' . $client->agency_id), $template_with_answer);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);
                $to_notify = unserialize($client->current_assign->first()->assigned_to) != null ? unserialize($client->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)
                    ->where('id', '!=', get_owner()->id)
                    ->get();

                SendEmail::dispatch(get_owner()->email, $template_with_site_name, "New Answer");

                event(new ClientAnswerEvent($question, get_owner()->id));

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Client Question");

                    event(new ClientQuestionEvent($question, $send_to->id));
                }




                Notification::send(get_owner(), new ClientAnswerNotification($question));
            }else {
                $system_template = SystemTemplate::where('slug', 'client_answer')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $client->agency_id,
                    'business_id' => $client->business_id,
                ]);



                $template_with_name         = str_replace('{OPPORTUNITY_NAME}', $client->full_name, $template->description_en);
                $template_with_answered_by  = str_replace('{ANSWERED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_question  = str_replace('{QUESTION}', $question->question, $template_with_answered_by);
                $template_with_answer  = str_replace('{ANSWER}',  $request->{'result_question_answer_' . $request->question_id . '_' . $request->client_id}, $template_with_question);
                $template_with_url          = str_replace('{OPPORTUNITY_URL}', url('sales/clients/' . $client->agency_id), $template_with_answer);
                $template_with_site_name    = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);
                $to_notify = unserialize($client->current_assign->first()->assigned_to) != null ? unserialize($client->current_assign->first()->assigned_to) : [];
                $users = \App\Models\User::whereIn('id', $to_notify)
                    ->where('id', '!=', auth()->user()->id)
                    ->where('id', '!=', get_owner()->id)
                    ->get();

                SendEmail::dispatch(get_owner()->email, $template_with_site_name, "New Answer");

                event(new ClientAnswerEvent($question, get_owner()->id));

                foreach ($users as $send_to) {

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "New Client Question");

                    event(new ClientQuestionEvent($question, $send_to->id));
                }




                Notification::send(get_owner(), new ClientAnswerNotification($question));
            }


                return back()->with(flash(trans('sales.answer_made'), 'success'))->with('open-question-tab', $request->client_id);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-question-tab', $request->client_id);
        }
    }
}