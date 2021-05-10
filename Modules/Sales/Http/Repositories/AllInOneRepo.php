<?php

namespace Modules\Sales\Http\Repositories;

use App\Models\Agency;
use Modules\Sales\Entities\Lead;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Entities\Client;
use Modules\Sales\Entities\Opportunity;
use Symfony\Component\HttpFoundation\Response;


class AllInOneRepo
{
    public function index($agency)
    {

        $pagination = true;
        $business = auth()->user()->business_id;
        $per_page = 15;

        $agency = Agency::with([
            'lead_sources', 'lead_qualifications', 'lead_types', 'lead_properties', 'lead_priorities', 'lead_communications',
            'task_status', 'task_types'
        ])->where('id', $agency)->where('business_id', $business)->firstOrFail();


        $leads = Lead::all();
        $opportunities = Opportunity::all();
        $clients = Client::all();

        $countries = DB::table('countries')->get();
        $lead_sources = $agency->lead_sources;
        $lead_priorities = $agency->lead_priorities;
        $lead_types = $agency->lead_types;
        $lead_properties = $agency->lead_properties;
        $lead_properties = $agency->lead_properties;
        $lead_qualifications = $agency->lead_qualifications;
        $lead_communications = $agency->lead_communications;
        $task_status = $agency->task_status;
        $task_types = $agency->task_types;
        $call_status = $agency->call_status;
        // $cities                     = City::all();
        $cities = DB::table('cities')->get();
        $languages = DB::table('languages')->get();
        $currencies = DB::table('currencies')->get();


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







        $staffs = staff($agency->id);

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


        $agency = $agency->id;
        return view(
            'sales::all_in_one.index',
            compact(
                'staffs',
                'opportunities',
                'pagination',
                'cities',
                'languages',
                'currencies',
                'countries',
                'agency',
                'business',
                'lead_sources',
                'lead_communications',
                'lead_priorities',
                'lead_qualifications',
                'lead_types',
                'lead_properties',
                'task_status',
                'task_types',
                'call_status',
            )
        );
    }
}