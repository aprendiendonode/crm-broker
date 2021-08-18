<?php

namespace Modules\Sales\Http\Controllers;

use Modules\Sales\Entities\ContractDocument;
use Modules\Sales\Entities\ContractRecurring;
use Modules\Sales\Entities\ClientContract;
use Modules\Sales\Entities\Client;
use Gate;

use Illuminate\Http\Request;

use Modules\Sales\Entities\Call;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Activity\Entities\Task;

use Modules\Sales\Entities\Opportunity;

use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpFoundation\Response;

use Modules\Sales\Http\Repositories\OpportunityRepo;


class OpportunitiesController extends Controller
{


    public function index($agency, OpportunityRepo $repo)
    {
        abort_if(Gate::denies('view_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->index($agency);
    }



    public function update($id, Request $request, OpportunityRepo $repo)
    {
        abort_if(Gate::denies('edit_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->update($id, $request);
    }

    public function destroy()
    {
        abort_if(Gate::denies('delete_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Opportunity::findorfail(request('opportunity_id'))->delete();

        return back()->withInput()->with(flash(trans('sales.opportunity_deleted'), 'success'));
    }

    public function update_qualification_index(Request $request, OpportunityRepo $repo)
    {
        return $repo->update_qualification_index($request);
    }

    public function make_call(Request $request, $id, OpportunityRepo $repo)
    {

        abort_if(Gate::denies('edit_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->make_call($request, $id);
    }




    public function delete_call(Request $request)
    {
        DB::beginTransaction();

        try {
            Call::findorfail($request->call_id)->delete();

            DB::commit();
            return back()->with(flash(trans('sales.call_deleted'), 'success'))->with('open-call-tab', $request->call_opportunity_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-call-tab', $request->call_opportunity_id);
        }
    }


    public function assign_staff(Request $request, OpportunityRepo $repo)
    {
        abort_if(Gate::denies('assign_opportunity_to_staff'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->assign_staff($request);
    }

    public function assign_task(Request $request, $id, OpportunityRepo $repo)
    {

        abort_if(Gate::denies('assign_task_on_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->assign_task($request, $id);
    }
    public function edit_assign_task(Request $request, $id, OpportunityRepo $repo)
    {

        abort_if(Gate::denies('assign_task_on_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->edit_assign_task($request, $id);
    }

    public function delete_task(Request $request)
    {


        abort_if(Gate::denies('assign_task_on_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DB::beginTransaction();

        try {
            Task::findorfail($request->task_id)->delete();

            DB::commit();
            return back()->with(flash(trans('sales.task_deleted'), 'success'))->with('open-task-tab', $request->task_opportunity_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-task-tab', $request->task_opportunity_id);
        }
    }
    /**********************************End Assign Task********************************* */



    public function convert_to_client(Request $request, OpportunityRepo $repo)
    {

        abort_if(Gate::denies('convert_opportunity_to_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->convert_to_client($request);
    }


    public function result(Request $request, $id, OpportunityRepo $repo)
    {


        abort_if(Gate::denies('edit_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->result($request, $id);
    }





    public function question(Request $request, $id, OpportunityRepo $repo)
    {
        abort_if(Gate::denies('add_question_on_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->question($request, $id);
    }



    public function answer(Request $request, OpportunityRepo $repo)
    {
        abort_if(Gate::denies('edit_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return $repo->answer($request);
    }



    public function client_hold(Request $request)
    {

        abort_if(Gate::denies('edit_opportunity'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opportunity = Opportunity::where('id', $request->hold_opportunity_id)->where('business_id', auth()->user()->business_id)->first();
        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {

            $validator = Validator::make($request->all(), [

                "hold_reason_" . $request->hold_opportunity_id      => "required|string",

            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-approve-tab', $request->hold_opportunity_id);
            }

            $opportunity->update([
                'converting_approval'      => 'hold',

                'hold_reason'              => $request->{'hold_reason_' . $request->hold_opportunity_id},
                'hold_by'                  => auth()->user()->id,
                'hold_date'                => date('Y-m-d'),

                'reject_reason'            => null,
                'rejected_by'              => null,
                'reject_date'              => null,

                'submit_for_approve_by'    => null,
                'submit_for_approve_date'  => null,

            ]);

            DB::commit();
            return back()->with(flash(trans('sales.client_on_hold'), 'success'))->with('open-hold-tab', $request->hold_opportunity_id);
        } catch (\Exception $e) {

            DB::rollback();
            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-hold-tab', $request->hold_opportunity_id);
        }
    }

    public function suggest_new_convert(Request $request, OpportunityRepo $repo)
    {

        abort_if(Gate::denies('convert_opportunity_to_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $repo->suggest_new_convert($request);
    }




    public function remove_document(Request $request, OpportunityRepo $repo)
    {

        if ($request->ajax()) {

            return $repo->remove_document($request);
        }
    }


    public function client_reject(Request $request, OpportunityRepo $repo)
    {
        return $repo->client_reject($request);
    }

    public function approve_client(Request $request, OpportunityRepo $repo)
    {
        return $repo->approve_client($request);
    }
    public function load_listings(Request $request, OpportunityRepo $repo)
    {
        return $repo->load_listing($request);
    }

    public function approve_client_old(Request $request, OpportunityRepo $repo)
    {


        // dd($request->all());

        abort_if(Gate::denies('convert_opportunity_to_client'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $opportunity = Opportunity::where('id', $request->opportunity_id)->where('business_id', auth()->user()->business_id)->first();

        abort_if(!$opportunity, Response::HTTP_FORBIDDEN, '403 Forbidden');


        try {


            $validator  = Validator::make($request->all(), [

                "client_website_" .  $request->opportunity_id                      => "sometimes|nullable|string|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",

                "client_name_" .  $request->opportunity_id                         => "required|string",
                "client_date_of_birth_" .  $request->opportunity_id                => "required|string|date_format:Y-m-d",

                "client_landline_" .  $request->opportunity_id                     => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

                "client_email1_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",
                "client_email2_" .  $request->opportunity_id                       => "sometimes|nullable|string|email",

                "client_fax_" .  $request->opportunity_id                          => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

                "client_phone1_" .  $request->opportunity_id                       => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
                "client_phone2_" .  $request->opportunity_id                       => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",

                "client_country_" .  $request->opportunity_id                      => "required|string|exists:countries,value",

                "client_skype_" .  $request->opportunity_id                         => "sometimes|nullable|string|email",
                "client_twitter_" .  $request->opportunity_id                       => "sometimes|nullable|string",
                "client_facebook_" .  $request->opportunity_id                      => "sometimes|nullable|string",
                "client_linkedin_" .  $request->opportunity_id                      => "sometimes|nullable|string",

                "client_longitude_" .  $request->opportunity_id                     => "sometimes|nullable|string",
                "client_latitude_" .  $request->opportunity_id                      => "sometimes|nullable|string",
                "client_company_" .  $request->opportunity_id                       => "sometimes|nullable|string",
                "client_city_" .  $request->opportunity_id                          => "sometimes|nullable|string",


                "client_language_" .  $request->opportunity_id                      => "required|string|exists:languages,code",
                "client_currency_" .  $request->opportunity_id                      => "required|string|exists:currencies,code",

                "client_contract_type_" .  $request->opportunity_id                 => "required|in:rent,sale",
                "client_landlord_" .  $request->opportunity_id                      => "required|string",
                "client_landlord_national_id_" .  $request->opportunity_id          => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
                "client_landlord_address_" .  $request->opportunity_id              => "required|string",
                "client_customer_" .  $request->opportunity_id                      => "required|string",
                "client_customer_national_id_" .  $request->opportunity_id          => "required|regex:/^([0-9\s\-\+\(\)]*)$/",
                "client_customer_address_" .  $request->opportunity_id              => "required|string",
                "client_date_" .  $request->opportunity_id                          => "required|string|date_format:Y-m-d",
                "client_end_date_" .  $request->opportunity_id                      => "sometimes|nullable|string|date_format:Y-m-d",
                "client_address_" .  $request->opportunity_id                       => "required|string",
                "client_note_" .  $request->opportunity_id                          => "sometimes|nullable|string",
                "client_amount_" .  $request->opportunity_id                        => "required|numeric",
                "client_recurring_type_" .  $request->opportunity_id                => "required|in:yes,no",

                "client_recurring_" .  $request->opportunity_id                     => "required_if:client_recurring_type_{$request->opportunity_id},yes",
                "recurrings_amount_" .  $request->opportunity_id                    => "required_if:client_recurring_type_{$request->opportunity_id},yes",
                "recurrings_dates_" .  $request->opportunity_id                     => "required_if:client_recurring_type_{$request->opportunity_id},yes",
                "client_contract_documents_" .  $request->opportunity_id . ".*"     => "required|file",


                "client_national_id_" .  $request->opportunity_id                   => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "client_passport_" .  $request->opportunity_id                      => "sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/",
                "client_expiration_passport_date_" .  $request->opportunity_id      => "sometimes|nullable|date_format:Y-m-d",




                // "client_developer_" . $request->opportunity_id                     => "sometimes|nullable|string",
                // "client_community_" . $request->opportunity_id                     => "sometimes|nullable|string",
                // "client_building_name_" . $request->opportunity_id                 => "sometimes|nullable|string",
                // "client_property_purpose_" . $request->opportunity_id              => "sometimes|nullable|in:rent,buy",
                // "client_property_no_" . $request->opportunity_id                   => "sometimes|nullable|string",
                // "client_property_id_" . $request->opportunity_id                   => "required|integer|exists:lead_property,id",
                // "client_property_reference_" . $request->opportunity_id            => "sometimes|nullable|string",
                // "client_size_sqft_" . $request->opportunity_id                     => "sometimes|nullable|numeric",
                // "client_size_sqm_" . $request->opportunity_id                      => "sometimes|nullable|numeric",
                // "client_bedrooms_" . $request->opportunity_id                      => "sometimes|nullable|string",
                // "client_bathrooms_" . $request->opportunity_id                     => "sometimes|nullable|string",
                // "client_parkings_" . $request->opportunity_id                      => "sometimes|nullable|string",


            ]);


            if ($validator->fails()) {
                return back()->withInput()->with(flash($validator->errors()->all()[0], 'danger'))->with('open-client-tab',  $request->opportunity_id);
            }




            if (
                !($request->{"client_passport_" .  $request->opportunity_id})
                &&
                !($request->{"client_national_id_" .  $request->opportunity_id})
            ) {

                return back()->withInput()->with(flash(trans('sales.type_one_of_passport_or_national_id'), 'error'))->with('open-client-tab',  $request->opportunity_id);
            }


            if (($request->{"client_passport_" .  $request->opportunity_id})) {


                if (!$request->{"client_passport_expiration_date_" .  $request->opportunity_id}) {
                    return back()->withInput()->with(flash(trans('sales.passport_expiration_date_is_required'), 'error'))->with('open-client-tab',  $request->opportunity_id);
                }
            }

            if ($request->{"client_recurring_type_" .  $request->opportunity_id} == 'yes') {




                if (count($request->{'recurrings_amount_' .  $request->opportunity_id}) != count($request->{'recurrings_dates_' .  $request->opportunity_id})) {

                    return back()->withInput()->with(flash(trans('sales.recurring_and_dates_not_equal'), 'error'))->with('open-client-tab',  $request->opportunity_id);
                }
                if (count($request->{'recurrings_dates_' .  $request->opportunity_id}) > count(array_unique($request->{'recurrings_dates_' .  $request->opportunity_id}))) {

                    return back()->withInput()->with(flash(trans('sales.dates_of_recurrings_are_repeated'), 'error'))->with('open-client-tab',  $request->opportunity_id);
                }


                // count() > count(array_unique());


                $recurring_value = 0;
                foreach ($request->{'recurrings_amount_' .  $request->opportunity_id} as $r) {
                    $recurring_value += $r;
                }

                if ($request->{'client_amount_' . $request->opportunity_id} != $recurring_value) {
                    return back()->withInput()->with(flash(trans('sales.recurrings_not_equal_amount'), 'error'))->with('open-client-tab',  $request->opportunity_id);
                }
            }

            dd('here', $request->{"client_recurring_type_" .  $request->opportunity_id});



            $check_unique_emails = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {

                $query->where([
                    ['email1', '!=', null],
                    ['email1', request()->{"client_email1_" .  request()->opportunity_id}],
                ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', request()->{"client_email1_" .  request()->opportunity_id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', request()->{"client_email1_" .  request()->opportunity_id}],
                    ])


                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', request()->{"client_email2_" .  request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', request()->{"client_email2_" .  request()->opportunity_id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', request()->{"client_email2_" .  request()->opportunity_id}],
                    ])


                    ->orWhere([
                        ['email1', '!=', null],
                        ['email1', request()->{"client_skype_" .  request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['email2', '!=', null],
                        ['email2', request()->{"client_skype_" .  request()->opportunity_id}],
                    ])->orWhere([
                        ['skype', '!=', null],
                        ['skype', request()->{"client_skype_" .  request()->opportunity_id}],
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
                        ['phone1', request()->{"client_landline_" .  request()->opportunity_id}],
                    ])
                    ->orWhere([
                        ['phone2', '!=', null],
                        ['phone2', request()->{"client_landline_" .  request()->opportunity_id}],
                    ])


                    ->orWhere([
                        ['landline', '!=', null],
                        ['landline', request()->{"client_landline_" .  request()->opportunity_id}],
                    ]);
            })->get();





            $check_unique_passport = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['passport', '!=', null],
                        ['passport',  request()->{"client_passport_" .  request()->opportunity_id}],
                    ]);
            })->get();

            $check_unique_fax = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['fax', '!=', null],
                        ['fax',  request()->{"client_fax_" .  request()->opportunity_id}],
                    ]);
            })->get();

            $check_unique_twitter = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['twitter', '!=', null],
                        ['twitter',  request()->{"client_twitter_" .  request()->opportunity_id}],
                    ]);
            })->get();
            $check_unique_facebook = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['facebook', '!=', null],
                        ['facebook',  request()->{"client_facebook_" .  request()->opportunity_id}],
                    ]);
            })->get();





            $check_unique_linkedin = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['linkedin', '!=', null],
                        ['linkedin',  request()->{"client_linkedin_" .  request()->opportunity_id}],
                    ]);
            })->get();

            $check_unique_national_id = Client::where('business_id', $opportunity->business_id)->where('agency_id', $opportunity->agency_id)->where(function ($query) {
                $query
                    ->where([
                        ['national_id', '!=', null],
                        ['national_id',  request()->{"client_national_id_" .  request()->opportunity_id}],
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




            // dd($request->all());
            DB::beginTransaction();

            $client = Client::create([

                'agency_id'         => $opportunity->agency_id,

                "business_id"       => $opportunity->business_id,


                'website'           =>   $request->{"client_website_" .  $request->opportunity_id},

                'name'              => $request->{"client_name_" .  $request->opportunity_id},

                'landline'          => $request->{"client_landline_" .  $request->opportunity_id},

                'email1'            => $request->{"client_email1_" .  $request->opportunity_id},
                'email2'            => $request->{"client_email2_" .  $request->opportunity_id},

                'fax'               =>  $request->{"client_fax_" .  $request->opportunity_id},

                'phone1'            => $request->{"client_phone1_" .  $request->opportunity_id},
                'phone2'            => $request->{"client_phone2_" .  $request->opportunity_id},

                'country'           => $request->{"client_country_" .  $request->opportunity_id},
                'city'              => $request->{"client_city_" .  $request->opportunity_id},


                'skype'             => $request->{"client_skype_" .  $request->opportunity_id},
                'twitter'           => $request->{"client_twitter_" .  $request->opportunity_id},
                'facebook'            => $request->{"client_facebook_" .  $request->opportunity_id},
                'linkedin'            => $request->{"client_linkedin_" .  $request->opportunity_id},

                'longitude'                     => $request->{"client_longitude_" .  $request->opportunity_id},
                'latitude'                      => $request->{"client_latitude_" .  $request->opportunity_id},


                'language'                      => $request->{"client_language_" .  $request->opportunity_id},
                'currency'                      => $request->{"client_currency_" .  $request->opportunity_id},
                'company'                       => $request->{"client_company_" .  $request->opportunity_id},
                'passport'                       => $request->{"client_passport_" .  $request->opportunity_id},
                'national_id'                       => $request->{"client_national_id_" .  $request->opportunity_id},
                'passport_expiration_date'       => $request->{"client_passport_expiration_date_" .  $request->opportunity_id},


                "date_of_birth"                 => $request->{"client_date_of_birth_" .  $request->opportunity_id},


                'converted_by'                  =>  auth()->user()->id,

                "source_id"                     => $opportunity->source_id,

                "type_id"                       => $opportunity->type_id,
                "communication_id"              => $opportunity->communication_id,


                "po_box"                        => $opportunity->po_box,


                "partner_name"                  => $opportunity->partner_name,

                'converted_from'                => $opportunity->id,
                'status'                        => 'pending',

                "developer"                     => $opportunity->developer,
                "community"                     => $opportunity->community,
                "building_name"                 => $opportunity->building_name,
                "property_purpose"              => $opportunity->property_purpose,
                "property_no"                   => $opportunity->property_no,
                "property_id"                   => $opportunity->property_id,

                "property_reference"   => $opportunity->property_reference,
                "size_sqft"            => $opportunity->size_sqft,
                "size_sqm"             => $opportunity->size_sqm,
                "bedrooms"             => $opportunity->bedrooms,
                "bathrooms"            => $opportunity->bathrooms,
                "parkings"             => $opportunity->parkings,

                "salutation"           => $opportunity->salutation,
                "other"                => $opportunity->other,

            ]);

            if ($client) {

                // $opportunity->tasks()->update(['module' => 'client', 'module_id' => $client->id]);
                // $opportunity->calls()->update(['module' => 'client', 'module_id' => $client->id]);


                // $opportunity->delete();

                $contract = ClientContract::create([
                    'client_id'             => $client->id,
                    'converted_by'          => auth()->user()->id,
                    'status'                => 'pending',
                    'contract_type'         => $request->{'client_contract_type_' .  $request->opportunity_id},

                    'customer_name'         => $request->{'client_customer_' .  $request->opportunity_id},
                    'customer_national_id'  => $request->{'client_customer_national_id_' .  $request->opportunity_id},
                    'customer_address'      => $request->{'client_customer_address_' .  $request->opportunity_id},


                    'landlord_name'         => $request->{'client_landlord_' .  $request->opportunity_id},
                    'landlord_national_id'  => $request->{'client_landlord_national_id_' .  $request->opportunity_id},
                    'landlord_address'      => $request->{'client_landlord_address_' .  $request->opportunity_id},
                    'address'               => $request->{'client_address_' .  $request->opportunity_id},

                    'start_date'                  =>  $request->{'client_date_' .  $request->opportunity_id},
                    'end_date'                  =>  $request->{'client_end_date_' .  $request->opportunity_id},
                    'notes'                  =>  $request->{'client_note_' .  $request->opportunity_id},
                    'has_recurring'         => $request->{'client_recurring_type_' .  $request->opportunity_id},
                    'recurring_number'      => $request->{'client_recurring_' .  $request->opportunity_id},
                    'amount'                => $request->{'client_amount_' .  $request->opportunity_id},

                    'agency_id'            => $client->agency_id,
                    'business_id'           => $client->business_id,



                ]);


                if ($contract) {

                    if ($request->{'client_recurring_type_' .  $request->opportunity_id} == 'yes') {



                        $merged = array();
                        foreach ($request->{'recurrings_amount_' .  $request->opportunity_id} as $key => $arr) {

                            $merged[$key][] = $arr;
                        }
                        foreach ($request->{'recurrings_dates_' .  $request->opportunity_id} as $key => $arr) {

                            $merged[$key][] = $arr;
                        }

                        foreach ($merged as $recurring) {
                            ContractRecurring::create([
                                'contract_id' => $contract->id,
                                'client_id'   => $client->id,
                                'amount'      => $recurring[0],
                                'date'        => $recurring[1],
                                'payed'       => 'no',
                                'agency_id'   => $client->agency_id,
                                'business_id' => $client->business_id,
                            ]);
                        }
                    }


                    // dd(request()->{'client_contract_documents_' . $request->opportunity_id});
                    foreach (request()->{'client_contract_documents_' . $request->opportunity_id} as $file) {

                        $document = upload_image($file, public_path('upload/contracts/' . $client->id), true);
                        ContractDocument::create([
                            'contract_id' => $contract->id,
                            'client_id'   => $client->id,
                            'document'    => $document,
                            'name'        => $file->getClientOriginalName(),
                            'agency_id'   => $client->agency_id,
                            'business_id' => $client->business_id,


                        ]);
                    }





                    $opportunity->update(['converting_approval' => 'waiting_for_approve']);
                }
            }


            DB::commit();

            return back()->with(flash(trans('sales.opportunity_waiting_for_approval'), 'success'));
        } catch (\Exception $e) {

            DB::rollback();

            return back()->withInput()->with(flash(trans('sales.something_went_wrong'), 'error'))->with('open-client-tab',  $request->opportunity_id);
        }
    }
}