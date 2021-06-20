<?php

namespace Modules\Sales\Http\Controllers;

use App\FaildLead;
use App\Imports\LeadsImport;
use App\Jobs\ExportFailedLeadsFile;
use App\Jobs\ImportLeadsSheet;
use App\Jobs\SendFailedLeadsMail;
use App\Jobs\SendFailedLeadsMailClient;
use App\Jobs\StartLeadsInsertJobs;
use App\Models\SystemTemplate;
use Gate;

use App\Models\City;

use App\Models\Team;
use App\Models\User;
use App\Models\Agency;
use App\Jobs\SendEmail;
use App\Models\Country;
use App\Mail\EmailGeneral;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Events\LeadTaskEvent;
use App\Models\PermissionGroup;
use Illuminate\Validation\Rule;
use App\Events\OpportunityEvent;
use Modules\Sales\Entities\Call;
use Modules\Sales\Entities\Lead;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Activity\Entities\Task;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Sales\Entities\LeadType;
use Modules\Sales\Entities\CallStatus;
use Modules\Sales\Entities\LeadSource;
use Modules\Setting\Entities\Template;
use Modules\Activity\Entities\TaskNote;
use Modules\Activity\Entities\TaskType;
use Modules\Sales\Entities\Opportunity;
use Modules\Sales\Entities\LeadPriority;
use Modules\Sales\Entities\LeadProperty;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Modules\Activity\Entities\TaskStatus;
use App\Notifications\LeadTaskNotification;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Notification;
use Modules\Sales\Entities\OpportunityStage;
use Modules\Sales\Entities\LeadCommunication;
use Modules\Sales\Entities\OpportunityResult;
use App\Notifications\OpportunityNotification;
use Modules\Sales\Entities\LeadQualifications;
use Symfony\Component\HttpFoundation\Response;


class LeadsController extends Controller
{


    public function index($agency)
    {


        abort_if(Gate::denies('view_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pagination = true;

        $business = auth()->user()->business_id;
        $per_page = 15;

        $agency = Agency::with([
            'lead_sources', 'lead_qualifications', 'lead_types', 'lead_properties', 'lead_priorities', 'lead_communications',
            'task_status',  'task_types',  'developers', 'country'
        ])->where('id', $agency)->where('business_id', $business)->firstOrFail();


        // $currencies  = DB::table('currencies')->get();
        $leads = Lead::with([
            'calls',
            'tasks',
            'tasks.addBy',
            'tasks.staff',
            'calls.madeBy',
        ])->where('agency_id', $agency->id)->where('business_id', $business);

        if (request('filter_phone') != null) {
            $leads->where(function ($query) {
                $query->where('phone1', request('filter_phone'))
                    ->orWhere('phone2', request('filter_phone'))
                    ->orWhere('phone3', request('filter_phone'))
                    ->orWhere('phone4', request('filter_phone'))
                    ->orWhere('landline', request('filter_phone'))
                    ->orWhere('fax', request('filter_phone'));
            });
        }

        if (request('filter_reference') != null) {
            $leads->where('reference', request('filter_reference'));
        }

        if (request('filter_name') != null) {
            $leads->where(function ($query) {
                $query->where('first_name', 'like', '%' . request('filter_name') . '%')
                    ->orWhere('sec_name', 'like', '%' . request('filter_name') . '%')
                    ->orWhere('full_name', 'like', '%' . request('filter_name') . '%');
            });
        }

        if (request('filter_email') != null) {
            $leads->where(function ($query) {
                $query->where('email1', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('email2', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('email3', 'like', '%' . request('filter_email') . '%')
                    ->orWhere('skype', 'like', '%' . request('filter_email') . '%');
            });
        }

        if (request('filter_source') != null) {
            $leads->where('source_id', request('filter_source'));
        }

        if (request('filter_type') != null) {
            $leads->where('type_id', request('filter_type'));
        }

        if (request('filter_qualifications') != null) {
            $leads->where('qualification_id', request('filter_qualifications'));
        }

        if (request('filter_way_of_communications') != null) {
            $leads->where('communication_id', request('filter_way_of_communications'));
        }

        if (request('filter_priority') != null) {
            $leads->where('priority_id', request('filter_priority'));
        }

        if (request('filter_property_purpose') != null) {
            $leads->where('property_purpose', request('filter_property_purpose'));
        }


        return view(
            'sales::leads.index',
            [
                'leads' => $leads->paginate($per_page),
                'pagination' => $pagination,
//                'total_leads' => $agency->leads,
                'staffs' => staff($agency->id),
                'countries' =>
                cache()->remember('countries', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('countries')->get();
                }),
                'cities' =>
                cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('cities')->get();
                }),
                'communities' =>
                cache()->remember('communities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('communities')->get();
                }),
                'sub_communities' =>
                cache()->remember('sub_communities', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('sub_communities')->get();
                }),

                'agency'        => $agency->id,
                'agency_region' => $agency->country ? $agency->country->iso2 : '',
                'business' => $business,
                'lead_sources' => $agency->lead_sources,
                'lead_communications' => $agency->lead_communications,
                'lead_priorities' => $agency->lead_priorities,
                'lead_qualifications' => $agency->lead_qualifications,
                'lead_types' => $agency->lead_types,
                'lead_properties' => $agency->lead_properties,
                'task_status' => $agency->task_status,
                'task_types' => $agency->task_types,
                'call_status' => $agency->call_status,
                'developers' => $agency->developers,
                'languages' =>
                cache()->remember('languages', 60 * 60 * 24, function () use ($agency) {
                    return DB::table('languages')->get();
                }),

            ]
        );
    }


    public function check_before_create(Request $request){
        $leads = Lead::where('agency_id', $request->agency)->where('business_id',$request->business)->where(function($q) use($request){
            $q->where('phone1',$request->phone)->orWhere('phone2',$request->phone)->orWhere('phone3',$request->phone)->orWhere('phone4',$request->phone)->orWhere('landline',$request->phone);
        })->get();
        return response()->json(['leads' =>$leads] , 200);
    }

    public function store(Request $request)
    {


        // dd($request->all());

        abort_if(Gate::denies('add_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agency = Agency::where('id', $request->agency_id)->where('business_id', auth()->user()->business_id)->firstOrFail();


        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [

                "source_id" => ["required", Rule::exists('lead_sources', 'id')->where(function ($q) use ($request) {
                    $q->where('agency_id', $request->agency_id);
                })],

                "type_id" => ['required', Rule::exists('lead_types', 'id')->where(function ($q) use ($request) {
                    $q->where('agency_id', $request->agency_id);
                })],
                "qualification_id" => ['required', Rule::exists('lead_qualifications', 'id')->where(function ($q) use ($request) {
                    $q->where('agency_id', $request->agency_id);
                })],
                "communication_id" => ['required', Rule::exists('lead_communications', 'id')->where(function ($q) use ($request) {
                    $q->where('agency_id', $request->agency_id);
                })],
                "priority_id" => ['required', Rule::exists('lead_priorities', 'id')->where(function ($q) use ($request) {
                    $q->where('agency_id', $request->agency_id);
                })],
                "company" => "sometimes|nullable|string",
                "website" => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
                // "contact_date"                  => "sometimes|nullable|date",
                // "next_action_date"              => "sometimes|nullable|date",
                "note" => "sometimes|nullable|string",
                "po_box" => "sometimes|nullable|string|min:1|max:30",
                "passport" => "sometimes|nullable|string|min:1|max:30",
                "passport_expiration_date" => "sometimes|nullable|date",
                "first_name" => "required|string",
                "sec_name" => "sometimes|nullable|string",
                "full_name" => "sometimes|nullable|string",
                "partner_name" => "sometimes|nullable|string",
                "date_of_birth" => "sometimes|nullable|date",
                "email1" => "sometimes|nullable|string|email",
                "email2" => "sometimes|nullable|string|email",
                "email3" => "sometimes|nullable|string|email",
                "nationality_id" => "required|integer|exists:countries,id",


                "phone1" => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
                "phone1_code" => "required|exists:countries,phone_code",

                "phone2" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "phone2_code" => "sometimes|nullable|exists:countries,phone_code",
                "phone3" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "phone3_code" => "sometimes|nullable|exists:countries,phone_code",
                "phone4" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "phone4_code" => "sometimes|nullable|exists:countries,phone_code",
                "landline" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "fax" => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "developer" => ["sometimes", "nullable", Rule::exists('developers', 'id')->where(function ($q) use ($request) {
                    $q->where('agency_id', $request->agency_id);
                })],
                "city_id" => "required|exists:cities,id",
                "community" => "required|exists:communities,id",
                "sub_community" => "sometimes|nullable|exists:sub_communities,id",
                "building_name" => "sometimes|nullable|string",
                "property_purpose" => "sometimes|nullable|in:rent,buy",
                "property_no" => "sometimes|nullable|string",
                "property_id" => "required|integer|exists:lead_property,id",
                "property_reference" => "sometimes|nullable|string",
                "size_sqft" => "sometimes|nullable|numeric",
                "size_sqm" => "sometimes|nullable|numeric",
                "bedrooms" => "sometimes|nullable|string",
                "bathrooms" => "sometimes|nullable|string",
                "parkings" => "sometimes|nullable|string",
                "salutation" => "required|string|in:Mr,Mrs,Ms,Miss",
                "skype" => "sometimes|nullable|email",
                "other" => "sometimes|nullable|string",
                "loc_lat"                                  => ['sometimes', 'nullable', 'string'],
                "loc_lng"                                  => ['sometimes', 'nullable', 'string'],
                // "assigned_to" => "sometimes|nullable|array",
                // 'assigned' => 'required|in:all,custom'
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-tab', 'yes');
            }

            $check_unique_emails = Lead::where('business_id', $request->business_id)->where('agency_id', $request->agency_id)->where(function ($query) use ($request) {

                $query->where([
                    ['email1', '!=', null],
                    ['email1', $request->email1],
                ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->email1],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->email1],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->email1],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $request->email2],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->email2],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->email2],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->email2],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $request->email3],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->email3],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->email3],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->email3],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $request->skype],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->skype],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->skype],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->skype],
                    ]);
            })->get();
            $check_unique_phones = Lead::where('business_id', $request->business_id)->where('agency_id', $request->agency_id)->where(function ($query) use ($request) {
                $query
                    ->where([
                        ['passport', '!=', null],
                        ['passport', $request->passport],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->passport],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->passport],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->passport],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->passport],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->passport],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->passport],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->phone1],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->phone1],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->phone1],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->phone1],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->phone1],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->phone1],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->phone1],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->phone2],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->phone2],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->phone2],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->phone2],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->phone2],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->phone2],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->phone2],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->phone3],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->phone3],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->phone3],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->phone3],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->phone3],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->phone3],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->phone3],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->phone4],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->phone4],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->phone4],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->phone4],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->phone4],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->phone4],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->phone4],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->landline],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->landline],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->landline],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->landline],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->landline],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->landline],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->landline],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->fax],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->fax],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->fax],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->fax],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->fax],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->fax],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->fax],
                    ]);
            })->get();


            if (count($check_unique_emails) > 0) {
                return back()->withInput()->with(flash(trans('sales.unique_email'), 'danger'))->with('open-tab', 'yes');
            }
            if (count($check_unique_phones) > 0) {
                return back()->withInput()->with(flash(trans('sales.unique_phone'), 'danger'))->with('open-tab', 'yes');
            }

            $fullname = $request->full_name != null ? $request->full_name : ($request->first_name . ' ' . $request->sec_name);

            // $staff_assigned = [];
            // if ($request->assigned == 'all') {
            //     $staff_assigned = staff($request->agency_id)->pluck('id')->toArray();
            // } elseif ($request->assigned == 'custom') {

            //     if ($request->assigned_to) {

            //         $staff_assigned = $request->assigned_to;
            //     }
            // }

            Lead::create([
                'table_name' => 'leads',
                "source_id" => $request->source_id,

                "type_id" => $request->type_id,
                "qualification_id" => $request->qualification_id,
                "communication_id" => $request->communication_id,
                "priority_id" => $request->priority_id,


                "company" => $request->company,
                "website" => $request->website,
                // "contact_date"                  => $request->contact_date,
                // "next_action_date"              => $request->next_action_date,
                "note" => $request->note,
                "po_box" => $request->po_box,
                "passport" => $request->passport,
                "passport_expiration_date" => $request->passport_expiration_date,
                "first_name" => $request->first_name,
                "sec_name" => $request->sec_name,
                "full_name" => $fullname,
                "partner_name" => $request->partner_name,
                "date_of_birth" => $request->date_of_birth,
                "email1" => $request->email1,
                "email2" => $request->email2,
                "email3" => $request->email3,
                "nationality_id" => $request->nationality_id,


                "phone1" => $request->phone1,
                "phone1_code" => $request->phone1_code,
                "phone2_code" => $request->phone2_code,
                "phone3_code" => $request->phone3_code,
                "phone4_code" => $request->phone4_code,
                "landline" => $request->landline,
                // "zip"                           => $request->zip,
                "fax" => $request->fax,
                "developer" => $request->developer,
                "country" => $agency->country_id,
                "city_id" => $request->city_id,
                "community" => $request->community,
                "sub_community" => $request->sub_community,

                "building_name" => $request->building_name,
                "property_purpose" => $request->property_purpose,
                "property_no" => $request->property_no,
                "property_id" => $request->property_id,
                "address" => $request->address,
                "lat_loc"  => $request->lat_loc,
                "lng_loc"   => $request->lng_loc,

                "property_reference" => $request->property_reference,
                "size_sqft" => $request->size_sqft,
                "size_sqm" => $request->size_sqm,
                "bedrooms" => $request->bedrooms,
                "bathrooms" => $request->bathrooms,
                "parkings" => $request->parkings,
                "salutation" => $request->salutation,
                "skype" => $request->skype,
                "other" => $request->other,
                // "assigned_to" => serialize($staff_assigned),
                "agency_id" => $request->agency_id,
                'business_id' => $request->business_id,

            ]);

            DB::commit();
            return back()->with(flash(trans('sales.lead_created'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();
            //            throw $e;
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-tab', 'yes');
        }
    }


    public function update($id, Request $request)
    {

        abort_if(Gate::denies('edit_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead = Lead::findorfail($id);
        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [

                "edit_source_id_" . $id => "required|integer|exists:lead_sources,id",

                "edit_type_id_" . $id => "required|integer|exists:lead_types,id",
                "edit_qualification_id_" . $id => "required|integer|exists:lead_qualifications,id",
                "edit_communication_id_" . $id => "required|integer|exists:lead_communications,id",
                "edit_priority_id_" . $id => "required|integer|exists:lead_priorities,id",


                "edit_source_id_" . $id => ["required", Rule::exists('lead_sources', 'id')->where(function ($q) use ($lead) {
                    $q->where('agency_id', $lead->agency_id);
                })],

                "edit_type_id_" . $id => ['required', Rule::exists('lead_types', 'id')->where(function ($q) use ($lead) {
                    $q->where('agency_id', $lead->agency_id);
                })],
                "edit_qualification_id_" . $id => ['required', Rule::exists('lead_qualifications', 'id')->where(function ($q) use ($lead) {
                    $q->where('agency_id', $lead->agency_id);
                })],
                "edit_communication_id_" . $id => ['required', Rule::exists('lead_communications', 'id')->where(function ($q) use ($lead) {
                    $q->where('agency_id', $lead->agency_id);
                })],
                "edit_priority_id_" . $id => ['required', Rule::exists('lead_priorities', 'id')->where(function ($q) use ($lead) {
                    $q->where('agency_id', $lead->agency_id);
                })],

                "edit_company_" . $id => "sometimes|nullable|string",
                "edit_website_" . $id => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
                "edit_note_" . $id => "sometimes|nullable|string",
                "edit_po_box_" . $id => "sometimes|nullable|string|min:1|max:30",
                "edit_passport_" . $id => "sometimes|nullable|string|min:1|max:30",
                "edit_passport_expiration_date_" . $id => "sometimes|nullable|date",
                "edit_first_name_" . $id => "required|string",
                "edit_sec_name_" . $id => "sometimes|nullable|string",
                "edit_full_name_" . $id => "sometimes|nullable|string",
                "edit_partner_name_" . $id => "sometimes|nullable|string",
                "edit_date_of_birth_" . $id => "sometimes|nullable|date",
                "edit_email1_" . $id => "sometimes|nullable|string|email",
                "edit_email2_" . $id => "sometimes|nullable|string|email",
                "edit_email3_" . $id => "sometimes|nullable|string|email",
                "edit_nationality_id_" . $id => "required|integer|exists:countries,id",

                // "edit_country_" . $id => "required|string|exists:countries,value",
                "edit_phone1_" . $id => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
                "edit_phone2_" . $id => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "edit_phone3_" . $id => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "edit_phone4_" . $id => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "edit_landline_" . $id => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "edit_fax_" . $id => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

                "edit_developer_" . $id => ["sometimes", "nullable", Rule::exists('developers', 'id')->where(function ($q) use ($lead) {
                    $q->where('agency_id', $lead->agency_id);
                })],
                "edit_city_id_" . $id => "sometimes|nullable|exists:cities,id",
                "edit_community_" . $id => "sometimes|nullable|exists:communities,id",
                "edit_sub_community_" . $id => "sometimes|nullable|exists:sub_communities,id",


                "edit_building_name_" . $id => "sometimes|nullable|string",
                "edit_property_purpose_" . $id => "sometimes|nullable|in:rent,buy",
                "edit_property_no_" . $id => "sometimes|nullable|string",
                "edit_property_id_" . $id => "required|integer|exists:lead_property,id",
                "edit_property_reference_" . $id => "sometimes|nullable|string",
                "edit_size_sqft_" . $id => "sometimes|nullable|numeric",
                "edit_size_sqm_" . $id => "sometimes|nullable|numeric",
                "edit_bedrooms_" . $id => "sometimes|nullable|string",
                "edit_bathrooms_" . $id => "sometimes|nullable|string",
                "edit_parkings_" . $id => "sometimes|nullable|string",
                "edit_salutation_" . $id => "required|string|in:Mr,Mrs,Ms,Miss",
                "edit_skype_" . $id => "sometimes|nullable|email",
                // "edit_assigned_to_" . $id                   => "sometimes|nullable|array",
                "edit_other_" . $id => "sometimes|nullable|string",
                "edit_address_" . $id => "sometimes|nullable|string",
                "edit_lat_loc_" . $id => "sometimes|nullable|string",
                "edit_lng_loc_" . $id => "sometimes|nullable|string",


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-edit-tab', $id);
            }

            $check_unique_emails = Lead::where('id', '!=', $id)->where('business_id', $lead->business_id)->where('agency_id', $lead->agency_id)->where(function ($query) use ($request, $id) {

                $query->where([
                    ['email1', '!=', null],
                    ['email1', $request->{'edit_email1_' . $id}],
                ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->{'edit_email1_' . $id}],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->{'edit_email1_' . $id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->{'edit_email1_' . $id}],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $request->{'edit_email2_' . $id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->{'edit_email2_' . $id}],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->{'edit_email2_' . $id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->{'edit_email2_' . $id}],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $request->{'edit_email3_' . $id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->{'edit_email3_' . $id}],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->{'edit_email3_' . $id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->{'edit_email3_' . $id}],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $request->{'edit_skype_' . $id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $request->{'edit_skype_' . $id}],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $request->{'edit_skype_' . $id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $request->{'edit_skype_' . $id}],
                    ]);
            })->get();
            $check_unique_phones = Lead::where('id', '!=', $id)->where('business_id', $lead->business_id)->where('agency_id', $lead->agency_id)->where(function ($query) use ($request, $id) {
                $query
                    ->where([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_passport_' . $id}],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_phone1_' . $id}],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_phone2_' . $id}],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_phone3_' . $id}],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_phone4_' . $id}],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_landline_' . $id}],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $request->{'edit_fax_' . $id}],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $request->{'edit_fax_' . $id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $request->{'edit_fax_' . $id}],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $request->{'edit_fax_' . $id}],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $request->{'edit_fax_' . $id}],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $request->{'edit_fax_' . $id}],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $request->{'edit_fax_' . $id}],
                    ]);
            })->get();

            if (count($check_unique_emails) > 0) {
                return back()->withInput()->with(flash(trans('sales.unique_email'), 'danger'))->with('open-edit-tab', $id);
            }
            if (count($check_unique_phones) > 0) {
                return back()->withInput()->with(flash(trans('sales.unique_phone'), 'danger'))->with('open-edit-tab', $id);
            }

            $fullname = $request->{'edit_full_name_' . $id} != null ? $request->{'edit_full_name_' . $id} : ($request->{'edit_first_name_' . $id} . ' ' . $request->{'edit_sec_name_' . $id});


            $lead->update([
                "source_id" => $request->{'edit_source_id_' . $id},

                "type_id" => $request->{'edit_type_id_' . $id},
                "qualification_id" => $request->{'edit_qualification_id_' . $id},
                "communication_id" => $request->{'edit_communication_id_' . $id},
                "priority_id" => $request->{'edit_priority_id_' . $id},


                "company" => $request->{'edit_company_' . $id},
                "address" => $request->{'edit_address_' . $id},
                "lat_loc" => $request->{'edit_lat_loc_' . $id},
                "lng_loc" => $request->{'edit_lng_loc_' . $id},
                "website" => $request->{'edit_website_' . $id},
                "note" => $request->{'edit_note_' . $id},
                "po_box" => $request->{'edit_po_box_' . $id},
                "passport" => $request->{'edit_passport_' . $id},
                "passport_expiration_date" => $request->{'edit_passport_expiration_date_' . $id},
                "first_name" => $request->{'edit_first_name_' . $id},
                "sec_name" => $request->{'edit_sec_name_' . $id},
                "full_name" => $fullname,
                "partner_name" => $request->{'edit_partner_name_' . $id},
                "date_of_birth" => $request->{'edit_date_of_birth_' . $id},
                "email1" => $request->{'edit_email1_' . $id},
                "email2" => $request->{'edit_email2_' . $id},
                "email3" => $request->{'edit_email3_' . $id},
                "nationality_id" => $request->{'edit_nationality_id_' . $id},

                "country" => $request->{'edit_country_' . $id},
                "city_id" => $request->{'edit_city_id_' . $id},
                "phone1" => $request->{'edit_phone1_' . $id},
                "phone2" => $request->{'edit_phone2_' . $id},
                "phone3" => $request->{'edit_phone3_' . $id},
                "phone4" => $request->{'edit_phone4_' . $id},
                "landline" => $request->{'edit_landline_' . $id},
                "fax" => $request->{'edit_fax_' . $id},
                "developer" => $request->{'edit_developer_' . $id},
                "community" => $request->{'edit_community_' . $id},
                "sub_community" => $request->{'edit_sub_community_' . $id},
                "building_name" => $request->{'edit_building_name_' . $id},
                "property_purpose" => $request->{'edit_property_purpose_' . $id},
                "property_no" => $request->{'edit_property_no_' . $id},
                "property_id" => $request->{'edit_property_id_' . $id},

                "property_reference" => $request->{'edit_property_reference_' . $id},
                "size_sqft" => $request->{'edit_size_sqft_' . $id},
                "size_sqm" => $request->{'edit_size_sqm_' . $id},
                "bedrooms" => $request->{'edit_bedrooms_' . $id},
                "bathrooms" => $request->{'edit_bathrooms_' . $id},
                "parkings" => $request->{'edit_parkings_' . $id},
                "salutation" => $request->{'edit_salutation_' . $id},
                "skype" => $request->{'edit_skype_' . $id},
                "other" => $request->{'edit_other_' . $id},
                // "assigned_to"                  => serialize($request->{'edit_assigned_to_' . $id}),
                "phone1_code" => $request->{'edit_phone1_code_' . $id},
                "phone2_code" => $request->{'edit_phone2_code_' . $id},
                "phone3_code" => $request->{'edit_phone3_code_' . $id},
                "phone4_code" => $request->{'edit_phone4_code_' . $id},


            ]);


            DB::commit();


            //check if failed before
            $failedLead = FaildLead::where('agency_id', $lead->agency_id)->where('reference', $lead->reference)->first();
            if ($failedLead) {
                if ($lead->country && $lead->community && $lead->sub_community) {
                    $failedLead->delete();
                }
            }
            return back()->with(flash(trans('sales.lead_updated'), 'success'))->with('open-edit-tab', $id);
        } catch (\Exception $e) {
            DB::rollback();
            //            throw $e;

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-edit-tab', $id);
        }
    }


    public function destroy()
    {
        abort_if(Gate::denies('delete_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Lead::findorfail(request('lead_id'))->delete();

        return back()->withInput()->with(flash(trans('sales.lead_deleted'), 'success'));
    }


    public function export($agency)
    {
        abort_if(Gate::denies('can_generate_reports'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Excel::download(new UsersExport($agency), 'users-list.xlsx');
    }


    public function add_lead_source(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'agency' => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $source = LeadSource::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.source_created'), 'data' => $source], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function add_lead_type(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'agency' => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $type = LeadType::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.type_created'), 'data' => $type], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function add_lead_qualification(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'agency' => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $qualification = LeadQualifications::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.qualification_created'), 'data' => $qualification], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function add_lead_priority(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'agency' => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $priority = LeadPriority::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.priority_created'), 'data' => $priority], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function add_lead_communication(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'agency' => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }


                $communication = LeadCommunication::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.communication_created'), 'data' => $communication], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function add_lead_property(Request $request)
    {


        if ($request->ajax()) {


            abort_if(Gate::denies('manage_lead_setting'), Response::HTTP_FORBIDDEN, '403 Forbidden');


            DB::beginTransaction();

            try {
                $validator = Validator::make($request->all(), [

                    'name_en' => 'required|string',
                    'name_ar' => 'sometimes|nullable|string',
                    'agency' => 'required|integer|exists:agencies,id',
                    'business' => 'required|integer|exists:businesses,id'
                ]);


                if ($validator->fails()) {
                    return response()->json(['message' => $validator->errors()->all()[0]], 400);
                }

                $property = LeadProperty::create([

                    'name_en' => $request->name_en,
                    'slug' => Str::slug($request->name_en, '-'),
                    'name_ar' => $request->name_ar,
                    "business_id" => $request->business,
                    "agency_id" => $request->agency,

                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.property_created'), 'data' => $property], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function update_source_index(Request $request)
    {

        $lead = Lead::where('id', $request->id)->where('business_id', auth()->user()->business_id)->first();
        $source = LeadSource::where('id', $request->source_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$source, Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(Gate::denies('edit_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {


            DB::beginTransaction();

            try {

                $lead->update([
                    'source_id' => $request->source_id,
                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.source_updated'), 'lead' => $lead], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => $e->getMessage() . ' ' . trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function update_type_index(Request $request)
    {

        $lead = Lead::where('id', $request->id)->where('business_id', auth()->user()->business_id)->first();
        $type = LeadType::where('id', $request->type_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$type, Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(Gate::denies('edit_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {


            DB::beginTransaction();

            try {

                $lead->update([
                    'type_id' => $request->type_id,
                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.type_updated'), 'lead' => $lead], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => $e->getMessage() . ' ' . trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function update_qualification_index(Request $request)
    {

        $lead = Lead::where('id', $request->id)->where('business_id', auth()->user()->business_id)->first();
        $qualification = LeadQualifications::where('id', $request->qualification_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$qualification, Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(Gate::denies('edit_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {


            DB::beginTransaction();

            try {

                $lead->update([
                    'qualification_id' => $request->qualification_id,
                ]);

                DB::commit();

                return response()->json(['message' => trans('sales.qualification_updated'), 'lead' => $lead], 200);
            } catch (\Exception $e) {
                DB::rollback();

                return response()->json(['message' => trans('agency.something_went_wrong')], 400);
            }
        }
    }


    public function make_call(Request $request, $id)
    {
        abort_if(Gate::denies('edit_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead = Lead::where('id', $id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualification = LeadQualifications::where('id', $request->{'call_qualification_id_' . $id})->where('business_id', auth()->user()->business_id)->first();
        $call_status = CallStatus::where('id', $request->{'call_status_id_' . $id})->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$qualification, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(!$call_status, Response::HTTP_FORBIDDEN, '403 Forbidden');


        DB::beginTransaction();

        try {

            $validator = Validator::make($request->all(), [

                "call_contact_date_" . $id => "required|date|date_format:Y-m-d",
                "call_next_action_date_" . $id => "sometimes|nullable|date|date_format:Y-m-d",
                "call_contact_time_" . $id => "required|string",
                "call_next_action_time_" . $id => "sometimes|nullable|string",
                "call_note_" . $id => "sometimes|nullable|string",


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-call-tab', $id);
            }


            $call = Call::create([
                'module' => 'lead',
                'module_id' => $lead->id,
                'agency_id' => $lead->agency_id,
                'business_id' => $lead->business_id,
                'made_by' => auth()->user()->id,
                'status_id' => $call_status->id,

                'contact_date' => $request->{'call_contact_date_' . $id},
                'contact_time' => $request->{'call_contact_time_' . $id},

                'next_action_date' => $request->{'call_next_action_date_' . $id},
                'next_action_time' => $request->{'call_next_action_time_' . $id},
                'note' => $request->{'call_note_' . $id},
            ]);

            if ($call) {
                $lead->update(['qualification_id' => $request->{'call_qualification_id_' . $id}]);
            }
            DB::commit();
            return back()->with(flash(trans('sales.call_created'), 'success'))->with('open-call-tab', $id);
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-call-tab', $id);
        }
    }


    public function delete_call(Request $request)
    {
        DB::beginTransaction();

        try {
            Call::findorfail($request->call_id)->delete();

            DB::commit();
            return back()->with(flash(trans('sales.call_deleted'), 'success'))->with('open-call-tab', $request->call_lead_id);
        } catch (\Exception $e) {

            dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-call-tab', $request->call_lead_id);
        }
    }


    // public function assign_staff(Request $request)
    // {


    //     // dd($request->all());

    //     abort_if(Gate::denies('assign_lead_to_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $lead = Lead::where('id', $request->assign_lead_id)->where('business_id', auth()->user()->business_id)->first();

    //     abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     DB::beginTransaction();


    //     try {


    //         if ($request->assigned == 'all') {

    //             $lead->update(['assigned_to' => serialize(staff($request->assign_agency_id)->pluck('id')->toArray())]);
    //         } elseif ($request->assigned == 'custom') {
    //             $staff = [];
    //             if ($request->{'assigned_staff_' . $request->assign_lead_id}) {

    //                 $staff = $request->{'assigned_staff_' . $request->assign_lead_id};
    //             }

    //             $lead->update(['assigned_to' => serialize($staff)]);
    //         }

    //         DB::commit();
    //         return back()->with(flash(trans('sales.staff_assigned'), 'success'))->with('open-assign-tab', $request->assign_lead_id);
    //     } catch (\Exception $e) {


    //         DB::rollback();
    //         return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-assign-tab', $request->assign_lead_id);
    //     }
    // }


    /**********************************Start Assign Task********************************* */


    public function assign_task(Request $request, $id)
    {

        abort_if(Gate::denies('assign_task_on_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $lead = Lead::where('id', $request->task_lead_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');


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
                "task_assigned_{$id}" => "required|in:custom,all",

                "task_deadline_{$id}" => "required|date|date_format:Y-m-d",

                "task_time_{$id}" => "required|string",
                "task_custom_reminder_{$id}" => "sometimes|nullable|in:on,off",
                "task_staff_{$id}" => "required_if:task_assigned_{$id},custom",

                "task_period_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:before,after",
                "task_type_reminder_{$id}" => "required_if:task_custom_reminder_{$id},on|in:hours,days",
                "task_type_reminder_number_{$id}" => "required_if:task_custom_reminder_{$id},on|integer",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-task-tab', $id);
            }
            // dd($request->all());
            DB::beginTransaction();

            $task = Task::create([
                "agency_id" => $request->{'task_agency_id_' . $id},
                "business_id" => $request->{'task_business_id_' . $id},

                "task_type_id" => $request->{'task_type_' . $id},
                "task_status_id" => $request->{'task_status_' . $id},
                "module" => 'lead',
                "module_id" => $lead->id,
                "deadline" => $request->{'task_deadline_' . $id},


                "time" => $request->{'task_time_' . $id},
                "custom_reminder" => $request->{'task_custom_reminder_' . $id},

                "period_reminder" => $request->{'task_period_reminder_' . $id},

                "type_reminder" => $request->{'task_type_reminder_' . $id},
                "type_reminder_number" => $request->{'task_type_reminder_number_' . $id},


                "add_by" => auth()->user()->id,
            ]);
            $users_to_notify = [];

            if ($request->{'task_assigned_' . $id} == 'all') {


                $all_staff = staff($request->{'task_agency_id_' . $id})->pluck('id')->toArray();
                $task->staff()->sync($all_staff);
                $users_to_notify = $all_staff;
            } elseif ($request->{'task_assigned_' . $id} == 'custom') {
                $staff = [];
                if ($request->{'task_staff_' . $id}) {

                    $staff = $request->{'task_staff_' . $id};
                }

                $task->staff()->sync($staff);

                $users_to_notify = $staff;
            }

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


            $template = Template::where('agency_id', $lead->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'lead_task')->first();


            if ($template) {

                $template_with_name = str_replace('{TASK_NAME}', $lead->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/leads/' . $lead->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $users_to_notify)->get();
                foreach ($users as $send_to) {

                    //                     Mail::to($send_to->email)->send(new EmailGeneral($template_with_site_name, "Lead Task Has Been Assigned To You"));

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Lead Task Has Been Assigned To You");

                    event(new LeadTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new LeadTaskNotification($task));
            } else {
                $system_template = SystemTemplate::where('slug', 'lead_task')->first();
                $template = Template::create([
                    'title' => $system_template->title,
                    'type' => $system_template->type,
                    'description_en' => $system_template->description_en,
                    'description_ar' => $system_template->description_ar,
                    'slug' => $system_template->slug,
                    'system' => 'yes',
                    'agency_id' => $lead->agency_id,
                    'business_id' => $lead->business_id,
                ]);

                $template_with_name = str_replace('{TASK_NAME}', $lead->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{TASK_URL}', url('sales/leads/' . $lead->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $users_to_notify)->get();
                foreach ($users as $send_to) {

                    // Mail::to($send_to->email)->send(new EmailGeneral($template_with_site_name, "Lead Task Has Been Assigned To You"));

                    SendEmail::dispatch($send_to->email, $template_with_site_name, "Lead Task Has Been Assigned To You");

                    event(new LeadTaskEvent($task, $send_to->id));
                }
                Notification::send($users, new LeadTaskNotification($task));
            }

            return back()->with(flash(trans('sales.task_assigned'), 'success'))->with('open-task-tab', $id);
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $id);
        }
    }


    public function delete_task(Request $request)
    {

        abort_if(Gate::denies('assign_task_on_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            Task::findorfail($request->task_id)->delete();

            DB::commit();
            return back()->with(flash(trans('sales.task_deleted'), 'success'))->with('open-task-tab', $request->task_lead_id);
        } catch (\Exception $e) {


            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $request->task_lead_id);
        }
    }

    /**********************************End Assign Task********************************* */


    public function convert_to_opportunity(Request $request)
    {


        abort_if(Gate::denies('assign_task_on_lead'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $lead = Lead::where('id', $request->lead_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$lead, Response::HTTP_FORBIDDEN, '403 Forbidden');


        $qualification = LeadQualifications::where('id', $request->{'opportunity_qualification_id_' . $request->lead_id})->where('business_id', auth()->user()->business_id)->first();


        abort_if(!$qualification, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {


            $validator = Validator::make($request->all(), [
                "opportunity_note_{$request->lead_id}" => "sometimes|nullable|string",
                "opportunity_probability_of_winning_{$request->lead_id}" => "required|integer",
                "opportunity_assigned_staff_{$request->lead_id}" => "required|present|array",
            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-opportunity-tab', $request->lead_id);
            }


            $check_unique_emails = Opportunity::where('business_id', $lead->business_id)->where('agency_id', $lead->agency_id)->where(function ($query) use ($lead) {

                $query->where([
                    ['email1', '!=', null],
                    ['email1', $lead->email1],
                ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $lead->email1],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $lead->email1],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $lead->email1],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $lead->email2],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $lead->email2],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $lead->email2],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $lead->email2],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $lead->email3],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $lead->email3],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $lead->email3],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $lead->email3],
                    ])
                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', $lead->skype],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', $lead->skype],
                    ])->orWhere([
                        ['email3', '!=', null],
                        ['email3', $lead->skype],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', $lead->skype],
                    ]);
            })->get();
            $check_unique_phones = Opportunity::where('business_id', $lead->business_id)->where('agency_id', $lead->agency_id)->where(function ($query) use ($lead) {
                $query
                    ->where([
                        ['passport', '!=', null],
                        ['passport', $lead->passport],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->passport],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->passport],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->passport],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->passport],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->passport],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->passport],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $lead->phone1],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->phone1],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->phone1],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->phone1],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->phone1],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->phone1],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->phone1],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $lead->phone2],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->phone2],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->phone2],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->phone2],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->phone2],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->phone2],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->phone2],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $lead->phone3],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->phone3],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->phone3],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->phone3],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->phone3],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->phone3],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->phone3],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $lead->phone4],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->phone4],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->phone4],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->phone4],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->phone4],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->phone4],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->phone4],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $lead->landline],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->landline],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->landline],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->landline],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->landline],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->landline],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->landline],
                    ])
                    ->orWhere([
                        ['passport', '!=', null],
                        ['passport', $lead->fax],
                    ])
                    ->orWhere([
                        ['phone1', '!=', null],
                        ['phone1', $lead->fax],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', $lead->fax],
                    ])
                    ->orWhere([
                        ['phone3', '!=', null],
                        ['phone3', $lead->fax],
                    ])
                    ->orWhere([
                        ['phone4', '!=', null],
                        ['phone4', $lead->fax],
                    ])
                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', $lead->fax],
                    ])
                    ->orWhere([
                        ['fax', '!=', null],
                        ['fax', $lead->fax],
                    ]);
            })->get();


            if (count($check_unique_emails) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_email') . ' ' . $check_unique_emails->first()->full_name ?? '', 'danger'))->with('open-opportunity-tab', $request->lead_id);
            }


            if (count($check_unique_phones) > 0) {
                return back()->withInput()->with(flash(trans('sales.existing_phone') . ' ' . $check_unique_phones->first()->full_name ?? '', 'danger'))->with('open-opportunity-tab', $request->lead_id);
            }


            // dd($request->all());
            DB::beginTransaction();

            $staff = [];
            if ($request->{'opportunity_assigned_staff_' . $request->lead_id}) {

                $staff = $request->{'opportunity_assigned_staff_' . $request->lead_id};
            }
            $opportunity = Opportunity::create([
                'table_name' => 'opportunities',

                'probability_of_winning' => $request->{"opportunity_probability_of_winning_" . $request->lead_id},
                'qualification_id' => $qualification->id,


                'converted_by' => auth()->user()->id,

                "source_id" => $lead->source_id,

                "type_id" => $lead->type_id,
                "communication_id" => $lead->communication_id,
                "priority_id" => $lead->priority_id,

                "company" => $lead->company,
                "website" => $lead->website,

                "po_box" => $lead->po_box,
                "passport" => $lead->passport,
                "passport_expiration_date" => $lead->passport_expiration_date,
                "first_name" => $lead->first_name,
                "sec_name" => $lead->sec_name,
                "full_name" => $lead->full_name,
                "partner_name" => $lead->partner_name,
                "date_of_birth" => $lead->date_of_birth,
                "email1" => $lead->email1,
                "email2" => $lead->email2,
                "email3" => $lead->email3,
                "nationality_id" => $lead->nationality_id,

                "country" => $lead->country,
                "city_id" => $lead->city_id,
                "phone1" => $lead->phone1,
                "phone2" => $lead->phone2,
                "phone3" => $lead->phone3,
                "phone4" => $lead->phone4,
                "phone1_code" => $lead->phone1_code,
                "phone2_code" => $lead->phone2_code,
                "phone3_code" => $lead->phone3_code,
                "phone4_code" => $lead->phone4_code,
                "landline" => $lead->landline,
                // "zip"                           => $lead->zip,
                "fax" => $lead->fax,
                "developer" => $lead->developer,
                "community" => $lead->community,
                "sub_community" => $lead->sub_community,
                "building_name" => $lead->building_name,
                "property_purpose" => $lead->property_purpose,
                "property_no" => $lead->property_no,
                "property_id" => $lead->property_id,
                "address" => $lead->address,
                "loc_lat" => $lead->lat_loc,
                "loc_lng" => $lead->lng_loc,

                "property_reference" => $lead->property_reference,
                "size_sqft" => $lead->size_sqft,
                "size_sqm" => $lead->size_sqm,
                "bedrooms" => $lead->bedrooms,
                "bathrooms" => $lead->bathrooms,
                "parkings" => $lead->parkings,
                "salutation" => $lead->salutation,
                "skype" => $lead->skype,
                "other" => $lead->other,
                "agency_id" => $lead->agency_id,
                'business_id' => $lead->business_id,
            ]);

            if ($opportunity) {
                $lead->tasks()->update(['module' => 'opportunity', 'module_id' => $opportunity->id]);
                $lead->calls()->update(['module' => 'opportunity', 'module_id' => $opportunity->id]);
                $opportunity->assigns()->create([
                    'agency_id' => $lead->agency_id,
                    'business_id' => $lead->business_id,
                    'opportunity_id' => $opportunity->id,
                    'start_assign' => date('Y-m-d'),
                    'assigned_by' => auth()->user()->id,
                    'assigned_to' => serialize($staff),

                ]);
                $lead->delete();


                $result = OpportunityResult::create([
                    'status' => 'in_progress',
                    'stage' => 'pending',
                    'note' => $request->{"opportunity_note_" . $request->lead_id},
                    'added_by' => auth()->user()->id,
                    'opportunity_id' => $opportunity->id,
                ]);
            }


            DB::commit();


            $template = Template::where('agency_id', $lead->agency_id)->where('type', 'email')->where('system', 'yes')
                ->where('slug', 'opportunity_assign')->first();


            if ($template) {

                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff)->get();
                foreach ($users as $send_to) {

                    // Mail::to($send_to->email)->send(new EmailGeneral($template_with_site_name, trans('sales.opportunity_assied_to_you')));
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
                    'agency_id' => $lead->agency_id,
                    'business_id' => $lead->business_id,
                ]);


                $template_with_name = str_replace('{OPPORTUNITY_NAME}', $opportunity->full_name, $template->description_en);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_assigned_by = str_replace('{ASSIGNED_BY}', auth()->user()->name_en, $template_with_name);
                $template_with_url = str_replace('{OPPORTUNITY_URL}', url('sales/opportunities/' . $opportunity->agency_id), $template_with_assigned_by);
                $template_with_site_name = str_replace('{SITE_NAME}', env('APP_NAME'), $template_with_url);

                $users = \App\Models\User::whereIn('id', $staff)->get();
                foreach ($users as $send_to) {

                    // Mail::to($send_to->email)->send(new EmailGeneral($template_with_site_name, trans('sales.opportunity_assied_to_you')));
                    SendEmail::dispatch($send_to->email, $template_with_site_name, trans('sales.opportunity_assied_to_you'));

                    event(new OpportunityEvent($opportunity, $send_to->id));
                }
                Notification::send($users, new OpportunityNotification($opportunity));
            }


            return redirect('sales/opportunities/' . $lead->agency_id . '?id=' . $opportunity->id)->with(flash(trans('sales.lead_converted'), 'success'));
            // return back()->with(flash(trans('sales.lead_converted'), 'success'));
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-opportunity-tab', $request->lead_id);
        }
    }


    //////////////////////////////////////Bulk Uploads//////////////////////////////////////
    public function bulk_uploads($agency)
    {

        abort_if(Gate::denies('view_bulk_upload'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $business = auth()->user()->business_id;
        $agency = Agency::with([
            'lead_sources', 'lead_types', 'lead_properties', 'lead_communications',
            'task_status', 'task_types', 'lead_qualifications'
        ])->where('id', $agency)->where('business_id', $business)->first();
        $staffs = staff($agency->id);
        return view('sales::leads.upload_sheet', compact('agency', 'staffs'));
    }

    public function bulk_uploads_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:xlsx,csv,xls',
            "source_id" => "required|integer|exists:lead_sources,id",
            "type_id" => "required|integer|exists:lead_types,id",
            "qualification_id" => "required|integer|exists:lead_qualifications,id",
            "communication_id" => "required|integer|exists:lead_communications,id",
            "priority_id" => "required|integer|exists:lead_priorities,id",
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'));
        }

        $business = auth()->user()->business_id;
        $agency = request('agency');
        $filename = 'failed leads' . time() . '.xlsx';
        $leads_filename = time() . $request->file->getClientOriginalName();

        $request->file->move(public_path('leads_sheets'), $leads_filename);

        StartLeadsInsertJobs::withChain([
            new ImportLeadsSheet(auth()->user()->email, $request->source_id, $request->qualification_id, $request->type_id, $request->communication_id, $request->priority_id, $business, $agency, $leads_filename),
            new ExportFailedLeadsFile(auth()->user()->email, $agency, $filename),
            new SendFailedLeadsMailClient(auth()->user()->email, $filename)
        ])->dispatch();


        return back()->with(flash(trans('sales.leads_imported'), 'success'));
    }
}