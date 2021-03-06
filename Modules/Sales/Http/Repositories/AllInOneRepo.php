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
        // dd(request());

        $pagination = true;
        $business = auth()->user()->business_id;
        $search = request('search') ? true : false;

        $agency = Agency::with([
            'lead_sources', 'lead_qualifications', 'lead_types', 'lead_properties', 'lead_priorities', 'lead_communications',
            'task_status', 'task_types', 'developers'
        ])->where('id', $agency)->where('business_id', $business)->firstOrFail();

        $opportunities = null;
        $leads = null;
        $clients = null;
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
        $staffs = staff($agency->id);

        if ($search) {
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



            $clients = Client::with([
                'tasks', 'calls', 'convertedBy',
                'tasks.addBy',
                'tasks.staff',
                'calls.madeBy',
                'questions',
                'questions.addedBy',
            ])->where('status', 'accepted')->where('agency_id', $agency->id)->where('business_id', $business);


            $leads = Lead::with([
                'calls',
                'tasks',
                'tasks.addBy',
                'tasks.staff',
                'calls.madeBy',
            ])->where('agency_id', $agency->id)->where('business_id', $business);


            if (request('filter_phone')) {

                $opportunities->where(function ($query) {
                    $query->where('phone1', request('filter_phone'))
                        ->orWhere('phone2', request('filter_phone'))
                        ->orWhere('phone3', request('filter_phone'))
                        ->orWhere('phone4', request('filter_phone'))
                        ->orWhere('landline', request('filter_phone'))
                        ->orWhere('fax', request('filter_phone'));
                });
                $leads->where(function ($query) {
                    $query->where('phone1', request('filter_phone'))
                        ->orWhere('phone2', request('filter_phone'))
                        ->orWhere('phone3', request('filter_phone'))
                        ->orWhere('phone4', request('filter_phone'))
                        ->orWhere('landline', request('filter_phone'))
                        ->orWhere('fax', request('filter_phone'));
                });

                $clients->where(function ($query) {
                    $query->where('phone1', 'like', '%' . request('filter_phone') . '%')
                        ->orWhere('phone2', 'like', '%' . request('filter_phone') . '%')
                        ->orWhere('landline', 'like', '%' . request('filter_phone') . '%')
                        ->orWhere('fax', 'like', '%' . request('filter_phone') . '%');
                });
            }
            if (request('id')) {

                $opportunities->where('id', request('id'));
            }
            if (request('filter_name')) {
                $opportunities->where(function ($query) {
                    $query->where('first_name', 'like', '%' . request('filter_name') . '%')
                        ->orWhere('sec_name', 'like', '%' . request('filter_name') . '%')
                        ->orWhere('full_name', 'like', '%' . request('filter_name') . '%');
                });
                $leads->where(function ($query) {
                    $query->where('first_name', 'like', '%' . request('filter_name') . '%')
                        ->orWhere('sec_name', 'like', '%' . request('filter_name') . '%')
                        ->orWhere('full_name', 'like', '%' . request('filter_name') . '%');
                });

                $clients->where(function ($query) {
                    $query->where('name', 'like', '%' . request('filter_name') . '%');
                });
            }
            if (request('filter_email')) {
                $opportunities->where(function ($query) {
                    $query->where('email1', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('email2', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('email3', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('skype', 'like', '%' . request('filter_email') . '%');
                });
                $leads->where(function ($query) {
                    $query->where('email1', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('email2', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('email3', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('skype', 'like', '%' . request('filter_email') . '%');
                });

                $clients->where(function ($query) {
                    $query->where('email1', 'like', '%' . request('filter_email') . '%')
                        ->orWhere('email2', 'like', '%' . request('filter_email') . '%');
                });
            }
            if (request('filter_source')) {
                $opportunities->where(function ($query) {
                    $query->where('source_id', request('filter_source'));
                });
                $leads->where(function ($query) {
                    $query->where('source_id', request('filter_source'));
                });
                $clients->where(function ($query) {
                    $query->where('source_id', request('filter_source'));
                });
            }


            if (request('filter_type')) {
                $opportunities->where(function ($query) {
                    $query->where('type_id', request('filter_type'));
                });
                $leads->where(function ($query) {
                    $query->where('type_id', request('filter_type'));
                });

                $clients->where(function ($query) {
                    $query->where('type_id', request('filter_type'));
                });
            }
            if (request('filter_qualifications')) {
                $opportunities->where(function ($query) {
                    $query->where('qualification_id', request('filter_qualifications'));
                });
                $leads->where(function ($query) {
                    $query->where('qualification_id', request('filter_qualifications'));
                });

                $clients->where(function ($query) {
                    $query->where('qualification_id', request('filter_qualifications'));
                });
            }
            if (request('filter_way_of_communications')) {
                $opportunities->where(function ($query) {
                    $query->where('communication_id', request('filter_way_of_communications'));
                });
                $leads->where(function ($query) {
                    $query->where('communication_id', request('filter_way_of_communications'));
                });
                $clients->where(function ($query) {
                    $query->where('communication_id', request('filter_way_of_communications'));
                });
            }
            if (request('filter_priority')) {
                $opportunities->where(function ($query) {
                    $query->where('priority_id', request('filter_priority'));
                });
                $leads->where(function ($query) {
                    $query->where('priority_id', request('filter_priority'));
                });

                $clients->where(function ($query) {
                    $query->where('priority_id', request('filter_priority'));
                });
            }
            if (request('filter_property_purpose')) {
                $opportunities->where(function ($query) {
                    $query->where('property_purpose', request('filter_property_purpose'));
                });
                $leads->where(function ($query) {
                    $query->where('property_purpose', request('filter_property_purpose'));
                });

                $clients->where(function ($query) {
                    $query->where('property_purpose', request('filter_property_purpose'));
                });
            }
            if (request('filter_user')) {

                $opportunities = $opportunities->get()->filter(function ($q) {

                    $assigned = $q->current_assign->first() && unserialize($q->current_assign->first()->assigned_to) != null ? unserialize($q->current_assign->first()->assigned_to) : [];

                    return in_array(request('filter_user'), $assigned);
                });

                $clients->where(function ($query) {
                    $query->where('assigned_to', request('filter_user'));
                });
                $leads->where(function ($query) {
                    $query->where('assigned_to', request('filter_user'));
                });
            } else {
                $opportunities = $opportunities->get();
                $leads = $leads->get();
                $clients = $clients->get();
            }
        } else {
        }

        $developers = $agency->developers;

        $agency = $agency->id;

        $cities               =
            cache()->remember('cities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('cities')->get();
            });
        $communities          =
            cache()->remember('communities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('communities')->get();
            });
        $sub_communities     =
            cache()->remember('sub_communities', 60 * 60 * 24, function () use ($agency) {
                return DB::table('sub_communities')->get();
            });
        return view(
            'sales::all_in_one.index',
            compact(
                'search',
                'developers',
                'communities',
                'sub_communities',
                'cities',
                'staffs',
                'opportunities',
                'leads',
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